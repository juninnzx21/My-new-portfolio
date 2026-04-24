<?php

include '../functions/host.php';
include 'config_email.php';

$body = '<h3 style="color:red">Novo cadastro.</h3>';
$body .= '<span style="color:green">Nome:</span> ' . ($_POST['nome'] ?? '') . '<br>';
$body .= 'WhatsApp: <a href="https://wa.me/55' . ($_POST['Whatsapp'] ?? '') . '">' . ($_POST['Whatsapp'] ?? '') . '</a><br>';
$body .= 'E-mail: ' . ($_POST['email'] ?? '') . '<br>';
$body .= 'Telefone: ' . ($_POST['telefone'] ?? '') . '<br>';
$body .= 'Mensagem: ' . ($_POST['mensagem'] ?? '') . '<br>';

if (enviar($email, $email_send, $email_send, 'formulario do site', $body)) {
    header('Location: ' . base_url() . '?status=contato-enviado');
    exit;
}

echo 'Erro ao enviar email.';
if (!empty($error)) {
    echo $error;
}
