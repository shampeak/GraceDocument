#phpunit软件安装
> phpunit 软件安装

**软件名称：**

phpunit.phar

**版本号**

5.8.7


**下载网址**

http://www.phpunit.cn/

**安装方法**

在cmd里

composer global require "phpunit/phpunit=4.8.7"


**运行phpunit**

在测试类的目录中运行cmd
```
phpunit --bootstrap ../vendor/autoload.php DBTest
```

实际运行中要根据文件夹的位置更换目录
