# Bootstrap框架
> web 框架
## 参考网站

[百度百科](http://baike.baidu.com/link?url=IzCldFe7rLdWbAmA2AJJTkoStsS0ZuyUki1HHEWjscXeMXeKTl4Shp4joK6nhq9kYsF-D3ocj0XugJfXa1M7NX_eJxEzhBBt8UtSKINDTsK)

[中文官网](http://www.bootcss.com/)

## 概念
Bootstrap，来自 Twitter，是目前很受欢迎的前端框架。Bootstrap 是基于 HTML、CSS、JAVASCRIPT 的，它简洁灵活，使得 Web 开发更加快捷。[1]  它由Twitter的设计师Mark Otto和Jacob Thornton合作开发，是一个CSS/HTML框架。Bootstrap提供了优雅的HTML和CSS规范，它即是由动态CSS语言Less写成。Bootstrap一经推出后颇受欢迎，一直是GitHub上的热门开源项目，包括NASA的MSNBC（微软全国广播公司）的Breaking News都使用了该项目。[2]  国内一些移动开发者较为熟悉的框架，如WeX5前端开源框架等，也是基于Bootstrap源码进行性能优化而来。[3] 

## 下载&安装
- [下载用于生产环境的bootstrap](http://d.bootcss.com/bootstrap-3.3.5-dist.zip)
- [bootstrap源码](http://d.bootcss.com/bootstrap-3.3.5-dist.zip)
- 通过composer安装（不推荐）

```
composer require twbs/bootstrap
```
## 使用
1. 下载bootstrap样式表
2. 在html head文件中用link的方式引入.css样式表

```
<link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.2.0/css/bootstrap.min.css">
```
3. 在body中使用即可
## 使用实例

下面是一个使用bootstrap的基本html模板：包含 jquery.js、bootstrap.min.js 和 bootstrap.min.css 文件

源码：
```
<!DOCTYPE html>
<html>
   <head>
      <title>Bootstrap 模板</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

      <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
      <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <h1>Hello, world!</h1>

      <!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
      <script src="https://code.jquery.com/jquery.js"></script>
      <!-- 包括所有已编译的插件 -->
      <script src="js/bootstrap.min.js"></script>
   </body>
</html>
```
分别解释上述代码：
 1. DOCTYPE
```
<!DOCTYPE html>
```
Bootstrap 使用了一些 HTML5 元素和 CSS 属性。为了让这些正常工作，需要使用 HTML5 文档类型（Doctype）,因此开头需要加上这句代码。

如果在 Bootstrap 创建的网页开头不使用 HTML5 的文档类型（Doctype），可能会面临一些浏览器显示不一致的问题，甚至可能面临一些特定情境下的不一致，以致于代码不能通过 W3C标准的验证。

2. 移动设备优先
移动设备优先是 Bootstrap 3 的最显著的变化。

在之前的 Bootstrap 版本中（直到 2.x）需要手动引用另一个 CSS，才能让整个项目友好的支持移动设备。而现在，Bootstrap 3 默认的 CSS 本身就对移动设备友好支持。

为了让 Bootstrap 开发的网站对移动设备友好，确保适当的绘制和触屏缩放，需要在网页的 head 之中添加 viewport meta 标签：
```
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```
其中，width 属性控制设备的宽度。假设您的网站将被带有不同屏幕分辨率的设备浏览，那么将它设置为 device-width 可以确保它能正确呈现在不同设备上。

initial-scale=1.0 确保网页加载时，以 1:1 的比例呈现，不会有任何的缩放。

在移动设备浏览器上，通过为 viewport meta 标签添加 user-scalable=no 可以禁用其缩放（zooming）功能。

通常情况下，maximum-scale=1.0 与 user-scalable=no 一起使用。这样禁用缩放功能后，用户只能滚动屏幕，就能让您的网站看上去更像原生应用的感觉。

注意，这种方式我们并不推荐所有网站使用，还是要看您自己的情况而定！

3. link
```
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
```
用于引入Bootstrap文件
## Bootstrap UI 在线编辑器

有多款Bootstrap UI 在线编辑器，可以在线编辑
- [LayoutIt!](http://www.layoutit.com/)
LayoutIt！拥有拖拽接口的功能，能简单迅速的构建一个 Bootstrap 前端代码。LayoutIt！ 兼容任何的编程语言，允许用户下载 HTML ，在这里自由的进行编码设计
- Bootstrap Magic
- BootSwatchr
等等，不一一列举
