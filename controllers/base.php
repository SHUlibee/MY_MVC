<?php
class Base_Controller extends Controller_Lib{
	
	public function __construct(){
		parent::__construct();
		
		//��¼��֤
		if(!isset($_SESSION['account'])){
			//�����Զ�����
			header("Location: index.php?c=login");
		}
		
	}
	
}