<?php
class EnlacesModels{
	public function enlacesPaginasModel($enlaceModel){
		if ($enlaceModel == "inicio" ||  //todas las paginas
			$enlaceModel == "dashboard" ||
			$enlaceModel == "alta_suscripcion" ||
			$enlaceModel == "export_csv" ||
			$enlaceModel == "importar_excel" ||
			$enlaceModel == "duplicado_tmp_act" ||
			$enlaceModel == "duplicado_tmp_act_1" ||
			$enlaceModel == "duplicado_activo" ||
			$enlaceModel == "duplicado_temporal" ||
			$enlaceModel == "duplicado_excel" ||
			$enlaceModel == "editar_suscriptor_duplicado_excel" ||
			$enlaceModel == "login" ||
			$enlaceModel == "usuarios" ||
			$enlaceModel == "editar_suscriptor" ||
			$enlaceModel == "editar_duplicado_temporal" ||
			$enlaceModel == "perfil_usuario" ||
			$enlaceModel == "usuarios" ||
			$enlaceModel == "cierre" ||
			$enlaceModel == "listado" ||
			$enlaceModel == "salir" ) {
			$module = "vista/modulos/".$enlaceModel.".php";
		} elseif ($enlaceModel == "index" ) {
			$module = "vista/modulos/dashboard.php";
		} else {
			$module = "vista/modulos/dashboard.php";
		}
			return $module;
	}
}

?>
