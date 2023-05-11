<?
session_start();
include '../connect.php';
$id = $_GET['id'];
$master = mysqli_query($link,"SELECT * FROM `master_of_puppets` WHERE `id` = '$id'");
$master = mysqli_fetch_array($master);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        margin: 0
    }
    form{
        width: 300px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin: 10px 0;
    }
    input[type="submit"]{
        border: 0;
        background: #376060;
        color: white;
        padding: 10px;
        cursor: pointer;
    }
    form input:not(input[type="file"],input[type="submit"]){
        border: none;
        padding: 5px;
    }
    input[type="submit"]:hover,a:hover{
        background: #269191;
    }
    a{
        text-decoration: none;
        display: block;
        padding: 10px;
        margin-right: 10px;
        background-color: #376060;
        color: #ededed;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }
    body>div{
        padding: 20px;
        width: fit-content;
        margin: auto;
        background: #e0e0e0;
        border-radius: 10px;
    }
</style>
<body>
    <div>
        <a href="/salo_2/admin.php?add">Вернуться назад</a>
        <form action="../../action/admin/master.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="filename" value="<?=$master['img']?>">
            <input type="text" name="name" value="<?=$master['name']?>" placeholder="Имя">
            <input type="text" name="surname" value="<?=$master['surname']?>" placeholder="Фамилия">
            <input type="text" name="stage" value="<?=$master['stage']?>" placeholder="Стаж">
            <span>Загрузите фото</span>
            <input type="file" name="img">
            <input type="submit" value="Обновить данные" name="upd_master">
            <input type="submit" value="Удалить мастера" name="delete_master">
        </form>
        <h1>Оказываемые услуги</h1>
        <? $services = mysqli_query($link,"SELECT * FROM `services` WHERE `id_master` = '$id'");
                while($serv = mysqli_fetch_array($services)):
        ?>
        <form action="../../action/admin/master.php" method="post">
            <div>
                <input type="text" name="service" value="<?=$serv['service'] ?>">
                <div style="display: flex; margin-top:5px;gap:10px">
                    <input type="hidden" name="id_serv" value="<?=$serv['id'] ?>">
                    <input type="submit" name="upd_service" value="Обновить">
                    <input type="submit" name="del_service" value="Удалить">
                </div>
            </div>
        </form>
        <? endwhile; ?>
    </div>
</body>

</html>