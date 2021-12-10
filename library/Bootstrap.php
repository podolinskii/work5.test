<?php

class Bootstrap
{

    public function __construct()
    {
//Создаем сессию
        session_start();

//Обрабатываем запрос пользователя
        if (isset($_GET['url']) and $_GET['url'] != '') {
            //Записываем запрос в массив
            $url = explode("/", (rtrim($_GET["url"], "/")));
        } else {
            $url['0'] = 'Login';
        }

//Определяем путь к контроллеру
        $file_name = PATHPREFIX . $url['0'] . PATHPOSTFIX;

//Проверяем сещуствование контроллера -> Подключаем
        if (file_exists($file_name)) {
            include_once($file_name);
            $controller = new $url['0'];

            //Проверяем существование метода
            if (isset($url['1']) and method_exists($controller, $url['1'])) {
                $controller->{$url['1']}($url['2']);
            } else {
                $controller->Index();
            }
        } else {
            echo 'Page Not Found';
        }
    }
}





