<?php

include_once("conexao.php");

    $CPF = $_POST['CPF'];
	$nome = $_POST['nome'];
	$salario = $_POST['salario'];
	$dNascimento = $_POST['data'];
	$formacao = $_POST['formacao'];
	$disciplina = $_POST['select_disci'];
	$periodo = $_POST['periodo'];
	$ativo = $_POST['ativo'];
	
	


//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_saida = "INSERT INTO professor (cpf, nomeP, salario, data_nascimento, formacao, idDisciplina, periodo, statusProfessor) VALUES ('$CPF', '$nome', '$salario', '$dNascimento', '$formacao', '$disciplina', '$periodo', '$ativo' )";
$resultado_saida = mysqli_query($conn, $result_saida);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'];
	header("Location: ../TCC/listaProfessor.php");
}else{
	$_SESSION['msg'];
	header("Location: ../TCC/listaProfessor.php");
}




