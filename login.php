<?php
session_start();
include 'vendor/components/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <? include 'vendor/components/header.php' ?>
    <main class="main">
        <div class="login_form">
            <div class="login_top">
                <div class="login_button">
                    <button id="login_button_one">Вход</button>
                </div>
                <div class="registration_button">
                    <button id="reg_button_one">Регистрация</button>
                </div>
            </div>
            <div class="login_bottom">
                <form class="form_autorization" action="" method="post">
                    <input name="email" class="login_email" type="email" placeholder="Введите ваш E-mail" required>
                    <input name="password" class="login_password" type="text" placeholder="Введите ваш пароль" required>
                    <div class="autorization_button">
                        <button type="submit" name="login">Войти на сайт</button>
                    </div>
                    <div id="errLog"></div>
                </form>
            </div>
            <form class="form_reg" action="" method="post">
                <input name="name" class="reg_fio" type="text" placeholder="Введите Имя" required onkeypress="noDigits(event)"> 
                <input name="email" class="reg_email" type="email" placeholder="Введите ваш E-mail" required pattern="\S+@[a-z]+.[a-z]+" title="Email должен быть действующим">
                <input name="tel" class="reg_tel" id="mphone" type="tel" placeholder="Введите номер телефона" required pattern="[8][789][0-9]{9}" title="Номер телефона в формате 8xxxxxxxxxx"> 
                <input name="password" class="reg_password" type="password" placeholder="Введите ваш пароль" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="8 или более символов, в том числе по меньшей мере, одну цифру,  одну прописную, одну строчные буквы" required>
                <div class="registration_buttontwo">
                    <button type="submit" name="registration">Зарегистрироваться</button>
                </div>
                <div id="erconts"></div>
            </form>
        </div>
    </main>
    <? include 'vendor/components/footer.php' ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="assets/js/login.js"></script>
</body>

</html>