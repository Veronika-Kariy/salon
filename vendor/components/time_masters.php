<?
include 'connect.php';
$date = $_POST['date'];
$date = date('Y-m-d',strtotime($date));
$times = mysqli_query($link,"SELECT `time` FROM `carpet` WHERE `date` = '$date' AND `id_master` = '{$_POST['id_master']}' AND `status` = 0");
$timess[] = mysqli_fetch_array($times);
$time_two = date("H") + 3;
$time_two = date("$time_two:i");
if(mysqli_num_rows($times) > 0){
        for ($i = 0, $a = 30; $i < 24; $i++) { //время с 8:00 до 21:00
            $time = date("H:i", strtotime("08:30 + $a minutes"));
            foreach($times as $value){
                if ($time == $value['time']) {
                    $class = 'class="disabled"';
                    goto forIt;
                }
                if ($time != $value['time']) {
                    $class = 'class="enabled"';
                    continue;
                }
            }
            forIt:
            if($_POST['date'] == date("d.m.Y")){
                if($time < $time_two){
                    $class = 'class="disabled"';
                }
            }
            ?>
            <p <?= $class ?>><?= $time ?></p>
            <?
            $a += 30;
        }
} else {
    for ($i = 0, $a = 30; $i < 24; $i++) { //время с 8:00 до 21:00
        $time = date("H:i", strtotime("08:30 + $a minutes"));
        $class = 'class="enabled"';
        if($_POST['date'] == date("d.m.Y")){
            if($time < $time_two){
                $class = 'class="disabled"';
            }
        }
    ?>
        <p <?= $class ?>><?= $time ?></p>
    <?
        $a += 30;
    }
}
?>