# PHP预定义接口
> PHP预定义接口

**参考链接**
[link1](http://www.jb51.net/article/70193.htm)
## 比较常见的接口


- IteratorAggregate（聚合式aggregate迭代器Iterator）
- Countable
- ArrayAccess
- Iterator

## IteratorAggregate 聚合式迭代器接口
### 主要功能
这个接口实现了一个功能——创建外部迭代器，当我们使用foreach对对象进行便遍历的时候，如果没有继承IteratorAggregate接口，遍历的是对象中所有的public属性(只能是public $var这种形式)。要是继承了IteratorAggregate，会使用类中实现的getIterator方法返回的对象，这里要注意返回的一定要是一个Traversable对象或者扩展自Traversable的对象，否则会抛出异常

### 接口代码如下：
```
IteratorAggregate extends Traversable {
 abstract public Traversable getIterator(void)
}
```
### 实例
	

```
class My{
 private $_data = [
 'a' => '燕睿涛',
 'b' => 'yanruitao',
 'c' => 'LULU',
 ];
  
 public function getIterator()
 {
 return new ArrayIterator($this->_data);
 }
}
$obj = new My;
foreach ($obj as $key => $value) {
 echo "$key => $value\n";
}
//输出结果为空 
 
class My implements IteratorAggregate {
 private $_data = [
 'a' => '燕睿涛',
 'b' => 'yanruitao',
 'c' => 'LULU',
 ];
 
 public function getIterator()
 {
 return new ArrayIterator($this->_data);
 }
}
$obj = new My;
foreach ($obj as $key => $value) {
 echo "$key => $value\n";
}
```

//结果：

```
a => 燕睿涛
b => yanruitao
c => LULU
```


## Countable接口
### 功能
这个接口用于统计对象的数量，当我们对一个对象调用count的时候，如果函数没有继承Countable将一直返回1，如果继承了Countable会返回所实现的count方法所返回的数字

### 接口代码


```
Countable {
 abstract public int count(void)
}
```
### 实例
	

```
class CountMe
{ 
 protected $_myCount = 3; 
 
 public function count() 
 { 
 return $this->_myCount; 
 } 
} 
 
$countable = new CountMe(); 
echo count($countable);
//返回1
 
class CountMe implements Countable
{ 
 protected $_myCount = 3; 
 
 public function count() 
 { 
 return $this->_myCount; 
 } 
} 
 
$countable = new CountMe(); 
echo count($countable); 
//返回3
``` 
 
## ArrayAccess接口
### 功能
这个接口的作用是让我们可以像访问数组一样访问对象，就是可以通过中括号索引方式访问元素的能力 

### 接口代码

```
ArrayAccess {
 abstract public boolean offsetExists(mixed $offset)
 abstract public mixed offsetGet(mixed $offset)
 public void offsetSet(mixed $offset, mixed $value)
 public void offsetUnset(mixed $offset)
}
```
### 实例

```	
class myObj
{
  
}
$obj = new myObj;
$obj['name'];
//Fatal error: Cannot use object of type myObj as array in 
 
class myObj implements ArrayAccess 
{
 public function offsetSet($offset, $value)
 {
  echo "offsetSet : {$offset} => {$value}\n";
 }
 
 public function offsetExists($offset)
 {
  echo "offsetExists : {$offset}\n";
 }
 
 public function offsetUnset($offset)
 {
  echo "offsetUnset : {$offset}\n";
 }
 
 public function offsetGet($offset)
 {
  echo "offsetGet : {$offset}\n";
 }
}
$obj = new myObj;
$obj[1] = '燕睿涛';
isset($obj['name']);
unset($obj['name']);
$obj['yrt'];
 
//输出结果：
offsetSet : 1 => 燕睿涛
offsetExists : name
offsetUnset : name
offsetGet : yrt
 
class myObj implements ArrayAccess 
{
 private $_data = [];
 public function offsetSet($offset, $value)
 {
  $this->_data[$offset] = $value;
 }
 
 public function offsetExists($offset)
 {
  return isset($this->_data[$offset]);
 }
 
 public function offsetUnset($offset)
 {
  unset($this->_data[$offset]);
 }
 
 public function offsetGet($offset)
 {
  return $this->_data[$offset];
 }
}
 
$obj = new myObj;
$obj['yrt'] = '燕睿涛';
var_dump($obj['yrt']);
var_dump(isset($obj['yrt']));
unset($obj['yrt']);
var_dump(isset($obj['yrt']));
var_dump($obj['yrt']);
 
//输出：
string(9) "燕睿涛"
bool(true)
bool(false)
Notice: Undefined index: yrt //最后一个会报出Notice
```


上面的对象只能是基本的数组操作，连遍历都不行，结合之前的IteratorAggregate可以进行foreach:

```	
class myObj implements ArrayAccess, IteratorAggregate
{
private $_data = [];
 
 public function getIterator()
 {
  return new ArrayIterator($this->_data);
 }
 
 ......
}
$obj = new myObj;
$obj['yrt'] = '燕睿涛';
$obj[1] = '燕睿涛';
$obj['name'] = '燕睿涛';
$obj['age'] = 23;
 
foreach ($obj as $key => $value) {
 echo "{$key} => {$value}\n";
}
//输出：
yrt => 燕睿涛
1 => 燕睿涛
name => 燕睿涛
age => 23
```
## Iterator接口：
### 接口功能
可在内部迭代自己的外部迭代器或类的接口，这是官方文档给出的解释，看着还是不好理解，其实我感觉这个接口实现的功能和trratorAggregate（文档：创建外部迭代器接口，接口直接返回一个迭代器）类似，不过这个在类的定义里面自己实现了

### 接口代码


```
Iterator extends Traversable {
    abstract public mixed current(void)
    abstract public scalar key(void)
    abstract public void next(void)
    abstract public void rewind(void)
    abstract public boolean valid(void)
}
```
### 接口实例


	

```
class myObj implements Iterator{
 
 private $_data = [];
 
 public function __construct(Array $arr)
 {
 $this->_data = $arr;
 }
 
 public function current()
 {
 return current($this->_data);
 }
 
 public function key()
 {
 return key($this->_data);
 }
 
 public function next()
 {
 next($this->_data);
 }
 
 public function rewind()
 {
 reset($this->_data);
 }
 
 public function valid()
 {
 return $this->key() !== NULL;
 }
}
 
$t = [
 'yrt' => '燕睿涛',
 'name' => '燕睿涛',
 false,
 '燕睿涛'
];
$obj = new myObj($t);
 
foreach ($obj as $key => $value) {
 echo "{$key} => ".var_export($value, true)."\n";
}
//输出：
yrt => '燕睿涛'
name => '燕睿涛'
0 => false
1 => '燕睿涛'
```




总结
说了这么多好像还是没有体会到他们的用处，建议看看Yii2的源码，源码里面大量使用了这些东西，看了之后，你会慢慢觉得“哦~好像还真是挺有用的。。。。

***@editor： siluzhou***