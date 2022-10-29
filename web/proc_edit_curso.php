<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$dd = $_POST['status'];

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";


$result_saida = "UPDATE  curso SET statusCurso='$dd'  WHERE id='$id'";
$resultado_saida = mysqli_query($conn, $result_saida);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'];
	header("Location: ../TCC/listaCursos.php");
}else{
	$_SESSION['msg'];
	header("Location: ../TCC/listaCursos.php?id=$id");
}
