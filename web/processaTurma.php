<?php

include_once("conexao.php");

    $nome = $_POST['nome'];
	$semestre = $_POST['semestre'];
	$curso = $_POST['select_curso'];
	
	


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_saida = "INSERT INTO turma (name, semestre, id_curso) VALUES ('$nome', '$semestre', '$curso')";
$resultado_saida = mysqli_query($conn, $result_saida);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'];
	header("Location: ../TCC/listaTurma.php");
}else{
	$_SESSION['msg'];
	header("Location: ../TCC/listaTurma.php");
}




