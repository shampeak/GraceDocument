# PHP 换行符
>  

## 参考网站
[http://www.jb51.net/article/38413.htm](http://www.jb51.net/article/38413.htm)

[http://zhidao.baidu.com/link?url=O-NT1qLtSFGxe9raXv1qS48tfO50pg48f19mUkHbwY7HDNULGRc2g6bDa8lmcMctO0k0W8LnVJ9UkdKHsYNz7a](http://zhidao.baidu.com/link?url=O-NT1qLtSFGxe9raXv1qS48tfO50pg48f19mUkHbwY7HDNULGRc2g6bDa8lmcMctO0k0W8LnVJ9UkdKHsYNz7a)

## 功能

\n：换行 

\r：回车

## 说明

**\r 与\n的区别**

回车”（Carriage Return）和“换行”（Line Feed）这两个概念的来历和区别。
在计算机还没有出现之前，有一种叫做电传打字机（Teletype Model 33，Linux/Unix下的tty概念也来自于此）的玩意，每秒钟可以打10个字符。但是它有一个问题，就是打完一行换行的时候，要用去0.2秒，正好可以打两个字符。要是在这0.2秒里面，又有新的字符传过来，那么这个字符将丢失。

于是，研制人员想了个办法解决这个问题，就是在每行后面加两个表示结束的字符。一个叫做“回车”，告诉打字机把打印头定位在左边界；另一个叫做“换行”，告诉打字机把纸向下移一行。这就是“换行”和“回车”的来历，从它们的英语名字上也可以看出一二。

后来，计算机发明了，这两个概念也就被般到了计算机上。那时，存储器很贵，一些科学家认为在每行结尾加两个字符太浪费了，加一个就可以。于是，就出现了分歧。

Unix系统里，每行结尾只有“<换行>”，即"\n"；Windows系统里面，每行结尾是“<换行><回车 >”，即“\n\r”；Mac系统里，每行结尾是“<回车>”，即"\n"；。一个直接后果是，Unix/Mac系统下的文件在 Windows里打开的话，所有文字会变成一行；而Windows里的文件在Unix/Mac下打开的话，在每行的结尾可能会多出一个^M符号。

c语言编程时（windows系统）
\r 就是return 回到 本行行首 这就会把这一行以前的输出 覆盖掉。
如： (注以下是C++代码)
最后只显示 xixi 而 hahaha 背覆盖了

    int main ()
    {
    cout << "hahaha" << "\r" << "xixi" ;
    }

\n 是回车＋换行 把光标 先移到 行首 然后换到下一行 也就是 下一行的行首拉
复制代码 代码如下:

    int main()
    {
    cout << "hahaha" << "\n" << "xixi" ;
    }
    
**换行符的表现形式**
在普通文件里如（.txt,.php等）换行符是"\r\n", "\n", "\r"。但表现在HTML文件里时（这里说明一下：HTML的TEXTAREA文本域里的换行也是"\r"或“\n”）是“<br/>”标签。


//Order of replacement
    $str="Line1\nLine2\rLine3\r\nLine4\n";
    $order=array("\r\n","\n","\r");
    $replace='<br/>';
    $newstr=str_replace($order,$replace,$str); **

**php与html区别**

在php语言（或是其他语言，如C）中，用 \ 来代表转义操作，比如：
"\t" 代表 tab 制表符 (ASCII码为9),
"\n" 代表新的一行(ASCII码为10)

其用法示例如下：

    <?php
    echo "我是第1行。\n我是第2行。";
    echo "<pre>我是第1行。\n我是第2行。</pre>";
    ?>

在这个代码中，第1个echo 由于没有加 <pre></pre> 标签，所以在html中会显示：

我是第1行。我是第2行。

而第2个echo 会显示：

我是第1行。 <-------- 此处\n会输出为换行

我是第2行。

说明：\n会被php自动输出换行。 其实两个 echo 中的\n都输出换行，但由于html的特性，\n并不会显示（除非使用<br>进行转换 )。 


***@editor: siluzhou***