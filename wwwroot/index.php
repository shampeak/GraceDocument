<?php
include("../vendor/autoload.php");
define('APPROOT', '../App/');

$error_reporting       = E_ALL ^ E_NOTICE;
//错误提示
ini_set('error_reporting', $error_reporting);
//or
//error_reporting(0);

//时区
ini_set('date.timezone','Asia/Shanghai');

\App\Bootstrap::run();
