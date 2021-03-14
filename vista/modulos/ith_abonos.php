<?php 	
if (!$_SESSION['validar']){
			echo '<script> window.location = "login"</script>';
			exit ();

}

	include "vista/modulos/nav_sup.php";
	include "vista/modulos/nav_asside.php"; 


if (isset($_POST['edit_ser_nom_corto'])){

$nom_corto = $_POST['edit_ser_nom_corto'];
$nombre = $_POST['edit_ser_nombre'];
$descripcion = $_POST['edit_ser_descripcion'];
$precio = $_POST['edit_pre_base'];
$comision = $_POST['edit_pre_comision'];
$moneda = $_POST['edit_pre_moneda'];
$descuento = $_POST['edit_pre_desc'];
$actualizacion = $_POST['edit_pre_actualizacion'];
$edit= 1;
} else {
$nom_corto = "";
$nombre = "";
$descripcion = "";
$precio = "";
$comision = "";
$moneda = "";
$descuento = "";
$actualizacion = "";
$edit= 0;
}

$gestion_servicios = new IthAdministracionControlador();


?>



	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-success text-success"><i class="icon-train"></i></div>
								<h5 class="content-group">ABONOS <small class="display-block">Administracion de Abonos</small></h5>
							</div>
						
					

							<table class="table datatable-basic" id="">
							<thead>
								<tr>
									<th>Cliente</th>
									<th>Servicio</th>
									<th>Precio Lista</th>
									<th>Fecha</th>
									<th>Cobrado</th>
									<th>Modificacion</th>
									<th>Baja</th>
								</tr>
							</thead>
							<tbody>
									
								<?php
									$gestion_servicios -> tablaAbonosClientesControlador();

								?>

							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->

						<div class="panel panel-flat">

							<div class="panel-body">
						<div class="panel-heading">
							<h5 class="panel-title">Alta Nuevo Abono</h5>							


							<div class="heading-elements">
								 <button type="button" class="btn btn-primary btn-float btn-float label label-icon" data-toggle="modal" data-target="#modal_form_moneda" class="btn btn-link has-text">+ ALTA Herramienta</button>
						</div>

						</div>

											<form method="post">		
												<div class="form-group">
													<div class="row">
														<div class="col-md-2">
															<label>ID</label>
															<input type="text" value="<?php echo $nom_corto?>" class="form-control" name="id" id="id_servicio" maxlength="10" required>
															<input type="hidden" value="<?php echo $edit?>" name="edit">
													</div>
													<div class="col-md-3">
															<label>Nombre</label>
															<input type="text" value="<?php echo $nombre?>" class="form-control" name="nombre" maxlength="25" required>
													</div>
													<div class="col-md-7">
															<label>Descripcion</label>
															<input type="text" value="<?php echo $descripcion?>" class="form-control" name="descripcion" required>
													</div>
												</div>
												</div>
												<div class="form-group">
												<div class="row">

													<div class="col-md-3">
															<label>Precio Lista</label>
															<input type="num" class="form-control" value="<?php echo $precio?>" name="precio" required>
													</div>
													<div class="col-md-3">
															<label>Monto Comision</label>
															<input type="num" class="form-control" value="<?php echo $comision?>" name="comision" required>
													</div>
														<div class="col-md-2">
															<label>Moneda</label>
															<select type="int" class="select select-renovacion form-control" name="moneda">
									<?php
									$gestion_servicios -> listarMonedasControlador($moneda);
									?>
															</select>
														</div>

														<div class="col-md-2">
															<label>Desc Asoc</label>
															<input type="int" class="form-control" value="<?php echo $descuento?>" name="desc_asoc">
														</div>
														<div class="col-md-2">
															<label>Actualizacion</label>
															<input type="int" class="form-control" value="<?php echo $actualizacion?>" name="actualizacion">
														</div>
													</div>
												</div>
														

						                        <div class="text-right">
						                        	<button type="submit" id="btn_etiquetas" class="btn btn-info">ALTA <i class="icon-arrow-right14 position-right"></i></button>
						                        </div>
											</form>
										</div>
									</div>
									<!-- /profile info -->
									<?php
									$gestion_servicios -> altaServicioControlador();
						//			$gestion_servicios -> editarDominioControlador();
									?>


							


				
					</div>
					</div>
					<!-- /basic datatable -->


		   <!-- Vertical form modal -->
					<div id="modal_form_moneda" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-info">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Alta Herramientas</h5>
								</div>
								<form method="post">
									<div class="modal-body">
										<div class="form-group">
											<div class="row">
												<div class="col-sm-4">
													<label class="control-label col-lg-2 text-semibold" for="her_id">ID</label>
													<input type="text" placeholder="COBBACK" class="form-control" name="her_id" id="her_id">
												</div>

												<div class="col-sm-8">
													<label class="control-label col-lg-2 text-semibold" for="her_nombre">Nombre</label>
													<input type="text" placeholder="Cobain Backup" class="form-control" name="her_nombre" id="her_nombre">
												</div>
												<div class="col-sm-12">
													<label class="control-label col-lg-2 text-semibold" for="her_descripcion">Descripcion</label>
													<input type="text" placeholder="Soft para realizar backup de las estaciones de trabajo" class="form-control" name="her_descripcion" id="her_descripcion">
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


				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->


<?php
									$gestion_servicios -> bajaServicioControlador();
					//				$gestion_servicios -> editarManualDominioControlador();
									$gestion_servicios -> altaHerramientasControlador();

								?>
</div>

	<script src="vista/assets/js/plugins/tables/datatables/datatables.min.js"></script>

	<script type="text/javascript" src="vista/assets/js/core/libraries/jquery_ui/core.min.js"></script>


	<script type="text/javascript" src="vista/assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script type="text/javascript" src="vista/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="vista/assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="vista/assets/js/plugins/pickers/anytime.min.js"></script>
	<script type="text/javascript" src="vista/assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="vista/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="vista/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="vista/assets/js/plugins/pickers/pickadate/legacy.js"></script>
	<script type="text/javascript" src="vista/assets/js/pages/picker_date.js"></script>
	<script type="text/javascript" src="vista/assets/js/pages/form_selectbox.js"></script>
	<script type="text/javascript" src="vista/assets/js/plugins/forms/selects/selectboxit.min.js"></script>


	<script type="text/javascript" src="vista/assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
	<script type="text/javascript" src="vista/assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
	<script type="text/javascript" src="vista/assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>

	<script type="text/javascript" src="vista/assets/js/hprod/dominios.js"></script>

	
	<script type="text/javascript" src="vista/assets/js/plugins/forms/selects/select2.min.js"></script>


	<!-- /theme JS files ->

	<script src="vista/assets/js/plugins/forms/inputs/maxlength.min.js"></script>
	<script src="vista/assets/js/plugins/forms/inputs/passy.js"></script>
	<script src="vista/assets/js/pages/form_controls_extended.js"></script>
	<script src="vista/assets/js/plugins/forms/inputs/formatter.min.js"></script>

			<!-- /page content -->

<script>

$('.select-renovacion').select2();
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




