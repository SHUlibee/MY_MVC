<?php
class User_Controller extends Base_Controller{
	public $template = 'user/browse';
	
	public function __construct(){
		parent::__construct();
		
		$this->view->set_master();
	}
	
	public function index(){

//        ʹ��װ��������װ��ģ��
//        $User = new User_Model();
        $User = $this->load->model('User');
        $user = $User->get_user();

		$data['users'] = $user;

		$this->view->render($this->template, $data);
		
	}
	
}