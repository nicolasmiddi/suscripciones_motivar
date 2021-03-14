<?php

require_once "conexion.php"; 

class PerfilModels{
	public function perfilModel($datoModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_usuario = :nombre,
																 mail_usuario = :correo, 
																 apellido_usuario = :apellido 
															WHERE identificacion_usuario = :usuario");
		
		
		$stmt -> bindParam(":usuario", $datoModel['usuario'], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datoModel['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido", $datoModel['apellido'], PDO::PARAM_STR);
		$stmt -> bindParam(":correo", $datoModel['correo'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "ok";
		} else {
			return "error";
		}
		$stmt -> close();

	}	
	

	public function claveModel($datoModel, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET password_usuario = :clave WHERE identificacion_usuario = :usuario");
		$stmt -> bindParam(":clave", $datoModel['clave'], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datoModel['usuario'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "ok";
		} else {
			return "error";
		}


		$stmt -> close();
	}

}

?>
