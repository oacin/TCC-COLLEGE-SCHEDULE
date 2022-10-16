<?php

include_once("conexao.php");

    $nome = $_POST['nome'];
	$numero = $_POST['numero'];
	$status = $_POST['status'];
	
	


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_saida = "INSERT INTO sala (nomeS, numero, status) VALUES ('$nome', '$numero', '$status')";
$resultado_saida = mysqli_query($conn, $result_saida);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'];
	header("Location: ../TCC/listaSalas.php");
}else{
	$_SESSION['msg'];
	header("Location: ../TCC/listaSalas.php");
}




