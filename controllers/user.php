<?php
class User_Controller extends Base_Controller{
	public $template = 'user/browse';
	
	public function __construct(){
		parent::__construct();
		
		$this->view->set_master();
	}
	
	public function index(array $getVars){
		
		$User = new User_Model();
		
		$user = $User->get_user();
		
		$data['users'] = $user;
		
		$this->view->load($this->template, $data);
		
	}
	
}