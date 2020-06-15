<?php

class Validacao{

	public static function validarNomeUsuario($userName){

		if(empty($userName)){
			$msg = "O nome de usuário é obrigatório";
            utf8_encode($msg);
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
            $msg = "Use somente letras e números no campo de repita a senha";
            utf8_encode($msg);
            header("Location: ../index.php?msg=$msg");
            return false;
        }
        if(strlen($password) < 4 && strlen($password) > 18){
            $msg = "A senha deve conter no mínino 4 caracteres e no máximo 18";
            header("Location: ../index.php?msg=$msg");
            return false;
        }
        if(strlen($cPassword) < 4 && strlen($cPassword) > 18 ){
            $msg = "A confirmação da senha deve conter no mínino 4 caracteres e no máximo 18";
            header("Location: ../index.php?msg=$msg");
            return false;
        }
        if($password != $cPassword){
            $msg = "As senhas não são iguais!";
            header("Location: ../index.php?msg=$msg");
            return false;
        }
        else{return true;}
    }

    public static function validarCapatcha($captcha, $result){
	    if(empty($captcha)){
            $msg = "O resultado do captcha é obrigatório";
            utf8_encode($msg);
            header("Location: ../index.php?msg=$msg");
            return false;
        }
	    else if(!is_numeric($captcha)){
            $msg = "Use somente números no resultado do captcha";
            utf8_encode($msg);
            header("Location: ../index.php?msg=$msg");
            return false;
        }
	    else if($captcha != $result){
            $msg = "Resultado do captcha incorreto tente novamente!";
            utf8_encode($msg);
            header("Location: ../index.php?msg=$msg");
            return false;
        }
	    else{return true;}

    }
}
