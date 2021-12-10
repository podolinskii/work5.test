<?php
require_once 'views/header.php';
?>

    <div id="block_account">
    <h1>Привет, <?=User::getLogin()?>!</h1>

    <h2>Личные данные</h2>
        <div class="info_login">
            <span class="label">Логин:</span>
            <input class="form-control clear" type="text" value="<?=User::getLogin()?>" disabled>
        </div>

        <div class="info_fio">
            <span class="label">ФИО:</span>
            <input class="form-control clear" uid="<?=User::getID()?>"  attr="fio" type="text"   value="<?=User::getFIO()?>" disabled>
            <input class="form-btn save"       attr="fio" type="submit" value="Принять" >
            <a class="change" attr="fio">Изменить ФИО</a>
        </div>

        <div class="info_email">
            <span class="label">Email:</span>
            <input class="form-control clear" attr="email" type="text" value="<?=User::getEmail()?>" disabled>
            <input class="form-btn save"  attr="email" type="submit" value="Принять" >
            <a class="change" attr="email" >Изменить Email</a>
        </div>

        <div class="info_pw">
        <a class="change_pw">Изменить пароль</a>
            <form>
                <div id="success" class="alert-info form-control">Пароль изменён!</div>
                <div id="error" class="alert-danger form-control" ></div>
            <input class="form-control clear" type="text" id="old_pass" placeholder="Укажите старый пароль" value="" required>
            <input class="form-control clear" type="text" id="new_pass" placeholder="Укажите новый пароль" value="" required>
            <input class="form-btn change_pass clear"  type="submit" value="Изменить" >
            </form>
        </div>







    </div>


<?php
require_once 'views/footer.php';
?>