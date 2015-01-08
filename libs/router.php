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
if(empty($request)) $request = 'c=user';

//����$request����>>��ȡ array('c=user', 'f=main', 'param=value')
$parsed = explode('&', $request);

//�û������ҳ��>>��ȡ c=user, $parsed = array('main', 'param=value')
$c = array_shift($parsed);
$ctrl = !preg_match('/^(?!c=)/', $c) ? str_replace('c=', '', $c) : '';
//�û������ҳ��>>��ȡ f=main, $parsed = array('param=value')
$f = array_shift($parsed);
$func = !preg_match('/^(?!f=)/', $f) ? str_replace('f=', '', $f) : '';

//������GET����
$getVars = array();
foreach ($parsed as $argument){
	list($variable, $value) = explode('=', $argument);
	$getVars[$variable] = $value;
}

try{
    $BEE = new Bee_Lib();
    $BEE->run($ctrl, $func, $getVars);
}catch (Exception $ee){
    echo $ee->getMessage();
}





