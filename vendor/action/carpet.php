<?
session_start();
include '../components/connect.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $id_master = $_POST['id_master'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $services = $_POST['service'];
    $name_master = $_POST['name_master'];
    $surname_master = $_POST['surname_master'];
    $date = date('Y-m-d',strtotime($date));
    $i = 0;
    if($date == NULL || $date == '1970-01-01'){
        echo 'err_date';
    } else {
        $i++;
    }
    if($time == NULL){
        echo 'err_time';
    } else {
        $i++;
    }
    if($services == NULL){
        echo 'err_serv';
    } else {
        $i++;
    }

    if($i == 3){
        $carpet = mysqli_query($link,"SELECT * FROM `carpet` WHERE `date` = '$date' AND `id_master` = '$id_master' AND 'time' = '$time'");
        if(mysqli_num_rows($carpet) > 0){
            echo 'error';
        } else {
            $user_carpet = mysqli_query($link,"SELECT * FROM `carpet` WHERE `id_user` = '{$_SESSION['user']['id']}' AND `date` = '$date' AND `status` = 0");
            if(mysqli_num_rows($user_carpet) > 0){
                echo 'err_user';
            } else{
                $carpet_insert = mysqli_query($link,"INSERT INTO `carpet`(`id_master`, `id_user`, `name`, `tel`, `email`, `date`, `time`) VALUES ('$id_master','{$_SESSION['user']['id']}','$name','$tel','$email','$date','$time')");
                $id_carpet = mysqli_insert_id($link);
                
                foreach($services as $key => $value){
                    mysqli_query($link,"INSERT INTO `carpet_list`(`id_carpet`, `id_services`) VALUES ('$id_carpet','$value')");
                }
            
                $title = "Вы записаны";
                $body = '
                <html>
                <body>
                <center>	
                <table border=1 cellpadding=6 cellspacing=0 width=90% bordercolor="#DBDBDB">
                <tr><td colspan=2 align=center bgcolor="#E4E4E4"><b>Информация</b></td></tr>
                <tr>
                <td><b>Откуда</b></td>
                <td>salo.ru</td>
                </tr>
                <tr>
                <td><b>Дата</b></td>
                <td>'.$date.'</td>
                </tr>
                <tr>
                <td><b>Время</b></td>
                <td>'. $time. '</td>
                </tr>
                <tr>
                <td><b>Мастер</b></td>
                <td>'.$name_master .' ' . $surname_master.'</td>
                </tr>
                <tr>
                <td><b>Услуга, цена</b></td>
                <td>'."" . implode(", ", $_POST['nService']) . "".'</td>
                </tr>
                </table>
                </center>	
                </body>
                </html>';
                include 'tic.php';
            }
        }
    }
?>