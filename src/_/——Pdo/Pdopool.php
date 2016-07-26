<?php

namespace Grace\Pdo;;

use Grace\Base\Base;

/*调用
$pdo = sapp('pdopool')->Pdo('user','SELECT');
$pdo = sapp('pdopool')->Pdo('msg','delete');
$pdo = sapp('pdopool')->Pdo('user','SELECT');
$pdo = sapp('pdopool')->Pdo('user','SE1LECT');

 * //获取pdo
 * sapp('pdopool')->Pdo('user','SELECT');       //获取数据连接
 * sapp('pdopool')->pdopool;                    //查看队列中的数据连接
 *
 *
 * //调用
 * $rs = sapp('pdopool')->config([])->query($sql);
 * */

class Pdopool extends Base
{
    public $pdopool = [];

    public function Pdo($table = '',$action = '')
    {
        //获取数据库配置
        $dbconfig  = app('dsn')->getDSN($table,ucwords($action));
        //进行hash标识
        $hashstring = MD5( 'h:'.$dbconfig['hostname']
            .'.p:'.$dbconfig['port']
            .'.u:'.$dbconfig['username']
            .'.p:'.$dbconfig['password']
            .'.d:'.$dbconfig['database']);
        if(isset($this->pdopool[$hashstring])){
              return $this->pdopool[$hashstring];
        }else{
              try{
                    $this->pdopool[$hashstring] = new MySQLPDO($dbconfig);
              }catch(\PDOException $e){
                    if($dbconfig['quiet']){
                          die ("Pdopool Error!");
                    }else{
                          die ("Error!:".$e->getMessage());
                    }
              }
        }
        return $this->pdopool[$hashstring];
    }

    public function config($config = [])
    {
        $this->table    = $config['table'];
        $this->action   = $config['action'];
        return $this;
    }
    public function action($action = '')
    {
        $this->action   = $action;
        return $this;
    }
    public function table($table = '')
    {
        $this->table    = $table;
        return $this;
    }

}
