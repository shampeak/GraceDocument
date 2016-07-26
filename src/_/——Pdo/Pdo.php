<?php

namespace Grace\Pdo;

use Grace\Base;

class Pdo extends \Grace\Base\Set implements PdoInterface
{

    /*
    |--------------------------------------------------------------------------
    | 通用 : 返回所有的方法
    |--------------------------------------------------------------------------
    */

    private $_config  = array();
    private $_pdo = null;

    public function __construct($config = array()){
        $this->_config = $config;
    }

    public function connect()
    {
        //连接
        $dsn = '';
        $this->_pdo = '';
    }

    public function sql($sql = ''){

    }

    //删除 、 update 、 insert
    public function query($sql){

    }

    //查询
    public function getAll($sql){

    }

    public function getRow($sql){

    }

    public function getMap($sql){

    }

    public function getCol($sql){

    }

    public function getOne($sql){

    }

    public function autoExecute($sql){

    }


    public function close(){

        //断开连接
    }


    //测试
    public function test(){
        echo 123;
    }

}
