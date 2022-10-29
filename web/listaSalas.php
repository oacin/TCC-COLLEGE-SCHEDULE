<?php
include_once("conexao.php");
//include_once("log.php");
$result_veiculos = "SELECT * FROM sala ORDER BY numero ASC";
$result_veiculos = mysqli_query ($conn, $result_veiculos); 
?>


<html lang="pt-br">
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
  <title>Salas Cadastradas</title>
          

<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../TCC/CSS/listagem.css">

</head>


<body>
    
    <div class="buttonExitLoc">
        <button class="button-exit" onclick="history.back()">VOLTAR</button>
    </div>

    <div class="buttonCadastroLoc">
        <button class="button-novoCurso" onclick="location.href='../TCC/cadastrarSala.php';">NOVA SALA</button>
    </div>

    <header>
        <h1>SALAS CADASTRADAS</h1>
    </header>
    
            
    
    <div class="container-fluid inner">
        <table class="tableizer-table">

            <tr class="tableizer-firstrow">
                <th>Nome</th>
                <th>Numero</th>
                <th>Status</th>
            </tr>
            
            <?php
                while($row_veiculo = mysqli_fetch_assoc($result_veiculos)){
                    ?>
                    <tr>
                        <td><?php echo   $row_veiculo['nomeS'] ;?></td>
                        <td><?php echo  $row_veiculo['numero'] ;?></td>
                        <td><img height="50px" src="<?php echo  $row_veiculo['status'] ;?>.gif" /></td>
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