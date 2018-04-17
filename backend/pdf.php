<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

$mail = new PHPMailer(true);

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST["name"];
  $mobile = $_POST['phone'];
  $email = $_POST['email'];
}
try{
  //Server settings
  $mail->SMTPDebug = 0;                                 // Enable verbose debug output
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'agoen97@gmail.com';                // SMTP username
  $mail->Password = '@v!n@$hgoen805';                   // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;

  //Recipients
  $mail->setFrom('agoen97@gmail.com', 'Mailer');
  $mail->addAddress($email);                            // Add a recipient, Name is optional
  $mail->addReplyTo('agoen97@gmail.com');

  //Attachment
  $mail->addAttachment('../pdf/aadhunik.pdf');

  //content
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = 'Aadhunik Woodworking Machinery Catalogue';
  $mail->Body    = "Dear $name,
  Thank you for downloading our catalogue. We hope to provide you with the perfect Machinery.
  Regards,
  Team Aadhunik";

  if($mail->send()){
    echo "<script>alert('Catalogue has been emailed to your specified email.');</script>";
    header("Location: ../index.html");
  }
} catch (Exception $e){
  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>
