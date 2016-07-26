# html学习文档
> html学习文档

## 参考网站

[自强学堂html学习网站](http://www.ziqiangxuetang.com/html/html-tutorial.html)
## HTML 标签

HTML 标记标签通常被称为 HTML 标签 (HTML tag)。

1.    HTML 标签是由尖括号包围的关键词，比如 <html>
1.    HTML 标签通常是成对出现的，比如 <b> 和 </b>
1.    标签对中的第一个标签是开始标签，第二个标签是结束标签
1.    开始和结束标签也被称为开放标签和闭合标签


```
<标签>内容</标签>
```
## HTML版本

从初期的网络诞生后，已经出现了许多HTML版本:

版本|发布时间
---|---
HTML |	1991
HTML+ |	1993
HTML 2.0 |	1995
HTML 3.2 |	1997
HTML 4.01 |	1999
XHTML 1.0 |	2000
HTML5 |	2012
XHTML5 |	2013

## 基本概念
### HTML 标签

HTML 标记标签通常被称为 HTML 标签 (HTML tag)。

1. HTML 标签是由尖括号包围的关键词，比如 <html>
 2.   HTML 标签通常是成对出现的，比如 <b> 和 </b>
   3.  标签对中的第一个标签是开始标签，第二个标签是结束标签
4.    开始和结束标签也被称为开放标签和闭合标签

### HTML 元素
开始标签 * 	|元素内容 |	结束标签 *
--|--|--
<p> |	这是一个段落 |	</p>
<a href="default.htm"> |	这是一个链接 |	</a>
<br> ||	  	 

*开始标签常被称为起始标签（opening tag），结束标签常称为闭合标签（closing tag）。
## 基本语法
### 1. 标题

HTML 标题（Heading）是通过<h1> - <h6> 标签来定义的.<h1> 定义最大的标题。 <h6> 定义最小的标题。

```
<h1>这是一个标题</h1>
<h2>这是一个标题</h2>
<h3>这是一个标题</h3>
```

### 2. HTML 水平线

The <hr> 标签在 HTML 页面中创建水平线。

hr 元素可用于分隔内容。


```
<p>这是一个段落。</p>
<hr>
<p>这是一个段落。</p>
<hr>
<p>这是一个段落。</p>
```
### 3. HTML 注释

可以将注释插入 HTML 代码中，这样可以提高其可读性，使代码更易被人理解。浏览器会忽略注释，也不会显示它们。

注释写法如下:
实例

```
<!-- 这是一个注释 -->
```

### 4. HTML 段落

HTML 段落是通过标签 <p> 来定义的.


```
<p>这是一个段落。</p>
<p>这是另外一个段落。</p>
```
<br />表示换行，而<p>表示新的段落

### 5. 文本格式化
标签 |	描述
---|---
<b> |	定义粗体文本
<em> |	定义着重文字
<i> |	定义斜体字
<small> |	定义小号字
<strong> |	定义加重语气
<sub>	|定义下标字
<sup> |	定义上标字
<ins> |	定义插入字
<del> |	定义删除字
### 6. HTML 链接

HTML 链接是通过标签 <a> 来定义的.

超链接可以是一个字，一个词，或者一组词，也可以是一幅图像，您可以点击这些内容来跳转到新的文档或者当前文档中的某个部分。
默认情况下，链接将以以下形式出现在浏览器中：

-    一个未访问过的链接显示为蓝色字体并带有下划线
 -   访问过的链接显示为紫色并带上下划线
  -  点击链接时，链接显示为红色并带上下划线

```
<a href="url">Link text</a> 
<a href="http://www.ziqiangxuetang.com">这是一个链接</a>
```
### 7. html属性


属性 |	描述
---|---
accesskey| 	设置访问元素的键盘快捷键。
class |	规定元素的类名（classname）
contenteditableNew |	规定是否可编辑元素的内容。
contextmenuNew |	指定一个元素的上下文菜单。当用户右击该元素，出现上下文菜单
dir |	设置元素中内容的文本方向。
draggableNew| 	指定某个元素是否可以拖动
dropzoneNew |	指定是否将数据复制，移动，或链接，或删除
hiddenNew 	|hidden 属性规定对元素进行隐藏。
id |	规定元素的唯一 id
lang |	设置元素中内容的语言代码。
spellcheckNew| 	检测元素是否拼写错误
style 	|规定元素的行内样式（inline style）
tabindex |	设置元素的 Tab 键控制次序。
title 	|规定元素的额外信息（可在工具提示中显示）
translateNew |	指定是否一个元素的值在页面载入时是否需要翻译

### 8. html头部

标签|	描述
---|---
<head>|	定义了文档的信息
<title>|	定义了文档的标题
<base>	|定义了页面链接标签的默认链接地址
<link>|	定义了一个文档和外部资源之间的关系
<meta>	|定义了HTML文档中的元数据
<script>|	定义了客户端的脚本文件
<style>|	定义了HTML文档的样式文件

1. <title> - 定义了HTML文档的标题

- 使用 <title> 标签定义HTML文档的标题
- <title> 在 HTML/XHTML 文档中是必须的。

<title> 元素:

-   定义了浏览器工具栏的标题
-  当网页添加到收藏夹时，显示在收藏夹中的标题
- 显示在搜索引擎结果页面的标题

2. <base> - 定义了所有链接的URL

使用 <base> 定义页面中所有链接默认的链接目标地址。

```
<head>
<base href="http://www.ziqiangxuetang.com/images/" target="_blank">
</head>
```

3. <meta> - 提供了HTML文档的meta标记

使用 <meta> 元素来描述HTML文档的描述，关键词，作者，字符集等。

META元素通常用于指定网页的描述，关键词，文件的最后修改时间，作者，和其他元数据。

元数据可以使用浏览器（如何显示内容或重新加载页面），搜索引擎（关键词），或其他Web服务。


为搜索引擎定义关键词:

```
<meta name="keywords" content="HTML, CSS, XML, XHTML, JavaScript">
```


为网页定义描述内容:

```
<meta name="description" content="Free Web tutorials on HTML and CSS">
```


定义网页作者:

```
<meta name="author" content="Hege Refsnes">
```


每30秒 刷新一次当前页面:

```
<meta http-equiv="refresh" content="30">
```


4. <style> 标签定义了HTML文档的样式文件引用地址.

在<style> 元素中你需要指定样式文件来渲染HTML文档:

```
<head>
<style type="text/css">
body {background-color:yellow}
p {color:blue}
</style>
</head>
```

### 9. html CSS
CSS (Cascading Style Sheets) 用于渲染HTML元素标签的样式.
CSS 可以通过以下方式添加到HTML中:

-    内联样式- 在HTML元素中使用"style" 属性
-    内部样式表 -在HTML文档头部 <head> 区域使用<style> 元素 来包含CSS
-    外部引用 - 使用外部 CSS 文件
最好的方式是通过外部引用CSS文件.
#### 内联样式

当特殊的样式需要应用到个别元素时，就可以使用内联样式。 使用内联样式的方法是在相关的标签中使用样式属性。样式属性可以包含任何 CSS 属性。以下实例显示出如何改变段落的颜色和左外边距。

```
<p style="color:blue;margin-left:20px;">This is a paragraph.</p>
```

#### 内部样式表

当单个文件需要特别样式时，就可以使用内部样式表。你可以在<head> 部分通过 <style>标签定义内部样式表:

```
<head>
<style type="text/css">
body {background-color:yellow;}
p {color:blue;}
</style>
</head>
```

#### 外部样式表

当样式需要被应用到很多页面的时候，外部样式表将是理想的选择。使用外部样式表，你就可以通过更改一个文件来改变整个站点的外观。

```
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
```


### 10. HTML 图像

HTML 图像是通过标签 <img> 来定义的.

<img> 是空标签，意思是说，它只包含属性，并且没有闭合标签。

要在页面上显示图像，你需要使用源属性（src）。src 指 "source"。源属性的值是图像的 URL 地址。

```
<img src="url" alt="some_text"> 
<img src="ziqiangxuetang.png" width="104" height="142">
```
URL 指存储图像的位置。如果名为 "boat.gif" 的图像位于 www.w3school.com.cn 的 images 目录中，那么其 URL 为 http://www.w3school.com.cn/images/boat.gif。 

注意： 图像的名称和尺寸是以属性的形式提供的。

#### HTML 图像- Alt属性

alt 属性用来为图像定义一串预备的可替换的文本。

替换文本属性的值是用户定义的。

```
<img src="boat.gif" alt="Big Boat">
```


在浏览器无法载入图像时，替换文本属性告诉读者她们失去的信息。此时，浏览器将显示这个替代性的文本而不是图像。为页面上的图像都加上替换文本属性是个好习惯，这样有助于更好的显示信息，并且对于那些使用纯文本浏览器的人来说是非常有用的。

#### HTML 图像- 设置图像的高度与宽度

height（高度） 与 width（宽度）属性用于设置图像的高度与宽度。

属性值默认单位为像素:

```
<img src="pulpit.jpg" alt="Pulpit rock" width="304" height="228">
```


提示: 指定图像的高度和宽度的一个很好的习惯。如果图像指定了高度宽度，页面加载时就会保留指定的尺寸。如果没有指定图片的大小，加载页面时有可能会破坏HTML页面的整体布局。


### 11. HTML 表格


表格由 <table> 标签来定义。每个表格均有若干行（由 <tr> 标签定义），每行被分割为若干单元格（由 <td> 标签定义）。字母 td 指表格数据（table data），即数据单元格的内容。数据单元格可以包含文本、图片、列表、段落、表单、水平线、表格等等。/p>


```
<table border="1">
<tr>
<td>row 1, cell 1</td>
<td>row 1, cell 2</td>
</tr>
<tr>
<td>row 2, cell 1</td>
<td>row 2, cell 2</td>
</tr>
</table>
```



#### HTML 表格和边框属性

如果不定义边框属性，表格将不显示边框。有时这很有用，但是大多数时候，我们希望显示边框。

使用边框属性来显示一个带有边框的表格：
```
<table border="1">
...
</table>
```
#### HTML 表格表头

表格的表头使用 <th> 标签进行定义。

大多数浏览器会把表头显示为粗体居中的文本：

```
<table border="1">
<tr>
<th>Header 1</th>
<th>Header 2</th>
</tr>
<tr>
...
</tr>
</table>
```

#### HTML 表格标签
标签 |	描述
---|---
<table>| 	定义表格
<th> 	|定义表格的表头
<tr> |	定义表格的行
<td> |	定义表格单元
<caption> |	定义表格标题
<colgroup> |	定义表格列的组
<col> 	|定义用于表格列的属性
<thead> |	定义表格的页眉
<tbody> |	定义表格的主体
<tfoot> 	定义表格的页脚 

### 12. 列表
#### HTML无序列表

无序列表是一个项目的列表，此列项目使用粗体圆点（典型的小黑圆圈）进行标记。

无序列表使用 <li> 标签

```
<ul>
<li>Coffee</li>
<li>Milk</li>
</ul>
```


浏览器显示如下：

 -   Coffee
 -  Milk

#### HTML 有序列表

同样，有序列表也是一列项目，列表项目使用数字进行标记。 有序列表始于 <ol> 标签。每个列表项始于 <li> 标签。

列表项项使用数字来标记。

```
<ol>
<li>Coffee</li>
<li>Milk</li>
</ol>
```


浏览器中显示如下：

1.    Coffee
2.    Milk

#### HTML 自定义列表

自定义列表不仅仅是一列项目，而是项目及其注释的组合。

自定义列表以 <dl> 标签开始。每个自定义列表项以 <dt> 开始。每个自定义列表项的定义以 <dd> 开始。

```
<dl>
<dt>Coffee</dt>
<dd>- black hot drink</dd>
<dt>Milk</dt>
<dd>- white cold drink</dd>
</dl>
```


浏览器显示如下：

Coffee
    - black hot drink
Milk
    - white cold drink

注意事项 - 有用提示

示: 列表项内部可以使用段落、换行符、图片、链接以及其他列表等等。
#### HTML 列表标签
标签 	|描述
--|--
<ol> |	定义有序列表
<ul> |	定义无序列表
<li> |	定义列表项
<dl> |	定义定义列表
<dt> |	自定义列表项目
<dd> |	定义自定列表义的描述

### 13. HTML 区块

HTML 可以通过 <div> 和 <span>将元素组合起来。

#### HTML 区块元素

大多数 HTML 元素被定义为块级元素或内联元素。

块级元素在浏览器显示时，通常会以新行来开始（和结束）。

实例: <h1>, <p>, <ul>, <table>
#### HTML 内联元素

内联元素在显示时通常不会以新行开始。

实例: <b>, <td>, <a>, <img>
#### HTML <div> 元素

HTML <div> 元素是块级元素，它是可用于组合其他 HTML 元素的容器。

<div> 元素没有特定的含义。除此之外，由于它属于块级元素，浏览器会在其前后显示折行。

如果与 CSS 一同使用，<div> 元素可用于对大的内容块设置样式属性。

Another common use of the <div>元素可用于对大的内容块设置样式属性。<div> 元素的另一个常见的用途是文档布局。它取代了使用表格定义布局的老式方法。使用 <table> 元素进行文档布局不是表格的正确用法。<table> 元素的作用是显示表格化的数据。
HTML <span> 与元素

HTML <span> 元素是内联元素，可用作文本的容器

<span> 元素也没有特定的含义。

当与 CSS 一同使用时，<span> 元素可用于为部分文本设置样式属性。

### 14. html 布局
网站布局

大多数网站会把内容安排到多个列中（就像杂志或报纸那样）。

大多数网站可以使用 <div> 或者 <table> 元素来创建多列。CSS 用于对元素进行定位，或者为页面创建背景以及色彩丰富的外观。
虽然我们可以使用HTML table标签来设计出漂亮的布局，但是table标签是不建议作为布局工具使用的 

#### 使用<div> 元素

div 元素是用于分组 HTML 元素的块级元素。

下面的例子使用五个 div 元素来创建多列布局：


```
<!DOCTYPE html>
<html>
<body>

<div id="container" style="width:500px">

<div id="header" style="background-color:#FFA500;">
<h1 style="margin-bottom:0;">Main Title of Web Page</h1></div>

<div id="menu" style="background-color:#FFD700;height:200px;width:100px;float:left;">
<b>Menu</b><br>
HTML<br>
CSS<br>
JavaScript</div>

<div id="content" style="background-color:#EEEEEE;height:200px;width:400px;float:left;">
Content goes here</div>

<div id="footer" style="background-color:#FFA500;clear:both;text-align:center;">
Copyright </div>

</div>

</body>
</html>
```




上面的 HTML 代码会产生如下结果：
![](http://i.imgur.com/FDzCG3w.png)
#### 使用表格

使用 HTML <table> 标签是创建布局的一种简单的方式。

大多数站点可以使用 <div> 或者 <table> 元素来创建多列。CSS 用于对元素进行定位，或者为页面创建背景以及色彩丰富的外观。

即使可以使用 HTML 表格来创建漂亮的布局，但设计表格的目的是呈现表格化数据 - 表格不是布局工具！

下面的例子使用三行两列的表格 - 第一和最后一行使用 colspan 属性来横跨两列：
实例

```
<!DOCTYPE html>
<html>
<body>

<table width="500" border="0">
<tr>
<td colspan="2" style="background-color:#FFA500;">
<h1>Main Title of Web Page</h1>
</td>
</tr>

<tr>
<td style="background-color:#FFD700;width:100px;">
<b>Menu</b><br>
HTML<br>
CSS<br>
JavaScript
</td>
<td style="background-color:#EEEEEE;height:200px;width:400px;">
Content goes here</td>
</tr>

<tr>
<td colspan="2" style="background-color:#FFA500;text-align:center;">
Copyright</td>
</tr>
</table>

</body>
</html>
```
### 15.HTML 表单 

表单是一个包含表单元素的区域。

表单元素是允许用户在表单中输入内容,比如：文本域(textarea)、下拉列表、单选框(radio-buttons)、复选框(checkboxes)等等。

表单使用表单标签 <form> 来设置:

```
<form>
.
input elements
.
</form>
```


#### HTML 表单 - 输入元素

多数情况下被用到的表单标签是输入标签（<input>）。

输入类型是由类型属性（type）定义的。大多数经常被用到的输入类型如下：
1. 文本域（Text Fields）

文本域通过<input type="text"> 标签来设定，当用户要在表单中键入字母、数字等内容时，就会用到文本域。

```
<form>
First name: <input type="text" name="firstname"><br>
Last name: <input type="text" name="lastname">
</form>
```


注意:表单本身并不可见。同时，在大多数浏览器中，文本域的缺省宽度是20个字符。
2. 密码字段

密码字段通过标签<input type="password"> 来定义:

```
<form>
Password: <input type="password" name="pwd">
</form>
```



注意:密码字段字符不会明文显示，而是以星号或圆点替代。
3. 单选按钮（Radio Buttons）


```
<input type="radio"> 标签定义了表单单选框选项
<form>
<input type="radio" name="sex" value="male">Male<br>
<input type="radio" name="sex" value="female">Female
</form>
```



4. 复选框（Checkboxes）


```
<input type="checkbox"> 定义了复选框. 用户需要从若干给定的选择中选取一个或若干选项。
<form>
<input type="checkbox" name="vehicle" value="Bike">I have a bike<br>
<input type="checkbox" name="vehicle" value="Car">I have a car
</form>
```


5. 提交按钮(Submit Button)

<input type="submit"> 定义了提交按钮.

当用户单击确认按钮时，表单的内容会被传送到另一个文件。表单的动作属性定义了目的文件的文件名。由动作属性定义的这个文件通常会对接收到的输入数据进行相关的处理。:

```
<form name="input" action="html_form_action.php" method="get">
Username: <input type="text" name="user">
<input type="submit" value="Submit">
</form>
```



假如您在上面的文本框内键入几个字母，然后点击确认按钮，那么输入数据会传送到 "html_form_action.asp" 的页面。该页面将显示出输入的结果。 

#### HTML 表单标签


标签 |	描述
--|--
<form> |	定义供用户输入的表单
<input> |	定义输入域
<textarea>| 	定义文本域 (一个多行的输入控件)
<label> |	定义了 <input> 元素的标签，一般为输入标题
<fieldset>| 	定义了一组相关的表单元素，并使用外框包含起来
<legend> |	定义了 <fieldset> 元素的标题
<select> |	定义了下拉选项列表
<optgroup>| 	定义选项组
<option> |	定义下拉列表中的选项
<button> |	定义一个点击按钮
<datalist>New |	指定一个预先定义的输入控件选项列表
<keygen>New |	定义了表单的密钥对生成器字段
<output>New |	定义一个计算结果

### 16. HTML框架
通过使用框架，你可以在同一个浏览器窗口中显示不止一个页面

```
<iframe src="URL"></iframe>
```
该URL指向不同的网页。

**Iframe - 设置高度与宽度**

height 和 width 属性用来定义iframe标签的高度与宽度。

属性默认以像素为单位, 但是你可以指定其按比例显示 (如："80%").

```
<iframe src="demo_iframe.htm" width="200" height="200"></iframe
```

**Iframe - 移除边框**

frameborder 属性用于定义iframe表示是否显示边框。

设置属性值为 "0" 移除iframe的边框:

```
<iframe src="demo_iframe.htm" frameborder="0"></iframe>
```
使用iframe来显示目录链接页面

iframe可以显示一个目标链接的页面

目标链接的属性必须使用iframe的属性，如下实例:

```
<iframe src="demo_iframe.htm" name="iframe_a"></iframe>
<p><a href="http://www.ziqiangxuetang.com" target="iframe_a">ZiQiangXueTang.com</a></p>
```


### 17. 颜色
HTML 颜色由一个十六进制符号来定义，这个符号由红色、绿色和蓝色的值组成（RGB）。 

还有一些颜色有对应的颜色名

### 18. html脚本
JavaScript 使 HTML 页面具有更强的动态和交互性。
<script> 标签用于定义客户端脚本，比如 JavaScript。

<script> 元素既可包含脚本语句，也可通过 src 属性指向外部脚本文件。

JavaScript 最常用于图片操作、表单验证以及内容动态更新。

下面的脚本会向浏览器输出"Hello World!"：


```
<script>
document.write("Hello World!")
</script>
```


### 19. HTML 字符实体


HTML 中的预留字符必须被替换为字符实体。



在 HTML 中，某些字符是预留的。

在 HTML 中不能使用小于号（<）和大于号（>），这是因为浏览器会误认为它们是标签。

如果希望正确地显示预留字符，我们必须在 HTML 源代码中使用字符实体（character entities）。 字符实体类似这样：
&entity_name;

或
&#entity_number;

如需显示小于号，我们必须这样写：&lt; 或 &#60; 或 <

Tip: 使用实体名而不是数字的好处是，名称易于记忆。不过坏处是，浏览器也许并不支持所有实体名称（对实体数字的支持却很好）。

#### 不间断空格(Non-breaking Space)

HTML 中的常用字符实体是不间断空格(&nbsp;)。

浏览器总是会截短 HTML 页面中的空格。如果您在文本中写 10 个空格，在显示该页面之前，浏览器会删除它们中的 9 个。如需在页面中增加空格的数量，您需要使用 &nbsp; 字符实体。
#### 结合音标符

发音符号是加到字母上的一个"glyph(字形)"。

一些变音符号, 如 尖音符 (  ̀) 和 抑音符 (  ́) 。

变音符号可以出现字母的上面和下面，或者字母里面，或者两个字母间。

变音符号可以与字母、数字字符的组合来使用。

![](http://i.imgur.com/i2bMDIO.png)

HTML 实体实例

HTML 实体实例： 尝试一下
HTML字符实体

![](http://i.imgur.com/UqJvSAP.png)


