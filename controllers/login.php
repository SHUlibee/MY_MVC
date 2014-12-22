<?php
class Login_Controller extends Controller_Lib{
	public $template = 'login/browse';
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function index(array $getVars){
		
		View_Lib::load($this->template);
	}
	
	public function do_login(){
		echo 'ddddddddddddddddddddd';
	}
	
}