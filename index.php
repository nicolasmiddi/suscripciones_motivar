<?php
require_once "modelo/enlaces.php";
require_once "modelo/login.php";
require_once "modelo/perfil_usuario.php";
require_once "modelo/usuarios.php";
require_once "modelo/suscripciones.php";
require_once "modelo/dashboard.php";

require_once "controlador/dashboard.php";
require_once "controlador/suscripciones.php";
require_once "controlador/template.php";
require_once "controlador/enlaces.php";
require_once "controlador/login.php";
require_once "controlador/perfil_usuario.php";
require_once "controlador/usuarios.php";
require_once "controlador/simpleXLSX.php";

$mvc = new TemplateControlador;
$mvc -> template();
?>
