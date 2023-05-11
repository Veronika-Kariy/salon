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
    <title>Фото</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <? include 'vendor/components/header.php' ?>
    
    <div class="slideshow-container">
        <div><p class="foto_center">ФОТОГАЛЕРЕЯ</p></div>
        <div class="mySlides fade">
            <img src="vendor/img/1.jpg" style="width: 330px" class="sobitia" alt="фото 1">
            <img src="vendor/img/2.jpg" style="width: 330px" class="sobitia" alt="фото 2">
            <img src="vendor/img/3.jpg" style="width: 330px" class="sobitia" alt="фото 3">
        </div>

        <div class="mySlides fade">
            <img src="vendor/img/4.jpg" style="width: 330px" class="sobitia" alt="фото 4">
            <img src="vendor/img/5.jpg" style="width: 330px" class="sobitia" alt="фото 5">
            <img src="vendor/img/6.jpg" style="width: 330px" class="sobitia" alt="фото 6">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094</a>
        <a class="next" onclick="plusSlides(1)">&#10095</a>
    </div>
    <? include 'vendor/components/footer.php' ?>
    <script src="assets/js/script.js"></script>
</body>

</html>