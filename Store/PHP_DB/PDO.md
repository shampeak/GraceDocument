# PDO 使用
> PDO配置&简单使用

## **参考网址**

[link1](http://www.runoob.com/php/php-pdo.html)

[PDO防注入](http://www.baike369.com/content/?id=5447)


## **PDO简介：**

PDO（PHP数据对象） 是一个轻量级的、具有兼容接口的PHP数据连接拓展，是一个PHP官方的PECL库，随PHP 5.1发布，需要PHP 5的面向对象支持，因而在更早的版本上无法使用。它所提供的数据接入抽象层，具有与具体数据库类型无关的优势，为它所支持的数据库提供统一的操作接口。目前支持的数据库有Cubrid、FreeTDS / Microsoft SQL Server / Sybase、Firebird/Interbase 6、IBM DB2、IBM Informix Dynamic Server、MySQL 3.x/4.x/5.x、Oracle Call Interface、ODBC v3 (IBM DB2, unixODBC and win32 ODBC)、PostgreSQL、SQLite 3 and SQLite 2、Microsoft SQL Server / SQL Azure等。由于PDO是在底层实现的统一的数据库操作接口，因而利用它能够实现更高级的数据库操作，比如存储过程的调度等。


## **PDO 配置**


phpstudy——其他选项菜单——PHP扩展及设置——PHP扩展——选上PDO有关内容

--之前的配置是走了弯路=。=

## **初始化PDO对象**


在PDO中,要建立与数据库的连接需要实例化PDO的构造函数;
  语法:
```
__construct(string $dsn[,string $username[,string $password[,array $driver _options]]])
```

  以上构造的参数说明如下;
1. dsn:数据库源名,包括主机名商品号和数据库名称;
2. username:连接数据库的用户名;
3. password:连接数据库的密码;
4. driver_options:连接数据库的其他选项;
  通过PDO连接mysql数据库的代码如下

```
<?php
  $dbms='mysql';
  $dbname='db_database'
  $user='root'
  $pwd='djjwzcom'
  $host='localhost'
  $dsn='$dbms：host=$host;dbmane=$dbname';
  try{
    $pdo=new pdo($dsn,$user,$pwd)
    echo "pdo连接mysql成功案例";
  } catch (Exception $e){
    echo $e->getMessage()."<br>";
  }
?>
```
## DSN
DSN是Data Source Name（数据源名称）的首字母缩写。DSN提供连接数据库需要的信息。PDO的DSN包括3部分：PDO驱动名称（如：mysql、sqlite或者pgsql）、冒号和驱动特定的语法。每种数据库都有其特定的驱动语法。

实际中有一些数据库服务器可能与web服务器不在同一台计算机上，则需要修改DSN中的主机名称。

由于数据库服务器只在特定的端口上监听连接请求，故每种数据库服务器具有一个默认的端口号（MySQL是3306），但是数据库管理员可以对端口号进行修改，因此有可能PHP找不到数据库的端口号，此时就可以在DSN中包含端口号。
例如：


```
$dsn="mysql:host=127.0.0.1;port=3306;dbname=admin";
```

另外，由于一个数据库服务器中可能拥有多个数据库，所以在通过DSN连接数据库时，通常都包括数据库名称，这样可以确保连接的
是用户想要的数据库，而不是其他数据库。
 

## **query**

执行 SQL 语句，返回PDOStatement对象,可以理解为结果集(PHP 5 >= 5.1.0, PECL pdo >= 0.2.0) 

### 语法


```
public PDOStatement PDO::query ( string $statement )
public PDOStatement PDO::query ( string $statement , int $PDO::FETCH_COLUMN , int $colno )
public PDOStatement PDO::query ( string $statement , int $PDO::FETCH_CLASS , string $classname , array $ctorargs )
public PDOStatement PDO::query ( string $statement , int $PDO::FETCH_INTO , object $object )
```

PDO::query() 在一个单独的函数中调用并执行 SQL 语句, 返回结果集 (如果有),语句作为一个PDOStatement对象返回。
### 参数

statement
要执行的SQL语句。
### 返回值

query() 仅对 SELECT，SHOW，EXPLAIN 或 DESCRIBE 语句返回一个资源标识符返回PDOStatement对象，如果查询执行不正确则返回 FALSE。

对于其它类型的 SQL 语句，mysql_query() 在执行成功时返回 TRUE，出错时返回 FALSE。

### 实例
PDO::query实例

遍历输出结果集：


```
<?php
function getFruit($conn) {
    $sql = 'SELECT name, color, calories FROM fruit ORDER BY name';
    foreach ($conn->query($sql) as $row) {
        print $row['name'] . "\t";
        print $row['color'] . "\t";
        print $row['calories'] . "\n";
    }
}
?>
```


以上输出结果为：


```
apple   red     150
banana  yellow  250
kiwi    brown   75
lemon   yellow  25
orange  orange  300
pear    green   150
watermelon      pink    90
```

默认这个不是长连接，如果需要数据库长连接，需要最后加一个参数：array(PDO::ATTR_PERSISTENT => true) 变成这样：

```
$db = new PDO($dsn, 'root', '', array(PDO::ATTR_PERSISTENT => true));
```
## 新建表

首先建立SQL语句，CREATE DATABASE database_name，详见SQL语句.md文件。

为了让 PHP 执行上面的语句，我们必须使用 query() 函数。此函数用于向 MySQL 连接发送查询或命令。

对于create语句，query() 在执行成功时返回 TRUE，出错时返回 FALSE。
## **数据提取功能**



```
<?php
foreach($db->query("SELECT * FROM foo")){
    print_r($row);
}
?>
```
我们也可以使用这种获取方式：


```
<?php
$rs = $db->query("SELECT * FROM foo");
while($row = $rs->fetch()){
    print_r($row);
}
?>
```


如果想一次把数据都获取到数组里可以这样：


```
<?php
$rs = $db->query("SELECT * FROM foo");
$result_arr = $rs->fetchAll();
print_r($result_arr);
?>
```

我们看里面的记录，数字索引和关联索引都有，浪费资源，我们只需要关联索引的：
```
<?php
$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
$rs = $db->query("SELECT * FROM foo");
$rs->setFetchMode(PDO::FETCH_ASSOC);
$result_arr = $rs->fetchAll();
print_r($result_arr);
?>
```
### setAttribute()
方法是设置部分属性，主要属性有：PDO::ATTR_CASE、PDO::ATTR_ERRMODE等等，我们这里需要设置的是PDO::ATTR_CASE，就是我们使用关联索引获取数据集的时候，关联索引是大写还是小写，有几个选择：

- PDO::CASE_LOWER -- 强制列名是小写
- PDO::CASE_NATURAL -- 列名按照原始的方式
- PDO::CASE_UPPER -- 强制列名为大写 

### setFetchMode
[参考链接](http://php.net/manual/zh/pdostatement.setfetchmode.php)
基本语法：
```
$res->setFetchMode(\PDO::FETCH_NUM);
```

setFetchMode为语句设置默认的获取模式。**在读操作中一般都先设置setFetchMode格式，主要原因是可以节约一半的内存。**

方法来设置获取结果集的返回值的类型，同样类型还有：



- PDO::FETCH_ASSOC -- 关联数组形式
- PDO::FETCH_NUM -- 数字索引数组形式
- PDO::FETCH_BOTH -- 两者数组形式都有，这是缺省的
- PDO::FETCH_OBJ -- 按照对象的形式，类似于以前的 mysql_fetch_object()

#### setFetcHMode 对比
例如getAll函数
下面依次是，不用setFetcHMode，设置为关联数组，数字索引，BOTH以及对象的对比：

![](http://i.imgur.com/nP3bOxF.png) 
![](http://i.imgur.com/uxdjbp8.png)
![](http://i.imgur.com/YE11Dr5.png)
![](http://i.imgur.com/tNWYLsc.png)
![](http://i.imgur.com/gNPSiKC.png)





### php pdo statement
[参考网址](http://blog.csdn.net/machaoiwhn/article/details/7957566)
[中文官网](http://php.net/manual/zh/pdostatement.bindparam.php)
- PDOStatement::bindColumn — 绑定一列到一个 PHP 变量  
- PDOStatement::bindParam — 绑定一个参数到指定的变量名  
- PDOStatement::bindValue — 把一个值绑定到一个参数  
- PDOStatement::closeCursor — 关闭游标，使语句能再次被执行。  
- PDOStatement::columnCount — 返回结果集中的列数  
- PDOStatement::debugDumpParams — 打印一条 SQL 预处理命令  
- PDOStatement::errorCode — 获取跟上一次语句句柄操作相关的 SQLSTATE  
- PDOStatement::errorInfo — 获取跟上一次语句句柄操作相关的扩展错误信息  
- PDOStatement::execute — 执行一条预处理语句  
- PDOStatement::fetch — 从结果集中获取下一行  
- PDOStatement::fetchAll — 返回一个包含结果集中所有行的数组  
- PDOStatement::fetchColumn — 从结果集中的下一行返回单独的一列。  
- PDOStatement::fetchObject — 获取下一行并作为一个对象返回。 
- PDOStatement::getAttribute — 检索一个语句属性  
- PDOStatement::getColumnMeta — 返回结果集中一列的元数据  
- PDOStatement::nextRowset — 在一个多行集语句句柄中推进到下一个行集  
- PDOStatement::rowCount — 返回受上一个 SQL 语句影响的行数  
- PDOStatement:: setAttribute — 设置一个语句属性  
- PDOStatement:: setFetchMode — 为语句设置默认的获取模式。

#### PDOStatement->fetch()


PDO 中的 fetch() 方法用于从结果集中获取一行结果，该方法行为类似 mysql_fetch_array() ，不同的是该方法不仅返回数组，还可返回对象。


**语法：**
```
PDOStatement->fetch(int mode)
```
mode 为可选参数，表示希望返回的结果集类型，默认为关联及数字索引共有的数组形式。
mode 参数可取值如下：取值	说明
- PDO::FETCH_ASSOC	关联索引（字段名）数组形式
- PDO::FETCH_NUM	数字索引数组形式
- PDO::FETCH_BOTH	默认，关联及数字索引数组形式都有
- PDO::FETCH_OBJ	按照对象的形式
- PDO::FETCH_BOUND	通过
-  bindColumn() 方法将列的值赋到变量上
- PDO::FETCH_CLASS	以类的形式返回结果集，如果指定的类属性不存在，会自动创建
- PDO::FETCH_INTO	将数据合并入一个存在的类中进行返回
- PDO::FETCH_LAZY	结合了
 PDO::FETCH_BOTH、PDO::FETCH_OBJ，在它们被调用时创建对象变量
- PDOStatement->setFetchMode()
如果不在 fetch() 中指定返回的结果类型，也可以单独使用 setFetchMode() 方法设定，如：
```
......
$sth = $db->query($sql);
$sth->setFetchMode(PDO::FETCH_ASSOC);
while($row = $result->fetch()){
    ......
}
```

#### PDOStatement->fetchAll()

fetchAll() 方法用于把数据从数据集一次性取出并放入数组中。

语法：


```
PDOStatement->fetchAll([int mode [,int column_index]])
```


mode 为可选参数，表示希望返回的数组，column_index 表示列索引序号，当 mode 取值 PDO::FETCH_COLUMN 时指定。
mode 参数可取值如下：取值	说明
- PDO::FETCH_COLUMN	指定返回返回结果集中的某一列，具体列索引由
 column_index 参数指定
- PDO::FETCH_UNIQUE	以首个键值下表，后面数字下表的形式返回结果集
- PDO::FETCH_GROUP	按指定列的值分组

例子：


```
$sth = $db->query($sql);
$row = $sth->fetchAll();
//只返回 username（index=1）
$row = $sth->fetchAll(PDO::FETCH_COLUMN, 1);
//将 username GROUP 返回（注：由于表中 username 无重复记录，因此本例无意义）
$row = $sth->fetchAll(PDO::FETCH_COLUMN|PDO::FETCH_GROUP, 1);

PDO->query( string statement )
```

### fetchColumn():
[参考网址](http://www.ziqiangxuetang.com/php/pdostatement-fetchcolumn.html)

PDOStatement::fetchColumn — 从结果集中的下一行返回单独的一列。(PHP 5 >= 5.1.0, PECL pdo >= 0.9.0) 
#### 语法

```
string PDOStatement::fetchColumn ([ int $column_number = 0 ] )
```

从结果集中的下一行返回单独的一列，如果没有了，则返回 FALSE 。
#### 参数
column_number

你想从行里取回的列的索引数字（以0开始的索引）。如果没有提供值，则 PDOStatement::fetchColumn() 获取第一列。
#### 返回值

PDOStatement::fetchColumn() 从结果集中的下一行返回单独的一列。

注意：如果使用 PDOStatement::fetchColumn() 取回数据，则没有办法返回同一行的另外一列。


## PDO防注入

PDO为了防止注入，为MySQL数据库提供了预处理语句功能。

预处理语句是使用两个方法实现的：prepare()方法负责准备要执行的查询，execute()方法使用一组给定的列参数反复地执行查询。这些参数可以显式地作为数组传递给execute()方法，也可以使用通过bindParam()方法指定的绑定参数提供给execute()方法。

### 使用预处理语句——prepare()方法

#### 概述
prepare()方法负责准备要执行的查询。
#### 语法格式


```
PDOStatement PDO::prepare(string statement[,array driver_options])
```


但是，用作准备语句的查询与以住使用的查询略有区别，因为对于每次执行迭代中要改变的值，必须使用占位符而不是具体的列值。

查询支持两种不同的语法：命名参数和问号参数。

使用命名参数的查询如下：


```
INSERT INTO tb_chengji SET xuesheng=:xuesheng,yuwen=:yuwen;
```


其中，:xuesheng与:yuwen都是列占位符。

使用问号参数的查询如下：


```
INSERT INTO tb_chengji SET xuesheng=?,yuwen=?;
```


其中，?也是列占位符。

选择哪一种语法都可以，但是前者更明确一些。

#### 实例
下面使用prepare()方法准备一个用于迭代执行的查询：


```
<?php
$pdo=new PDO($dsn,$user,$pwd);  // 连接数据库
$query="INSERT INTO tb_chengji SET xuesheng=:xuesheng,yuwen=:yuwen";
$result=$pdo->prepare($query);
?>
```

### 执行准备查询——execute()方法
#### 概述：
execute()方法负责执行准备好的查询。

#### 语法格式：


```
bool PDOStatement::execute([array input_parameters])
```


该方法需要有每次迭代执行中替换的输入参数。这可以通过两种方法实现：作为数组将值传递给方法，或者通过bindParam()方法把值绑定到查询中相应的变量名或位置偏移。

下面介绍第一种方法，第二种方法在bindParam()方法中介绍。
#### 实例
实例代码中准备了一条语句并通过execute()方法反复执行，每次使用不同的参数：


```
<?php
$pdo=new PDO($dsn,$user,$pwd);  // 连接数据库
$query="INSERT INTO tb_chengji SET xuesheng=:xuesheng,yuwen=:yuwen";
$result=$pdo->prepare($query);

$result->execute(array(':xuesheng'=>'赵天平',':yuwen'=>'90'));  // 执行一次
$result->execute(array(':xuesheng'=>'张冬雪',':yuwen'=>'115')); // 再执行一次
?>
```


下面通过使用bindParam()方法进行绑定来传递查询参数。

### 绑定参数——bindParam()方法
#### 概述
execute()方法中的input_parameters参数是可选的，虽然很方便，但是如果需要传递多个变量时，以这种方式提供数组会很快变得难以处理（当数组元素过多时，也就是当数据表中的列过多时，代码设计会变得特别难以阅读或出错）。使用bindParam()方法可以解决这个问题。
#### 语法格式：


```
boolean PDOStatement::bindParam(mixed parameter,mixed &variable[,int datatype
                                [,int length[,mixed driver_options]]])
```


==parameter：== 当在prepare()方法中使用命名参数时，parameter是预处理语句中使用语法（例如:xuesheng）指定的列值占位符的名字；使用问号参数时，parameter是查询中列值占位符的索引偏移。

==variable==： 该参数存储将赋给占位符的值。它按引用传递，因为结合准备存储过程使用此方法时，可以根据存储过程的某个动作修改这个值。

==datatype：== 该参数显式地设置参数的数据类型，可以为以下值：

-   PDO_PARAM_BOOL：SQL BOOLEAN类型。
-    PDO_PARAM_INPUT_OUTPUT：参数传递给存储过程时使用此类型，因此，可以在过程执行后修改。
-    PDO_PARAM_INT：SQL INTEGER数据类型。
-    PDO_PARAM_NULL：SQL NULL数据类型。
-    PDO_PARAM_LOB：SQL大对象数据类型。
-    PDO_PARAM_STMT：PDOStatement对象类型，当前不可操作。
-    PDO_PARAM_STR：SQL CHAR、VARCHAR和其它字符串数据类型。

==length：== 该参数指定数据类型的长度。只有当赋为PDO_PARAM_INPUT_OUTPUT数据类型时才需要这个参数。

==driver_options==：该参数用来传递任何数据库驱动程序特定的选项。

#### 实例
下面修改前面的实例，使用bindParam()方法来赋列值：


```
<?php
$pdo=new PDO($dsn,$user,$pwd);  // 连接数据库
$query="INSERT INTO tb_chengji SET xuesheng=:xuesheng,yuwen=:yuwen";
$result=$pdo->prepare($query);

$xuesheng='赵天平';
$yuwen='90';
$result->bindParam(':xuesheng',$xuesheng);
$result->bindParam(':yuwen',$yuwen);
$result->execute();

$xuesheng='张冬雪';
$yuwen='115';
$result->bindParam(':xuesheng',$xuesheng);
$result->bindParam(':yuwen',$yuwen);
$result->execute();
?>
```


如果使用问号参数，语句则如下所示：


```
$query="INSERT INTO tb_chengji SET xuesheng=?,yuwen=?";
```


因此对应的bindParam()方法调用如下：


```
$xuesheng='赵天平';
$yuwen='90';
$result->bindParam(1,$xuesheng);
$result->bindParam(2,$yuwen);
$xuesheng='张冬雪';
$yuwen='115';
$result->bindParam(1,$xuesheng);
$result->bindParam(2,$xuesheng);
```

### PDO::lastInsertId
#### 版本信息
(PHP 5 >= 5.1.0, PHP 7, PECL pdo >= 0.1.0)
#### 作用
PDO::lastInsertId — 返回最后插入行的ID或序列值
#### 说明 

```
string PDO::lastInsertId ([ string $name = NULL ] )
```


返回最后插入行的ID，或者是一个序列对象最后的值，取决于底层的驱动。比如，PDO_PGSQL() 要求为 name 参数指定序列对象的名称。

#### Note:
在不同的 PDO 驱动之间，此方法可能不会返回一个有意义或一致的结果，因为底层数据库可能不支持自增字段或序列的概念。

#### 参数 

name

 应该返回ID的那个序列对象的名称。

#### 返回值 

如果没有为参数 name 指定序列名称，PDO::lastInsertId() 则返回一个表示最后插入数据库那一行的行ID的字符串。

如果为参数 name 指定了序列名称，PDO::lastInsertId() 则返回一个表示从指定序列对象取回最后的值的字符串。

如果当前 PDO 驱动不支持此功能，则 PDO::lastInsertId() 触发一个 IM001 SQLSTATE 。

***@editor siluzhou***

