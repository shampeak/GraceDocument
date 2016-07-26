# sql指令
> sql指令

参考网址

[link1](https://www.1keydata.com/cn/sql/sql-select.php)

[link2](http://www.w3school.com.cn/php/php_mysql_create.asp)

[link3](http://www.php100.com/html/webkaifa/database/Mysql/2012/0720/10713.html)

## CREATE 

### 基本语法

```
CREATE TABLE "表格名"
("栏位 1" "栏位 1 资料种类",
"栏位 2" "栏位 2 资料种类",
... );
```
为了让 PHP 执行上面的语句，我们必须使用 mysql_query() 函数。
在设置了数据类型后，你可以为没个列指定其他选项的属性：

- NOT NULL - 该列所有行必须含有值（不能为空），null 值是不允许的。
- DEFAULT value - 设置默认值
- UNSIGNED - 使用无符号数值类型，0 及正数
- AUTO_INCREMENT - 设置 MySQL 字段的值在新增记录时每次自动增长 1
- PRIMARY KEY - 设置数据表中每条记录的唯一标识。 通常列的 PRIMARY KEY 设置为 ID 数值，与 AUTO_INCREMENT 一起使用。

每个表都应该有一个主键(本列为 "id" 列)，主键必须包含唯一的值。

**根据已有的表创建新表：**

```
A：create table tab_new like tab_old (使用旧表创建新表)
B：create table tab_new as select col1,col2… from tab_old definition only
```



### 下面的可使用的各种 MySQL 数据类型：
数值类型 |	描述
---------|---------
int(size)   smallint(size)  tinyint(size)  mediumint(size)  bigint(size|仅支持整数。在 size 参数中规定数字的最大值。
decimal(size,d)  double(size,d) float(size,d) | 支持带有小数的数字    在 size 参数中规定数字的最大值,在 d 参数中规定小数点右侧的数字的最大值。例如： amount float(6,2) 订单总金额为6位，小数位数到美分2位。

文本数据类型 |	描述
----------|---------
char(size) 	|支持固定长度的字符串。（可包含字母、数字以及特殊符号）。在 size 参数中规定固定长度。例如name char(50）,姓名通常不会有50个字符，MySQL会自动用空格填充。
varchar(size) 	|支持可变长度的字符串。（可包含字母、数字以及特殊符号）。在 size 参数中规定最大长度。Varchar相比较char，占用空间少，但是char类型速度更快。
tinytext 	|支持可变长度的字符串，最大长度是 255 个字符。
text    blob|	支持可变长度的字符串，最大长度是 65535 个字符。
mediumtext     mediumblob |	支持可变长度的字符串，最大长度是 16777215 个字符。
longtext  longblob| 	支持可变长度的字符串，最大长度是 4294967295 个字符。
	


日期数据类型 |	描述
--------|------------
date(yyyy-mm-dd)     datetime(yyyy-mm-dd hh:mm: ss)     timestamp(yyyymmddhhmmss)     time(hh:mm: ss)|     	支持日期或时间

杂项数据类型| 	描述
---------|-------
enum(value1,value2,ect) |	ENUM 是 ENUMERATED 列表的缩写。可以在括号中存放最多 65535 个值。
set |	SET 与 ENUM 相似。但是，SET 可拥有最多 64 个列表项目，并可存放不止一个 choice

### 主键和自动递增字段

每个表都应有一个主键字段。

主键用于对表中的行进行唯一标识。每个主键值在表中必须是唯一的。此外，主键字段不能为空，这是由于数据库引擎需要一个值来对记录进行定位。

主键字段永远要被编入索引。这条规则没有例外。你必须对主键字段进行索引，这样数据库引擎才能快速定位给予该键值的行。

下面的例子把 personID 字段设置为主键字段。主键字段通常是 ID 号，且通常使用 AUTO_INCREMENT 设置。AUTO_INCREMENT 会在新记录被添加时逐一增加该字段的值。要确保主键字段不为空，我们必须向该字段添加 NOT NULL 设置。

### 实例
一个用于建立million表的SQL语句

```
$sql2="CREATE TABLE IF NOT EXISTS million (
userId INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
login VARCHAR(32) NOT NULL,
password VARCHAR(32) NOT NULL,
email VARCHAR(64) DEFAULT NULL,
mobile VARCHAR(64) DEFAULT NULL,
accessToken VARCHAR(64) NOT NULL DEFAULT 'accessToken',
createAt TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
updateAt int(11) DEFAULT NULL,
trueName VARCHAR(128) DEFAULT NULL,
birthday VARCHAR(128) DEFAULT NULL,
gender VARCHAR(128) DEFAULT NULL,
signer VARCHAR(128) DEFAULT NULL,
zone VARCHAR(128) DEFAULT NULL,
addr VARCHAR(128) DEFAULT NULL,
gravatar VARCHAR(128) DEFAULT NULL,
height VARCHAR(16) DEFAULT NULL,
active int(11) NOT NULL DEFAULT 0,
sort int(11) NOT NULL DEFAULT 0,
des VARCHAR(128) DEFAULT NULL
)";
```


## Drop Table
清除表格
### 基本语法
```
DROP TABLE "表格名";
```
### 实例
我们如果要清除在SQL CREATE 中建立的顾客表格，我们就打入：

```
DROP TABLE Customer;
```



## SELECT

SQL指令最常用的方式是将资料从数据库中的表格内选出。其中有两个关键字： 从 (**FROM**) 数据库中的表格内 选出 (**SELECT**)。 我们由这里可以看到最基本的 SQL 架构：

```
SELECT "栏位名" FROM "表格名";
```
我们一次可以读取好几个栏位，也可以同时由好几个表格中选资料。
复杂的：
```
SELECT [options] items
[INTO file_details]
FROM tables
[WHERE conditions]
[GROUP BY group_type]
[HAVING where_definition]
[ORDER BY order_type]
[LIMIT limit_criteria]
[PROCEDURE proc_name(argument)]
[lock_options]
;
```
### WHERE 字句常见运算符

运算符| 	说明
---|----
=  |  等于
!= 	|不等于，某些数据库系统也写作 <>
> 	|大于
< 	|小于
>= 	|大于或等于
<= 	|小于或等于
IS NULL |	空值判断符
IS NOT NUL |	非空判断符
BETWEEN … AND … |	介于某个范围之内，例：WHERE age BETWEEN 20 AND 30
NOT BETWEEN …AND … 	|不在某个范围之内
IN(项1,项2,…) 	|在指定项内，例：WHERE city IN('beijing','shanghai')
NOT IN(项1,项2,…)| 	不在指定项内
LIKE 	|搜索匹配，常与模式匹配符配合使用。模式可以由常规文本加上匹配任何数量字符的“%”和只匹配一个字符的"_"组成
NOT LIKE |	LIKE的反义

###  ORDER BY
以某一特定顺序显示查询行，实现很好的可阅读格式的显示输出。默认升序，可以用ASC或者DESC关键字指定顺序

```
SELECT  * FROM 表名 ORDER BY ID DESC
```
### GROUP BY
“Group By”从字面意义上理解就是根据“By”指定的规则对数据进行分组，所谓的分组就是将一个“数据集”划分成若干个“小区域”，然后针对若干个“小区域”进行数据处理。
```
select 类别, sum(数量) as 数量之和
from A
group by 类别
```
### LIMIT子句：指定返回的行

```
select * from table limit m,n
```

其中m是指记录开始的index，从0开始，表示第一条记录
n是指从第m行开始，取n条。

```
select * from tablename limit 2,4
```

即取出第2行至第5行，4条记录

### FIELD
指定了查询的结果集中包含字段的值
```
$Model->field('id,title,content')->select();
//这里使用field方法指定了查询的结果集中包含id,title,content三个字段的值。执行的SQL相当于：
SELECT id,title,content FROM table
```

## Insert Into
### 基本语法
```
INSERT INTO "表格名" ("栏位1", "栏位2", ...)
VALUES ("值1", "值2", ...);
```
### 实例

Store_Information表格
栏位名称|	资料种类
-------|--------
Store_Name|	char(50)
Sales	|float
Txn_Date|	datetime

而我们要加以下的这一笔资料进去这个表格：在 January 10, 1999，Los Angeles 店有$900 的营业额。我们就打入以下的 SQL 语句：


```
INSERT INTO Store_Information (Store_Name, Sales, Txn_Date)
VALUES ('Los Angeles', 900, 'Jan-10-1999');
```


第二种 INSERT INTO 能够让我们一次输入多笔从另一个表格获得的资料。一次输入多笔的资料的语法是：

```
INSERT INTO "表格1" ("栏位1", "栏位2", ...)
SELECT "栏位3", "栏位4", ...
FROM "表格2";
```
以上的语法是最基本的。这整句 SQL 也可以含有 WHERE、 GROUP BY、及 HAVING 等子句，以及表格连接及别名等等。

举例来说，若我们想要将 1998 年的营业额资料放入 Store_Information 表格，而我们知道资料的来源是可以由 Sales_Information 表格取得的话，那我们就可以打入以下的 SQL：

```
INSERT INTO Store_Information (Store_Name, Sales, Txn_Date)
SELECT store_name, Sales, Txn_Date
FROM Sales_Information
WHERE Year (Txn_Date) = 1998;
```
## Update
修改表格中的资料。在ANSI SQL中，只可实现一次修改，但是MYSQL允许多次
### 基本语法
```
SET "栏位1" = [新值]
WHERE "条件";
```
### 实例
Store_Information 表格
Store_Name	|Sales	|Txn_Date
--------|---------|----------
Los Angeles	|1500	|05-Jan-1999
San Diego	|250	|07-Jan-1999
Los Angeles	|300	|08-Jan-1999
Boston	|700	|08-Jan-1999

我们发现说 Los Angeles 在 08-Jan-1999 的营业额实际上是 $500，而不是表格中所储存的 $300，因此我们用以下的 SQL 来修改那一笔资料：


```
UPDATE Store_Information
SET Sales = 500
WHERE Store_Name = 'Los Angeles'
AND Txn_Date = 'Jan-08-1999';
```
在这个例子中，只有一笔资料符合 WHERE 子句中的条件。如果有多笔资料符合条件的话，每一笔符合条件的资料都会被修改的。 
我们也可以同时修改好几个栏位。这语法如下：


```
UPDATE "表格"
SET "栏位1" = [值1], "栏位2" = [值2]
WHERE "条件";
```

## Delete From
### 基本语法
```
DELETE FROM "表格名"
WHERE "条件";
```

## ALERT
添加/删除/修改字段名，表名等

### alter操作表字段
#### 重命名表
```
ALTER TABLE testalter_tbl RENAME TO alter_tbl;
```
#### 增加字段


```
alter table 表名 add 字段名 字段类型；
alter table student add name varchar（10）；
```
#### 修改字段

```
alter table 表名 change 旧字段名 新字段名 字段类型；
alter table student change name name varchar（20）not null default 'liming'；//修改字段类型
alter table student change name name1 varchar（20）not null default 'liming'；//修改字段名
```
#### 删除字段
```
alter table 表名 drop 字段名；
alter table student drop name；
```
### alter 索引操作
#### 增加索引
```
alter table 表名 add index 索引名 （字段名1，字段名2.....）；
alter table student add index stu_name（name）;
```
#### 删除索引
```
alter table 表名 drop index 索引名；
alter table student drop index stu_name；
```
     
#### 查看某个表的索引

     show index from 表名；

#### 增加唯一限制条件的索引
```
alter table 表名 add unique 索引名（字段名）；
```

### 主键操作

#### 增加主键：
```
alter table 表名 add primary key（字段名）；
```

## Count
COUNT 让我们能够数出在表格中有多少笔资料被选出来。
### 基本语法
```
SELECT COUNT("栏位")
FROM "表格名";
```
### 实例
举例来说，若我们要找出我们的示范表格中有几笔 store_name 栏不是空白的资料时，

Store_Name|	Sales|	Txn_Date
---------|-------|----
Los Angeles	|1500|	05-Jan-1999
San Diego	|250|	07-Jan-1999
Los Angeles	|300|	08-Jan-1999
Boston	|700	|08-Jan-1999
我们就打入，


```
SELECT COUNT (Store_Name)
FROM Store_Information
WHERE Store_Name IS NOT NULL;
```
结果:


```
COUNT (Store_Name)
4
```
COUNT 和 DISTINCT 经常被合起来使用，目的是找出表格中有多少笔不同的资料 (至于这些资料实际上是什么并不重要)。举例来说，如果我们要找出我们的表格中有多少个不同的 store_name，我们就打入， 

```
SELECT COUNT (DISTINCT Store_Name)
FROM Store_Information;
```
结果：
```
COUNT (DISTINCT Store_Name)
3
```


## Distinct
SELECT 指令让我们能够读取表格中一个或数个栏位的所有资料。这将把所有的资料都抓出，无论资料值有无重复。在资料处理中，我们会经常碰到需要找出表格内的不同资料值的情况。换句话说，我们需要知道这个表格/栏位内有哪些不同的值，而每个值出现的次数并不重要。这要如何达成呢？在 SQL 中，这是很容易做到的。我们只要在 SELECT 后加上一个 DISTINCT 就可以了。

### 基本语法
```
SELECT DISTINCT "栏位"
FROM "表格名";
```

## Where
### 基本语法### 基本语法
```
SELECT "栏位"
FROM "表格名"
WHERE "条件";
```


## And/Or
### 基本语法
```
SELECT "栏位"
FROM "表格名"
WHERE "简单条件"
{[AND|OR] "简单条件"}+;
```


## In
### 基本语法
```
SELECT "栏位"
FROM "表格名"
WHERE "栏位" IN ('值1', '值2', ...);
```


## Between
### 基本语法
```
SELECT "栏位"
FROM "表格名"
WHERE "栏位" BETWEEN '值1' AND '值2';
```


## Like
### 基本语法
```
SELECT "栏位"
FROM "表格名"
WHERE "栏位" LIKE {模式};
```


## Order By
### 基本语法
```
SELECT "栏位"
FROM "表格名"
[WHERE "条件"]
ORDER BY "栏位" [ASC, DESC];
```




## Group By
### 基本语法
```
SELECT "栏位1", SUM("栏位2")
FROM "表格名"
GROUP BY "栏位1";
```


## Having
### 基本语法
```
SELECT "栏位1", SUM("栏位2")
FROM "表格名"
GROUP BY "栏位1"
HAVING (栏位);
```




## Truncate Table
### 基本语法
```
TRUNCATE TABLE "表格名";
```

***@editor siluzhou***

