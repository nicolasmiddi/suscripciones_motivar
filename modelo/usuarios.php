<?php

require_once "conexion.php"; 

class TablaUsuariosModels{
	public function usuariosModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT identificacion_usuario, estado_usuario, nombre_usuario, nombre_perfil, apellido_usuario, mail_usuario FROM $tabla INNER JOIN asignacion_perfiles ON asignacion_perfiles.id_usuario = usuarios.id_usuario INNER JOIN perfiles_usuario ON perfiles_usuario.id_perfil = asignacion_perfiles.id_perfil");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();

	}	
	public function desbloquearModel($datoModel, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado_usuario = 0 WHERE identificacion_usuario = :usuario");
		$stmt -> bindParam(":usuario", $datoModel, PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "ok";
		} else {
			return "error";
		}


		$stmt -> close();
	}


public function deshabilitarModel($datoModel, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado_usuario = 99 WHERE identificacion_usuario = :usuario");
		$stmt -> bindParam(":usuario", $datoModel, PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "okd";
		} else {
			return "error";
		}


		$stmt -> close();
	}


	public function editarModel($datoModel, $tabla){

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

	public function altaModel($datoModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (identificacion_usuario, password_usuario, nombre_usuario, apellido_usuario, mail_usuario, estado_usuario, fecha_creacion) VALUES (:usuario,:password,:nombre,:apellido,:correo,0,NOW())");				
											
		$stmt -> bindParam(":usuario", $datoModel['usuario'], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datoModel['password'], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datoModel['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido", $datoModel['apellido'], PDO::PARAM_STR);
		$stmt -> bindParam(":correo", $datoModel['correo'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			$stmt1 = Conexion::conectar()->prepare("SELECT id_usuario FROM $tabla ORDER BY id_usuario DESC LIMIT 1");		
			$stmt1 -> execute();
			$resultado = $stmt1 -> fetch();
			$stmt2 = Conexion::conectar()->prepare("INSERT INTO asignacion_perfiles (id_usuario, id_perfil)
												VALUES ($resultado[id_usuario],1)");				

		if ($stmt2 -> execute()){
			return "ok";
		} else {
			return "error";
		}
		$stmt -> close();

	}	else {
			return "error";
		}

	}


	public function resetModel($datoModel, $tabla){
		


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



	public function validarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT identificacion_usuario FROM $tabla WHERE identificacion_usuario = :usuario");
		$stmt->bindParam(":usuario", $datosModel, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

}




?>
