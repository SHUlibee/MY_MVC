<?php
/**
 * 入口文件
 */

//应用根目录
define('SERVER_ROOT', dirname(__FILE__));

//服务器域名
define('SITE_ROOT', 'http://my_mvc.com');


//引入路由
require_once(SERVER_ROOT . '/libs/' . 'router.php');