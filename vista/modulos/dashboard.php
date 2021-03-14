<?php
if (!$_SESSION['validar']){
      echo '<script> window.location = "login"</script>';
      exit ();

}

  include "vista/modulos/nav_sup.php";


$dashboard = new DashboardController();                 
?>

<div class="bg-light" >
<div class="container" style="margin-top: 10px; margin-bottom: 10px;">
    <ul class="nav justify-content-end">
 
      <li class="nav-item" style='margin-left:5px'>
            <button id="btn-filtrar" type="button" class="btn btn-outline-primary btn-sm">FILTRAR</button>
      </li>            
    </ul>   
</div>
</div>

	<!-- <div class="container-fluid" style="margin-right:5%; margin-left:5%"> -->
        <!-- <div class="container"> -->
<div id="box-filtrar" class="container shadow p-3 mb-5 bg-white rounded contendor-mot">
    <div class="container row " style="margin-top:20px; margin-bottom: 20px;">
  <form class="container" id="form-filtrar">
  <div class="row">
    <h2 id="titulo-id">BUSCAR</h2>
  </div>
  <hr>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="moti_ed_impreso" id="moti_ed_impreso" name="moti_ed_impreso">
        <label class="form-check-label" for="moti_ed_impreso">MOTIVAR - Edición Impresa</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="moti_ed_digital" id="moti_ed_digital" name="moti_ed_digital">
        <label class="form-check-label" for="moti_ed_digital">MOTIVAR - Edición Digital</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="dosm_ed_impreso"  id="dosm_ed_impreso" name="dosm_ed_impreso">
        <label class="form-check-label" for="dosm_ed_impreso">2+2 - Edicion Impresa</label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="dosm_ed_digital"  id="dosm_ed_digital" name="dosm_ed_digital">
        <label class="form-check-label" for="dosm_ed_digital">2+2 - Edicion Digital</label>
        </div>        
      </div>

      <div class="col-sm-7">
        <div class="form-group row">
          <label for="cod_postal" class="col-sm-2 col-form-label">CP</label>
          <div class="col-sm-4">
            <input id="cod_postal"  class="form-control" name="cod_postal" type="text" placeholder="CP" >
            <div class="help-block with-errors"></div>
          </div>
          <label for="pais" class="col-sm-2 col-form-label">País</label>
          <div class="col-sm-4">
            <input id="pais"  class="form-control" name="pais" type="text" placeholder="Pais">
            <div class="help-block with-errors"></div>
          </div>
        </div>  
         
        <div class="form-group row">
          <label for="partido" class="col-sm-2 col-form-label">Partido</label>          
          <div class="col-sm-4">
            <input id="partido"  list="list-partido" class="form-control" name="partido" type="text" placeholder="Partido">
            <datalist class="" id="list-partido"></datalist>                                      
            <div class="help-block with-errors"></div>            
          </div>
          <label for="localidad" class="col-sm-2 col-form-label">Localidad</label>  
          <div class="col-sm-4">
            <input id="localidad" list="list-localidad" class="form-control" name="localidad" type="text" placeholder="Localidad">
            <datalist class="" id="list-localidad">
            </datalist>                                      
            <div class="help-block with-errors"></div>            
          </div>  

        </div>
        <div class="form-group row">
          <label for="provincia" class="col-sm-2 col-form-label">Provincia</label>
          <div class="col-sm-10">
            <input id="provincia"  class="form-control" name="provincia" type="text" placeholder="Provincia">
            <div class="help-block with-errors"></div>
          </div>
        </div>    
      </div>
    </div>
  <hr>
    <div class="row">
      <div class="col-sm-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="chk-profesional" id="chk-profesional" name="chk-profesional">
          <label class="form-check-label" for="chk-profesional">PROFESIONAL</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="chk-estudiante" id="chk-estudiante" name="chk-estudiante">
          <label class="form-check-label" for="chk-estudiante">ESTUDIANTE</label>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="chk-empresa" id="chk-empresa" name="chk-empresa">
          <label class="form-check-label" for="chk-empresa">EMPRESA</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="chk-institucion" id="chk-institucion" name="chk-institucion">
          <label class="form-check-label" for="chk-institucion">INSTITUCION</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="chk-independiente" id="chk-independiente" name="chk-independiente">
          <label class="form-check-label" for="chk-independiente">INDEPENDIENTE</label>
        </div>                
      </div>
      <div class="col-sm-4">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="chk-veterinaria" id="chk-veterinaria" name="chk-veterinaria">
          <label class="form-check-label" for="chk-veterinaria">ACTIVIDAD VETERINARIA</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="chk-ind-dist" id="chk-ind-dist" name="chk-ind-dist">
          <label class="form-check-label" for="chk-ind-dist">INSDUSTRIA / DISTRIBUCIÓN</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="chk-agro" id="chk-agro" name="chk-agro">
          <label class="form-check-label" for="chk-agro">AGROPECUARIA</label>
        </div>                        
      </div>            
    </div>
  <hr>
    <div class="row">
      <div class="col-sm-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="chk-dueno" id="chk-dueno" name="chk-dueno">
          <label class="form-check-label" for="chk-dueno">DUEÑO</label>
        </div> 
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="chk-empleado" id="chk-empleado" name="chk-empleado">
          <label class="form-check-label" for="chk-empleado">EMPLEADO</label>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="chk-pequeno" id="chk-pequeno" name="chk-pequeno">
          <label class="form-check-label" for="chk-pequeno">ANIMALES PEQUEÑOS</label>
        </div> 
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="chk-grandes" id="chk-grandes" name="chk-grandes">
          <label class="form-check-label" for="chk-grandes">ANIMALES GRANDES</label>
        </div>
      </div> 
      <div class="col-sm-6">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="sanidad animal" id="chk-sanidad" name="chk-sanidad">
            <label class="form-check-label" for="chk-sanidad">Información del sector de la sanidad animal en argentina</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="información técnica" id="chk-tecnica" name="chk-tecnica">
            <label class="form-check-label" for="chk-tecnica">Información técnica</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="productos y proveedores" id="chk-prod-prov" name="chk-prod-prov">
            <label class="form-check-label" for="chk-prod-prov">Conocer nuevos productos / proveedores</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="cursos y capacitación" id="chk-cursos" name="chk-cursos">
            <label class="form-check-label" for="chk-cursos">Cursos y capacitación</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="networking y eventos" id="chk-networking" name="chk-networking">
            <label class="form-check-label" for="chk-networking">Networking / Eventos</label>
          </div>               
      </div>      
    </div>  
  <hr>

  </form>
    <div class="row">
        <div class="col-sm-12">
          <button id="buscar" class="btn btn-primary">BUSCAR</button>
        </div>
    </div>
    </div>
</div>

<div class="container shadow-sm" style="background-color:#fff; border-radius: 10px; padding-bottom: 20px;">            
        <div class="container row" style="padding-top: 15px;">
            <h3>Suscriptores</h3>
        </div>
        <hr>
		<div class="container row " style="margin-top:20px; margin-bottom: 20px;">
			<div class="col-12 panel panel-primary">
				<!-- <div class="panel-heading">
				</div> -->
				<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover datatables-basic" id="tb_personas">
                        <thead>
                            <tr>
	                            <th>ID</th>
	                            <th>Mail</th>
	                            <th>Apellido</th>
	                            <th>Nombre</th>
 	                            <th>Motivar Digital</th>
	                            <th>Motivar Impreso</th>
	                            <th>2+2 Digital</th>
                              <th>2+2 Impreso</th>
                              <th>Editar</th>
	                            <th>Eliminar</th>
							</tr>
						</thead>
						<tbody>
                <?php
                  $dashboard -> TablaSuscriptosController();
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


<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script> -->

