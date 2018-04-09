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
    
    //the code that sends the email
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

    $mail->setFrom('macnmeuva@gmail.com', 'Mac and Me');
    $mail->addAddress($Email, $FirstName);
    $mail->Subject  = 'Your Mac and Me account';
    $mail->Body     = "Hello, <br/><br/>Welcome to Mac and Me! Thank you for creating an account with us. We look forward to cooking and delivering some of our delicious products straight to your door, and we hope to fulfill all your mac and cheese cravings! <br/><br/>Cheesy greetings, <br/><br/>The Mac and Me Team";

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->send();
        
    //header("Location: sign-up.html?wrong=1"); // there was no error
    
    //this redirects to the member homepage
    echo "<SCRIPT type='text/javascript'>
            window.location='member.php';
        </script>";

    } else{
        
    header("Location: sign-up.html?wrong=2"); // there was an error
    
}

?>
