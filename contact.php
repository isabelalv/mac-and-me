<?php
require("/PHPMailer-master/src/PHPMailer.php");
  require("/PHPMailer-master/src/SMTP.php");
    //according to the official tutorial this is just $mail = new PHPMailer;
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    //in the official tutorial they do not use this, but this guy from stack overflow says to use it for gmail
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "xxxxxx";
    $mail->Password = "xxxx";
    $mail->SetFrom("xxxxxx@xxxxx.com");
    $mail->Subject = "Test";
    $mail->Body = "hello";
    $mail->AddAddress("xxxxxx@xxxxx.com");
//old require statements
//require 'myphpmailer\autoload.php';
//require 'C:/xampp/htdocs/mac-and-me-master/PHPMailer-master/src/Exception.php';
//require 'C:/xampp/htdocs/mac-and-me-master/PHPMailer-master/src/SMTP.php';
$thisMessage = 'Customer ' . $_POST["name"] . ' with email address: ' . $_POST["email"] . ' sent message: ' . $_POST["message"];
$mail = new PHPMailer ();
$mail->setFrom('macnmeuva@gmail.com', 'Mac and Me');
$mail->addAddress('macnmeuva@gmail.com', $_POST["name"]);
$mail->Subject  = 'Customer Feedback';
$mail->Body     = $thisMessage;
//this is only for testing, we need to remove it later
if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}
//this is the end of the code that must be removed after testing
header("Location: contact-us.html");
?>