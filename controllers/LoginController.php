<?php

class Login extends Controller{


    public function __construct()
    {
        parent::__construct();

    }

    public function login(){
        if(isset($_POST["login"]) and isset($_POST["password"])){
            $login = htmlspecialchars($_POST["login"]);
            $pass = htmlspecialchars($_POST["password"]);

            if($this->model->login($login,$pass)){
                header('Location:'.'http://example/');
            }else{echo 'error';}
        }
        else{
            echo 'no data';
        }
    }


}