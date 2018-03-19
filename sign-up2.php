<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "macnmedb");
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

 

$FirstName = $_POST['FirstName'] ?? '';
$LastName = $_POST['LastName'] ?? '';
$Email = $_POST['Email'] ?? '';
$Password = $_POST['Password'] ?? '';
$Address = $_POST['Address'] ?? '';
$City = $_POST['City'] ?? '';
$State = $_POST['State'] ?? '';
$Zipcode = $_POST['Zipcode'] ?? '';


 
// insertion query 
$sql = "INSERT INTO currentUsers (FirstName, LastName, Email, Password, Address, City, State, Zipcode) VALUES ('$FirstName', '$LastName', '$Email', MD5('$Password'), '$Address', '$City', '$State', '$Zipcode')";

if(mysqli_query($link, $sql)){
    
    require 'PHPMailerAutoload.php';
    
    $mail = new PHPMailer;
    $mail->setFrom('macnmeuva@gmail.com', 'Mac and Me');
    $mail->addAddress($Email, $FirstName);
    $mail->Subject  = 'Your account with Mac and Me has been created';
    $mail->Body     = 'Hello! ';
    
    //this is for testing only, we have to remove it later!
    if(!$mail->send()) {
      echo 'Message was not sent.';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent.';
    }
    //this is the end of the code we need to remove
    
    header("Location: sign-up.html?wrong=1"); // there was no error
    
} else{
    header("Location: sign-up.html?wrong=2"); // there was an error
}	

?>
