<?php
include_once("conexao.php");
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$detalhes = mysqli_real_escape_string($conn, $_POST['detalhes']);

$result_cursos = "INSERT INTO cursos (nome, categoria_id, detalhes) VALUES ('$nome', '1', '$detalhes')";
mysqli_query($conn, $result_cursos);

$status = mysqli_affected_rows($conn) != 0 ? 'created' : 'error';
header("Location: ./index.php?status={$status}");
exit;
