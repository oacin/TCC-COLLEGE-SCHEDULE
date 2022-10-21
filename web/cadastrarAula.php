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
            <select name="curso" 
            style="border-radius: 5px; padding: 0px 70px; background-color: #f6f6f6; color: #0d0d0d; font-size: 16px; text-align: center;" 
            required>
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

            <select name="turma" 
            style="border-radius: 5px; padding: 0px 135px; background-color: #f6f6f6; color: #0d0d0d; font-size: 16px; text-align: center;" 
            required>
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

            <select name="disciplina" 
            style="border-radius: 5px; padding: 0px 125px; background-color: #f6f6f6; color: #0d0d0d; font-size: 16px; text-align: center;" 
            required>
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

            <select name="professor" 
            style="border-radius: 5px; padding: 0px 125px; background-color: #f6f6f6; color: #0d0d0d; font-size: 16px; text-align: center;" 
            required>
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

            <select name="sala" 
            style="border-radius: 5px; padding: 0px 145px; background-color: #f6f6f6; color: #0d0d0d; font-size: 16px; text-align: center;" 
            required>
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