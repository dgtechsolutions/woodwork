<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $fname = $_POST["fname"];
  $lname = $_POST['lname'];
  $mobile = $_POST['phone'];
  $email = $_POST['email'];
  $message = $_POST["message"];
}
$from = "agoen97@gmail.com";
$to = $email;
$subject = "Thank You for Contacting Us";
$subject_admin = "Contact Us Request";
$body_admin = "Dear team, \n
You have a request from: \n
Name: $fname $lname \n
Email: $email \n
Mobile: $mobile \n
Message: \n $message \n
\n
Please contact the person as soon as possible. \n
Regards, \n
Aadhunik System";
$body = "Dear $fname $lname, \n
Thank You for contacting us. Our team will be in contact with you as soon as possible. \n
Regards, \n
Team Aadhunik";
$headers = "From: agoen97@gmail.com";
$headers_admin = "From: agoen97@gmail.com";
if(mail($to, $subject, $body, $headers)){
  if(mail($from, $subject_admin, $body_admin, $headers_admin)){
    echo json_encode(array('status' => 'Success'), TRUE);
  }
}
else{
  echo json_encode(array('status' => 'Fail'), TRUE);
}

?>
