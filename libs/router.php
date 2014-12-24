<?php
/**
 * ·��
 */

//�����ʼ��ʱ���Զ���������ļ���������php���õ�autoload����
function __autoload($className){
	//�����ļ������õ��ļ��Ĵ��·��
	list($filename, $suffix) = explode('_', $className);
	
	//����model�ļ�·��
	$file = SERVER_ROOT . '/'. strtolower($suffix) .'s/' . strtolower($filename) . '.php';
	
	if(file_exists($file)){
		include_once($file);
	}else{
		die("File '$filename' containing calss '$className' not found.");
	}
}


//�� ���� http://����.com/index.php?c=user&f=main&param=value Ϊ��
//��ȡ��������>>��ȡ page1&param=value
$request = $_SERVER['QUERY_STRING'];  

//����$request����>>��ȡ array('c=user', 'f=main', 'param=value')
$parsed = explode('&', $request);

//�û������ҳ��>>��ȡ c=user, $parsed = array('main', 'param=value')
$c = array_shift($parsed);
$page = !preg_match('/^(?!c=)/', $c) ? str_replace('c=', '', $c) : '';
//�û������ҳ��>>��ȡ f=main, $parsed = array('param=value')
$f = array_shift($parsed);
$func = !preg_match('/^(?!f=)/', $f) ? str_replace('f=', '', $f) : '';

//������GET����
$getVars = array();
foreach ($parsed as $argument){
	list($variable, $value) = explode('=', $argument);
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

//���δ������������Ĭ��index����
if(empty($func)) $func = 'index';
if(method_exists($controller, $func)){
	$controller->$func($getVars);
}else{
	die("function $func dose not exist!");
}






