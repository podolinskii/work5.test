<?php

class Account extends Controller{

    public function __construct()
    {
        if(!(User::isLogin())){
            header('Location: http://work5.test/login');
        }

        parent::__construct();
        $this->view->setTitle('Личный кабинет');



    }




}