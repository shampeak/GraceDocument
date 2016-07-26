# MYSQL编码
> MYSQL编码规范

## 参考网址
[百度百科UTF-8](http://baike.baidu.com/link?url=BK7d_TglazMY7s36MCQ9DwjH_tyoEO_rmvd-ol5DiqcE3HcRLLR4bGP5pY_8MkDN_22sW-Kgtyo3RyTs7-JSoq)

mysql中有很多编码，简单介绍各种编码格式：

1. UTF-8

## UTF-8
UTF-8（8-bit Unicode Transformation Format）是一种针对Unicode的可变长度字符编码，又称万国码。由Ken Thompson于1992年创建。现在已经标准化为RFC 3629。UTF-8用1到6个字节编码UNICODE字符。用在网页上可以同一页面显示中文简体繁体及其它语言（如英文，日文，韩文）。


utf-8下面有多种编码格式，如：
1. utf8_bin

2. utf8_general_ci

3. utf8_general_cs
### utf8_bin

utf8_bin将字符串中的每一个字符用二进制数据存储，区分大小写。

### utf8_general_ci
utf8_genera_ci不区分大小写，ci为case insensitive的缩写，即大小写不敏感。

==最常用的即为utf8_general_ci==

### utf8_general_cs

utf8_general_cs区分大小写，cs为case sensitive的缩写，即大小写敏感。

***@editor siluzhou***


