<?php

include_once("conexao.php");

    $aula = $_POST['aula'];
	$dia = $_POST['dia'];
	


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_saida = "INSERT INTO alocar (aulaAula, semanaS) VALUES ('$aula', '$dia')";
$resultado_saida = mysqli_query($conn, $result_saida);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'];
	header("Location: ../TCC/alocar.php");
}else{
	$_SESSION['msg'];
	header("Location: ../TCC/alocar.php");
}




