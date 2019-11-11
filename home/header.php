<?php
include_once("conexao.php");
$id = $_SESSION['usuarioId'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard - System MEI</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block" style="background-color:#562fc7">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="home.php?id=<?=$id?>">
                            <img src="images/icon/logo-white.png" alt="logo" />
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li>
                                <a href="home.php?id=<?=$id?>"><i class="fas fa-home"></i>Início</a>
                            </li>
                            <li>
                                <a href="produtos.php?id=<?=$id?>">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span class="bot-line"></span>Produtos & Serviços</a>
                            </li>
                            <li>
                                <a href="relatorios.php?id=<?=$id?>">
                                    <i class="far fa-clipboard"></i>
                                    <span class="bot-line"></span>Relatórios</a>
                            </li>


                            <li>
                                <a href="entradas_saidas.php?id=<?=$id?>">
                                    <i class="far fa-clone"></i>
                                    <span class="bot-line"></span>Entradas & Saídas</a>

                            </li>
                            <li>
                                <a href="agendamentos.php?id=<?=$id?>">
                                    <i class="far fa-calendar-check"></i>
                                    <span class="bot-line"></span>Agendamentos</a>

                            </li>
                        </ul>
                    </div>
                    <div class="header__tool">


                        <?php
                              
                                $result_usuario = "select * from usuarios where id='$id'";
                                $resultado_usuario = mysqli_query($conn, $result_usuario);
                                $dados = mysqli_fetch_assoc($resultado_usuario);
                                
                           ?>


                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="images/icon/avatar-01.jpg" alt="avatar" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?php echo $dados['nome']; ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="images/icon/avatar-01.jpg" alt="avatar" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?php echo $dados['nome']; ?></a>
                                            </h5>
                                            <span class="email"><?php echo $dados['email']; ?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">

                                        <div class="account-dropdown__item">
                                            <a href="configuracoes.php?id=<?=$id?>">
                                                <i class="zmdi zmdi-settings"></i>Configurações</a>
                                        </div>

                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="sair.php?id=<?=$id?>">
                                            <i class="zmdi zmdi-power"></i>Sair</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none" style="background-color:#562fc7">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="home.php?id=<?=$id?>">
                            <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">

                        <li>
                            <a href="produtos.php?id=<?=$id?>">
                                <i class="fas fa-chart-bar"></i>Produtos & Serviços</a>
                        </li>
                        <li>
                            <a href="relatorios.php?id=<?=$id?>">
                                <i class="fas fa-table"></i>Relatórios</a>
                        </li>
                        <li>
                            <a href="entradas_saidas.php?id=<?=$id?>">
                                <i class="far fa-check-square"></i>Entradas & Saídas</a>
                        </li>
                        <li>
                            <a href="agendamentos.php?id=<?=$id?>">
                                <i class="fas fa-calendar-alt"></i>Agendamentos</a>
                        </li>



                    </ul>
                </div>
            </nav>
        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">


                <div class="account-wrap">

                    <div class="account-item account-item--style2 clearfix js-item-menu">

                        <div class="image">
                            <img src="images/icon/avatar-01.jpg" alt="avatar" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#"><?php echo $dados['nome']; ?></a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="images/icon/avatar-01.jpg" alt="avatar" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#"><?php echo $dados['nome']; ?></a>
                                    </h5>
                                    <span class="email"><?php echo $dados['email']; ?></span>
                                </div>
                            </div>
                            <div class="account-dropdown__body">

                                <div class="account-dropdown__item">
                                    <a href="configuracoes.php?id=<?=$id?>">
                                        <i class="zmdi zmdi-settings"></i>Configurações</a>
                                </div>

                            </div>
                            <div class="account-dropdown__footer">
                                <a href="sair.php?id=<?=$id?>">
                                    <i class="zmdi zmdi-power"></i>Sair</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END HEADER MOBILE -->
</body>

</html>
