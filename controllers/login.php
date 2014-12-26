<?php
class Login_Controller extends Controller_Lib{
	
	public function __construct(){
		parent::__construct();
		
		if(isset($_SESSION['account'])){
			header("Location: index.php?c=home");
		}
	}
	
	public function index(array $getVars){
		
		$this->view->load('login/view');
	}
	
	public function do_login(){
		$acc = $_POST['account'];
		$pwd = $_POST['password'];
		
		$User = new User_Model();
		$user = $User->get_user_by_account($acc);
		
		if($pwd == $user->password){
			
			$_SESSION['account'] = $acc;
			
			header("Location: index.php?c=home");
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