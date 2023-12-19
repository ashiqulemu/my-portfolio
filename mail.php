<?php
//get data from form  

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email= $_POST['email'];
$phone = $_POST['phone']; 
$message= $_POST['message']; 

$to = "ashiqulemu.jpi@gmail.com";

$subject = "CONTACT WITH ME!";

$txt =" Full Name : ". $fname." $lname". "\r\n Email : " . $email . "\r\n Phone : " . $phone ."\r\n Message : ". $message ;

$headers = "From: $email";

if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:thankyou.php");
?>
