<?php
 

$email = trim($_POST['email']);
$name = htmlspecialchars($_POST['fio']);
$email = htmlspecialchars($_POST['mail']);
$message = htmlspecialchars($_POST['message']);
$tel = htmlspecialchars($_POST["tel"]);

 
$name_tema = "=?utf-8?b?". base64_encode($name) ."?=";
 
$subject ="Новая заявка с сайта domain.name";
$subject1 = "=?utf-8?b?". base64_encode($subject) ."?=";
/*
$message ="\n\nСообщение: ".$message."\n\nИмя: " .$name."\n\nТелефон: ".$tel."\n\n";
*/
$message1 ="\n\nИмя: ".$name."\n\nТелефон: " .$tel."\n\nE-mail: " .$email."\n\nСообщение: ".$message."\n\n";    
 
 
$header = "Content-Type: text/plain; charset=utf-8\n";
 
$header .= "From: Новая заявка <example@gmail.com>\n\n";  
$mail = mail("dzeblyuk@gmail.com", $subject1, iconv ('utf-8', 'windows-1251', $message1), iconv ('utf-8', 'windows-1251', $header));
 
if($mail) {
  echo 'OK';
} else {
echo '<div class="notification_error">'.$error.'</div>';
}

 
