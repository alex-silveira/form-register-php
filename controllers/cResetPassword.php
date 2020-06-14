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

    if(!isset($_GET['key']))
    {
        $msg = "Operação inválida!";
        header("Location: ../index.php?msg=$msg");
        return false;
    }

    $validacao = new Validacao;
    $usuario = new Usuario;

    $key = $usuario->anti_injection($_GET["key"]);
    $password = $usuario->anti_injection($_POST['password']);
    $cPassword = $usuario->anti_injection($_POST['cPassword']);

    $usuario->setPassword($password);
    $usuario->setcPassword($cPassword);

    $gPassword = $usuario->getPassword($password);
    $gcPassword = $usuario->getcPassword($cPassword);

    if($validacao->validarSenha($gPassword, $gcPassword)){
        if($usuario->verificarKey($key)){
            $usuario->updatePassword($gPassword, $key);
        }
    }





