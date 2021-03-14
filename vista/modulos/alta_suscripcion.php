<?php
if (!$_SESSION['validar']){
      echo '<script> window.location = "login"</script>';
      exit ();
}
  include "vista/modulos/nav_sup.php";
?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Su suscripción fue creada con éxito</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

    <div class="container">
        <br />
        <!-- <form action="#" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8"> -->
          <form  id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">

        <!-- SmartWizard html -->
        <div id="smartwizard">
            <ul>
                <li><a href="#step-1">PASO 1<br /><small>Formato</small></a></li>
                <li><a href="#step-2">PASO 2<br /><small>Datos Personales</small></a></li>
                <li><a href="#step-3">PASO 3<br /><small>Profesion</small></a></li>
                <li><a href="#step-4">PASO 4<br /><small>Intereses</small></a></li>
            </ul>

            <div>
                <div id="step-1">
                    
                    <div id="form-step-0" role="form" data-toggle="validator">
                    <h4>Elegí como recibir tu contenido</h4>
                    <div class="row">
                      <div class="col-md-3 hover">
                           <label><img class="img-grayscale" id="img-moti-impreso" src="vista/assets/images/img-moti-impreso.png" width="230"><br>
                            <input type="checkbox" name="moti_ed_impreso" value="1" id="moti_ed_impreso"> 
                              EDICIÓN IMPRESA 
                              <span><br>Gratis a Domicio!</span>
                              <span><br><i>(Exclusivo para Argentina)</i></span></label>
                      </div>

                      <div class="col-md-3 hover">
                            <label><img class="img-grayscale" id="img-moti-digital" src="vista/assets/images/img-moti-digital.png" width="230"><br>
                            <input type="checkbox" name="moti_ed_digital" value="1" id="moti_ed_digital"> EDICIÓN DIGITAL <span><br>Gratis via e-mail</span></label>                        
                      </div>
                      <div class="col-md-3 hover">
                            <label><img class="img-grayscale" id="img-dosm-impreso" src="vista/assets/images/img-dosm-impreso.png" width="230"><br>
                            <input type="checkbox" name="dosm_ed_impreso" value="1" id="dosm_ed_impreso"> 
                            EDICIÓN IMPRESA
                              <span><br>Gratis a Domicio!</span>
                              <span><br><i>(Exclusivo para Argentina)</i></span></label>
                      </div>
                      <div class="col-md-3 hover">
                            <label><img class="img-grayscale" id="img-dosm-digital" src="vista/assets/images/img-dosm-digital.png" width="230"><br>
                            <input type="checkbox" name="dosm_ed_digital" value="1" id="dosm_ed_digital"> EDICIÓN DIGITAL <span><br>Gratis via e-mail</span></label>                        
                      </div>                      

                    <div  id="step-0" class="hide alert alert-danger">
                      <span class="help-block">Elige al menos una opcion</span></div>
                    </div>
                    </div>
                </div>
                <div id="step-2">
                    
                    <div id="form-step-1" role="form" data-toggle="validator">
                         
                         <div class="row">
                          
                            <div class="col-md-4">
                         <h2>Datos Personales</h2>
                               <div class="form-group">
                                  <input type="email" class="form-control" class="form-control" name="email" id="email" placeholder="E-Mail"  value="" required> 
                                  <div class="help-block with-errors"></div>
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Su Nombre" required value="">
                                  <div class="help-block with-errors"></div>
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Su Apellido" value="" required>
                                  <div class="help-block with-errors"></div>
                              </div>
                             </div>
                             <div class="col-md-7 offset-md-1">
                          <h2>Dirección de entrega</h2>
                            <div id="domicilio" class="form-group">
                            <div class="row">
                                  <div class="form-group col-md-4">
                                      <select id="pais"  class="form-control select" name="pais" required >
                                        <option value="0">Seleccione</option>
                                      </select>
                                       <div class="help-block with-errors"></div>
                                  </div>
                                  <div class="form-group col-md-5">
                                      <select id="provincia"  class="form-control select" name="provincia" required >
                                        <option value="0">Seleccione</option>
                                      </select>
                                  </div>
                            </div>
                            <div class="row">
                                  <div class="form-group col-md-6">
                                      <select id="localidad"  class="form-control select" name="localidad" required >
                                        <option value="0">Seleccione</option>
                                      </select>
                                      <div class="help-block with-errors"></div>
                                  </div>
                                  <div class="form-group col-md-3">
                                      <input id="cod_postal"  class="form-control" name="cod_postal" type="text" placeholder="CP" >
                                      <div class="help-block with-errors"></div>
                                  </div>
                            </div>
                            <div class="row">
                                  <div class="form-group  col-md-6">
                                      <input id="calle"  class="form-control " name="calle" type="text" placeholder="Calle" >
                                    <div class="help-block with-errors"></div>
                                  </div>
                                  <div class="form-group col-md-3">
                                      <input id="numero"  class="form-control" name="numero" type="text" placeholder="Número" >
                                      <div class="help-block with-errors"></div>
                                  </div>
                                  <div class="form-group col-md-3">
                                      <input id="piso"  class="form-control" name="piso" type="text" placeholder="Piso, Dpto, Timbre" >
                                      <div class="help-block with-errors"></div>
                                  </div>
                            </div>

                            </div>                               
                             </div> 
                        </div>                        
                        <hr>

                        <h4>Formación</h4>
                        <div class="row">
                          <div class="col-md-2">
                              <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" name="chk-profesional" type="checkbox" value="is_profesional" id="chk-profesional">
                                      <label class="form-check-label" for="chk-profesional">Profesional</label>
                                    </div>                          
                              </div>
                          </div>
                           <div class="col-md-4">
                                <div class="form-group">
                                        <select class="form-control" id="profesion" name="tipo-profesional" disabled="true">
                                          <option selected disabled>Escoje un valor...</option>

                                        </select>
                                 </div>
                              </div>
                              <div class="form-group col-md-4">
                                  <input id="tipo-prof-otro"  class="form-control" name="tipo-prof-otro" type="text" placeholder="Indique Otro..." >
                                  <div class="help-block with-errors"></div>
                              </div>                              
                          </div>
                        <br>
                          <div class="row">
                            <div class="col-md-2">
                                  <div class="form-group">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="chk-estudiante"  value="estudiante" id="chk-estudiante">
                                          <label class="form-check-label" for="chk-estudiante">Estudiante</label>
                                        </div>                          
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                            <select class="form-control" id="carrera" disabled="true" name="carrera">
                                                <option selected disabled>Carrera...</option>
                                            </select>
                                   </div>
                               </div>
                              <div class="col-md-4">
                                  <div class="form-group">                         
                                            <select class="form-control" id="institucion" disabled="true" name="institucion">
                                                <option selected disabled>Institución...</option>
                                            </select>
                                   </div>
                               </div>
                          </div>
                          
                        <hr>
                        <h4>Tipo Empresa</h4>
                       <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo_empresa" id="opc_independiente" value="3" required>
                          <label class="form-check-label" for="opc_independiente">Independiente</label>
                        </div>       

                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo_empresa" id="opc_empresa" value="1" required>
                          <label class="form-check-label" for="opc_empresa">Empresa</label>
                              
                              <div class="row detalle-empresa" style = "margin-top:20px;">
                                  <div class="form-group col-md-4">
                                    <select class="form-control area" id="area-empresa"  name="area-empresa">
                                    </select>  
                                  </div>
                                  <div class="form-group col-md-4 align-bottom">
                                        <input id="area-empresa-otro"  class="form-control" name="area-empresa-otro" type="text" placeholder="Otra Area..." >
                                        <div class="help-block with-errors"></div>
                                    </div>
                              </div>
                              <div class="row detalle-empresa">
                                <div class="form-group col-md-4">
                                          <select class="form-control cargo" id="cargo-empresa"  name="cargo-empresa">
                                          </select>  
                                     </div> 
                                     <div class="form-group col-md-4 align-bottom">
                                        <input id="cargo-empresa-otro"  class="form-control" name="cargo-empresa-otro" type="text" placeholder="Otro Cargo..." >
                                        <div class="help-block with-errors"></div>
                                    </div>
                          </div>
                      </div>
                        
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo_empresa" id="opc_institucion" value="2" required>
                          <label class="form-check-label" for="opc_institucion">Institución</label>
                             
                              <div class="row detalle-institucion" style = "margin-top:20px;">
                                  <div class="form-group col-md-4">
                                    <select class="form-control area" id="area-institucion"  name="area-empresa">
                                    </select>  
                                  </div>
                                  <div class="form-group col-md-4 align-bottom">
                                        <input id="area-institucion-otro"  class="form-control" name="area-institucion-otro" type="text" placeholder="Indique Otra Area..." >
                                        <div class="help-block with-errors"></div>
                                    </div>
                              </div>
                              <div class="row detalle-institucion">
                                <div class="form-group col-md-4">
                                          <select class="form-control cargo" id="cargo-institucion"  name="cargo-empresa">
                                          </select>  
                                     </div> 
                                     <div class="form-group col-md-4 align-bottom">
                                        <input id="cargo-institucion-otro"  class="form-control" name="cargo-institucion-otro" type="text" placeholder="Indique Otro Cargo..." >
                                        <div class="help-block with-errors"></div>
                                    </div>
                          </div>                        
                        </div>
                                                    
                    </div>
                </div>
                <div id="step-3">
                    <h4>Actividad Laboral</h4>
                    <div id="form-step-2" role="form" data-toggle="validator">
                        <div id="act-laboral">
                        </div>                            
                       
                    <hr>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="rol-laboral" id="opt-dueno" value="1" checked>
                          <label class="form-check-label" for="opt-dueno">Dueño</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="rol-laboral" id="opt-empleado" value="0">
                          <label class="form-check-label" for="opt-empleado">Empleado</label>
                        </div>
                    <hr>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo-animal" id="opt-pequeno" value="0" checked>
                          <label class="form-check-label" for="opt-pequeno">Pequeños Animales</label>
                        </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo-animal" id="opt-grandes" value="1">
                          <label class="form-check-label" for="opt-grandes">Grandes Animales</label>
                        <div id="grandes_animales">
                        </div>                            
                      </div>
                    </div>
                </div>
                <div id="step-4">
                    <h4>Por favor indique sus intereses</h4>
                    <div id="form-step-3" role="form" data-toggle="validator">
                        <div id="intereses">
                        </div>                            
                    <hr>
                    <h4>¿Qué opinás de la revista?</h4><br>
                    
                        <textarea rows="4" cols="50" name="comentario"></textarea>
                    
                    <hr>
<!--                     <h4>Si apoyas nuestro trabajo</h4>
                    <p>Podes hacernos tu donacion desde aquí</p>
                    <button type="button" >Donar</button> -->
                    </div>


                </div>
            </div>
        </div>
        </form>

    </div>


