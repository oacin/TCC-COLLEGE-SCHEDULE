<?php
session_start();

include_once("conexao.php");


	if((isset($_POST['user'])) && (isset($_POST['pass']))){
		$usuario = mysqli_real_escape_string($conn, $_POST['user']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
        $senha = mysqli_real_escape_string($conn, $_POST['pass']);
        //$senha = md5($senha);
		
		$result_usuario = "SELECT * FROM adm WHERE usuario = '$usuario' && senha = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
		//mexi
		
		
		if(isset($resultado)){
			$_SESSION['usuarioId'] = $resultado['id'];
			$_SESSION['usuarioLogin'] = $resultado['nome'];
			$_SESSION['usuarioNome'] = $resultado['usuario'];
			
			$_SESSION['usuario'] = $usuario;
			header("Location: telaPrincipal.php");
			exit();
			
			
			
			
			
			
		}else{	
			//Váriavel global recebendo a mensagem de erro
			
			$_SESSION['loginErro'] = "Usuário ou senha Inválido";
			header("Location: index.php");
			
		}
		
		
	
		
	}else{    
            //Váriavel global recebendo a mensagem de erro
				
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: index.php");
        }
?>