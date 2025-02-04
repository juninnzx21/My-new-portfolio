<?php


include 'config_email.php';

$body = '<h3 style="color:red">Novo cadastro.</h3>';
$body .= 'E-mail: '   . $_POST['email']    .'<br>';

var_dump($body);

# echo $body;

if(enviar($email,$email_send,$email_send,'formulario do site', $body))
{
    header('Location:http://127.0.0.1/site/index.php');

}else{
    echo "Erro ao enviar email.";
}
if (!empty($error)) echo $error;