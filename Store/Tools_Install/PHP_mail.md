# PHP mail()配置
> php mail 配置
## 参考地址
[http://www.jb51.net/article/45684.htm](http://www.jb51.net/article/45684.htm)

## 软件名称：

sendmail

**版本号**


**安装方法**（尚未成功...）

1. 查找有没有sendmail：路径：D:\phpStudy\tools\sendmail
如果没有的话自行下载：下载 [sendmail.zip](http://xiazai.jb51.net/201204/tools/sendmail.zip)
2. 解压到任意路径，修改sendmail.ini

    smtp_server=smtp.qq.com

    smtp_port=25

    error_logfile=error.log

    debug_logfile=debug.log

    auth_username=***@qq.com

    auth_password=***

    force_sender=***@qq.com
1. 修改php.ini

       SMTP = smtp.qq.com

       smtp_port = 25

       sendmail_from = ***@qq.com

       sendmail_path = "D:/sendmail/sendmail.exe -t -i"

       mail.add_x_header = On
       
***@editor siluzhou***