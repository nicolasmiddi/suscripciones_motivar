<?php
if (!$_SESSION['validar']){
      echo '<script> window.location = "login"</script>';
      exit ();
}
?>
	<!-- Page container -->
	<div class="page-container asddasda">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">


								<li><a href="index.html"><i class="icon-home4"></i> <span>Panel Principal</span></a></li>

								<!-- Stock -->
								<li><a href="parametros"><i class="fa fa-gears"></i> <span>Parametros</span></a></li>
								<li>
									<a href=""><i class="fa fa-line-chart"></i> <span>Estadísticas</span></a>
									<ul>
										<li><a href="mov_estadistica_real">Real</a></li>
										<li><a href="mov_estadistica_estimada">Estimada</a></li>
										<li><a href="mov_proyeccion">Proyeccion</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="fa fa-btc"></i> <span>Movimientos</span></a>
									<ul>
										<li><a href="mov_inversiones">Inversiones</a></li>
										<li><a href="mov_ingresos">Ingresos</a></li>
										<li><a href="mov_egresos">Egresos</a></li>
									</ul>
								</li>
								<li><a href="mov_cierre"><i class="fa fa-calculator"></i> <span>Cierres</span></a></li>
								<li class="navigation-header"><span>Listados</span> <i class="icon-menu" title="Producción"></i></li>
								<li><a href="listado"><i class="fa fa-list-alt"></i> <span>Listados</span></a></li>
								<li class="navigation-header"><span>ADMINISTRACION ITH</span> <i class="icon-menu" title="Producción"></i></li>
								<li><a href="ith_servicios"><i class="fa fa-list-alt"></i> <span>Servicios</span></a></li>
								<li><a href="ith_abonos"><i class="icon-train"></i> <span>Abonos</span></a></li>
								<li><a href="ith_trabajos"><i class="icon-atom2"></i> <span>Trabajos</span></a></li>
								<li><a href="ith_clientes"><i class="icon-person"></i> <span>Clientes</span></a></li>
								<li><a href="ith_servicio_backup"><i class="icon-database-add"></i> <span>Servicio Backup</span></a></li>

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->



