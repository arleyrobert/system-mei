<!DOCTYPE html>
<html>

<body>


    <!--TA PROCURANDO O QUE VACILÃO?-->

    <?php include('header.php'); ?>

    <!--::banner part start::-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col-lg-8">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Fácil e organizado</h1>
                            <p>System MEI é uma maneira fácil e organizada para a gestão
                                financeira dos microempreendedores
                                individuais.</p>
                            <a href="cadastro.php" class="btn_2">CADASTRE-SE GRÁTIS</a>
                            <a href="entrar.php" class="d-lg-none d-md-none d-sm-none btn_2">ENTRAR</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--::banner part start::-->




    <?php include('menu.php'); ?>

    <!-- rodapé do site -->
    <?php include('footer.php'); ?>

    <script>
        function typeWriter(elemento) {
            const textoArray = elemento.innerHTML.split('');
            elemento.innerHTML = '';
            textoArray.forEach((letra, i) => {
                setTimeout(() => elemento.innerHTML += letra, 75 * i);
            });
        }

        // Se estiver tendo problemas com performance, utilize o FOR loop como abaixo no local do forEach
        // function typeWriter(elemento) {
        //   const textoArray = elemento.innerHTML.split('');
        //   elemento.innerHTML = '';
        //   for(let i = 0; i < textoArray.length; i++) {
        //     setTimeout(() => elemento.innerHTML += textoArray[i], 75 * i);
        //   }
        // }

        const titulo = document.querySelector('h2');
        typeWriter(titulo);

    </script>
</body>

</html>
