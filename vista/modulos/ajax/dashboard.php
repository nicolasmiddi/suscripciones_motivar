<?php 

require_once "../../../controlador/dashboard.php";
require_once "../../../modelo/dashboard.php";
require_once "../../../controlador/suscripciones.php";
require_once "../../../modelo/suscripciones.php";


class Ajax{
	public $a;
	
		public function eliminarSuscripcion(){
		$a = $this->a;
		$respuesta = SuscriptoresController::eliminarSuscripcion($a); 
		echo $respuesta;
	}
}

	if(isset($_POST["eliminar_suscripcion"])){
	$a = new Ajax();
	$a -> a = $_POST["eliminar_suscripcion"];
	$a -> eliminarSuscripcion();
}


?>
