<?php
/**
 * ���������
 * @author code29
 */
class Controller_Lib{

    /**
     * @var null|View_Lib ��ͼ
     */
    var $view = null;

    /**
     * @var null|Loader_Lib װ����
     */
    var $load = null;
	
	public function __construct(){
		
		$this->view = new View_Lib();
        $this->load = new Loader_Lib();
	}
	
	
}