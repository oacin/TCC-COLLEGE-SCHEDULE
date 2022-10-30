<?php
include_once("conexao.php");
//include_once("log.php");
$result_veiculos = "SELECT curso.nome, turma.name, disciplina.nomeD, professor.nomeP, sala.nomeS, carga, horario,dsemana.diaSemana, alocado from aula INNER JOIN curso
INNER JOIN turma
INNER JOIN disciplina
INNER JOIN professor
INNER JOIN sala
INNER JOIN dsemana
INNER JOIN alocar
where aula.cursoID = curso.id and aula.turmaID = turma.id_turma and alocar.aulaAula = aula.idAula and alocar.semanaS = dsemana.idSemana and aula.disciplinaID = disciplina.id and professorID = professor.cpf and salaID = sala.id
GROUP BY curso.nome;";
$result_veiculos = mysqli_query ($conn, $result_veiculos); 
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
  <title>Aulas Alocadas</title>
          

<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../TCC/CSS/listagem.css">

</head>


<body>
    
    <div class="buttonExitLoc">
        <button class="button-exit" onclick="history.back()">VOLTAR</button>
    </div>

    <div class="buttonCadastroLoc">
        <button class="button-novoCurso" onclick="location.href='../TCC/cadastrarAlocacao.php';">NOVA ALOCAÇÃO</button>
    </div>

    <header>
        <h1>AULAS ALOCADAS</h1>
    </header>
    
            
    
    <div class="container-fluid inner">
        <table class="tableizer-table">

            <tr class="tableizer-firstrow">
                <th>Aula</th>
                <th>Dia da Semana</th>
            </tr>
            
            <?php
                while($row_veiculo = mysqli_fetch_assoc($result_veiculos)){
                    ?>
                    <tr>
                        <td><?php echo   $row_veiculo['nome']  ;
			echo "<br>";
			echo  $row_veiculo['name'];
			echo "<br>";
			echo   $row_veiculo['nomeD'] ;
			echo "<br>";
			echo  $row_veiculo['nomeP'] ;
			echo "<br>";
			echo   $row_veiculo['nomeS'] ;
			echo "<br>";
			?></td>
                        <td><?php echo  $row_veiculo['diaSemana'] ;?></td>
                    </tr>
                        <?php
                }?>

        </table>
    </div>

    <footer>
        <div class="logo">
            <img src="imagens/logo.png" id="logo" alt="UNIFAJ" />
        </div>
    </footer>
    
</body>