<?php
include_once("conexao.php");
$id = mysqli_real_escape_string($conn, $_POST['id']);
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$detalhes = mysqli_real_escape_string($conn, $_POST['detalhes']);

$result_cursos = "UPDATE cursos SET nome='$nome', detalhes = '$detalhes' WHERE id = '$id'";
mysqli_query($conn, $result_cursos);

$status = mysqli_affected_rows($conn) != 0 ? 'updated' : 'error';
header("Location: ./index.php?status={$status}");
exit;
