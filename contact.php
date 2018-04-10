<?php

require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");
require("PHPMailer-master/src/OAuth.php");
require("PHPMailer-master/src/POP3.php");
require("PHPMailer-master/src/Exception.php");

    //according to the official tutorial this is just $mail = new PHPMailer;
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    //in the official tutorial they do not use this, but this guy from stack overflow says to use it for gmail
    $mail->IsSMTP(); // enable SMTP
    $mail->Host = 'smtp.gmail.com';
    //$mail->SMTPDebug = 4; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
    $mail->Port = 587; // or 587
    $mail->IsHTML(true);
    $mail->Username = "macnmeuva@gmail.com";
    $mail->Password = "macnmepassword";

$thisMessage = 'Customer ' . $_POST["name"] . ' with email address: ' . $_POST["email"] . ' sent message: ' . $_POST["message"];

$mail->setFrom('macnmeuva@gmail.com', 'Mac and Me');
$mail->addAddress('macnmeuva@gmail.com', $_POST["name"]);
$mail->Subject  = 'Customer Feedback';
$mail->Body     = $thisMessage;

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->send();
        
    echo "<SCRIPT type='text/javascript'>
            window.location='contact-us.html';
        </script>";

?>
