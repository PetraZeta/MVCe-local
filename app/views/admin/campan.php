<div class="container mt-5" style=" margin-top:150px;">
    <h1 class="text-center my-5 titulo">Ingresar Nueva Campaña</h1>
    <div id="contenido" class="row">
        <div class="col-md-12 agregar-camp">
            <form action="<?php echo BASE_URL; ?>Admin/insertarCampa" method="post" id="nueva-camp" enctype="multipart/form-data">
                <legend class="mb-4">Datos de la Campaña</legend>
                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-lg-4 col-form-label">Nombre:</label>
                    <div class="col-sm-8 col-lg-8">
                        <input type="text" id="nombre" name="nombreCamp" class="form-control" placeholder="Nombre de la Campaña ">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-lg-4 col-form-label">Descripción:</label>
                    <div class="col-sm-8 col-lg-8">
                        <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-lg-4 col-form-label">Tipo:</label>
                    <div class="col-sm-8 col-lg-8">
                        <select id="tipo" name="tipo" class="form-control">
                            <option selected>Elige Tipo de Campaña</option>
                            <option value='descuentos'>Descuento</option>
                            <option value='ofertas'>Oferta</option>
                            <option value='novedades'>Novedad</option>

                        </select>

                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-lg-4 col-form-label">Fecha:</label>
                    <div class="col-sm-8 col-lg-8">
                        <input type="date" id="fecha" name="fecha" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-lg-4 col-form-label">Título:</label>
                    <div class="col-sm-8 col-lg-8">
                        <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título de la Campaña">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-lg-4 col-form-label">Cuerpo del Correo:</label>
                    <div class="col-sm-8 col-lg-8">
                        <textarea id="cuerpo" name="cuerpo" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-lg-4 col-form-label">Adjunto:</label>
                    <div class="col-sm-8 col-lg-8">
                        <!--    <input type="hidden" name="MAX_FILE_SIZE" value="307200"> -->
                        <input type="file" id="adjunto" name="adjunto" class="form-control" placeholder="Adjuntar">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-success w-100 d-block">Crear Nueva Campaña</button>
                </div>

            </form>
        </div>
    </div>

</div>


<div class="container-fluid mt-3 ">
    <h2 class="text-center my-5 titulo">Todas las Campañas</h2>

    <!--  TABLA -->
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Título</th>
                    <th>Cuerpo</th>
                    <th>Tipo</th>
                    <th>Adjunto</th>
                    <th>Ejecutada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cadena = "";
                foreach ($camp as $cam) { ?>
                    <tr>
                        <td><?php echo $cam['nombre']; ?></td>
                        <td><?php echo $cam['descripcion']; ?></td>
                        <td><?php echo $cam['fecha']; ?></td>
                        <td><?php echo $cam['titulo']; ?></td>
                        <td><?php echo $cam['cuerpo']; ?></td>
                        <td><?php echo $cam['tipo']; ?></td>
                        <td><img src="<?php echo BASE_URL; ?>app/assets/img/<?php echo $cam['adjunto']; ?>" width="150" alt=""></td>
                        <td><?php echo $cam['ejecutada']; ?></td>
                        <td class=" justify-content-center">
                            <!--TO-DO--- boton de modificar campana -->
                            <a href='' type="button" class="btn btn-outline-primary mb-2"><img src='<?php echo BASE_URL; ?>app/assets/icon/pen.svg'></a>
                            <!--TO-DO--- boton de borrar campana -->
                            <a href='' type="button" class="btn btn-outline-danger mb-2"><img src='<?php echo BASE_URL; ?>app/assets/icon/basura.svg'></a>
                            <!-- boton de enviar campana -->
                            <a href='<?php echo BASE_URL; ?>Admin/enviarCamp/<?php echo $cam['id']; ?>/<?php echo $cam['tipo']; ?>' type="button" class="btn btn-outline-success">
                            <img src='<?php echo BASE_URL; ?>app/assets/icon/email.svg'></a>
                        </td>
                    </tr>
                <?php    } ?>
            </tbody>
        </table>
    </div>