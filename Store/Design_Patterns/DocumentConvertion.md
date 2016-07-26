# PHP注释规范
> php注释规范介绍
## 文件注释

在每一个PHP文件的开头部分，要包含这个PHP文件的简述、详细功能描述、归属的包、作者和最后修改时间。

## PHP代码

在PHP文件的末尾，要包含该文件的修改记录。
　　
PHP代码
```
<?php   
/**  
 * $Log$  
 */  
?>  
```
##  注释标记

　　1、@abstract 说明当前类是一个抽象类。
　　使用范围：class, function, var
　　
@abstract使用范例
```　　
/**  
 * 这是一个绘五星图案的抽象类.  
 * @abstract  
 */  
  
class paint_start {   
  
    /**  
     * 绘制数量  
     * @abstract  
     */  
    var $number;   
  
    /**  
     * 绘制五星图案  
     * @abstract  
     */  
    function paint() {   
        ... ... ;   
    }   
}  
```
　　2、@access (public|private) 指明这个变量、类、函数/方法的存取权限。
　　使用范围：class, function, var, define, module
@access使用范例
```
/**  
 * 这是一个绘五星图案的抽象类.  
 * @abstract  
 * @access public  
 */  
class paint_start {   
  
    /**  
     * 绘制数量  
     * @abstract  
     * @access private  
     */  
    var $number;   
  
    /**  
     * 绘制五星图案  
     * @abstract  
     * @access    public  
     */  
    function paint() {   
        ... ... ;   
    }   
  
}  
```

　　3、@author Name [<email>] [, ...] 指明作者信息,依次是作者姓名，email地址，其他的通讯信息。如果有多个作者，按照其先后次序，使用多个@author依次列出。
　　使用范围：class, function, var, define, module, use
　　
@author使用范例

```
/**  
 * @author Night Sailer <night@hotmail.com>  
 * @author Lee Tester <tester@gnome.org>  
 */  
```

　　4、@brother (function()|$variable)、@sister (function()|$variable) 指出兄弟类、函数或者是变量.这些函数、类、变量等有相似的信息和并实现相同的功能。比如，调用和返回的参数的个数和类型相同，实现的功能也一样。这种情 况，你可以使用@brother 或者@sister指明它的兄弟函数，无须在重复书写函数的功能等信息了。
　　使用范围：class, function, var, define, module, use
brother使用范例
```
/**  
* 这是一个绘五星图案的抽象类.  
* @abstract  
* @access    public  
*/  
class paint_start {   
  
    /**  
     * 绘制数量  
     * @abstract  
     * @access    private  
     */  
    var $number;   
  
    /**  
     * 绘制五星图案  
     * @abstract  
     * @access    public  
     */  
    function paint() {   
        ... ... ;   
    }   
  
    /**  
     * @brother paint()   
     */  
    function draw() {   
        ... ... ;   
    }   
  
} 
```


5、@const[ant] label [description] 指明常量，用来说明PHP的define关键字定义的常量。
　　使用范围：define

6、@copyright description 指明版权信息。
使用范围：class, function, var, module, define, use

7、@deprecated label 指明不推荐或者是废弃的信息，或者这个函数只是为了保持兼容性而保留的，它不被推荐使用，如果它已经被其他函数替代，也要指出这个替代者。
　　使用范围：class, function, var, module, define, use
@deprecated使用范例
```
/**  
 * 过时的类  
 *  
 * @deprec 1.5-2000/12/06  
 * @access public  
 */  
function dontUseMeAnyMore() {   
    print "Don't use me any more. I have been deprecated.";   
}  
```

8、@final 指明这是一个最终的类、方法、属性，禁止派生、修改。
使用范围：class, function, var
@final使用范例
```
/**  
 * 圆周率   
 * @final  
 */  
var $PI = 3.1415926;  
```

9、@global (object objecttype|type) [$varname] [description] 指明在此函数中引用的全局变量。
使用范围：function
@global使用范例
```
/**  
 * @global array   $__used_files   已经include的文件列表  
 * @access public  
 */  
function include_once($filename) {   
    global $__used_files;   
  
    if (!isset($__used_files["include_once"][$filename]))   
    {   
        $__used_files["include_once"][$filename] = true;   
        include($filename);   
    }   
}  
```

　　10、@include description 指明包含的文件的信息。
　　使用范围：use
@include使用范例
```
/**  
 * 抽象绘图类的定义.  
 *  
 * @include   Function: _require_  
 */  
require("abstract.php");   
```

　　11、@link URL description 定义在线连接。
　　使用范围：class, function, var, module, define, use
>　　例如：@link http://www.hubing.info/ 戒烟如你's BLOG

　　12、@package label 定义归属的包的信息，label 是这个包的名字。
　　
>使用范围：class, module
>相同的包的名字的类在最终文档索引中将被分在一起。实际上，包还可以理解为不同的名字空间，虽然PHP没有名字空间的概念，但是你可以把相关的类、模 块都归属于同一个包，这样，相当于组织了一个名字空间，当然，你的应用框架可能会有不同的包，可惜的是，这种情况下从语法上是得不到名字空间这种保证的， 你只能通过人为地去避免不同的包的函数或者类重名。

　　13、@param (object objecttype|type) [$varname] [description] 定义函数或者方法的参数信息。这是最常使用的文档标记了。


**使用范围：function**
　　
- ojecttype 是对象的类名，type 指出这个参数的类型，它可以是下列类型：
- string 该参数是一个字符型变量。
- array 该参数是一个数组。
- integer 该参数是一个数值型。
- integer (octal) 该参数是一个数值型，并且是按照八进制方式存放。
- integer (hexadecimal) 该参数是一个数值型，并且是按照十六进制方式存放。
- boolean 该参数是一个布尔型。
- mixed 该参数的类型是可变的，可以上面几种类型的组合。不过，在随后的说明中一般要说明可以接受的变量的类型。
- $varname 是形参的名称
- [description] 是对于参数的说明。

 如果函数接受的是多个参数，那么要按照从左到右，依次用@param对齐列出。

　　14、@return (object objecttype|type) [$varname] 定义函数或者方法的返回信息。

>使用范围：function

>返回信息的类型同@param一样，$varname是返回变量的名称，可有可无。不同的是@return只有一个，不会出现多个@return。
　　
　　
@param和@return使用范例
```
/**  
 * @param  array    $tags   标签数组  
 * @param  string   $data   需要追加的字符串  
 * @param  integer  $lenth  允许的标签长度  
 *  
 * @return array    $rTags  返回的标签数组  
 */  
function doTags ($tags, $data, $lenth)   
{   
    ... ... ;   
    return $rTags;   
}  
```

　　15、@see (function()|$varname|((module|class)::)(function()|$varname)) [, ...] 定义需要参考的函数、变量，并加入相应的超级连接。
>　　使用范围：class, function, var, module, define, use
>　　这也是较常用的标记。对于相关的函数，变量，你可以使用@see来增加一个到相关函数和变量的链接。多个相关的函数、变量写在一行，中间用逗号来分隔。
>　　参考的函数、变量如果是当前类或模块的，那么你可以直接写函数、或者变量的名，如果是函数那么要在函数名后面加上括号（），变量名要加上$。需要注意的，这里所谓的变量名也应该是你用@var来说明过的。
>　　如果你想引用其他类或者其他模块的函数或者是变量，那么，你可以在函数名、变量名前面加上类或模块的名字作为范围指示，中间用::来分隔。

@see使用范例
```
/**  
 * @see $run_time,$idle_time,$begin_time,$end_time   
 * @see getRuntime(), getIdletime(),getBegintime(),getEndtime()   
 * @see TIME::$run_time, TIME::getBegintime()  
 */  
```
　　16、@since label 指明该api函数或者方法是从哪个版本开始引入的。
>　　使用范围：class, function, var, module, define, use

　　17、@static 指明变量、类、函数是静态的。
>　　使用范围：class, function, var

　　18、@throws exception [, exception] >指明此函数可能抛出的错误异常，极其发生的情况。
　　
> 使用范围：function

> 如果你预料到在这个函数中有产生异常的条件，那么你可以使用@throws标记来说明这些异常是什么，什么情况下产生异常。比如，读取磁盘文件出错，无法连接数据库，网络连接超时或者是在一些情况下，你"故意"抛出的异常等等。

　　19、@todo 指明应该改进或没有实现的地方。
>　　使用范围：class, function, module, use

　　20、@var (object objecttype|type) [$varname] [description] 定义说明变量/属性。
　　使用范围：var
　　
- object objecttype|type 定义你的变量的类型，同@param一样；
- $varname 该变量的名字，你可以从其他地方使用@see来引用这个名字；
- description 对变量的描述。


　　21、@version label 定义版本信息。
>使用范围：class, function, module, use
>你当然可以自己手工写这些版本信息，不过也可以使用CVS的$Id标记来自动标示你的版本信息。


***@editor： siluzhou***