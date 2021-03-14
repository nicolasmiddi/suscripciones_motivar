<?php
session_set_cookie_params (0, '/app-suscripcionV2/');
session_start();
class Ingreso{
	public function ingresoControlador(){
		if(isset($_POST['usuario']) && isset($_POST['password'])) {
			if (preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuario"])){
		
		$encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
		$datosController = array ("usuario" => $_POST["usuario"],
								  "password" => $encriptar);

		$respuesta = IngresoModels::ingresoModel($datosController, 'sis_usuario');
		$estado = $respuesta['su_estado'];
		$maximoIntentos = 5;
		$usuarioDeshabilitado = 99;
		$usuarioActual = $respuesta['su_usuario'];
		if ($estado == $usuarioDeshabilitado){
				echo '<div class="alert alert-danger">Usuario Deshabilitado</div>';
			}
		elseif ($estado < $maximoIntentos){
			if ($respuesta != false && $respuesta['su_usuario'] == $_POST["usuario"] && $respuesta['su_password'] == $encriptar){
					$estado = 0;
					$datosController = array ('usuarioActual'=> $usuarioActual,
											   'nuevoEstado' => $estado);
					$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, 'sis_usuarios');
					$_SESSION['validar'] = true;
					$_SESSION['usuario'] = $respuesta['identificacion_usuario'];
					$_SESSION['nombre'] = $respuesta['nombre_usuario'];
					$_SESSION['perfil'] = $respuesta['nombre_perfil'];
					$_SESSION['apellido'] = $respuesta['apellido_usuario'];
					$_SESSION['email'] = $respuesta['mail_usuario'];
					echo '<script> window.location = "dashboard"</script>';
			} else {
					++$estado;
					$datosController = array ('usuarioActual'=> $usuarioActual,
											   'nuevoEstado' => $estado);
					$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, 'sis_usuarios');
				echo '<div class="alert alert-danger">Usuario o contraseña inválido</div>';
				}
		} else {
				echo '<div class="alert alert-danger">Usuario Bloqueado</div>';
		}
	}
	}
	}
	}
?>