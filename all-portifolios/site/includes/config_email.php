<?php
$email      = 'multicredbh.multicredbh@gmail.com';
$email_send = 'smtp@multicredbh.com.br';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

function enviar($para, $de, $de_nome, $assunto, $corpo)
{
      global $error;
      $username   = "smtp@multicredbh.com.br";//'c9ab40856b2a55';
      $pass       = "qM!*j!9^L0Mm";//'68b1462e305adc';
      $host       = "mail.multicredbh.com.br";//'smtp.mailtrap.io';
      $port       = "465";//'2525';
      $secure     = 'ssl';

      $mail = new PHPMailer();
      $mail->IsSMTP();    // Ativar SMTP
      $mail->SMTPDebug    = 0;    // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
      $mail->SMTPAuth     = true;    // Autenticação ativada
      $mail->SMTPSecure   = $secure;  // SSL REQUERIDO pelo GMail
      $mail->Host         = $host;  // SMTP utilizado
      $mail->Port         = $port;      // A porta 587 deverá estar aberta em seu servidor
      $mail->Username     = $username;
      $mail->Password     = $pass;
      $mail->Subject      = $assunto;
      $mail->Body         = $corpo;
      $mail->CharSet      = 'UTF-8';
      $mail->SetFrom($de, $de_nome);
      $mail->IsHTML(true);
      $mail->clearAllRecipients();
      $mail->AddAddress($para);

      if (!$mail->Send()) {
        $error = 'Mail error: ' . $mail->ErrorInfo;
        return false;
      } else {
        //$error = 'Mensagem enviada!';
        return true;
      }
}