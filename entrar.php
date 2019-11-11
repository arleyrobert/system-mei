<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acesso | System MEI</title>
    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php include('header.php');?>
    <br /><br /><br />
    <br />
    <div class="top-content">
        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">

                        <div class="description">
                            <p>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Login</h3>
                                <p>Insira seus dados:</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-key"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="valida.php" method="post" class="login-form">


                                <div class="form-group">
                                    <label class="sr-only" for="form-username">E-mail:</label>
                                    <input type="email" name="txt_usuario" placeholder="E-mail..." class="single-input" id="form-username" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Senha:</label>
                                    <input type="password" name="txt_senha" placeholder="Senha..." class="single-input" id="form-password" required>
                                </div>
                                <button type="submit" class="btn" name="login">Entrar</button>
                                <p class="text-center text-danger">
                                    <?php if(isset($_SESSION['loginErro'])){
				echo $_SESSION['loginErro'];
				unset ($_SESSION['loginErro']);
			}?>
                                </p>
                                <p class="text-center text-success">
                                    <?php if(isset($_SESSION['loginDeslogado'])){
				echo $_SESSION['loginDeslogado'];
				unset ($_SESSION['loginDeslogado']);
			}?>

                                    <?php
			if(isset($_SESSION['msgcad'])){
				echo $_SESSION['msgcad'];
				unset($_SESSION['msgcad']);
			}
		?>
                                </p>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
