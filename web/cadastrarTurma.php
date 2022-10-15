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
    <title>Login</title>

    <link rel="stylesheet" href="CSS/cadastros.css">

    <link rel="shortcut icon" type="imagem/x-icon" href="/CadastroCurso/imagens/logoIcon.png"/>
</head>

<script>
  function myFunction() {
    var element = document.getElementById('td');
    element.classList.add("classeComFundoVermelho");
  }
</script>

<body>
    <div class="squareLogin">
      <h1>Cadastrar turma</h1>

      <?php
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>

        <div id="formContent">          

          <!-- Espaço em cima -->
          <h2></h2>
      
          <!-- Logo -->
          <div class="logo">
            <img src="imagens/logo.png" id="logo" alt="UNIFAJ" />
          </div>
      
          <form class="card" method="POST" action="processaTurma.php">
            <input type="text" id="nome" name="nome" placeholder="Nome da turma" autocomplete="off">
            <input type="number" id="semestre" name="semestre" placeholder="Semestre">
            
            <select name="select_curso" required>
              <option>Selecione o curso</option>
              <?php
              $result_saida = "SELECT * FROM curso";
              $resultado_saida = mysqli_query($conn, $result_saida);
              while($row_saida = mysqli_fetch_assoc($resultado_saida)){ ?>
                <option value="<?php echo $row_saida['id']; ?>"><?php echo $row_saida['nome']; ?></option><?php
              }
              ?>
            </select>


            <input type="submit" value="Cadastrar"  a href = "../TCC/listaTurma.php">
            <input type="button" value="Cancelar" onclick="history.back()">
          </form>
      
        </div>
      </div>
</body>
</html>