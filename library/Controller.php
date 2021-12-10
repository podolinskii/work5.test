<?php

class Controller{

    public function __construct()
    {
        $this->view = new View;
        $this->model_name =get_class($this).'_model';
        require_once $_SERVER['DOCUMENT_ROOT'].'/models/'.$this->model_name.'.php';
        $this->model = new $this->model_name;



    }

    public function Index(){

        $this->view->render( get_class($this));

    }
}