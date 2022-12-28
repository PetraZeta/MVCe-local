<div class="container ">






    <!-- incluir el trozo de html con las busquedas
     TODO--------hacer funcionar   -->

    <!--  CARTA PRODUCTO se carga todo el catalogo en el index y con ajax y j query interceptar click de tienda, marca y buscador para mostrar catalogo segun sea-->


    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Favoritos</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $p) { ?>
                <tr>
                    <th scope="row"><?php echo $p['id']; ?></th>
                    <td><img src="<?php echo BASE_URL; ?>app/assets/fotos/<?php echo $p['imagen']; ?>" alt="<?php echo $p['nombre']; ?>" width="200"></td>
                    <td><?php echo $p['nombre']; ?></td>
                    <td><?php echo $p['descripcion']; ?></td>
                    <td><?php echo $p['precio']; ?>€</td>
                    <td><?php echo $p['favorito']; ?></td>


                </tr>
            <?php  } ?>
        </tbody>
    </table>


    <!--FIN  CARTA PRODUCTO -->

</div>

<script src="<?php echo BASE_URL; ?>app/views/catalogo.js"></script>
<!--   FIN DE CATALOGO             -->