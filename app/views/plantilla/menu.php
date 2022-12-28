<!-- los iconos los usare embebiendo el codigo svg para evitar cargar toda la libreria -->

<header>
	<nav class="accordion" id="acordeon">

		<ul class="menu">
			<!--    INICIO -->
			<!-- 		<li><a href="<?php echo BASE_URL; ?>Inicio/index">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-box img-fluid" viewBox="0 0 16 16">
						<path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
					</svg>Inicio</a></li> -->

			<!--    LOGIN USUARIO si hay usuario registrado cambiar por LOGoUT
				preguntar si existe sesion de usuario para mostrar una u otra vista-->
			<?php
			if (isset($_SESSION['usuario'])) { ?>
				<!--    LOGoUT-->
				<li><a href="<?php echo BASE_URL; ?>Usuario/logout">
						<img src="<?php echo BASE_URL; ?>app/assets/icon/usuarioLogout.svg" alt="logout">
						Logout</a>
				</li>
			<?php	} else { ?>
				<!--    LOGIN USUARIO -->
				<li><a href="<?php echo BASE_URL; ?>Usuario">
						<img src="<?php echo BASE_URL; ?>app/assets/icon/usuarioLogin.svg" alt="login">
						Login</a>
				</li>
			<?php	}
			?>
			<!--    REGISTRO USUARIO /FAVORITOS-->
			<?php
			if (isset($_SESSION['usuario'])) { ?>
				<!--     FAVORITOS-->
				<li><a href="<?php echo BASE_URL; ?>Usuario/favoritos">
						<img src="<?php echo BASE_URL; ?>app/assets/icon/favoritos.svg" alt="favoritos">
						Favoritos</a>
				</li>
			<?php	} else { ?>
				<!--    REGISTRO USUARIO -->
				<li><a href="<?php echo BASE_URL; ?>Usuario/registro">
						<img src="<?php echo BASE_URL; ?>app/assets/icon/usuarioRegistro.svg" alt="registro">
						Registro</a>
				</li>
			<?php	}
			?>
			<!--    TIENDAS -->
			<li class=" accordion-item" id="headingOne">
				<a href="#" class="accordion-header accordion collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					<img src="<?php echo BASE_URL; ?>app/assets/icon/tiendas.svg" alt="tiendas">
					Tiendas
					<img src="<?php echo BASE_URL; ?>app/assets/icon/flecha.svg" alt="flecha">
				</a>
				<!-- SUBMENU   TIENDAS -->
				<ul id="collapseOne" class="accordion-collapse collapse children" data-bs-parent="#acordeon">
					<?php foreach ($tiendas as $t) {  ?>
						<li><a href="<?php echo BASE_URL; ?>Tienda/index/<?php echo $t["id"]; ?>" class="accordion-body" data-id="<?php echo $t["id"]; ?>">
								<?php echo $t["nombre"]; ?>

							</a></li>
					<?php } ?>

				</ul>
			</li>
			<!--    MARCAS-->
			<li class=" accordion-item" id="headingTwo">
				<a href="#" class="accordion-header accordion collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
					<img src="<?php echo BASE_URL; ?>app/assets/icon/marcas.svg" alt="marcas">
					Marcas
					<img src="<?php echo BASE_URL; ?>app/assets/icon/flecha.svg" alt="flecha">
				</a>

				<ul id="collapseTwo" class="accordion-collapse collapse children" data-bs-parent="#acordeon">
					<?php foreach ($marcas as $m) {  ?>

						<li><a href="<?php echo BASE_URL; ?>Tienda/marca/<?php echo $m["id"]; ?>" class="accordion-body"><?php echo $m["nombre"]; ?>
							</a></li>
					<?php } ?>

				</ul>
			</li>

			<!--   CATALOGO -->

			<li>
				<a href="<?php echo BASE_URL; ?>Catalogo">
					<img src="<?php echo BASE_URL; ?>app/assets/icon/catalogo.svg" alt="catalogo">
					Catalogo
				</a>
				<!-- 	<ul id="collapseTree" class="accordion-collapse collapse children" data-bs-parent="#acordeon">
					<li>
						<div>

							<input type="radio" id="hombre" name="sexo" value="h">
							<label for="hombre">Hombre</label>
							<input type="radio" id="mujer" name="sexo" value="m">
							<label for="mujer">Mujer</label>
						</div>
					</li>
					<li>
						<div>
							<input type="radio" id="ropa" name="tipo" value="r">
							<label for="ropa">Ropa</label>
							<input type="radio" id="calzado" name="tipo" value="z">
							<label for="calzado">Calzado</label><br>
							<input type="radio" id="complementos" name="tipo" value="c">
							<label for="html">Complementos</label>
						</div>
					</li>

					<li>
						<div class="input-group">

							<label for="precio" class="form-label">
								<input class="form-range" type="range" id="precio" min="0" max="500" step="5" value="0" style="width: 90%;">
								Precio: <span class="mx-3" id="prec"> 0</span><span>€</span>
								<input type="hidden" id="minPrice" value="0" />
								<input type="hidden" id="maxPrice" value="65000" />
							</label>
						</div>
					</li>
				</ul> -->
			</li>

			</li>
			<!--    BUSCADOR-->
			<li class="accordion-item" id="headingTree">
				<a href="#" class="accordion-header accordion collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTree" aria-expanded="false" aria-controls="collapseTree">
					<img src="<?php echo BASE_URL; ?>app/assets/icon/lupa.svg" alt="buscar">
					Buscar
					<img src="<?php echo BASE_URL; ?>app/assets/icon/flecha.svg" alt="flecha">
				</a>
				<ul id="collapseTree" class="accordion-collapse collapse children" data-bs-parent="#acordeon">
					<li class="accordion-body">
						<div>
							<input type="search" class="form-control rounded buscar search" placeholder="Productos que contengan..." />
						</div>
					</li>
				</ul>
			</li>
		</ul>
	</nav>
	<script>
		/* 	addEventListener('load', inicio, false);

						function inicio() {
							document.getElementById('precio').addEventListener('change', cambioPrecio, false);
						}

						function cambioPrecio() {
							document.getElementById('prec').innerHTML = document.getElementById('precio').value;
						} */
	/* 	if ($('.search').length) {
			$('.search').on("keyup", function(e) {
				consulta = $('.search').val(),
					$.ajax({
						url: BASE_URL + 'Inicio/buscador',
						type: "POST",
						async: true,
						data: 'q=' + consulta,
						dataType: 'html',
						success: function(data) {
							$(".respuesta").empty();
							$(".respuesta").append(data);

							// hacer que desaparezca el div resultado si input value == ''
							if ($('.search').val() == '') {
								$(".respuesta").empty();
							}
						}
					});
			});

		} */
		
	</script>
	<script src="<?php echo BASE_URL; ?>app/views/plantilla/buscador.js"></script>
</header>
<div class="respuesta">

	<!-- 	pinta la respuesta por ajax-->
</div>