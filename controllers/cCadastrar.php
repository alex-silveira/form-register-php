
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

	$validacao = new Validacao;
	$usuario = new Usuario;

	$date = new DateTime();
	$timeStamp = $date->format('Y-m-d H:i:s');

	$user_name = $usuario->anti_injection($_POST["user"]);
	$mail = $usuario->anti_injection($_POST["email"]);
	$password = $usuario->anti_injection($_POST["password"]);
	$cPassword = $usuario->anti_injection($_POST["cPassword"]);

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

	$gUserName =  $usuario->getUser();
	$gPassword =  $usuario->getPassword();
	$gcPassword = $usuario->getcPassword();
	$gEmail = $usuario->getEmail();

	$captcha = $usuario->anti_injection($_POST["captcha"]);
    $result = $usuario->anti_injection($_POST["captchaResult"]);

	try{
		if($validacao->validarNomeUsuario($gUserName) && $validacao->validarEmail($gEmail) && $validacao->validarSenha($password, $cPassword,2, 0)){
			if($validacao->validarCapatcha($captcha, $result)) {
                if ($usuario->verificarUsuario($gUserName, $gEmail)) {
                    $cadastrar = $usuario->Cadastrar($usuario);
                    $msg = "Cadastro realizado com sucesso!";
                    utf8_encode($msg);
                    header("Location: ../index.php?msg=$msg");
                }
            }
		}
	}
	catch(Exception $e)
	{
		echo $e;
	}

