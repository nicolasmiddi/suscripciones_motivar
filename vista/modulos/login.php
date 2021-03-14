					<!-- Simple login form -->
<div class="container margin-superior">
	<div class="text-center">
		<div class=""><img width="200" src="vista/assets/images/logo_header.jpg" alt=""></div>
		<h3 class="titulo	GP">Administración de Suscritores</h3>
		<h5 class="content-group">Inicio de Sesión <small class="display-block">Ingrese sus credenciales</small></h5>
	</div>
	<form method="POST" onsubmit="return validaringreso()">

	<div class="offset-md-3 form-group login-form">
	
	<div class="row justify-content-md-center" id ="user">
		<div class="col col-lg-12">
			<input type="text" class="form-control" placeholder="Usuario" name="usuario" id="usuario" required maxlength="15">
		</div>
	<div class="col col-lg-12">
		<input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" required maxlength="30">
	</div>
	<div class="col col-lg-6">
		<button type="submit" class="btn btn-primary btn-block">Ingresar <i class="fas fa-arrow-circle-right"></i></button>
	</div>
	</form>

	</div>

			<?php
			$ingreso = new Ingreso();
			$ingreso -> ingresoControlador();
			?>
	<div class="text-center">
		<a href="login_password_recover.html">Olvido su constraseña?</a>
	</div>
					
					
<script src="vista/assets/js/motivar/validarIngreso.js"></script>

