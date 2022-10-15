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
    <h1>Cadastrar Professor</h1>

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
      
          <form class="card" method="POST" action="processaProfessor.php">
            <input type="text" id="CPF" name="CPF" placeholder="CPF" autocomplete="off">
            <input type="text" id="nome" name="nome" placeholder="Nome" autocomplete="off">
            <input type="number" id="salario" name="salario" placeholder="Salario" autocomplete="off">
            <input type="date" id="data" name="data" placeholder="Data de Nascimento" autocomplete="off">
            <input type="text" id="formacao" name="formacao" placeholder="Formação" autocomplete="off">

            <select name="select_disci" required>
              <option>Selecione a disciplina</option>
              <?php
        					$result_saida = "SELECT * FROM disciplina";
                  $resultado_saida = mysqli_query($conn, $result_saida);
                  while($row_saida = mysqli_fetch_assoc($resultado_saida)){ ?>
                  <option value="<?php echo $row_saida['id']; ?>"><?php echo $row_saida['nomeD']; ?></option><?php
                  }
              ?>
            </select>

            <input type="text" id="periodo" name="periodo" placeholder="Período" autocomplete="off">


            <input type="submit" value="Cadastrar"  a href = "../TCC/listaSalas.php">
            <input type="button" value="Cancelar" onclick="history.back()">
          </form>
      
        </div>
      </div>
</body>
</html>