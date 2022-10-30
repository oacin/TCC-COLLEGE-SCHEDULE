<?php
include_once("conexao.php");
//include_once("log.php");
$result_veiculos = "SELECT curso.nome, turma.name, disciplina.nomeD, professor.nomeP, sala.nomeS, dsemana.diaSemana, horario, alocado from aula INNER JOIN curso
INNER JOIN turma
INNER JOIN disciplina
INNER JOIN professor
INNER JOIN sala
INNER JOIN alocar
INNER JOIN dsemana
where aula.cursoID = curso.id and aula.turmaID = turma.id_turma and alocar.semanaS = dsemana.idSemana and  aula.disciplinaID = disciplina.id and professorID = professor.cpf and salaID = sala.id
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
  <title>Grade</title>
          

<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../TCC/CSS/listagem.css">

</head>


<body>
    
    <div class="buttonExitLoc">
        <button class="button-exit" onclick="history.back()">VOLTAR</button>
    </div>



    <header>
        <h1>GRADE</h1>
    </header>
    
            
    
    <div class="container-fluid inner">
        <table class="tableizer-table">

            <tr class="tableizer-firstrow">
                <th>Curso</th>
                <th>Turma</th>
                <th>Disciplina</th>
                <th>Professor</th>
                <th>Sala</th>
                <th>Dia da Semana</th>
                <th>Horario</th>
            </tr>
            
            <?php
                while($row_veiculo = mysqli_fetch_assoc($result_veiculos)){
                    ?>
                    <tr>
                        <td><?php echo   $row_veiculo['nome'] ;?></td>
                        <td><?php echo  $row_veiculo['name'] ;?></td>
                        <td><?php echo  $row_veiculo['nomeD'] ;?></td>
                        <td><?php echo  $row_veiculo['nomeP'] ;?></td>
                        <td><?php echo  $row_veiculo['nomeS'] ;?></td>
                        <td><?php echo  $row_veiculo['diaSemana'] ;?></td>
                        <td><?php echo  $row_veiculo['horario'] ;?></td>
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