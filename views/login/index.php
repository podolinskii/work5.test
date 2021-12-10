<?php
require_once 'views/header.php';
?>


<div id="block_auth">
    <h2>Форма входа:</h2>
    <form method="post" action="/login/login">

        <label class="form-label" for="login">Укажите логин:</label>
        <input class="form-control" name="login" id="login" type="text" value="" placeholder="Логин">


        <label class="form-label" for="password">Укажите пароль:</label>
        <input class="form-control" name="password" id="password" type="password" placeholder="Пароль">

        <input type="submit" class="form-btn" value="Войти">
    </form>

</div>

<div id="block_reg">
    <h2>Форма регистрации:</h2>

    <form method="post" action="/login/registration">
        <label class="form-label" for="login">Укажите логин:</label>
        <input class="form-control" id="reg_login" type="text" placeholder="">

        <label class="form-label" for="login">Укажите ФИО:</label>
        <input class="form-control" id="reg_fio" type="text">

        <label class="form-label" for="login">Укажите Email:</label>
        <input class="form-control" id="reg_password" type="email">

        <label class="form-label" for="login">Укажите пароль:</label>
        <input class="form-control" id="reg_password" type="password">

        <input class="form-btn" type="submit" value="Отправить">
    </form>

</div>

<?php
require_once 'views/footer.php';
?>