<section class="vh-100" style="background-color: #CDC3DA; overflow: hidden;">

    <div class="row d-flex justify-content-center  align-items-center h-100">
        <div class="col-11 col-xl-9 ">

            <div class="card " style="border-radius: 1rem 0 0 1rem;">
                <div class="row g-0">

                    <div class="col-md-5 col-lg-4 d-sm-none d-md-none d-lg-block d-none">
                        <img src="<?php echo BASE_URL; ?>app/assets/fotos/modelo2.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; width: 100%;" />
                    </div>
                    <div class="col-md-12 col-lg-8 d-flex  align-items-center">
                        <div class="card-body p-lg-3 text-black">

                            <!-- REGISTRO -->

                            <form action="<?php echo BASE_URL; ?>Usuario/agregarUsuario" method="POST" name="frmRegistro" id="frmRegistro" autocomplete="off"
                            >
                                <legend>
                                   <!--  <h1 class="fw-bold text-center py-2">REGISTRO</h1> -->
                                </legend>
                                <div class="row py-3 m-3">

                                    <div class="col-12 col-md-6 pb-3 ">
                                        <input type="text" class="form-control" id="nombre" placeholder="NOMBRE" name="nombre" maxlength="20" required autofocus>
                                    </div>

                                    <div class="col-12 col-md-6 pb-3">
                                        <input type="password" class="form-control" id="clave" placeholder="CONTRASEÑA" name="clave" minlength="5" maxlength="20" required>
                                    </div>

                                    <div class="col-12 col-md-6 pb-3">
                                        <input type="email" class="form-control" id="email" placeholder="E-MAIL" name="email" maxlength="50" required>
                                        <!--  div vacio para mostrar si esta o no en uso el email -->
                                        <div id="validaMail" class=" mt-2"></div>
                                    </div>

                                    <div class="col-12 col-md-6 pb-3">
                                        <input type="password" class="form-control" id="rclave" placeholder="CONFIRMA CONTRASEÑA" name="rclave" minlength="5" maxlength="20" required>

                                        <!--  div vacio para mostrar si la pass es o no igual -->
                                        <p id="validaPass" class=" mt-2"></p>
                                    </div>



                                </div>
                                <div class="row py-3 m-3">

                                    <div class="col-12 col-md-7 pb-3 ">

                                        <div class="form-check mx-5 my-3">
                                            <input class="form-check-input" type="checkbox" id="recibirCorreo">
                                            <label class="form-check-label fw-bold text-muted" for="correo">Deseas recibir correos al e-mail?</label>
                                            <p class="small text-muted mt-1">(Info sobre nuevos productos, ofertas y promociones)</p>

                                        </div>

                                        <hr class="my-3 mx-5">

                                        <div id="preferencias">

                                            <div class="form-check mb-3 mx-5">
                                                <input class="form-check-input" type="checkbox" id="novedades" name="novedades" value="0">
                                                <label class="form-check-label text-muted" for="novedades">Deseas recibir correo sobre novedades?</label>
                                            </div>

                                            <div class="form-check mb-3 mx-5">
                                                <input class="form-check-input" type="checkbox" id="ofertas" value="0" name="ofertas">
                                                <label class="form-check-label text-muted" for="ofertas">Deseas recibir correos sobre ofertas?</label>
                                            </div>

                                            <div class="form-check mb-3 mx-5">
                                                <input class="form-check-input" type="checkbox" id="descuentos" value="0" name="descuentos">
                                                <label class="form-check-label text-muted" for="descuentos">Deseas recibir correos sobre descuentos?</label>
                                            </div>

                                            <div class="alert alert-success text-center mx-5 ok" style="display:none;">
                                                <strong>* has seleccionado todos los avisos </strong>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5 pb-3 ">
                                        <div class="pt-1 mt-4 row mx-5 ">
                                            <div class="col-12 pt-4">
                                                <!--  <button class="btn btn-dark btn-lg btn-block" id="btnreg" onclick="registrar_ajax()">Registro</button> -->
                                                <button class="btn btn-dark btn-lg btn-block" id="btnreg" type="submit">Registro</button>
                                            </div>
                                            <div class="col-12">
                                                <a class="btn btn-dark btn-lg btn-block mt-3 " type="button" href="<?php echo BASE_URL; ?>Inicio/index">Volver</a> <br>
                                                <p class="pt-2" style="color: #393f81;">
                                                    ¿Ya tienes cuenta?
                                                    <a href="<?php echo BASE_URL; ?>Usuario/index" class="small text-muted">Logueate!</a>
                                                </p>

                                            </div>
                                        </div>
                                    </div>

                            </form>
                            <div id="resul">
                                <!--Aqui se pintara la respuesta de validar formulario (por ajax y jquery)  -->
                            </div>
                            <!--FIN REGISTRo -->
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
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?php echo BASE_URL; ?>app/views/registro.js"></script>


</body>

</html>