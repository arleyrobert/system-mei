    <?php
    session_start();
    ob_start();

    $btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
    if($btnCadUsuario){
        include_once ("home/conexao.php");
        //$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $nome_usuario = $_POST['nome'];
        $senha_usuario = md5($_POST['senha']);
        $senhaConfirma  = md5($_POST['senha_confirma']);
        $email_usuario = $_POST['email'];
        $negocio = $_POST['negocio'];

        $result_usuario = "INSERT INTO usuarios(nome,senha,email, negocio, created) VALUES ('$nome_usuario','$senha_usuario','$email_usuario', '$negocio', NOW())";
        //var_dump($dados);
        //$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

        //$result_usuario = "INSERT INTO usuarios (nome, email, senha) VALUES (
        //				'" .$dados['nome']. "',
            //			'" .$dados['email']. "',
                //		'" .$dados['senha']. "',
                    //	)";
        $resultado_usario = mysqli_query($conn, $result_usuario);
        if(mysqli_insert_id($conn)){
            $_SESSION['msgcad'] = "Usuário cadastrado com sucesso!";
            header("Location: entrar.php");
        }else{
            $_SESSION['msg'] = "Erro ao cadastrar o usuário";
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>System MEI</title>
        <link rel="icon" href="img/favicon.png">
        <!-- Bootstrap CSS -->
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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <title>System MEI - Cadastrar</title>
    </head>

    <body class="bg-light">
        <header class="main_menu" style="background-color:#562fc7">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light ">
                            <a class="navbar-brand main_logo" href="index.php"> <img src="img/logo.png" alt="logo"> </a>
                            <a class="navbar-brand single_page_logo" href="index.php"> <img src="img/footer_logo.png" alt="logo"> </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="menu_icon"></span>
                            </button>

                            <div class="collapse.s navbar-collapse main-menu-item" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Início</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="sobre.php">Sobre nós</a>
                                    </li>

                                  
                                    <li class="nav-item">
                                        <a class="nav-link" href="contato.php">Contate-nos</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="entrar.php" class="d-none d-sm-block btn_2 home_page_btn">Entrar</a>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <br />
        <br /><br />

        <div class="container">
            <div class="py-5 text-center">
                <h2>Fórmulario de Cadastro</h2>
                <p class="lead">Tenha acesso aos serviços gratuitamente</p>
            </div>

            <div class="row">


                <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Informações</h4>
                    <form method="POST" action="">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control" placeholder="Digite o nome e o sobrenome"></div>
                        </div>
                        <div class="mb-3">
                            <label>E-mail</label>
                            <input type="text" name="email" class="form-control" placeholder="Digite o seu e-mail"><br><br>
                        </div>
                        <div class="mb-3">
                            <label>Negocio</label>
                            <input type="text" name="negocio" class="form-control" placeholder="Qual é o seu negocio?"><br><br>
                        </div>
                        <div class="mb-3">
                            <label>Senha</label>
                            <input type="password" name="senha" class="form-control" placeholder="Digite a senha"><br><br>
                        </div>
                        <div class="mb-3">
                            <label>Confirme sua senha</label>
                            <input type="password" name="senha_confirma" class="form-control" placeholder="Digite a senha novamente"><br><br>
                        </div>
                        <hr class="mb-4">
                        <input type="submit" name="btnCadUsuario" class="btn btn-success" value="Efetuar cadastro"><br><br>



                    </form>
                </div>
            </div>
        </div>
        <script src="js/custom.js"></script>
    </body>

    </html>
