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
                            Relatórios
                        </h2>

                        <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}?>


                        <div class="main-content">

                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="default-tab">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Total de Entradas</a>
                                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Total de Saídas</a>
                                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Total de Hoje</a>

                                                </div>
                                            </nav>
                                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">


                                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">



                                                    <div class="table-responsive table--no-card m-b-30">
                                                        <table class="table table-borderless table-striped table-earning">


                                                            <tr>

                                                                <td><strong>Tipo</strong></td>
                                                                <td><strong>Valor</strong></td>
                                                                <td><strong>Quantidade</strong></td>
                                                                <td><strong>Mês</strong></td>

                                                                <td></td>
                                                            </tr>


                                                            <?php
      
             $mes_atual = date("m");

//$sql = mysql_query("SELECT * FROM tabela where MONTH(data) = '$mes_atual'");
       // $id = filter_input(INPUT_GET, 'id_categoria', FILTER_SANITIZE_NUMBER_INT);
        
		
                                        
                                        
                                        
         $result_usuario = "select nome, sum(valor*quantidade) as total_entradas, descricao,MONTHNAME(data) as data, sum(quantidade) as quantidade, id_entradas as id from entradas  where id_usuario='$id_user' group by MONTH(data)";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
                 
		while($dados = mysqli_fetch_assoc($resultado_usuario)){
                 
          
            
            ?>





                                                            <tr>



                                                                <td><?php echo "Entradas" ?></td>
                                                                <td><?php echo "R$ ".$dados['total_entradas']; ?></td>
                                                                <td><?php echo $dados['quantidade']; ?></td>
                                                                <td><?php echo $dados['data']; ?></td>

                                                                <?php } ?>


                                                                <td></td>
                                                            </tr>
                                                        </table>

                                                    </div>
                                                </div>



                                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                    <div class="table-responsive table--no-card m-b-30">
                                                        <table class="table table-borderless table-striped table-earning">

                                                            <tr>

                                                                <td><strong>Tipo</strong></td>
                                                                <td><strong>Valor</strong></td>
                                                                <td><strong>Quantidade</strong></td>
                                                                <td><strong>Mês</strong></td>

                                                                <td></td>
                                                            </tr>

                                                            <?php
                $query = "select nome, sum(valor*quantidade) as total_saidas, descricao,MONTHNAME(data) as data,sum(quantidade) as quantidade, id_saidas as id from saidas where id_usuario='$id_user' group by MONTH(data) ";
		          $query2 = mysqli_query($conn, $query);
                 
                    while($saidas = mysqli_fetch_assoc($query2)){?>
                                                            <tr>
                                                                <td><?php echo "Saídas" ?></td>
                                                                <td><?php echo "R$ ".$saidas['total_saidas']; ?></td>
                                                                <td><?php echo $saidas['quantidade']; ?></td>
                                                                <td><?php echo $saidas['data']; ?></td>

                                                                <?php  }?>
                                                            </tr>



                                                        </table>



                                                        <br>

                                                    </div>

                                                </div>
                                                <!-- Hoje -->
                                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                    <div class="table-responsive table--no-card m-b-30">
                                                        <table class="table table-borderless table-striped table-earning">


                                                            <tr>

                                                                <td><strong>Tipo</strong></td>
                                                                <td><strong>Valor</strong></td>
                                                                <td><strong>Quantidade</strong></td>
                                                                <td><strong>Data</strong></td>

                                                                <td></td>



                                                            </tr>
                                                            <!--Total entradas-->

                                                            <?php
                $hoje = date("d");
                $query = "select nome, sum(valor*quantidade) as total_entradas, descricao,data,sum(quantidade) as quantidade, id_entradas as id from entradas where id_usuario='$id_user' and DATE_FORMAT(data, '%Y-%m-%d')= CURDATE()";
		          $query2 = mysqli_query($conn, $query);
                                        
                 
                    while($entradas = mysqli_fetch_assoc($query2)){?>
                                                            <tr>
                                                                <td><?php if(!empty($entradas['total_entradas'])){ echo "Entradas"; ?></td>
                                                                <td><?php echo "R$ ".$entradas['total_entradas']; ?></td>
                                                                <td><?php echo $entradas['quantidade']; ?></td>
                                                                <td><?php echo $entradas['data']; ?></td>

                                                                <?php  }}?>
                                                            </tr>




                                                            <!-- total saidas -->
                                                            <?php
                $hoje = date("d");
                $query = "select nome, sum(valor*quantidade) as total_saidas, descricao,data,sum(quantidade) as quantidade, id_saidas as id from saidas where id_usuario='$id_user' and DATE_FORMAT(data, '%Y-%m-%d')= CURDATE()";
		          $query2 = mysqli_query($conn, $query);
                 
                    while($saidas = mysqli_fetch_assoc($query2)){?>
                                                            <tr>
                                                                <td><?php if(!empty($saidas['total_saidas'])){ echo "Saídas"; ?></td>
                                                                <td><?php echo "R$ ".$saidas['total_saidas']; ?></td>
                                                                <td><?php echo $saidas['quantidade']; ?></td>
                                                                <td><?php echo $saidas['data']; ?></td>

                                                                <?php  }}?>
                                                                <td></td>
                                                            </tr>

                                                            <?php $query = "select nome, sum(valor*quantidade) as total_entradas, descricao,data,sum(quantidade) as quantidade, id_entradas as id from entradas where id_usuario='$id_user' and DATE_FORMAT(data, '%Y-%m-%d')= CURDATE()";
		          $query2 = mysqli_query($conn, $query);
                                        
                 
                    $entradas = mysqli_fetch_assoc($query2) ?>

                                                            <?php
                $hoje = date("d");
                $query = "select nome, sum(valor*quantidade) as total_saidas, descricao,data,sum(quantidade) as quantidade, id_saidas as id from saidas where id_usuario='$id_user' and DATE_FORMAT(data, '%Y-%m-%d')= CURDATE()";
		          $query2 = mysqli_query($conn, $query);
                 
                    $saidas = mysqli_fetch_assoc($query2);
                                        $saldo = $entradas['total_entradas']- $saidas['total_saidas'];
                                        ?>

                                                            <tr>
                                                                <td><strong>Saldo</strong></td>
                                                                <td><?php if($saldo<0){echo "<p style='color:red;'>R$ " .$saldo."</p>";}else{echo "<p style='color:green;'>R$ " .$saldo."</p>";}?></td>
                                                            </tr>



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
