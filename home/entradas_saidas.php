<?php 
session_start();
include('header.php');
include('conexao.php');

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
                        <div class="row">
                            <div class="col-lg-12">
                                <br>
                            </div>
                        </div>
                        <h2 class="page-header2">
                            Entradas & Saídas
                        </h2><br />
                        <a button type="button" class="btn btn-success btn-lg" href="fluxo.php?id=<?=$id?>">Novo Fluxo de Caixa</a>
                        <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}?>
                        <br>


                        <div class="main-content">

                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="default-tab">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Entradas</a>
                                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Saidas</a>

                                                </div>
                                            </nav>
                                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">


                                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">



                                                    <div class="table-responsive table--no-card m-b-30">
                                                        <table class="table table-borderless table-striped table-earning">



                                                            <tr>

                                                                <td><strong>Nome</strong></td>
                                                                <td><strong>Valor</strong></td>
                                                                <td><strong>Descrição</strong></td>
                                                                <td><strong>Quantidade</strong></td>
                                                                <td><strong>Data</strong></td>
                                                                <td><strong>Ações</strong></td>
                                                                <td></td>
                                                            </tr>


                                                            <?php
       $id_user = $_SESSION['usuarioId'];

       // $id = filter_input(INPUT_GET, 'id_categoria', FILTER_SANITIZE_NUMBER_INT);
       // $result_usuario = "select * from entradas join produtos on entradas.id_produto=produtos.id where produtos.id_usuario='$id_user'";
        //$result_usuario="select * from entradas, produtos where  entradas.id_produto= null";
                 $result_usuario= "SELECT * from entradas where id_usuario='$id_user' and data<=NOW()";
                                        
                                        
		$resultado_usuario = mysqli_query($conn, $result_usuario);
                 
		while($dados = mysqli_fetch_assoc($resultado_usuario)){
                 
          
            
            ?>



                                                            <tr>


                                                                <td><?php echo $dados['nome']; ?></td>
                                                                <td><?php echo $dados['valor']; ?> </td>
                                                                <td><?php echo $dados['descricao']; ?></td>
                                                                <td><?php echo $dados['quantidade']; ?></td>
                                                                <td><?php echo $dados['data']; ?></td>


                                                                <td>
                                                                    <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#staticModal<?php echo $dados['id_entradas']; ?>">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </button>
                                                                    <div class="modal fade" id="staticModal<?php echo $dados['id_entradas']; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
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
                                                                                    <a button type="button" class="btn btn-primary" href="apagar_entrada.php?id=<?php echo $dados['id_entradas']?>">Sim</a>
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


                                                <!-- aqui iniciam as saidas-->
                                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                    <div class="table-responsive table--no-card m-b-30">
                                                        <table class="table table-borderless table-striped table-earning">



                                                            <tr>

                                                                <td><strong>Nome</strong></td>
                                                                <td><strong>Valor</strong></td>
                                                                <td><strong>Descrição</strong></td>
                                                                <td><strong>Quantidade</strong></td>
                                                                <td><strong>Data</strong></td>
                                                                <td><strong>Ações</strong></td>
                                                                <td></td>
                                                            </tr>


                                                            <?php
       $id_user = $_SESSION['usuarioId'];

       // $id = filter_input(INPUT_GET, 'id_categoria', FILTER_SANITIZE_NUMBER_INT);
       // $result_usuario = "select * from entradas join produtos on entradas.id_produto=produtos.id where produtos.id_usuario='$id_user'";
        //$result_usuario="select * from entradas, produtos where  entradas.id_produto= null";
                 $result_usuario= "SELECT * FROM saidas WHERE saidas.id_usuario='$id_user'";
                                        
                                        
		$resultado_usuario = mysqli_query($conn, $result_usuario);
                 
		while($dados = mysqli_fetch_assoc($resultado_usuario)){
                 
          
            
            ?>



                                                            <tr>


                                                                <td><?php echo $dados['nome']; ?></td>
                                                                <td><?php echo $dados['valor']; ?> </td>
                                                                <td><?php echo $dados['descricao']; ?></td>
                                                                <td><?php echo $dados['quantidade']; ?></td>
                                                                <td><?php echo $dados['data']; ?></td>


                                                                <td>
                                                                    <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#staticModal<?php echo $dados['id_saidas']; ?>">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </button>
                                                                    <div class="modal fade" id="staticModal<?php echo $dados['id_saidas']; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
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
                                                                                    <a button type="button" class="btn btn-primary" href="apagar_saida.php?id=<?php echo $dados['id_saidas']?>">Sim</a>
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
