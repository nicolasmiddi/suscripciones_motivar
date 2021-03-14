function validaringreso(){

	var expresionUsuario = /^[a-zA-Z0-9]*$/,
		usuario = $("#usuario").val(),
		password = $("#password").val();
		
	if (usuario != "") {
		var caracteres = usuario.length;
		if (caracteres > 20) {
			$("#user").append('<p class="alert alert-danger">Escriba menos de 20 caracteres</p>');
			return false;
		}
		if(!expresionUsuario.test(usuario)){
			$("#user").append('<p class="alert alert-danger">Caracteres especiales no válidos</p>');
			return false;
		}
	} 

return true;
}
