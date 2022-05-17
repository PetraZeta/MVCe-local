    <header>
        <!--   icono de menu que se convertira en aspa para cerrar el menu -->
        <!--         <div class="abrirSidebarMenu">

            <div class="spinner diagonal-1"></div>
            <div class="spinner horizontal"></div>
            <div class="spinner diagonal-2"></div>
        </div> -->
        <div class="tienda">

            <div class="sitio_logo">
                <img src="<?php echo BASE_URL; ?>app/assets/img/<?php echo $marcas['foto']; ?>" alt="">
            </div>
            <!-- TODO-> revisar estilos -->
            <div class="sitio">
                <h1><?php echo $marcas['nombre']; ?></h1>
                <div class="sitio_cuerpo">
                    <p>
                    <p>
                    <h3>Descripción:</h3> <span class="descrip"><?php echo $marcas['descripcion']; ?></span></p>


                    </p>
                    <a href="<?php echo $marcas['web']; ?>"><?php echo $marcas['web']; ?></a>
                </div>
            </div>

        </div>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
    </header>