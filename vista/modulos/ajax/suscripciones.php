<?php 

require_once "../../../controlador/suscripciones.php";
require_once "../../../modelo/suscripciones.php";


class Ajax{
	public $provincia;
	public $formulario;


	public function consultarPaisesAjax(){
		$respuesta = SuscriptoresController::ConsultarPaises(); 
		echo $respuesta;
	}
	public function consultarProvinciaAjax(){
		$respuesta = SuscriptoresController::ConsultarProvincia(); 
		echo $respuesta;
	}
	
	public function consultarLocalidadesAjax(){
		$provincia = $this->provincia;
		$respuesta = SuscriptoresController::ConsultarLocalidades($provincia); 
		echo $respuesta;
	}
		public function consultarProfesionesAjax(){
		$respuesta = SuscriptoresController::ConsultarProfesiones(); 
		echo $respuesta;
	}
		public function consultarCarreraAjax(){
		$respuesta = SuscriptoresController::ConsultarCarrera(); 
		echo $respuesta;
	}
		public function consultarInstitucionAjax(){
		$respuesta = SuscriptoresController::ConsultarInstitucion(); 
		echo $respuesta;
	}
		public function consultarAreaAjax(){
		$respuesta = SuscriptoresController::consultarArea(); 
		echo $respuesta;
	}
		public function consultarCargoAjax(){
		$respuesta = SuscriptoresController::consultarCargo(); 
		echo $respuesta;
	}
		public function consultarInteresesAjax(){
		$respuesta = SuscriptoresController::consultarIntereses(); 
		echo $respuesta;
	}
		public function consultarGrandesAnimalesAjax(){
		$respuesta = SuscriptoresController::consultarGrandesAnimales(); 
		echo $respuesta;
	}
		public function consultarActividadLaboralAjax(){
		$respuesta = SuscriptoresController::consultarActividadLaboral();
		echo $respuesta;
	}
		public function formularioAjax(){
		$formulario = $this->formulario;
		$respuesta = SuscriptoresController::insertarFormularioSuscripcion($formulario); 
		echo($respuesta);
	}

		public function editDatosPersonales(){
		$formulario = $this->formulario;
		$respuesta = SuscriptoresController::editDatosPersonalesSuscripcion($formulario); 
		echo ($respuesta);
	}

		public function editDatosPostales(){
		$formulario = $this->formulario;
		$respuesta = SuscriptoresController::editDatosPostalesSuscripcion($formulario); 
		echo ($respuesta);
	}
		public function editSuscripciones(){
		$formulario = $this->formulario;
		$respuesta = SuscriptoresController::editSuscripciones($formulario); 
		echo ($respuesta);
	}

		public function editLaborales(){
		$formulario = $this->formulario;
		$respuesta = SuscriptoresController::editLaborales($formulario); 
		echo ($respuesta);
	}
		public function editOtros(){
		$formulario = $this->formulario;
		$respuesta = SuscriptoresController::editOtros($formulario); 
		echo ($respuesta);
	}
		public function deleteTemporal(){
		$formulario = $this->formulario;
		$respuesta = SuscriptoresController::deleteTemporal($formulario); 
		echo ($respuesta);
	}
		public function insertTemporal(){
		$formulario = $this->formulario;
		$respuesta = SuscriptoresController::insertTemporal($formulario['insert_temporal'], 0); 
		echo ($respuesta);
	}
		public function insertTemporal2(){
		$formulario = $this->formulario;
		$respuesta = SuscriptoresController::insertTemporal($formulario['insert_temporal2'], 1); 
		echo ($respuesta);
	}
		public function resumen_duplicado_tmp(){
		$formulario = $this->formulario;

		$respuesta = SuscriptoresController::resumen_duplicado_tmp($formulario['resumen_duplicado_tmp'], $formulario['filtro']); 
		echo ($respuesta);
	}

		public function resumen_duplicado_tmp_act(){
		$formulario = $this->formulario;
		$respuesta = SuscriptoresController::resumen_duplicado_tmp_act($formulario['resumen_duplicado_tmp_act']); 
		echo ($respuesta);
	}


}

	if(isset($_POST["pais"])){
	$a = new Ajax();
	$a -> consultarPaisesAjax();
}
	if(isset( $_POST["provincias"])){
	$a = new Ajax();
	$a -> consultarProvinciaAjax();
}
	if(isset( $_POST["localidades"])){
	$a = new Ajax();
	$a -> provincia = $_POST["localidades"];
	$a -> consultarLocalidadesAjax();
}
	if(isset( $_POST["profesiones"])){
	$a = new Ajax();
	$a -> consultarProfesionesAjax();
}
	if(isset( $_POST["carreras"])){
	$a = new Ajax();
	$a -> consultarCarreraAjax();
}
	if(isset( $_POST["instituciones"])){
	$a = new Ajax();
	$a -> consultarInstitucionAjax();
}
	if(isset( $_POST["area"])){
	$a = new Ajax();
	$a -> consultarAreaAjax();
}
	if(isset( $_POST["cargo"])){
	$a = new Ajax();
	$a -> consultarCargoAjax();
}
	if(isset( $_POST["intereses"])){
	$a = new Ajax();
	$a -> consultarInteresesAjax();
}
	if(isset( $_POST["grandes_animales"])){
	$a = new Ajax();
	$a -> consultarGrandesAnimalesAjax();
}
	if(isset( $_POST["actlaboral"])){
	$a = new Ajax();
	$a -> consultarActividadLaboralAjax();
}
	if(isset($_POST["formulario"])){
	$a = new Ajax();
	$a -> formulario = $_POST["datos"];
	$a -> formularioAjax();
}
	if(isset($_POST["edit_datos_personales"])){
	$a = new Ajax();
	$a -> formulario = $_POST;
	$a -> editDatosPersonales();
}
	if(isset($_POST["edit_datos_postales"])){
	$a = new Ajax();
	$a -> formulario = $_POST;
	$a -> editDatosPostales();
}
	if(isset($_POST["edit_suscripciones"])){
	$a = new Ajax();
	$a -> formulario = $_POST;
	$a -> editSuscripciones();
}
	if(isset($_POST["datos_laborales"])){
	$a = new Ajax();
	$a -> formulario = $_POST;
	$a -> editLaborales();
}
	if(isset($_POST["edit_otros"])){
	$a = new Ajax();
	$a -> formulario = $_POST;
	$a -> editOtros();
}
	if(isset($_POST["delete_temporal"])){
	$a = new Ajax();
	$a -> formulario = $_POST;
	$a -> deleteTemporal();
}
	if(isset($_POST["insert_temporal"])){
	$a = new Ajax();
	$a -> formulario = $_POST;
	$a -> insertTemporal();
}
	if(isset($_POST["insert_temporal2"])){
	$a = new Ajax();
	$a -> formulario = $_POST;
	$a -> insertTemporal2();
}
	if(isset($_POST["resumen_duplicado_tmp"])){
	$a = new Ajax();
	$a -> formulario = $_POST;
	$a -> resumen_duplicado_tmp();
}
	if(isset($_POST["resumen_duplicado_tmp_act"])){
	$a = new Ajax();
	$a -> formulario = $_POST;
	$a -> resumen_duplicado_tmp_act();
}


?>