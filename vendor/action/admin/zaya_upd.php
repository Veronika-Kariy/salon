<? 
session_start();
include '../../components/connect.php';

mysqli_query($link,"UPDATE `carpet` SET `status`= '{$_POST['value']}' WHERE `id` = '{$_POST['id']}'");

?>