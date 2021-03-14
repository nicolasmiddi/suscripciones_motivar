<?php

class TablaUsuariosControlador{
	
	public function usuariosControlador(){	
		$respuestaTablaUsuarios = TablaUsuariosModels::usuariosModel('usuarios');
		foreach ($respuestaTablaUsuarios as $row => $item) {
			if ($item['estado_usuario'] == 5) {
				$estado='BLOQUEADO</span><a href="index.php?action=usuarios&usr='.$item["identificacion_usuario"].'"><i class="icon-lock"></i></a>';
				} elseif ($item['estado_usuario'] == 99) {
				$estado='DESAHIBLITADO</span>';
				} else {
				$estado="HABILITADO</span>";
				}
			echo ' 
				<tr>
					<td>'.$item["identificacion_usuario"].'</td>
					<td>'.$item["nombre_usuario"]." ".$item["apellido_usuario"].'</td>
					<td>'.$item["mail_usuario"].'</td>
					<td>'.$item["nombre_perfil"].'</td>
					<td><span class="label estado">'.$estado.'</td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-menu9"></i>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a data-toggle="modal" data-target="#modal_form_vertical_editar_'.$item["identificacion_usuario"].'"><i class="icon-pencil3"></i> Editar usuario</a></li>
									<li><a data-toggle="modal" data-target="#modal_form_inline_password_'.$item["identificacion_usuario"].'"><i class="icon-lock"></i> Cambiar Clave</a></li>
									<li><a href="index.php?action=usuarios&user='.$item["identificacion_usuario"].'&estado='.$item["estado_usuario"].'"><i class="icon-trash"></i> Eliminar/Restaurar</a></li>
								</ul>
							</li>
						</ul>
					</td>
				</tr>

		            <!-- Inline form modal -->
					<div id="modal_form_inline_password_'.$item["identificacion_usuario"].'" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content text-center form-inline">
								<div class="modal-header">
									<h5 class="modal-title">Cambiar Clave</h5>
								</div>
								<form method="post" onsubmit="return validarRegistroClave()">
									<div class="modal-body ">
										<div class="form-group has-feedback reset_clave">
											<label>Clave: </label>
											<input type="hidden" name="idusuarioreset" value="'.$item["identificacion_usuario"].'" class="form-control">
											<input type="password" placeholder="Nueva Contraseña" class="form-control" name="reset_clave" id="reset_clave">
										</div>
										<div class="form-group has-feedback reset_clave_val">
											<label>Repetir: </label>
											<input type="password" placeholder="Respetir Contraseña" class="form-control" name="reset_clave_val" id="reset_clave_val">		
										</div>
									</div>
									<div class="modal-footer text-center">
										<button type="submit" class="btn btn-primary">Cambiar Clave</i></button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /inline form modal -->


		   <!-- Vertical form modal -->
					<div id="modal_form_vertical_editar_'.$item["identificacion_usuario"].'" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Editar Usuario</h5>
								</div>
								<form method="post">
									<div class="modal-body">
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6">
													<label>Nombre</label>
													<input type="hidden" value="'.$item["identificacion_usuario"].'" class="form-control" name="id_usuario_editar">
													<input type="text" value="'.$item["nombre_usuario"].'" class="form-control" name="nombre_usuario_editar">
												</div>
												<div class="col-sm-6">
													<label>Apellido</label>
													<input type="text" value="'.$item["apellido_usuario"].'" class="form-control" name="apellido_usuario_editar">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6">
													<label>Email</label>
													<input type="text" value="'.$item["mail_usuario"].'" class="form-control" name="correo_usuario_editar">
												</div>
												<div class="col-sm-6">
													<label>Perfil</label>
													<input type="text" value="'.$item["nombre_perfil"].'" class="form-control" readonly>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-link" data-dismiss="modal">Cerrar</button>
										<button type="submit" class="btn btn-primary">Actualizar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /vertical form modal -->
						';
	}
	}
	
	public function desbloquearUsuarioControlador(){
if(isset($_GET['usr'])) {
$respuesta = TablaUsuariosModels::desbloquearModel($_GET['usr'],'usuarios');
if($respuesta == "ok"){
		echo '<script>
					swal({
						  title: "OK!",
						  text: "¡El usuario se ha desblqueado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},
					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "usuarios";
							  } 
					});
				</script>';

		}		else {
			echo '<script>
					swal({
						  title: "ERROR!",
						  text: "¡El usuario NO se ha desbloqueado!",
						  type: "error",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},
					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "usuarios";
							  } 
					});
				</script>';
		}
	} 
}	

	public function habilitarDeshabilitarUsuarioControlador(){
			if(isset($_GET['user'])&&isset($_GET['estado'])) {
			if($_GET['estado'] == 99){ 
				$respuesta = TablaUsuariosModels::desbloquearModel($_GET['user'],'usuarios');
			}  
			else { 
				$respuesta = TablaUsuariosModels::deshabilitarModel($_GET['user'],'usuarios');
			}  
			if($respuesta == "ok"){
				echo '<script>
							swal({
								  title: "OK!",
								  text: "¡El usuario se ha habilitado correctamente!",
								  type: "success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},
							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "usuarios";
									  } 
							});
						</script>';
			}	elseif ($respuesta == "okd") {
					echo '<script>
							swal({
								  title: "OK!",
								  text: "¡El usuario se ha deshabilitado correctamente!",
								  type: "success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},
							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "usuarios";
									  } 
							});
						</script>';
				} else {
					echo '<script>
							swal({
								  title: "ERROR!",
								  text: "¡La accion no se pudo ejecutar!",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},
							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "usuarios";
									  } 
							});
						</script>';
				}
			} 
}

	public function editarUsuarioControlador(){

		if(isset($_POST['nombre_usuario_editar']) && isset($_POST['apellido_usuario_editar']) && isset($_POST['correo_usuario_editar'])) {
		if (preg_match('/^[a-zA-Z\s]*$/', $_POST["nombre_usuario_editar"]) && 
			strlen($_POST['nombre_usuario_editar']) > 3 &&
			strlen($_POST['nombre_usuario_editar']) < 20 &&
			preg_match('/^[a-zA-Z\s]*$/', $_POST["apellido_usuario_editar"]) && 
			strlen($_POST['apellido_usuario_editar']) > 3 &&
			strlen($_POST['apellido_usuario_editar']) < 20 &&
			preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["correo_usuario_editar"])){
		$datosController = array ("nombre" => $_POST["nombre_usuario_editar"],
								  "apellido" => $_POST["apellido_usuario_editar"],
								  "usuario" => $_POST["id_usuario_editar"],
								  "correo" => $_POST["correo_usuario_editar"]);
		
		$respuesta = TablaUsuariosModels::editarModel($datosController, 'usuarios');
		if($respuesta == "ok"){
		echo '<script>
					swal({
						  title: "OK!",
						  text: "¡El usuario se ha modificado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "usuarios";
							  } 
					});
				</script>';
		}	elseif ($respuesta == "error") {
				echo '<script>
					swal({
						  title: "ERROR!",
						  text: "¡El usuario NO se ha modificado correctamente!",
						  type: "error",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},
					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "usuarios";
							  } 
					});
				</script>';
		}} 	else {
			echo '<script>
					swal({
						  title: "ERROR!",
						  text: "¡El usuario NO se ha modificado correctamente!",
						  type: "error",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},
					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "usuarios";
							  } 
					});
				</script>';
	}
	}
	}


public function resetUsuarioControlador(){
		if(isset($_POST['reset_clave'])) {
		if (preg_match('/^[a-zA-Z0-9\S]*$/', $_POST["reset_clave"]) && 
			$_POST['reset_clave'] == $_POST["reset_clave_val"] && 
			strlen($_POST['reset_clave']) > 5){
		$encriptar = crypt($_POST["reset_clave"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
		$datosController = array ("usuario" => $_POST["idusuarioreset"],
								  "clave" => $encriptar);
		$respuesta = TablaUsuariosModels::resetModel($datosController, 'usuarios');
		if($respuesta == "ok"){
				echo '<script>
					swal({
						  title: "OK!",
						  text: "La clave se ha modificado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},
					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "usuarios";
							  } 
					});
				</script>';
		}		elseif ($respuesta == "error") {
			echo '<script>
					swal({
						  title: "ERROR!",
						  text: "La clave NO se ha modificado correctamente!",
						  type: "error",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},
					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "usuarios";
							  } 
					});
				</script>';
		}} 	else {
			echo '<script>
					swal({
						  title: "ERROR!",
						  text: "¡Las claves no coinciden o contienen caracteres inválidos! \n Recuerde que su clave puede contener al menos 6 dígitos entre letras, números y carateres especiales",
						  type: "error",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},
					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "usuarios";
							  } 
					});
				</script>';	
	}
	}
	}

public function validarUsuarioControlador($datosController){
		$respuesta = TablaUsuariosModels::validarUsuarioModel($datosController, "usuarios");

		if(count($respuesta["identificacion_usuario"]) > 0){
			echo 0;
		}
		else{
			echo 1;
		}
}
	public function altaUsuarioControlador(){
		if(isset($_POST['identificador_usuario_alta']) && isset($_POST['nombre_usuario_alta']) && isset($_POST['apellido_usuario_alta']) && isset($_POST['correo_usuario_alta']) && isset($_POST['clave_usuario_alta']) && isset($_POST['clave_val_usuario_alta'])) {
		if (preg_match('/^[a-zA-Z0-9\s]*$/', $_POST["identificador_usuario_alta"]) && 
			strlen($_POST['identificador_usuario_alta']) > 3 &&
			strlen($_POST['identificador_usuario_alta']) < 20 &&
			preg_match('/^[a-zA-Z\s]*$/', $_POST["nombre_usuario_alta"]) && 
			strlen($_POST['nombre_usuario_alta']) > 3 &&
			strlen($_POST['nombre_usuario_alta']) < 20 &&		
			preg_match('/^[a-zA-Z\s]*$/', $_POST["apellido_usuario_alta"]) && 
			strlen($_POST['apellido_usuario_alta']) > 3 &&
			strlen($_POST['apellido_usuario_alta']) < 20 &&
			preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["correo_usuario_alta"]) && 
			$_POST['clave_usuario_alta'] == $_POST['clave_val_usuario_alta'] &&
			strlen($_POST['clave_usuario_alta']) > 5 
		){

		$encriptar = crypt($_POST["clave_usuario_alta"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
		$datosController = array ("usuario" => $_POST["identificador_usuario_alta"],
								  "nombre" => $_POST["nombre_usuario_alta"],
								  "apellido" => $_POST["apellido_usuario_alta"],
								  "correo" => $_POST["correo_usuario_alta"],
								  "password" => $encriptar
								);
		$respuesta = TablaUsuariosModels::altaModel($datosController, 'usuarios');
		if($respuesta == "ok"){
		echo '<script>
					swal({
						  title: "OK!",
						  text: "¡El usuario se creado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},
					function(isConfirm){
							 if (isConfirm) {	   
							     window.location = "usuarios";
							  } 
					});
				</script>';
		}		elseif ($respuesta == "error") {
			echo '<script>
					swal({
						  title: "ERROR!",
						  text: "¡El usuario NO se ha creado!",
						  type: "error",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},
					function(isConfirm){
							 if (isConfirm) {	
							    window.location = "usuarios";
							  } 
					});
				</script>';
		}} 	else {
			echo '<script>
					swal({
						  title: "ERROR!",
						  text: "¡El usuario NO se ha creado por errores en el formulario!",
						  type: "error",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},
					function(isConfirm){
							 if (isConfirm) {	
							    window.location = "usuarios";
							  } 
					});
				</script>';
	}
	}
	}
}
?>