<?php

require_once "conexion.php"; 

class IngresoModels{
	public function ingresoModel($datoModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT su_usuario, su_password, su_estado, su_nombre, spu_nombre, su_apellido, su_correo FROM $tabla
								INNER JOIN sis_asignacion_perfiles ON sap_usuario = su_id 
								INNER JOIN sis_perfiles_usuario ON sap_perfil = spu_id 
								WHERE su_usuario = :usuario");
		$stmt -> bindParam(":usuario", $datoModel['usuario'], PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
	}	
	public function intentosModel($datoModel, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET su_estadoo = :estado WHERE su_identificacion = :usuario");
		$stmt -> bindParam(":estado", $datoModel['nuevoEstado'], PDO::PARAM_INT);
		$stmt -> bindParam(":usuario", $datoModel['usuarioActual'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "ok";
		} else {
			return "error";
		}


		$stmt -> close();
	}

}

?>
