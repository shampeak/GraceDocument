<?php
namespace App\Controller;


class Admin extends BaseController {

    private $storeroot = "../Store/";

    public function __construct(){
        parent::__construct();
    }



    public function doLmPost()
    {

//paixu$list
        $res = req('Post');
        $list = $_POST['list'];
        foreach($list as $value){
            $_v[] = $value['sort'];
        }
        array_multisort($_v,SORT_ASC,$list);
        //小的前面
        $res['list'] = $list;
        $json = json_encode($res);

        file_put_contents($this->storeroot.$res['chr'].'/Index.json',$json);
        //wanbi
        R('/admin/lm/?chr='.$res['chr']);
    }

    //对栏目进行设置
    public function doLm()
    {


        $chr = req('Get')['chr'];
        $resindex = Model('md')->getar();
        $info = $resindex['list'][$chr];


        $res = Model('md')->getar($chr);
        $list = $res['list'];

        //遍历下面有哪些目录
        view('',[
            'info'   => $info,
            'chr'   => $chr,
            'list'  => $list,
            'res'   => $res
        ]);
    }

    //首页响应
    public function doIndexPost()
    {

        //paixu$list
        $res = $_POST;
        $list = $_POST['list'];
        foreach($list as $value){
            $_v[] = $value['sort'];
        }
        array_multisort($_v,SORT_ASC,$list);
        //小的前面
        $res['list'] = $list;
        $json = json_encode($res);

        file_put_contents($this->storeroot.'Index.json',$json);
        //wanbi
        R('/admin/');

    }


    //首页的
    public function doIndex()
    {

        $res = Model('md')->getar();
       // D($res);

        //遍历下面有哪些目录
        view('',[
            'res'=>$res
        ]);
    }

}
