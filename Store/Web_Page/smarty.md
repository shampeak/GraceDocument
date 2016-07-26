# smarty
> smarty教程


## 概念

Smarty是一个php模板引擎。更准确的说,它分开了逻辑程序和外在的内容,提供了一种易于管理的方法。可以描述为应用程序员和美工扮演了不同的角色,因为在大多数情况下 ,他们不可能是同一个人

现在简短的说一下什么是smarty不做的。smarty不尝试将逻辑完全和模板分开。如果逻辑程序严格的用于页面表现,那么它在模板里不会出现问题。有个建议:让应用程序逻辑远离模板, 页面表现逻辑远离应用程序逻辑。这将在以后使内容更容易管理,程序更容易升级。

## Smaty的一些特点:

-    非常非常的快!
-    用php分析器干这个苦差事是有效的
-    不需要多余的模板语法解析,仅仅是编译一次
-    仅对修改过的模板文件进行重新编译
-   可以编辑'自定义函数'和自定义'变量',因此这种模板语言完全可以扩展
-   可以自行设置模板定界符,所以你可以使用{}, {{}}, <!--{}-->, 等等
-   诸如 if/elseif/else/endif 语句可以被传递到php语法解析器,所以 {if ...} 表达式是简单的或者是复合的,随你喜欢啦
-   如果允许的话,section之间可以无限嵌套
-   引擎是可以定制的.可以内嵌php代码到你的模板文件中,虽然这可能并不需要(不推荐)
-    内建缓存支持
-    独立模板文件
-    可自定义缓存处理函数
-    插件体系结构

## smarty安装
安装Smarty发行版在/libs/目录里的库文件(就是解压了). 
下载网址：github:https://github.com/smarty-php/smarty/releases

下载后解压复制lib文件夹到当前目录中。
## smarty使用

1. 根据具体的地址require： Smarty.class.php，创建一个smarty实例
2. 现在库文件已经搞定,该是设置为你的应用程序配置其他有关Smarty的目录的时候了。Smarty要求4个目录,默认下命名为:tempalates, templates_c, configs and cache。每个都是可以自定义的,可以修改Smarty类属性: $template_dir, $compile_dir, $config_dir, and $cache_dir respectively。强烈推荐你为每个用到smarty的应用程序设置单一的目录!
```
$smarty->template_dir="./templates"; //设置模板目录
$smarty->compile_dir="./templates_c"; //设置编译目录
$smarty->cache_dir="./cache"; //缓存目录
$smarty->config_dir="./configs";
```
3. 添加smarty模板文件.tpl文件
在templates文件夹下放置index.tpl文件，可以自己编辑或者从网页中下载。在这里可以尝试自己编辑一下
```
{* Smarty *}

Hello, {$name}!
```
这里的{* Smarty *} 是一个模板注释。
4. 最后，在index.php中指派模板变量,显示 index.tpl文件。
```

$smarty->assign('name','Silu');
$smarty->display('index.tpl');
```


## 教程
### 变量
1. $template_dir[模板目录变量]：该变量定义默认模板目录的名字。
2. $compile_dir[编译目录变量]：
本变量定位编译模板的目录名字。默认情况下，目录是：“./templates_c”，也就是说他将会在和php执行脚本相同的目录下寻找“./templates_c”编译目录。
2. $config_dir[配置目录变量]：本变量用于设置存放模板配置文件的目录，默认情况下，目录是：“./configs”，这意味着它将会在和php执行脚本相同的目录下搜索配置目录。 
3. $plugins_dir[插件目录变量]
本变量设置Smarty寻找所需插件的目录。默认是在SMARTY_DIR（即Smarty类所在目录）目录下的“plugins”目录。
4. $cache_dir[缓存目录变量]：这是存放模板缓存的目录名，默认情况下为"./cache"，也就是说Smarty会在与php执行脚本相同的目录下寻找缓存目录。缓存目录必须可写，参考安装一节。
5. $cache_lifetime[缓存生存时间变量]：本变量定义模板缓存有效时间(单位秒)，一旦这个时间失效，则缓存将会重新生成。

## smarty类方法
1. append()[添加]：在指定数组中添加一个元素。 
2. appendByRef()[引用添加]：通过引用添加值
3. assign() [赋值]：为模板分配变量/对象 
1. clearAllAssign() [清除所有赋值]：清除所有已赋值变量的值
1. clearAllCache() [清除所有缓存]：作为可选参数“expire_time”，你可以指定一个以秒为单位的最小时限，超过这个时间的缓存都将被清除掉。
1. clearAssign() [清除赋值]：清除指定模板变量的值：
1. clearCache() [清除缓存]：清除指定模板的缓存
1. clearCompiledTpl() [清除已编译模板]：本函数清除指定模板资源的编译版本，如果不指定具体模板则清除所有已编译模板。如果提供一个“$compile_id”编译id参数则清除该id的编译模板。如果提供一个“exp_time”生存周期参数，则超过生存周期的编译模板将被删除，默认情况下将清除所有编译模板，而不管他们的生存周期。本函数只为高级应用准备，一般情况下用不到。
1. clearConfig() [清除配置]：本函数用以清除所有配置变量，如果指定了变量名称（函数所带的唯一参数），则只清除所指定的配置变量。
1. compileAllTemplates() [编译所有模板]
1. configLoad() [加载配置]：加载配置文件数据并将数据传递给模板
1. createData() [建立数据对象]： 创建一个数据对象
1. createTemplate() [建立模板对象]
1. disableSecurity() [关闭安全]
1. display() [显示]：本函数的显示模板与fetch()函数不同，其需要指定一个合法的模板资源的类型和路径。你还可以通过第二个可选参数指定一个$cache缓存id，相关的信息可以查看缓存。
1. enableSecurity() [开启安全]： 开启模板安全检测
1. fetch() [获取输出内容]：返回一个模板输出的内容值（HTML代码），而不是将其直接显示出来，需要指定一个合法的模板资源的类型和路径。你还可以通过第二个可选参数指定一个$cache_id缓存id，相关的信息可以查看缓存章节。 
1. getConfigVars() [获取配置变量值]：返回给定载入配置变量的值。
1. getRegisteredObject() [获取已注册的对象]：返回一个已注册对象的引用。
1. getTags() [获取标签]： 返回在模板中使用的标签
1.  getTemplateVars() [获取模板变量的值]：返回已赋值的变量值。
1.  isCached() [是否已被缓存]：如果模板存在有效的缓存则返回真。
1.  loadFilter() [加载过滤器]
1.  registerFilter() [注册过滤器]
1.    registerPlugin() [注册插件]
1.    registerObject() [注册对象]
1.    registerResource() [注册资源]
1.    templateExists() [模板是否存在]
1.    unregisterFilter() [注销过滤器]
1.    unregisterPlugin() [注销插件]
1.    unregisterObject() [注销对象]
1.    unregisterResource() [注销资源]	
1.    testInstall() [安装测试]：本函数核实所有Smarty安装文件夹可访问。它输出一个相应的通信协议。