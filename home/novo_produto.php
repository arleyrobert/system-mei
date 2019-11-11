<?php 
        session_start();
        include('header.php');
        include_once("conexao.php");
        $id = $_SESSION['usuarioId'];
        ?>

<html>


<body class="animsition">

    <div class="page-wrapper">

        <div class="card-header">
            <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
            
		}
		?>
        </div><br />
        <div class="page-content--bgf7">

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Cadastrar Produto/Serviço</strong>
                    </div>
                    <div class="card-body card-block">

                        <form method="POST" action="proc_novo_produto.php">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Nome do Produto/Serviço</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="nome" placeholder="Digite o nome do produto ou serviço" class="form-control">
                                    <small class="help-block form-text">Insira o nome do produto ou serviço</small>
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Valor</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="valor" placeholder="Valor" class="form-control">
                                    <small class="form-text text-muted">Insira o valor no formato 0.00</small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Descrição</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="descricao" id="textarea-input" rows="9" placeholder="Descrição sobre o produto ou serviço" class="form-control"></textarea>
                                </div>
                            </div>
                            <input type=hidden name="id_usuario" value="<?=$id?>">

                            <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">

                                <span id="payment-button-amount">Enviar</span>

                            </button>


                        </form>
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
