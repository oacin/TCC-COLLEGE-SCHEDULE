<?php
include_once("conexao.php");
//include_once("log.php");
$result_veiculos = "SELECT professor.cpf, professor.nomeP, professor.formacao, disciplina.nomeD, professor.statusProfessor FROM professor INNER JOIN disciplina where professor.idDisciplina = disciplina.id";
$result_veiculos = mysqli_query ($conn, $result_veiculos); 

?>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
  <title>Professores Cadastrados</title>
          

<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../TCC/CSS/listagem.css">

</head>


<body>
    
    <div class="buttonExitLoc">
        <button class="button-exit" onclick="history.back()">VOLTAR</button>
    </div>

    <div class="buttonCadastroLoc">
        <button class="button-novoCurso" onclick="location.href='../TCC/cadastrarProfessor.php';">NOVO PROFESSOR</button>
    </div>

    <header>
        <h1>PROFESSORES CADASTRADOS</h1>
    </header>
    
            
    
    <div class="container-fluid inner">
        <table class="tableizer-table">

            <tr class="tableizer-firstrow">
                <th>Nome</th>
                <th>formacao</th>
                <th>Disciplina</th>
                <th>Status</th>
                <th>Editar</th>
            </tr>
            
            <?php
                while($row_veiculo = mysqli_fetch_assoc($result_veiculos)){
                    ?>
                    <tr>
                        <td><?php echo   $row_veiculo['nomeP'] ;?></td>
                        <td><?php echo  $row_veiculo['formacao'] ;?></td>
                        <td><?php echo  $row_veiculo['nomeD'] ;?></td>
                        <td><img height="50px" class='bgSizeContain' src="<?php echo  $row_veiculo['statusProfessor'] ;?>.gif" /></td>
                        <td><?php echo "<a href='../TCC/editProfessor.php?cpf=" . $row_veiculo['cpf'] . "'>Editar</a><br><hr>" ;?></td>
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