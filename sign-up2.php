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
    header("Location: sign-up.php?wrong=1");
} else{
    header("Location: sign-up.php?wrong=2");
}	

?>
