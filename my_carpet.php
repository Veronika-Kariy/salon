<?php
session_start();
include 'vendor/components/connect.php';
$filename = 'my_carpet.php';
$page = $_GET['page'];
if(empty($_GET['page'])){
    $page = 1;
}
$kol = 10; //количество записей для вывода
$art = ($page * $kol)-$kol; // определяем, с какой записи нам выводить
$res = mysqli_query($link,"SELECT COUNT(*) FROM `carpet` WHERE `id_user` = '{$_SESSION['user']['id']}'");
$row = mysqli_fetch_row($res);
$total = $row[0]; // всего записей
$str_pag = ceil($total / $kol); //узнаем сколько страниц будет
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои записи</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <? include 'vendor/components/header.php' ?>
    <main class="main">
        <? 
        if($_SESSION['user']['status'] == 3){
        include 'vendor/components/admin/employees.php';
        }
        ?>
        <section class="my_orders">
            <? 
            $carpets = mysqli_query($link,"SELECT * FROM `carpet` WHERE `id_user` = '{$_SESSION['user']['id']}' ORDER BY `carpet`.`status` ASC LIMIT $art,$kol");
            while($carpet = mysqli_fetch_array($carpets)):
                $date = date('d-m-Y',strtotime($carpet['date']));
            ?>
            <div class="block_my_order">
                <div class="my_order_header">
                    <div class="info_my_order">
                        <div class="name_my_order">Запись GG-<?=$carpet['id'] ?> на <?= $date ?></div>
                        <div class="status_my_order"><? if($carpet['status'] == 0){ echo 'Вы записаны'; }elseif($carpet['status'] == 1){ echo 'Услуга оказана';}elseif($carpet['status'] == 2){echo 'Отменена';} ?></div>
                    </div>
                    <form method="POST" action="vendor/action/cancel_rev.php" class="order_header_del_btn">
                        <input type="hidden" name="id_order" value="<?= $carpet['id'] ?>">
                        <? if($carpet['status'] == 0): ?>
                        <input type="submit" name="canc_order" class="btn_del_order" value="Отменить">
                        <? endif; ?>
                    </form>
                </div>
                <? 
                $master = mysqli_query($link,"SELECT * FROM `master_of_puppets` WHERE `id` = '{$carpet['id_master']}'");
                $master = mysqli_fetch_array($master);
                ?>
                <div class="order_body order_body_click">
                    <div class="order_price_block">
                        <div class="order_price">Вы записаны на <?=$carpet['time']?></div>
                        <div class="order_price">Мастер - <?=$master['name'].' '.$master['surname'] ?></div>
                    </div>
                    <div class="order_price_block">
                        <div class="order_price">Услуги:</div>
                        <? 
                        $carpet_list = mysqli_query($link,"SELECT * FROM `carpet_list` WHERE `id_carpet` = '{$carpet['id']}'");
                        while($carpet_l = mysqli_fetch_array($carpet_list)):
                        $services = mysqli_query($link,"SELECT * FROM `services` WHERE `id` = '{$carpet_l['id_services']}'");
                        while($service = mysqli_fetch_array($services)):
                        ?>
                        <div class="order_price"><?=$service['service']?></div>
                        <?
                        endwhile;
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
            <? 
            endwhile;
            ?>
            <? include 'vendor/components/nav_block_pagination.php' ?> 
            <? if(mysqli_num_rows($carpets) == 0): ?>
            <div class="tovar_rev_block">
                <div class="tovar_rev">
                    <div style="text-align: center;" class="rev_title">Вы еще не записывались</div>
                </div>
            </div>
            <? endif; ?>
        </section>
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>
</html>