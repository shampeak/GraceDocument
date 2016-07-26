# JSON语法
> JSON语法学习介绍

## 参考网站
[http://www.cnblogs.com/mcgrady/archive/2013/06/08/3127781.html](http://www.cnblogs.com/mcgrady/archive/2013/06/08/3127781.html)

[http://www.w3school.com.cn/json/json_syntax.asp](http://www.w3school.com.cn/json/json_syntax.asp)

## 概念

- JSON：JavaScript 对象表示法（JavaScript Object Notation）。
- JSON 是存储和交换文本信息的语法。类似 XML。
- JSON 比 XML 更小、更快，更易解析。

## 语法结构
### 规则
JSON 语法是 JavaScript 对象表示法语法的子集。
- 数据在名称/值对中
- 数据由逗号分隔
- 花括号保存对象
- 方括号保存数组

### Json 名称/值对
JSON 数据的书写格式是：名称/值对。

名称/值对包括字段名称（在双引号中），后面写一个冒号，然后是值：


	“firstName": "John"

等价于JavaScript：

	firstName="John";

### Json 值

JSON 值可以是：

- 数字（整数或浮点数）
- 字符串（在双引号中）
- 逻辑值（true 或 false）
- 数组（在方括号中）
- 对象（在花括号中）
- null

### JSON对象

对象结构以”{”大括号开始，以”}”大括号结束。中间部分由0或多个以”，”分隔的”key(关键字)/value(值)”对构成，关键字和值之间以”：”分隔，语法结构如代码。

	{
    	key1:value1,
    	key2:value2,
    	...
	}

其中关键字是字符串，而值可以是字符串，数值，true,false,null,对象或数组。

	{ "firstName":"John" , "lastName":"Doe" }
这一点也容易理解，与这条 JavaScript 语句等价：

	firstName = "John"
	lastName = "Doe"

### JSON数组

数组结构以”[”开始，”]”结束。中间由0或多个以”，”分隔的值列表组成，数组里可以包含多个对象，语法结构：

	[
    	{
        	key1:value1,
        	key2:value2 
    	},
    	{
         	key3:value3,
         	key4:value4   
    	}
	]
举例，对象 "employees" 是包含三个对象的数组。每个对象代表一条关于某人（有姓和名）的记录。

	{
	"employees": [
	{ "firstName":"John" , "lastName":"Doe" },
	{ "firstName":"Anna" , "lastName":"Smith" },
	{ "firstName":"Peter" , "lastName":"Jones" }
	]
	}
***@editor siluzhou***