<?php
/**
 * ������ͼ
 * @author code29
 */
class View_Lib{
	
	static $VIEW_FILE = '';
	
	static $VIEW_MASTER = '';
	
	static $IS_MASTER = false;
	
	/**
	 * ������
	 * ����ģ���ļ�
	 * @param String $template
	 * @param array $data
	 */
	static function load($template, $data = NULL){
		
		if(trim($template) == '') die('ģ���ļ�������Ϊ�գ�');
		
		self::$VIEW_FILE	= SERVER_ROOT .'/views/'.strtolower($template).'.html.php';
		self::$VIEW_MASTER	= SERVER_ROOT .'/views/common/master.html.php';
		
		if(file_exists(self::$VIEW_FILE)){
			
			if($data){
				foreach ($data as $key=>$d){
					if(is_numeric($key)) die('������ ��\ֵ ������');
					$$key = $d;
				}
			}
			
			if(self::$IS_MASTER){
				include(self::$VIEW_MASTER);
			}else{
				include(self::$VIEW_FILE);
			}
		}
		die;
	}
	
	/**
	 * �����Ƿ�ʹ��masterģ��
	 * @param unknown_type $bool
	 */
	public function set_master($bool = true){
		self::$IS_MASTER = $bool;
	}
	
}