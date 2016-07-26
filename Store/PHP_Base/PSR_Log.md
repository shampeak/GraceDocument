# PSR日志类 
>

[monolog link1](http://blog.csdn.net/wzllai/article/details/23109961)

[monolog link2](http://www.tuicool.com/articles/eiIbYjJ)

[monolog github](https://github.com/Seldaek/monolog/blob/master/doc/01-usage.md)

[psrlog link1 ]

# monolog
## 基本定义
 Monolog 是PHP的一个日志类库。相比于其他的日志类库，它有以下的特点：
- 功能强大。可以把日志发送到文件、socket、邮箱、数据库和各种web services。
- 遵循 PSR3 的接口规范。可以很轻易的替换成其他遵循同一规范的日志类库。
- 良好的扩展性。通过 Handler 、 Formatter 和 Processor 这几个接口，可以对Monolog类库进行各种扩展和自定义。

## 基本用法
github clone https://github.com/Seldaek/monolog.Git 

或者

composer 安装最新版本：

```
composer require monolog/monolog '~1.7'
```
要求PHP版本为5.3以上。
monolog代码结果如下：

- ErrorHandler.php（设置程序的error hander 、exception hander 给mogolog接管）
- Formatter/ （内置的日志显示格式）
- Handler/ （各种日志处理类，如写文件、发邮件、写socket、写队列等）
- Logger.php （log 处理接口）
- Processor/ （内置的处理日志类）
- Registry.php --


```
php
<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// 创建日志频道
$log = new Logger('name');
$log->pushHandler(new StreamHandler('path/to/your.log', Logger::WARNING));

// 添加日志记录
$log->addWarning('Foo');
$log->addError('Bar');
```

## 核心概念

每一个 Logger 实例都包含一个频道名(channel)和handler的堆栈。当你添加一条记录时，记录会依次通过handler堆栈的处理。而每个handler也可以决定是否把记录传递到下一个堆栈里的下一个handler。

通过handler，我们可以实现一些复杂的日志操作。例如我们把 StreamHandler 放在堆栈的最下面，那么所有的日志记录最终都会写到硬盘文件里。同时我们把 MailHandler 放在堆栈的最上面，通过设置日志等级把错误日志通过邮件发送出去。Handler里有个 $bubble 属性，这个属性定义了handler是否拦截记录不让它流到下一个handler。所以如果我们把 MailHandler 的 $bubble 参数设置为 false ，则出现错误日志时，日志会通过 MailHandler 发送出去，而不会经过 StreamHandler 写到硬盘上。

Logger 可以创建多个，每个都可以定义自己的频道名和handler堆栈。handler可以在多个 Logger 中共享。频道名会反映在日志里，方便我们查看和过滤日志记录。

如果没有指定日志格式（Formatter），Handler会使用默认的Formatter。

日志的等级不能自定义，目前使用的是 RFC 5424 里定义的8个等级：debug、info、notice、warning、error、critical、alert和emergency。如果对日志记录有其他的需求，可以通过Processors对日志记录添加内容。
## 日志等级

- DEBUG (100): 详细的debug信息。
- INFO (200): 关键事件, Examples: User logs in, SQL logs.
- NOTICE (250): 普通但是重要的事件。
- WARNING (300): 出现非错误的异常。 Examples: Use of deprecated APIs, poor use of an API, undesirable things that are not necessarily wrong.
- ERROR (400): 运行时错误，但是不需要立刻处理。
- CRITICA (500): 严重错误。Example: Application component unavailable, unexpected exception.
- ALERT (550): Action must be taken immediately. Example: Entire website down, database unavailable, etc. This should trigger the SMS alerts and wake you up.
- EMERGENCY (600): 系统不可用。

## 用法详解
### 多个handler


```
php
<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

// 创建Logger实例
$logger = new Logger('my_logger');
// 添加handler
$logger->pushHandler(new StreamHandler(__DIR__.'/my_app.log', Logger::DEBUG));
$logger->pushHandler(new FirePHPHandler());

// 开始使用
$logger->addInfo('My logger is now ready');
```


第一步我们先创建一个 Logger 实例，传入的是频道名，这个频道名可以用于区分多个 Logger 实例。

实例本身并不知道如何处理日志记录，它是通过handler进行处理的。handler可以设置多个，例如上面的例子设置了两个handler，可以对日志记录进行两种不同方式的处理。

需要注意的是，由于handler是采用堆栈的方式保存，所以后面添加的handler位于栈顶，会首先被调用。
### 添加额外的数据

Monolog有两种方式对日志添加额外的信息。
#### 使用上下文

第一个方法是使用$context参数，传入一个数组：


```
php
<?php

$logger->addInfo('Adding a new user', array('username' => 'Seldaek'));
```

简单的handlers (例如StreamHandler)会将array格式简化为一个字符串，但是复杂的handlers可以利用context (比如FirePHP 可以更好的呈现array).

#### 使用processor

第二个方法是使用processor。processor可以是任何可调用的方法，这些方法把日志记录作为参数，然后经过处理修改 extra 部分后返回。


```
php
<?php

$logger->pushProcessor(function ($record) {
    $record['extra']['dummy'] = 'Hello world!';
    return $record;
});
```


Processor不一定要绑定在Logger实例上，也可以绑定到某个具体的handler上。使用handler实例的 pushProcessor 方法进行绑定。
### 频道的使用

使用频道名可以对日志进行分类，这在大型的应用上是很有用的。通过频道名，可以很容易的对日志记录进行刷选。

例如我们想在同一个日志文件里记录不同模块的日志，我们可以把相同的handler绑定到不同的Logger实例上，这些实例使用不同的频道名：


```
php
<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

// 创建handler
$stream = new StreamHandler(__DIR__.'/my_app.log', Logger::DEBUG);
$firephp = new FirePHPHandler();

// 创建应用的主要logger
$logger = new Logger('my_logger');
$logger->pushHandler($stream);
$logger->pushHandler($firephp);

// 通过不同的频道名创建一个用于安全相关的logger
$securityLogger = new Logger('security');
$securityLogger->pushHandler($stream);
$securityLogger->pushHandler($firephp);
```
## 定制log format

在Monolog中可以很容易的定制写入文件/sockets/邮件、数据库等handlers的日志格式。大部分handlers使用

```
$record['formatted']
```
自动写入日志设备。这个值由格式器设置决定。你可以选择用预定义的格式或者自定义(e.g. a multiline text file for human-readable output).
配置预定义的格式方法如下：在handler的作用域中设置：


```
// 设置日期格式 format is "Y-m-d H:i:s"
$dateFormat = "Y n j, g:i a";
// the default output format is "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
$output = "%datetime% > %level_name% > %message% %context% %extra%\n";
// finally, create a formatter
$formatter = new LineFormatter($output, $dateFormat);

// Create a handler
$stream = new StreamHandler(__DIR__.'/my_app.log', Logger::DEBUG);
$stream->setFormatter($formatter);
// bind it to a logger object
$securityLogger = new Logger('security');
$securityLogger->pushHandler($stream);
```


You may also reuse the same formatter between multiple handlers and share those handlers between multiple loggers.

## Handler

Monolog内置很多很实用的handler，它们几乎囊括了各种的使用场景，这里介绍一些使用的：

- StreamHandler ：把记录写进PHP流，主要用于日志文件。
- SyslogHandler ：把记录写进syslog。
- ErrorLogHandler ：把记录写进PHP错误日志。
- NativeMailerHandler ：使用PHP的 mail() 函数发送日志记录。
- SocketHandler ：通过socket写日志。

```
<?php
 
use Monolog\Logger;
use Monolog\Handler\SocketHandler;

// Create the logger
$logger = new Logger('my_logger');
// Create the handler
$handler = new SocketHandler('unix:///var/log/httpd_app_log.socket');
$handler->setPersistent(true);
// Now add the handler
$logger->pushHandler($handler, Logger::DEBUG); 
// You can now use your logger
$logger->addInfo('My logger is now ready');
```


- AmqpHandler ：把记录写进兼容 amqp 协议的服务。
- BrowserConsoleHandler ：把日志记录写到浏览器的控制台。由于是使用浏览器的 console 对象，需要看浏览器是否支持。
- RedisHandler ：把记录写进Redis。
- MongoDBHandler ：把记录写进Mongo。
- ElasticSearchHandler ：把记录写到ElasticSearch服务。
- BufferHandler ：允许我们把日志记录缓存起来一次性进行处理。

更多的Handler请看 https://github.com/Seldaek/monolog#handlers 。
Formatter

同样的，这里介绍几个自带的Formatter：

- LineFormatter ：把日志记录格式化成一行字符串。一条log中包含的内容有：date，level_name（error，notice，warning等）,message,context,extra
- HtmlFormatter ：把日志记录格式化成HTML表格，主要用于邮件。
- JsonFormatter ：把日志记录编码成JSON格式。
- LogstashFormatter ：把日志记录格式化成logstash的事件JSON格式。
- ElasticaFormatter ：把日志记录格式化成ElasticSearch使用的数据格式。

更多的Formatter请看 https://github.com/Seldaek/monolog#formatters 。
## Processor

前面说过，Processor可以为日志记录添加额外的信息，Monolog也提供了一些很实用的processor：

- IntrospectionProcessor ：增加当前脚本的文件名和类名等信息。
- WebProcessor ：增加当前请求的URI、请求方法和访问IP等信息。
- MemoryUsageProcessor ：增加当前内存使用情况信息。
- MemoryPeakUsageProcessor ：增加内存使用高峰时的信息。

更多的Processor请看 https://github.com/Seldaek/monolog#processors 。
## 扩展handler

Monolog内置了很多handler，但是并不是所有场景都能覆盖到，有时需要自己去定制handler。写一个handler并不难，只需要实现 Monolog\Handler\HandlerInterface 这个接口即可。

下面这个例子实现了把日志记录写到数据库里。我们不需要把接口里的方法全部实现一次，可以直接使用Monolog提供的抽象类 AbstractProcessingHandler 进行继承，实现里面的 write 方法即可。


```
php
<?php
use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
class PDOHandler extends AbstractProcessingHandler
{
  private $initialized = false;
  private $pdo;
  private $statement;
  public function __construct(PDO $pdo, $level = Logger::DEBUG, $bubble = true)
  {
    $this->pdo = $pdo;
    parent::__construct($level, $bubble);
  }
  protected function write(array $record)
  {
    if (!$this->initialized) {
      $this->initialize();
    }
    $this->statement->execute(array(
      'channel' => $record['channel'],
      'level' => $record['level'],
      'message' => $record['formatted'],
      'time' => $record['datetime']->format('U'),
    ));
  }
  private function initialize()
  {
    $this->pdo->exec(
      'CREATE TABLE IF NOT EXISTS monolog '
      .'(channel VARCHAR(255), level INTEGER, message LONGTEXT, time INTEGER UNSIGNED)'
    );
    $this->statement = $this->pdo->prepare(
      'INSERT INTO monolog (channel, level, message, time) VALUES (:channel, :level, :message, :time)'
    );
  }
}
```


然后我们就可以使用它了：


```
<?php

$logger->pushHandler(new PDOHandler(new PDO('sqlite:logs.sqlite'));
 
// You can now use your logger
$logger->addInfo('My logger is now ready');
```

***@editor: siluzhou***
 

