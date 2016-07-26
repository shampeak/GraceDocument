# PHP时间与日期
> php时间日期函数介绍

参考网址

[w3](http://www.w3school.com.cn/php/php_date.asp)

[csdn](http://blog.csdn.net/everysmile/article/details/16842571)

[csdn](http://blog.csdn.net/qduningning/article/details/11939769)

#3 基本定义
- 时间戳

## 基本函数
- Date()：显示时间/日期
- mktime()：返回时期时间戳
- time()：time()为直接获取得到
- strtotime() ：将时间格式转为时间戳，参数为必填
- microtime()：返回当前的毫秒数


## 时间戳

时间戳（timestamp），通常是一个字符序列，唯一地标识某一刻的时间。

Unix时间戳(Unix timestamp)时间戳是指格林威治时间1970年01月01日00时00分00秒(北京时间1970年01月01日08时00分00秒)起至现在的总秒数

## Date()
PHP Date() 函数把时间戳格式化为更易读的日期和时间。

### 语法


```
date(format,timestamp)
```


参数 |	描述
----|----
format 	|必需。规定时间戳的格式。
timestamp|可选。规定时间戳。默认是当前时间和日期。

date() 函数的格式参数是必需的，它们规定如何格式化日期或时间。

下面列出了一些常用于日期/时间的字符：

- d - 表示月里的某天（01-31）
- m - 表示月（01-12）
- Y - 表示年（四位数）
- 1 - 表示周里的某天
- h - 带有首位零的 12 小时小时格式
- i - 带有首位零的分钟
- s - 带有首位零的秒（00 -59）
- a - 小写的午前和午后（am 或 pm）


其他字符，比如 "/", "." 或 "-" 也可被插入字符中，以增加其他格式。


### 实例


```
<?php
echo "今天是 " . date("Y/m/d") . "<br>";
echo "今天是 " . date("Y.m.d") . "<br>";
echo "今天是 " . date("Y-m-d") . "<br>";
echo "今天是 " . date("l");
echo "现在时间是 " . date("h:i:sa");
?>
```
**请注意 PHP date() 函数会返回服务器的当前日期/时间！**

如果从代码返回的不是正确的时间，有可能是因为您的服务器位于其他国家或者被设置为不同时区。

因此，如果您需要基于具体位置的准确时间，您可以设置要用的时区。

下面的例子把时区设置为 "Asia/Shanghai"，然后以指定格式输出当前时间：
### 实例


```
<?php
date_default_timezone_set("Asia/Shanghai");
echo "当前时间是 " . date("h:i:sa");
?>
```

## mktime()
mktime() 函数返回一个日期的 Unix 时间戳。

参数总是表示 GMT 日期，因此 is_dst 对结果没有影响。

参数可以从右到左依次空着，空着的参数会被设为相应的当前 GMT 值。
### 语法


```
mktime(hour,minute,second,month,day,year,is_dst)
```

参数 |	描述
---|---
hour 	|可选。规定小时。
minute |	可选。规定分钟。
second 	|可选。规定秒。
month |	可选。规定用数字表示的月。
day |	可选。规定天。
year |	可选。规定年。在某些系统上，合法值介于 1901 - 2038 之间。不过在 PHP 5 中已经不存在这个限制了。
is_dst 	

可选。如果时间在日光节约时间(DST)期间，则设置为1，否则设置为0，若未知，则设置为-1。

自 5.1.0 起，is_dst 参数被废弃。因此应该使用新的时区处理特性。

## time()

## strtotime($time)用法

echo strtotime('2012-03-22')，输出结果：1332427715（此处结果为随便写的，仅作说明使用）
echo strtotime(date('Y-d-m'))，输出结果：（结合date()，结果同上）（时间日期转换为时间戳）

strtotime()还有个很强大的用法，参数可加入对于数字的操作、年月日周英文字符，示例如下：

```
echo date('Y-m-d H:i:s',strtotime('+1 day'))，输出结果：2012-03-23 23:30:33（会发现输出明天此时的时间）
echo date('Y-m-d H:i:s',strtotime('-1 day'))，输出结果：2012-03-21 23:30:33（昨天此时的时间）
echo date('Y-m-d H:i:s',strtotime('+1 week'))，输出结果：2012-03-29 23:30:33（下个星期此时的时间）
echo date('Y-m-d H:i:s',strtotime('next Thursday'))，输出结果：2012-03-29 00:00:00（下个星期四此时的时间）
echo date('Y-m-d H:i:s',strtotime('last Thursday'))，输出结果：2012-03-15 00:00:00（上个星期四此时的时间）
```

## microtime()

microtime()方法，它会返回一个Array，包含两个元素：一个是秒数、一个是小数表示的毫秒数，我们可以通过此方法获取返回毫秒数，方法如下：


```
function getMillisecond() {
list($s1, $s2) = explode(' ', microtime());		
return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);	
}
```

### 参数

如果调用时不带可选参数，本函数以 "msec sec" 的格式返回一个字符串，其中 sec 是自 Unix 纪元（0:00:00 January 1, 1970 GMT）起到现在的秒数，msec 是微秒部分。字符串的两部分都是以秒为单位返回的。

如果给出了 get_as_float 参数并且其值等价于 TRUE，microtime() 将返回一个浮点数。

***@editor:  siluzhou***
