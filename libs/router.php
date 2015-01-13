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

try{
    $BEE = new Bee_Lib();
    $BEE->run();
}catch (Exception $ee){
    echo $ee->getMessage();
}





