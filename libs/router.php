<?php
/**
 * ·��
 */

//�����ʼ��ʱ���Զ���������ļ���������php���õ�autoload����
function __autoload($className){
	//�����ļ������õ��ļ��Ĵ��·��
	list($filename, $suffix) = split('_', $className);
	
	//����model�ļ�·��
	$file = SERVER_ROOT . '/'. strtolower($suffix) .'s/' . strtolower($filename) . '.php';
	
	if(file_exists($file)){
		include_once($file);
	}else{
		die("File '$filename' containing calss '$className' not found.");
	}
}


//�� ���� http://����.com/index.php?user&main&param=value Ϊ��
//��ȡ��������>>��ȡ page1&param=value
$request = $_SERVER['QUERY_STRING'];  

//����$request����>>��ȡ array('user', 'param=value')
$parsed = explode('&', $request);

//�û������ҳ��>>��ȡ user, $parsed = array('main', 'param=value')
$page = array_shift($parsed);
//�û������ҳ��>>��ȡ main, $parsed = array('param=value')
$func = array_shift($parsed);

//������GET����
$getVars = array();
foreach ($parsed as $argument){
	list($variable, $value) = split('=', $argument);
	$getVars[$variable] = $value;
}

//����������ļ�·��
$target = SERVER_ROOT . '/controllers/' . $page. '.php';

//����������ļ�����
if(file_exists($target)){
	include_once($target);
	
	//�������������
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






