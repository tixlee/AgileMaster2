<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['next'])){
  $email = $_POST['email'];
  
  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'agilemaster2020@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'agilemaster123'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('agilemaster2020@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($_POST['email']); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Agile Master Password Reset';
    $mail->Body = 
	"
	<p><b>Dear Mr/Ms,</b></p> <br>
	<p><b><i>You had requested to reset your password!</i></b></p>
  <p>Seems like you forgot your password for Agile Master. If this is true, click the link below to reset your password.</p>

  <a href='http://localhost/AgileMaster2/main/reset-password.php'>https://www.amaster.online/reset-password</a> 
  <br>
  <p>If you didn't mean to reset your password, then you can just ignore this email; your password will not change</p>
	<p><b>Regards,</b></p>
	<p style='font-family: Brush Script MT';><b>Agile Master Management.</b></p>
	<img src='cid:logo' style='width: 150px';>
	
	";
	$mail->AddEmbeddedImage('../resources/images/logo.png', 'logo');
    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Invitation had been sent. Thank you.</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>
