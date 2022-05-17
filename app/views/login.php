<body>

    <section class="vh-100" style="background-color: #CDC3DA; overflow: hidden;">

        <div class="row d-flex justify-content-center  align-items-center h-100">
            <div class="col col-xl-11 ">
                <div class="card " style="border-radius: 1rem 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none  d-md-block ">
                            <img src="<?php echo BASE_URL; ?>app/assets/fotos/modelo3.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width: 100%;" />
                        </div>

                        <div class="col-md-6 col-lg-7 d-flex  align-items-center">
                            <div class="card-body px-4 p-lg-5 text-black">

                                <!--      LOGIN      -->
                                <h1 class="fw-bold text-center p-2 m-2">LOGIN</h1>



                                <form id="login" action="<?php print BASE_URL; ?>Usuario/verificaLogin" method="POST">

                                    <div class="row py-3 ">
                                        <div class="col-12 col-md-8 pb-3 m-auto">
                                            <label for="usuario"></label>
                                            <input type="text" class="form-control " id="usuario" placeholder="Correo electrónico" name="usuario" required>
                                        </div>

                                        <div class="col-12 col-md-8 pb-3 m-auto">
                                            <label for="clave"></label>
                                            <input type="password" class="form-control" id="clave" placeholder="Contraseña" name="clave" required>
                                        </div>
                                        <div class="row p-5 m-2">

                                            <div class="form-group pt-4 m-auto col-md-4">
                                                <input type="submit" class="btn btn-dark btn-lg btn-block  " value="Entrar"><br>
                                                <div class="pb-lg-2 p-2">
                                                    <input type="checkbox" name="recordar">
                                                    <label for="recordar" class="small text-muted py-2">Recordar</label>
                                                </div>
                                            </div>
                                            <div class="pb-lg-2 my-2 col-md-6">
                                                <a class="small text-muted " href="<?php print BASE_URL; ?>Usuario/olvido">¿Has olvidado tu contraseña?</a>

                                                <p class=" small text-muted pb-lg-2 my-2" style="color: #393f81;">¿No tienes cuenta?
                                                    <a class="big text-muted my-2" href="<?php print BASE_URL; ?>Usuario/registro">Darse de alta </a>
                                                </p>
                                                <p class=" small text-muted pb-lg-2 my-2" style="color: #393f81;">¿No quieres loguearte? <a href="<?php print BASE_URL; ?>Inicio/index" style="color: #393f81;">Volver</a></p>
                                            </div>


                                        </div>


                                </form>
                                <div class="row">
                                    <?php
                                    if (isset($msg)) { ?>

                                        <div class='alert alert-<?php echo $msg_type; ?>  text-center mb-0'>

                                            <strong>* <?php echo $msg; ?> </strong><br>

                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- FIN ROW -->



            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


</body>

</html>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#login').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '<?php BASE_URL; ?>Inicio/verificaLogin',
                data: $(this).serialize(),
                success: function(response) {
                    var jsonData = JSON.parse(response);
                    console.log(jsonData);
                    if (jsonData.success == "1") {
                        location.href = 'my_profile.php';
                    } else {
                        alert('Invalid Credentials!');
                    }
                }
            });
        });
    });
</script> -->