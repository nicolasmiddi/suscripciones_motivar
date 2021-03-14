<?php
if (!$_SESSION['validar']){
      echo '<script> window.location = "login"</script>';
      exit ();

}

  include "vista/modulos/nav_sup.php";


$dashboard = new SuscriptoresController();                 
?>

<div class="bg-light" >
<div class="container" style="margin-top: 10px; margin-bottom: 10px;">
    <ul class="nav justify-content-end">
 
      <li class="nav-item" style='margin-left:5px'>
            <a id="" href="importar_excel" class="btn btn-outline-primary btn-sm btn-submenu"><span><i class="fas fa-chevron-circle-left"></i> VOLVER</a>
      </li>            
    </ul>   
</div>
</div>


<div class="container shadow-sm" style="background-color:#fff; border-radius: 10px; padding-bottom: 20px;">            
        <div class="container row" style="padding-top: 15px;">
            <h3>Duplicados- Activos VS Duplicados</h3>
        </div>
        <hr>
		<div class="container row " style="margin-top:20px; margin-bottom: 20px;">
			<div class="col-12 panel panel-primary">
				<!-- <div class="panel-heading">
				</div> -->
				<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover datatables-basic" id="">
                        <thead>
                            <tr>
	                            <th>ID</th>
	                            <th>Nombre</th>
	                            <th>Apellido</th>
	                            <th>Correo</th>
 	                            <th>Repeticiones</th>
	                            <th>Ver</th>
	                            <th>Editar</th>
							</tr>
						</thead>
						<tbody>
                <?php
                  $dashboard -> TablaSuscriptosDuplicadosController();
                ?>
						</tbody>
                    </table>
    			</div>			
			</div>
		</div>
	</div>
<footer>
    <div class="container ">
        <p class="mx-auto">Diseño y Desarrollo por onMedia - 2018</p>
    </div>
</footer>

<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Seguro que desea eliminar?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="confirmar">Si, Eliminar!</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="resumenModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">
          RESUMEN DUPLICADOS <span id="id-resumen"></span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body resumenModal">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="resumen-editar">EDITAR</button>
        <input type="hidden" id="id-r">
        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script> -->

