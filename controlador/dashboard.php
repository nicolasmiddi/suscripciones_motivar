<?php


class DashboardController{
	public function TablaSuscriptosController (){
		$respuesta = DashboardModel::TablaSuscriptosModel(); 
	foreach ($respuesta as $key => $value) {
	if ($value['ssu_motivar_digital'] == 0) $ssu_motivar_digital = '<i class="text-danger fas fa-ban"></i>'; else $ssu_motivar_digital = '<i class="text-success far fa-check-circle"></i>';
	if ($value['ssu_2_2_digital'] == 0) $ssu_2_2_digital = '<i class="text-danger fas fa-ban"></i>'; else $ssu_2_2_digital = '<i class="text-success far fa-check-circle"></i>';
	if ($value['ssu_motivar_impreso'] == 0) $ssu_motivar_impreso = '<i class="text-danger fas fa-ban"></i>'; else $ssu_motivar_impreso = '<i class="text-success far fa-check-circle"></i>';
	if ($value['ssu_2_2_impreso'] == 0) $ssu_2_2_impreso = '<i class="text-danger fas fa-ban"></i>'; else $ssu_2_2_impreso = '<i class="text-success far fa-check-circle"></i>';
	
	$value['sug_nombre'] = html_entity_decode($value['sug_nombre']);
	$value['sug_apellido'] = html_entity_decode($value['sug_apellido']);

		echo '
		<tr>
			<td>'.$value['sug_id'].'</td>
			<td>'.$value['sug_correo_1'].'</td>
			<td>'.$value['sug_nombre'].'</td>
			<td>'.$value['sug_apellido'].'</td>
			<td>'.$ssu_motivar_digital.'</td>
			<td>'.$ssu_motivar_impreso.'</td>
			<td>'.$ssu_2_2_digital.'</td>
			<td>'.$ssu_2_2_impreso.'</td>
			<td><form method="post" action="editar_suscriptor">
					<input type="hidden" value="'.$value['sug_id'].'" name="edit">
					<button class="btn" ><i class="text-primary fas fa-pencil-alt"></i></button>
					</form></td>
			<td><input type="hidden" value="'.$value['sug_id'].'" class="id">
				<button class="btn btn-eliminar" ><i class="text-danger fas fa-trash-alt"></i></button></td>

		</tr>
	';
	}
}
	public function DatosFullSuscritorController($userID){

		$userID = $userID['edit'];
		if ((isset($userID))&&(is_numeric($userID))){
				$respuesta = DashboardModel::DatosFullSuscritor($userID);
				foreach ($respuesta as $key => $value) {
					$respuesta[$key]['sug_nombre']= html_entity_decode($value['sug_nombre']);
					$respuesta[$key]['sug_apellido']= html_entity_decode($value['sug_apellido']);
				}
		return $respuesta[0];

		}

}
	public function DatosFullSuscritorDuplicadoController($userID){

		if ((isset($userID))&&(is_numeric($userID))){
				$respuesta = DashboardModel::DatosFullSuscritorTemporal($userID); 
				$respuesta['tmp_nombre']= html_entity_decode($respuesta['tmp_nombre']);
				$respuesta['tmp_apellido']= html_entity_decode($respuesta['tmp_apellido']);
		return $respuesta;

		}

}

}
?>