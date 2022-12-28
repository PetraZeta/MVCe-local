
   <div class="container " style="margin-top:60px;">
       <table class="table">
           <thead>
               <tr>

                   <th scope="col">Imagen</th>
                   <th scope="col">Nombre</th>
                   <th scope="col">Direccion</th>
                   <th scope="col">Telefono</th>
                   <th scope="col">Coordenadas</th>
                   <th scope="col">Web</th>


               </tr>
           </thead>
           <tbody>

               <tr>

                   <td><img src="<?php echo BASE_URL; ?>app/assets/img/<?php echo $tiendas['logo']; ?>" alt=""></td>
                   <td><?php echo $tiendas['nombre']; ?></td>
                   <td><?php echo $tiendas['direccion']; ?></td>

                   <td><?php echo $tiendas['telefono']; ?></td>
                   <td><?php echo $tiendas['lat']; ?>,<?php echo $tiendas['lng']; ?></td>
                   <td><?php echo $tiendas['web']; ?></td>


               </tr>

           </tbody>
       </table>

   </div>

