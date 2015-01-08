<?php
/**
 * ������
 * @author code29
 */
class Bee_Lib{
	
	var $controller = null;
	
	var $ctrl = null;
	var $func = null;
	
	public function __construct(){
		
	}
	
	/**
	 * 
	 * @param string $ctrl
	 * @param string $func
	 * @param array $getVars
	 */
	public function run($ctrl, $func, $getVars){
		//���δ������������Ĭ��index����
		if(empty($func)) $func = 'index';
		
		$this->ctrl = $ctrl;
		$this->func = $func;
		
		//����������ļ�·��
		$target = SERVER_ROOT . '/controllers/' . $ctrl. '.php';
		
		//����������ļ�����
		if(file_exists($target)){
			include_once($target);
			
			//�������������
			$class = ucfirst($ctrl) . '_Controller';
			
			if(class_exists($class)){
				$this->controller = new $class;
			}else{
				die("class $class does not exist!");
			}
		}else{
			die("page $ctrl does not exist!");
		}
		
		if(method_exists($this->controller, $func)){
			$this->controller->$func($getVars);
		}else{
			die("function $func dose not exist!");
		}
		

	}
	
}
