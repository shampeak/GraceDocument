<?php

    /*
     * 调试用 终止,并且显示回溯
     * */
    function halt($str){
        //Log::fatal($str.' debug_backtrace:'.var_export(debug_backtrace(), true));
        header("Content-Type:text/html; charset=utf-8");
        if(dc('debug')){
            echo "<pre>";
            debug_print_backtrace();
            echo "</pre>";
        }
        echo $str;
        exit;
    }

    /*
    |------------------------------------------------------
    | @param $arr
    | 取代print_r()的调试函数
    |------------------------------------------------------
    */
    if (! function_exists('D')) {
        function D($arr = [])
        {
            echo '<pre>';
            print_r($arr);
            echo '<hr>';
            debug_print_backtrace();
            echo "</pre>";
            exit;
        }
    }

    /*
    |------------------------------------------------------
    | 数据流 bus sc dc
    |------------------------------------------------------
    */

//中间数据层配置
    if (! function_exists('sc')) {
        function sc($key = '', $value = array())    {   return channel('sc',func_num_args(),$key,$value);}
    }

//用户层信息流配置
    if (! function_exists('bus')) {
        function bus($key = '', $value = array())   {   return channel('bus',func_num_args(),$key,$value);}
    }

//config.php 配置
    if (! function_exists('dc')) {
        function dc($key = '', $value = array())    {   return channel('dc',func_num_args(),$key,$value);}
    }

//request 配置
    if (! function_exists('req')) {
        function req($key = '', $value = array())    {   return channel('req',func_num_args(),$key,$value);}
    }


    /*
    |------------------------------------------------------
    | 频道 数据流
    |------------------------------------------------------
    */
    if (! function_exists('channel')) {
        function channel($channel,$args = 0,$key = '', $value = array())
        {
            return Grace\Wise\Wise::getInstance()->channel($channel)->C($args,$key, $value);
        }
    }


    //view
    if (! function_exists('view')) {
        function view($tpl='',$data = [])
        {
            return app('smarty')->router()->display($tpl,$data);
        }
    }

    /*
    |------------------------------------------------------
    | 在注册表中生成一个类，并且返回
    |------------------------------------------------------
    */
    if (! function_exists('app')) {
        function app($make = null, $parameters = [])
        {
            if (is_null($make)) {
                return Grace\Vo\Vo::getInstance('../App/');
            }
            return Grace\Vo\Vo::getInstance('../App/')->make($make, $parameters);
        }
    }


    /*
    |------------------------------------------------------
    | 模型生成 并且返回
    |------------------------------------------------------
    */
    if (! function_exists('Model')) {
        function Model($ins = null)
        {
            $modelname = ucfirst(strtolower($ins)).'Model';
            $modelclass = 'App\Model\\'.$modelname;
            return Grace\Vo\Vo::getInstance('../App/')->makeModel($modelclass);
        }
    }



/*
|------------------------------------------------------
| 对数据进行魔术变换
|------------------------------------------------------
*/
    function saddslashes($string) {
        if(is_array($string)) {
            foreach($string as $key => $val) {
                $string[$key] = saddslashes($val);
            }
        } else {
            $string = addslashes($string);
        }
        return $string;
    }


    /*
     * 如果文件存在就include进来
     * @param string $path 文件路径
     * @return void
     */
    function includeIfExist($path){
        if(file_exists($path)){
            include $path;
        }
    }


    //转交控制权,给view对象
    if (! function_exists('assign')) {
        function assign($key = null, $value = [])
        {
            return app('Smarty')->router(req('Router'))->assign($key, $value);
//            return app('View')->assign($key, $value);
        }
    }


    if (! function_exists('view')) {
        function view($tpl = null, $data = [])
        {
//            return app('View')->display($tpl, $data);
            return app('Smarty')->router(req('Router'))->display($tpl, $data);
        }
    }

//页面跳转
function R($url, $time=0, $msg='') {
    $url = str_replace(array("\n", "\r"), '', $url);
    if (empty($msg))
        $msg = "系统将在{$time}秒之后自动跳转到{$url}！";
    if (!headers_sent()) {
        // redirect
        if (0 === $time) {
            header('Location: ' . $url);
        } else {
            header("refresh:{$time};url={$url}");
            echo($msg);
        }
        exit();
    } else {
        $str = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
        if ($time != 0)
            $str .= $msg;
        exit($str);
    }
}