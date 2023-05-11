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
    <title>Мастера</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/plagins/jquery-ui/jquery-ui.css">
</head>

<body>
    <? include 'vendor/components/header.php' ?>
    <div class="heading">
        <p class="center" id="whyy">Мастера</p>
    </div>
    <div class="masters_all">
        <?php
        $masters = mysqli_query($link, "SELECT * FROM `master_of_puppets` WHERE 1");
        while ($master = mysqli_fetch_array($masters)) {
        ?>
            <div class="masters">
                <div class="imgMaster">
                    <picture><img src="vendor/img/masters/<? echo $master['img'] ?>" alt=""></picture>
                </div>
                <div class="aboutMasters">
                    <div class="aboutMaster">
                        <div>
                            <h1><? echo $master['name'] ?> <? echo $master['surname'] ?></h1>
                            <p>Стаж <? echo $master['stage'] ?> </p>
                            <p>Услуги:</p>
                            <? $services = mysqli_query($link, "SELECT * FROM `services` WHERE `id_master`={$master['id']}");
                            while ($service = mysqli_fetch_array($services)) {
                            ?>
                                <div><? echo $service['service'] ?></div>
                            <? } ?>
                            <? if ($_SESSION['user']) : ?>
                                <button class="button_master">Записаться</button>
                            <? else : ?>
                                <button class="button_master_aut">Авторизуйтесь для записи</button>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
                <div class="popup-fade">
                    <div class="popup">
                        <div class="block_popup-close">
                            <div>Форма записи</div>
                            <div class="popup-close Button Button_view_clear Button_size_m Button_indentless Header-Button" type="button" tabindex="0" role="button" style="visibility:visible"><div class="SvgIconWrap" data-svg="Close"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" focusable="false" aria-hidden="true" class="SvgIcon"><path fill-rule="evenodd" clip-rule="evenodd" d="M19.207 6.207a1 1 0 0 0-1.414-1.414L12 10.586 6.207 4.793a1 1 0 0 0-1.414 1.414L10.586 12l-5.793 5.793a1 1 0 1 0 1.414 1.414L12 13.414l5.793 5.793a1 1 0 0 0 1.414-1.414L13.414 12l5.793-5.793z" fill="currentColor"></path></svg></div></div>
                        </div>
                        <div class="feedback_form" id="form_two">
                            <form class="form_feedback" method="post">
                                <span>Ваше имя:</span>
                                <input type="text" placeholder="Ваше имя*" class="input_name" name="name" value="<? echo $_SESSION['user']['name'] ?>" required>
                                <span>Ваш email:</span>
                                <input type="email" placeholder="Email" id="em" class="input_email" name="email" value="<? echo $_SESSION['user']['email'] ?>">
                                <span>Ваш номер телефона:</span>
                                <input type="tel" placeholder="Телефон*" class="input_tel" name="tel" value="<? echo $_SESSION['user']['tel'] ?>" required>
                                <input type="hidden" name="id_master" value="<? echo $master['id'] ?>">
                                <input type="hidden" name="name_master" value="<? echo $master['name'] ?>">
                                <input type="hidden" name="surname_master" value="<? echo $master['surname'] ?>">
                                <span>Выберите услугу:</span>
                                <? $services = mysqli_query($link, "SELECT * FROM `services` WHERE `id_master`={$master['id']}");
                                while ($service = mysqli_fetch_array($services)) {
                                ?>
                                    <label class="service_check">
                                        <input type="checkbox" class="serviceCheck" name="service[]" value="<? echo $service['id'] ?>"><? echo $service['service'] ?>
                                        <input type="checkbox" class="nservice" name="nService[]" value="<? echo $service['service'] ?>">
                                    </label>
                                <? } ?>
                                <span>Выберите дату и время:</span>
                                <div class="date">
                                    <input name="date" type="text" class="datepicker" readonly required>
                                </div>
                                <div class="time">

                                </div>
                                <input type="hidden" class="time_input" name="time" value="">
                                <input type="submit" value="Отправить" class="input_submit" name="send">
                                <div class="erconts"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <? } ?>
    </div>
    <? include 'vendor/components/footer.php' ?>
    <script src="assets/plagins/jquery-ui/jquery-ui.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>