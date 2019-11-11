<?php 
        session_start();
        include('header.php');
        include_once("conexao.php");
        $id = $_SESSION['usuarioId'];

        $consulta="select * from produtos where id_usuario='$id'";
        $resultado=mysqli_query($conn, $consulta);

 
                       

?>

<html>


<body class="animsition">

    <div class="page-wrapper">


        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
            
		}
		?>

                    <h4>Agendamento de Caixa</h4>
                </div>
                <div class="card-body">
                    <div class="default-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Entrada</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Saída</a>

                            </div>
                        </nav>

                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">




                            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="card-body card-block">

                                    <form method="POST" action="proc_agenda_entrada.php">
                                        <div class="row-1 form-group">
                                            <div class="col col-md-10">
                                                <label for="text-input" class=" form-control-label">Nome:</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="nome" placeholder="Digite o nome do produto ou serviço" class="form-control">
                                                <small class="help-block form-text">Insira o nome do produto ou serviço</small>
                                            </div>
                                        </div>


                                        <div class="row-1 form-group">
                                            <div class="col col-md-10">
                                                <label for="text-input" class=" form-control-label">Valor:</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="valor" placeholder="Valor unitário" class="form-control">
                                                <small class="form-text text-muted">Insira o valor no formato 0.00</small>
                                            </div>
                                        </div>
                                        <div class="row-1 form-group">
                                            <div class="col-md-5 col-md-10">
                                                <label for="text-input" class=" form-control-label">Quantidade de itens:</label>
                                            </div>
                                            <div class="col-5 col-md-3">
                                                <input type="text" id="text-input" name="quantidade" placeholder="0" class="form-control">

                                            </div>
                                        </div>
                                        <div class="row-1 form-group">
                                            <div class="col col-md-10">
                                                <label for="text-input" class=" form-control-label">Data:</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="data" placeholder="Ano/mês/dia" class="form-control">

                                            </div>
                                        </div>
                                        <div class="row-1 form-group">


                                            <div class="row-1 form-group">
                                                <div class="col col-md-10">
                                                    <label for="textarea-input" class=" form-control-label">Descrição:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="descricao" id="textarea-input" rows="3" placeholder="Descrição sobre o produto ou serviço" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <input type=hidden name="id_usuario" value="<?=$id?>">

                                            <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">

                                                <span id="payment-button-amount">Enviar</span>

                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="card-body card-block">

                                    <form method="POST" action="proc_agenda_saida.php">
                                        <div class="row-1 form-group">
                                            <div class="col col-md-10">
                                                <label for="text-input" class=" form-control-label">Nome:</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="nome" placeholder="Digite o nome do produto ou serviço" class="form-control">
                                                <small class="help-block form-text">Insira o nome do produto ou serviço</small>
                                            </div>
                                        </div>


                                        <div class="row-1 form-group">
                                            <div class="col col-md-10">
                                                <label for="text-input" class=" form-control-label">Insira o valor</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="valor" placeholder="Valor unitário" class="form-control">
                                                <small class="form-text text-muted">Insira o valor no formato 0.00</small>
                                            </div>
                                        </div>
                                        <div class="row-1 form-group">
                                            <div class="col-md-5 col-md-10">
                                                <label for="text-input" class=" form-control-label">Quantidade de itens</label>
                                            </div>
                                            <div class="col-5 col-md-3">
                                                <input type="text" id="text-input" name="quantidade" placeholder="0" class="form-control">

                                            </div>
                                        </div>

                                        <div class="row-1 form-group">
                                            <div class="col col-md-10">
                                                <label for="text-input" class=" form-control-label">Data:</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="text-input" name="data" placeholder="Ano/mês/dia" class="form-control">

                                            </div>
                                        </div>

                                        <div class="row-1 form-group">
                                            <div class="col col-md-10">
                                                <label for="textarea-input" class=" form-control-label">Descrição</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="descricao" id="textarea-input" rows="3" placeholder="Descrição sobre o produto ou serviço" class="form-control"></textarea>
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
