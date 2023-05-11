<? 
include '../../components/connect.php';

if(isset($_POST['add_master'])){
    $fileName =  md5($_FILES['img']['name'].time()*100) . ".jpg" ;
    $tempName = $_FILES ['img']['tmp_name'];
    $folder = "../../img/masters/" . $fileName ;
    mysqli_query($link,"INSERT INTO `master_of_puppets`(`name`, `surname`, `stage`, `img`) VALUES ('{$_POST['name']}', '{$_POST['surname']}', '{$_POST['stage']}', '$fileName')");
    move_uploaded_file($tempName,$folder);
    header("Location:" . $_SERVER['HTTP_REFERER']);
}

if(isset($_POST['upd_master'])){
    if(file_exists($_FILES['img']['tmp_name']) || is_uploaded_file($_FILES['img']['tmp_name'])) {
        $fileName =  md5($_FILES['img']['name'].time()*100) . ".jpg" ;
        $tempName = $_FILES ['img']['tmp_name'];
        $folder = "../../img/masters/" . $fileName ;

    } else {
        $fileName = $_POST['filename'];
    }
    mysqli_query($link,"UPDATE `master_of_puppets` SET `name`='{$_POST['name']}',`surname`='{$_POST['surname']}',`stage`='{$_POST['stage']}', `img` = '$fileName'  WHERE `id` = '{$_POST['id']}'");
    move_uploaded_file($tempName,$folder);
    header("Location:../../../admin.php?add");
}

if(isset($_POST['delete_master'])){
    mysqli_query($link,"DELETE FROM `master_of_puppets` WHERE `id` = '{$_POST['id']}'");
    header("Location:../../../admin.php?add");
}

if(isset($_POST['add_service'])){
    mysqli_query($link,"INSERT INTO `services`(`id_master`, `service`) VALUES ('{$_POST['master']}','{$_POST['name_serv']}')");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}

if(isset($_POST['upd_service'])){
    mysqli_query($link,"UPDATE `services` SET `service`= '{$_POST['service']}' WHERE `id` = '{$_POST['id_serv']}'");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}

if(isset($_POST['del_service'])){
    mysqli_query($link,"DELETE FROM `services` WHERE `id` = '{$_POST['id_serv']}'");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
?>