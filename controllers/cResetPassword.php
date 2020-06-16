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

    if(!isset($_GET['key']) && !isset($_POST['password']) && !isset($_POST['cPassword']) && !isset($_POST['captcha']))
    {
        $msg = "Operação inválida!";
        header("Location: ../index.php?page=4&msg=$msg");
        return false;
    }


    $validacao = new Validacao;
    $usuario = new Usuario;

    $key = $usuario->anti_injection($_GET["key"]);
    $password = $usuario->anti_injection($_POST['password']);
    $cPassword = $usuario->anti_injection($_POST['cPassword']);

    $usuario->setPassword($password);
    $usuario->setcPassword($cPassword);

    $gPassword = $usuario->getPassword();
    $gcPassword = $usuario->getcPassword();

    $captcha = $usuario->anti_injection($_POST["captcha"]);
    $result = $usuario->anti_injection($_POST["captchaResult"]);

    if($validacao->validarSenha($gPassword, $gcPassword, 4, $key)){
        if($validacao->validarCapatcha($captcha, $result, 4, $key)) {
            if($validacao->validarKey($key)){
                if ($usuario->verificarKey($key)) {
                    $usuario->updatePassword($gPassword, $key);
                }
            }
        }
    }





