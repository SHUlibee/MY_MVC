<?php
/**
 * 处理视图
 * @author code29
 */
class View_Lib{
	
	/* 方案一
	//保存赋给视图模版的变量
	private $data = array();
	
	//保存视图渲染状态
	private $render = FALSE;
	
	public function __construct($template){
		//构造视图文件路径
		$file = SERVER_ROOT .'/views/'.strtolower($template).'.php';
		
		if(file_exists($file)){
			//当模型对象销毁时才能渲染视图
			//如果现在就渲染视图，那么我们就不能给视图模版赋予变量
			//所以此处先保存要渲染的视图文件路径
			$this->render = $file;
		}
	}
	
	//接受从控制器赋予的变量，并保存在data数组中
	public function assign($variable, $value){
		$this->data[$variable] = $value;
	}
	
	public function __destruct(){
		//把类中的data数组变为该函数的局部变量，以方便在视图模版中使用
		$data = $this->data;
		
		//渲染视图
		include($this->render);
	}/*
	
	/**
	 * 方案二
	 * 加载模版文件
	 * @param String $template
	 * @param array $data
	 */
	static function load($template, $data = NULL){
		
		if(trim($template) == '') die('模版文件名不能为空！');
		
		$file = SERVER_ROOT .'/views/'.strtolower($template).'.html.php';
		
		if(file_exists($file)){
			
			if($data){
				foreach ($data as $key=>$d){
					if(is_numeric($key)) die('必须是 键\值 型数组');
					$$key = $d;
				}
			}
			
			include($file);
		}
		
	}
	
}