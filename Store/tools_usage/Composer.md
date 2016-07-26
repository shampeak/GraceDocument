# Composer 
> composer 学习文档



## **参考网站**

[link1](http://www.jb51.net/article/53876.htm)

**添加composer.json**

- 通过CMD: 到项目目录中—— composer init，初始化composer.json文件

-  phpstorm——tools——composer——init

**生成vendor与composer.lock 锁文件**

- cmd：composer install or composer update

## **require key**

第一件事情（并且往往只需要做这一件事），你需要在 composer.json 文件中指定 require key 的值。你只需要简单的告诉 Composer 你的项目需要依赖哪些包。
	{
	    "require": {
	        "monolog/monolog": "1.0.*"
	    }
	}
你可以看到， require 需要一个 包名称 （例如 monolog/monolog） 映射到 包版本 （例如 1.0.*） 的对象。



- 包名称

包名称由供应商名称和其项目名称构成。通常容易产生相同的项目名称，而供应商名称的存在则很好的解决了命名冲突的问题。它允许两个不同的人创建同样名为 json 的库，而之后它们将被命名为 igorw/json 和 seldaek/json。

这里我们需要引入 monolog/monolog，供应商名称与项目的名称相同，对于一个具有唯一名称的项目，我们推荐这么做。它还允许以后在同一个命名空间添加更多的相关项目。如果你维护着一个库，这将使你可以很容易的把它分离成更小的部分。

- 包版本

在前面的例子中，我们引入的 monolog 版本指定为 1.0.*。这表示任何从 1.0 开始的开发分支，它将会匹配 1.0.0、1.0.2 或者 1.0.20。

版本约束可以用几个不同的方法来指定。

![](http://i.imgur.com/cMGGzv2.png)

## **安装依赖包**

获取定义的依赖到你的本地项目，只需要调用 composer.phar 运行 install 命令。（cmd ——composer install)

将会找到对应包的版本，并将它下载到 vendor 目录。 这是一个惯例把第三方的代码到一个指定的目录 vendor。如果是 monolog 将会创建 vendor/monolog/monolog 目录。

运行后生成autoload.php

## **自动加载**

### 库自动加载

对于库的自动加载信息，Composer 生成了一个 vendor/autoload.php 文件。可以在php文件头中加载，代码的具体内容要随着autoload.php的位置变化而变化

代码：

	require 'vendor/autoload.php';

或者：
	
	include_once './vendor/autoload.php'; 
这使得你可以很容易的使用第三方代码。例如：如果你的项目依赖 monolog，你就可以像这样开始使用这个类库，并且他们将被自动加载。

	$log = new Monolog\Logger('name');
	$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
	$log->addWarning('Foo');

### 第三方自动加载

对于第三方包的自动加载，Composer提供了四种方式的支持，分别是 PSR-0和PSR-4的自动加载，生成class-map，和直接包含files的方式。

PSR-4是composer推荐使用的一种方式，因为它更易使用并能带来更简洁的目录结构。在composer.json里是这样进行配置的：

    "autoload":{
        "files": ["src/Helper.php"],
        "psr-4":{
            "Lulu\\": "src"
        }
    }
Files方式，就是手动指定供直接加载的文件

key和value就定义出了namespace以及到相应path的映射。按照PSR-4的规则，当试图自动加载 "Lulu\\Wise\\Wise" 这个class时，会去寻找 "src/Wise/Wise.php" 这个文件，如果它存在则进行加载。注意， "Lulu\\"
并没有出现在文件路径中，这是与PSR-0不同的一点，如果PSR-0有此配置，那么会去寻找"src/Lulu/Wise/Wise.php"这个文件。

另外注意PSR-4和PSR-0的配置里，"Lulu\\"结尾的命名空间分隔符必须加上并且进行转义，以防出现"Lulu"匹配到了"Luluwise"这样的意外发生。

在composer安装或更新完之后，psr-4的配置换被转换成namespace为key，dir path为value的Map的形式，并写入生成的 vendor/composer/autoload_psr4.php 文件之中。

```
return array(
    'Lulu\\' => array($baseDir . '/src'),
);
```

最终这个配置也以Map的形式写入生成的
vendor/composer/autoload_namespaces.php
文件之中。

Class-map方式，则是通过配置指定的目录或文件，然后在Composer安装或更新时，它会扫描指定目录下以.php或.inc结尾的文件中的class，生成class到指定file path的映射，并加入新生成的 vendor/composer/autoload_classmap.php 文件中，。

### File加载
Files方式，就是手动指定供直接加载的文件。比如说我们有一系列全局的helper functions，可以放到一个helper文件里然后直接进行加载


```
{
  "autoload": {
    "files": ["src/MyLibrary/functions.php"]
  }
}
```


它会生成一个array，包含这些配置中指定的files，再写入新生成的

vendor/composer/autoload_files.php

文件中，以供autoloader直接进行加载。


***@editor siluzhou***