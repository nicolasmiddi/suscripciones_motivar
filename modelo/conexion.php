<?php
class Conexion{
	public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=motivarc_suscripcion","nicolas","Eslamisma123!");
		return $link;
}}
?>
