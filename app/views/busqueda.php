 <!--  BUSQUEDA         -->

 <main id="cont_busqueda">


     <!-- incluir el trozo de html con las busquedas
     TODO--------hacer funcionar   -->
     <?php /* include 'plantilla/filtros.php'; */ ?>


     <div class="cont_carta" id="catalogo">
         <h1 class="fw-bold  m-2 encabezado" style=" margin-top: 10px;">Resultado de la búsqueda </h1>
         <!--  CARTA PRODUCTO se carga todo el catalogo en el index y con ajax y j query interceptar click de tienda, marca y buscador para mostrar catalogo segun sea-->
         <?php foreach ($resultadoBusqueda as $f) { ?>

             <div class="carta_padre">
                 <div class="carta">
                     <div class="carta_cara">
                         <div class="carta_img">
                             <img src="<?php echo BASE_URL; ?>app/assets/fotos/<?php echo $f['imagen']; ?>" alt="<?php echo $f['nombre']; ?>">
                         </div>
                     </div>
                     <div class="carta_cruz">
                         <h1><?php echo $f['nombre']; ?></h1>
                         <p><?php echo $f['descripcion']; ?></p>
                         <h5 class="carta_precio">P.V.P: <?php echo $f['precio']; ?>€</h5>
                         <?php
                            if (isset($_SESSION['usuario'])) { ?>
                             <a href="#" onclick="sumaFavorito(<?php echo $f['id']; ?>)" class="btn btn-xl btn-dark agregar-favorito">Agregar a Favoritos</a>
                         <?php    }
                            ?>
                     </div>
                 </div>
             </div>

         <?php  } ?>
         <!--FIN  CARTA PRODUCTO -->

     </div>

 </main>
 <script src="<?php echo BASE_URL; ?>app/views/catalogo.js"></script>
 <!--   FIN DE CATALOGO             -->