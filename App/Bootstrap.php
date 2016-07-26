<?php
namespace App;

class Bootstrap
{
    private $_config              = array();
    public $middlewarelist        = array();

    public function __construct($config = array()){
        $this->_config = $config;
    }

    /*
    |--------------------------------------------------------------------------
    | 执行
    |--------------------------------------------------------------------------
    */
    public static function Run($approot = '../App/')
    {

        //set_error_handler(array('\App\Bootstrap', 'customError'));      //自定义错误处理

        /*系统级配置*/
        dc(\Grace\Vo\Vo::getInstance(include(APPROOT.'Config/Vo.php'))->ObjectConfig['Config']);


        $get = app('req')->get;
        $controller = ($get['c']?:(isset($get['C'])?$get['C']:''))?:'Home';
        $mothed     = ($get['a']?:(isset($get['A'])?$get['A']:''))?:'Index';

        req([                   //req 数据模型
            'Get'   => app('req')->get,
            'Post'  => app('req')->post,
            'Env'   => app('req')->env,
            'Router'=> [
                'type'      => app('req')->env['REQUEST_METHOD'],
                'controller'    => ucfirst(strtolower($controller)),
                'mothed'        => ucfirst(strtolower($mothed)),
                'params'        => app('req')->get['params'],
                'Prefix'        => 'do',
            ],
        ]);
//ok,路由字段设置好了

        $router = req('Router');
//路由数据合法性检查
        if (!preg_match('/^[0-9a-zA-Z]+$/',$router['controller']) || !preg_match('/^[0-9a-zA-Z]+$/',$router['mothed']))
        {
            halt('router error');
        }
        if (!preg_match('/^[a-zA-Z]+$/',substr($router['controller'],0,1)) || !preg_match('/^[a-zA-Z]+$/',substr($router['mothed'],0,1)))
        {
            halt('router error2');
        }

        $params = $router['params'];                                              //参数
        /*
         * 这两个有可能成为文件单独存在,并且加载
         * */
//控制器名 just
        $_controller    = $router['controller'];
//方法名 just
        $_mothed       = $router['mothed'];

//方法_执行
        $__mothedAction = ($router['type'] == 'GET')?($router['Prefix'].$router['mothed']):($router['Prefix'].$router['mothed'].ucfirst(strtolower($router['type'])));

//控制器_执行
        $__controllerAction = '\App\Controller\\'.$router['controller'];

//控制器根目录
        $basepath =       APPROOT.'Controller/';

        /*
        1 : base
        2 : controller/action
        3 : controller/contgroller
        4 : controller.php
         * */
//加载基类 - 如果基类存在,则加载
        $file = $basepath.$_controller.'/BaseController.php';
        includeIfExist($file);

//没有寻找到,尝试 controller/controller.php
        $file = $basepath.$_controller.'/'.$_controller.'.php';
        $_file[] = $file;
        includeIfExist($file);

//如果还没有
//报错啦
        if(!method_exists($__controllerAction, $__mothedAction)){
            //没有找到执行方法
            //执行404;
            echo 'Miss file : <br>';
            echo $__controllerAction;
            echo '::'.$__mothedAction;
            D($_file);
        }

//实例化
        $controller = new $__controllerAction();

//根据action执行相关的操作
        $controller->$__mothedAction($params);         //执行方法

    }



    public static  function customError($errno, $errstr, $errfile, $errline)
    {
        echo "<b>Custom error:</b><br> [$errno] $errstr<br />";
        echo " Error on line $errline <br>in $errfile<br />";
        echo "Ending Script";
        die();
    }

    public static function load($file=''){
        if(file_exists($file)){
            return include $file;
        }
        return [];
    }

}


