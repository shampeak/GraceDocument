# PHP 数组遍历
> PHP常见数组遍历函数以及比较
## 参考网站
[link1](http://www.jb51.net/article/29949.htm)


## 常见遍历方式
- for循环
- foreach循环
- 联合使用list,each,while循环

### for循环
最简单
#### 实例

```
$arr = array('http://www.jb51.net','脚本之家','PHP教程');
$num = count($arr);
for($i=0;$i<$num;++$i){
echo $arr[$i].'<br />';
}
```

#### 注意点
- for语句循环遍历数组要求遍历的数组必须是索引数组。PHP中不仅有关联数组而且还有索引数组，所以PHP中很少用for语句循环遍历数组。 
- 先求出数组长度然后再用for循环能够减少判断的次数

### foreach循环
主要有两种，常用的是第一种
#### 语法结构

```
foreach(array_expression as $value){
//循环体
}
```

#### 实例

```
$arr = array('http://www.jb51.net','脚本之家','PHP教程');
foreach($arr as $value){
echo $value.'<br />';
}
```

#### 语法结构


```
foreach(array_expression as $key=>$value){
//循环体
}
```

#### 实例

```
$arr = array('http://www.jb51.net','脚本之家','PHP教程');
foreach($arr as $k=>$v){
echo $k."=>".$v."<br />";
}

```
#### 注意
foreach语句会自动重置数组的指针位置，当foreach开始执行时，数组内部的指针会自动指向第一个单元。这意味着不需要在foreach循环前调用reset()函数。

### 联合使用list()、each()和while循环遍历数组
each()函数需要传递一个数组作为一个参数，返回数组中当前元素的键/值对，并向后移动数组指针到下一个元素的位置。
list()函数，这不是一个真正的函数，是PHP的一个语言结构。list()用一步操作给一组变量进行赋值。


#### 实例
```
//定义循环的数组
$arr = array('website'=>'http://www.jb51.net','webname'=>'脚本之家')
while(list($k,$v) = each($arr)){
echo $k.'=>'.$v.'<br />';
}
```

#### 注意
在使用while语句遍历数组之后，each()语句已经将传入的数组参数内部指针指向了数组末端。当再次使用while语句遍历同一个数组时，数组指针已经在数组的末端，each()语句直接返回FALSE，while语句不会被执行循环。只有在while语句执行之前调用reset()函数，重新将数组指针指定第一个元素。

## 性能比较
用1，000,000条数据进行测试。

首先测试读操作。遍历数组将元素的值赋值给一个常数$a模拟读操作。

- for循环：0.047979116439819
- foreach： 0.031476020812988
- while：0.31350088119507
可以看出foreach最快

再测试写操作。遍历数组在元素末尾加上"  ";

- for循环：0.090957880020142
- foreach:0.24792385101318
- while: 0.3662371635437

for循环最快，foreach其次，while最慢。


换成非索引的key值，测试foreach与while的写操作：
- foreach：0.69620800018311
- while: 0.74920797348022

还是foreach比较快=。=


***@editor: siluzhou***













































