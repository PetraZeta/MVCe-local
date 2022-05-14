<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-local</title>

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/assets/libs/bootstrap/css/bootstrap.css" />

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/assets/css/index.css" />

    <script src="<?php echo BASE_URL; ?>app/assets/libs/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?php echo BASE_URL; ?>app/assets/libs/jquery-3.6.0.min.js"></script>

    <!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
</head>

<body>
    <script>
        //definir la ruta base en una constante para poder usarla en js 
        const BASE_URL = "<?php echo BASE_URL; ?>";
    </script>
    <?php
    if (isset($_SESSION['usuario'])) {
        echo $_SESSION['usuario']['nombre'];
    } else {
   
       /*  echo 'vete a registrar'; */
    }
    ?>





    <!--   FAVORITOS -->




    <!--METER EL ENLACE EN EL BOTON DE FAVORITOS??????? 
            <button class="navbar-toggler col" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-basket" viewBox="0 0 16 16" style="position: absolute; top:0;">
                <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z" />
            </svg>

        </button> -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Carrito</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="submenu">

                    <div id="carrito">

                        <table id="lista-carrito" class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>fdgfdggfg</td>
                                <td>fdgfdggfgcece</td>
                                <td>2</td>
                                <td>23.50</td>

                            </tbody>
                        </table>
                        <button type="button" class="btn btn-success px-5 m-3">Comprar</button>
                        <button type="button" id="vaciar-carrito" class="btn btn-danger">Vaciar Carrito</button>

                    </div>
                </li>

            </ul>

        </div>
    </div>