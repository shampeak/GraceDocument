# PHP echo 函数学习文档
>   

## 参考网站
[php.net](http://php.net/manual/zh/function.echo.php)

[php 100函数库](http://www.php100.com/cover/php/415.html)

## 功能
(PHP 4, PHP 5)
echo — 输出一个或多个字符串

## 说明

     void echo ( string $arg1 [, string $... ] )

输出所有参数。

echo() 不是一个函数（它是一个语言结构）， 因此你不一定要使用小括号来指明参数，单引号，双引号都可以。 echo() （不像其他语言构造）不表现得像一个函数， 所以不能总是使用一个函数的上下文。 另外，如果你想给echo() 传递多个参数， 那么就不能使用小括号。

echo() 也有一个快捷用法，示例如下。在 PHP 5.4.0 之前，必须在php.ini 里面启用 short_open_tag 才有效。
	I have <?=$foo?> foo. 

## 

- `echo"<br>`"：<br>在HTML标签中表示换行
- ``<p></p>``：<p></p>标志对是用来创建一个段落，在此标志对之间加入的文本将按照段落的格式显示在浏览器上。另外，`<p>`标志还可以使用align属性，它用来说明对齐方式，语法是：`<p align=""></p>`。align可以是Left(左对齐)、Center(居中)和Right(右对齐)三个值中的任何一个。如`<p align="Center"></p>`表示标志对中的文本使用居中的对齐方式。

***@editor: siluzhou***