<?php
/**
 * 装载器
 * @author bee
 */
class Loader_Lib{

    private static $load;

	public function __construct(){
		
	}

    /**
     * 单例设计模式，保证model只被实例化一次
     * @param $model
     * @return Xxx_Model
     */
    public function model($model){

        $model = $model.'_Model';
        if(!isset(self::$load[$model])){
            self::$load[$model] = new $model();
        }
        return self::$load[$model];
    }

    /**
     * 装载工具类
     * @param $helper
     * @return mixed
     */
    public function helper($helper){
        $helper = $helper.'_Helper';
        if(!isset(self::$load[$helper])){
            self::$load[$helper] = new $helper();
        }
        return self::$load[$helper];
    }

}