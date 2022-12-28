    <header id="marca">
        <div class="tienda">

            <div class="sitio_logo mb-3">
                <img src="<?php echo BASE_URL; ?>app/assets/img/<?php echo $marcas['foto']; ?>" alt="">
            </div>
            <!-- TODO-> revisar estilos -->
            <div class="sitio">
                <h1><?php echo $marcas['nombre']; ?></h1>
                <div class="sitio_cuerpo">
                    <p>
                    <h5>Descripción:</h5> 
                    <span class="descrip">
                        <?php echo $marcas['descripcion']; ?>
                        </span>
                    </p>
                    <p>
                        <a href="<?php echo $marcas['web']; ?>"><?php echo $marcas['web']; ?></a>
                    </p>

                </div>
                <a class="btn btn-dark btn-lg btn-block " type="button" href="<?php echo BASE_URL; ?>Inicio/index">Volver</a>
            </div>

        </div>
    </header>