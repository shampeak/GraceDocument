<?php
namespace Grace\Pdo;;

/*
|--------------------------------------------------------------------------
|对系统pdo进行改写
|--------------------------------------------------------------------------
*/
class MySQLPDO extends \PDO
{
    /*
     * @param string $host 数据库地址
     * @param int $port 端口
     * @param string $username 帐号
     * @param string $passwd 密码
     * @param string $database 数据库
     * @param string $charset 编码，默认为utf8,也建议使用utf8
     */
    public function __construct($config = [])
    {
        $dsn = 'mysql:dbname=' . $config['database'] . ';host=' . $config['hostname'] . ';port=' . $config['port'];
        $options = array(
            \PDO::MYSQL_ATTR_INIT_COMMAND   => 'set names ' . $config['charset'], //设置编码
            \PDO::ATTR_CASE                 => \PDO::CASE_LOWER,        //所有的字段都为小写
            \PDO::ATTR_ERRMODE              => \PDO::ERRMODE_EXCEPTION, //所有的错误都由Exception形式报告
            \PDO::ATTR_TIMEOUT              => 30,                      //设置超时时间30秒
            \PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => TRUE,                //使用MySQL的查询缓存
            \PDO::ATTR_DEFAULT_FETCH_MODE   => \PDO::FETCH_ASSOC,       //数据以关联数据的形式返回
        );
        parent::__construct($dsn, $config['username'], $config['password'], $options);
    }

}