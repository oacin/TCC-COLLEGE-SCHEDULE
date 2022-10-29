<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_saida = "SELECT *  FROM curso WHERE id = '$id' ";
$resultado_saida = mysqli_query($conn, $result_saida);
$row_saida = mysqli_fetch_assoc($resultado_saida);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editrar Curso</title>

    <link rel="stylesheet" href="CSS/cadastros.css">

    <link rel="shortcut icon" type="imagem/x-icon" href="/CadastroCurso/imagens/logoIcon.png"/>

    <script>
      function myFunction() {
        var element = document.getElementById('td');
        element.classList.add("classeComFundoVermelho");
      }
    </script>


</head>
<body>
    <div class="squareLogin">
    <h1>Editar Curso</h1>

    <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>

        <div id="formContent">          
      
          <!-- Logo -->
          <div class="logo">
            <img src="imagens/logo.png" id="logo" alt="UNIFAJ" />
          </div>
      
          <form class="card" method="POST" action="proc_edit_curso.php">
          <input type="hidden" name="id" value="<?php echo $row_saida['id']; ?>">

            <input type="text" id="nome" name="nome" value="<?php echo $row_saida['nome']; ?>">

            <input type="number" id="qtdAluno" name="qtdAluno" value="<?php echo $row_saida['quantidadeAluno']; ?>">

            <input type="text" id="periodo" name="periodo" value="<?php echo $row_saida['periodo']; ?>">

            <input type="number" id="qtdSemestre" name="data_pegou" value="<?php echo $row_saida['qtdSemestre']; ?>">

            <input type="number" name="status" autocomplete="off" required placeholder="0-Datativado/1-Ativado" value="<?php echo $row_saida['statusCurso']; ?>">

            <input type="submit" value="Cadastrar"  a href = "../TCC/listaSalas.php">
            <input type="button" value="Cancelar" onclick="history.back()">
          </form>
      
        </div>
      </div>
</body>
</html>