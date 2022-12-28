   <!--   CATALOGO             -->

   <main>

       <div class="cont_carta" id="catalogo">
           <!-- incluir el trozo de html con las busquedas
     TODO--------hacer funcionar   -->
           <?php include 'plantilla/filtro.php'; ?>
           <!--  CARTA PRODUCTO se carga todo el catalogo en el index y con ajax y j query interceptar click de tienda, marca y buscador para mostrar catalogo segun sea-->
           <?php foreach ($productos as $p) { ?>

               <div class="carta_padre">
                   <div class="carta">
                       <div class="carta_cara">
                           <div class="carta_img">
                               <img src="<?php echo BASE_URL; ?>app/assets/fotos/<?php echo $p['imagen']; ?>" alt="<?php echo $p['nombre']; ?>">
                           </div>
                       </div>
                       <div class="carta_cruz">
                           <h1><?php echo $p['nombre']; ?></h1>
                           <p><?php echo $p['descripcion']; ?></p>
                           <h5 class="carta_precio">P.V.P: <?php echo $p['precio']; ?>€</h5>
                           <!-- solo si el usuario esta registrado se muestra el boton de agregar a favoritos -->
                           <?php
                            if (isset($_SESSION['usuario'])) { ?>
                               <a href="#" onclick="sumaFavorito(<?php echo $p['id']; ?>)" class="btn btn-xl btn-dark agregar-favorito">Agregar a Favoritos</a>
                           <?php    } ?>

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