<?
session_start();
include '../../components/connect.php';

if(isset($_POST['update'])){
    if($_POST['master']!=NULL){
        $mas = $_POST['master'];
        $where = ',`id_master`='.$mas.'';
    }
    $user = mysqli_query($link,"SELECT * FROM `users` WHERE `id` = '{$_POST['id']}'");
    $user = mysqli_fetch_array($user);
    $users = mysqli_query($link,"SELECT * FROM `users` WHERE 1");
    
    if($user['email'] == $_POST['email']){
        if($user['password'] == $_POST['password']){
            mysqli_query($link,"UPDATE `users` SET `name`='{$_POST['name']}',`email`='{$_POST['email']}',`tel`='{$_POST['tel']}' $where WHERE `id` = '{$_POST['id']}'");
        } else {
            $password = $_POST['password'];
            $password = md5($password . "gewgegesgve");
            mysqli_query($link,"UPDATE `users` SET `name`='{$_POST['name']}',`email`='{$_POST['email']}',`tel`='{$_POST['tel']}',`password` = '$password' $where WHERE `id` = '{$_POST['id']}'");
        }
        header("Location: ../../../admin.php?mas");
    } else {
        $a = 0;
        while($us = mysqli_fetch_array($users)){
            if($us['email'] == $_POST['email']){
                $_SESSION['error']['email'] = 'Такой email уже существует';
                header("Location:" . $_SERVER["HTTP_REFERER"]);
                $a++;
            }
        }
        if($a == 0){
            if($user['password'] == $_POST['password']){
                mysqli_query($link,"UPDATE `users` SET `name`='{$_POST['name']}',`email`='{$_POST['email']}',`tel`='{$_POST['tel']}' $where WHERE `id` = '{$_POST['id']}'");
            } else {
                $password = $_POST['password'];
                $password = md5($password . "gewgegesgve");
                mysqli_query($link,"UPDATE `users` SET `name`='{$_POST['name']}',`email`='{$_POST['email']}',`tel`='{$_POST['tel']}',`password` = '$password' $where WHERE `id` = '{$_POST['id']}'");
            }
            header("Location: ../../../admin.php?mas");
        }
    }
}

if(isset($_POST['delete_master'])){
    mysqli_query($link,"DELETE FROM `users` WHERE `id` = '{$_POST['id']}'");
    header("Location: ../../../admin.php?mas");
}
?>