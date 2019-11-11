<?php 
session_start();
include('header.php');
include('conexao.php');
 $id_user = $_SESSION['usuarioId'];

?>

<html>

<head>

</head>

<body class="animsition">

    <div class="page-wrapper">

        <div class="card-header">
            <div class="page-content--bgf7">

                <div id="page-wrapper">
                    <div class="container-fluid">

                        <br>

                        <h2 class="page-header2">
                            Agendamentos
                        </h2>
                        <section class="statistic statistic2">
                            <div class="container">
                                <h4>De acordo com seus agendamentos, esse é o seu caixa futuro.</h4><br />
                                <div class="row">

                                    <?php
                              
                                $query2 = "select sum(valor*quantidade) as entrada from entradas where id_usuario='$id'";
                                $entradaquery = mysqli_query($conn, $query2);
                                $futuro = mysqli_fetch_assoc($entradaquery);
            
            
                                
                           ?>



                                    <?php
                              
                                $query = "select sum(valor*quantidade) as saida from saidas where id_usuario='$id'";
                                $resultado = mysqli_query($conn, $query);
                                $result = mysqli_fetch_assoc($resultado);
                                
                           ?>

                                    <div class="col-md-6 col-lg-3">
                                        <div class="statistic__item statistic__item--blue">
                                            <h2 class="number">
                                                <font size="+13"><?php if(empty($futuro['entrada'] or $result['saida'])){ echo "R$ 0.00";} else{ echo "R$ ";echo $futuro['entrada']-$result['saida'];}?></font>
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
                                            <h2 class="number"><?php if (empty($futuro['entrada'])) { echo "R$ 0.00"; } else { echo "R$ ";echo $futuro['entrada'];}?> </h2>
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
                        <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}?>


                        <div class="main-content">

                            <div class="container-fluid">
                                <a button type="button" class="btn btn-success btn-lg" href="agenda.php?id=<?=$id?>">Novo Agendamento</a><br />
                                <div class="row">
                                    <div class="col-lg-11">
                                        <div class="table-responsive table--no-card m-b-30">
                                            <table class="table table-borderless table-striped table-earning">


                                                <tr>

                                                    <td><strong>Nome</strong></td>
                                                    <td><strong>Valor</strong></td>
                                                    <td><strong>Descrição</strong></td>
                                                    <td><strong>Data</strong></td>
                                                    <td><strong>Ações</strong></td>
                                                    <td></td>
                                                </tr>


                                                <?php
      

       // $id = filter_input(INPUT_GET, 'id_categoria', FILTER_SANITIZE_NUMBER_INT);
        $result_usuario = "select nome, valor, descricao,data, id_entradas as id from entradas where id_usuario='$id_user' and data>NOW() UNION ALL select nome, valor, descricao,data, id_saidas as id from saidas where id_usuario='$id_user' and data>NOW()";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
                 
		while($dados = mysqli_fetch_assoc($resultado_usuario)){
                 
          
            
            ?>





                                                <tr>



                                                    <td><?php echo $dados['nome']; ?></td>
                                                    <td><?php echo $dados['valor']; ?></td>
                                                    <td><?php echo $dados['descricao']; ?></td>
                                                    <td><?php echo $dados['data']; ?></td>


                                                    <td>

                                                        <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#staticModal<?php echo $dados['id']; ?>">

                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                        <div class="modal fade" id="staticModal<?php echo $dados['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="staticModalLabel">Exclusão</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>
                                                                            Deseja realmente excluir esse item?
                                                                        </p>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                                                        <a button type="button" class="btn btn-primary" href="apagar_agendamento.php?id=<?php echo $dados['id']; ?>">Sim</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </td>
                                                    <td></td>
                                                </tr>

                                                <?php  } ?>

                                            </table>



                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
