<?php

class Login extends Controller
{


    public function __construct()
    {
        //Проверка авторизации. Если true - направляем в Личный кабинет
        if (User::isLogin()) {
            header('Location: http://work5.test/account');
        }
        parent::__construct();
        $this->view->setTitle('Страница авторизации');

    }

    // Авторизация
    public function login()
    {
        if (isset($_POST["login"]) and isset($_POST["password"])) {
            $login = htmlspecialchars($_POST["login"]);
            $pass = htmlspecialchars($_POST["password"]);

            if ($this->model->login($login, $pass)) {
                header('Location:' . 'http://work5.test/account');

            } else {

                $this->view->error_login = 'Неверный логин или пароль!';
                $this->Index();

            }
        } else {
            $this->view->error_login = 'Укажите логин и пароль!';
            $this->Index();
        }
    }

    // Выйти из аккаунта
    public function logOut()
    {
        User::logOut();
    }

    // Регистрация
    public function registration()
    {
        if (isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["fio"])) {

            $login = htmlspecialchars($_POST["login"]);
            $pass = htmlspecialchars($_POST["password"]);
            $fio = htmlspecialchars($_POST["fio"]);
            $email = htmlspecialchars($_POST["email"]);

            //Проверка существования логина
            if ($this->model->loginExist($login)) {
                $this->view->error_reg = 'Логин занят';
                $this->Index();
                die();
            }

            $datas = [
                ':login' => "$login",
                ':pass' => md5($pass),
                ':fio' => $fio,
                ':email' => $email
            ];

            if ($this->model->registration($datas)) {
                header('Location: http://work5.test/account');
            } else {
                $this->view->error_reg = 'Не удалось зарегистрироваться';
                $this->Index();
            }
        } else {
            $this->view->error_reg = 'Заполните все поля';
            $this->Index();
        }
    }


}