<!-- los iconos los usare embebiendo el codigo svg para evitar cargar toda la libreria -->
<header>
	<!--   icono de menu que se convertira en aspa para cerrar el menu-->
	<div class="abrirSidebarMenu">

		<div class="spinner diagonal-1"></div>
		<div class="spinner horizontal"></div>
		<div class="spinner diagonal-2"></div>
	</div>
	<nav>

		<ul class="menu">
			<!--    INICIO -->
			<li><a href="<?php echo BASE_URL; ?>Inicio/index">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-box img-fluid" viewBox="0 0 16 16">
						<path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
					</svg>Inicio</a></li>

			<!--    LOGIN USUARIO si hay usuario registrado cambiar por LOGoUT
				preguntar si existe sesion de usuario para mostrar una u otra vista-->
			<?php
			if (isset($_SESSION['usuario'])) { ?>
				<!--    LOGoUT-->
				<li><a href="<?php echo BASE_URL; ?>Usuario/logout">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-dash" viewBox="0 0 16 16">
							<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
							<path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" />
						</svg>
						Logout</a>
				</li>
			<?php	} else { ?>
				<!--    LOGIN USUARIO -->
				<li><a href="<?php echo BASE_URL; ?>Usuario">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
							<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
							<path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
						</svg>
						Login</a>
				</li>
			<?php	}
			?>



			<!--    REGISTRO USUARIO /FAVORITOS-->

			<?php
			if (isset($_SESSION['usuario'])) { ?>
				<!--     FAVORITOS-->
				<li><a href="<?php echo BASE_URL; ?>Usuario/favoritos">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
							<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
						</svg>
						Favoritos</a>
				</li>
			<?php	} else { ?>
				<!--    REGISTRO USUARIO -->
				<li><a href="<?php echo BASE_URL; ?>Usuario/registro">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
							<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
							<path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
						</svg>



						Registro</a>
				</li>

			<?php	}
			?>

			<!--    TIENDAS -->

			<li class="submenu">
				<a href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
						<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
					</svg>
					Tiendas
				</a>
				<div class="abrirSubMenu">

					<div class="spinner vertical"></div>
					<div class="spinner horizontal"></div>

				</div>

				<ul class="children">

					<?php foreach ($tiendas as $t) {  ?>

						<li><a href="<?php echo BASE_URL; ?>Tienda/index/<?php echo $t["id"]; ?>" class="tienda" data-id="<?php echo $t["id"]; ?>">
								<?php echo $t["nombre"]; ?>

							</a></li>
					<?php } ?>

				</ul>
			</li>
			<!--    MARCAS-->
			<li class="submenu">
				<a href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-lightning" viewBox="0 0 16 16">
						<path d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641l2.5-8.5zM6.374 1 4.168 8.5H7.5a.5.5 0 0 1 .478.647L6.78 13.04 11.478 7H8a.5.5 0 0 1-.474-.658L9.306 1H6.374z" />
					</svg>
					Marcas
				</a>
				<!-- boton de mas y menos -->
				<div class="abrirSubMenu">
					<div class="spinner vertical"></div>
					<div class="spinner horizontal"></div>
				</div>

				<!--      TODO generar submenu dinamico y enlaces a sus vistas -->
				<ul class="children">
					<?php foreach ($marcas as $m) {  ?>

						<li><a href="<?php echo BASE_URL; ?>Tienda/marca/<?php echo $m["id"]; ?>"><?php echo $m["nombre"]; ?><span class=""></span>
							</a></li>
					<?php } ?>

				</ul>
			</li>

			<!--   CATALOGO -->

			<li><a href="<?php echo BASE_URL; ?>Catalogo">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
						<path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
						<path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
					</svg>
					Catalogo</a></li>

			<!--    BUSCADOR-->
			<li class="buscar">
				<a href="">
					<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
						<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
					</svg>
					Buscar
				</a>
				<!-- boton de mas y menos -->
				<div class="abrirSubMenu">
					<div class="spinner vertical"></div>
					<div class="spinner horizontal"></div>
				</div>
				<!-- 	dentro de una lista para reutilizar estilos -->
				<ul class="children">
					<li>
						<div>
							<input type="search" class="form-control rounded search" placeholder="¿Que quieres buscar?" />
							<button class="btn input-group-text border-0 " id="busqueda">
								<!--EL BOTON DE BUSCAR NO LO NECESITO DE MOMENTO 
									<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
									<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
								</svg> -->
							</button>
						</div>

					</li>

				</ul>

			</li>

		</ul>
	</nav>

</header>
<div class="respuesta">
	<!-- aqui pintaremos las coincidencias en tiempo real con ajax -->
</div>
<script src="<?php echo BASE_URL; ?>app/views/plantilla/menu.js"></script>