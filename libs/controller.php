<?php
/**
 * 处理控制器
 * @author code29
 */
class Controller_Lib{

    /**
     * @var null|View_Lib 视图
     */
    var $view = null;

    /**
     * @var null|Loader_Lib 装载器
     */
    var $load = null;
	
	public function __construct(){
		
		$this->view = new View_Lib();
        $this->load = new Loader_Lib();
	}
	
	
}