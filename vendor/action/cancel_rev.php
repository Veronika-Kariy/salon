<? 
session_start();
include '../components/connect.php';

if(isset($_POST['canc_order'])){
    mysqli_query($link,"UPDATE `carpet` SET `status`= 2 WHERE `id` = '{$_POST['id_order']}'");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}

?>