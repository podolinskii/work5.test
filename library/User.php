<?php

class User{

    static function isLogin(){
        if(isset($_SESSION['AUTH']) AND $_SESSION['AUTH'] == 'true'){
            return true;
        }
        return false;
    }

    static function logOut(){
        session_destroy();
        header('Location: http://work5.test/login');
    }



}