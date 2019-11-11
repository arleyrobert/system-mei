<?php 
session_start();
include('header.php');
include('conexao.php');  
$id = $_SESSION['usuarioId'];
?>
<html>




<body class="animsition">
    <div class="page-wrapper">

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->

            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <?php
                              
                                $result_usuario = "select * from usuarios where id='$id'";
                                $resultado_usuario = mysqli_query($conn, $result_usuario);
                                $dados = mysqli_fetch_assoc($resultado_usuario);
                                
                           ?>
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Bem vindo(a) de volta
                                <span><?php echo $dados['nome'];?>!</span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- STATISTIC-->
            <?php
                              
                                $result_usuario = "select sum(valor*quantidade) as entrada from entradas where id_usuario='$id' and data<NOW()";
                                $resultado_usuario = mysqli_query($conn, $result_usuario);
                                $dados = mysqli_fetch_assoc($resultado_usuario);
            
            
                                
                           ?>



            <?php
                              
                                $query = "select sum(valor*quantidade) as saida from saidas where id_usuario='$id' and data<NOW()";
                                $resultado = mysqli_query($conn, $query);
                                $result = mysqli_fetch_assoc($resultado);
                                
                           ?>


            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item">
                                <a class="btn btn-primary btn-lg btn-block" href="fluxo.php?id=<?=$id?>" role="button">
                                    Fluxo de Caixa</a>

                                <a class="btn btn-danger btn-lg btn-block" href="agenda.php?id=<?=$id?>" role="button">
                                    Agenda</a>
                                <a class="btn btn-success btn-lg btn-block" role="button" href="novo_produto.php?id=<?=$id?>">
                                    Novo Produto/Serviço</a>
                                <br />
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number">
                                    <font size="+13"><?php if(empty($dados['entrada'] or $result['saida'])){ echo "R$ 0.00";} else{ echo "R$ ";echo $dados['entrada']-$result['saida'];}?></font>
                                </h2>
                                <h2 class="desc">
                                    <font size="+10">Saldo</font>
                                </h2>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number"><?php if (empty($dados['entrada'])) { echo "R$ 0.00"; } else { echo "R$ ";echo $dados['entrada'];}?> </h2>
                                <span class="desc">Entrada</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number"><?php if (empty($result['saida'])) { echo "R$ 0.00"; } else { echo "R$ ";echo $result['saida'];}?> </h2>
                                <span class="desc">Saída</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <!-- STATISTIC CHART-->
            <section class="statistic-chart">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">informações</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <!-- CHART-->
                            <div class="statistic-chart-1">
                                <h3 class="title-3 m-b-30">Aviso</h3>

                                <div class="row">
                                    <div class="col">

                                        <img src="images/fox.png">

                                    </div>
                                    <div class="col">
                                        <br />
                                        <p><?php include('avisos.php');?></p>
                                    </div>
                                </div>



                            </div>

                            <!-- END CHART-->
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <!-- CHART-->
                            <div class="statistic-chart-1">
                                <h3 class="title-3 m-b-30">Dica</h3>

                                <div class="row">
                                    <div class="col">

                                        <img src="images/cat.png">

                                    </div>
                                    <div class="col">
                                        <br />
                                        <p><?php include('dicas.php'); ?></p>
                                    </div>
                                </div>



                            </div>

                            <!-- END -->
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <!-- CHART-->
                            <div class="statistic-chart-1">
                                <h3 class="title-3 m-b-30">Educacional</h3>

                                <div class="row">
                                    <div class="col">

                                        <img src="images/dog.png">

                                    </div>
                                    <div class="col">
                                        <br />
                                        <p><?php include('educacional.php'); ?></p>
                                    </div>
                                </div>



                            </div>

                            <!-- END CHART-->
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC CHART-->

            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>System MEI - 2019</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
