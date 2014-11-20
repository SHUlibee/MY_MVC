<?php
/**
 * 处理模型
 * @author code29
 */
class Model_Lib{
	
	var $db_name = 'default';
	var $link = NULL;
	var $con = NULL;
	
	public function __construct($db_name = ''){
		include_once(SERVER_ROOT.'/config/database.php');
		
		$this->link = $DB;
		if(isset($this->link[$db_name])){
			$this->connect_db($db_name);
		}else{
			die("$db_name does not exist!");
		}
	}
	
	private function connect_db($db_name = ''){
		
		if(empty($db_name)){
			$db_name = $this->db_name;
		}
		
		$this->con = mysql_connect(
			$this->link[$db_name]['hostname'],
			$this->link[$db_name]['username'],
			$this->link[$db_name]['password']);
		
		if(!$this->con) die("Could not connect :".mysql_error());
		
		mysql_select_db($this->link[$db_name]['database'], $this->con);
	}
	
	function get($sql){
		$res = mysql_query($sql); 
		$result = array();
		while ($row = mysql_fetch_object($res)){
			$result[] = $row;
		}
		return $result;
	}
	
	function __destruct(){
		if($this->con)
			mysql_close($this->con);
	}
	
}