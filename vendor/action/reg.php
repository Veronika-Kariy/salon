<?php
session_start();
include "../components/connect.php";
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $password = $_POST['password'];
    $password = md5($password . "gewgegesgve");
    $if = 0;
    $users = mysqli_query($link, "SELECT * FROM `users` WHERE `email`='$email'");
    if (mysqli_num_rows($users) == 0) {
        $if++;
    } else {
        echo 1;
    }
    $users = mysqli_query($link, "SELECT * FROM `users` WHERE `tel`='$tel'");
    if (mysqli_num_rows($users) == 0) {
        $if++;
    } else {
        echo 2;
    }
    if ($if == 2) {
        if(isset($_POST['status'])){
            if($_POST['master'] == NULL){
                mysqli_query($link, "INSERT INTO `users`(`name`, `email`, `tel`, `password`,`status`) 
                VALUES ('$name','$email','$tel','$password','{$_POST['status']}')");
            } else {
                mysqli_query($link, "INSERT INTO `users`(`name`, `email`, `tel`, `password`,`status`,`id_master`) 
                VALUES ('$name','$email','$tel','$password','{$_POST['status']}','{$_POST['master']}')");
            }
            echo 5;
        } else {
            mysqli_query($link, "INSERT INTO `users`(`name`, `email`, `tel`, `password`) 
            VALUES ('$name','$email','$tel','$password')");
            $users = mysqli_query($link, "SELECT * FROM `users` WHERE `email`='$email' AND `password` = '$password'");
            if (mysqli_num_rows($users) >= 1) {
                $user = mysqli_fetch_array($users);
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'tel' => $user['tel'],
                    'status' => $user['status'],
                ];
            }
            echo 3;
        }
    }
}else{
    echo 4;
}
