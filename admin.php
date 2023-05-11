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
    <title>Админ</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <? include 'vendor/components/header.php' ?>
    <main class="main main_admin">
        <div class="admin_block">
            <? 
            if($_SESSION['user']['status'] == 1){
                if(empty($_GET)){
                    echo '<a href="?add" class="btn_href">Мастера</a>';
                    echo '<a href="?mod" class="btn_href">Модерация отзывов</a>';
                    echo '<a href="?mas" class="btn_href">Аккаунты сотрудников</a>';
                    echo '<a href="?car" class="btn_href">Записи</a>';
                } else {
                    echo '<a href="admin.php" class="btn_href">Вернуться назад</a>';
                }
            }
            if($_SESSION['user']['status'] == 3){
                if(empty($_GET)){
                    echo '<a href="?car" class="btn_href">Записи</a>';
                } else {
                    echo '<a href="admin.php" class="btn_href">Вернуться назад</a>';
                }
            }
            ?>
        </div>
        <? 
            if(isset($_GET["add"])){
                include 'vendor/components/admin/add_master.php';
            }

            if(isset($_GET["mod"])){
                include 'vendor/components/admin/moder_rev.php';
            }

            if(isset($_GET["mas"])){
                include 'vendor/components/admin/reg_master.php';
            }

            if(isset($_GET["car"])){
                include 'vendor/components/admin/carpet.php';
            }

            if(isset($_GET["car_suc"])){
                include 'vendor/components/admin/carpet.php';
            }

            if(isset($_GET["car_сan"])){
                include 'vendor/components/admin/carpet.php';
            }
        ?>
    </main>
    <? include 'vendor/components/footer.php' ?>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/login.js"></script>
</body>
</html>