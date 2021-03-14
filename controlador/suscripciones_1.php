<?php

class SuscriptoresController{
	public function ConsultarPaises (){
		$respuesta = SuscriptoresModel::FullPaises();
 	$html = "";
 	if (isset($respuesta[0])){
 		foreach ($respuesta as $key => $value) {
  			 $html.="<option id='".$value['spa_id']."' value='".$value['spa_id']."'>".$value['spa_nombre']."</option>";
 		}

 	}
 	$html = html_entity_decode($html);
 	return $html;
 }
	public function ConsultarProvincia (){
		$respuesta = SuscriptoresModel::FullProvincias();
 	$html = "";
 	if (isset($respuesta[0])){
 		foreach ($respuesta as $key => $value) {
  			 $html.="<option id='".$value['spr_id']."' value='".$value['spr_id']."'>".$value['spr_nombre']."</option>";
 		}

 	}
 	$html = html_entity_decode($html);
 	return $html;
 }

	public function ConsultarLocalidades ($provincia){
		 	$html = "";
			$provincia = substr($provincia, 0, -3);
			$respuesta = SuscriptoresModel::LocalidadesXProvincia($provincia);
		 	if (isset($respuesta[0])){
		 		foreach ($respuesta as $key => $value) {
		 			$value['slo_nombre']= html_entity_decode($value['slo_nombre']);
		  			 $html.="<option id='".$value['slo_codigo_postal']."' value='".$value['slo_id']."'>".$value['slo_nombre']." (".$value['slo_codigo_postal'].")</option>";
		 		}
		
		 	
		 } else $html ="error";
	 $html = html_entity_decode($html);
	return $html;
 }
  	public function ConsultarProfesiones (){
		$respuesta = SuscriptoresModel::FullProfesiones();
 	$html = "";
 	if (isset($respuesta[0])){
 		$value['sup_nombre']= html_entity_decode($value['sup_nombre']);
 		foreach ($respuesta as $key => $value) {
 			$value['sup_nombre']= html_entity_decode($value['sup_nombre']);
  			 $html.="<option id='".$value['sup_id']."' value='".$value['sup_id']."'>".$value['sup_nombre']."</option>";
 		}
 	}	
 	return html_entity_decode($html);
 }
  	public function ConsultarCarrera (){
		$respuesta = SuscriptoresModel::FullCarrera();
 	$html = "";
 	if (isset($respuesta[0])){
 		$value['sca_nombre']= html_entity_decode($value['sca_nombre']);
 		foreach ($respuesta as $key => $value) {
  			 $html.="<option id='".$value['sca_id']."' value='".$value['sca_id']."'>".$value['sca_nombre']."</option>";
 		}
 	}
 	return html_entity_decode($html);
 }
  	public function ConsultarInstitucion (){
		$respuesta = SuscriptoresModel::FullInstitucion();
 	$html = "";
	if (isset($respuesta[0])){
		$a =$respuesta[0]['sit_pais'];
		$html.="<optgroup label=".$respuesta[0]['spa_nombre'].">";
 		foreach ($respuesta as $key => $value) {
  			if ($value['sit_pais'] != $a){
		  	$html.="</optgroup><optgroup label=".$value['spa_nombre'].">";
			$a = $value['sit_pais'];
				}
  			 $html.="<option id='".$value['sit_id']."' value='".$value['sit_id']."'>".$value['sit_nombre']."</option>";
 		}
 		$html.="</optgroup>";
 	}
 	return html_entity_decode($html);
 }
  	public function consultarArea (){
		$respuesta = SuscriptoresModel::FullArea();
 	$html = "";
 	if (isset($respuesta[0])){
 		foreach ($respuesta as $key => $value) {
	  		$value['sar_nombre']= html_entity_decode($value['sar_nombre']);
  			 $html.="<option id='".$value['sar_id']."' value='".$value['sar_id']."'>".$value['sar_nombre']."</option>";
 		}
 	}
 	return html_entity_decode($html);
 }
  	public function consultarCargo (){
		$respuesta = SuscriptoresModel::FullCargo();
 	$html = "";
 	if (isset($respuesta[0])){
 		foreach ($respuesta as $key => $value) {
   		$value['scr_nombre']= html_entity_decode($value['scr_nombre']);
 			 $html.="<option id='".$value['scr_id']."' value='".$value['scr_id']."'>".$value['scr_nombre']."</option>";
 		}
 	}
 	return html_entity_decode($html);
 }
  	public function grandesAnimalesUsuarioControlador ($userID){
  		if (is_numeric($userID)){
		$listado = SuscriptoresModel::consultarGrandesAnimalesModal();
		$animales = SuscriptoresModel::UsuarioGrandesAnimalesModal($userID);
  		 	if (isset($listado[0])){
  		 		foreach ($listado as $key => $value) {
  		  				$ch = '';
  		  			foreach ($animales as $row => $item) {
  		  				if ($value['sga_id'] == $item['sgs_animal']){
  		  					$ch = 'checked="checked';
  		  				}
  		  			}
  			 echo '<div class="form-check">
                        <input class="form-check-input" type="checkbox" value="'.$value['sga_id'].'" id="chk-gran-'.$value['sga_id'].'" name="chk_gran_ani-'.$value['sga_id'].'" '.$ch.'>
                        <label class="form-check-label" for="chk-gran-'.$value['sga_id'].'">'.$value['sga_nombre'].'</label>
                    </div>';
 		}
 	}
 }
 }

  	public function consultarGrandesAnimales (){
		$respuesta = SuscriptoresModel::consultarGrandesAnimalesModal();
 	$html = "";
 	if (isset($respuesta[0])){
 		foreach ($respuesta as $key => $value) {
  			 $html.='<div class="form-check">
                        <input class="form-check-input" type="checkbox" value="'.$value['sga_id'].'" id="chk-gran-'.$value['sga_id'].'" name="chk_gran_ani-'.$value['sga_id'].'">
                        <label class="form-check-label" for="chk-gran-'.$value['sga_id'].'">'.$value['sga_nombre'].'</label>
                    </div>';
 		}
 	}
 	return $html;
 }

  	public function consultarActividadLaboral (){
		$respuesta = SuscriptoresModel::consultarActividadLaboralModal();
 	$html = "";
			$html.= '<div class="form-check">
			         <input class="form-check-input" type="radio" name="act-laboral" id="'.$respuesta[0]['sal_rubro'].'" value="'.$respuesta[0]['sal_id'].'">
                     <label class="form-check-label" for="'.$respuesta[0]['sal_rubro'].'">'.$respuesta[0]['sal_rubro'].'</label>
                        <div class="form-group actlaboral" id="'.$respuesta[0]['sal_rubro'].'">';
                    $rubro = $respuesta[0]['sal_rubro'];
 	if (isset($respuesta[0])){
 		foreach ($respuesta as $key => $value) {
  		if ($rubro != $value['sal_rubro']){
			$html.=' </div>
			 </div>
				<div class="form-check">
			         <input class="form-check-input" type="radio" name="act-laboral" id="'.$value['sal_rubro'].'" value="'.$value['sal_id'].'">
                     <label class="form-check-label" for="'.$value['sal_rubro'].'">'.$value['sal_rubro'].'</label>
                        <div class="form-group actlaboral" id="'.$value['sal_rubro'].'">';
                    $rubro = $value['sal_rubro'];
                    	}
        if ($value['sal_nombre'] != ''){
  			 $html.='<div class="form-check">
                        <input class="form-check-input" type="radio" name="subact-laboral" id="'.$value['sal_rubro'].$value['sal_nombre'].'" value="'.$value['sal_id'].'">
                     	<label class="form-check-label" for="'.$value['sal_rubro'].$value['sal_nombre'].'">'.$value['sal_nombre'].'</label>
                    </div>';
 		}
 	}
 	$html.=' </div>
			 </div>';
 	}
 	return $html;
 }

  	public function actividadLaboralUsuarioControlador ($actLab){
		$respuesta = SuscriptoresModel::consultarActividadLaboralModal();
		$rubroAct = SuscriptoresModel::consultarRamaActividadModal($actLab);
 	  if ($rubroAct[0] == $respuesta[0]['sal_rubro']) $ch = 'checked="checked'; else $ch ="";

			echo '<div class="form-check">
			         <input class="form-check-input" type="radio" name="edit-act-laboral" id="'.$respuesta[0]['sal_rubro'].'" value="'.$respuesta[0]['sal_id'].'" '.$ch.'>
                     <label class="form-check-label" for="'.$respuesta[0]['sal_rubro'].'">'.$respuesta[0]['sal_rubro'].'</label>
                        <div class="form-group" id="'.$respuesta[0]['sal_rubro'].'">';
                    $rubro = $respuesta[0]['sal_rubro'];
 	if (isset($respuesta[0])){
 		foreach ($respuesta as $key => $value) {
  		if ($rubro != $value['sal_rubro']){
		 if ($rubroAct[0] == $value['sal_rubro']) $ch = 'checked="checked'; else $ch ="";
		echo ' </div>
			 </div>
				<div class="form-check">
			         <input class="form-check-input" type="radio" name="edit-act-laboral" id="'.$value['sal_rubro'].'" value="'.$value['sal_id'].'" '.$ch.'>
                     <label class="form-check-label" for="'.$value['sal_rubro'].'">'.$value['sal_rubro'].'</label>
                        <div class="form-group" id="'.$value['sal_rubro'].'">';
                    $rubro = $value['sal_rubro'];
                    	}
        if ($value['sal_nombre'] != ''){
		 if ($actLab == $value['sal_id']) $ch = 'checked="checked'; else $ch ="";
  			 echo '<div class="form-check">
                        <input class="form-check-input" type="radio" name="edit-subact-laboral" id="'.$value['sal_rubro'].$value['sal_nombre'].'" value="'.$value['sal_id'].'" '.$ch.'>
                     	<label class="form-check-label" for="'.$value['sal_rubro'].$value['sal_nombre'].'">'.$value['sal_nombre'].'</label>
                    </div>';
 		}
 	}
 	echo ' </div>
			 </div>';
 	}
 }


  	public function consultarIntereses (){
		$respuesta = SuscriptoresModel::FullIntereses();
 	$html = "";
 	if (isset($respuesta[0])){
 		foreach ($respuesta as $key => $value) {
  			 $html.='<div class="form-check">
                        <input class="form-check-input" type="checkbox" value="'.$value['sin_id'].'" id="chk-int-'.$value['sin_id'].'" name="chkint-'.$value['sin_id'].'">
                        <label class="form-check-label" for="chk-int-'.$value['sin_id'].'">'.$value['sin_nombre'].'</label>
                    </div>';
 		}
 	}
 	return $html;
 }
  	public function interesesUsuarioControlador ($userID){
  		if (is_numeric($userID)){
  			$inter_user = SuscriptoresModel::InteresesXUsuario($userID);
			$listado = SuscriptoresModel::FullIntereses();
  		 	if (isset($listado[0])){
  		 		foreach ($listado as $key => $value) {
  		  				$ch = '';
  		  			foreach ($inter_user as $row => $item) {
  		  				if ($value['sin_id'] == $item['siu_intereses']){
  		  					$ch = 'checked="checked';
  		  				}
  		  			}
  		  			 echo '<div class="form-check">
  		                        <input class="form-check-input" type="checkbox" value="'.$value['sin_id'].'" id="chk-int-'.$value['sin_id'].'" name="chkint-'.$value['sin_id'].'" '.$ch.'>
  		                        <label class="form-check-label" for="chk-int-'.$value['sin_id'].'">'.$value['sin_nombre'].'</label>
  		                    </div>';
  		 		}
  		 	}
  		 	}
 }
  	public function editDatosPersonalesSuscripcion ($datos){
		if (isset($datos['edit_datos_personales'])){ 
			$datosModel['user_id']= htmlentities($datos['edit_datos_personales']); 
			if ((isset($datos['nombre']))&&($datos['nombre']!='')) $datosModel['nombre']= htmlentities($datos['nombre']); else $datosModel['nombre'] = NULL;
			if ((isset($datos['apellido']))&&($datos['apellido']!='')) $datosModel['apellido']= htmlentities($datos['apellido']); else $datosModel['apellido'] = NULL;
			if ((isset($datos['dni']))&&($datos['dni']!='')) $datosModel['dni']= htmlentities($datos['dni']); else $datosModel['dni'] = NULL;
			if ((isset($datos['nacimiento']))&&($datos['nacimiento']!='')) $datosModel['nacimiento']= htmlentities($datos['nacimiento']); else $datosModel['nacimiento'] = NULL;
			if ((isset($datos['email']))&&($datos['email']!='')) $datosModel['email']= htmlentities($datos['email']); else $datosModel['email'] = NULL;
			if ((isset($datos['email2']))&&($datos['email2']!='')) $datosModel['email2']= htmlentities($datos['email2']); else $datosModel['email2'] = NULL;
			if ((isset($datos['telefono']))&&($datos['telefono']!='')) $datosModel['telefono']= htmlentities($datos['telefono']); else $datosModel['telefono'] = NULL;
			if ((isset($datos['telefono2']))&&($datos['telefono2']!='')) $datosModel['telefono2']= htmlentities($datos['telefono2']); else $datosModel['telefono2'] = NULL;
			$respuesta = SuscriptoresModel::EditarUsuarioSuscriptor($datosModel, $datosModel['user_id']);
			return $respuesta;
		} else 
			return 'error';

 }
  public function editDatosPostalesSuscripcion ($datos){
	if (isset($datos['edit_datos_postales'])){ 

if (!is_numeric($datos['edit_pais'])){
	$buscar_pais = SuscriptoresModel::BuscarPaisNombre(trim($datos['edit_pais']));
	if ((isset($buscar_pais['spa_id']))&&($buscar_pais['spa_id']>0)){
		$datos['edit_pais'] = $buscar_pais['spa_id'];
	} else {
		$datos['edit_pais'] = NULL;
	}
}

if (($datos['edit_provincia']!='')&&(!is_numeric($datos['edit_provincia']))){
	$buscar_prov = SuscriptoresModel::BuscarProvinciaNombre(trim($datos['edit_provincia']));
	if ((isset($buscar_prov['spr_id']))&&($buscar_prov['spr_id']!='')){
		$datos['edit_provincia'] = $buscar_prov['spr_id'];
	} else {
		$buscar_prov = SuscriptoresModel::BuscarProvinciaNombre(trim($datos['edit_provincia']));
		$datos['edit_provincia'] = NULL;
	}
}
if (!is_numeric($datos['edit_localidad'])){
	$buscar_local = SuscriptoresModel::BuscarLocalidadNombre(trim($datos['edit_localidad']));
	if ((isset($buscar_pais['slo_id']))&&($buscar_local['slo_id']>0)){
		$datos['edit_localidad'] = $buscar_local['slo_id'];
	} else {
		$datos['edit_localidad'] = NULL;
	}
}

		$datosModel['user_id']= htmlentities($datos['edit_datos_postales']); 
			if ((isset($datos['edit_pais']))&&(is_numeric($datos['edit_pais']))) $datosModel['pais']= htmlentities($datos['edit_pais']); else $datosModel['pais'] = NULL;
			if ((isset($datos['edit_localidad']))&&(is_numeric($datos['edit_localidad']))) $datosModel['localidad']= htmlentities($datos['edit_localidad']); else $datosModel['localidad'] = NULL;
			if ((isset($datos['edit_provincia']))&&($datos['edit_provincia']!='')) $datosModel['provincia']= htmlentities($datos['edit_provincia']); else $datosModel['provincia'] = NULL;
			if ((isset($datos['edit_cod_postal']))&&(is_numeric($datos['edit_cod_postal']))) $datosModel['cod_postal']= htmlentities($datos['edit_cod_postal']); else $datosModel['cod_postal'] = NULL;
			if ((isset($datos['edit_calle']))&&($datos['edit_calle']!='')) $datosModel['calle']= htmlentities($datos['edit_calle']); else $datosModel['calle'] = NULL;
			if ((isset($datos['edit_numero']))&&(is_numeric($datos['edit_numero']))) $datosModel['numero']= htmlentities($datos['edit_numero']); else $datosModel['numero'] = NULL;
			if ((isset($datos['edit_piso']))&&($datos['edit_piso']!='')) $datosModel['piso']= htmlentities($datos['edit_piso']); else $datosModel['piso'] =NULL;
			$datosModel['usuario'] = $datosModel['user_id'];
				$existe = SuscriptoresModel::existePostalSuscriptor($datosModel['usuario']);
					if ($existe[0]!=''){
							$edit = SuscriptoresModel::EditarPostalSuscriptor($datosModel, $datosModel['user_id']);
					} else {
				  			$edit = SuscriptoresModel::InsertDomicilioSuscriptor($datosModel);

					}

			return $edit;
	} else 
		return 'error';
	}
  
  public function editSuscripciones ($datos){
	if (isset($datos['edit_suscripciones'])){ 
		$datosModel['user_id']= htmlentities($datos['edit_suscripciones']); 
			if ((isset($datos['edit_moti_ed_impreso']))&&($datos['edit_moti_ed_impreso']== 'true')) $datosModel['edit_moti_ed_impreso']= 1; else $datosModel['edit_moti_ed_impreso'] = 0;
			if ((isset($datos['edit_moti_ed_digital']))&&($datos['edit_moti_ed_digital']== 'true')) $datosModel['edit_moti_ed_digital']= 1; else $datosModel['edit_moti_ed_digital'] = 0;
			if ((isset($datos['edit_dosm_ed_impreso']))&&($datos['edit_dosm_ed_impreso']== 'true')) $datosModel['edit_dosm_ed_impreso']= 1; else $datosModel['edit_dosm_ed_impreso'] = 0;
			if ((isset($datos['edit_dosm_ed_digital']))&&($datos['edit_dosm_ed_digital']== 'true')) $datosModel['edit_dosm_ed_digital']= 1; else $datosModel['edit_dosm_ed_digital'] = 0;
				$count=0;
				if (($datosModel['edit_moti_ed_impreso'] == 1)||($datosModel['edit_dosm_ed_impreso'] == 1)){
					$datosModel['forma_envio'] = 'POSTAL'; 
					$count++;
				}
				if (($datosModel['edit_moti_ed_digital'] == 1)||($datosModel['edit_dosm_ed_digital'] == 1)){
					$datosModel['forma_envio'] = 'ELECTRONICO'; 
					$count++;
				}
				if ($count ==2){
					$datosModel['forma_envio'] = 'AMBOS'; 
				}
			$edit = SuscriptoresModel::EditarSuscripciones($datosModel, $datosModel['user_id']);
			return $edit;
	} else 
	return 'error';

 }

  	public function deleteTemporal ($datos){
  		if (is_numeric($datos['delete_temporal'])){
  			$a = SuscriptoresModel::EliminarSuscriptorTemporal($datos['delete_temporal']); 	
  		} else 
  			$a = 'No se puede Eliminar ' .$datos['delete_temporal'];

  		return $a;

 }
  	public function insertMasivoSuscripciones ($datos){
  		if (is_numeric($datos)){
  			$masivo = SuscriptoresModel::tablaTemporalxID($datos);
  			foreach ($masivo as $key => $value) {

  			$a = SuscriptoresController::insertTemporal ($value['tmp_id'], 0); 	
  				
  			}
  		} else 
  			$a = 'No se puede Eliminar';

  			echo $a;
 }

  	public function insertTemporal ($id, $val){

  		//me falta definir TMP_FUENTE!!!
 //traer los datos del ID
  		$array = SuscriptoresModel::FullSuscriptorTemporal($id);
  		$valida_existe = SuscriptoresModel::mailSuscritor($array['tmp_correo_1']);

  		if ((!isset($valida_existe[0]))||($val==1)){
//eliminar los espacios antes y dps de cada valor y quite los caracteres especiales
		foreach ($array as $key => $value) {
			$array[$key] = trim($value);
			$array[$key] = htmlentities($value);
		}

// convertir a numeros los campos numericos, eliminando todo valor q no sea un numero
		$array['tmp_telefono_1'] = preg_replace('/[^0-9]/', '', $array['tmp_telefono_1']);
		$array['tmp_telefono_2'] = preg_replace('/[^0-9]/', '', $array['tmp_telefono_2']);
		$array['tmp_celular'] = preg_replace('/[^0-9]/', '', $array['tmp_celular']);
		$array['tmp_dni'] = preg_replace('/[^0-9]/', '', $array['tmp_dni']);


 // //sus usuario general

  		if ((isset($array['tmp_correo_1']))&&($array['tmp_correo_1'] != '')) $datosModel['tmp_correo_1']= $array['tmp_correo_1']; else $datosModel['tmp_correo_1'] = NULL;
  		if ((isset($array['tmp_correo_2']))&&($array['tmp_correo_2'] != '')) $datosModel['tmp_correo_2']= $array['tmp_correo_2']; else $datosModel['tmp_correo_2'] = NULL;
  		if ((isset($array['tmp_nombre']))&&($array['tmp_nombre'] != '')) $datosModel['tmp_nombre']= $array['tmp_nombre']; else $datosModel['tmp_nombre'] = NULL;
  		if ((isset($array['tmp_apellido']))&&($array['tmp_apellido'] != '')) $datosModel['tmp_apellido']= $array['tmp_apellido']; else $datosModel['tmp_apellido'] = NULL;
  		if ((isset($array['tmp_telefono_1']))&&($array['tmp_telefono_1'] != '')) $datosModel['tmp_telefono_1']= $array['tmp_telefono_1']; else $datosModel['tmp_telefono_1'] = NULL;
  		if ((isset($array['tmp_telefono_2']))&&($array['tmp_telefono_2'] != '')) $datosModel['tmp_telefono_2']= $array['tmp_telefono_2']; else $datosModel['tmp_telefono_2'] = NULL;
  		if ((isset($array['tmp_celular']))&&($array['tmp_celular'] != '')) $datosModel['tmp_celular']= $array['tmp_celular']; else $datosModel['tmp_celular'] = NULL;
  		if ((isset($array['tmp_nacimiento']))&&($array['tmp_nacimiento'] != '')) $datosModel['tmp_nacimiento']= $array['tmp_nacimiento']; else $datosModel['tmp_nacimiento'] = NULL;
  		if ((isset($array['tmp_dni']))&&($array['tmp_dni'] != '')) $datosModel['tmp_dni']= $array['tmp_dni']; else $datosModel['tmp_dni'] = NULL;
  		if ((isset($array['tmp_observaciones']))&&($array['tmp_observaciones'] != '')) $datosModel['tmp_observaciones']= $array['tmp_observaciones']; else $datosModel['tmp_observaciones'] = 'NA';
  		if ((isset($array['tmp_observaciones2']))&&($array['tmp_observaciones2'] != '')) $datosModel['tmp_observaciones2']= $array['tmp_observaciones2']; else $datosModel['tmp_observaciones2'] = 'NA';
  		if ((isset($array['tmp_ejemplos']))&&($array['tmp_ejemplos'] != '')) $datosModel['tmp_ejemplos']= $array['tmp_ejemplos']; else $datosModel['tmp_ejemplos'] = NULL;


  		$respuesta = SuscriptoresModel::InsertUsuarioSuscriptorFull($datosModel);
  			if ($respuesta == 'ok'){
 	 		$usuario = SuscriptoresModel::LeerUltimoUsuario();
 	 		$datosModel['usuario'] = $usuario[0];
 	}


  		// // sus suscripciones


  		if ((isset($array['tmp_sus_mot_digital']))&&($array['tmp_sus_mot_digital']!='')) $datosModel['moti_ed_digital']= 1; else $datosModel['moti_ed_digital'] = 0;
  		if ((isset($array['tmp_sus_2mas2_digital']))&&($array['tmp_sus_2mas2_digital']!='')) $datosModel['dosm_ed_digital']= 1; else $datosModel['dosm_ed_digital'] = 0;
  		if ((isset($array['tmp_sus_mot_impreso']))&&($array['tmp_sus_mot_impreso']!='')) $datosModel['moti_ed_impreso']= 1; else $datosModel['moti_ed_impreso'] = 0;
  		if ((isset($array['tmp_sus_2mas2_impreso']))&&($array['tmp_sus_2mas2_impreso']!='')) $datosModel['dosm_ed_impreso']= 1; else $datosModel['dosm_ed_impreso'] = 0;
  		if ((isset($array['tmp_sus_tipo_envio']))&&($array['tmp_sus_tipo_envio']!='')) $datosModel['forma_envio']= $array['tmp_sus_tipo_envio']; else $datosModel['forma_envio'] = 'NA';

  		$respuesta = SuscriptoresModel::InsertSuscripcion($datosModel);
  		// // sus correo postal
  
if (!is_numeric($array['tmp_pais'])){
	$buscar_pais = SuscriptoresModel::BuscarPaisNombre($array['tmp_pais']);
	if ((isset($buscar_pais['spa_id']))&&($buscar_pais['spa_id']>0)){
		$array['tmp_pais'] = $buscar_pais['spa_id'];
	} else {
		$array['tmp_pais'] = NULL;
	}
}
	$buscar_prov = SuscriptoresModel::BuscarProvinciaNombre($array['tmp_provincia']);
	if ((isset($buscar_pais['spr_id']))&&($buscar_prov['spr_id']!='')){
		$array['tmp_provincia'] = $buscar_prov['spr_id'];
	} else {
		$array['tmp_provincia'] = NULL;
	}
if (!is_numeric($array['tmp_localidad'])){
	$buscar_local = SuscriptoresModel::BuscarLocalidadNombre($array['tmp_localidad']);
	if ((isset($buscar_pais['slo_id']))&&($buscar_local['slo_id']>0)){
		$array['tmp_localidad'] = $buscar_local['slo_id'];
	} else {
		$array['tmp_localidad'] = NULL;
	}
}
 
$datos_postales['usuario'] = $usuario[0];

  		if ((isset($array['tmp_cp']))&&(is_numeric($array['tmp_cp']))) $datos_postales['cod_postal']= $array['tmp_cp']; else $datos_postales['cod_postal'] = NULL;
  		if ((isset($array['tmp_calle']))&&($array['tmp_calle']!='')) $datos_postales['calle']= $array['tmp_calle']; else $datos_postales['calle'] = NULL;
  		if ((isset($array['tmp_numero']))&&($array['tmp_numero']!='')) $datos_postales['numero']= $array['tmp_numero']; else $datos_postales['numero'] = NULL;
  		if ((isset($array['tmp_piso_dpto']))&&($array['tmp_piso_dpto']!='')) $datos_postales['piso']= $array['tmp_piso_dpto']; else $datos_postales['piso'] = NULL;
  		if (isset($array['tmp_pais'])) $datos_postales['pais']= $array['tmp_pais']; else $datos_postales['pais'] = NULL;
  		if (isset($array['tmp_provincia'])) $datos_postales['provincia']= $array['tmp_provincia']; else $datos_postales['provincia'] = NULL;
  		if (isset($array['tmp_localidad'])) $datos_postales['localidad']= $array['tmp_localidad']; else $datos_postales['localidad'] = NULL;

  		$respuesta = SuscriptoresModel::InsertDomicilioSuscriptor($datos_postales);

  		// // sus info profesional



if (($array['tmp_formacion_profesional']!= '')&&(!is_numeric($array['tmp_formacion_profesional']))) {
	$buscar = SuscriptoresModel::BuscarTipoProfesionalNombre(['tmp_formacion_profesional']);
	if ((isset($buscar['sup_id']))&&($buscar['sup_id']>0)){
		$array['tmp_formacion_profesional'] = $buscar['sup_id'];
	} else {
		$insert = SuscriptoresModel::InsertProfesion(htmlentities($array['tmp_formacion_profesional']));
		$buscar = SuscriptoresModel::BuscarTipoProfesionalNombre(['tmp_formacion_profesional']);
		$array['tmp_formacion_profesional'] = $buscar['sup_id'];
	}

}
if ((isset($array['tmp_formacion_carrera']))&&($array['tmp_formacion_carrera']!= '')&&(!is_numeric($array['tmp_formacion_carrera']))) {
	$buscar = SuscriptoresModel::BuscarCarreraNombre($array['tmp_formacion_carrera']);
	if ((isset($buscar['sca_id']))&&($buscar['sca_id']>0)){
		$array['tmp_formacion_carrera'] = $buscar['sca_id'];
	} else {
		$insert = SuscriptoresModel::InsertCarrera(htmlentities($array['tmp_formacion_carrera']));
		$buscar = SuscriptoresModel::BuscarCarreraNombre($array['tmp_formacion_carrera']);
		$array['tmp_formacion_carrera'] = $buscar['sca_id'];
	}

}
if ((isset($array['tmp_formacion_institucion']))&&($array['tmp_formacion_institucion']!= '')&&(!is_numeric($array['tmp_formacion_institucion']))) {
	$buscar = SuscriptoresModel::BuscarInstitucionNombre($array['tmp_formacion_institucion']);
	if ((isset($buscar['sit_id']))&&($buscar['sit_id']>0)){
		$array['tmp_formacion_institucion'] = $buscar['sit_id'];
	} else {
		$insert = SuscriptoresModel::InsertInstitucion(htmlentities($array['tmp_formacion_institucion']));
		$buscar = SuscriptoresModel::BuscarInstitucionNombre($array['tmp_formacion_institucion']);
		$array['tmp_formacion_institucion'] = $buscar['sit_id'];
	}

}
if ((isset($array['tmp_empresa_area']))&&($array['tmp_empresa_area']!= '')&&(!is_numeric($array['tmp_empresa_area']))) {
	$buscar = SuscriptoresModel::BuscarAreaEmpresaNombre($array['tmp_empresa_area']);
	if ((isset($buscar['sar_id']))&&($buscar['sar_id']>0)){
		$array['tmp_empresa_area'] = $buscar['sar_id'];
	} else {
		$insert = SuscriptoresModel::InsertArea(htmlentities($array['tmp_empresa_area']));
		$buscar = SuscriptoresModel::BuscarAreaEmpresaNombre($array['tmp_empresa_area']);
		$array['tmp_empresa_area'] = $buscar['sar_id'];
	}
}

if ((isset($array['tmp_empresa_cargo']))&&($array['tmp_empresa_cargo']!= '')&&(!is_numeric($array['tmp_empresa_cargo']))) {
	$buscar = SuscriptoresModel::BuscarCargoNombre($array['tmp_empresa_cargo']);
	if ((isset($buscar['scr_id']))&&($buscar['scr_id']>0)){
		$array['tmp_empresa_cargo'] = $buscar['scr_id'];
	} else {
		$insert = SuscriptoresModel::InsertCargo(htmlentities($array['tmp_empresa_cargo']));
		$buscar = SuscriptoresModel::BuscarCargoNombre($array['tmp_empresa_cargo']);
		$array['tmp_empresa_cargo'] = $buscar['scr_id'];
	}

}



  		if ((isset($array['tmp_formacion_profesional']))&&(is_numeric($array['tmp_formacion_profesional']))) $datosModel['tipo-profesional']= $array['tmp_formacion_profesional']; else $datosModel['tipo-profesional'] = '0';
  		if ((isset($array['tmp_formacion_carrera']))&&(is_numeric($array['tmp_formacion_carrera']))) $datosModel['carrera']= $array['tmp_formacion_carrera']; else $datosModel['carrera'] = '0';
  		if ((isset($array['tmp_formacion_institucion']))&&(is_numeric($array['tmp_formacion_institucion']))) $datosModel['institucion']= $array['tmp_formacion_institucion']; else $datosModel['institucion'] = '0';

  		if ((isset($array['tmp_empresa_area']))&&(is_numeric($array['tmp_empresa_area']))) $datosModel['area-empresa']= $array['tmp_empresa_area']; else $datosModel['area-empresa'] = '0';
  		if ((isset($array['tmp_empresa_cargo']))&&(is_numeric($array['tmp_empresa_cargo']))) $datosModel['cargo-empresa']= $array['tmp_empresa_cargo']; else $datosModel['cargo-empresa'] = '0';
 
  		if ((isset($array['tmp_actividad_dueno']))&&($array['tmp_actividad_dueno']!='')) $datosModel['rol-laboral']= 1; else $datosModel['rol-laboral'] = 0;


  		if ((isset($array['tipo_empresa']))&&(is_numeric($array['tipo_empresa']))) $datosModel['tipo_empresa']= $array['tipo_empresa']; else $datosModel['tipo_empresa'] = '0';

  		if ((isset($array['tmp_actividad_peq_animales']))&&($array['tmp_actividad_peq_animales']!='')) $datosModel['pequenos-animales']= 1; else $datosModel['pequenos-animales'] = 0;
  		if ((isset($array['tmp_actividad_gran_animales']))&&($array['tmp_actividad_gran_animales']!='')) $datosModel['grandes-animales']= 1; else $datosModel['grandes-animales'] = 0;

  		if ((isset($array['tmp_actividad_veterinaria']))&&($array['tmp_actividad_veterinaria']!='')) $datosModel['act-laboral']= 1; else $datosModel['act-laboral'] = 0;
  		if ((isset($array['tmp_actividad_industria']))&&($array['tmp_actividad_industria']!='')) $datosModel['act-laboral']= 5;
  		if ((isset($array['tmp_actividad_agropecuaria']))&&($array['tmp_actividad_agropecuaria']!='')) $datosModel['act-laboral']= 7; 

  		if ((isset($array['tmp_empresa_actividad']))&&($array['tmp_empresa_actividad']!='')) $datosModel['tipo_empresa']= 1; else $datosModel['tipo_empresa'] = 0;
  		if ((isset($array['tmp_independiente']))&&($array['tmp_independiente']!='')) $datosModel['tipo_empresa']= 3;



	//otros
  		if ((isset($array['tmp_consumidor_final_pets']))&&($array['tmp_consumidor_final_pets']!='')) $datosModel['cons_fin_pets']= 1; else $datosModel['cons_fin_pets'] = NULL;
  		if ((isset($array['tmp_empresa_web']))&&($array['tmp_empresa_web']!='')) $datosModel['web_empresa']= $array['tmp_empresa_web']; else $datosModel['web_empresa'] = NULL;
  		if ((isset($array['tmp_empresa_nombre']))&&($array['tmp_empresa_nombre']!='')) $datosModel['nombre_empresa']= $array['tmp_empresa_nombre']; else $datosModel['nombre_empresa'] = NULL;
  		if ((isset($array['tmp_institucion_nombre']))&&($array['tmp_institucion_nombre']!='')) $datosModel['nombre_empresa']= $array['tmp_institucion_nombre'];

  		 $respuesta = SuscriptoresModel::InsertProfesionFULLSuscriptor($datosModel);


  		// //intereses

  		 $interes['usuario'] = $usuario[0];

  		if ((isset($array['tmp_intereses_1']))&&($array['tmp_intereses_1']!='')){
  			 $interes['intereses']= 1;
  		  	$respuesta = SuscriptoresModel::InsertInteresesSuscriptor($interes);
			}

  		if ((isset($array['tmp_intereses_2']))&&($array['tmp_intereses_2']!='')){
  			 $interes['intereses']= 2;
  		  	$respuesta = SuscriptoresModel::InsertInteresesSuscriptor($interes);
			}

  		if ((isset($array['tmp_intereses_3']))&&($array['tmp_intereses_3']!='')){
  			 $interes['intereses']= 3;
  		  	$respuesta = SuscriptoresModel::InsertInteresesSuscriptor($interes);
			}

  		if ((isset($array['tmp_intereses_4']))&&($array['tmp_intereses_4']!='')){
  			 $interes['intereses']= 4;
  		  	$respuesta = SuscriptoresModel::InsertInteresesSuscriptor($interes);
			}

  		if ((isset($array['tmp_intereses_5']))&&($array['tmp_intereses_5']!='')){
  			 $interes['intereses']= 5;
  		  	$respuesta = SuscriptoresModel::InsertInteresesSuscriptor($interes);
			}

  		 $planificacion['usuario'] = $usuario[0];
  		if ((isset($array['tmp_sus_envios_enero']))&&($array['tmp_sus_envios_enero']!='')) $planificacion['enero']= 1;  else $planificacion['enero']= 0;
  		if ((isset($array['tmp_sus_envios_febrero']))&&($array['tmp_sus_envios_febrero']!='')) $planificacion['febrero']= 1;  else $planificacion['febrero']= 0;
  		if ((isset($array['tmp_sus_envios_marzo']))&&($array['tmp_sus_envios_marzo']!='')) $planificacion['marzo']= 1;  else $planificacion['marzo']= 0;
  		if ((isset($array['tmp_sus_envios_abril']))&&($array['tmp_sus_envios_abril']!='')) $planificacion['abril']= 1;  else $planificacion['abril']= 0;
  		if ((isset($array['tmp_sus_envios_mayo']))&&($array['tmp_sus_envios_mayo']!='')) $planificacion['mayo']= 1;  else $planificacion['mayo']= 0;
  		if ((isset($array['tmp_sus_envios_junio']))&&($array['tmp_sus_envios_junio']!='')) $planificacion['junio']= 1;  else $planificacion['junio']= 0;
  		if ((isset($array['tmp_sus_envios_julio']))&&($array['tmp_sus_envios_julio']!='')) $planificacion['julio']= 1;  else $planificacion['julio']= 0;
  		if ((isset($array['tmp_sus_envios_agosto']))&&($array['tmp_sus_envios_agosto']!='')) $planificacion['agosto']= 1;  else $planificacion['agosto']= 0;
  		if ((isset($array['tmp_sus_envios_septiembre']))&&($array['tmp_sus_envios_septiembre']!='')) $planificacion['septiembre']= 1;  else $planificacion['septiembre']= 0;
  		if ((isset($array['tmp_sus_envios_octubre']))&&($array['tmp_sus_envios_octubre']!='')) $planificacion['octubre']= 1;  else $planificacion['octubre']= 0;
  		if ((isset($array['tmp_sus_envios_noviembre']))&&($array['tmp_sus_envios_noviembre']!='')) $planificacion['noviembre']= 1;  else $planificacion['noviembre']= 0;
  		if ((isset($array['tmp_sus_envios_diciembre']))&&($array['tmp_sus_envios_diciembre']!='')) $planificacion['diciembre']= 1;  else $planificacion['diciembre']= 0;
  		if ((isset($array['tmp_sus_invitado_CIVA']))&&($array['tmp_sus_invitado_CIVA']!='')) $planificacion['civa']= 1;  else $planificacion['civa']= 0;


  		  	$respuesta = SuscriptoresModel::InsertPlanificacionSuscriptor($planificacion);



	$respuesta = SuscriptoresModel::EliminarSuscriptorTemporal($id);
  		} else $respuesta = 'No ingresado por correo duplicado';
return $respuesta;


 }

  	public function editOtros ($datos){
  	$dato = urldecode($datos['datos']);
	$array;
	$strArray = explode("&", $dato);

    foreach($strArray as $item) {
       list($key, $valor) = explode("=", $item);
        $array[$key] = $valor;
    }
$datosModel['usuario']= htmlentities($datos['edit_otros']); 
	
if (isset($array['comentario1'])) $datosModel['comentario1']= htmlentities($array['comentario1']); else $datosModel['comentario1'] = 'NA';
if (isset($array['comentario2'])) $datosModel['comentario2']= htmlentities($array['comentario2']); else $datosModel['comentario2'] = 'NA';


	 $limpiar_intereses = SuscriptoresModel::EliminarInteresesSuscriptor($datosModel['usuario']); 	

foreach ($array as $key => $value) {
	$a = substr($key, 0, -1);
	if ($a == 'chkint-'){
		$datosModel['intereses'] = $value;
	$respuesta = SuscriptoresModel::InsertInteresesSuscriptor($datosModel);
	}
}
 $respuesta = SuscriptoresModel::editComentariosSuscriptor($datosModel, $datosModel['usuario']);

   return $respuesta;
 }
  	public function editLaborales ($datos){
  	$dato = urldecode($datos['datos']);
	$array;
	$strArray = explode("&", $dato);

    foreach($strArray as $item) {
       list($key, $valor) = explode("=", $item);
        $array[$key] = $valor;
    }
$datosModel['usuario']= htmlentities($datos['datos_laborales']); 



if (($array['tipo-profesional']!= '')&&(!is_numeric($array['tipo-profesional']))) {
	$buscar = SuscriptoresModel::BuscarTipoProfesionalNombre(htmlentities($array['tipo-profesional']));
	if ((isset($buscar['sup_id']))&&($buscar['sup_id']>0)){
		$array['tipo-profesional'] = $buscar['sup_id'];
	} else {
		$insert = SuscriptoresModel::InsertProfesion(htmlentities($array['tipo-profesional']));
		$buscar = SuscriptoresModel::BuscarTipoProfesionalNombre(htmlentities($array['tipo-profesional']));
		$array['tipo-profesional'] = $buscar['sup_id'];
	}

}
if ((isset($array['carrera']))&&($array['carrera']!= '')&&(!is_numeric($array['carrera']))) {
	$buscar = SuscriptoresModel::BuscarCarreraNombre(htmlentities($array['carrera']));
	if ((isset($buscar['sca_id']))&&($buscar['sca_id']>0)){
		$array['carrera'] = $buscar['sca_id'];
	} else {
		$insert = SuscriptoresModel::InsertCarrera(htmlentities($array['carrera']));
		$buscar = SuscriptoresModel::BuscarCarreraNombre(htmlentities($array['carrera']));
		$array['carrera'] = $buscar['sca_id'];
	}

}
if ((isset($array['institucion']))&&($array['institucion']!= '')&&(!is_numeric($array['institucion']))) {
	$buscar = SuscriptoresModel::BuscarInstitucionNombre(htmlentities($array['institucion']));
	if ((isset($buscar['sit_id']))&&($buscar['sit_id']>0)){
		$array['institucion'] = $buscar['sit_id'];
	} else {
		$insert = SuscriptoresModel::InsertInstitucion(htmlentities($array['institucion']));
		$buscar = SuscriptoresModel::BuscarInstitucionNombre(htmlentities($array['institucion']));
		$array['institucion'] = $buscar['sit_id'];
	}

}
if ((isset($array['area-empresa']))&&($array['area-empresa']!= '')&&(!is_numeric($array['area-empresa']))) {
	$buscar = SuscriptoresModel::BuscarAreaEmpresaNombre(htmlentities($array['area-empresa']));
	if ((isset($buscar['sar_id']))&&($buscar['sar_id']>0)){
		$array['area-empresa'] = $buscar['sar_id'];
	} else {
		$insert = SuscriptoresModel::InsertArea(htmlentities($array['area-empresa']));
		$buscar = SuscriptoresModel::BuscarAreaEmpresaNombre(htmlentities($array['area-empresa']));
		$array['area-empresa'] = $buscar['sar_id'];
	}
}

if ((isset($array['cargo-empresa']))&&($array['cargo-empresa']!= '')&&(!is_numeric($array['cargo-empresa']))) {
	$buscar = SuscriptoresModel::BuscarCargoNombre(htmlentities($array['cargo-empresa']));
	if ((isset($buscar['scr_id']))&&($buscar['scr_id']>0)){
		$array['cargo-empresa'] = $buscar['scr_id'];
	} else {
		$insert = SuscriptoresModel::InsertCargo(htmlentities($array['cargo-empresa']));
		$buscar = SuscriptoresModel::BuscarCargoNombre(htmlentities($array['cargo-empresa']));
		//array['cargo-empresa'] = $buscar['scr_id'];
	}

}

//return htmlentities($array['cargo-empresa']);


	
if ((isset($array['tipo-profesional']))&&(is_numeric($array['tipo-profesional']))) $datosModel['tipo-profesional']= $array['tipo-profesional']; else $datosModel['tipo-profesional'] = '0';
if ((isset($array['carrera']))&&(is_numeric($array['carrera']))) $datosModel['carrera']= $array['carrera']; else $datosModel['carrera'] = '0';
if ((isset($array['institucion']))&&(is_numeric($array['institucion']))) $datosModel['institucion']= $array['institucion']; else $datosModel['institucion'] = '0';
if ((isset($array['edit_tipo_empresa']))&&(is_numeric($array['edit_tipo_empresa']))) $datosModel['tipo_empresa']= $array['edit_tipo_empresa']; else $datosModel['edit_tipo_empresa'] = '0';

if ((isset($array['area-empresa']))&&(is_numeric($array['area-empresa']))) $datosModel['area-empresa']= $array['area-empresa']; else $datosModel['area-empresa'] = '0';
if ((isset($array['cargo-empresa']))&&(is_numeric($array['cargo-empresa']))) $datosModel['cargo-empresa']= $array['cargo-empresa']; else $datosModel['cargo-empresa'] = '0';
if ((isset($array['rol-laboral']))&&(is_numeric($array['rol-laboral']))) $datosModel['rol-laboral']= $array['rol-laboral']; else $datosModel['rol-laboral'] = '0';


if ((isset($array['tipo-animal']))&&(is_numeric($array['tipo-animal']))&&($array['tipo-animal']==0)) {	
		$datosModel['pequenos-animales']= 1; 
		$datosModel['grandes-animales']= 0; 
	} else {
		$datosModel['pequenos-animales'] =0;
		$datosModel['grandes-animales']= 1; 
	}

if ((isset($array['edit-subact-laboral']))&&(is_numeric($array['edit-subact-laboral']))&&($array['edit-act-laboral']>0)) $datosModel['act-laboral']= $array['edit-subact-laboral']; 
	elseif ((isset($array['edit-act-laboral']))&&(is_numeric($array['edit-act-laboral'])))
		$datosModel['act-laboral']= $array['edit-act-laboral']; 
	else
		$datosModel['act-laboral']= 0; 

	 $limpiar_grandes_animales = SuscriptoresModel::EliminarGrandesAnimalesSuscriptor($datosModel['usuario']); 	

foreach ($array as $key => $value) {
	$a = substr($key, 0, -1);
	if ($a == 'chk_gran_ani-'){
		$datosModel['gran_ani'] = $value;
	 $respuesta = SuscriptoresModel::InsertGrandesAnimalesSuscriptor($datosModel);
	}
}

//ver si la fila existe para insertar o editar: 

$existe = SuscriptoresModel::existeInfoLaboralSuscriptor($datosModel['usuario']);
	if ($existe[0]!=''){
		 $respuesta = SuscriptoresModel::editProfesionSuscriptor($datosModel, $datosModel['usuario']);	
	} else {
	 	$respuesta = SuscriptoresModel::InsertProfesionSuscriptor($datosModel);	
	 	$respuesta = "Cambio Realizado con éxito";

	}



 
    return $respuesta;
 }

 	public function insertarFormularioSuscripcion ($datos){
	$datos = urldecode($datos);
	$array;
	$strArray = explode("&", $datos);

    foreach($strArray as $item) {
       list($key, $valor) = explode("=", $item);
        $array[$key] = $valor;
    }
//sus usuario general
if (isset($array['email'])) $datosModel['email']= htmlentities($array['email']); else $datosModel['email'] = 'NA';
if (isset($array['nombre'])) $datosModel['nombre']= htmlentities($array['nombre']); else $datosModel['nombre'] = 'NA';
if (isset($array['apellido'])) $datosModel['apellido']= htmlentities($array['apellido']); else $datosModel['apellido'] = 'NA';


if (isset($array['comentario'])) $datosModel['comentario']= htmlentities($array['comentario']); else $datosModel['comentario'] = 'NA';


$respuesta = SuscriptoresModel::InsertUsuarioSuscriptor($datosModel);
if ($respuesta == 'ok'){
$respuesta = SuscriptoresModel::LeerUltimoUsuario();
$datosModel['usuario'] = $respuesta[0];


//traer usuario
// sus suscripciones


if (isset($array['moti_ed_digital'])) $datosModel['moti_ed_digital']= 1; else $datosModel['moti_ed_digital'] = 0;
if (isset($array['dosm_ed_digital'])) $datosModel['dosm_ed_digital']= 1; else $datosModel['dosm_ed_digital'] = 0;
if (isset($array['moti_ed_impreso'])) $datosModel['moti_ed_impreso']= 1; else $datosModel['moti_ed_impreso'] = 0;
if (isset($array['dosm_ed_impreso'])) $datosModel['dosm_ed_impreso']= 1; else $datosModel['dosm_ed_impreso'] = 0;
$count=0;
if (($datosModel['dosm_ed_impreso'] == 1)||($datosModel['dosm_ed_impreso'] == 1)){
	$datosModel['forma_envio'] = 'POSTAL'; 
	$count++;
}
if (($datosModel['moti_ed_digital'] == 1)||($datosModel['dosm_ed_digital'] == 1)){
	$datosModel['forma_envio'] = 'ELECTRONICO'; 
	$count++;
}
if ($count ==2){
	$datosModel['forma_envio'] = 'AMBOS'; 
}

$respuesta = SuscriptoresModel::InsertSuscripcion($datosModel);


// sus correo postal
if ((isset($array['pais']))&&(is_numeric($array['pais']))) $datosModel['pais']= htmlentities($array['pais']); else $datosModel['pais'] = NULL;
if (isset($array['provincia'])) $datosModel['provincia']= htmlentities($array['provincia']); else $datosModel['provincia'] = NULL;
if ((isset($array['localidad']))&&(is_numeric($array['localidad']))) $datosModel['localidad']= htmlentities($array['localidad']); else $datosModel['localidad'] = NULL;
if ((isset($array['cod_postal']))&&(is_numeric($array['cod_postal']))) $datosModel['cod_postal']= htmlentities($array['cod_postal']); else $datosModel['cod_postal'] = '0';
if (isset($array['calle'])) $datosModel['calle']= htmlentities($array['calle']); else $datosModel['calle'] = 'NA';
if (isset($array['numero'])) $datosModel['numero']= htmlentities($array['numero']); else $datosModel['numero'] = NULL;
if (isset($array['piso'])) $datosModel['piso']= htmlentities($array['piso']); else $datosModel['piso'] = 'NA';


$respuesta = SuscriptoresModel::InsertDomicilioSuscriptor($datosModel);

// sus info profesional

//is_num

if ((isset($array['tipo-profesional']))&&(is_numeric($array['tipo-profesional']))) $datosModel['tipo-profesional']= $array['tipo-profesional']; else $datosModel['tipo-profesional'] = '0';
if ((isset($array['carrera']))&&(is_numeric($array['carrera']))) $datosModel['carrera']= $array['carrera']; else $datosModel['carrera'] = '0';
if ((isset($array['institucion']))&&(is_numeric($array['institucion']))) $datosModel['institucion']= $array['institucion']; else $datosModel['institucion'] = '0';
if ((isset($array['tipo_empresa']))&&(is_numeric($array['tipo_empresa']))) $datosModel['tipo_empresa']= $array['tipo_empresa']; else $datosModel['tipo_empresa'] = '0';

if ((isset($array['area-empresa']))&&(is_numeric($array['area-empresa']))) $datosModel['area-empresa']= $array['area-empresa']; else $datosModel['area-empresa'] = '0';
if ((isset($array['cargo-empresa']))&&(is_numeric($array['cargo-empresa']))) $datosModel['cargo-empresa']= $array['cargo-empresa']; else $datosModel['cargo-empresa'] = '0';
if ((isset($array['rol-laboral']))&&(is_numeric($array['rol-laboral']))) $datosModel['rol-laboral']= $array['rol-laboral']; else $datosModel['rol-laboral'] = '0';


if ((isset($array['tipo-animal']))&&(is_numeric($array['tipo-animal']))&&($array['tipo-animal']==0)) {	
		$datosModel['pequenos-animales']= 1; 
		$datosModel['grandes-animales']= 0; 
	} else {
		$datosModel['pequenos-animales'] =0;
		$datosModel['grandes-animales']= 1; 
	}


if ((isset($array['subact-laboral']))&&(is_numeric($array['subact-laboral']))&&($array['act-laboral']>0)) $datosModel['act-laboral']= $array['subact-laboral']; 
	elseif ((isset($array['act-laboral']))&&(is_numeric($array['act-laboral'])))
		$datosModel['act-laboral']= $array['act-laboral']; 
	else
		$datosModel['act-laboral']= 0; 



$respuesta = SuscriptoresModel::InsertProfesionSuscriptor($datosModel);

//intereses
foreach ($array as $key => $value) {
	$a = substr($key, 0, -1);
	if ($a == 'chkint-'){
		$datosModel['intereses'] = $value;
	$respuesta = SuscriptoresModel::InsertInteresesSuscriptor($datosModel);
	}
}
//grandes_animales
foreach ($array as $key => $value) {
	$a = substr($key, 0, -1);
	if ($a == 'chk_gran_ani-'){
		$datosModel['gran_ani'] = $value;
	$respuesta = SuscriptoresModel::InsertGrandesAnimalesSuscriptor($datosModel);
	}
}


 
 }   return $datosModel;
 }


 public function eliminarSuscripcion ($id){
 	if ((isset($id))&&(is_numeric($id))){
	$respuesta = SuscriptoresModel::EliminarSuscriptor($id);
	$respuesta = SuscriptoresModel::EliminarPostal($id);
	$respuesta = SuscriptoresModel::EliminarProfesional($id);
	$respuesta = SuscriptoresModel::EliminarGrandesAnimalesSuscriptor($id); 	
	$respuesta = SuscriptoresModel::EliminarInteresesSuscriptor($id); 	

	return 'Eliminado con éxito';
 	} else {

 	return 'ERROR';
 	}


 }
 public function TablaImportaciones (){
 	$tabla = SuscriptoresModel::tablaTemporal();

 	foreach ($tabla as $key => $value) {
		echo '<tr>
				<td>'.$value['tmt_id'].'</td>
				<td>'.$value['tmt_fecha'].'</td>
				<td><form method="post"><input type="hidden" value="'.$value['tmt_id'].'" name="tabla">
						<button class="btn" ><i class="text-primary far fa-arrow-alt-circle-right"></i></button>

					</form>
					</td>
		</tr>'; 
 	}
 }

 public function TablaImportacionesxID ($id){
 	$tabla = SuscriptoresModel::tablaTemporalxID($id);
 	$i = 0;
echo '<thead class="thead-dark">
		<tr>
		<th>INSERT</th>
		<th>ELIMINAR</th>
		<th>nombre</th>
		<th>apellido</th>
		<th>correo_1</th>
		<th>correo_2</th>
		<th>telefono_1</th>
		<th>telefono_2</th>
		<th>celular</th>
		<th>nacimiento</th>
		<th>dni</th>
		<th>tipo_direccion</th>
		<th>calle</th>
		<th>numero</th>
		<th>piso_dpto</th>
		<th>cp</th>
		<th>localidad</th>
		<th>partido</th>
		<th>ciudad</th>
		<th>provincia</th>
		<th>pais</th>
		<th>formacion_profesional</th>
		<th>formacion_carrera</th>
		<th>formacion_institucion</th>
		<th>empresa_nombre</th>
		<th>empresa_actividad</th>
		<th>empresa_area</th>
		<th>empresa_cargo</th>
		<th>empresa_web</th>
		<th>institucion_nombre</th>
		<th>institucion_departamento</th>
		<th>institucion_cargo</th>
		<th>independiente</th>
		<th>actividad_veterinaria</th>
		<th>actividad_industria</th>
		<th>actividad_agropecuaria</th>
		<th>actividad_dueno</th>
		<th>actividad_peq_animales</th>
		<th>actividad_gran_animales</th>
		</tr>
	    </thead>
    <tbody>
';

 	 foreach ($tabla as $key => $value) {
		
		if (($value['tmp_correo_1'] != '')&&(
			($value['tmp_correo_1'] == $tabla[$key-1]['tmp_correo_1'])||
			($value['tmp_correo_1'] == $tabla[$key+1]['tmp_correo_1']))){
				$color= 'text-danger';
		} else {
				$color= '';

		}
		echo '<tr class="'.$color.'">
				<td><input type="hidden" value="'.$value['tmp_id'].'" id="'.$value['tmp_id'].'" name="insert_temporal">
					<button class="btn insert_temporal" ><i class="text-primary far fa-arrow-alt-circle-right"></i></button>
				</td>
				<td><input type="hidden" value="'.$value['tmp_id'].'" id="delet_id_excel">
					<button class="btn delet_id_excel" ><i class="text-danger fas fa-trash-alt"></i></button>
				</td>';

		for ($i = 2; $i < 39  ;$i++){ 
		echo '<td>'.$value[$i].'</td>';
		}	
		echo '</tr>'; 
 	}
 	echo '</tbody>';
 }



 public function ImportarExcel ($file){

$id_importacion = SuscriptoresModel::LeerUltimoInsertExcel();
$id_importacion = $id_importacion[0]+1;
  $xlsx = new SimpleXLSX($file);
	$j=0;
	$insert ='';
	$respuesta = SuscriptoresModel::InsertarIDTabla($id_importacion); 	
	echo $id_importacion;
	  foreach ($xlsx->rows() as $fields)
		  {
		  	$i = 0;
		     $insert = '('.$id_importacion.',';


		     for ($i; $i<66 ; $i++){
		     	$fila[$j][$i] = $fields[$i];
		    
				if (isset($fields[$i])) $dato= htmlentities($fields[$i]); else $dato= 'NA';
			     $insert = $insert."'". $dato."',";
		     }
		    $insert = substr($insert, 0, -1);
		    $insert = $insert.')';		     
		     $j++;

if ($j >3) //hago un insert por cada fila para poder hacer validación de campos en algun momento y solo insertar las que correspondan usando pdo. Las primeras 3 corresponden al encabezado
	$respuesta = SuscriptoresModel::InsertarExcel_Temporal($insert); 	
		  }

if (isset($fila)){

	unset($fila[0]);
	unset($fila[1]);
	echo '<table class="table tabla-pre-excel table-striped table-bordered table-sm table-responsive datatables-basic" id="tb_personas">
	  <thead class="thead-dark">
		<tr>';
    
  for ($i=0; $i < 66 ; $i++) { 
    echo '<th>' .$fila[2][$i] . '</th>';
  }
  echo '</tr>
  	</thead>';

	unset($fila[2]);

foreach ($fila as $key => $value) {

  echo '<tr>';
    
  for ($i=0; $i < 66 ; $i++) { 
    echo '<td>' .$value[$i] . '</td>';
  }

  echo '</tr>';

}
  
  echo "</table>";}

}

	public function TablaSuscriptosDuplicadosController (){
		$respuesta = SuscriptoresModel::TablaSuscriptosDulpicadosModel(); 
		foreach ($respuesta as $key => $value) {
	
	$nombre= html_entity_decode($value['sug_nombre']);
	$apellido= html_entity_decode($value['sug_apellido']);
	$correo= html_entity_decode($value['sug_correo_1']);
		
		if ($correo!=""){
				echo '
				<tr>
					<td>'.$value['sug_id'].'</td>
					<td>'.$nombre.'</td>
					<td>'.$apellido.'</td>
					<td>'.$correo.'</td>
					<td>'.$value['contador'].'</td>
					<td><input type="hidden" value="'.$value['sug_id'].'"> 	
						<button id="btn-resumen-tmp-act" type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-search-plus"></i></button></td>
					<td><input type="hidden" value="'.$value['sug_id'].'"> 	
						<a href="index.php?action=editar_suscriptor_duplicado_excel&id='.$value['sug_id'].'" class="btn btn-outline-success btn-sm"><i class="fas fa-edit"></i></a></td>
					</tr>
			';}
	}
}
	public function TablaSuscriptosDuplicadosTemporalController (){
		$respuesta = SuscriptoresModel::TablaSuscriptosDulpicadosTemporalModel(); 

		foreach ($respuesta as $key => $value) {
	
	$correo= html_entity_decode($value['correo']);
		
		if ($correo!=""){
				echo '
				<tr>
					<td>'.$correo.'</td>
					<td>'.$value['contador'].'</td>
					<td><input type="hidden" value="'.$correo.'"> 	
						<button id="btn-resumen" type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-search-plus"></i></button></td>
					<td><input type="hidden" value="'.$correo.'"> 	
						<a id="btn-resumen" href="index.php?action=editar_duplicado_temporal&correo='.$correo.'" class="btn btn-outline-success btn-sm"><i class="fas fa-edit"></i></a></td>
					</tr>
			';}
	}
}
	public function resumen_duplicado_tmp ($correo){
		$respuesta = SuscriptoresModel::SuscriptosDulpicadosTemporalxVariableModel($correo); 

		$html = '<table class="table"><tr><th>Fecha Insert</th><th>ID TEMP</th><th>Nombre</th><th>Apellido</th></tr>';
		foreach ($respuesta as $key => $value) {
			$html = $html .'<tr><td>'.$value['tmt_fecha'] .'</td><td>'.' tmp_'.$value['tmp_id'] .'</td><td>'.$value['tmp_nombre'] .'</td><td>'.$value['tmp_apellido'] .'</tr>';

			}
			$html = $html.'</table>';
		return $html;

}
	public function resumen_duplicado_tmp_act ($correo){
		$respuesta = SuscriptoresModel::SuscriptosDulpicadosActivoTemporalxVariableModel($correo); 

		$html = '<table class="table"><tr><th>Fecha Insert</th><th>ID TEMP</th><th>Nombre</th><th>Apellido</th></tr>';
		foreach ($respuesta as $key => $value) {
			$html = $html .'<tr><td>'.$value['tmt_fecha'] .'</td><td>'.' tmp_'.$value['tmp_id'] .'</td><td>'.$value['tmp_nombre'] .'</td><td>'.$value['tmp_apellido'] .'</tr>';

			}
			$html = $html.'</table>';
		return $html;

}
	public function EncabezadoDuplicadosTemporal ($correo){
		$respuesta = SuscriptoresModel::SuscriptosDulpicadosTemporalxVariableModel($correo); 

		foreach ($respuesta as $key => $value) {
			echo '<th>TMP_'.$value['tmp_id'].' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			            <button id="btn-eliminar" type="button" class="btn btn-outline-danger btn-sm btn-delet_id_excel"><span><i class="fas fa-trash-alt"></i></button>
				</th>';

		}
		echo '</tr><tr><td></td>';
		foreach ($respuesta as $key => $value) {
			echo '<th>'.$value['tmt_fecha'].'</th>';

		}
}
	public function full_duplicado_tmp ($correo){
		$respuesta = SuscriptoresModel::SuscriptosDulpicadosTemporalxVariableModel($correo); 


	$fila[0]='<th>ID</th>';
	$fila[1]='<th>Partida</th>';
	$fila[2]='<th>Nombre</th>';
	$fila[3]='<th>Apellido</th>';
	$fila[4]='<th>Correo_1</th>';
	$fila[5]='<th>Correo_2</th>';
	$fila[6]='<th>Telefono_1</th>';
	$fila[7]='<th>Telefono_2</th>';
	$fila[8]='<th>Celular</th>';
	$fila[9]='<th>Nacimiento</th>';
	$fila[10]='<th>Dni</th>';
	$fila[11]='<th>Tipo_direccion</th>';
	$fila[12]='<th>Calle</th>';
	$fila[13]='<th>Numero</th>';
	$fila[14]='<th>Piso_dpto</th>';
	$fila[15]='<th>CP</th>';
	$fila[16]='<th>Localidad</th>';
	$fila[17]='<th>Partido</th>';
	$fila[18]='<th>Ciudad</th>';
	$fila[19]='<th>Provincia</th>';
	$fila[20]='<th>Pais</th>';
	$fila[21]='<th>Formacion_profesional</th>';
	$fila[22]='<th>Formacion_carrera</th>';
	$fila[23]='<th>Formacion_institucion</th>';
	$fila[24]='<th>Empresa_nombre</th>';
	$fila[25]='<th>Empresa_actividad</th>';
	$fila[26]='<th>Empresa_area</th>';
	$fila[27]='<th>Empresa_cargo</th>';
	$fila[28]='<th>Empresa_web</th>';
	$fila[29]='<th>Institucion_nombre</th>';
	$fila[30]='<th>Institucion_departamento</th>';
	$fila[31]='<th>Institucion_cargo</th>';
	$fila[32]='<th>Independiente</th>';
	$fila[33]='<th>Actividad_veterinaria</th>';
	$fila[34]='<th>Actividad_industria</th>';
	$fila[35]='<th>Actividad_agropecuaria</th>';
	$fila[36]='<th>Actividad_dueno</th>';
	$fila[37]='<th>Actividad_peq_animales</th>';
	$fila[38]='<th>Actividad_gran_animales</th>';
	$fila[69]='<th>FECHA</th>';

	$count =0;
	foreach ($respuesta as $key => $value) {
		$count++;
		}
				echo '<tr>'.$fila[0];
				for ($j = 0; $j < $count ;$j++){ 
					echo '<th class="'.$respuesta[$j][0].'">TMP_'.$respuesta[$j][0].'
					<input type="hidden" value="'.$respuesta[$j][0].'">
					<span class="text-danger"><a class="btn-eliminar-dup-tmp btn btn-outline-danger btn-sm btn-submenu ml-3"><i class="fas fa-trash-alt"></i></a></span>
					<span class="text-success"> <a class="btn-insert-dup-tmp btn btn-outline-success btn-sm btn-submenu"><i class="fas fa-arrow-circle-right"></i></a></span>
</th>';
				}
				echo '</tr><tr>'.$fila[1];
				for ($j = 0; $j < $count ;$j++){ 
					echo '<th class="'.$respuesta[$j][0].'">'.$respuesta[$j][1].'</th>';
				}
				echo '</tr><tr>'.$fila[69];
				for ($j = 0; $j < $count ;$j++){ 
					echo '<th class="'.$respuesta[$j][0].'">'.$respuesta[$j][69].'</th>';
				}

		 
             echo' </tr></thead>
             <tbody>';
			for ($i = 2; $i < 39 ;$i++){ 
				echo '<tr>';
				echo $fila[$i];
				for ($j = 0; $j < $count ;$j++){ 
					echo '<td class="deshabilitado '.$respuesta[$j][0].'"><input class="form-control" disabled name="'.$respuesta[$j][0].'['.$i.']" value="'.$respuesta[$j][$i].'"><small class="form-text text-muted"></small></td>';
				}
				echo '</tr>';
		}
	

}
	public function editar_duplicado_temporal ($datos){

foreach ($datos as $row => $item) {
	$update ='';
	if (is_numeric($row)){
		foreach ($item as $key => $value) {
		$value = trim($value);
		if($key == 2) $update = $update . "tmp_nombre='".$value."', ";
		if($key == 3) $update = $update . "tmp_apellido='".$value."', ";
		if($key == 4) $update= $update."tmp_correo_1='".$value."', ";
		if($key == 5) $update= $update."tmp_correo_2='".$value."', ";
		if($key == 6) $update= $update."tmp_telefono_1='".$value."', ";
		if($key == 7) $update= $update."tmp_telefono_2='".$value."', ";
		if($key == 8) $update= $update."tmp_celular='".$value."', ";
		if($key == 9) $update= $update."tmp_nacimiento='".$value."', ";
		if($key == 10) $update= $update."tmp_dni='".$value."', ";
		if($key == 11) $update= $update."tmp_tipo_direccion='".$value."', ";
		if($key == 12) $update= $update."tmp_calle='".$value."', ";
		if($key == 13) $update= $update."tmp_numero='".$value."', ";
		if($key == 14) $update= $update."tmp_piso_dpto='".$value."', ";
		if($key == 15) $update= $update."tmp_cp='".$value."', ";
		if($key == 16) $update= $update."tmp_localidad='".$value."', ";
		if($key == 17) $update= $update."tmp_partido='".$value."', ";
		if($key == 18) $update= $update."tmp_ciudad='".$value."', ";
		if($key == 19) $update= $update."tmp_provincia='".$value."', ";
		if($key == 20) $update= $update."tmp_pais='".$value."', ";
		if($key == 21) $update= $update."tmp_formacion_profesional='".$value."', ";
		if($key == 22) $update= $update."tmp_formacion_carrera='".$value."', ";
		if($key == 23) $update= $update."tmp_formacion_institucion='".$value."', ";
		if($key == 24) $update= $update."tmp_empresa_nombre='".$value."', ";
		if($key == 25) $update= $update."tmp_empresa_actividad='".$value."', ";
		if($key == 26) $update= $update."tmp_empresa_area='".$value."', ";
		if($key == 27) $update= $update."tmp_empresa_cargo='".$value."', ";
		if($key == 28) $update= $update."tmp_empresa_web='".$value."', ";
		if($key == 29) $update= $update."tmp_institucion_nombre='".$value."', ";
		if($key == 30) $update= $update."tmp_institucion_departamento='".$value."', ";
		if($key == 31) $update= $update."tmp_institucion_cargo='".$value."', ";
		if($key == 32) $update= $update."tmp_independiente='".$value."', ";
		if($key == 33) $update= $update."tmp_actividad_veterinaria='".$value."', ";
		if($key == 34) $update= $update."tmp_actividad_industria='".$value."', ";
		if($key == 35) $update= $update."tmp_actividad_agropecuaria='".$value."', ";
		if($key == 36) $update= $update."tmp_actividad_dueno='".$value."', ";
		if($key == 37) $update= $update."tmp_actividad_peq_animales='".$value."', ";
		if($key == 38) $update= $update."tmp_actividad_gran_animales='".$value."', ";


		}
	$update = substr($update, 0, -2);	
	$update = $update . ' WHERE tmp_id = '. $row;	
	}
	$respuesta = SuscriptoresModel::EditarDulpicadosTemporalModel($update); 


}
}

	public function full_duplicado_activo_tmp ($id){
		$respuesta = SuscriptoresModel::SuscriptosDulpicadosActivoTemporalxVariableModel($id); 
		$activo = DashboardModel::DatosFullSuscritor($id); 


	$fila[0]='<th>ID</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sug_id'].'"><input class="form-control" disabled name="'.$activo[0]['sug_id'].'" value="'.$activo[0]['sug_id'].'"></td>';
	$fila[1]='<th>Partida</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sug_insert'].'"><input class="form-control" disabled name="'.$activo[0]['sug_insert'].'" value="'.$activo[0]['sug_insert'].'"></td>';
	$fila[2]='<th>Nombre</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sug_nombre'].'"><input class="form-control" disabled name="'.$activo[0]['sug_nombre'].'" value="'.$activo[0]['sug_nombre'].'"></td>';
	$fila[3]='<th>Apellido</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sug_apellido'].'"><input class="form-control" disabled name="'.$activo[0]['sug_apellido'].'" value="'.$activo[0]['sug_apellido'].'"></td>';
	$fila[4]='<th>Correo_1</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sug_correo_1'].'"><input class="form-control" disabled name="'.$activo[0]['sug_correo_1'].'" value="'.$activo[0]['sug_correo_1'].'"></td>';
	$fila[5]='<th>Correo_2</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sug_correo_2'].'"><input class="form-control" disabled name="'.$activo[0]['sug_correo_2'].'" value="'.$activo[0]['sug_correo_2'].'"></td>';
	$fila[6]='<th>Telefono_1</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sug_telefono_1'].'"><input class="form-control" disabled name="'.$activo[0]['sug_telefono_1'].'" value="'.$activo[0]['sug_telefono_1'].'"></td>';
	$fila[7]='<th>Telefono_2</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sug_telefono_2'].'"><input class="form-control" disabled name="'.$activo[0]['sug_telefono_2'].'" value="'.$activo[0]['sug_telefono_2'].'"></td>';
	$fila[8]='<th>Celular</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sug_celular'].'"><input class="form-control" disabled name="'.$activo[0]['sug_celular'].'" value="'.$activo[0]['sug_celular'].'"></td>';
	$fila[9]='<th>Nacimiento</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sug_nacimiento'].'"><input class="form-control" disabled name="'.$activo[0]['sug_nacimiento'].'" value="'.$activo[0]['sug_nacimiento'].'"></td>';
	$fila[10]='<th>Dni</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sug_dni'].'"><input class="form-control" disabled name="'.$activo[0]['sug_dni'].'" value="'.$activo[0]['sug_dni'].'"></td>';
	$fila[11]='<th>Tipo_direccion</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['scp_tipo'].'"><input class="form-control" disabled name="'.$activo[0]['scp_tipo'].'" value="'.$activo[0]['scp_tipo'].'"></td>';
	$fila[12]='<th>Calle</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['scp_calle'].'"><input class="form-control" disabled name="'.$activo[0]['scp_calle'].'" value="'.$activo[0]['scp_calle'].'"></td>';
	$fila[13]='<th>Numero</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['scp_numero'].'"><input class="form-control" disabled name="'.$activo[0]['scp_numero'].'" value="'.$activo[0]['scp_numero'].'"></td>';
	$fila[14]='<th>Piso_dpto</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['scp_piso_dto'].'"><input class="form-control" disabled name="'.$activo[0]['scp_piso_dto'].'" value="'.$activo[0]['scp_piso_dto'].'"></td>';
	$fila[15]='<th>CP</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['scp_cp'].'"><input class="form-control" disabled name="'.$activo[0]['scp_cp'].'" value="'.$activo[0]['scp_cp'].'"></td>';
	$fila[16]='<th>Localidad</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['slo_nombre'].'"><input class="form-control" disabled name="'.$activo[0]['slo_nombre'].'" value="'.$activo[0]['slo_nombre'].'"></td>';
	$fila[17]='<th>Partido</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0][''].'"></td>';
	$fila[18]='<th>Ciudad</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0][''].'"></td>';
	$fila[19]='<th>Provincia</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['spr_nombre'].'"><input class="form-control" disabled name="'.$activo[0]['spr_nombre'].'" value="'.$activo[0]['spr_nombre'].'"></td>';
	$fila[20]='<th>Pais</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sup_nombre'].'"><input class="form-control" disabled name="'.$activo[0]['sup_nombre'].'" value="'.$activo[0]['sup_nombre'].'"></td>';
	$fila[21]='<th>Formacion_profesional</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sup_nombre'].'"><input class="form-control" disabled name="'.$activo[0]['sup_nombre'].'" value="'.$activo[0]['sup_nombre'].'"></td>';
	$fila[22]='<th>Formacion_carrera</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sca_nombre'].'"><input class="form-control" disabled name="'.$activo[0]['sca_nombre'].'" value="'.$activo[0]['sca_nombre'].'"></td>';
	$fila[23]='<th>Formacion_institucion</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sit_nombre'].'"><input class="form-control" disabled name="'.$activo[0]['sit_nombre'].'" value="'.$activo[0]['sit_nombre'].'"></td>';
	$fila[24]='<th>Empresa_nombre</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sip_empresa'].'"><input class="form-control" disabled name="'.$activo[0]['sip_empresa'].'" value="'.$activo[0]['sip_empresa'].'"></td>';
	$fila[25]='<th>Empresa_actividad</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sal_nombre'].'"><input class="form-control" disabled name="'.$activo[0]['sal_nombre'].'" value="'.$activo[0]['sal_nombre'].'"></td>';
	$fila[26]='<th>Empresa_area</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sar_nombre'].'"><input class="form-control" disabled name="'.$activo[0]['sar_nombre'].'" value="'.$activo[0]['sar_nombre'].'"></td>';
	$fila[27]='<th>Empresa_cargo</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['scr_nombre'].'"><input class="form-control" disabled name="'.$activo[0]['scr_nombre'].'" value="'.$activo[0]['scr_nombre'].'"></td>';
	$fila[28]='<th>Empresa_web</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sip_web'].'"><input class="form-control" disabled name="'.$activo[0]['sip_web'].'" value="'.$activo[0]['sip_web'].'"></td>';
	$fila[29]='<th>Institucion_nombre</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sip_empresa'].'"><input class="form-control" disabled name="'.$activo[0]['sip_empresa'].'" value="'.$activo[0]['sip_empresa'].'"></td>';
	$fila[30]='<th>Institucion_departamento</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sar_nombre'].'"><input class="form-control" disabled name="'.$activo[0]['sar_nombre'].'" value="'.$activo[0]['sar_nombre'].'"></td>';
	$fila[31]='<th>Institucion_cargo</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['scr_nombre'].'"><input class="form-control" disabled name="'.$activo[0]['scr_nombre'].'" value="'.$activo[0]['scr_nombre'].'"></td>';
	$fila[32]='<th>Independiente</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sip_dueno_empleado'].'"><input class="form-control" disabled name="'.$activo[0]['sip_dueno_empleado'].'" value="'.$activo[0]['sip_dueno_empleado'].'"></td>';
	$fila[33]='<th>Actividad_veterinaria</th><td class="deshabilitado activo_'.$id.'"></td>';
	$fila[34]='<th>Actividad_industria</th><td class="deshabilitado activo_'.$id.'"></td>';
	$fila[35]='<th>Actividad_agropecuaria</th><td class="deshabilitado activo_'.$id.'"></td>';
	$fila[36]='<th>Actividad_dueno</th><td class="deshabilitado activo_'.$id.'"></td>';
	$fila[37]='<th>Actividad_peq_animales</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sip_pequenos_animales'].'"><input class="form-control" disabled name="'.$activo[0]['sip_pequenos_animales'].'" value="'.$activo[0]['sip_pequenos_animales'].'"></td>';
	$fila[38]='<th>Actividad_gran_animales</th><td class="deshabilitado activo_'.$id.'"><input type="hidden" value="'.$activo[0]['sip_grandes_animales'].'"><input class="form-control" disabled name="'.$activo[0]['sip_grandes_animales'].'" value="'.$activo[0]['sip_grandes_animales'].'"></td>';
	$fila[68]='<th>FECHA</th><td>'.$activo[0]['sug_actualizacion'].'</td>';


	$count =0;

	var_dump($activo);
	foreach ($respuesta as $key => $value) {
		$count++;
		}
				echo '<tr>'.$fila[0];

				for ($j = 0; $j < $count ;$j++){ 
					echo '<th class="'.$respuesta[$j][0].'">TMP_'.$respuesta[$j][0].'
					<input type="hidden" value="'.$respuesta[$j][0].'">
					<span class="text-danger"><a class="btn-eliminar-dup-tmp btn btn-outline-danger btn-sm btn-submenu ml-3"><i class="fas fa-trash-alt"></i></a></span>
					<span class="text-success"><a class="btn-insert-dup-tmp btn btn-outline-success btn-sm btn-submenu"><i class="fas fa-arrow-circle-right"></i></a></span>
</th>';
				}


				echo '</tr><tr>'.$fila[1];				
				for ($j = 0; $j < $count ;$j++){ 
					echo '<th class="'.$respuesta[$j][0].'">'.$respuesta[$j][1].'</th>';
				}
				echo '</tr><tr>'.$fila[68];				for ($j = 0; $j < $count ;$j++){ 
					echo '<th class="'.$respuesta[$j][0].'">'.$respuesta[$j][68].'</th>';
				}

		 
             echo' </tr></thead>
             <tbody>';
			for ($i = 2; $i < 39 ;$i++){ 
				echo '<tr>';
				echo $fila[$i];
				for ($j = 0; $j < $count ;$j++){ 
					echo '<td class="deshabilitado '.$respuesta[$j][0].'"><input class="form-control" disabled name="'.$respuesta[$j][0].'['.$i.']" value="'.$respuesta[$j][$i].'"><small class="form-text text-muted"></small></td>';
				}
				echo '</tr>';
		}
		}
	


}

?>