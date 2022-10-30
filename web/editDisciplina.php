<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_saida = "SELECT *  FROM disciplina WHERE id = '$id' ";
$resultado_saida = mysqli_query($conn, $result_saida);
$row_saida = mysqli_fetch_assoc($resultado_saida);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editrar Disciplina</title>

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
    <h1>Editar Disciplina</h1>

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
      
          <form class="card" method="POST" action="proc_edit_disciplina.php">
          <input type="hidden" name="id" value="<?php echo $row_saida['id']; ?>">

            <input type="text" name="nome" value="<?php echo $row_saida['nomeD']; ?>">

            <input type="number" name="semestre"  value="<?php echo $row_saida['semestre']; ?>">

            <input type="number" name="numero" value="<?php echo $row_saida['idcurso']; ?>">

            <input type="number" name="status" autocomplete="off" required placeholder="0-Datativado/1-Ativado" value="<?php echo $row_saida['statusDis']; ?>">

            <input type="submit" value="Confirmar"  a href = "../TCC/listaProfessor.php">
            <input type="button" value="Cancelar" onclick="history.back()">
          </form>
      
        </div>
      </div>
</body>
</html>