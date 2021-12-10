<?php

class View{

    //запускаем рендер страницы, если существует нужный раздел
    public function render($path, $filename='index'){
        $view_path = $_SERVER['DOCUMENT_ROOT'].'/views/'.$path.'/'.$filename.'.php';
        if(file_exists($view_path)){
            include_once($view_path);
        }
    }

    public function setTitle($title){
        $this->title = 'Work5 - '.$title;
    }





}