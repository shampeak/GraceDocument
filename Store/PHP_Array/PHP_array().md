# PHP数组
> PHP 常见数组函数

参考网址

[w3](http://www.w3school.com.cn/php/php_ref_array.asp)

[官方中文](http://php.net/manual/zh/language.types.array.php)


## 创建数组


```
$a = array(); //创建空数组；
$b = array(value1,value2,value3,etc.);//索引数组
$c = array(key=>value,key=>value,key=>value,etc.);//关联数组
```
自 PHP 5.4 起，可以使用短数组语法，用 [] 代替 array()。


```
$d = [key=>value,key=>value,key=>value,etc.];
```
 此外 key 会有如下的强制转换：

- 包含有合法整型值的字符串会被转换为整型。例如键名 "8" 实际会被储存为 8。但是 "08" 则不会强制转换，因为其不是一个合法的十进制数值。
- 浮点数也会被转换为整型，意味着其小数部分会被舍去。例如键名 8.7 实际会被储存为 8。
- 布尔值也会被转换成整型。即键名 true 实际会被储存为 1 而键名 false 会被储存为 0。
- Null 会被转换为空字符串，即键名 null 实际会被储存为 ""。
- 数组和对象不能被用为键名。坚持这么做会导致警告：Illegal offset type。

如果在数组定义中多个单元都使用了同一个键名，则只使用了最后一个，之前的都被覆盖了
## 常用数组函数

### count 
返回数组元素个数

```
$arr = Array('0','1','2','3','4');
echo count($arr);
// 输出 5
```
多维数组：

检测多维数组第一维的个数，count($arr)不同版本的php，统计的结果是不一样的；
后来在php手册中发现，count函数还有第二个参数，解释如下：
count函数有两个参数：
>-  0(或COUNT_NORMAL)为默认,不检测多维数组(数组中的数组);
>-  1(或COUNT_RECURSIVE)为检测多维数组

### in_array() 
函数搜索数组中是否存在指定的值
#### 语法

```
in_array(search,array,type)
```

参数 |	描述
---|----
search 	|必需。规定要在数组搜索的值。
array 	|必需。规定要搜索的数组。
type 	|可选。如果该参数设置为 TRUE，则in_array()函数检查搜索的数据与数组的值的类型是否相同。

技术细节| -   
---|---
返回值： |	如果在数组中找到值则返回 TRUE，否则返回 FALSE。
PHP 版本：| 	4+
更新日志 |	自 PHP 4.2 起，search 参数可以是一个数组。
#### 实例
```
$str = 1;
$arr = array(1,3,5,7,9);
$boolvalue = in_array($str,$arr);
```


### array_shift() 函数

#### 功能
将 array 的第一个单元移出并作为结果返回，将 array 的长度减一并将所有其它单元向前移动一位。所有的数字键名将改为从零开始计数，文字键名将不变。如果 array 为空（或者不是数组），则返回 NULL。

#### 语法


```
array_shift(array)
```

参数          |         描述
------------  |--------------
array         | 必需。规定数组。


#### 技术细节
返回值| PHP 版本
------|---------
返回从数组中删除元素的值，如果数组为空则返回 NULL|	4+

#### 示例代码

```
$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_shift($stack);
print_r($stack);
```


这将使 $stack 剩下 3 个单元：


```
Array
(
    [0] => banana
    [1] => apple
    [2] => raspberry
)
```


### array_pop()

#### 功能
弹出并返回 array 数组的最后一个单元，并将数组 array 的长度减一。如果 array 为空（或者不是数组）将返回 NULL。


#### 语法


```
array_pop(array)
```
参数| 	描述
----|-------
array| 	必需。规定数组。

#### 技术细节
返回值| PHP 版本
------|---------
返回数组的最后一个值，如果数组为空则返回 NULL|	4+
#### 示例代码

```
$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_pop($stack);
print_r($stack);
```


经过此操作后，$stack 将只有 3 个单元：


```
Array
(
    [0] => orange
    [1] => banana
    [2] => apple
)
```


并且 rasberry 将被赋给 $fruit。


### array_key_exists()

#### 功能
array_key_exists() 函数判断某个数组中是否存在指定的 key，如果该 key 存在，则返回 true，否则返回 false。



#### 语法


```
array_key_exists(key,array) 
```
参数| 	描述
----|-------
key |必需。规定键名。
array| 必需。规定输入的数组。 
### explode()

#### 功能
把字符串打散为数组



#### 语法


```
explode(separator,string,limit)
```
参数| 	描述
----|-------
separator |	必需。规定在哪里分割字符串。
string 	|必需。要分割的字符串。
limit 	|可选。规定所返回的数组元素的数目。
- 大于 0 - 返回包含最多 limit 个元素的数组
- 小于 0 - 返回包含除了最后的 -limit 个元素以外的所有元素的数组- 
- 0 - 返回包含一个元素的数组

注意：

"separator" 参数不能是空字符串。
### implode()

#### 功能
把数组元素合并为字符串

#### 语法


```
implode(separator,array)
```
参数| 	描述
----|-------
separator |	可选。规定数组元素之间放置的内容。默认是 ""（空字符串）。
array 	|必需。要组合为字符串的数组。

***@editor：siluzhou***
