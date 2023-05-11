<?
include '../connect.php';
if ($_POST) {
    $where = $_POST['where'];
    $zag = $_POST['zag'];
}
if (empty($_POST)) {
    $where = '`status` = 0';
    $zag = 'Активные';
}
?>
<style>
    .abc {
        text-align: center;
        margin-bottom: 20px;
    }
</style>
<h1 class="abc"><?= $zag ?> записи</h1>
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
            $masters = mysqli_query($link, "SELECT * FROM `carpet` WHERE $where ORDER BY `date` ASC, `time` ASC");
            while ($master = mysqli_fetch_array($masters)) :
                $date = date('d-m-Y', strtotime($master['date']));
                $mas = mysqli_query($link, "SELECT * FROM `master_of_puppets` WHERE `id` = '{$master['id_master']}'");
                $mas = mysqli_fetch_array($mas);
                if ($master['status'] == 0) {
                    $master['status'] = 'Активен';
                    $select = '<select data-id="' . $master['id'] . '" name="status_upd" name="status" id="">
                    <option disabled selected value>' . $master['status'] . '</option>
                    <option value="1">Услуга оказана</option>
                    <option value="2">Отмена услуги</option>
                    </select>';
                }
                if ($master['status'] == 1) {
                    $master['status'] = 'Оказана';
                }
                if ($master['status'] == 2) {
                    $master['status'] = 'Отменена';
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
                    <td>
                        <? if (isset($select)) { 
                            echo $select;
                         } else {
                            echo $master['status'];
                         }
                         
                        ?>
                    </td>
                </tr>
            <? endwhile; ?>
        </tbody>
    </table>
</section>