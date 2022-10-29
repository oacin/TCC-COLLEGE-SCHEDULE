<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$dd = $_POST['status'];

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";


$result_saida = "UPDATE  professor SET statusProfessor='$dd' WHERE cpf='$id'";
$resultado_saida = mysqli_query($conn, $result_saida);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'];
	header("Location: ../TCC/listaProfessor.php");
}else{
	$_SESSION['msg'];
	header("Location: ../TCC/listaProfessor.php?cpf=$id");
}