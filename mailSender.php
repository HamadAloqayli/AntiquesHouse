<?php


if(isset($_COOKIE['phone']))
{
  $_SESSION['id'] = $_COOKIE['id'];
  $_SESSION['name'] = $_COOKIE['name'];
  $_SESSION['email'] = $_COOKIE['email'];
  $_SESSION['phone'] = $_COOKIE['phone'];
}

if(!isset($_SESSION['id']))
{
    header("Location:Shop.php");
    mysqli_close($con);
    session_destroy();
    exit();
}

$name = $_SESSION['name'];
$email = $_SESSION['email'];

$subject = "تأكيد عملية الشراء من متجر دار التحف";
$message = "السلام عليكم";
$message .= "<br>";
$message .= "تحية طيبة $name";
$message .= "<br>";
$message .= "<br>";
$message .= "نشكرك على ثقتك بنا ونتطلع الى زيارتنا مستقبلا، نأمل منك إكمال عملية الشراء بالدفع عن طريق البايبال أو بالبطاقة الإئتمانية. أو بإمكانك الدفع عن طريق التحويل البنكي الى اي من حساباتنا (يمكنك الوصول الى حساباتنا عن طريق الموقع أو بالتواصل معنا)";
$message .= "<br>";
$message .= "بإمكانك تفعيل حسابك بالضغط على الرابط التالي <a href='http://localhost/Projects/AntiquesHouse/conEmail.php'>للتفعليل</a>";

setcookie("connEmail", $email, time() + (100)); // 86400 = 1 day

include_once 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Username = 'hamad.bader.1141@gmail.com';
$mail->Password = 'hamad1997';
$mail->CharSet = 'UTF-8';

$mail->setFrom('no-reply@antiqueshouse.com','دار التحف');
$mail->addAddress($email);
$mail->addReplyTo('no-reply@antiqueshouse.com','دار التحف');

$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $message;
$mail->addAttachment('img/about.jpg');

$mail->send();

$_SESSION['mailStatus'] = 1;

?>