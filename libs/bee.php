<?php
/**
 * ������
 * @author code29
 */
class Bee_Lib{
	
	var $controller = null;
	
	var $ctrl = null;
	var $func = null;
    var $getVars = null;
	
	public function __construct(){
        //��ʼ�����ʲ���
		$this->_initRequest();
	}
	
	/**
	 * 
	 * @param string $ctrl
	 * @param string $func
	 * @param array $getVars
	 */
	public function run(){

        $ctrl = $this->ctrl;
        $func = $this->func;

		//���δ������������Ĭ��index����
		if(empty($func)) $func = 'index';

		//����������ļ�·��
		$target = SERVER_ROOT . '/controllers/' . $ctrl. '.php';
		
		//����������ļ�����
		if(file_exists($target)){
			include_once($target);
			
			//�������������
			$class = ucfirst($ctrl) . '_Controller';
			
			if(class_exists($class)){
				$this->controller = new $class;
			}else{
				die("class $class does not exist!");
			}
		}else{
			die("page $ctrl does not exist!");
		}
		
		if(method_exists($this->controller, $func)){
			$this->controller->$func($this->getVars);
		}else{
			die("function $func dose not exist!");
		}
	}

    /**
     * ������ c => controller; f => function;
     */
    private function _initRequest(){
        //�� ���� http://����.com/index.php?c=user&f=main&param=value Ϊ��
        //��ȡ��������>>��ȡ page1&param=value
        $request = $_SERVER['QUERY_STRING'];
        if(empty($request)) $request = 'c=user';

        //����$request����>>��ȡ array('c=user', 'f=main', 'param=value')
        $parsed = explode('&', $request);

        //�û������ҳ��>>��ȡ c=user, $parsed = array('main', 'param=value')
        $c = array_shift($parsed);
        $ctrl = !preg_match('/^(?!c=)/', $c) ? str_replace('c=', '', $c) : '';
        //�û������ҳ��>>��ȡ f=main, $parsed = array('param=value')
        $f = array_shift($parsed);
        $func = !preg_match('/^(?!f=)/', $f) ? str_replace('f=', '', $f) : '';

        //������GET����
        $getVars = array();
        foreach ($parsed as $argument){
            list($variable, $value) = explode('=', $argument);
            $getVars[$variable] = $value;
        }

        $this->ctrl     = $ctrl;
        $this->func     = $func;
        $this->getVars  = $getVars;
    }
	
}
