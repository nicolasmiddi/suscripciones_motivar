<?php 	
if (!$_SESSION['validar']){
			echo '<script> window.location = "login"</script>';
	exit ();
}
	include "vista/modulos/nav_sup.php";
	include "vista/modulos/nav_asside.php"; 

?>



	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					
									<!-- Profile info -->
									<div class="panel panel-flat">
										<div class="panel-heading">
											<h6 class="panel-title">Información de usuario</h6>
											
										</div>

										<div class="panel-body">
											<form method="post">
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Usuario</label>
															<input type="text" value="<?php echo $_SESSION['usuario']?>" class="form-control" readonly name="usuario">
														</div>
														<div class="col-md-6">
															<label>Correo</label>
															<input type="text" value="<?php echo $_SESSION['email']?>" class="form-control" name="correo" id="perfil_correo">
														</div>
													</div>
												</div>

												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Nombre</label>
															<input type="text" value="<?php echo $_SESSION['nombre']?>" class="form-control" name="nombre" id="perfil_nombre">
														</div>
														<div class="col-md-6">
															<label>Apellido</label>
															<input type="text" value="<?php echo $_SESSION['apellido']?>" class="form-control" name="apellido" id="perfil_apellido">
														</div>
													</div>
												</div>

						                        <div class="text-right">
						                        	<button type="submit" class="btn btn-primary">Actualizar <i class="icon-arrow-right14 position-right"></i></button>
						                        </div>
											</form>
										</div>
									</div>
									<!-- /profile info -->

									<?php
									$perfil_usaurio = new Perfil();
									$perfil_usaurio -> perfilControlador();
									?>


									<!-- Account settings -->
									<div class="panel panel-flat">
										<div class="panel-heading">
											<h6 class="panel-title">Cambiar Clave</h6>
											
										</div>

										<div class="panel-body">
											<form method="post">

												<div class="form-group">
													<div class="row">
												<input type="hidden" value="<?php echo $_SESSION['usuario']?>" class="form-control" readonly name="usuario">

														<div class="col-md-6">
															<label>Nueva Clave</label>
															<input type="password" placeholder="Escribir nueva clave" class="form-control" name="nuevaclave" id="nuevaclave">
														</div>

														<div class="col-md-6">
															<label>Repetir Clave</label>
															<input type="password" placeholder="Repetir Clave" class="form-control" name="validacionclave" id="validacionclave">
														</div>
													</div>
												</div>

											

						                        <div class="text-right">
						                        	<button type="submit" class="btn btn-primary">Cambiar <i class="icon-arrow-right14 position-right"></i></button>
						                        </div>
					                        </form>
										</div>
									</div>
									<!-- /account settings -->
									<?php
									$clave_usaurio = new Perfil();
									$clave_usaurio -> claveControlador();
									?>


				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	
</div>


	<script src="vista/assets/js/hprod/validarRegistro.js"></script>

