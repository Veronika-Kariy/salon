<?
include '../connect.php';
?>
<style>
    .abc {
        text-align: center;
        margin-bottom: 20px;
    }
</style>
<h1 class="abc">Услуга оказана</h1>
<section>
    <table class="table">
        <thead>
            <tr>
                <th>Номер</th>
                <th>Мастер</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Дата</th>
                <th>Время</th>
                <th>Услуги</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>
            <?
            $masters = mysqli_query($link, "SELECT * FROM `carpet` WHERE `status` = 1 ORDER BY `date` ASC, `time` ASC");
            while ($master = mysqli_fetch_array($masters)) :
                $date = date('d-m-Y', strtotime($master['date']));
                $mas = mysqli_query($link, "SELECT * FROM `master_of_puppets` WHERE `id` = '{$master['id_master']}'");
                $mas = mysqli_fetch_array($mas);
                if ($master['status'] == 1) {
                    $master['status'] = 'Услуга оказана';
                }
            ?>
                <tr>
                    <td><?= $master['id'] ?></td>
                    <td><?= $mas['name'] . ' ' . $mas['surname'] ?></td>
                    <td><?= $master['name'] ?></td>
                    <td><?= $master['tel'] ?></td>
                    <td><?= $master['email'] ?></td>
                    <td><?= $date ?></td>
                    <td><?= $master['time'] ?></td>
                    <td>
                        <?
                        $services = mysqli_query($link, "SELECT * FROM `carpet_list` WHERE `id_carpet` = '{$master['id']}'");
                        while ($ser = mysqli_fetch_array($services)) {
                            $name_serv = mysqli_query($link, "SELECT * FROM `services` WHERE `id` = '{$ser['id_services']}'");
                            while ($name = mysqli_fetch_array($name_serv)) {
                        ?>
                                <p><?= $name['service'] ?></p>
                        <? }
                        } ?>
                    </td>
                    <td><?= $master['status'] ?></td>
                </tr>
            <? endwhile; ?>
        </tbody>
    </table>
</section>