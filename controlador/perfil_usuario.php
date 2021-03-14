<?php

class Perfil{
	public function perfilControlador(){
		if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo'])) {
		if (preg_match('/^[a-zA-Z\s]*$/', $_POST["nombre"]) && 
			preg_match('/^[a-zA-Z\s]*$/', $_POST["apellido"]) && 
			strlen($_POST['nombre']) > 3  && 
			strlen($_POST['nombre']) < 20  && 
			strlen($_POST['apellido']) > 3  && 
			strlen($_POST['apellido']) < 20 && 
			preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["correo"])){
		$datosController = array ("nombre" => $_POST["nombre"],
								  "apellido" => $_POST["apellido"],
								  "usuario" => $_POST["usuario"],
								  "correo" => $_POST["correo"]);
		$respuesta = PerfilModels::perfilModel($datosController, 'usuarios');
		if($respuesta == "ok"){
					$_SESSION['nombre'] = $datosController['nombre'];
					$_SESSION['apellido'] = $datosController['apellido'];
					$_SESSION['email'] = $datosController['correo'];
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
							    window.location = "perfil_usuario";
							  } 
					});
				</script>';
		}		elseif ($respuesta == "error") {
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
							    window.location = "perfil_usuario";
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
							    window.location = "perfil_usuario";
							  } 
					});
				</script>';
	}
	}
	}

public function claveControlador(){
		if(isset($_POST['nuevaclave'])) {
		if (preg_match('/^[a-zA-Z0-9\S]*$/', $_POST["nuevaclave"]) && 
			$_POST['nuevaclave'] == $_POST["validacionclave"] && 
			strlen($_POST['nuevaclave']) > 5){	
		$encriptar = crypt($_POST["nuevaclave"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
		$datosController = array ("usuario" => $_POST["usuario"],
								  "clave" => $encriptar);
		$respuesta = PerfilModels::claveModel($datosController, 'usuarios');
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
							    window.location = "perfil_usuario";
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
							    window.location = "perfil_usuario";
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
							    window.location = "perfil_usuario";
							  } 
					});
				</script>';	
	}
	}
	}
	}
?>
