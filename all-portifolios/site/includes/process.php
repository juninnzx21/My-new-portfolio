<?php

include 'config_email.php';

$body = '<h3 style="color:red">Novo cadastro.</h3>';
$body .= '<span style="color:green">Nome:</span> '    . $_POST['nome']     .'<br>';
$body .= 'WhatsApp: <a href="https://wa.me/55'. $_POST['Whatsapp'] .'">' . $_POST['Whatsapp'] .'</a><br>';
$body .= 'E-mail: '   . $_POST['email']    .'<br>';
$body .= 'Telefone: ' . $_POST['telefone'] .'<br>';
$body .= 'Mensagem:'  . $_POST['mensagem']  .'<br>';

# echo $body;

if(enviar($email,$email_send,$email_send,'formulario do site', $body))
{
    header('Location:http://127.0.0.1/site/index.php');

}else{
    echo "Erro ao enviar email.";
}
if (!empty($error)) echo $error;