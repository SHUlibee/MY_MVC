<?php
/**
 * 路由
 */

//当类初始化时，自动引入相关文件，重载了php内置的autoload函数
function __autoload($className){
	//解析文件名，得到文件的存放路径
	list($filename, $suffix) = split('_', $className);
	
	//构造model文件路径
	$file = SERVER_ROOT . '/'. strtolower($suffix) .'s/' . strtolower($filename) . '.php';
	
	if(file_exists($file)){
		include_once($file);
	}else{
		die("File '$filename' containing calss '$className' not found.");
	}
}


//以 访问 http://域名.com/index.php?user&main&param=value 为例
//获取所有请求>>获取 page1&param=value
$request = $_SERVER['QUERY_STRING'];  

//解析$request变量>>获取 array('user', 'param=value')
$parsed = explode('&', $request);

//用户请求的页面>>获取 user, $parsed = array('main', 'param=value')
$page = array_shift($parsed);
//用户请求的页面>>获取 main, $parsed = array('param=value')
$func = array_shift($parsed);

//解析出GET参数
$getVars = array();
foreach ($parsed as $argument){
	list($variable, $value) = split('=', $argument);
	$getVars[$variable] = $value;
}

//构造控制器文件路径
$target = SERVER_ROOT . '/controllers/' . $page. '.php';

//如果控制器文件存在
if(file_exists($target)){
	include_once($target);
	
	//构造控制器类名
	$class = ucfirst($page) . '_Controller';
	
	if(class_exists($class)){
		$controller = new $class;
	}else{
		die("class $class does not exist!");
	}
}else{
	die("page $page does not exist!");
}

if(method_exists($controller, $func)){
	$controller->$func($getVars);
}else{
	die("function $func dose not exist!");
}






