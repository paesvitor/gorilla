<?php
ini_set('default_charset', 'UTF-8');
$dataNome = '';
$dataEmail = '';
$dataAssunto = '';
foreach($_POST as $campo => $valor){
  if($campo == 'Nome') {
    $dataNome = $valor;
  } else if($campo == 'E-mail') {
    $dataEmail = $valor;
  } else if($campo == 'dataAssunto') {
    $dataAssunto = $valor;
  }
}
if ($dataEmail == '' || $dataAssunto == '') {
  exit();
}
// Requires
require_once('../../vendor/phpmailer/PHPMailerAutoload.php');
require_once('template.php');
require_once('secret.php');

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
//$from = "email@cliente.com.br";
$from = "joel.santos@madgo.com.br"; // debug
$fromName = 'From name';

$host = $hostEmail;
$username = $hostUsername;
$password = $hostPassword;
$port = $hostPort;
$secure = $hostSecure;                             // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = $host;  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $username;                 // SMTP username
$mail->Password = $password;                           // SMTP password
$mail->SMTPSecure = $secure;                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = $port;                                    // TCP port to connect to

$mail->setFrom($from, $fromName);
$mail->addAddress($from, $fromName);

$mail->addReplyTo($dataEmail, $dataNome);

$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $dataAssunto;
$mail->Body    = $template;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}