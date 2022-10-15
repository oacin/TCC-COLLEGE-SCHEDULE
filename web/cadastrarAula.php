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
    <title>Cadastrar Aula</title>

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
      <h1>Cadastrar Aula</h1>

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
      
          <form class="card" method="POST" action="processaAula.php">
            <select name="curso" required>
              <option>Selecione o curso</option>
              <?php
              $result_saida = "SELECT * FROM curso";
              $resultado_saida = mysqli_query($conn, $result_saida);
              while($row_saida = mysqli_fetch_assoc($resultado_saida)){ ?>
                <option value="<?php echo $row_saida['id']; ?>"><?php echo $row_saida['nome']; ?></option><?php
              }
              ?>
            </select>

            <br></br>

            <select name="turma" required>
              <option>Selecione a Turma</option>
              <?php
                $result_saida = "SELECT * FROM turma";
                $resultado_saida = mysqli_query($conn, $result_saida);
                while($row_saida = mysqli_fetch_assoc($resultado_saida)){ ?>
                  <option value="<?php echo $row_saida['id_turma']; ?>"><?php echo $row_saida['name']; ?></option><?php
                }
              ?>
            </select>

            <br></br>

            <select name="disciplina" required>
              <option>Selecione a Disciplina</option>
              <?php
                $result_saida = "SELECT * FROM disciplina";
                $resultado_saida = mysqli_query($conn, $result_saida);
                while($row_saida = mysqli_fetch_assoc($resultado_saida)){ ?>
                  <option value="<?php echo $row_saida['id']; ?>"><?php echo $row_saida['nomeD']; ?></option><?php
                }
              ?>
            </select>

            <br></br>

            <select name="professor" required>
              <option>Selecione o Professor</option>
              <?php
                $result_saida = "SELECT * FROM professor";
                $resultado_saida = mysqli_query($conn, $result_saida);
                while($row_saida = mysqli_fetch_assoc($resultado_saida)){ ?>
                  <option value="<?php echo $row_saida['cpf']; ?>"><?php echo $row_saida['nomeP']; ?></option><?php
                }
              ?>
            </select>

            <br></br>

            <select name="sala" required>
              <option>Selecione a Sala</option>
              <?php
                $result_saida = "SELECT * FROM sala";
                $resultado_saida = mysqli_query($conn, $result_saida);
                while($row_saida = mysqli_fetch_assoc($resultado_saida)){ ?>
                  <option value="<?php echo $row_saida['id']; ?>"><?php echo $row_saida['nomeS']; ?></option><?php
                }
              ?>
            </select>

            <br></br>

            <input type="number" id="dCarga" name="dCarga" placeholder="Carga Horaria">
            
            <br></br>

            <label>Horario: </label>
            <input type="time" name="hora" placeholder="horario" autocomplete="off">

            <br></br>

            <label>Alocado: </label>
            <input type="number" name="alocado" placeholder="alocado" autocomplete="off">                       


            <input type="submit" value="Cadastrar"  a href = "../TCC/listaTurma.php">
            <input type="button" value="Cancelar" onclick="history.back()">
          </form>
      
        </div>
      </div>
</body>
</html>