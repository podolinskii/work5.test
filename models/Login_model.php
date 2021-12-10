<?php

class Login_model extends Model{

    public function __construct()
    {
        parent::__construct();

    }

    public function login($login,$password){

        $stmt = $this->db->prepare("SELECT * FROM users WHERE login=:login AND pass=:password");
        $data = [
            ':login'=>$login,
            ':password'=> md5($password)
        ];
        $stmt->execute($data);

        if($stmt->rowCount()>0 ){
            $result = $stmt->fetch();

            $_SESSION['AUTH'] = "true";
            $_SESSION['USER_NAME'] = $result["login"];
            $_SESSION['USER_FIO'] = $result["fio"];
            $_SESSION['USER_EMAIL'] = $result["email"];

            return true;
        }else{
            return false;
        }


    }




}