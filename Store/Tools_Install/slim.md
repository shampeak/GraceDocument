# slim
> slim 安装


**软件名称：**

slim

**版本号**
3.x


**下载网址**

https://github.com/slimphp/Slim
**安装方法**
1. 在github上下载slim工程，解压到WWW
2. 更新composer,安卓vendor
3. 将phpstudy中网站目录指向Slim中带有Index.php的example文件夹：其他选项菜单——phpstudy设置——端口设置

有的时候可能要在服务中关闭apache才能真正重启。
4. 更改index.php中导入autoload.php的默认位置，这是错误的，需要改为：
```
require '../vendor/autoload.php';
```
6. 设置正确后在浏览器中输入http://localhost/index.php会出现Welcome to Slim!


