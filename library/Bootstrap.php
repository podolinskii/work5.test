<?php

class Bootstrap{

    public function __construct(){

//Обрабатываем запрос пользователя
        if(isset($_GET['url']) AND $_GET['url'] != '')
        {
            //Записываем запрос в массив
            $url = explode("/", (rtrim($_GET["url"], "/")));
        }else{
            $url['0'] = 'Index';
        }
//Определяем путь к контроллеру
        $file_name = PATHPREFIX.$url['0'].PATHPOSTFIX;
//Проверяем сещуствование контроллера -> Подключаем
        if(file_exists($file_name)){

            include_once($file_name);
            $controller = new $url['0'];

        }else{
            echo 'Page Not Found';
        }
    }

}





