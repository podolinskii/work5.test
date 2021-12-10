<?php

class Account_model extends Model
{

    //Смена пользовательских данных
    public function changeUserInfo($data)
    {

        switch ($data[':target']) {
            case 'email':
                $sql = "UPDATE users SET email=:value WHERE id=:id";
                $session = 'USER_EMAIL';
                break;
            case 'fio':
                $sql = "UPDATE users SET fio=:value WHERE id=:id";
                $session = 'USER_FIO';
                break;
        }

        $arr = [
            ':value' => $data[':value'],
            ':id' => $data[':id']
        ];
        $stmt = $this->db->prepare($sql);

        if ($stmt->execute($arr)) {
            $_SESSION["$session"] = $data[':value'];
        } else {
            return false;
        }

    }

    //Смена пароля (с проверкой старого)
    public function changePassword($data)
    {

        //Проверяем старый пароль
        $stmt = $this->db->prepare("SELECT * FROM users WHERE login=:login AND pass=:password");
        $arr = [
            ':login' => $data['login'],
            ':password' => md5($data['old_password'])
        ];
        $stmt->execute($arr);

        //Если логин и старый пароль подходят - меняем пароль на новый
        if ($stmt->rowCount() > 0) {
            $new_arr = [
                ':login' => $data['login'],
                ':new_pass' => md5($data['new_password'])
            ];
            $stmt = $this->db->prepare("UPDATE users SET pass=:new_pass WHERE login=:login");
            if ($stmt->execute($new_arr)) {

                $msg = '200';
                echo $msg;
            }
        } else {
            $msg = 'Старый пароль введён неверно!';
            echo $msg;
        }


    }

}