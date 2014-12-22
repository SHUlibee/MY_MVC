<?php
/**
 * ������ͼ
 * @author code29
 */
class View_Lib{
	
	/* ����һ
	//���渳����ͼģ��ı���
	private $data = array();
	
	//������ͼ��Ⱦ״̬
	private $render = FALSE;
	
	public function __construct($template){
		//������ͼ�ļ�·��
		$file = SERVER_ROOT .'/views/'.strtolower($template).'.php';
		
		if(file_exists($file)){
			//��ģ�Ͷ�������ʱ������Ⱦ��ͼ
			//������ھ���Ⱦ��ͼ����ô���ǾͲ��ܸ���ͼģ�渳�����
			//���Դ˴��ȱ���Ҫ��Ⱦ����ͼ�ļ�·��
			$this->render = $file;
		}
	}
	
	//���ܴӿ���������ı�������������data������
	public function assign($variable, $value){
		$this->data[$variable] = $value;
	}
	
	public function __destruct(){
		//�����е�data�����Ϊ�ú����ľֲ��������Է�������ͼģ����ʹ��
		$data = $this->data;
		
		//��Ⱦ��ͼ
		include($this->render);
	}/*
	
	/**
	 * ������
	 * ����ģ���ļ�
	 * @param String $template
	 * @param array $data
	 */
	static function load($template, $data = NULL){
		
		if(trim($template) == '') die('ģ���ļ�������Ϊ�գ�');
		
		$file = SERVER_ROOT .'/views/'.strtolower($template).'.html.php';
		
		if(file_exists($file)){
			
			if($data){
				foreach ($data as $key=>$d){
					if(is_numeric($key)) die('������ ��\ֵ ������');
					$$key = $d;
				}
			}
			
			include($file);
		}
		
	}
	
}