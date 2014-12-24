<?php
/**
 * 处理模型
 * @author code29
 */
class Model_Lib{
	
	/**
	 * 数据库
	 */
	var $db_name = 'default';
	
	/**
	 * 数据库连接参数
	 */
	var $link = NULL;
	
	/**
	 * 数据库连接
	 */
	var $con = NULL;
	
	/**
	 * sql语句
	 */
	var $query = '';
	
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
	
	/**
	 * select 查询
	 * @param string $query 当参数为空或者不传时，采用构造查询的形式
	 * @return object select查询结果
	 */
	function get($query = ''){
		
		if($query) $this->query = $query;
		
		$res = mysql_query($this->query);
		$result = array();
		while ($row = mysql_fetch_object($res)){
			$result[] = $row;
		}
		return $result;
	}
	
	/**
	 * insert or delete or update 查询
	 * @param string $query 当参数为空或者不传时，采用构造查询的形式
	 * @return int
	 */
	function excute($query = ''){
		
		if($query) $this->query = $query;
		
		return mysql_query($this->query);
	}
	
	
	function select(){
		
		return $this;
	}
	function from(){
		
		return $this;
	}
	function where(){
		
		return $this;
	}
	
	
	function __destruct(){
		if($this->con)
			mysql_close($this->con);
	}
	
}