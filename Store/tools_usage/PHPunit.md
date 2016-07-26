# PHPunit
> PHPunit 单元测试介绍



**参考网址**

[link1](http://www.bayescafe.com/php/getting-started-with-phpunit.html)

[link2](http://blog.csdn.net/fly_heart_yuan/article/details/6998603)

[link3](http://www.oschina.net/translate/php-unit-testing-with-phpunit)

[link4](http://blog.csdn.net/jucrazy/article/details/6720935)

## 基本步骤
- 编写类
- 编写测试类
- 启动测试


### 编写类：
例如一个最简单的类

```
class TruthTeller
{
    public function() tellTruth
    {
        return true;
    }
}
```

### 测试类：
测试类继承于PHPUnit_Framework_TestCase

测试类中的测试方法必须为public权限，一般以test开头，或者你也可以选择给其加注释@test来表明该函数为测试函数

例如上面的一个测试类
```
class TruthTester extends PHPUnit_Framework_TestCase
{
    function testTruthTeller()
    {
        $tt = new TruthTeller();
        $this->assertTrue($tt->tellTruth());
    }
}
```

### 启动测试
使用 命令行启动测试
在测试类的目录中运行cmd


```
phpunit --bootstrap ../vendor/autoload.php TruthTester
```

实际运行中要根据文件夹的位置更换目录

## 复杂情况
例如测试数组

```
class ArrayTeller
{
    public function outputArray()
    {
        return array(1,2,3);
    }
}
```

```
class ArrayTester extends PHPUnit_Framework_TestCase
{
    function testArrayTeller()
    {
        $at = new ArrayTeller();
        $result = $at->outputArray(1);
        $this->assertInternalType("array", $result);
        $this->assertCount(3, $result);
        $this->assertEquals(1, $result[0]);
        $this->assertEquals(3, $result[2]);
    }
}
```
phpunit可以进行多种断言检查，例如类型是否是数组，长度是否为3，数组某一项是否相等等。
## 高级功能

你是否已经厌烦了在每一个测试方法命名前面加一个test，是否因为只是调用的参数不同，却要写多个测试用例而纠结？我最喜欢的高级功能，现在隆重推荐给你，叫做框架生成器

待测试类：


```
<?php
class Calculator
{
    /**
     * @assert (0, 0) == 0
     * @assert (0, 1) == 1
     * @assert (1, 0) == 1
     * @assert (1, 1) == 2
     */
    public function add($a, $b)
    {
        return $a + $b;
    }
}
?>
```
原始类中的每个方法都进行@assert注解的检测。这些被转变为测试代码

测试类：
```
 /**
     * Generated from @assert (0, 0) == 0.
     */
    public function testAdd() {
        $o = new Calculator;
        $this->assertEquals(0, $o->add(0, 0));
    }
```
## setUp()
当你的测试需要覆盖越来越多的输入组合及数据设置时，使用函数： setUp 将会非常有帮助。setUp 是 PHPUnit_Framework_TestCase 类中你可以覆写以在类中所有及每个测试运行前运行的代码。（注意，还有一个简单的方法，tearDown，它会在所有测试结束后立即运行——这对关闭 socket 及文件指针很有帮助） 

setUp()完成初始化工作，简化代码
```
 function setUp()
  {
    $this->dt = new DataTeller($this->data);
  }
```
在这里的setUp()初始类简化测试
## 断言列表
### 特定类型判断


##### assertEmpty(mixed $actual[, string $message = ''])
断言$actual为空

    $this->assertEmpty(array('foo'));
##### assertNotEmpty()
与上条相反
##### assertNull(mixed $variable[, string $message = ''])
断言$variable的值为null
##### assertNotNull()
与上条相反
##### assertFalse(bool $condition[, string $message = ''])
断言$condition的结果为false
##### assertTrue(bool $condition[, string $message = ''])
断言$condition的结果为true

### 比较大小
##### assertEquals(mixed $expected, mixed $actual[, string $message = ''])
断言复合类型$actual与$expected相同
##### assertNotEquals()
与上条相反
##### assertSame(mixed $expected, mixed $actual[, string $message = ''])
断言$actual和$expected的类型和值相同,或者对象相同

     $this->assertSame('2204', 2204);
    $this->assertSame(new stdClass, new stdClass);
##### assertNotSame()
与上条相反


##### assertGreaterThan(mixed $expected, mixed $actual[, string $message = ''])
断言$actual大于$expected
##### assertGreaterThanOrEqual(mixed $expected, mixed $actual[, string $message = ''])
断言$actual大于等于$expected

```
    $this->assertGreaterThan(2, 1);
   ```
##### assertLessThan(mixed $expected, mixed $actual[, string $message = ''])
断言$actual小于$expected

##### assertLessThanOrEqual(mixed $expected, mixed $actual[, string $message = ''])
断言$actual小于等于$expected


### 类属性比较

##### assertAttributeEmpty() 和 assertAttributeNotEmpty()
断言对象的所有属性为空或不为空
##### assertAttributeEquals() and assertAttributeNotEquals()
断言类属性$actual与$expected相同
##### assertClassHasAttribute(string $attributeName, string $className[, string $message = '']) 
断言类$className含有属性$attributeName
 
```
$this->assertClassHasAttribute('foo', 'stdClass');
```
##### assertClassNotHasAttribute() 
与上条相反

##### assertClassHasStaticAttribute(string $attributeName, string $className[, string $message = ''])
断言类$className含有静态属性$attributeName

    $this->assertClassHasStaticAttribute('foo', 'stdClass');
    
##### assertAttributeContains(mixed $needle, Class|Object $haystack[, string $message = ''])
断言$needle为一个类/对象$haystack可访问到的属性(public, protected 和 private)

##### assertAttributeNotContains()
与上条相反
##### assertAttributeContainsOnly() 和 assertAttributeNotContainsOnly()
断言对象的属性只有$type类型和非含有$type类型

##### assertAttributeGreaterThan()
断言类的属性用，public,private 之类

##### assertAttributeGreaterThanOrEqual()
断言类的属性,public,private 之类
##### assertInstanceOf($expected, $actual[, $message = '']) 
断言$actual为$expected的实例

      $this->assertInstanceOf('RuntimeException', new Exception);
##### assertNotInstanceOf()
与上相反
##### assertAttributeInstanceOf() and assertAttributeNotInstanceOf()
断言类属性用
##### assertInternalType($expected, $actual[, $message = ''])
断言$actual的类型为$expected

    $this->assertInternalType('string', 42);
##### assertNotInternalType()
与上相反
##### assertAttributeInternalType() and assertAttributeNotInternalType()
断言类属性用
##### assertAttributeLessThan()
断言类属性小于$expected

##### assertAttributeLessThanOrEqual()
断言类属性小于等于$expected

##### assertObjectHasAttribute(string $attributeName, object $object[, string $message = ''])
断言$object含有属性$attributeName
##### assertObjectNotHasAttribute()
与上条相反
### 数组比较
##### assertCount($expectedCount, $haystack[, string $message = ''])
判断长度是否相同

    $this->assertCount(0, array('foo'));


##### assertArrayHasKey(mixed $key, array $array[, string $message = ''])
断言数组$array含有索引$key, $message用于自定义输出的错误信息,后同

```
$this->assertArrayHasKey('foo', array('bar' => 'baz'));
```
##### assertContains(mixed $needle, Iterator\|array $haystack[, string $message = ''])
断言迭代器对象$haystack/数组$haystack含有$needle

    $this->assertContains(4, array(1, 2, 3));

还可以用来判断两条字符串，前者是否是后者的子串

    $this->assertContains('baz', 'foobar');
##### assertNotContains()
与上条相反

##### assertContainsOnly(string $type, Iterator|array $haystack[, boolean $isNativeType = NULL, string $message = ''])
断言迭代器对象/数组$haystack中只有$type类型的值, $isNativeType 设定为PHP原生类型，$message同上
 
```
$this->assertContainsOnly('string', array('1', '2', 3));
```

##### assertNotContainsOnly()
与上条相反
##### assertTag(array $matcher, string $actual[, string $message = '', boolean $isHtml = TRUE])
断言$actual的内容符合$matcher的定义

### 字符串
#### assertStringEndsWith(string $suffix, string $string[, string $message = ''])
断言$string的末尾为$suffix结束

    $this->assertStringEndsWith('suffix', 'foo');
    
#### assertStringEndsNotWith()
与上条相反
#### assertStringStartsWith(string $prefix, string $string[, string $message = ''])
断言$string的开头为$suffix

     $this->assertStringStartsWith('prefix', 'foo');
#### assertStringStartsNotWith()
与上条相反


#### assertRegExp(string $pattern, string $string[, string $message = ''])
断言字符串$string符合正则表达式$pattern
#### assertNotRegExp()
与上条相反
#### assertStringMatchesFormat(string $format, string $string[, string $message = ''])
断言$string符合$format定义的格式，例如 %i %s等等

    $this->assertStringMatchesFormat('%i', 'foo');
#### assertStringNotMatchesFormat()
与上条相反

### 文件判断



##### assertFileEquals(string $expected, string $actual[, string $message = ''])

    $this->assertFileEquals('/home/sb/expected', '/home/sb/actual');
断言文件$actual和$expected相同
##### assertFileExists(string $filename[, string $message = ''])
断言文件$filename存在

    $this->assertFileExists('/path/to/file');
##### assertFileNotExists()
与上条相反





#### assertStringMatchesFormatFile(string $formatFile, string $string[, string $message = ''])
断言$string路径的文件的格式和$formatFile文件的格式相同

    this->assertStringMatchesFormatFile('/path/to/expected.txt', 'foo');
#### assertStringNotMatchesFormatFile()
与上条相反

#### assertAttributeSame() and assertAttributeNotSame()
断言类属性用
### 文档比较

##### assertSelectCount(array $selector, integer $count, mixed $actual[, string $message = '', boolean $isHtml = TRUE])
断言在$actual文档中（格式为html或xml）css选择器$selector有$count个，或有符合$selector的元素（设定$count为true），或没有符合$selector的元素（设定$count为false）

```

assertSelectCount("#binder", true, $xml); // 有一个就行
assertSelectCount(".binder", 3, $xml); // 必须有3个?
```

##### assertSelectEquals(array $selector, string $content, integer $count, mixed $actual[, string $message = '', boolean $isHtml = TRUE])
断言在文档$actual中有符合根据$selector的找到符合$content的$count个元素，当$count等于true和false的时候作用如下：

```
assertSelectEquals("#binder .name", "Chuck", true,  $xml);  // 所有的name等于Chuck   assertSelectEquals("#binder .name", "Chuck", false, $xml);  // 所有的name不等于Chuck
```


##### assertStringEqualsFile(string $expectedFile, string $actualString[, string $message = ''])
断言$actualString在文件$expectedFile的内容中

     $this->assertStringEqualsFile('/home/sb/expected', 'actual');
##### assertStringNotEqualsFile()
与上条相反





### 其他
#### assertEqualXMLStructure(DOMNode $expectedNode, DOMNode $actualNode[, boolean $checkAttributes = FALSE, string $message = ''])
断言Dom节点$actualNode和DOM节点$expectedNode相同，$checkAttributes FALSE 不断言节点属性，TRUE则断言属性$message同上

```
$expected = new DOMElement('foo');
$actual = new DOMElement('bar');
$this->assertEqualXMLStructure($expected, $actual);
```

***@editor siluzhou***