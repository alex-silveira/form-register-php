
<?php
	try{
		include_once '../models/Conexao.class.php';
		include_once '../models/Usuario.class.php';
		include_once '../models/Validacao.class.php';
	}
	catch(Exception $e)
	{
		echo $e;
	}
	if(!isset($_POST['user']) && !isset($_POST['email']) && !isset($_POST['password']) && !isset($_POST['cPassword']))
	{
		$msg = "Operação inválida!";
		header("Location: ../index.php?msg=$msg");	
		return false;
	}
	else
	{	
		$validacao = new Validacao;
		$usuario = new Usuario;
		
		$date = new DateTime();
		$timeStamp = $date->format('Y-m-d H:i:s');
		
		$user_name = $usuario->anti_injection($_POST["user"]);
		$mail = $usuario->anti_injection($_POST["email"]);
		$password = $usuario->anti_injection($_POST["password"]);
		$cPassword = $usuario->anti_injection($_POST["cPassword"]);

		if(strlen($password) < 4 || strlen($password) > 18 || strlen($cPassword) < 4 || strlen($cPassword) > 18 ){
			$msg = "A senha deve conter no mínino 4 caracteres e no máximo 18";
			header("Location: ../index.php?msg=$msg");
			return false;
		}
		if($password != $cPassword){
			$msg = "As senhas não são iguais!";
			header("Location: ../index.php?msg=$msg");
			return false;
		}
		
		$passwordHash = hash('sha256',$password);

		$uuid = $usuario->generateUuid($user_name); 
		
		$usuario->setId($uuid); 
		$usuario->setUser($user_name); 
		$usuario->setPassword(strtoupper($passwordHash));
		$usuario->setcPassword($cPassword);
		$usuario->setUserType(0);
		
		$ip = $usuario->getUserIP();
		
		$usuario->setIp($ip);
		$usuario->setServer(0);
		$usuario->setNCash(0);
		$usuario->setBankGold(0);
		$usuario->setEmail($mail);
		$usuario->setCreateAt($timeStamp);
		
		$gUserName =  $usuario->getUser($user_name); 
		$gPassword =  $usuario->getPassword($password);
		$gcPassword = $usuario->getcPassword($cPassword);
		$gEmail = $usuario->getEmail($mail);
		$msg = utf8_encode($msg);
		
		try{
			if($validacao->validarNomeUsuario($gUserName, $gEmail, $gPassword, $gcPassword)){
				if($usuario->verificarUsuario($gUserName, $gEmail)){
					$cadastrar = $usuario->Cadastrar($usuario);
					$msg = "Cadastro realizado com sucesso!";
					header("Location: ../index.php?msg=$msg");
				}
			}
		}
		catch(Exception $e)
		{
			echo $e;
		}
	}
?>
