<?php

class Login extends Controller{


    public function __construct()
    {
        if(User::isLogin()){
            header('Location: http://work5.test/account');
        }

        parent::__construct();
        $this->view->setTitle('Страница авторизации');


    }



    public function login(){
        if(isset($_POST["login"]) and isset($_POST["password"])){
            $login = htmlspecialchars($_POST["login"]);
            $pass = htmlspecialchars($_POST["password"]);

            if($this->model->login($login,$pass)){
                header('Location:'.'http://work5.test/account');

            }else{

               $this->view->error_login = 'Неверный логин или пароль!';
               $this->Index();

            }
        }
        else{
            $this->view->error_login = 'Укажите логин и пароль!';
            $this->Index();
        }
    }

    public function logOut(){
        User::logOut();
    }



}