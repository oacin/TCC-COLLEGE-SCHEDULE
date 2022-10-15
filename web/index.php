<?php
session_start();


include_once("conexao.php");

$result_saida = "SELECT * FROM adm";
$result_saida = mysqli_query ($conn, $result_saida); 
$row_saida = mysqli_fetch_assoc($result_saida);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="CSS/index.css">

    <link rel="shortcut icon" type="imagem/x-icon" href="/CadastroCurso/imagens/logoIcon.png"/>

    <script>
      document.addEventListener('contextmenu', event => event.preventDefault());
      
      function login() {
        var done=0;
        var usuario = document.getElementsByName('usuario')[0].value;
        usuario=usuario.toLowerCase();
        var senha= document.getElementsByName('password')[0].value;
        senha=senha.toLowerCase();
        if (usuario=="admin" && senha=="admin") {
          window.location="/p/admin.html";
          done=1;
        }
        if (done==0) { alert("Dados incorretos, tente novamente"); }
      }

</script>
</head>
<body>
    <div class="squareLogin">

        <div id="formContent">          

          <!-- Espaço em cima -->
          <h2></h2>
      
          <!-- Logo -->
          <div class="logo">
            <img src="imagens/logo.png" id="logo" alt="UNIFAJ" />
          </div>
      
          <form class="card" method="POST" action="valida.php">
            <input type="text" id="usuario" name="user" placeholder="Nome de Usuario" autocomplete="off">
            <input type="password" id="password" name="pass" placeholder="Senha">

            <input type="submit" value="Entrar"  onclick="login()">
            <br>
            <a href="../Portaria/admIndex.php">Sou Usuario</a>
          </form>

          <p style color>
            <?php 
			//Recuperando o valor da variável global, os erro de login.
            if(isset($_SESSION['loginErro'])){
              echo $_SESSION['loginErro'];
              echo "Usuário ou senha Inválido";
              unset($_SESSION['loginErro']);
            }?>
		      </p>	
      
        </div>
      </div>
</body>
</html>