<?php
class Login_Controller extends Controller_Lib{
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function index(array $getVars){
		
		View_Lib::load('login/view');
	}
	
	public function do_login(){
		$acc = $_POST['account'];
		$pwd = $_POST['password'];
		
		$User = new User_Model();
		$user = $User->get_user_by_account($acc);
		
		if($pwd == $user->password){
			
			$_SESSION['account'] = $acc;
			
			echo 'alert("µÇÂ¼³É¹¦")';
		}else{
			echo 'alert("µÇÂ¼Ê§°Ü")';
		}
		
	}
	
	public function do_logout(){
		if(isset($_SESSION['account'])){
			unset($_SESSION['account']);
		}
	}
	
}