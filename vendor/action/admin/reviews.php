<? 
include '../../components/connect.php';
if(isset($_POST['answer'])){
    mysqli_query($link,"UPDATE `rewiews` SET `answer`='{$_POST['otv_rev']}' WHERE `id` = '{$_POST['id']}'");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['ban_rev'])){
    mysqli_query($link,"UPDATE `rewiews` SET `status`= '1' WHERE `id` = '{$_POST['id']}'");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['del_answer'])){
    mysqli_query($link,"UPDATE `rewiews` SET `answer`='0' WHERE `id` = '{$_POST['id']}'");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['razban_rev'])){
    mysqli_query($link,"UPDATE `rewiews` SET `status`= '0' WHERE `id` = '{$_POST['id']}'");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['two_ban'])){
    mysqli_query($link,"UPDATE `rewiews` SET `status`= '3' WHERE `id` = '{$_POST['id']}'");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
?>