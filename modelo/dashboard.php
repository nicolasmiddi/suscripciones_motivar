<?php
require_once "conexion.php"; 

class DashboardModel{
	public function TablaSuscriptosModel (){
			$stmt = Conexion::conectar()->prepare("SELECT sug_id, sug_nombre, sug_apellido, sug_correo_1, ssu_motivar_digital, ssu_2_2_digital, ssu_motivar_impreso, ssu_2_2_impreso
													FROM sus_usuario_gral
													INNER JOIN sus_suscripciones ON ssu_id = sug_id");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
 	}

 	
	public function DatosFullSuscritor ($datos){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_usuario_gral
													LEFT JOIN sus_suscripciones ON ssu_id = sug_id
													LEFT JOIN sus_info_profesional ON sip_id = sug_id
													LEFT JOIN sus_correo_postal ON scp_id = sug_id
													LEFT JOIN sis_localidades ON scp_partido = slo_id
													LEFT JOIN sis_provincia ON spr_id = scp_provincia
													LEFT JOIN sus_carreras ON sip_carrera = sca_id
													LEFT JOIN sus_profesion ON sup_id = sip_profesional
													LEFT JOIN sus_instituciones ON sip_institucion = sit_id
													LEFT JOIN sus_areas ON sip_area_empresa = sar_id
													LEFT JOIN sus_cargos ON sip_cargo = scr_id
													LEFT JOIN sis_pais ON spa_id = scp_pais
													WHERE sug_id = $datos;
													");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
 	}
	public function DatosFullSuscritorTemporal ($datos){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_tmp_excel
													WHERE tmp_id = $datos;
													");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
 	}

//INNER JOIN sus_intereses_usuarios ON siu_suscripto = sug_id
//INNER JOIN sus_intereses ON sin_id = siu_intereses
													





}
?>