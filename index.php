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
    <title>SPHINX</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <? include 'vendor/components/header.php' ?>
    <div class="all_content">
        <div class="cat">
            <div class="cat_content">
                <div class="cat_left">
                    <h1>ЛАЗЕРНАЯ ЭПИЛЯЦИЯ ПО МЕДИЦИНСКИМ СТАНДАРТАМ</h1>
                    <h2>ЭФФЕКТИВНО ИЗБАВЛЯЕМ ДЕВУШЕКОТОВ НЕЖЕЛАТЕЛЬНЫХ ВОЛОС БЕЗ БОЛИ И РАЗДРАЖЕНИЯ</h2>
                    <p>2 ЗОНЫ 825₽</p>
                    <p class="zona">3 ЗОНЫ 1500₽</p>
                    <div><a href="master.php">Записаться</a></div>
                </div>
                <div class="cat_right">
                    <div class="circle">
                        <div class="img_cat">
                            <picture><img src="vendor/img/cat.png" alt=""></picture>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="all">
            <p class="center" id="whyy">ПОЧЕМУ БОЛЬШИНСТВО ДЕВУШЕК ВЫБИРАЕТ НАС</p>
            <div class="why">
                <div class="why_left">
                    <li>У нас есть медицинская лицензия. Вы можете быть уверены, что мы
                        ответственно подходим к своей работе.</li>
                    <li>Проверено Роспотребнадзором.</li>
                    <li>Гарантируем результат, а также стерильность и безопасность на приёме.</li>
                    <li>Все наши специалисты с Медицинским образованием.</li>
                    <li>Мы не экономим на наших клиентах. И используем необходимое количество вспышек и расходных
                        материалов.</li>
                    <li>Лазерная эпиляция максимально избавит вас от
                        нежелательных волос, вросших волос, раздражений, при правильном соблюдении разработанного
                        индивидуального плана посещений.</li>
                </div>
                <div class="why_right">
                    <img src="vendor/img/Rectangle 10.png" alt="">
                </div>
            </div>
            <p class="center">РЕЗУЛЬТАТ ЛАЗЕРНОЙ ЭПИЛЯЦИИ</p>
            <div class="result">
                <div class="">
                    <div class="result_left">
                        <div>
                            <p>Полное удаление волос навсегда</p>
                        </div>
                    </div>
                    <div class="result_center">
                        <div>
                            <p>Отсутствие раздражения и следов на месте проведения процедуры</p>
                        </div>
                    </div>
                    <div class="result_right">
                        <div>
                            <p>Сохранение целостности покровов кожи</p>
                        </div>
                    </div>
                </div>
                <div class="course">
                    <p>На курс требуется 8-10 продеур. Интервал подбирается индивидуально каждому клиенту.
                        Первые 3 процедуры с интервалом 20 дней, далее интервал 1-1,5 месяца</p>
                </div>
            </div>
            <p class="center" id="plus">ПРЕИМУЩЕСТВА СТУДИИ</p>
            <div class="pluses">
                <div class="">
                    <div class="pluses_left">
                        <div>
                            <h1>Безопасность</h1>
                            <p>Только наш аппарат Pacer Pacer One PRO удалит нежелательные волосы без рубцов, ожогов и покраснений</p>
                        </div>
                    </div>
                    <div class="pluses_center">
                        <div>
                            <h1>Стерильность</h1>
                            <p>Мы используем только гипоаллергенный гель и одноразовые расходные материалы. Оборудование проходит все этапы дезинфекции и стерилизации для каждого клиента</p>
                        </div>
                    </div>
                    <div class="pluses_right">
                        <div>
                            <h1>Безболезненность</h1>
                            <p>Наш аппарат обладает мощной системой охлаждения до -4°С, что сделает процедуру абсолютно безболезненной</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="id_feedback_form" class="feedback">
            <div class="feedback_block">
                <div class="feedback_circle">
                    <div class="feed_circle_top">
                        <h1>SPHINX</h1>
                        <p>Студия лазерной эпиляции</p>
                    </div>
                    <div class="feed_circle_bottom">
                        <h1>Консультация</h1>
                        <p>Консультация бесплатна</p>
                    </div>
                </div>
                <div class="feedback_form">
                    <form action="" class="form_feedback feedback_sub" method="post">
                        <input type="text" placeholder="Ваше имя*" class="input_name" name="name" value="<? echo $_SESSION['user']['name'] ?>" required>
                        <input type="email" placeholder="Email*" id="em" class="input_email" name="email" value="<? echo $_SESSION['user']['email'] ?>" required>
                        <input type="tel" placeholder="Телефон*" class="input_tel" name="tel" value="<? echo $_SESSION['user']['tel'] ?>" required>
                        <input type="text" id="" placeholder="Ваше сообщение*" class="input_text" name="message" required>
                        <input type="submit" value="Отправить" class="input_submit" name="send">
                        <div id="erconts"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <? include 'vendor/components/footer.php' ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="assets/js/feedback.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>