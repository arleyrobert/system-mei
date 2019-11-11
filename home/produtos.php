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
                            Produtos & Serviços
                        </h2>

                        <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}?>


                        <div class="main-content">

                            <div class="container-fluid">
                                <a button type="button" class="btn btn-success btn-lg" href="novo_produto.php?id=<?=$id?>">Novo Produto ou Serviço</a><br />
                                <div class="row">
                                    <div class="col-lg-11">
                                        <div class="table-responsive table--no-card m-b-30">
                                            <table class="table table-borderless table-striped table-earning">


                                                <tr>

                                                    <td><strong>Nome</strong></td>
                                                    <td><strong>Valor</strong></td>
                                                    <td><strong>Descrição</strong></td>
                                                    <td><strong>Ações</strong></td>
                                                    <td></td>
                                                </tr>


                                                <?php
      

       // $id = filter_input(INPUT_GET, 'id_categoria', FILTER_SANITIZE_NUMBER_INT);
        $result_usuario = "select distinct * from produtos where id_usuario='$id_user'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
                 
		while($dados = mysqli_fetch_assoc($resultado_usuario)){
                 
          
            
            ?>





                                                <tr>



                                                    <td><?php echo $dados['nome']; ?></td>
                                                    <td><?php echo $dados['valor']; ?></td>
                                                    <td><?php echo $dados['descricao']; ?></td>
                                                    <td><?php echo $dados['id']; ?></td>


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
                                                                        <a button type="button" class="btn btn-primary" href="apagar_produto.php?id=<?php echo $dados['id']; ?>">Sim</a>
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
