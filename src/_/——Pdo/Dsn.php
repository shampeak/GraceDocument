<?php

namespace Grace\Pdo;

use Grace\Base\Set;

/*
 * 配合Dbconfig
 *
 * app('dsn')->getDSN('user','SELECT')
 * app('dsn')->getDSN('user','UPDATE')
 * app('dsn')->getDSN('user','DELETE')
 * app('dsn')->getDSN('user','UPDATE')
 * */


class Dsn extends Set
{
    public $_config;
    public function __construct($config = array()){
        $this->_config = $config;
    }

    public function getDSN($table = '',$action = 'SELECT'){
        if(isset($this->_config['RW'])){
            $config  = $this->getDSNRW($table,$action);
        }else{
            $config  = $this->getDSNSN();
        }
        return $config;
    }

    //读写分离模式
    public function getDSNRW($table = '',$action = 'SELECT'){
        if(isset($this->_config['RW'][$table])){
            $tableread  = $this->_config['RW'][$table]['Read'];
            $tablewrite = $this->_config['RW'][$table]['Write']?:$tableread;

            $default    = $this->_config['Default'];
            $configread = $tableread?array_merge($default,$tableread):$default;
            $configwrite = $tablewrite?array_merge($default,$tablewrite):$default;
            //======================================================
            switch($action){
                case 'SELECT':
                    $config = $configread;
                    break;
                default:
                    $config = $configwrite;
                    break;
            }
        }else{
            $config = $this->_config['Default'];
        }
        return $config;
    }

    //读写分离模式未配置
    public function getDSNSN(){
        return $this->_config['Default'];
    }

}
