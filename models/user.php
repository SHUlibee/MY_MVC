<?php

class User_Model extends Model_Lib{
	
	public function __construct(){
		parent::__construct('local');
	}
	
	public function get_user(){
		
		$sql = "select * from test_user";
		
		$res = $this->get($sql);
		return $res;
	}
	
}