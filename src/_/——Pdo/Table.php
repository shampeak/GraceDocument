<?php

/*
|--------------------------------------------------------------
|删除
|table('user')->delete(1);
|table('user')->where("flag = 1")->delete();
|更新
|table('user')->set("nickname = '12'")->update(1)
|table('user')->where("flag = 1")->set("nickname = '12'")->update()
|table('user')->where([
    'flag'  => 1,
    'mns'   => 3
])->set([nickname => '12'])->update()
|添加
|table('user')->insert([
"user"      => 1,
"nickname"  => 1,
]);
|选择
table("user")->select(1)
table("user")->where("userid = 1")->select()
table("user")->where(["userid" => 1])->select()
->limie(10,10)
->orderby("id desc")
->groupby("groupid")
->colmn("id,name,user")


//没有定义就尝试从数据库中去获取
//自动获取表的自增ID
SELECT column_name
FROM `COLUMNS`
WHERE `TABLE_NAME` = 'article'
AND `TABLE_SCHEMA` = 'mm'
AND column_key = 'pri'

|--------------------------------------------------------------
*/

namespace Grace\Pdo;

use Grace\Base;

class Pdo extends \Grace\Base\Set
{




    //测试
    public function test(){
        echo 123;
    }

}
