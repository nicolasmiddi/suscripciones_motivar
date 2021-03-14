<?php 	
if (!$_SESSION['validar']){
			echo '<script> window.location = "login"</script>';
			exit ();

}
	include "vista/modulos/nav_sup.php";
	include "vista/modulos/nav_asside.php"; 

?>






	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<div class="content">
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Listado de Usuarios</h5>							

							<div class="heading-elements">
								 <button type="button" class="btn btn-primary btn-float btn-float-lg label label-icon" data-toggle="modal" data-target="#modal_form_vertical_alta" class="btn btn-link has-text"><i class="icon-user-plus"></i> <span>CREAR</span></button>
						</div>

						</div>
					

						<table class="table datatable-basic" id="example">
							<thead>
								<tr>
									<th>Usuario</th>
									<th>Nombre</th>
									<th>Correo</th>
									<th>Perfil</th>
									<th>Estado</th>
									<th class="text-center"><i class="icon-pencil6"></i></th>
								</tr>
							</thead>
							<tbody>
									
								<?php
									$tabla_usaurio = new TablaUsuariosControlador();
									$tabla_usaurio -> usuariosControlador();
									$tabla_usaurio -> desbloquearUsuarioControlador();
									$tabla_usaurio -> editarUsuarioControlador();
									$tabla_usaurio -> resetUsuarioControlador();
									$tabla_usaurio -> habilitarDeshabilitarUsuarioControlador();
									$tabla_usaurio -> altaUsuarioControlador();

								?>


							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


		   <!-- Vertical form modal -->
					<div id="modal_form_vertical_alta" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-info">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Alta Usuario</h5>
								</div>

								<form method="post" onsubmit="return validarRegistroAlta()">
									<div class="modal-body">
										<div class="form-group">
											<div class="row">
												<div class="col-sm-4 identificador_usuario_alta">
													<label class="control-label col-lg-2 text-semibold" for="identificador_usuario_alta">Usuario</label>
													<input type="text" placeholder="Usuario" class="form-control" name="identificador_usuario_alta" id="identificador_usuario_alta" required>


												</div>
												<div class="col-sm-4 nombre_usuario_alta">
													<label class="control-label col-lg-2 text-semibold" for="nombre_usuario_alta">Nombre</label>
													<input type="text" placeholder="Nombre" class="form-control" name="nombre_usuario_alta" id="nombre_usuario_alta">
												</div>

												<div class="col-sm-4 apellido_usuario_alta">
													<label class="control-label col-lg-2 text-semibold" for="apellido_usuario_alta">Apellido</label>
													<input type="text" placeholder="Apellido" class="form-control" name="apellido_usuario_alta" id="apellido_usuario_alta">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 correo_usuario_alta">
													<label class="control-label col-lg-2 text-semibold" for="correo_usuario_alta">Correo</label>
													<input type="text" placeholder="correo" class="form-control" name="correo_usuario_alta" id="correo_usuario_alta">
												</div>
												<div class="col-sm-6">
													<label>Perfil</label>
													<input type="mail" value="AdminTotal" class="form-control" name="perfil_usuario_alta" readonly="">
													<span class="help-block">Perfiles No definidos</span>
												</div>
											</div>
										</div>
														<div class="form-group">
											<div class="row">
												<div class="col-sm-6 clave_usuario_alta">
													<label class="control-label col-lg-2 text-semibold" for="clave_usuario_alta">Contraseña</label>
													<input type="password" placeholder="Contraseña" class="form-control" name="clave_usuario_alta" id="clave_usuario_alta">
												</div>

												<div class="col-sm-6 clave_val_usuario_alta">
													<label class="control-label col-lg-2 text-semibold" for="clave_val_usuario_alta">Validación</label>
													<input type="password" placeholder="Repetir Contraseña" class="form-control" name="clave_val_usuario_alta" id="clave_val_usuario_alta" required>
												</div>
											</div>
										</div>
									
									</div>

						

									<div class="modal-footer errores-form">
										<button type="button" class="btn btn-link" data-dismiss="modal">Cerrar</button>
										<button type="submit" class="btn btn-info">Alta</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /vertical form modal -->

<script>

    $('#example td span.estado').each(function(){
       if ($(this).text() == "HABILITADO"){
        $(this).addClass('label-success');
    	} else {
    		if ($(this).text() == "BLOQUEADO"){	
        	$(this).addClass('label-primary');
        	} else {
        		$(this).addClass('label-danger');
        		}}

    });
</script>


<script>

$('.datatable-basic').DataTable({
	autoWidth: false,
	dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
        search: '<span>Buscar:</span> _INPUT_',
        lengthMenu: '<span>Mostrar:</span> _MENU_',
        info:"Mostrando _START_ a _END_ de _TOTAL_ entradas",
        infoEmpty:"Mostrando 0 de 0 de 0 entradas",
        infoFiltered:"(filtrado de un total de _MAX_ entradas)",
        zeroRecords:"No se encontraron resultados",
        paginate: { 'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←' }
    },
    drawCallback: function () {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    },
    preDrawCallback: function() {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    }
});




</script>
	<script src="vista/assets/js/hprod/validarRegistro.js"></script>
	<script src="vista/assets/js/pages/datatables_basic.js"></script>
	<script src="vista/assets/js/plugins/tables/datatables/datatables.min.js"></script>


