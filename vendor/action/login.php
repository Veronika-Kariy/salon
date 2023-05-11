<?php
session_start();
include "../components/connect.php";
$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$password = $_POST['password'];
$password = md5($password . "gewgegesgve");
$users = mysqli_query($link, "SELECT * FROM `users` WHERE `email`='$email' AND `password` = '$password'");
if (mysqli_num_rows($users) == 0) {
    echo 1;
} else {
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
        echo 2;
    }
}
