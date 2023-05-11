<h1 style="margin-bottom: 20px;">Регистрация сотрудника</h1>
<style>
    .abc {
        width: 428px;
        background: #FFFFFF;
        box-shadow: -4px 4px 14px rgb(0 0 0 / 15%);
        border-radius: 8px;
        padding: 36px 24px;
    }
</style>
<div style="margin: 0;margin-bottom:20px;" class="abc">
    <form style="display: flex;" class="form_reg" action="" method="post">
        <input type="hidden" name="status" value="3">
        <input name="name" class="reg_fio" type="text" placeholder="Введите Имя" required>
        <input name="email" class="reg_email" type="email" placeholder="Введите E-mail" required>
        <input name="tel" class="reg_tel" id="mphone" type="tel" placeholder="Введите номер телефона" required>
        <input name="password" class="reg_password" type="password" placeholder="Введите пароль" required>
        <span>Связать</span>
        <select style="margin-bottom: 20px;" name="master" id="">
            <option value="0" disabled selected value>Выберите сотрудника</option>
            <? 
            $mast = mysqli_query($link,"SELECT * FROM `master_of_puppets` WHERE 1");
            while($mas = mysqli_fetch_array($mast)){
            ?>
            <option value="<?=$mas['id']?>"><? echo $mas['name']. ' ' . $mas['surname'] ?></option>
            <? } ?>
        </select>
        <div class="registration_buttontwo">
            <button type="submit" name="registration">Зарегистрировать</button>
        </div>
        <div id="erconts"></div>
    </form>
</div>
<h1 style="margin-bottom: 20px;">Аккаунты сотрудников</h1>
<section>
    <table class="table">
        <thead>
            <tr>
                <th>Номер</th>
                <th>Имя</th>
                <th>email</th>
                <th>tel</th>
                <th>Пароль</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            <?
            $masters = mysqli_query($link, "SELECT * FROM `users` WHERE `status` = 3");
            while ($master = mysqli_fetch_array($masters)) :
            ?>
                <tr>
                    <td><?= $master['id'] ?></td>
                    <td><?= $master['name'] ?></td>
                    <td><?= $master['email'] ?></td>
                    <td><?= $master['tel'] ?></td>
                    <td><?= $master['password'] ?></td>
                    <td><a href="vendor/components/admin/update_akk_master.php?id=<?= $master['id'] ?>">Изменить</a></td>
                </tr>
            <? endwhile; ?>
        </tbody>
    </table>
</section>