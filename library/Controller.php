<?php

class Controller{

   
    public function __construct()
    {
        $this->view = new View;
        //Подключаем кастомные стили для раздела, если они существуют
        if(file_exists(get_class($this)).'/css/style.css'){
            $this->view->styles = strtolower(get_class($this)).'/css/style.css';
        }

        //Подключаем JS для раздела, если он существует
        if(file_exists('public/'.strtolower(get_class($this)).'/js/script.js')){
            $this->view->scripts = 'public/'.strtolower(get_class($this)).'/js/script.js';
        }

        $this->model_name =get_class($this).'_model';
        require_once $_SERVER['DOCUMENT_ROOT'].'/models/'.$this->model_name.'.php';
        $this->model = new $this->model_name;

    }

    public function Index(){
        $this->view->render( get_class($this));
    }
}