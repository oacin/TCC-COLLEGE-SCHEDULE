<?php

include_once("conexao.php");

    $curso = $_POST['curso'];
	$turma = $_POST['turma'];
	$disciplina = $_POST['disciplina'];
	$professor = $_POST['professor'];
	$sala = $_POST['sala'];
	$dCarga = $_POST['dCarga'];
	$hora = $_POST['hora'];
	


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_saida = "INSERT INTO aula (cursoID, turmaID, disciplinaID, professorID, salaID, carga, horario) 
VALUES ('$curso', '$turma', '$disciplina', '$professor', '$sala', '$dCarga', '$hora')";
$resultado_saida = mysqli_query($conn, $result_saida);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'];
	header("Location: ../TCC/listaAula.php");
}else{
	$_SESSION['msg'];
	header("Location: ../TCC/listaAula.php");
}




