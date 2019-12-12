<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'yourname@yourdomain.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
//mail($to,$email_subject,$email_body,$headers);
//*************************************************************************************************************** */
 //PHP Script for new mailer


 <?php
 require 'PHPMailerAutoload.php';
 if(isset($_POST['send']))
 {
 // Fetching data that is entered by the user
 //$email = $_POST['email'];
 //$password = $_POST['password'];
 
 $email = 'squidcraigslist@gmail.com';
 $password = 'squ1dB0x';
 //$to_id = $_POST['toid'];
 $to_id = $_POST[$to];
 //$message = $_POST['message'];
 $message = $_POST[$email_body];
// $subject = $_POST['subject'];
$subject = $_POST[$email_subject];

 
 // Configuring SMTP server settings
 $mail = new PHPMailer;
 $mail->isSMTP();
 $mail->Host = 'smtp.gmail.com';
 $mail->Port = 587;
 $mail->SMTPSecure = 'tls';
 $mail->SMTPAuth = true;
 $mail->Username = $email;
 $mail->Password = $password;
 
 // Email Sending Details
 $mail->addAddress($to_id);
 $mail->Subject = $subject;
 $mail->msgHTML($message);
 
 // Success or Failure
 if (!$mail->send()) {
 $error = "Mailer Error: " . $mail->ErrorInfo;
 echo '<p id="para">'.$error.'</p>';
 }
 else {
 echo '<p id="para">Message sent!</p>';
 }
 }
 else{
 echo '<p id="para">Please enter valid data</p>';
 }
 ?>
 












return true;         
?>