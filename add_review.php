<?php
session_start();
include "vendor/components/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление отзыва</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <? include 'vendor/components/header.php' ?>
    <main class="main">
        <? 
        $reviews = mysqli_query($link,"SELECT * FROM `rewiews` WHERE `id_user` = '{$_SESSION['user']['id']}'");
        $review = mysqli_fetch_array($reviews);
        if(mysqli_num_rows($reviews) == 0):
        ?>
        <div class="tovar_rev_block tovar_addrev_block">
            <form method="POST" action="vendor/action/reviews/add.php" class="tovar_rev">
                <div class="rev_header">
                    <div class="rev_user_name">Ваша оценка:</div>
                </div>
                <div class="stars">
                    <select name="estimation" id="" required>
                        <option disabled selected value>Выберите оценку</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="rev_body">
                    <div class="rev_plus">
                        <div class="rev_title">Достоинства:</div>
                        <div class="rev_desc"><textarea name="plus" id="" cols="100" rows="10" required></textarea></div>
                    </div>
                    <div class="rev_minus">
                        <div class="rev_title">Недостатки:</div>
                        <div class="rev_desc"><textarea name="minus" id="" cols="100" rows="10"required></textarea></div>
                    </div>
                    <div class="rev_comment">
                        <div class="rev_title">Комментарий:</div>
                        <div class="rev_desc"><textarea name="comment" id="" cols="100" rows="10"required></textarea></div>
                    </div>
                </div>
                <input type="hidden" name="date" value="<?php echo date("d.m.Y");?>">
                <input name="add_rev" type="submit" value="Добавить отзыв">
            </form>
        </div>
        <? else: ?>
        <div class="tovar_rev_block tovar_addrev_block">
            <form method="POST" action="vendor/action/reviews/add.php" class="tovar_rev">
                <div class="rev_header">
                    <div class="rev_user_name">Ваша оценка:</div>
                </div>
                <div class="stars">
                    <select name="estimation" id="" required>
                        <option disabled selected value>Ваша оценка: <?=$review['estimation']?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="rev_body">
                    <div class="rev_plus">
                        <div class="rev_title">Достоинства:</div>
                        <div class="rev_desc"><textarea name="plus" id="" cols="100" rows="10" required><?=$review['plus']?></textarea></div>
                    </div>
                    <div class="rev_minus">
                        <div class="rev_title">Недостатки:</div>
                        <div class="rev_desc"><textarea name="minus" id="" cols="100" rows="10"required><?=$review['minus']?></textarea></div>
                    </div>
                    <div class="rev_comment">
                        <div class="rev_title">Комментарий:</div>
                        <div class="rev_desc"><textarea name="comment" id="" cols="100" rows="10"required><?=$review['comment']?></textarea></div>
                    </div>
                </div>
                <input type="hidden" name="date" value="<?php echo date("d.m.Y");?>">
                <input type="hidden" name="id_prod" value="<?php echo $_GET['id_tovar'];?>">
                <input name="add_rev" type="submit" value="Изменить отзыв">
            </form>
        </div>
        <? endif; ?>
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>
</html>