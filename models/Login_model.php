<?php

class Login_model extends Model{

    public function __construct()
    {
        parent::__construct();

    }

    public function login($login,$password){

        $stmt = $this->db->prepare("SELECT * FROM users WHERE login=:login AND pass=:password");
        $data = [
            ':login' => $login,
            ':password' => md5($password)
        ];
        $stmt->execute($data);

        if($stmt->rowCount()>0 ){
            $result = $stmt->fetch();
            $_SESSION['AUTH'] = "true";
            $_SESSION['USER_ID'] = $result["id"];
            $_SESSION['USER_LOGIN'] = $result["login"];
            $_SESSION['USER_FIO'] = $result["fio"];
            $_SESSION['USER_EMAIL'] = $result["email"];
            return true;
        }else{
            return false;
        }


    }

    public function loginExist($login){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE login=:login");
        $data = [
            ':login'=>$login
        ];
        $stmt->execute($data);
        if($stmt->rowCount()>0 ){
            return true;
        }else{
            return false;
        }
    }

    public function registration($data){

        $stmt = $this->db->prepare("INSERT INTO users (login, pass, fio, email) VALUES (:login, :pass, :fio, :email)");
        $stmt->execute($data);
        $id = $this->db->lastInsertId();
        if(isset($id) AND $id > 0 )
        {
            $result = $stmt->fetch();
            $_SESSION['AUTH'] = "true";
            $_SESSION['USER_LOGIN'] = $id;
            $_SESSION['USER_LOGIN'] = $data[':login'];
            $_SESSION['USER_FIO'] = $data[':fio'];
            $_SESSION['USER_EMAIL'] = $data[':email'];
            return true;
        }else{
            return false;
        }
    }
}

