<?php
include_once("conexao.php");
//include_once("log.php");
$result_veiculos = "SELECT curso.nome, turma.name, disciplina.nomeD, professor.nomeP, sala.nomeS, carga, horario,dsemana.diaSemana, alocado from aula INNER JOIN curso
INNER JOIN turma
INNER JOIN disciplina
INNER JOIN professor
INNER JOIN sala
INNER JOIN dsemana
INNER JOIN alocar
where aula.cursoID = curso.id and aula.turmaID = turma.id_turma and alocar.aulaAula = aula.idAula and alocar.semanaS = dsemana.idSemana
GROUP BY curso.nome;";
$result_veiculos = mysqli_query ($conn, $result_veiculos); 



?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		 <link rel="icon" type="image/png" href="p.png">
		<title>Listar Aula</title>		
	</head>
<style>
body {
     background-color: rgba(79,79,79, 0.5);
}
.gg {
  width: 300px;
}
.trgg {
  height: 80px;
}
.imagem{
   background: url(logo.png) no-repeat;
}

.btNovo{
	 width: 300px;
	 height: 40px;
	display: inline-block;
  padding: 10px 20px;
  font-size: 15px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #0C2340;
  border: none;
  border-radius: 10px;
  box-shadow: 0 2px #0C2340;
}

.btNovo:hover {background-color:#C0C0C0}

.btNovo:active {
  background-color: ##C0C0C0;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}


.trpp {
  height: 150px;
}
.pp {
  width: 600px;
}
   .button {
        border-radius: 10px;
        background-color: #0C2340;
        border: none;
        color: white;
        text-align: center;
        font-size: 28px;
        padding: 20px;
        width: 600px;
		height: 100px;
        cursor: pointer;
        margin: 5px;
      }
 
      .button span {
        position: relative;
        transition: 0.5s;
      }
 
      .button span:after {
        content: "\00bb";
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
      }
 
      .button:hover span {
        padding-right: 25px;
      }
 
      .button:hover span:after {
        opacity: 1;
        right: 0;
      }
	  
	    .bgSizeContain {
		   width: 50px;
			height: 50px;
 
	  }
</style>
	<body>
	
	<table border="0">
	<td class="gg"><img src="logo.png" width="300" height="80"></td>
	 <td class="gg">
				<a href="../TCC/cadastrarAlocacao.php"><button class="btNovo" >Nova Alocação</button></br><br>
	 
	 </td>
	 <td width="1000" height="80"></td>
	 <td width="150" height="10"><a href="../TCC/telaPrincipal.php"><button width="150" height="80" >SAIR</button></a></td>
	</table>
	<br><br><center><h1>Aulas Alocadas</h1></center><br>
	<div>
	
	<center><table class="table table-striped table-bordered table-hover" border="1">
	<thead>
			<tr class="trgg" >
				<th class="gg" align="center">Aula</th>
				<th class="gg" align="center">Dia da Semana</th>
				
			</tr>
		</thead>

		<tbody>
	<?php

				
		while($row_veiculo = mysqli_fetch_assoc($result_veiculos)){
			?>
			<tr class="trgg">
			<th class="gg" align="center"><?php echo   $row_veiculo['nome']  ;
			echo "<br>";
			echo  $row_veiculo['name'];
			echo "<br>";
			echo   $row_veiculo['nomeD'] ;
			echo "<br>";
			echo  $row_veiculo['nomeP'] ;
			echo "<br>";
			echo   $row_veiculo['nomeS'] ;
			echo "<br>";
			?></th>
			<td class="gg" align="center"><?php echo  $row_veiculo['diaSemana'] ;?></td>
			
			</center></td>
			</tr>
			<?php
		}?>
		
		</tbody>
	</table></center>
	</div>
		
		<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
		
</body>
	
</html>
