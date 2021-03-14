
/*=============================================
VALIDAR USUARIO ALTA 
=============================================*/

/*=============================================
VALIDAR USUARIO EXISTENTE 
=============================================*/

var usuarioExistente = false;
$("#identificador_usuario_alta").change(function(){
	var usuario = $(this).val(),
		expresionUsuario = /^[a-zA-Z0-9]*$/;
	if(!expresionUsuario.test(usuario) || (usuario.length < 3) || (usuario.length > 20)){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px; right:5px;"></i></div><span class="help-block user_error">Debe tener entre 3 y 20 caracteres. No se permiten caracteres especiales</span>');			
		}
	else {
	var datos = new FormData();
	datos.append("validarUsuario", usuario);
	$.ajax({
		url:"vista/modulos/ajax/gestorUsuarios.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
				console.log(respuesta);

			if(respuesta == 0){
				$("#identificador_usuario_alta").parent().removeClass('has-success');
				$("#identificador_usuario_alta").parent().addClass('has-error');
				$("#identificador_usuario_alta").nextAll().remove();
				$('#identificador_usuario_alta').after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px; right:5px;"></i></div><span class="help-block user_error">Usuario ya existe</span>');
				usuarioExistente = true;
			}
			else{
				$("#identificador_usuario_alta").parent().removeClass('has-error');
				$("#identificador_usuario_alta").parent().addClass('has-success');
				$("#identificador_usuario_alta").addClass('has-success');
				$("#identificador_usuario_alta").nextAll().remove();
				$("#identificador_usuario_alta").after('<div class="form-control-feedback user_success"><i class="icon-checkmark-circle user_success" style="top:25px; right:5px;"></i></div>');
				usuarioExistente = false;
			}		
		}
	});
	}
});

/*=====  FIN VALIDAR USUARIO EXISTENTE  ======*/

/*=============================================
VALIDAR NOMBRE USUARIO ALTA
=============================================*/
$("#nombre_usuario_alta").change(function(){
var	nombre = $(this).val(),
	expresionNombre = /^[a-zA-Z\s]*$/;
if(!expresionNombre.test(nombre) || (nombre.length < 3) || (nombre.length > 20)){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px; right:5px;"></i></div><span class="help-block user_error">El nombre debe tener entre 3 y 20 caracteres. No se permiten caracteres especiales ni numeros</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).addClass('has-success');
		$(this).nextAll().remove();
		}
});
/*=====  FIN VALIDAR NOMBRE USUARIO ALTA   ======*/

/*=============================================
VALIDAR APELLIDO USUARIO ALTA 
=============================================*/
$("#apellido_usuario_alta").change(function(){
var	apellido = $(this).val(),
	expresionNombre = /^[a-zA-Z\s]*$/;
if(!expresionNombre.test(apellido) || (apellido.length < 3) || (apellido.length > 20)){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px; right:5px;"></i></div><span class="help-block user_error">El apellido debe tener entre 3 y 20 caracteres. No se permiten caracteres especiales ni numeros</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).addClass('has-success');
		$(this).nextAll().remove();
		}
});
/*=====  FIN VALIDAR APELLIDO USUARIO ALTA  ======*/

/*=============================================
VALIDAR CORREO USUARIO ALTA 
=============================================*/
$("#correo_usuario_alta").change(function(){
var	correo = $(this).val(),
	expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
if(!expresion.test(correo)){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px; right:5px;"></i></div><span class="help-block user_error">El correo no es válido</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).addClass('has-success');
		$(this).nextAll().remove();
		}
});
/*=====  FIN VALIDAR CORREO USUARIO ALTA  ======*/

/*=============================================
VALIDAR LONGITUD CLAVE USUARIO ALTA 
=============================================*/
$("#clave_usuario_alta").change(function(){
var	clave = $(this).val();
if(clave.length < 6){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px; right:5px;"></i></div><span class="help-block user_error">La clave debe contener por lo menos 6 caracteres</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).addClass('has-success');
		$(this).nextAll().remove();
		}
});
/*=====  FIN VALIDAR LONGITUD CLAVE USUARIO ALTA  ======*/

/*=============================================
VALIDAR VALIDACION CLAVE USUARIO ALTA 
=============================================*/
$("#clave_val_usuario_alta").change(function(){
var	clave = $(this).val(),
	validacion = $("#clave_val_usuario_alta").val();
if(clave != validacion){
				$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px; right:5px;"></i></div><span class="help-block user_error">Las contraseñas no coinciden</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).addClass('has-success');
		$(this).nextAll().remove();
		}
});
/*=====  FIN VALIDAR VALIDACION CLAVE USUARIO ALTA   ======*/

/*=====  FIN VALIDAR USUARIO ALTA  ======*/
/*=============================================
VALIDAR USUARIOS EDITAR 
=============================================*/

/*=============================================
VALIDAR LONGITUD CLAVE USUARIO EDITAR 
=============================================*/
$("input[name=reset_clave]").change(function(){
var	clave = $(this).val();
if(clave.length < 6){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="right:15px;"></i></div><span class="help-block user_error">La clave debe contener por lo menos 6 caracteres</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).addClass('has-success');
		$(this).nextAll().remove();
		}
});
/*=====  FIN VALIDAR LONGITUD CLAVE USUARIO EDITAR  ======*/

/*=============================================
VALIDAR VALIDACION CLAVE USUARIO EDITAR 
=============================================*/
$("input[name=reset_clave_val]").change(function(){
var	clave = $('input[name=reset_clave].has-success').val(),
	validacion =  $(this).val();
if(clave != validacion){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="right:15px;"></i></div><span class="help-block user_error">Las contraseñas no coinciden</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).nextAll().remove();
		}
	}
);
/*=====  FIN VALIDAR VALIDACION CLAVE USUARIO EDITAR   ======*/

/*=============================================
VALIDAR NOMBRE USUARIO EDITAR
=============================================*/
$("input[name=nombre_usuario_editar]").change(function(){
var	nombre = $(this).val(),
	expresionNombre = /^[a-zA-Z\s]*$/;
	if(!expresionNombre.test(nombre) || (nombre.length < 3) || (nombre.length > 20)){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px;right:5px;"></i></div><span class="help-block user_error">El nombre debe tener entre 3 y 20 caracteres. No se permiten caracteres especiales ni numeros</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).addClass('has-success');
		$(this).nextAll().remove();
		}
});
/*=====  FIN VALIDAR NOMBRE USUARIO EDITAR   ======*/

/*=============================================
VALIDAR APELLIDO USUARIO EDITAR 
=============================================*/
$("input[name=apellido_usuario_editar]").change(function(){
var	apellido = $(this).val(),
	expresionNombre = /^[a-zA-Z\s]*$/;
if(!expresionNombre.test(apellido) || (apellido.length < 3) || (apellido.length > 20)){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px;right:5px;"></i></div><span class="help-block user_error">El apellido debe tener entre 3 y 20 caracteres. No se permiten caracteres especiales ni numeros</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).addClass('has-success');
		$(this).nextAll().remove();
		}
});
/*=====  FIN VALIDAR APELLIDO USUARIO EDITAR  ======*/

/*=============================================
VALIDAR CORREO USUARIO EDITAR 
=============================================*/
$("input[name=correo_usuario_editar]").change(function(){
var	correo = $(this).val(),
	expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
if(!expresion.test(correo)){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px;right:5px;"></i></div><span class="help-block user_error">El correo ingresado no es válido</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).addClass('has-success');
		$(this).nextAll().remove();
		}
});
/*=====  FIN VALIDAR CORREO USUARIO EDITAR  ======*/
/*=====  FIN VALIDAR USUARIO EDITAR  ======*/



/*=============================================
VALIDAR NOMBRE PERFIL USUARIO
=============================================*/
/*=============================================
VALIDAR NOMBRE PERFIL USUARIO
=============================================*/
$("#perfil_nombre").change(function(){
var	nombre = $(this).val(),
	expresionNombre = /^[a-zA-Z\s]*$/;
	if(!expresionNombre.test(nombre) || (nombre.length < 3) || (nombre.length > 20)){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px;right:5px;"></i></div><span class="help-block user_error">El nombre debe tener entre 3 y 20 caracteres. No se permiten caracteres especiales ni numeros</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).addClass('has-success');
		$(this).nextAll().remove();
		}
});
/*=====  FIN VALIDAR NOMBRE PERFIL USUARIO   ======*/

/*=============================================
VALIDAR APELLIDO PERFIL USUARIO 
=============================================*/
$("#perfil_apellido").change(function(){
var	apellido = $(this).val(),
	expresionNombre = /^[a-zA-Z\s]*$/;
if(!expresionNombre.test(apellido) || (apellido.length < 3) || (apellido.length > 20)){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px;right:5px;"></i></div><span class="help-block user_error">El apellido debe tener entre 3 y 20 caracteres. No se permiten caracteres especiales ni numeros</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).addClass('has-success');
		$(this).nextAll().remove();
		}
});
/*=====  FIN VALIDAR APELLIDO PERFIL USUARIO  ======*/

/*=============================================
VALIDAR CORREO PERFIL USUARIO 
=============================================*/
$("#perfil_correo").change(function(){
var	correo = $(this).val(),
	expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
if(!expresion.test(correo)){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px;right:5px;"></i></div><span class="help-block user_error">El correo ingresado no es válido</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).addClass('has-success');
		$(this).nextAll().remove();
		}
});
/*=====  FIN VALIDAR CORREO PERFIL USUARIO  ======*/

/*=============================================
VALIDAR LONGITUD CLAVE PERFIL USUARIO 
=============================================*/
$("#nuevaclave").change(function(){
var	clave = $(this).val();
if(clave.length < 6){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px;right:5px;"></i></div><span class="help-block user_error">La clave debe contener por lo menos 6 caracteres</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).addClass('has-success');
		$(this).nextAll().remove();
		}
});
/*=====  FIN VALIDAR LONGITUD CLAVE PERFIL USUARIO  ======*/

/*=============================================
VALIDAR VALIDACION CLAVE PERFIL USUARIO 
=============================================*/
$("#validacionclave").change(function(){
var	clave = $('#nuevaclave').val(),
	validacion =  $(this).val();

if(clave != validacion){
		$(this).parent().removeClass('has-success');
		$(this).parent().addClass('has-error');
		$(this).nextAll().remove();
		$(this).after('<div class="form-control-feedback user_error"><i class="icon-cancel-circle2 user_error" style="top:25px;right:5px;"></i></div><span class="help-block user_error">La clave no coinciden</span>');			
		}
		else {
		$(this).parent().removeClass('has-error');
		$(this).parent().addClass('has-success');
		$(this).nextAll().remove();
		}
	});
/*=====  FIN VALIDAR VALIDACION CLAVE PERFIL USUARIO  ======*/
/*=====  FIN VALIDAR PERFIL USUARIO  ======*/



/*=============================================
VALIDAR FORMULARIOS
=============================================*/
/*=============================================
VALIDAR REGISTRO ALTA DE USUARIO
=============================================*/
function validarRegistroAlta(){
	var usuario = $("#identificador_usuario_alta").val(),
		nombre = $("#nombre_usuario_alta").val(),
		apellido = $("#apellido_usuario_alta").val(),
		correo = $("#correo_usuario_alta").val(),
		password = $("#clave_usuario_alta").val(),
		val_password = $("#clave_val_usuario_alta").val(),
		expresionUsuario = /^[a-zA-Z0-9]*$/,
		expresionNombre = /^[a-zA-Z\s]*$/,
		expresionMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	/* VALIDAR USUARIO */
	if(!expresionUsuario.test(usuario) || usuario.length < 3 || usuario.length > 20 || usuarioExistente) {
		$(".errores-form").append('<div class="alert bg-danger alert-styled-left"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button><span class="text-semibold">Datos erroneos en el Usuario. El formulario no se envió </a></div>');
	return false;
}
if(!expresionNombre.test(nombre) || (nombre.length < 3) || (nombre.length > 20) || !expresionNombre.test(apellido) || (apellido.length < 3) || (apellido.length > 20) || !expresionMail.test(correo)){
		$(".errores-form").append('<div class="alert bg-danger alert-styled-left"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button><span class="text-semibold">Datos erroneos en el nombre, apellido o correo. El formulario no se envió </a></div>');
	return false;
}
if(password.length < 5){
	$(".errores-form").append('<div class="alert bg-danger alert-styled-left"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button><span class="text-semibold">La password debe tener como mínimo 6 caraceteres. El formulario no envió </a></div>');
	return false;
}
if(password != val_password){
		$(".errores-form").append('<div class="alert bg-danger alert-styled-left"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button><span class="text-semibold">Las contraseñas no coinciden. El formulario no se envió </a></div>');
	return false;
}
return true;
}
/*=====  FIN VALIDAR REGISTRO ALTA DE USUARIO ======*/
/*=============================================
VALIDAR FORMULARIO CAMBIO CLAVE USUARIOS
=============================================*/
function validarRegistroClave(){
var	password = $('input[name=reset_clave].has-success').val(),
		val_password = $("input[name=reset_clave_val.has-success]").val();
if(password.length < 5){
	$(".errores-form").append('<div class="alert bg-danger alert-styled-left"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button><span class="text-semibold">La password debe tener como mínimo 6 caraceteres. El formulario se no envió </a></div>');
	return false;
}
if(password != val_password){
		$(".errores-form").append('<div class="alert bg-danger alert-styled-left"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button><span class="text-semibold">Las contraseñas no coinciden. El formulario se 	no envió </a></div>');
	return false;
}
return false;
}
/*=====  FIN VALIDAR FORMULARIO CAMBIO CLAVE USUARIOS  ======*/
/*=====  FIN VALIDAR FORMULARIO  ======*/

