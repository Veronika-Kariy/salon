<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST["name"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$name_master = $_POST["name_master"];
$surname_master = $_POST["surname_master"];
$service = $_POST["service"];
$message = $_POST["message"];

// Формирование самого письма
if($_POST['id_master'] == NULL){
$title = "Заголовок письма";
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
  <td><b>От кого</b></td>
  <td><a href="mailto:'.$email.'">'.$email.'</a></td>
 </tr>
 <tr>
  <td><b>Имя пользователя</b></td>
  <td>'.$name.'</td>
 </tr>
 <tr>
 <td><b>Номер телефона</b></td>
 <td><a href="tel:'.$tel.'">'.$tel.'</a></td>
</tr>
 <tr>
  <td><b>Сообщение</b></td>
  <td>'.$message.'</td>
 </tr>
</table>
</center>	
</body>
</html>';
}
// Настройки PHPMailer

$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
  
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'virineya.kariy@gmail.com'; // Логин на почте - virineya.kariy@gmail.com
    $mail->Password   = 'yhajyhhvsxgcnomp'; // yhajyhhvsxgcnomp - Виринеи, мой - fcfbydvsabciafne
  // Пароль на почте (не пароль от самой почты, а "Пароль приложения".
  /* Настройка gmail:
  1)Нажать на шестеренку и выбрать все настройки. Потом нажать на вкладку пересылка и POP/IMAP и Включить IMAP.
  2)Нажать на иконку профиля и выбрать управление аккаунтом google, перейти во вкладку безопастность.
  Включить двухэтапную аутентификацию.
  Найти блок "Вход в аккаунт Google" и выбрать пароли приложений.
  Выбрать приложение (например другое - и назвать openserver) и создасться пароль.*/
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom($email, $name); // Адрес самой почты и имя отправителя
    // Получатель письма
    $mail->addAddress('virineya.kariy@gmail.com'); // $email

// Отправка сообщения

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $mail->isHTML(true);
  $mail->Subject = $title;
  $mail->Body = $body;
}else{
  echo 1;
}

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);
?>