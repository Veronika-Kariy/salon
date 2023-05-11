<style>
   .abc {
        text-align: center;
    }
</style>
<div>
    <h1 class="abc">Все мастера</h1>
    <section>
        <table class="table">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Стаж</th>
                    <th>Оказываемые услуги</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                <?
                $masters = mysqli_query($link,"SELECT * FROM `master_of_puppets` WHERE 1");
                while($master = mysqli_fetch_array($masters)):
                ?>
                    <tr>
                        <td><img width="100px" src="vendor/img/masters/<?=$master['img']?>" alt=""></td>
                        <td><?=$master['name']?></td>
                        <td><?=$master['surname']?></td>
                        <td><?=$master['stage']?></td>
                        <td>
                            <? 
                            $services = mysqli_query($link,"SELECT * FROM `services` WHERE `id_master` = '{$master['id']}'");
                            while($ser = mysqli_fetch_array($services)){
                            ?>
                            <p><?=$ser['service']?></p>
                            <? } ?>
                        </td>
                        <td><a href="vendor/components/admin/update_master.php?id=<?=$master['id']?>">Изменить</a></td>
                    </tr>
                <? endwhile; ?>
            </tbody>
        </table>
    </section>
    <h1 class="abc">Добавить мастера</h1>
    <section>
        <form class="form_adm" action="vendor/action/admin/master.php" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Имя" required>
            <input type="text" name="surname" placeholder="Фамилия" required>
            <input type="text" name="stage" placeholder="Стаж" required>
            <span>Загрузите фото</span>
            <input type="file" name="img" required>
            <input type="submit" name="add_master">
        </form>
    </section>
    <h1 class="abc">Добавить оказываемые услуги мастером</h1>
    <section>
        <form class="form_adm" action="vendor/action/admin/master.php" method="post">
            <span>Выберите мастера</span>
            <select name="master" id="">
                <? 
                $masters = mysqli_query($link,"SELECT * FROM `master_of_puppets` WHERE 1");
                while($master = mysqli_fetch_array($masters)): 
                ?>
                <option value="<?=$master['id']?>"><? echo $master['name'],' '.$master['surname']?></option>
                <? endwhile; ?>
            </select>
            <input type="text" name="name_serv" placeholder="Введите название услуги" required>
            <input type="submit" name="add_service">
        </form>
    </section>
</div>