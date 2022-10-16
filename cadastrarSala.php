<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Sala</title>

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
    <h1>Cadastrar Sala</h1>

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
      
          <form class="card" method="POST" action="processaSala.php">
            <input type="text" id="nome" name="nome" placeholder="Nome" autocomplete="off">
            <input type="number" id="numero" name="numero" placeholder="Numero" autocomplete="off">
            <input type="number" id="status" name="status" placeholder="Status" autocomplete="off">

            <input type="submit" value="Cadastrar"  a href = "../TCC/listaSalas.php">
            <input type="button" value="Cancelar" onclick="history.back()">
          </form>
      
        </div>
      </div>
</body>
</html>