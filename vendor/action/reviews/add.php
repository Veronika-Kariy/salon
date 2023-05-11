<?
session_start();
include '../../components/connect.php';

if (isset($_POST['add_rev'])) {
    $reviews = mysqli_query($link, "SELECT * FROM `rewiews` WHERE `id_user` = '{$_SESSION['user']['id']}'");
    if (mysqli_num_rows($reviews) == 0) {
        mysqli_query($link, "INSERT INTO `rewiews`(`id_user`,`estimation`, `plus`, `minus`, `comment`, `date`)
        VALUES ('{$_SESSION['user']['id']}','{$_POST['estimation']}','{$_POST['plus']}','{$_POST['minus']}','{$_POST['comment']}','{$_POST['date']}')");
        header('Location:../../../rewiew.php');
    } else {
        $rev = mysqli_fetch_array($reviews);
        if($rev['status'] == 0){
        mysqli_query($link, "UPDATE `rewiews` SET `estimation`='{$_POST['estimation']}',`plus`='{$_POST['plus']}',`minus`='{$_POST['minus']}',`comment`='{$_POST['comment']}',`date`='{$_POST['date']}' WHERE `id_user` = '{$_SESSION['user']['id']}'");
        header('Location:../../../rewiew.php');
        } else {
            mysqli_query($link, "UPDATE `rewiews` SET `estimation`='{$_POST['estimation']}',`plus`='{$_POST['plus']}',`minus`='{$_POST['minus']}',`comment`='{$_POST['comment']}',`date`='{$_POST['date']}',`status`= '2' WHERE `id_user` = '{$_SESSION['user']['id']}'");
            header('Location:../../../rewiew.php');
        }
    }
}
