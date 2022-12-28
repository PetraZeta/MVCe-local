   <!--   Favoritos             -->
   <h1 class="fw-bold text-center fixed-top m-2 encabezado">Mis Favoritos</h1>
   <main>

       <div class="cont_carta" id="catalogo">
           <!--  CARTA PRODUCTO se carga todo el catalogo en el index y con ajax y j query interceptar click de tienda, marca y buscador para mostrar catalogo segun sea-->
           <?php foreach ($favoritos as $f) { ?>

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
                           <a href="#" onclick="eliminarFavorito(<?php echo $f['id']; ?>)" class="btn btn-xl btn-dark agregar-favorito">Eliminar de Favoritos</a>
                       </div>
                   </div>
               </div>

           <?php  } ?>
           <!--FIN  CARTA PRODUCTO -->

       </div>

       </div>
   </main>
   <script src="<?php echo BASE_URL; ?>app/views/catalogo.js"></script>
   <!--   FIN DE CATALOGO             -->