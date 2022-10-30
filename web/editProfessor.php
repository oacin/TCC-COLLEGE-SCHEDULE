<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_NUMBER_INT);
$result_saida = "SELECT *  FROM professor WHERE cpf = '$id' ";
$resultado_saida = mysqli_query($conn, $result_saida);
$row_saida = mysqli_fetch_assoc($resultado_saida);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editrar Professor</title>

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
    <h1>Editar Professor</h1>

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
      
          <form class="card" method="POST" action="proc_edit_professor.php">
          <input type="hidden" name="id" value="<?php echo $row_saida['cpf']; ?>">

            <input type="text" name="nome" value="<?php echo $row_saida['nomeP']; ?>">

            <input type="number" name="salario"  value="<?php echo $row_saida['salario']; ?>">

            <input type="date" name="numero" value="<?php echo $row_saida['data_nascimento']; ?>">

            <input type="text" name="nome" value="<?php echo $row_saida['formacao']; ?>">

            <input type="number" name="salario"  value="<?php echo $row_saida['idDisciplina']; ?>">

            <input type="text" name="nome" value="<?php echo $row_saida['periodo']; ?>">

            <input type="number" name="status" autocomplete="off" required placeholder="0-Datativado/1-Ativado" value="<?php echo $row_saida['statusProfessor']; ?>">

            <input type="submit" value="Confirmar"  a href = "../TCC/listaProfessor.php">
            <input type="button" value="Cancelar" onclick="history.back()">
          </form>
      
        </div>
      </div>
</body>
</html>