<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <style>

        #frmLogin{
            margin-top: 180px;
            padding: 10%;

        }

        #frmLogin .input-group{
            margin-top: 20px;
            margin-bottom: 20px;
        }

        footer{
            padding: 15px;
            color: #c6c8ca;
        }

        .btn{
            margin-top: 15px;
        }

        .nav-link{
            color: #c6c8ca;
        }
    </style>
</head>
<body>

<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="../index.php">NOME DO SERVIDOR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Server
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Rank</a>
                            <a class="dropdown-item" href="#">Banned Page</a>
                        </div>
                    </li>

                </ul>
                <div class="form-inline my-2 my-lg-0">

                    <a class="nav-link" href="#">LOGIN</a>
                    <a class="nav-link" href="#">REGISTER</a>

                </div>
            </div>
        </nav>
    </div>
</div>

<div class="row justify-content-center ">

    <div class="col-8">
        <form class="bg-dark" id="frmLogin">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-user-o"></i>
                    </div>
                </div>
                <input	name="username" type="text" class="form-control" placeholder="Enter your username">
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-key"></i>
                    </div>
                </div>
                <input	name="password" type="text" class="form-control" placeholder="Enter your password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

            <button class="btn btn-success" href="">Register</button>

            <button class="btn btn-danger">Forgot Password</button>
        </form>
    </div>

</div>


<div class="row fixed-bottom">
    <div class="col-md-12">
        <footer class="bg-dark">
            <strong class="text-center">
                <p>Game : <span><strong>ONLINE</strong></span></p>
                <p>Copyright &copy; 2020, <a href="#" target="_blank" class="label label-danger"><strong>Nome do servidor</strong></a></p>
            </strong>
        </footer>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
