# PHP 魔术方法
> 

**参考链接**

[link1](http://blog.csdn.net/renzhenhuai/article/details/9393125)

[link2](http://www.codeceo.com/article/php-magic-method-and-var.html)

[英文版](http://www.oschina.net/translate/9-magic-methods-in-php?cmp)

[php.net](http://php.net/manual/zh/language.oop5.magic.php)
## 定义
PHP中把以两个下划线__开头的方法称为魔术方法，它是PHP中内置的语言特性，当程序执行到某种情况时，如果定义了这些魔术函数 (php手册中称之为“Overloading”)，则PHP会调用他们，同时也会传入相应的参数，可以认为是PHP执行过程中的钩子函数。在命名自己的类方法时不能使用这些方法名，除非是想使用其魔术功能。

在定义类方法时，除了下述魔术方法，建议不要以 __ 为前缀。 

魔术方法一般不会直接调用，比如构造函数与析构函数，在new 或者delete 一个类时被调用。比如__clone()函数，PHP提供了clone关键字，允许复制一个已有的对象，比如$c=clone $b,将创建于对象$b具有相同类的副本，而且具有相同的属性值，如果不需要克隆过来的默认行为自定义的话，需要在基类中创建一个__clone()方法，使用clone关键字时被调用。

## 常见魔术方法

- __construct()，类的构造函数
- __destruct()，类的析构函数
- __call()，在对象中调用一个不可访问方法时调用
- __callStatic()，用静态方式中调用一个不可访问方法时调用
- __get()，获得一个类的成员变量时调用
- __set()，设置一个类的成员变量时调用
- __isset()，当对不可访问属性调用isset()或empty()时调用
- __unset()，当对不可访问属性调用unset()时被调用。
- __sleep()，执行serialize()时，先会调用这个函数
- __wakeup()，执行unserialize()时，先会调用这个函数
- __toString()，类被当成字符串时的回应方法
- __invoke()，调用函数的方式调用一个对象时的回应方法
- __set_state()，调用var_export()导出类时，此静态方法会被调用。
- __clone()，当对象复制完成时调用
- __invoke()


## 常见魔术常量
- \__LINE__  返回文件中的当前行号。
- \__FILE__ 返回文件的完整路径和文件名。如果用在包含文件中，则返回包含文件名。自 PHP 4.0.2 起，\__FILE__ 总是包含一个绝对路径，而在此之前的版本有时会包含一个相对路径。
- \__FUNCTION__ 返回函数名称（PHP 4.3.0 新加）。自 PHP 5 起本常量返回该函数被定义时的名字（区分大小写）。在 PHP 4 中该值总是小写字母的。
- \__CLASS__ 返回类的名称（PHP 4.3.0 新加）。自 PHP 5 起本常量返回该类被定义时的名字（区分大小写）。在 PHP 4 中该值总是小写字母的。
- \__METHOD__ 返回类的方法名（PHP 5.0.0 新加）。返回该方法被定义时的名字（区分大小写）。

## 魔术方法详解
### __construct()
构造函数，实例化对象时被调用，
当__construct和以类名为函数名的函数同时存在时，__construct将被调用，另一个不被调用。

### __destruct()
析构函数
当删除一个对象或对象操作终止时被调用。

### __call() 和__callStatic()
对象调用某个方法，
若方法存在，则直接调用；
若不存在，则会去调用__call函数。
后者为静态方法。这两个方法我们在可变方法（Variable functions）调用中可能会用到。

__call()方法可以实现方法的重载，例如：
意思就是说当在一个对象中调用一个不可访问的方法（没有权限、不存在）时会触发这个函数，函数的参数$name是调用的函名，$arguments是调用的函数参数数组。看看下面这个例子：


```
class Test
{
    public function __call($name, $arguments)
    {
        echo "你调用了一个不存在的方法：\r";
        echo "函数名：{$name}\r";
        echo "参数： \r";
        print_r($arguments);
    }
}
```

```
$T = new Test();
$T->setrobottime("12", "18");
```
__call()方法必须有2个参数，一个包含了呗调用的方法的名称，第二个参数是传递给该方法的参数数组，可以根据这些决定调用哪一个方法。例如：
```
pubulc function __call($method,$p)
{
    if($method=="display") {
        if(is_object($p[0])) {
            $this->displayObject($p[0]);
        } else if (is_array($p[0])) {
            $this->displayArray($p[0]);
        } else {
            $this->displayScalar($p[0]);
        }
    }
}
            
```
根据参数决定调用哪个函数，如果是对象，调用displayObject，如果是数组，调用displayArray，如果是其余类型的，调用displayScalar。要调用以上代码，必须实例化__call()方法的类，然后再调用display()方法。

```
$ov=new overload;
$ov->display(array(1,2,3));
$ov->display('cat');
```
### __get()  __set()
读取、设置一个对象的属性时，
__get( $property ) 当调用一个未定义的属性时访问此方法
__set( $property, $value ) 给一个未定义的属性赋值时调用
这里的没有声明包括当使用对象调用时，访问控制为proteced,private的属性（即没有权限访问的属性）

### __isset() __unset()
__isset()检测一个对象的属性是否存在时被调用。如：isset($c->name)。
__unset() unset一个对象的属性时被调用。如：unset($c->name)。

### __toString()

__toString方法在将一个对象转化成字符串时自动调用，如echo $obj;或print $obj;将会打印__tostring()返回的全部内容。

如果类没有实现此方法，则无法通过echo打印对象，否则会显示：Catchable fatal error: Object of class test could not be converted to string in
此方法必须返回一个字符串

在PHP 5.2.0之前，__toString方法只有结合使用echo() 或 print()时 才能生效。PHP 5.2.0之后，则可以在任何字符串环境生效（例如通过printf()，使用%s修饰符），但 不能用于非字符串环境（如使用%d修饰符）。从PHP 5.2.0，如果将一个未定义__toString方法的对象 转换为字符串，会报出一个E_RECOVERABLE_ERROR错误。

例如：
```
class Print
{
    public $testone;
    public $testtwo;
    public function __toString() 
    {
        return (var_export($this,TRUE)); //var_export()函数打印出了类中的所有属性
    }
}
```


### __clone()

克隆对象时被调用。如：$t=new Test();$t1=clone $t;在调用此方法是对象会自动调用__clone魔术方法
如果在对象复制需要执行某些初始化操作，可以在__clone方法实现

### __sleep() __wakeup()

__sleep 串行化的时候用
__wakeup 反串行化的时候调用
serialize() 检查类中是否有魔术名称 __sleep 的函数。如果这样，该函数将在任何序列化之前运行。它可以清除对象并应该返回一个包含有该对象中应被序列化的所有变量名的数组。
使用 __sleep 的目的是关闭对象可能具有的任何数据库连接，提交等待中的数据或进行类似的清除任务。此外，如果有非常大的对象而并不需要完全储存下来时此函数也很有用。
相反地，unserialize() 检查具有魔术名称 __wakeup 的函数的存在。如果存在，此函数可以重建对象可能具有的任何资源。
使用 __wakeup 的目的是重建在序列化中可能丢失的任何数据库连接以及处理其它重新初始化的任务。


### __set_state()
调用var_export时，被调用。用__set_state的返回值做为var_export的返回值。
本方法的唯一参数是一个数组，其中包含按array(’property’ => value, …)格式排列的类属性。
### __autoload()
实例化一个对象时，如果对应的类不存在，则该方法被调用。通过调用此函数，脚本引擎在 PHP 出错失败前有了最后一个机会加载所需的类。
注意: 在 __autoload 函数中抛出的异常不能被 catch 语句块捕获并导致致命错误。

### __invoke()
当尝试以调用函数的方式调用一个对象时，__invoke 方法会被自动调用。
PHP5.3.0以上版本有效


***@editor : siluzhou***