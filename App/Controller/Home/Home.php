<?php
namespace App\Controller;


class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function doIndex()
    {
        $res = Model('md')->getar();
//D($res);
        view('',[
            'res'=> $res
        ]);
    }

}
