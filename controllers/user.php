<?php
class User_Controller{
	public $template = 'user/browse';
	
	public function __construct(){
		
	}
	
	public function main(array $getVars){
		
		$User = new User_Model();
		
		$user = $User->get_user();
		
//		$View = new View_Lib($this->template);
//		$View->assign('name', $user['name']);
//		$View->assign('email', $user['email']);
		
		$data['users'] = $user;
		
		View_Lib::load($this->template, $data);
		
	}
	
}