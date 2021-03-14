<?php
require_once "conexion.php"; 

class SuscriptoresModel{
	public function FullPaises (){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sis_pais");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
 	
 }
	public function BuscarPaisNombre ($dato){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sis_pais WHERE spa_nombre like '%$dato%'");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
 	
 }
	public function FullProvincias (){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sis_provincia");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
 	
 }
	public function BuscarProvinciaNombre ($dato){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sis_provincia WHERE spr_nombre like '%$dato%'");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
 	
 }
	public function LocalidadesXProvincia ($prov){
			$stmt = Conexion::conectar()->prepare("SELECT slo_id, slo_nombre, slo_codigo_postal 										FROM sis_localidades 
											INNER JOIN sis_provincia
											WHERE slo_provincia like '%$prov%' OR spr_nombre like '%$prov%'
													");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
 	
 }
	public function BuscarLocalidadNombre ($dato){
			$stmt = Conexion::conectar()->prepare("SELECT slo_id, slo_nombre, slo_codigo_postal 										FROM sis_localidades 
													WHERE slo_nombre like '%$dato%'
													");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
 	
 }
	public function FullProfesiones (){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_profesion");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();	
 }

public function FullCarrera (){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_carreras");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();	
 }
public function FullArea (){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_areas");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();	
 }
public function FullCargo (){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_cargos");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();	
 }

	public function BuscarTipoProfesionalNombre ($dato){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_profesion WHERE sup_nombre like '%$dato%'");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }

public function BuscarCarreraNombre ($dato){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_carreras WHERE sca_nombre like '%$dato%'");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }
public function BuscarAreaEmpresaNombre ($dato){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_areas WHERE sar_nombre like '%$dato%'");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }
public function BuscarCargoNombre ($dato){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_cargos WHERE scr_nombre like '%$dato%'");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }
public function BuscarInstitucionNombre ($dato){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_instituciones WHERE sit_nombre like '%$dato%'");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }
	public function InsertProfesion ($dato){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_profesion (sup_nombre) values ('$dato')");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }

public function InsertCarrera ($dato){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_carreras (sca_nombre) values ('$dato')");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }
public function InsertArea ($dato){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_areas (sar_nombre) values ('$dato')");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }
public function InsertCargo($dato){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_cargos (scr_nombre) values ('$dato')");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }
public function InsertInstitucion ($dato){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_instituciones (sit_nombre) values ('$dato')");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }



public function consultarGrandesAnimalesModal (){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_grandes_animales");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();	
 }
public function UsuarioGrandesAnimalesModal ($dato){
			$stmt = Conexion::conectar()->prepare("SELECT sgs_animal FROM sus_grandes_animales_suscriptores WHERE sgs_suscriptor = $dato");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();	
 }
public function consultarActividadLaboralModal (){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_actividad_laboral ORDER BY sal_rubro");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();	
 }
public function consultarRamaActividadModal ($dato){
			$stmt = Conexion::conectar()->prepare("SELECT sal_rubro FROM sus_actividad_laboral WHERE sal_id = $dato ORDER BY sal_rubro");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }
public function FullIntereses (){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_intereses");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();	
 }
public function InteresesXUsuario ($usuario){
			$stmt = Conexion::conectar()->prepare("SELECT siu_intereses FROM sus_intereses_usuarios
												WHERE siu_suscripto = $usuario");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();	
 }

public function FullInstitucion (){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_instituciones
													INNER JOIN sis_pais ON spa_id = sit_pais
													");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();	
 }


public function LeerUltimoUsuario (){
			$stmt = Conexion::conectar()->prepare("SELECT sug_id FROM sus_usuario_gral
													ORDER BY sug_id DESC 
													LIMIT 1
													");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }

public function mailSuscritor ($dato){
			$stmt = Conexion::conectar()->prepare("SELECT sug_id FROM sus_usuario_gral
													WHERE sug_correo_1 = '$dato';
													");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }



public function EditarUsuarioSuscriptor ($datos, $userID){
			$stmt = Conexion::conectar()->prepare("UPDATE sus_usuario_gral SET 
													sug_nombre= :sug_nombre,
													sug_apellido= :sug_apellido,
													sug_nacimiento= :sug_nacimiento,
													sug_dni= :sug_dni,
													sug_correo_1= :sug_correo_1,
													sug_correo_2= :sug_correo_2,
													sug_telefono_1= :sug_telefono_1,
													sug_telefono_2= :sug_telefono_2
													WHERE sug_id = $userID");

		$stmt -> bindParam(":sug_nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_apellido", $datos['apellido'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_nacimiento", $datos['nacimiento'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_dni", $datos['dni'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_correo_1", $datos['email'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_correo_2", $datos['email2'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_telefono_1", $datos['telefono'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_telefono_2", $datos['telefono2'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "Cambio Realizado con éxito";
		} else {
			return "Error al ejecutar el cambio";
		}
		$stmt -> close();
 }
public function editComentariosSuscriptor ($datos, $userID){
			$stmt = Conexion::conectar()->prepare("UPDATE sus_usuario_gral SET 
													sug_comentario_aideas_1= :sug_comentario_aideas_1,
													sug_comentario_aideas_2= :sug_comentario_aideas_2
													WHERE sug_id = $userID");

		$stmt -> bindParam(":sug_comentario_aideas_1", $datos['comentario1'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_comentario_aideas_2", $datos['comentario2'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "Cambio Realizado con éxito";
		} else {
			return "Error al ejecutar el cambio";
		}
		$stmt -> close();
 }


public function EditarPostalSuscriptor ($datos, $userID){
			$stmt = Conexion::conectar()->prepare("UPDATE sus_correo_postal SET 
													scp_calle= :scp_calle,
													scp_numero= :scp_numero,
													scp_piso_dto= :scp_piso_dto,
													scp_cp= :scp_cp,
													scp_partido= :scp_partido,
													scp_pais= :scp_pais,
													scp_provincia= :scp_provincia
													WHERE scp_id = $userID");

		$stmt -> bindParam(":scp_calle", $datos['calle'], PDO::PARAM_STR);
		$stmt -> bindParam(":scp_numero", $datos['numero'], PDO::PARAM_STR);
		$stmt -> bindParam(":scp_piso_dto", $datos['piso'], PDO::PARAM_STR);
		$stmt -> bindParam(":scp_cp", $datos['cod_postal'], PDO::PARAM_STR);
		$stmt -> bindParam(":scp_partido", $datos['localidad'], PDO::PARAM_STR);
		$stmt -> bindParam(":scp_provincia", $datos['provincia'], PDO::PARAM_STR);
		$stmt -> bindParam(":scp_pais", $datos['pais'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "Cambio Realizado con éxito";
		} else {
			return "Error al ejecutar el cambio";
		}
		$stmt -> close();
 }
public function EditarSuscripciones ($datos, $userID){
			$stmt = Conexion::conectar()->prepare("UPDATE sus_suscripciones SET 
													ssu_motivar_digital= :ssu_motivar_digital,
													ssu_2_2_digital= :ssu_2_2_digital,
													ssu_motivar_impreso= :ssu_motivar_impreso,
													ssu_2_2_impreso= :ssu_2_2_impreso,
													ssu_forma_envio= :ssu_forma_envio
													WHERE ssu_id = $userID");

		$stmt -> bindParam(":ssu_motivar_impreso", $datos['edit_moti_ed_impreso'], PDO::PARAM_STR);
		$stmt -> bindParam(":ssu_motivar_digital", $datos['edit_moti_ed_digital'], PDO::PARAM_STR);
		$stmt -> bindParam(":ssu_2_2_impreso", $datos['edit_dosm_ed_impreso'], PDO::PARAM_STR);
		$stmt -> bindParam(":ssu_2_2_digital", $datos['edit_dosm_ed_digital'], PDO::PARAM_STR);
		$stmt -> bindParam(":ssu_forma_envio", $datos['forma_envio'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "Cambio Realizado con éxito";
		} else {
			return "Error al ejecutar el cambio";
		}
		$stmt -> close();

 }
public function InsertUsuarioSuscriptor ($datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_usuario_gral(sug_nombre, sug_apellido, sug_comentario_aideas_1, sug_correo_1) VALUES (:sug_nombre, :sug_apellido, :sug_comentario_aideas_1, :sug_correo_1)");				
		$stmt -> bindParam(":sug_nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_apellido", $datos['apellido'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_comentario_aideas_1", $datos['comentario'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_correo_1", $datos['email'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "ok";
		} else {
			return "error";
		}
		$stmt -> close();
 }

public function InsertUsuarioSuscriptorFull ($datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_usuario_gral(sug_nombre, sug_apellido, sug_nacimiento, sug_dni, sug_ejemplos, sug_comentario_aideas_1, sug_comentario_aideas_2, sug_correo_1, sug_correo_2, sug_telefono_1, sug_telefono_2, sug_celular) VALUES (:sug_nombre, :sug_apellido, :sug_nacimiento, :sug_dni, :sug_ejemplos, :sug_comentario_aideas_1, :sug_comentario_aideas_2, :sug_correo_1, :sug_correo_2, :sug_telefono_1, :sug_telefono_2, :sug_celular)");

		$stmt -> bindParam(":sug_correo_1", $datos['tmp_correo_1'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_correo_2", $datos['tmp_correo_2'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_nombre", $datos['tmp_nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_apellido", $datos['tmp_apellido'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_telefono_1", $datos['tmp_telefono_1'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_telefono_2", $datos['tmp_telefono_2'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_celular", $datos['tmp_celular'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_nacimiento", $datos['tmp_nacimiento'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_dni", $datos['tmp_dni'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_comentario_aideas_1", $datos['tmp_observaciones'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_comentario_aideas_2", $datos['tmp_observaciones2'], PDO::PARAM_STR);
		$stmt -> bindParam(":sug_ejemplos", $datos['tmp_ejemplos'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "ok";
		} else {
			return  $stmt->errorInfo();
		}
		$stmt -> close();
 }


public function InsertSuscripcion ($datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_suscripciones (ssu_id, ssu_motivar_digital, ssu_2_2_digital, ssu_motivar_impreso, ssu_2_2_impreso, ssu_forma_envio) VALUES (:ssu_id, :ssu_motivar_digital, :ssu_2_2_digital, :ssu_motivar_impreso, :ssu_2_2_impreso, :ssu_forma_envio)");

		$stmt -> bindParam(":ssu_id", $datos['usuario'], PDO::PARAM_STR);
		$stmt -> bindParam(":ssu_motivar_digital", $datos['moti_ed_digital'], PDO::PARAM_STR);
		$stmt -> bindParam(":ssu_2_2_digital", $datos['dosm_ed_digital'], PDO::PARAM_STR);
		$stmt -> bindParam(":ssu_motivar_impreso", $datos['moti_ed_impreso'], PDO::PARAM_STR);
		$stmt -> bindParam(":ssu_2_2_impreso", $datos['dosm_ed_impreso'], PDO::PARAM_STR);
		$stmt -> bindParam(":ssu_forma_envio", $datos['forma_envio'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "ok";
		} else {
			return "error";
		}
		$stmt -> close();
 }

public function 	InsertDomicilioSuscriptor ($datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_correo_postal (scp_id, scp_calle, scp_numero, scp_piso_dto, scp_cp, scp_pais, scp_partido, scp_provincia) VALUES (:scp_id, :scp_calle, :scp_numero, :scp_piso_dto, :scp_cp, :scp_pais, :scp_partido, :scp_provincia)");

		$stmt -> bindParam(":scp_provincia", $datos['provincia'], PDO::PARAM_STR);
		$stmt -> bindParam(":scp_id", $datos['usuario'], PDO::PARAM_STR);
		$stmt -> bindParam(":scp_calle", $datos['calle'], PDO::PARAM_STR);
		$stmt -> bindParam(":scp_numero", $datos['numero'], PDO::PARAM_STR);
		$stmt -> bindParam(":scp_piso_dto", $datos['piso'], PDO::PARAM_STR);
		$stmt -> bindParam(":scp_cp", $datos['cod_postal'], PDO::PARAM_STR);
		$stmt -> bindParam(":scp_partido", $datos['localidad'], PDO::PARAM_STR);
		$stmt -> bindParam(":scp_pais", $datos['pais'], PDO::PARAM_STR);

		if ($stmt -> execute()){
			return "ok";
		} else {
			return $stmt->errorInfo();
		}
		$stmt -> close();
 }
public function InsertPlanificacionSuscriptor ($datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_planificacion_envios(spe_id, spe_enero, spe_febrero, spe_marzo, spe_abril, spe_mayo, spe_junio, spe_julio, spe_agosto, spe_septiembre, spe_octubre, spe_noviembre, spe_diciembre, spe_civa) VALUES (:spe_id, :spe_enero, :spe_febrero, :spe_marzo, :spe_abril, :spe_mayo, :spe_junio, :spe_julio, :spe_agosto, :spe_septiembre, :spe_octubre, :spe_noviembre, :spe_diciembre, :spe_civa)");

		$stmt -> bindParam(":spe_id", $datos['usuario'], PDO::PARAM_STR);
		$stmt -> bindParam(":spe_enero", $datos['enero'], PDO::PARAM_STR);
		$stmt -> bindParam(":spe_febrero", $datos['febrero'], PDO::PARAM_STR);
		$stmt -> bindParam(":spe_marzo", $datos['marzo'], PDO::PARAM_STR);
		$stmt -> bindParam(":spe_abril", $datos['abril'], PDO::PARAM_STR);
		$stmt -> bindParam(":spe_mayo", $datos['mayo'], PDO::PARAM_STR);
		$stmt -> bindParam(":spe_junio", $datos['junio'], PDO::PARAM_STR);
		$stmt -> bindParam(":spe_julio", $datos['julio'], PDO::PARAM_STR);
		$stmt -> bindParam(":spe_agosto", $datos['agosto'], PDO::PARAM_STR);
		$stmt -> bindParam(":spe_septiembre", $datos['septiembre'], PDO::PARAM_STR);
		$stmt -> bindParam(":spe_octubre", $datos['octubre'], PDO::PARAM_STR);
		$stmt -> bindParam(":spe_noviembre", $datos['noviembre'], PDO::PARAM_STR);
		$stmt -> bindParam(":spe_diciembre", $datos['diciembre'], PDO::PARAM_STR);
		$stmt -> bindParam(":spe_civa", $datos['civa'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "ok";
		} else {
			return "error";
		}
		$stmt -> close();
 }

public function InsertInteresesSuscriptor ($datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_intereses_usuarios( siu_suscripto, siu_intereses) VALUES (:siu_suscripto, :siu_intereses)");

		$stmt -> bindParam(":siu_suscripto", $datos['usuario'], PDO::PARAM_STR);
		$stmt -> bindParam(":siu_intereses", $datos['intereses'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "ok";
		} else {
			return "error";
		}
		$stmt -> close();
 }


public function InsertGrandesAnimalesSuscriptor ($datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_grandes_animales_suscriptores( sgs_suscriptor, sgs_animal) VALUES (:sgs_suscriptor, :sgs_animal)");

		$stmt -> bindParam(":sgs_suscriptor", $datos['usuario'], PDO::PARAM_STR);
		$stmt -> bindParam(":sgs_animal", $datos['gran_ani'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "ok";
		} else {
			return "error";
		}
		$stmt -> close();
 }
public function EliminarGrandesAnimalesSuscriptor ($userID){
			$stmt = Conexion::conectar()->prepare("DELETE FROM sus_grandes_animales_suscriptores WHERE sgs_suscriptor = $userID");
		if ($stmt -> execute()){
			return "Cambio Realizado con éxito";
		} else {
			return "Error al ejecutar el cambio";
		}
		$stmt -> close();
 }
public function EliminarInteresesSuscriptor ($userID){
			$stmt = Conexion::conectar()->prepare("DELETE FROM sus_intereses_usuarios WHERE siu_suscripto = $userID");
		if ($stmt -> execute()){
			return "Cambio Realizado con éxito";
		} else {
			return "Error al ejecutar el cambio";
		}
		$stmt -> close();
 }
public function EliminarSuscriptorTemporal ($id){
			$stmt = Conexion::conectar()->prepare("DELETE FROM sus_tmp_excel WHERE tmp_id = $id");
		if ($stmt -> execute()){
			return "Cambio Realizado con éxito";
		} else {
			$a = "Error al ejecutar el cambio".$id;
			return $a;
		}
		$stmt -> close();
 }


public function FullSuscriptorTemporal ($id){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_tmp_excel 
													WHERE tmp_id = $id
													");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }

public function existeInfoLaboralSuscriptor ($id){
			$stmt = Conexion::conectar()->prepare("SELECT sip_id FROM sus_info_profesional 
													WHERE sip_id = $id
													");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }


public function editProfesionSuscriptor ($datos, $userID) {
			$stmt = Conexion::conectar()->prepare("UPDATE sus_info_profesional SET 
												sip_profesional=:sip_profesional,
												sip_carrera=:sip_carrera,
												sip_institucion=:sip_institucion,
												sip_area_empresa=:sip_area_empresa,
												sip_cargo=:sip_cargo,
												sip_tipo_empresa=:sip_tipo_empresa,
												sip_actividad_laboral=:sip_actividad_laboral,
												sip_dueno_empleado=:sip_dueno_empleado,
												sip_pequenos_animales=:sip_pequenos_animales,
												sip_grandes_animales=:sip_grandes_animales
												WHERE sip_id = $userID");

		$stmt -> bindParam(":sip_profesional", $datos['tipo-profesional'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_carrera", $datos['carrera'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_institucion", $datos['institucion'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_area_empresa", $datos['area-empresa'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_cargo", $datos['cargo-empresa'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_tipo_empresa", $datos['tipo_empresa'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_actividad_laboral", $datos['act-laboral'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_dueno_empleado", $datos['rol-laboral'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_pequenos_animales", $datos['pequenos-animales'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_grandes_animales", $datos['grandes-animales'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "Cambio Realizado con éxito";
		} else {
			return "Error al ejecutar el cambio";
		}
		$stmt -> close();
 }
public function InsertProfesionSuscriptor ($datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_info_profesional (sip_id, sip_profesional, sip_carrera, sip_institucion, sip_area_empresa, sip_cargo, sip_tipo_empresa, sip_actividad_laboral, sip_dueno_empleado, sip_pequenos_animales, sip_grandes_animales) VALUES (:sip_id, :sip_profesional, :sip_carrera, :sip_institucion, :sip_area_empresa, :sip_cargo, :sip_tipo_empresa, :sip_actividad_laboral, :sip_dueno_empleado, :sip_pequenos_animales, :sip_grandes_animales)");

		$stmt -> bindParam(":sip_id", $datos['usuario'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_profesional", $datos['tipo-profesional'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_carrera", $datos['carrera'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_institucion", $datos['institucion'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_area_empresa", $datos['area-empresa'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_cargo", $datos['cargo-empresa'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_tipo_empresa", $datos['tipo_empresa'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_actividad_laboral", $datos['act-laboral'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_dueno_empleado", $datos['rol-laboral'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_pequenos_animales", $datos['pequenos-animales'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_grandes_animales", $datos['grandes-animales'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "ok";
		} else {
			return "error";
		}
		$stmt -> close();
 }



public function InsertProfesionFULLSuscriptor ($datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_info_profesional (sip_id, sip_profesional, sip_carrera, sip_institucion, sip_area_empresa, sip_cargo, sip_tipo_empresa, sip_actividad_laboral, sip_dueno_empleado, sip_pequenos_animales, sip_grandes_animales, sip_web, sip_empresa, sip_confin_pets ) VALUES (:sip_id, :sip_profesional, :sip_carrera, :sip_institucion, :sip_area_empresa, :sip_cargo, :sip_tipo_empresa, :sip_actividad_laboral, :sip_dueno_empleado, :sip_pequenos_animales, :sip_grandes_animales, :sip_web, :sip_empresa, :sip_confin_pets)");

		$stmt -> bindParam(":sip_id", $datos['usuario'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_profesional", $datos['tipo-profesional'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_carrera", $datos['carrera'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_institucion", $datos['institucion'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_area_empresa", $datos['area-empresa'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_cargo", $datos['cargo-empresa'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_tipo_empresa", $datos['tipo_empresa'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_actividad_laboral", $datos['act-laboral'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_dueno_empleado", $datos['rol-laboral'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_pequenos_animales", $datos['pequenos-animales'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_grandes_animales", $datos['grandes-animales'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_web", $datos['web_empresa'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_empresa", $datos['nombre_empresa'], PDO::PARAM_STR);
		$stmt -> bindParam(":sip_confin_pets", $datos['cons_fin_pets'], PDO::PARAM_STR);
		if ($stmt -> execute()){
			return "ok";
		} else {
			return "error";
		}
		$stmt -> close();
 }



public function EliminarSuscriptor ($userID){
			$stmt = Conexion::conectar()->prepare("DELETE FROM sus_usuario_gral WHERE sug_id = $userID");
		if ($stmt -> execute()){
			return "OK";
		} else {
			return "ERROR";
		}
		$stmt -> close();
 }
public function EliminarPostal ($userID){
			$stmt = Conexion::conectar()->prepare("DELETE FROM sus_correo_postal WHERE scp_id = $userID");
		if ($stmt -> execute()){
			return "OK";
		} else {
			return "ERROR";
		}
		$stmt -> close();
 }
public function existePostalSuscriptor ($userID){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_correo_postal WHERE scp_id = $userID");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }
public function EliminarProfesional ($userID){
			$stmt = Conexion::conectar()->prepare("DELETE FROM sus_info_profesional WHERE sip_id = $userID");
		if ($stmt -> execute()){
			return "OK";
		} else {
			return "ERROR";
		}
		$stmt -> close();
 }

public function EditarDulpicadosTemporalModel ($update){
			$stmt = Conexion::conectar()->prepare("UPDATE sus_tmp_excel SET $update");
		if ($stmt -> execute()){
			return "OK";
		} else {
			return "ERROR";
		}
		$stmt -> close();
 }


public function LeerUltimoInsertExcel (){
			$stmt = Conexion::conectar()->prepare("SELECT tmt_id FROM sus_tmp_tablas
													ORDER BY tmt_id DESC 
													LIMIT 1
													");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }

public function InsertarIDTabla ($id){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_tmp_tablas (tmt_id) VALUES ($id)
													");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();	
 }

public function tablaTemporal (){
			$stmt = Conexion::conectar()->prepare("SELECT tmt_id, tmt_fecha FROM sus_tmp_tablas
													");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();	
 }
public function tablaTemporalxID ($id){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM sus_tmp_excel 
													WHERE tmp_id_importacion = $id
													ORDER BY tmp_correo_1
													");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();	
 }


public function InsertarExcel_Temporal ($insert){
			$stmt = Conexion::conectar()->prepare("INSERT INTO sus_tmp_excel(tmp_id_importacion, tmp_nombre, tmp_apellido, tmp_correo_1, tmp_correo_2, tmp_telefono_1, tmp_telefono_2, tmp_celular, tmp_nacimiento, tmp_dni, tmp_tipo_direccion, tmp_calle, tmp_numero, tmp_piso_dpto, tmp_cp, tmp_localidad, tmp_partido, tmp_ciudad, tmp_provincia, tmp_pais, tmp_formacion_profesional, tmp_formacion_carrera, tmp_formacion_institucion, tmp_empresa_nombre, tmp_empresa_actividad, tmp_empresa_area, tmp_empresa_cargo, tmp_empresa_web, tmp_institucion_nombre, tmp_institucion_departamento, tmp_institucion_cargo, tmp_independiente, tmp_actividad_veterinaria, tmp_actividad_industria, tmp_actividad_agropecuaria, tmp_actividad_dueno, tmp_actividad_peq_animales, tmp_actividad_gran_animales, tmp_intereses_1, tmp_intereses_2, tmp_intereses_3, tmp_intereses_4, tmp_intereses_5, tmp_consumidor_final_pets, tmp_observaciones, tmp_sus_mot_digital, tmp_sus_2mas2_digital, tmp_sus_mot_impreso, tmp_sus_2mas2_impreso, tmp_sus_tipo_envio, tmp_sus_envios_enero, tmp_sus_envios_febrero, tmp_sus_envios_marzo, tmp_sus_envios_abril, tmp_sus_envios_mayo, tmp_sus_envios_junio, tmp_sus_envios_julio, tmp_sus_envios_agosto, tmp_sus_envios_septiembre, tmp_sus_envios_octubre, tmp_sus_envios_noviembre, tmp_sus_envios_diciembre, tmp_sus_invitado_CIVA, tmp_fuente, tmp_ultima_actualizacion, tmp_ejemplos, tmp_observaciones2) VALUES $insert");
		if ($stmt -> execute()){
			return "OK";
		} else {
			return "ERROR";
		}
		$stmt -> close();
 }


	public function TablaSuscriptosDulpicadosModel ($inner){
			$stmt = Conexion::conectar()->prepare("SELECT sug_id, sug_nombre, sug_apellido, sug_correo_1, sug_dni, tmp_nombre, tmp_correo_1, tmp_apellido, tmp_dni, tmp_celular, tmp_id
													FROM sus_usuario_gral
													INNER JOIN sus_suscripciones ON ssu_id = sug_id
                                                    INNER JOIN sus_tmp_excel ON $inner");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
 	}


	public function TablaSuscriptosDulpicadosTemporalModel ($fila){
			$stmt = Conexion::conectar()->prepare("SELECT $fila as suscrip, count($fila) as contador
													FROM sus_tmp_excel
													-- WHERE tmp_id_importacion > 1
													GROUP BY $fila
													HAVING count($fila) >1
													ORDER BY contador DESC");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
 	}

	public function SuscriptosDulpicadosTemporalxVariableModel ($id, $fila){
			$stmt = Conexion::conectar()->prepare("SELECT *
													FROM sus_tmp_excel
													INNER JOIN sus_tmp_tablas on tmt_id = tmp_id_importacion
													WHERE $fila = '$id'
													ORDER BY tmp_id_importacion DESC");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
 	}















}
?>