<?php

class User{

    static function isLogin(): bool
    {
        if(isset($_SESSION['AUTH']) AND $_SESSION['AUTH'] == 'true'){
            return true;
        }
        return false;
    }

    static function logOut(){
        session_destroy();
        header('Location: http://work5.test/login');
    }

    static function getLogin(){
        if(isset($_SESSION['USER_LOGIN']) AND $_SESSION['AUTH'] == 'true'){
            return $_SESSION['USER_LOGIN'];
        }
        return false;
    }

    static function getID(){
        if(isset($_SESSION['USER_ID']) AND $_SESSION['AUTH'] == 'true'){
            return $_SESSION['USER_ID'];
        }
        return false;
    }

    static function getEmail(){
        if(isset($_SESSION['USER_EMAIL']) AND $_SESSION['AUTH'] == 'true'){
            return $_SESSION['USER_EMAIL'];
        }
        return false;
    }

    static function getFIO(){
        if(isset($_SESSION['USER_FIO']) AND $_SESSION['AUTH'] == 'true'){
            return $_SESSION['USER_FIO'];
        }
        return false;
    }







}