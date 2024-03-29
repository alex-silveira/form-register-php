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

    if(!isset($_POST['email']))
    {
        $msg = "Operação inválida!";
        header("Location: ../index.php?msg=$msg");
        return false;
    }

    $validacao = new Validacao;
    $usuario = new Usuario;

    $mail = $usuario->anti_injection($_POST["email"]);

    $usuario->setEmail($mail);

    $gEmail = $usuario->getEmail();

    $key = $usuario->generateKey($gEmail);

    $msg =  "<h1>Clique no link abaixo para resetar sua senha</h1>".
            "<a href=http://hero.com.br:82/index.php?page=4&key=$key>Clique aqui e será redirecionado para página de recuperação!</a>";

    $captcha = $usuario->anti_injection($_POST["captcha"]);
    $result = $usuario->anti_injection($_POST["captchaResult"]);

    try{
        if($validacao->validarEmail($gEmail)){
            if($validacao->validarCapatcha($captcha, $result, 4, 0)) {
                if ($usuario->verificarEmail($gEmail)) {
                    $usuario->sendEmail($mail, $msg);
                    $usuario->updateResetPasswordCode($key, $gEmail);
                }
            }
        }
    }
    catch(Exception $e)
    {
        echo $e;
    }




