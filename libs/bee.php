<?php
/**
 * 框架入口
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
		//如果未传方法名，则默认index方法
		if(empty($func)) $func = 'index';
		
		$this->ctrl = $ctrl;
		$this->func = $func;
		
		//构造控制器文件路径
		$target = SERVER_ROOT . '/controllers/' . $ctrl. '.php';
		
		//如果控制器文件存在
		if(file_exists($target)){
			include_once($target);
			
			//构造控制器类名
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
