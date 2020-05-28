<?php

class Validacao{

	public static function validarNomeUsuario($userName, $email, $password, $cPassword){
		
		$msg = "";
		$msg = utf8_encode($msg);
		
		if(empty($userName)){
			$msg = "O nome de usuário é obrigatório";
			header("Location: ../index.php?msg=$msg");
			return false;
		}	
		else if(!preg_match("/^([a-zA-Z0-9]+)$/",$userName)){
			$msg = "User somente letras e números no campo de usuário";
			header("Location: ../index.php?msg=$msg");
			return false;
		}
		else if(strlen($userName) < 4 || strlen($userName) > 18){
			$msg = "O usuário deve conter no mínino 4 caracteres e no máximo 18";
			header("Location: ../index.php?msg=$msg");
			return false;
		}
		else if(empty($email)){
			$msg = "O campo e-mail é obrigatório";
			header("Location: ../index.php?msg=$msg");
			return false;
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$msg = "Tipo de e-mail inválido tente outro!";
			header("Location: ../index.php?msg=$msg");
			return false;
		}
		else if(empty($password)){
			$msg = "O campo de senha é obrigatório";
			header("Location: ../index.php?msg=$msg");
			return false;
		}
		else if(!preg_match("/^([a-zA-Z0-9]+)$/",$password)){
			$msg = "User somente letras e números no campo de senha";
			header("Location: ../index.php?msg=$msg");
			return false;
		}
		else if(empty($cPassword)){
			$msg = "O campo de repita a senha é obrigatório";
			header("Location: ../index.php?msg=$msg");
			return false;
		}
		else if(!preg_match("/^([a-zA-Z0-9]+)$/",$cPassword)){
			$msg = "User somente letras e números no campo de repita a senha";
			header("Location: ../index.php?msg=$msg");
			return false;
		}
		else{return true;}

	}
}
?>