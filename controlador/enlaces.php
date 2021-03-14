<?php
class Enlaces{
	public function enlacesControlador(){
		if(isset($_GET['action'])) {
			$enlaces =  $_GET['action'];
		} else {
			$enlaces =  "index";
		}
		$respuesta = EnlacesModels::enlacesPaginasModel($enlaces);
		include $respuesta;
	}
}
?>
