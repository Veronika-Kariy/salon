<?
session_start();
include '../connect.php';
$id = $_GET['id'];
$master = mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '$id'");
$master = mysqli_fetch_array($master);
$pup = mysqli_query($link,"SELECT * FROM `master_of_puppets` WHERE `id` = '{$master['id_master']}'");
$pup = mysqli_fetch_array($pup);
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
    input[type="submit"],button{
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
    select{
        border: 1px solid #376060;
        padding: 5px;
    }
    input[type="submit"]:hover,a:hover,button:hover{
        background: #269191;
    }
    a{
        text-decoration: none;
        display: block;
        padding: 10px;
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
        <a href="/salo_2/admin.php?mas">Вернуться назад</a>
        <form action="http://localhost/salo_2/vendor/action/admin/upd_acc.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <span>Имя:</span>
            <input type="text" name="name" value="<?= $master['name'] ?>" placeholder="Имя">
            <span>Email:</span>
            <input type="text" name="email" value="<?= $master['email'] ?>" placeholder="Email">
            <? echo $_SESSION['error']['email'];
            unset($_SESSION['error']); ?>
            <span>Телефон:</span>
            <input type="text" name="tel" value="<?= $master['tel'] ?>" placeholder="Телефон">
            <span>Пароль:</span>
            <input type="text" name="password" value="<?= $master['password'] ?>" placeholder="Пароль">
            <span>Связь</span>
            <select style="margin-bottom: 20px;" name="master" id="">
                <option value="<?=$pup['id']?>"><? echo $pup['name'].' '.$pup['surname']?></option>
                <?
                $mast = mysqli_query($link, "SELECT * FROM `master_of_puppets` WHERE 1");
                while ($mas = mysqli_fetch_array($mast)) {
                ?>
                    <option value="<?= $mas['id'] ?>"><? echo $mas['name'] . ' ' . $mas['surname'] ?></option>
                <? } ?>
            </select>
            <button name="update">Обновить данные</button>
            <input type="submit" value="Удалить аккаунт" name="delete_master">
        </form>
    </div>
</body>

</html>