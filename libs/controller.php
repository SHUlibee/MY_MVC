<?php
/**
 * ���������
 * @author code29
 */
class Controller_Lib{

    /**
     * @var null|View_Lib ��ͼ
     */
    public $view = null;

    /**
     * @var null|Loader_Lib װ����
     */
    public $load = null;

    /**
     * @var null|������
     */
    public $request = null;

	public function __construct(){
		
		$this->view = new View_Lib();
        $this->load = new Loader_Lib();
	}

    /**
     * ����������
     * @param $ctrl
     * @param $func
     * @param $vars
     */
    public function setRequest($ctrl, $func, $vars){
        $req = new stdClass();

        $req->ctrl      = $ctrl;
        $req->func      = $func;
        $req->params['get']     = $this->_inputFilter($vars);
        $req->params['post']    = $this->_inputFilter($_POST);

        $this->request = $req;
    }

    /**
     * �ݹ����
     * @param $arr
     * @return mixed
     */
    private function _inputFilter($arr){

        while(list($key,$var) = each($arr)) {
            if ($key != 'argc' && $key != 'argv' && (strtoupper($key) != $key || ''.intval($key) == "$key")) {
                if (is_string($var)) {
                    $arr[$key] = stripslashes($var);
                }
                if (is_array($var))  {
                    $arr[$key] = $this->_inputFilter($var);
                }
            }
        }
        return $arr;
    }

}