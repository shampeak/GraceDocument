# Composer 软件安装
> composer 软件安装

**软件名称：**

Composer-Setup

**版本号**

4.5.00


**下载网址**

[https://getcomposer.org/download/](https://getcomposer.org/download/)

![](http://i.imgur.com/B54BYmY.png)

**安装方法**
[http://jingyan.baidu.com/article/4f34706ed04013e386b56d72.html](http://jingyan.baidu.com/article/4f34706ed04013e386b56d72.html)

**开启PHP openssl**

windows下开启方法：

1： 首先检查php.ini中；extension=php_openssl.dll是否存在，如果存在的话去掉前面的注释符；'， 如果不存在这行，那么添加extension=php_openssl.dll。

2： 讲php文件夹下的： php_openssl.dll， ssleay32.dll， libeay32.dll 3个文件拷贝到 WINDOWS\system32\  文件夹下。

3： 重启apache或者iis(iisreset /restart)

至此，openssl功能就开启了。

***@editor siluzhou***