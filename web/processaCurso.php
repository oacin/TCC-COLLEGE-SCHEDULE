<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$qtdAluno = filter_input(INPUT_POST, 'qtdAluno', FILTER_SANITIZE_NUMBER_INT);
$periodo = filter_input(INPUT_POST, 'periodo', FILTER_SANITIZE_STRING);
$qtdSemestre = filter_input(INPUT_POST, 'qtdSemestre', FILTER_SANITIZE_NUMBER_INT);
$sc = filter_input(INPUT_POST, 'statusC', FILTER_SANITIZE_NUMBER_INT);



//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_veiculo = "INSERT INTO curso (nome, quantidadeAluno, periodo, qtdSemestre, statusCurso) VALUES ('$nome', '$qtdAluno', '$periodo', '$qtdSemestre', '$sc')";
$resultado_veiculo = mysqli_query($conn, $result_veiculo);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'];
	header("Location: ../TCC/listaCursos.php");
}else{
	$_SESSION['msg'];
	header("Location: ../TCC/listaCursos.php");
}
