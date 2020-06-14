<?php

class Validacao{

	public static function validarNomeUsuario($userName){

		if(empty($userName)){
			$msg = "O nome de usuário é obrigatório";
            utf8_encode($msg);
			header("Location: ../index.php?msg=$msg");
			return false;
		}
		else{return true;}

	}
	public static function validarEmail($email){
        if(empty($email)){
            $msg = "O campo e-mail é obrigatório";
            utf8_encode($msg);
            header("Location: ../index.php?msg=$msg");
            return false;
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $msg = "Tipo de e-mail inválido tente outro!";
            utf8_encode($msg);
            header("Location: ../index.php?msg=$msg");
            return false;
        }
        else{return true;}
    }

    public static function validarSenha($password, $cPassword){
        if(empty($password)){
            $msg = "O campo de senha é obrigatório";
            utf8_encode($msg);
            header("Location: ../index.php?msg=$msg");
            return false;
        }
        else if(!preg_match("/^([a-zA-Z0-9]+)$/",$password)){
            $msg = "User somente letras e números no campo de senha";
            utf8_encode($msg);
            header("Location: ../index.php?msg=$msg");
            return false;
        }
        else if(empty($cPassword)){
            $msg = "O campo de repita a senha é obrigatório";
            utf8_encode($msg);
            header("Location: ../index.php?msg=$msg");
            return false;
        }
        else if(!preg_match("/^([a-zA-Z0-9]+)$/",$cPassword)){
            $msg = "User somente letras e números no campo de repita a senha";
            utf8_encode($msg);
            header("Location: ../index.php?msg=$msg");
            return false;
        }
        else{return true;}
    }
}
