# 命名空间
> 

参考网站：

[百度百科](http://baike.baidu.com/link?url=16qeRBar3zdEbatfn8FB7_lWqDuK-zY8uJYAYs-IN4QgqrxCLPUERWynDpvRcnQGqupsznAImCbMdDn1yIahFq)

[官方文档（中文）](http://php.net/manual/zh/language.namespaces.rationale.php)

[http://www.cnblogs.com/kuyuecs/p/3556421.html](http://www.cnblogs.com/kuyuecs/p/3556421.html)

## 定义

namespace即“命名空间”，也称“名称空间” 、”名字空间”。VS.NET中的各种语言使用的一种代码组织的形式 通过名称空间来分类，区别不同的代码功能 同时也是VS.NET中所有类的完全名称的一部分。

从广义上来说，命名空间是一种封装事物的方法。在很多地方都可以见到这种抽象概念。例如，在操作系统中目录用来将相关文件分组，对于目录中的文件来说，它就扮演了命名空间的角色。具体举个例子，文件 foo.txt 可以同时在目录/home/greg 和 /home/other 中存在，但在同一个目录中不能存在两个 foo.txt 文件。另外，在目录 /home/greg 外访问 foo.txt 文件时，我们必须将目录名以及目录分隔符放在文件名之前得到 /home/greg/foo.txt。这个原理应用到程序设计领域就是命名空间的概念。 
## WHY

命名空间是用来组织和重用代码的。如同名字一样的意思，NameSpace（名字空间），之所以出来这样一个东西，是因为人类可用的单词数太少，并且不同的人写的程序不可能所有的变量都没有重名现象，对于库来说，这个问题尤其严重，如果两个人写的库文件中出现同名的变量或函数(不可避免)，使用起来就有问题了。为了解决这个问题，引入了名字空间这个概念，通过使用 namespace xxx；你所使用的库函数或变量就是在该名字空间中定义的，这样一来就不会引起不必要的冲突了。

## PHP中的命名空间

 在PHP中，命名空间用来解决在编写类库或应用程序时创建可重用的代码如类或函数时碰到的两类问题：

1. 用户编写的代码与PHP内部的类/函数/常量或第三方类/函数/常量之间的名字冲突。
1. 为很长的标识符名称(通常是为了缓解第一类问题而定义的)创建一个别名（或简短）的名称，提高源代码的可读性。  

> 例：项目中有两个模块：article和message board，它们各自有一个处理用户留言的类Comment。之后我可能想要增加对所有用户留言的一些信息统计功能，比如说我想得到所有留言的数量。这时候调用它们Comment提供的方法是很好的做法，但是同时引入各自的Comment类显然是不行的，代码会出错，在另一个地方重写任何一个Comment也会降低维护性。那这时只能重构类名，我约定了一个命名规则，在类名前面加上模块名，像这样：Article_Comment、MessageBoard_Comment
> 可以看到，名字变得很长，那意味着以后使用Comment的时候会写上更多的代码（至少字符多了）。并且，以后如果要对各个模块增加更多的一些整合功能，或者是互相调用，发生重名的时候就需要重构名字。当然在项目开始的时候就注意到这个问题，并规定命名规则就能很好的避免这个问题。另一个解决方法可以考虑使用命名空间。

### **注明**

本文提到的常量：PHP5.3开始const关键字可以用在类的外部。const和define都是用来声明常量的（它们的区别不详述），但是在命名空间里，define的作用是全局的，而const则作用于当前空间。我在文中提到的常量是指使用const声明的常量。

### 创建一个命名空间

使用namespace关键字
    
    <?php
    //创建一个名为'Article'的命名空间
    namespace Article;
    ?>
    要注意的是，当前脚本文件的第一个命名空间前面不能有任何代码，下面的写法都是错误的：

    //例一
    //在脚本前面写了一些逻辑代码

    <?php
    $path = "/";
    class Comment { }
    namespace Article;
    ?>
    //例二
    //在脚本前面输出了一些字符
    <html></html>
    <?php
    namespace Article;
    ?>
为什么要说第一个命名空间呢？因为同一脚本文件中可以创建多个命名空间。

下面我创建了两个命名空间，顺便为这两个空间各自添加了一个Comment类元素：

    <?php
    //创建一个名为'Article'的命名空间
    namespace Article;
    //此Comment属于Article空间的元素
    class Comment { }
    //创建一个名为'MessageBoard'的命名空间
    namespace MessageBoard;
    //此Comment属于MessageBoard空间的元素
    class Comment { }
    ?>
    不同空间之间不可以直接调用其它元素，需要使用命名空间的语法：
    复制代码代码如下:
    <?php
    namespace Article;
    class Comment { }
    namespace MessageBoard;
    class Comment { }
    //调用当前空间（MessageBoard）的Comment类
    $comment = new Comment();
    //调用Article空间的Comment类
    $article_comment = new \Article\Comment();
    ?>
可以看到，在MessageBoard空间中调用article空间里的Comment类时，使用了一种像文件路径的语法： \空间名\元素名

除了类之外，对函数和常量的用法是一样的，下面我为两个空间创建了新的元素，并在MessageBoard空间中输出了它们的值。

    <?php
    namespace Article;
    const PATH = '/article';
    function getCommentTotal() {
    return 100;
    }
    class Comment { }
    namespace MessageBoard;
    const PATH = '/message_board';
    function getCommentTotal() {
    return 300;
    }
    class Comment { }
    //调用当前空间的常量、函数和类
    echo PATH; ///message_board
    echo getCommentTotal(); //300
    $comment = new Comment();
    //调用Article空间的常量、函数和类
    echo \Article\PATH; ///article
    echo \Article\getCommentTotal(); //100
    $article_comment = new \Article\Comment();
    ?>

### 子空间
命名空间的调用语法像文件路径一样是有道理的，它允许我们自定义子空间来描述各个空间之间的关系。
 
### 公共空间
我有一个common_inc.php脚本文件，里面有一些好用的函数和类：

    <?php
    function getIP() { }
    class FilterXSS { }
    ?>

在一个命名空间里引入这个脚本，脚本里的元素不会归属到这个命名空间。如果这个脚本里没有定义其它命名空间，它的元素就始终处于公共空间中：
复制代码代码如下:

    <?php
    namespace Blog\Article;
    //引入脚本文件
    include './common_inc.php';
    $filter_XSS = new FilterXSS(); //出现致命错误：找不到Blog\Article\FilterXSS类
    $filter_XSS = new \FilterXSS(); //正确
    ?>


调用公共空间的方式是直接在元素名称前加 \ 就可以了，否则PHP解析器会认为我想调用当前空间下的元素。除了自定义的元素，还包括PHP自带的元素，都属于公共空间。

要提一下，其实公共空间的函数和常量不用加 \ 也可以正常调用（不明白PHP为什么要这样做），但是为了正确区分元素，还是建议调用函数的时候加上 \

### 名称术语

在说别名和导入之前，需要知道关于空间三种名称的术语，以及PHP是怎样解析它们的。官方文档说得非常好，我就直接拿来套了。

1. 非限定名称，或不包含前缀的类名称，例如 $comment = new Comment();。如果当前命名空间是Blog\Article，Comment将被解析为Blog\Article\Comment。如果使用Comment的代码不包含在任何命名空间中的代码（全局空间中），则Comment会被解析为Comment。

1. 限定名称，或包含前缀的名称，例如 $comment = new Article\Comment();。如果当前的命名空间是Blog，则Comment会被解析为Blog\Article\Comment。如果使用Comment的代码不包含在任何命名空间中的代码（全局空间中），则Comment会被解析为Comment。

1. 完全限定名称，或包含了全局前缀操作符的名称，例如 $comment = new \Article\Comment();。在这种情况下，Comment总是被解析为代码中的文字名(literal name)Article\Comment。
 

其实可以把这三种名称类比为文件名（例如 comment.php）、相对路径名（例如 ./article/comment.php）、绝对路径名（例如 /blog/article/comment.php），这样可能会更容易理解。

我用了几个示例来表示它们：


    <?php
    //创建空间Blog
    namespace Blog;
    class Comment { }
    //非限定名称，表示当前Blog空间
    //这个调用将被解析成 Blog\Comment();
    $blog_comment = new Comment();
    //限定名称，表示相对于Blog空间
    //这个调用将被解析成 Blog\Article\Comment();
    $article_comment = new Article\Comment(); //类前面没有反斜杆\
    //完全限定名称，表示绝对于Blog空间
    //这个调用将被解析成 Blog\Comment();
    $article_comment = new \Blog\Comment(); //类前面有反斜杆\
    //完全限定名称，表示绝对于Blog空间
    //这个调用将被解析成 Blog\Article\Comment();
    $article_comment = new \Blog\Article\Comment(); //类前面有反斜杆\
    //创建Blog的子空间Article
    namespace Blog\Article;
    class Comment { }
    ?>


其实之前我就一直在使用非限定名称和完全限定名称，现在它们终于可以叫出它们的名称了。

### 别名和导入

别名和导入可以看作是调用命名空间元素的一种快捷方式。PHP并不支持导入函数或常量。

它们都是通过使用use操作符来实现：
复制代码代码如下:

    <?php
    namespace Blog\Article;
    class Comment { }
    //创建一个BBS空间（我有打算开个论坛）
    namespace BBS;
    //导入一个命名空间
    use Blog\Article;
    //导入命名空间后可使用限定名称调用元素
    $article_comment = new Article\Comment();
    //为命名空间使用别名
    use Blog\Article as Arte;
    //使用别名代替空间名
    $article_comment = new Arte\Comment();
    //导入一个类
    use Blog\Article\Comment;
    //导入类后可使用非限定名称调用元素
    $article_comment = new Comment();
    //为类使用别名
    use Blog\Article\Comment as Comt;
    //使用别名代替空间名
    $article_comment = new Comt();
    ?>


我注意到，如果导入元素的时候，当前空间有相同的名字元素将会怎样？显然结果会发生致命错误。


例：
复制代码代码如下:

    <?php
    namespace Blog\Article;
    class Comment { }
    namespace BBS;
    class Comment { }
    Class Comt { }
    //导入一个类
    use Blog\Article\Comment;
    $article_comment = new Comment(); //与当前空间的Comment发生冲突，程序产生致命错误
    //为类使用别名
    use Blog\Article\Comment as Comt;
    $article_comment = new Comt(); //与当前空间的Comt发生冲突，程序产生致命错误
    ?>


### 动态调用

PHP提供了namespace关键字和__NAMESPACE__魔法常量动态的访问元素，__NAMESPACE__可以通过组合字符串的形式来动态访问：

    <?php
    namespace Blog\Article;
    const PATH = '/Blog/article';
    class Comment { }
    //namespace关键字表示当前空间
    echo namespace\PATH; ///Blog/article
    $comment = new namespace\Comment();
    //魔法常量__NAMESPACE__的值是当前空间名称
    echo __NAMESPACE__; //Blog\Article
    //可以组合成字符串并调用
    $comment_class_name = __NAMESPACE__ . '\Comment';
    $comment = new $comment_class_name();
    ?>


### 字符串形式调用问题

上面的动态调用的例子中，我们看到了字符串形式的动态调用方式，如果要使用这种方式要注意两个问题。
1. 使用双引号的时候特殊字符可能被转义


```
<?php
    namespace Blog\Article;
    class name { }
    //我是想调用Blog\Article\name
    $class_name = __NAMESPACE__ . "\name"; //但是\n将被转义为换行符
    $name = new $class_name(); //发生致命错误
    ?>
```



2. 不会认为是限定名称

PHP在编译脚本的时候就确定了元素所在的空间，以及导入的情况。而在解析脚本时字符串形式调用只能认为是非限定名称和完全限定名称，而永远不可能是限定名称。
复制代码代码如下:

    <?php
    namespace Blog;
    //导入Common类
    use Blog\Article\Common;
    //我想使用非限定名称调用Blog\Article\Common
    $common_class_name = 'Common';
    //实际会被当作非限定名称，也就表示当前空间的Common类，但我当前类没有创建Common类
    $common = new $common_class_name(); //发生致命错误：Common类不存在
    //我想使用限定名称调用Blog\Article\Common
    $common_class_name = 'Article\Common';
    //实际会被当作完全限定名称，也就表示Article空间下的Common类，但我下面只定义了Blog\Article空间而不是Article空间
    $common = new $common_class_name(); //发生致命错误：Article\Common类不存在
    namespace Blog\Article;
    class Common { }
    ?>


### 总结
我对PHP的命名空间刚刚接触，也不能随便给一些没有实践的建议。我个人认为命名空间的作用和功能都很强大，如果要写插件或者通用库的时候再也不用担心重名问题。不过如果项目进行到一定程度，要通过增加命名空间去解决重名问题，我觉得工作量不会比重构名字少。也不得不承认它的语法会对项目增加一定的复杂度，因此从项目一开始的时候就应该很好的规划它，并制定一个命名规范。


***@editor:  siluzhou***