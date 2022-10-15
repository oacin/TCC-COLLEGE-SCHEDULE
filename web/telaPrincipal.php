<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Principal</title>
    <link rel="stylesheet" href="../TCC/CSS/telaPrincipal.css">
</head>

<script>
    document.addEventListener('contextmenu', event => event.preventDefault());  
</script>
<body>

    <div class="logo">
        <img src="imagens/logo.png" id="logo" alt="UNIFAJ" />
    </div>

    <div class="btnTop">
        <button class="button-18" role="button" onclick="location.href='../TCC/listaCursos.php';">CURSO</button>
        <button class="button-18" role="button" onclick="location.href='../TCC/listaTurma.php';">TURMA</button>
        <button class="button-18" role="button" onclick="location.href='../TCC/listaProfessor.php';">PROFESSOR</button>
        <button class="button-18" role="button" onclick="location.href='../TCC/listaSalas.php';">SALAS</button>
        <button class="button-18" role="button" onclick="location.href='../TCC/listaDisciplina.php';">DISCIPLINAS</button>
    </div>

    <br></br>
    <br></br>
    <br></br>

    <div class="btnMid">
        <button class="button-19" role="button" onclick="location.href='../TCC/listaAula.php';">AULA</button>
        <br></br>
        <br></br>
        <button class="button-19" role="button" onclick="location.href='../TCC/alocar.php';">ALOCAR AULA</button>
        <br></br>
        <br></br>
        <button class="button-19" role="button" onclick="location.href='../TCC/grade.php';">GRADE</button>
    </div>

    <div class="btnBottom">
        <button class="button-exit" role="button" onclick="location.href='verificaLogin.php'">SAIR</button>
    </div>

</body>
</html>