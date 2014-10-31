<?php
class User_Controller{
	public $template = 'userList';
	
	public function __construct(){
		
	}
	
	public function main(array $getVars){
		
		$User = new User_Model();
		
		$user = $User->get_user();
		
//		$View = new View_Lib($this->template);
//		$View->assign('name', $user['name']);
//		$View->assign('email', $user['email']);
		
		$data['user'] = $user[0];
		
		View_Lib::load($this->template, $data);
		
	}
	
}