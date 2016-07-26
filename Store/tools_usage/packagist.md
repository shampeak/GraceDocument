# packagist
> packagist 使用方式



**软件名称：**

[packagist](https://packagist.org)

**发布项目**

- 发布项目到github上
- 登陆packagist,submit，填写github项目地址，点击check
- 无问题后点击submit
- 设置github service hook:当你修改项目，提交到github上时，在packagist上的项目能够自动获取到最新的代码，减少了你每次都要手动update。 

设置：github项目首页——右上角settings——webhooks &service, 添加packagist

从packagist中获取API TOKEN

github设置：

![](http://i.imgur.com/L0llCX7.png)

点击add service

进入刚刚配置的service中，在顶部可以看到一个[Test service]的按钮，点击一下它，看到如下效果

![](http://i.imgur.com/1Bw8P2K.png)

然后，回到Packagist中你的项目页面，刷新一下，你会看到如下所示：
 
![](http://i.imgur.com/uWS314U.png)

注意这里红色框中的内容，最开始我们尚未配置的时候，显示了一行绿色字 Not Auto-Updated ，现在它消失了，这表示我们设置成功。
现在，你可以修改你的项目，然后检查packagist上的包，你会发现实现了自动更新，至此配置全部完成。

**标准composer文档格式**

```
{
    "name": "monolog/monolog",
    "type": "library",
    "description": "Logging for PHP 5.3",
    "keywords": ["log","logging"],
    "homepage": "https://github.com/Seldaek/monolog",
    "license": "MIT",
    "authors": [
        {
            "name": "Jordi Boggiano",
            "email": "j.boggiano@seld.be",
            "homepage": "http://seld.be",
            "role": "Developer"
        }
    ],
    "require": {
        "php": ">=5.3.0"
    },
    "autoload": {
        "psr-0": {
            "Monolog": "src"
        }
    }
}
```
**使用**

```
composer require 包名
```

***@editor siluzhou***
