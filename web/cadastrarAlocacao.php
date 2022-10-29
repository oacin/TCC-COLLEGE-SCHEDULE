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
    <title>Alocar Aula</title>

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
      <h1>Alocar Aula</h1>

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
      
          <form class="card" method="POST" action="processaAlocar.php">

            <select name="aula" 
            style="border-radius: 5px; padding: 0px 75px; background-color: #f6f6f6; color: #0d0d0d; font-size: 16px; text-align: center;" 
            required>
              <option>Selecione a sala:</option>
              <?php
						$result_saida = "select *  from aula INNER JOIN curso
            INNER JOIN turma
            INNER JOIN disciplina
            where aula.alocado = 0 and aula.cursoID = curso.id and aula.turmaID = turma.id_turma and aula.disciplinaID = disciplina.id;";
						$resultado_saida = mysqli_query($conn, $result_saida);
						while($row_saida = mysqli_fetch_assoc($resultado_saida)){ ?>
							<option value="<?php echo $row_saida['idAula']; ?>"><?php echo $row_saida['nome']; echo "-";
							echo $row_saida['name']; echo "-";
							echo $row_saida['nomeD']; ?></option><?php
						}
					?>
            </select>

            <br></br>

            <select name="dia" 
            style="border-radius: 5px; padding: 0px 135px; background-color: #f6f6f6; color: #0d0d0d; font-size: 16px; text-align: center;" 
            required>
              <option>Selecione o dia</option>
              <?php
						$result_saida = "SELECT * FROM dsemana";
						$resultado_saida = mysqli_query($conn, $result_saida);
						while($row_saida = mysqli_fetch_assoc($resultado_saida)){ ?>
							<option value="<?php echo $row_saida['idSemana']; ?>"><?php echo $row_saida['diaSemana']; ?></option><?php
						}
					?>
            </select>


            <input type="submit" value="Cadastrar"  a href = "../TCC/listaSalas.php">
            <input type="button" value="Cancelar" onclick="history.back()">
          </form>
      
        </div>
      </div>
</body>
</html>