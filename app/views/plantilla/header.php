<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-local</title>

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/assets/libs/bootstrap/css/bootstrap.css" />

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/assets/css/index2.css" />
  <!--  <link rel="stylesheet" href="<?php echo BASE_URL; ?>app/assets/css/header.css" /> -->

  <!-- LIBRERIA JQUERY-->




  <script src="<?php echo BASE_URL; ?>app/assets/libs/jquery-3.6.0.min.js"></script>

  <script src="<?php echo BASE_URL; ?>app/assets/libs/bootstrap/js/bootstrap.js"></script>
  <script src="<?php echo BASE_URL; ?>app/assets/libs/bootstrap/js/bootstrap.bundle.js"></script>

  <!-- LIBRERIA SWALERT -->
  <script src="<?php echo BASE_URL; ?>app/assets/libs/swalert/sweetalert2.all.min.js"></script>

</head>

<body>
  <script>
    //definir la ruta base en una constante para poder usarla en js 
    const BASE_URL = "<?php echo BASE_URL; ?>";
  </script>
  <nav id="menuSuperior" class="navbar navbar-expand-lg navbar-light fixed-top py-0 d-block" data-navbar-on-scroll="data-navbar-on-scroll" s>
    <div class="container-fluid ">
      <div class="justify-content-start">
        <a class="navbar-brand d-inline-flex px-5 " href="<?php echo BASE_URL; ?>Inicio/index">
          <img class="d-inline-block" src="<?php echo BASE_URL; ?>app/assets/img/4.png" alt="logo" style="width: 50px;">
          <span class="text-1000 fs-1 ms-3 fw-bold  text-dark">e-local</span>
        </a>
      </div>
      <!-- sí existe un titulo que lo muestre en el menu superior -->
      <?php if (isset($titulo)) : ?>
        <div class="justify-content-center">
          <h3 class="fw-bold text-center p-2 m-2"><?php echo $titulo; ?></h3>
        </div>
        
      <?php endif; ?>

      <!-- sí existe un usuario que muestre su nombre en el menu superior, si el usuario es administrados, que muestre el menu de opciones -->
      <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']['rol'] == 1)) { ?>
        <div class="">Bienvenid@: <span class="fw-bold text-center "><?php echo $_SESSION['usuario']['nombre']; ?></span>
        </div>
      <?php } elseif (isset($_SESSION['usuario']) && ($_SESSION['usuario']['rol'] == 0)) { ?>

        <a class=" nav-item nav-link" href="#">Modificar Datos</a>
        <a class="nav-item nav-link" href="#">Catalogo</a>
        <a class="nav-item nav-link " href="<?php echo BASE_URL; ?>Admin/campan">Campañas</a>
      <?php  } ?>

      <div class=" justify-content-end">
        <button class="btn" onclick="mostrar()">
          <a href="#" class="text-1000 fs-2 fw-bold ms-3 text-dark">
            <img src="<?php echo BASE_URL; ?>app/assets/icon/candado.svg" alt="privado">
          </a>
        </button>
      </div>

    </div>
  </nav>
  <!-- REGISTRO PRIVADO PARA TIENDAS -->

  <div id="alerta" style="display:none; position:absolute; top:65px; right: 0px;  z-index:1000 ; padding:1em; width: 200px; background-color: rgba(255, 240, 169, 0.5);">
    <h4 class="fw-bold text-center pt-2 ">Acceso Privado</h4>
    <form id="loginAdmin" action="<?php print BASE_URL; ?>Admin/verificaLogin" method="POST" autocomplete="off">
      <div class="row  ">
        <div>
          <label for="usuarioPrivado"></label>
          <input type="text" class="form-control " id="usuarioPrivado" placeholder="Correo electrónico" name="usuario" required>
        </div>

        <div>
          <label for="clavePrivada"></label>
          <input type="password" class="form-control" id="clavePrivada" placeholder="Contraseña" name="clave" required>
        </div>
        <div class="py-3 ">
          <input type="submit" class="btn btn-dark btn-lg btn-block  " value="Entrar"><br>
        </div>



        <div class="row">
          <?php
          if (isset($msg)) { ?>

            <div class='alert alert-<?php echo $msg_type; ?>  text-center mb-0'>

              <strong>* <?php echo $msg; ?> </strong><br>

            </div>
          <?php } ?>
        </div>
      </div>
    </form>
  </div>
  <script>
    function mostrar() {
      var x = document.getElementById('alerta');
      if (x.style.display === 'none') {
        x.style.display = 'block';
      } else {
        x.style.display = 'none';
      }
    }
  </script>