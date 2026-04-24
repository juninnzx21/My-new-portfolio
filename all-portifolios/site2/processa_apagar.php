<?php
include_once("conexao.php");

$id = (int) ($_GET['id'] ?? 0);
$result_cursos = "DELETE FROM cursos WHERE id = '$id'";
mysqli_query($conn, $result_cursos);

$status = mysqli_affected_rows($conn) != 0 ? 'deleted' : 'error';
header("Location: ./index.php?status={$status}");
exit;
