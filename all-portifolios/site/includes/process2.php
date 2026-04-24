<?php

include '../functions/host.php';
include 'config_email.php';

$body = '<h3 style="color:red">Novo cadastro.</h3>';
$body .= 'E-mail: ' . ($_POST['email'] ?? '') . '<br>';

if (enviar($email, $email_send, $email_send, 'formulario do site', $body)) {
    header('Location: ' . base_url() . '?status=newsletter-enviada');
    exit;
}

echo 'Erro ao enviar email.';
if (!empty($error)) {
    echo $error;
}
