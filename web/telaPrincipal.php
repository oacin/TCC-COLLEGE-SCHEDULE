<?php

session_start();
/* include_once("conexao.php");
include_once("log.php");
$id = filter_input(INPUT_GET, 'Id', FILTER_SANITIZE_NUMBER_INT);
$result_saida = "SELECT * FROM users  WHERE Id = '$id' ";
$resultado_saida = mysqli_query($conn, $result_saida);
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" type="image/png" href="p.png">
<title>Principal</title>
</head>
<script>
  document.addEventListener('contextmenu', event => event.preventDefault());
  


</script>
<style>
body {
     background-color: rgba(255, 255, 0, 0.5);
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
</style>


<body>

	<table border="0">
		<tr class="trgg">
			<td class="gg"><img src="logo.png" width="300" height="80"></td>
			<td class="gg">
						   <a href="../TCC/listaCursos.php"><button class="btNovo" >Curso</button>
						   <a href="../TCC/listaProfessor.php"><button class="btNovo" >Professor</button>
						   </td>
						   
			<td class="gg" width="300" height="80"> 
						<a href="../TCC/listaTurma.php"><button class="btNovo" >Turma</button>
						<a href="../TCC/listaSalas.php"><button class="btNovo" >Salas</button>
			</td>
			<td class="gg" width="300" height="80"><a href="../TCC/listaDisciplina.php"><button class="btNovo" >Disciplina</button></td>
			<td width="150" height="80"><a href="verificaLogin.php"><button width="150" height="80" >SAIR</button></a></td>
	
			
	
		</tr>
	</table>
	
	</br>
	</br>
	</br>
	</br>
<!---------------------------------------------------------------------------------------------->
<center>
	<table border="0">
	<tr class="trpp">
		<td class="pp"><a href="../TCC/listaAula.php"> <button class="button"><span>Aula </span></button></td>
	</tr>
	
	<tr class="trpp">
		<td class="pp"><a href="../TCC/alocar.php"><button class="button"><span>Alocar Aula </span></button></a></td>
	</tr>
	
	<tr class="trpp">
		<td class="pp"><a href="../TCC/grade.php"><button class="button"><span>Grade</span></button></a></td>
	</tr>
	</table>
</center>


</body>
</html>