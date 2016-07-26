<?php
/*
 |------------------------------------------------
 | 类文件和配置文件注册
 |------------------------------------------------
 */

return [

    'FileReflect'  => [
        'Config'   => '../App/Config/Config.php',
        'Dsn'      => '../App/Config/Dsn.php',
        'Smarty'   => '../App/Config/Smarty.php',
        'Db'       => '../App/Config/Db.php',
    ],

    'Providers'=>[
        'Ap'        => Grace\Ap\Ap::class,               //操作流对象
        'Wise'      => Grace\Wise\Wise::class,           //memcache对象
        'Pdo'       => Grace\Pdo\Pdo::class,             //
        'Pdopool'   => Grace\Pdo\Pdopool::class,         //
        'Dsn'       => Grace\Pdo\Dsn::class,             //
        'Req'       => Grace\Req\Req::class,             //
        'View'      => Grace\View\View::class,           //
        'Smarty'    => Grace\Smarty\Smarty::class,           //
        'Db'        => Grace\Db\Db::class,           //
        'Markdown'  => Michelf\Markdown::class,
        'Parsedown' => Parsedown::class,
    ],

];
