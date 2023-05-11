
        <h1>К вам записаны</h1>
        <section>
            <table class="table">
                <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Дата</th>
                        <th>Время</th>
                        <th>Услуги</th>
                    </tr>
                </thead>
                <tbody>
                    <?
                    $user = mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '{$_SESSION['user']['id']}'");
                    $user = mysqli_fetch_array($user);
                    $masters = mysqli_query($link, "SELECT * FROM `carpet` WHERE `id_master` = '{$user['id_master']}' ORDER BY `date` ASC, `time` ASC");
                    while ($master = mysqli_fetch_array($masters)) :
                        $date = date('d-m-Y', strtotime($master['date']))
                    ?>
                        <tr>
                            <td><?= $master['name'] ?></td>
                            <td><?= $master['tel'] ?></td>
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
                        </tr>
                    <? endwhile; ?>
                </tbody>
            </table>
        </section>