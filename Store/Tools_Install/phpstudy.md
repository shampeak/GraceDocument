# phpstudy 软件安装
> phpstudy 软件安装

**软件名称：**



**版本号**

**软件设置**

其他选项菜单——php版本切换——选择5.4n(<5.3 功能不全，5.4最稳定)

06/6/7 升级选择5.5

Q： Allowed memory size of 134217728 bytes exhausted 

A：可分配的内存太小，查看php.ini配置文件，修改大小，就ok了。如下：
查到这儿，memory_limit = 128M;
修改其值，如512或1024，看你自己想分配多大的内存了。


***@editor siluzhou***