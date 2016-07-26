<?php

namespace Grace\Vo;

use Grace\Base\Set;

class Vo extends Set
{
    /*
    * @var null
    * wise单例调用
    */
    private static $_instance = null;       //单例调用
    public $Mo              = array();             //服务对象存储 映射
    //服务对象存储
    public $Providers       = array();             //服务对象存储 映射
    //服务对象配置信息存储
    public $ObjectConfig    = array();          //服务对象配置信息存储

    //对象映射
    public $FileReflect     = array();           //服务对象存储 映射
    //对象实例
    public $instances       = array();             //服务对象存储 实例

    /*
    * @param string $conf
    * 根据配置获取设定
    */
    private function __construct($voconfig = []){
        $this->FileReflect      = $voconfig['FileReflect'];         //配置文件映射
        $this->Providers        = $voconfig['Providers'];           //对象映射

        if(is_array($this->FileReflect)){
              foreach($this->FileReflect as $key=>$file){
                    $this->ObjectConfig[ucfirst($key)] =  $this->load($file);
              }
        }
       // print_r($this->ObjectConfig);       //获得配置 $this->ObjectConfig
    }

    /*
    |------------------------------------------------------------
    | 单例调用
    |------------------------------------------------------------
    */
    public static function getInstance($config = []){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }

    /*
    |------------------------------------------------------------
    | 实例化注册类
    |------------------------------------------------------------
    */
    public function make($abstract,$parameters=[])
    {
        $abstract = ucfirst($abstract);
        if (isset($this->instances[$abstract])) {
              return $this->instances[$abstract];
        }
        //未定义的服务类 返回空值;
        if (!isset($this->Providers[$abstract])) {
              return null;
        }
        // echo $abstract;
        $parameters = $parameters?:isset($this->ObjectConfig[$abstract])?$this->ObjectConfig[$abstract]:[];
        $this->instances[$abstract] = $this->build($abstract,$parameters);
        return $this->instances[$abstract];
    }

    /*
    |------------------------------------------------------------
    | 实例化一个模型
    |------------------------------------------------------------
    */
    public function makeModel($abstract)
    {
        if (isset($this->Mo[$abstract])) {
            return $this->Mo[$abstract];
        }
        if(!class_exists($abstract)){
            //没有找到执行方法
            //执行404;
            echo '<br>Miss file : <br>';
            echo $abstract;
            D();
        }
        //检查类文件是否存在
        $this->Mo[$abstract] = new $abstract();     //模型存储

        return $this->Mo[$abstract];
    }

    //禁止外部调用
    private function build($abstract, array $parameters = [])
    {
        $obj_ = $this->Providers[$abstract];
        $obj = new $obj_($parameters);
        return $obj;
    }



}
