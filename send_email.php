<?php

include './includes/connect_db.php';

$sender_name = $_POST['sender_name'];
$sender_email = $_POST['sender_email'];
$subject = $_POST['message_subject'];
$message = $_POST['message'];

$get_email = mysqli_query($conn, "SELECT * FROM `user` WHERE user_type='super_admin'");
$fetch_admin_email = mysqli_fetch_assoc($get_email);
 
$my_email = $fetch_admin_email['gmail'];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

//$mail -> SMTPDebug = SMTP::DEBUG_SERVER; //Enable this for debuging purpose

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "tamsealernest57@gmail.com";
$mail->Password = "oxpcpdyjmlbjiofy"; //my gmail app password
$mail->FromName = $sender_email;

$mail->setFrom($sender_email); // Swap $name and $email

//$mail->addAddress('tamsealernest57@gmail.com');
//receipient
$mail->addAddress($my_email);

$mail->Subject = $subject;
$mail->Body = "From:\n".$sender_name."\n".$sender_email."\n".PHP_EOL.$message; // Add line break using PHP_EOL constant*/

$mail->send();

echo "<script>alert('Message sent')</script>";
echo "<script>window.open('index.php#contact','_self')</script>";
