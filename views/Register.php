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
        <link rel="stylesheet"  href="views/css/bootstrap.min.css">
    </head>
    <style>
        body{
            background-color: #15152b;
			font-size: 1.0rem;
        }
        .card{
            margin: 0 auto;
            width: 40%;
            height: 650px;
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
    <head>
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

            <?php
                if(isset($_GET['page'])){
                    if($_GET['page'] == 4)
                    {
                        $key = "";

                        if(isset($_GET['key']))
                        {
                            $key = $_GET['key'];
                        }

                        require_once('formResetPassword.php');
                    }
                }
            ?>

			<div id="main">
			</div>
		</div>

        <footer class="text-muted">
            <div class="container">
                <p>Copyright - NOME DO SERVIDOR 2020</p>
            </div>
        </footer>
		<script src="views/js/jquery-3.5.1.min.js"></script>
        <script src="views/js/bootstrap.min.js"></script>
		<script src="views/js/forms.js"></script>
		
    </body>
</html>