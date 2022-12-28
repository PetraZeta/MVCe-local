    <header id="tienda">

        <div class="tienda">

            <div class="sitio_logo mb-3">
                <img src="<?php echo BASE_URL; ?>app/assets/img/<?php echo $tiendas['logo']; ?>" alt="">
            </div>
            
            <div class="sitio my-3">
                <h1><?php echo $tiendas['nombre']; ?></h1>
                <div class="sitio_cuerpo py-3">
                    <p class="pb-2">Dirección: <span class="direccion"><?php echo $tiendas['direccion']; ?></span></p>
                    <p class="pb-2">Telefono: <br> <span class="telefono"><?php echo $tiendas['telefono']; ?></span></p>

                    <p class="pb-2 p">Web: <span class="web"><a href="<?php echo $tiendas['web']; ?>"><?php echo $tiendas['web']; ?></a></span>
                    </p>

                </div>
            </div>
            <div class="map">
                <!--  aqui se pintara el mapa-->
            </div>
            <div class="pt-1 mt-5 mx-5  ">
                <!--TODO--   <button class="btn btn-dark btn-lg btn-block " type="button">Recibir novedades al email</button> -->
                <a class="btn btn-dark btn-lg btn-block " type="button" href="<?php echo BASE_URL; ?>Inicio/index">Volver</a>
            </div>
        </div>
        <script>
            function iniciarMap() {

                var coord = {
                    lat: <?php echo $tiendas['lat']; ?>,
                    lng: <?php echo $tiendas['lng']; ?>
                };
                var map = new google.maps.Map(document.querySelector('.map'), {
                    zoom: 13,
                    center: coord
                });
                //posicion del marcador
                var marker = new google.maps.Marker({
                    position: coord,
                    map: map
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
    </header>