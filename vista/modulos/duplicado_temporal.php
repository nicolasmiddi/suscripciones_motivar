<?php
if (!$_SESSION['validar']){
      echo '<script> window.location = "login"</script>';
      exit ();

}

  include "vista/modulos/nav_sup.php";

if ($_POST==false){
  $datos['filtro'] = 'correo';
  $correo = 'checked="checked"';
  $nombre = "";
  $apellido = "";
  $celular = "";
  $dni = "";
} else {
  $datos = $_POST;
    if ($datos['filtro']=='correo') $correo = 'checked="checked"'; else $correo = "";
    if ($datos['filtro']=='nombre') $nombre = 'checked="checked"'; else $nombre = "";
    if ($datos['filtro']=='apellido') $apellido = 'checked="checked"'; else $apellido = "";
    if ($datos['filtro']=='celular') $celular = 'checked="checked"'; else $celular = "";
    if ($datos['filtro']=='dni') $dni = 'checked="checked"'; else $dni = "";

}


$dashboard = new SuscriptoresController();                 
?>

<div class="bg-light" >
<div class="container" style="margin-top: 10px; margin-bottom: 10px;">
    <ul class="nav justify-content-end">
 
      <li class="nav-item" style='margin-left:5px'>
            <a id="" href="importar_excel" class="btn btn-outline-primary btn-sm btn-submenu"><span><i class="fas fa-chevron-circle-left"></i> VOLVER</a>
      </li>         
      <li class="nav-item" style='margin-left:5px'>
            <button id="btn-filtrar" href="" class="btn btn-outline-primary btn-sm btn-submenu"><i class="fas fa-search"></i> FILTRAR</button>
      </li>            
   
    </ul>   
</div>
</div>


<div class="container shadow-sm" style="background-color:#fff; border-radius: 10px; padding-bottom: 20px;">            
        <div class="container row" style="padding-top: 15px;">
            <h3>Duplicados- TABLA TEMPORALES</h3>
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
	                            <th>Suscriptor <i>Filtro por: <?php echo $datos['filtro'] ?></i></th>
	                            <th>Cantidad</th>
                              <th>RESUMEN</th>
                              <th>EDITAR</th>
							</tr>
						</thead>
						<tbody>
                <?php
                  $dashboard -> TablaSuscriptosDuplicadosTemporalController($datos);
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
        <input type="hidden" id="id-r" name="suscriptor">
        <input type="hidden" id="id-f" name="filtro">
        <button type="button" class="btn btn-primary" id="resumen-editar" data-dismiss="modal">EDITAR</button>
        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="filtrarModal" tabindex="-1" role="dialog" aria-labelledby="filtrarModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filtrarModal">FILTROS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form method="post">
          <div class="row">
          <div class="col-md-2 form-check-inline">
               <input class="form-check-input" type="radio" value="correo" id="correo" <?php echo $correo?> name="filtro" >
                        <label class="form-check-label" for="correo">Correo</label>
          </div>         
          <div class="col-md-2 form-check-inline">
               <input class="form-check-input" type="radio" value="nombre" id="nombre" <?php echo $nombre?> name="filtro">
                        <label class="form-check-label" for="nombre">Nombre</label>
          </div>         
          <div class="col-md-2 form-check-inline">
               <input class="form-check-input" type="radio" value="apellido" id="apellido" <?php echo $apellido?> name="filtro">
                        <label class="form-check-label" for="apellido">Apellido</label>
          </div>         
          <div class="col-md-2 form-check-inline">
               <input class="form-check-input" type="radio" value="celular" id="celular" <?php echo $celular?> name="filtro">
                        <label class="form-check-label" for="celular">Celular</label>
          </div>         
          <div class="col-md-2 form-check-inline">
               <input class="form-check-input" type="radio" value="dni" id="dni" <?php echo $dni?> name="filtro">
                <label class="form-check-label" for="dni">DNI</label>
          </div>         
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Buscar</button>
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script> -->

