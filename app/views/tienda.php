    <header>
        <!--   icono de menu que se convertira en aspa para cerrar el menu -->
        <div class="abrirSidebarMenu">

            <div class="spinner diagonal-1"></div>
            <div class="spinner horizontal"></div>
            <div class="spinner diagonal-2"></div>
        </div>
        <div class="tienda">

            <div class="sitio_logo">
                <img src="../imagen/LaSinesiesia.png" alt="">
            </div>
            <!-- TODO-> revisar estilos -->
            <div class="sitio">
                <h1>La Sinesiesia</h1>
                <div class="sitio_cuerpo">
                    <p>
                    <p>Telefono: <span class="telefono">68668594</span></p>
                    <p>Dirección <span class="direccion">C/Esparragal, 5 Cáceres</span></p>
                    <h3><span></span></h3>
                    </p>
                    <a href="www.la sinesia.com">www.la sinesia.com</a>
                </div>
            </div>


            <div class="map">
                <!--   <img src="mapa1.jpg" alt=""> -->
            </div>
            <div class="pt-1 mt-5 mx-5  ">
                <button class="btn btn-dark btn-lg btn-block " type="button">Recibir novedades al email</button>
            </div>
        </div>
        <script>
            function iniciarMap() {
                ///TODO---->traerse de la bbdd la lat y lgn
                var coord = {
                    lat: 39.4740966,
                    lng: -6.3734509
                };
                var map = new google.maps.Map(document.querySelector('.map'), {
                    zoom: 10,
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