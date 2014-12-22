<?php

class User_Model extends Model_Lib{
	
	var $table = 'mm_user';
	
	public function __construct(){
		parent::__construct('local');
	}
	
	public function get_user(){
		
		$sql = "select * from $this->table";
		
		$res = $this->get($sql);
		return $res;
	}
	
	public function insert_user(){
		$sql = "insert into $this->table (account, name, email) values('dfs','fffff','eeee@ddddd.com')";
		
		$res = $this->excute($sql);
		return $res;
	}
	
}