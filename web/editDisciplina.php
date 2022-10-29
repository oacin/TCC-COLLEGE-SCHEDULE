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
		<meta charset="utf-8">
		<link rel="icon" type="image/png" href="p.png">
		<title>Editar</title>		
	</head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
		<style>
body {
    padding: 0;
    margin: 0;
    background-color: #C0C0C0;
}

#login {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 80vh;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

.card {
    background-color: rgba(79,79,79, 0.5);
    padding: 40px;
    border-radius: 2px;
    width:280px;
}

.card-header {
    padding-bottom: 50px;
    opacity: 0.8;
    color: #fff;
}

.card-header::after {
    content: "";
    width: 70px;
    height: 1px;

    display: block;
    margin-top: -17px;
    margin-left: -5px;
}

.card-content label {
    color: #fff;
    font-size: 12px;
    opacity: 0.8;
}

.card-content-area {
    display: flex;
    flex-direction: column;
    padding:10px 0;
}

.card-content-area input {
    margin-top: 10px;
    padding:0 5px;
    background-color: transparent;
    border:none;
    border-bottom: 1px solid #e1e1e1;
    outline: none;
    color: #fff;
}

.card-footer {
    display: flex;
    flex-direction: column;
}

.card-footer .submit{
    width: 100%;
    height: 40px;
    background-color: #0C2340;
    border:none;
    color:#e1e1e1;
    margin: 10px 0;
}

.card-footer a {
    text-align: center;
    font-size: 12px;
    opacity: 0.8;
    color: #fff;
    text-decoration: none;
}

.pharma {
	width: 100%;
    height: 100%;
}
</style>
<script>
function myFunction() {
   var element = document.getElementById('td');
   element.classList.add("classeComFundoVermelho");
}
</script>
	<body>
		<center><h1>EDITOR DE DISCIPLINAS</h1></center>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
	 
	
	 <div id="login">

            <form class="card" method="POST" action="proc_edit_disciplina.php">
			<input type="hidden" name="id" value="<?php echo $row_saida['id']; ?>">

                <div class="card-header">

                    <img  src="logo.png" class ="pharma">

                </div>

                <div class="card-content">
					
				  <div class="card-content-area">
					<label>Nome: </label>
					<input type="text" name="nome" value="<?php echo $row_saida['nomeD']; ?>">
				</div>
				
				 <div class="card-content-area">
					<label>Semestre: </label>
					<input type="number" name="semestre"  value="<?php echo $row_saida['semestre']; ?>">
				</div>
				
				 <div class="card-content-area">
					<label>Curso: </label>
					<input type="number" name="numero" value="<?php echo $row_saida['idcurso']; ?>">
				</div>
				
				<div class="card-content-area">
					<label>Status:</label>
					<input type="number" name="status" autocomplete="off" required placeholder="0-Datativado/1-Ativado" value="<?php echo $row_saida['statusDis']; ?>">
				</div>
			
				
				
				 
					
                </div>

                <div class="card-footer">

                   <input type="submit" value="Concluir"  a href = "../TCC/listaDisciplina.php">
				
                </div>

            </form>
			

	</body>
</html>