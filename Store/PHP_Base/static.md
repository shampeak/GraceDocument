# PHP static
> PHP 静态方法与属性

## 参考链接

## 概念
类：生成对象的模板，如class DbDriver{}

对象：由类生成，一般由对象作为活动组件，调用对象的方法，访问对象的属性。如：
```
$db= new DbDriver;
echo $db->version;
$res=$db->getAll($sql);
```
在实际中除了通过对象访问的方法与属性，还有可以通过类来访问的方法和属性，称为“静态”(static)，必须用static关键字声明。

## 声明
加static关键字
```
class StaticEp{
static public $Num=0;
static public function Hello() {
    print "hello";
}
```
## 访问
静态元素是通过类而不是对象访问，所以不需要引用对象的变量，而是用：：来连接类名与属性或者方法
```
print StaticEp::$Num;
StaticEp::Hello();
```
在当前类中访问，用self关键字指向当前类，类似于$this指向当前对象一样。在StaticEp内部访问，用：
```
self::$Num++;
```
## 优点
1. 在代码任何地方都可以用，不需要在对象间传递类的实例，也不需要将实例存在全局变量中就可以访问方法
2. 设置静态属性设置值可以被类的所有对象使用
3. 不需要实例对象就可以访问静态属性或方法，可以不用获取简单功能而实例化对象

## 注意：
1. 不能在对象中调用静态方法，因为静态方法和属性又称为类变量和属性，因此不能在静态方法中使用伪变量$this；
2. 为了兼容PHP4，如果没有指定“可见性”，属性和方法默认为public。 
3. 用::方式调用一个非静态方法会导致一个E_STRICT级别的错误。
4. 就像其它所有的PHP静态变量一样，静态属性只能被初始化为一个字符值或一个常量，不能使用表达式。 所以你可以把静态属性初始化为整型或数组，但不能指向另一个变量或函数返回值，也不能指向一个对象。 
5. 没有任何实例和属性的方法可以定义为static，可以不需要实例对象就可以访问。这些方法在类中会比在对象中更好用。
5. PHP5.3.0之后，我们可以用一个变量来动态调用类。但该变量的值不能为关键字self, parent 或static。

Example #1 静态成员代码示例
```
<?php
class Foo
{
    public static $my_static = 'foo';
    public function staticValue() {
        return self::$my_static;
    }
}

class Bar extends Foo
{
    public function fooStatic() {
        return parent::$my_static;
    }
}


print Foo::$my_static . " ";

$foo = new Foo();
print $foo->staticValue() . " ";
print $foo->my_static . " ";      // Undefined "Property" my_static 

print $foo::$my_static . " ";
$classname = 'Foo';
print $classname::$my_static . " "; // PHP 5.3.0之后可以动态调用

print Bar::$my_static . " ";
$bar = new Bar();
print $bar->fooStatic() . " ";
?>
```
Example #2 静态方法代码示例
```
<?php
class Foo {
    public static function aStaticMethod() {
        // ...
    }
}

Foo::aStaticMethod();
$classname = 'Foo';
$classname::aStaticMethod(); // As of PHP 5.3.0
?> 
```
