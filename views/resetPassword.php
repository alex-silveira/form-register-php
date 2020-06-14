<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NOME DO SERVIDOR</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="css/bootstrap.min.css">
</head>
<style>
    body{
        background-color: #15152b;
        font-size: 1.0rem;
    }
    .card{
        margin: 0 auto;
        width: 40%;
        height: 565px;
        min-width: 300px;
    }
    form{
        padding: 20px;
    }
    #signup{
        width: 100%;
        height: 60px;
    }

    .jumbotron{
        height: 60px;
        background-color: #15152b;
        color: #fff;
    }

    .jumbotron div p a{
        width: 11rem;
    }
    footer{
        margin-top: 50px;
        text-align: center;
    }
    .alert{
        padding: 15px;
        margin: 5px;
    }
    #forgot{
        margin-top: 10px;
    }

    .btn{
        width: 100%;
    }
    #back{
        margin-top: 280px;
    }

</style>
<body>
<section class="jumbotron text-center">
    <div class="container">
        <!-- <h1 class="jumbotron-heading">NOME DO SERVIDOR</h1> -->
        <p>
            <a href="#" class="btn btn-primary my-2">Download</a>
            <a href="#" class="btn btn-secondary my-2">Site</a>
        </p>
    </div>
</section>

<div class="card">
    <?php

    $key = "";


    if(!isset($_GET['key']))
    {
        $msg = "Operação inválida!";
        header("Location: ../index.php?msg=$msg");
        return false;
    }

    if(isset($_GET['key']))
    {
        $key = $_GET['key'];
    }

    if(isset($_GET['msg'])){
        ?>
        <div class="alert alert-danger" role="alert">
            <?php
                echo $_GET['msg'];
            ?>
        </div>
        <?php
    }
    ?>

    <form method="post" action="http://hero.com.br:82/controllers/cResetPassword.php?key=<?php echo $key ?>">

        <div class="form-group">
            <label>Senha *</label>
            <input type="password" name="password" class="form-control" placeholder="Insira sua nova senha" required>
        </div>

        <div class="form-group">
            <label>Repita a senha *</label>
            <input type="password" name="cPassword" class="form-control" placeholder="Confirme sua senha" required>
        </div>

        <div class="row" id="button">
            <div class="col-12">
                <button id="signup" type="submit" class="btn btn-success my-2">Enviar</button>
            </div>
        </div>

    </form>

    <div id="main">
    </div>
</div>

<footer class="text-muted">
    <div class="container">
        <p>Copyright - NOME DO SERVIDOR 2020</p>
    </div>
</footer>

<script src="js/bootstrap.min.js"></script>

</body>
</html>