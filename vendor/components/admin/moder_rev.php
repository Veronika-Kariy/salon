<style>
    .abc{
        margin-bottom: 10px;
    }
</style>
<? 
$reviews = mysqli_query($link, "SELECT * FROM `rewiews` WHERE `status` = 2");
if(mysqli_num_rows($reviews) == 0):
?>
<h1 class="abc">Отзывов на рассмотрение нет</h1>
<? else: ?>
<h1 class="abc">Отзывы на рассмотрение</h1>

<div class="tovar_rev_block">
    <?
    while ($review = mysqli_fetch_array($reviews)) :
        $user = mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '{$review['id_user']}'");
        $user = mysqli_fetch_array($user);
    ?>
        <div class="tovar_rev">
            <div class="rev_header">
                <div class="rev_user_name"><?= $user['name'] ?></div>
                <div class="rev_date"><?= $review['date'] ?></div>
            </div>
            <div class="stars">
                <? if ($review['estimation'] == 1) : ?>
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                <? endif; ?>
                <? if ($review['estimation'] == 2) : ?>
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                <? endif; ?>
                <? if ($review['estimation'] == 3) : ?>
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                <? endif; ?>
                <? if ($review['estimation'] == 4) : ?>
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                <? endif; ?>
                <? if ($review['estimation'] == 5) : ?>
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                <? endif; ?>
            </div>
            <div class="rev_body">
                <div class="rev_plus">
                    <div class="rev_title">Достоинства:</div>
                    <div class="rev_desc"><?= $review['plus'] ?></div>
                </div>
                <div class="rev_minus">
                    <div class="rev_title">Недостатки:</div>
                    <div class="rev_desc"><?= $review['minus'] ?></div>
                </div>
                <div class="rev_comment">
                    <div class="rev_title">Комментарий:</div>
                    <div class="rev_desc"><?= $review['comment'] ?></div>
                </div>
            </div>
            <div class="mod_rev">
                <form action="vendor/action/admin/reviews.php" method="post">
                    <input type="hidden" name="id" value="<?= $review['id'] ?>">
                    <input type="submit" name="razban_rev" value="Разбанить отзыв">
                    <input type="submit" name="two_ban" value="Забанить навсегда">
                </form>
            </div>
        </div>
    <? endwhile; ?>
    <? endif; ?>
</div>


<? 
$reviews = mysqli_query($link, "SELECT * FROM `rewiews` WHERE `status` = 1");
if(mysqli_num_rows($reviews) == 0):
?>
<h1>Заблокированных отзывов нет</h1>
<? else: ?>
<h1>Заблокированные отзывы</h1>

<div class="tovar_rev_block">
    <?
    while ($review = mysqli_fetch_array($reviews)) :
        $user = mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '{$review['id_user']}'");
        $user = mysqli_fetch_array($user);
    ?>
        <div class="tovar_rev">
            <div class="rev_header">
                <div class="rev_user_name"><?= $user['name'] ?></div>
                <div class="rev_date"><?= $review['date'] ?></div>
            </div>
            <div class="stars">
                <? if ($review['estimation'] == 1) : ?>
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                <? endif; ?>
                <? if ($review['estimation'] == 2) : ?>
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                <? endif; ?>
                <? if ($review['estimation'] == 3) : ?>
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                <? endif; ?>
                <? if ($review['estimation'] == 4) : ?>
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star.png" alt="">
                <? endif; ?>
                <? if ($review['estimation'] == 5) : ?>
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                    <img src="vendor/img/star_bacg.png" alt="">
                <? endif; ?>
            </div>
            <div class="rev_body">
                <div class="rev_plus">
                    <div class="rev_title">Достоинства:</div>
                    <div class="rev_desc"><?= $review['plus'] ?></div>
                </div>
                <div class="rev_minus">
                    <div class="rev_title">Недостатки:</div>
                    <div class="rev_desc"><?= $review['minus'] ?></div>
                </div>
                <div class="rev_comment">
                    <div class="rev_title">Комментарий:</div>
                    <div class="rev_desc"><?= $review['comment'] ?></div>
                </div>
            </div>
            <div class="mod_rev">
                <form action="vendor/action/admin/reviews.php" method="post">
                    <input type="hidden" name="id" value="<?= $review['id'] ?>">
                    <input type="submit" name="razban_rev" value="Разбанить отзыв">
                    <input type="submit" name="two_ban" value="Забанить навсегда">
                </form>
            </div>
        </div>
    <? endwhile; ?>
    <? endif; ?>
</div>