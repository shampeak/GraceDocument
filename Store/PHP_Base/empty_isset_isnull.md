# PHP 判断是否为空函数比较
> PHP empty() vs isset() vs is_null()



## empty()
### 功能
检查一个变量是否为空

### 返回值：
- 若变量不存在则返回 TRUE
- 若变量存在且其值为""、0、"0"、NULL、、FALSE、array()、var $var;以及没有任何属性的对象，则返回 TURE
- 若变量存在且值不为""、0、"0"、NULL、、FALSE、array()、var $var; 以及没有任何属性的对象，则返回 FALSE
### 注意：
- empty()的返回值=!(boolean) var，但不会因为变量未定义而产生警告信息。参见转换为布尔值获取更多信息。
- empty() 只能用于变量，传递任何其它参数都将造成Paser error而终止运行。
检测常量是否已设置可使用 defined() 函数。 

## is_null()
### 功能
判断是否为空
### 返回值
- 如果变量不存在则返回TRUE
- 如果 var 是 null 则返回 TRUE
- 其余返回 FALSE。


## isset()
### 功能
检测变量是否设置
### 返回值
- 若变量不存在则返回 FALSE
- 若变量存在且其值为NULL，也返回 FALSE
- 其余均返回True
### 注意：
- 同时检查多个变量时，每个单项都符合上一条要求时才返回 TRUE，否则结果为 FALSE
- 使用 unset() 释放变量之后，它将不再是 isset()。
- PHP函数isset()只能用于变量，传递任何其它参数都将造成解析错误，检测常量是否已设置可使用 defined() 函数。

## 对比
设置常见变量形式观察输出

var|empty()|is_null()|isset()
-|--|--|--
var $x; (not set)|true| true| false
$x=null;|true| true| false
$x=false;|true| false| true
$x=true;|false| false| true
$x="";|true| false| true
$x=0;|true| false| true
$x=-1;|false| false| true
$x="0";|true| false| true
$x="1";|false| false| true
$x=array();|true| false| true
$x="foo"|false| false| true
$x="true";|false| false| true
$x="false";|false| false| true

可以看到，is_null和isset()两者是相反的，而empty()的条件则比is_null弱化很多

***@editor: siluzhou***