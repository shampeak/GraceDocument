<?php

namespace Grace\Smarty;

/*
* 视图类
*/
class Smarty {
    private $_controller    = '';       //控制器
    private $_mothed        = '';       //方法

    private $_sty     = '';       //smarty对象

    public function __construct($config = array()){
        $this->_config = $config;
        //建立对象
        require $config['smartyFile'];
        $this->_sty = new \Smarty;
        $this->_sty->setTemplateDir($config['TemplateDir']);
        $this->_sty->setCompileDir($config['CompileDir']);  //编译
        $this->_sty->setConfigDir($config['ConfigDir']);
        $this->_sty->setCacheDir($config['CacheDir']);
        $this->_sty->debugging = $config['debugging'];
        $this->_sty->caching = $config['caching'];
        $this->_sty->cache_lifetime = 120;
    }

    public function router($Router = [])
    {
        if(!$Router){
            $Router = req('Router');
            $this->_controller =  ucfirst($Router['controller']);
            $this->_mothed     =  ucfirst($Router['mothed']);
        }else{
            $this->_controller =  ucfirst($Router['controller']);
            $this->_mothed     =  ucfirst($Router['mothed']);
        }
        return $this;
    }

      public function display($tpl = '',$data = array()){

            if($data){
                  $this->assign($data);
            }

            /* default
             * */
          //$router = req('Router');
          //D($router);
            $tplFile = $tpl?ucfirst($tpl):$this->_mothed;
            $tplFile = $this->_controller.'/'.$tplFile.'.tpl';


            $this->_sty->display($tplFile);
      }

      public function assign($key = '',$value = array()){
            if(func_num_args()==1){
                  if(is_array($key)){
                        foreach($key as $k=>$v){
                              $this->_sty->assign($k,$v);
                        }
                  }
            }else{
                  $this->_sty->assign($key,$value);
            }
      }


}



