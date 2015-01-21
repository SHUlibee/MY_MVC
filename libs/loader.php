<?php
/**
 * 装载器
 * @author bee
 */
class Loader_Lib{
	
	public function __construct(){
		
	}

    /**
     * @param $model
     * @return Xxx_Model
     */
    public function model($model){

        $model = $model.'_Model';
        return new $model();
    }

}