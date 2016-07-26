#代码规范
>代码规范

列举常见代码规范

1. psr4 规范：除了autoload.php这个文件,其他文件根据命名空间自动载入都不需要include
2. phpunit 规范：常见方法在cmd根目录中运行 phpunit --bootstrap ../vendor/autoload.php DBTest，而不是在测试类中include autoload.php


***@editor:  siluzhou***