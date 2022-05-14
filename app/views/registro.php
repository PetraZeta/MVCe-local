<body>
    <!-- TODo -> hacer que el simbolo sea la cruz y asociar un evento para que con un click vuelva al index  -->
    <div class="abrirSidebarMenu">
        <div class="spinner diagonal-1"></div>
        <div class="spinner horizontal"></div>
        <div class="spinner diagonal-2"></div>
    </div>
    <section class="vh-100" style="background-color: #CDC3DA; overflow: hidden;">

        <div class="row d-flex justify-content-center  align-items-center h-100">
            <div class="col col-xl-11 ">

                <div class="card " style="border-radius: 1rem 0 0 1rem;">
                    <div class="row g-0">

                        <div class="col-md-5 col-lg-4 d-none  d-md-block">
                            <img src="<?php echo BASE_URL; ?>app/assets/fotos/modelo2.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width: 100%;" />
                        </div>
                        <div class="col-md-7 col-lg-8 d-flex  align-items-center">
                            <div class="card-body p-lg-3 text-black">

                                <!-- fin header plantilla  (solo cambia la foto de la izquierda)-->
                                
                                
                                
                                <!-- MENSAJES DE ERROR TODO-> mejorar para que sirva para php y js-->
                                <?php
                                if (isset($error)) {

                                    echo "<div class='alert alert-danger text-center '>";

                                    echo "<strong>* " . $error . "</strong><br>";

                                    echo "</div>";
                                }
                                if (isset($ok)) {

                                    echo "<div class='alert alert-success text-center '>";

                                    echo "<strong>* " . $ok . "</strong><br>";

                                    echo "</div>";
                                }
                                ?>
                                <!-- TODO----configurar mensaje de error/success -->
                                <div class="alert alert-success text-center mx-5 ok" style="display:none;">
                                    <strong>* has seleccionado todos los avisos </strong>
                                </div>



                                <!-- REGISTRO -->

                                <form action="<?php echo BASE_URL; ?>Inicio/agregarUsuario" method="POST" name="frmRegistro">
                                    <legend>
                                        <h1 class="fw-bold text-center py-2">REGISTRO</h1>
                                    </legend>
                                    <div class="row py-3 m-3">

                                        <div class="col-12 col-md-6 pb-3 ">
                                            <input type="text" class="form-control" id="nombre" placeholder="NOMBRE" name="nombre" required autofocus>
                                        </div>

                                        <div class="col-12 col-md-6 pb-3">
                                            <input type="password" class="form-control" id="clave" placeholder="CONTRASEÑA" name="clave" required>
                                        </div>

                                        <div class="col-12 col-md-6 pb-3">
                                            <input type="text" class="form-control" id="e-mail" placeholder="E-MAIL" name="email" required>
                                        </div>

                                        <div class="col-12 col-md-6 pb-3">
                                            <input type="password" class="form-control" id="clave1" placeholder="CONFIRMA CONTRASEÑA" name="clavebis" required>
                                        </div>

                                    </div>


                                    <div class="form-check mx-5 my-3">
                                        <input class="form-check-input" type="checkbox" id="recibirCorreo">
                                        <label class="form-check-label text-muted" for="correo">Deseas recibir correos al e-mail?</label>
                                        <p class="small text-muted mt-1">(Info sobre nuevos productos, ofertas y promociones)</p>

                                    </div>

                                    <hr class="my-3 mx-5">
                                    <div id="preferencias">

                                        <div class="form-check mb-3 mx-5">
                                            <input class="form-check-input" type="checkbox" id="novedades" name="novedades">
                                            <label class="form-check-label text-muted" for="novedades">Deseas recibir correo sobre novedades?</label>


                                        </div>
                                        <div class="form-check mb-3 mx-5">
                                            <input class="form-check-input" type="checkbox" id="ofertas" name="ofertas">
                                            <label class="form-check-label text-muted" for="ofertas">Deseas recibir correos sobre ofertas?</label>
                                        </div>
                                        <div class="form-check mb-3 mx-5">
                                            <input class="form-check-input" type="checkbox" id="descuentos" name="descuentos">
                                            <label class="form-check-label text-muted" for="descuentos">Deseas recibir correos sobre descuentos?</label>
                                        </div>


                                    </div>


                                    <div class="pt-1 mt-4 row mx-5 ">
                                        <div class="col-6 pt-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Registro</button>
                                        </div>
                                        <div class="col-6">
                                            <p class="pt-2" style="color: #393f81;">No quieres registrarte? <a href="<?php echo BASE_URL; ?>Inicio/index" style=" color: #393f81;">Salir</a> <br>
                                                <a href="#!" class="small text-muted">Terminos de uso. <br></a>
                                                <a href="#!" class="small text-muted">Politica de Privacidad.</a>
                                            </p>

                                        </div>
                                    </div>
                                </form>
                                <!--FIN REGISTRo -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        //hacer que si el checkbox primero esta seleccionado, se seleccionen los demas y al contrario
        $("#preferencias input[type='checkbox']").click(function() {
            //cant de cajas seleccionadas y cant de cajas totales
            const cant = $("#preferencias input[type='checkbox']:checked").length;
            const cantSelec = $("#preferencias input[type='checkbox']").length;

            if (cantSelec == cant) {
                //si se seleccionan todos los check de preferencias, poner el primero a check y mostrar mensaje al usuario
                $('#recibirCorreo').prop("checked", true);

                $('.ok').show();
            } else {
                $('#recibirCorreo').prop("checked", false);
                $('.ok').hide();
            }
        });
        $('#recibirCorreo').click(function() {
            const isSelect = $('#recibirCorreo').length;
            console.log(isSelect);
            if (isSelect == 1) {
                $("#preferencias input[type='checkbox']").prop('checked', true);
            } else {
                $("#preferencias input[type='checkbox']").prop('checked', false);
            }
        });
        //recoger datos del registro y enviar por ajax a la funcion del controlador
        $(document.frmRegistro).on("submit", function(e) {
            /*  TODO---> verificar que las claves son iguales */
        });
    </script>


</body>

</html>