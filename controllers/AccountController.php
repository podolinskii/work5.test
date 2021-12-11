<?php

class Account extends Controller
{

    public function __construct()
    {
        if (!(User::isLogin())) {
            header('Location: http://work5.test/login');
        }
        parent::__construct();
        $this->view->setTitle('Личный кабинет');
    }

    public function changeUserInfo()
    {
        if (isset($_POST["target"]) and isset($_POST["value"])) {

            $id = User::getID();
            $target = htmlspecialchars($_POST["target"]);
            $value = htmlspecialchars($_POST["value"]);

            $data = [
                ':id' => $id,
                ':target' => $target,
                ':value' => $value
            ];
            $this->model->changeUserInfo($data);

        }
    }

    public function changePassword(){
        if (isset($_POST["old_pw"]) && isset($_POST["new_pw"]) && $_POST["new_pw"] !=''){
            $login = User::getLogin();
            $old_pw = htmlspecialchars($_POST["old_pw"]);
            $new_pw = htmlspecialchars($_POST["new_pw"]);

            $data = [
                'login'=> $login,
                'old_password'=>$old_pw,
                'new_password'=>$new_pw

            ];
            $this->model->changePassword($data);
        }else{
            echo 'Заполните все поля!';
        }


    }

    public function task_1(){
        $this->view->task1 = $this->model->task_1();
        $this->view->render(get_class($this),'task_1');
    }

    public function task_2(){
        $this->view->task2  = $this->model->task_2();
        $this->view->render(get_class($this),'task_2');
    }

    public function task_3(){
        $this->view->task3  = $this->model->task_3();
        $this->view->render(get_class($this),'task_3');
    }




}