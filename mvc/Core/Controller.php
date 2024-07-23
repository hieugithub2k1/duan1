<?php

class Controller{
    public function model($model_name){
        require_once "./mvc/Models/{$model_name}.php";
        return new $model_name;
    }

    public function view($view_path,$data=[]){
        extract($data);
        require_once "./mvc/Views/".$view_path . ".php" ;

    }
    
}