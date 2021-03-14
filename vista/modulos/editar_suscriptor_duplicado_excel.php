<?php
if (!$_SESSION['validar']){
      echo '<script> window.location = "login"</script>';
      exit ();
}

 $edit_usuario = new SuscriptoresController();                 
 $datos_usuario = DashboardController::DatosFullSuscritorController($_POST);
//var_dump($datos_usuario);

$duplicado = DashboardController::DatosFullSuscritorDuplicadoController($_POST['dup_edit']);

if ($datos_usuario["ssu_motivar_digital"] == 1) $ssu_motivar_digital= 'checked="checked"'; else $ssu_motivar_digital = '';
if ($datos_usuario["ssu_2_2_digital"] == 1) $ssu_2_2_digital= 'checked="checked"'; else $ssu_2_2_digital = '';
if ($datos_usuario["ssu_motivar_impreso"] == 1) $ssu_motivar_impreso= 'checked="checked"'; else $ssu_motivar_impreso = '';
if ($datos_usuario["ssu_2_2_impreso"] == 1) $ssu_2_2_impreso= 'checked="checked"'; else $ssu_2_2_impreso = '';


if ($datos_usuario["sip_profesional"] > 0) $sip_profesional= 'checked="checked"'; else $sip_profesional = '';
if ($datos_usuario["sip_carrera"] > 0) $sip_carrera= 'checked="checked"'; else $sip_carrera = '';



if ($datos_usuario["sip_tipo_empresa"] == 3) $independiente= 'checked="checked"'; else $independiente = '';
if ($datos_usuario["sip_dueno_empleado"] == 1) $dueno= 'checked="checked"'; else $dueno = '';
if ($datos_usuario["sip_dueno_empleado"] == 0) $empleado= 'checked="checked"'; else $empleado = '';
if ($datos_usuario["sip_pequenos_animales"] == 1) $pequenos= 'checked="checked"'; else $pequenos = '';
if ($datos_usuario["sip_grandes_animales"] == 1) $grandes= 'checked="checked"'; else $grandes = '';
if ($datos_usuario["sug_comentario_aideas_1"] != "") $obser1= html_entity_decode($datos_usuario["sug_comentario_aideas_1"]); else $obser1 = '';
if ($datos_usuario["sug_comentario_aideas_2"] != "") $obser2= html_entity_decode($datos_usuario["sug_comentario_aideas_2"]); else $obser2 = '';
if ($datos_usuario["scp_pais"] > 0) $pais= $datos_usuario["spa_nombre"]; else $pais = 'Seleccione';
if ($datos_usuario["scp_pais"] > 0) $pais_id= $datos_usuario["scp_pais"]; else $pais_id = 0;

$opcion_cargo_empresa = '<option value="'.$datos_usuario['scr_id'].'" selected>'.$datos_usuario['scr_nombre'].'</option>';              
$opcion_area_empresa = '<option value="'.$datos_usuario['sar_id'].'" selected>'.$datos_usuario['sar_nombre'].'</option>';              

if ($datos_usuario["sip_tipo_empresa"] == 1){ 
  $empresa= 'checked="checked"';
  $opcion_cargo_empresa = '<option value="'.$datos_usuario['scr_id'].'" selected>'.$datos_usuario['scr_nombre'].'</option>';              
  $opcion_area_empresa = '<option value="'.$datos_usuario['sar_id'].'" selected>'.$datos_usuario['sar_nombre'].'</option>';     }
else {
  $empresa = '';
  $opcion_cargo_empresa = '';
  $opcion_area_empresa = '';
 }

if ($datos_usuario["sip_tipo_empresa"] == 2){ 
  $opcion_cargo_institucion = '<option value="'.$datos_usuario['scr_id'].'" selected>'.$datos_usuario['scr_nombre'].'</option>';              
  $opcion_area_institucion = '<option value="'.$datos_usuario['sar_id'].'" selected>'.$datos_usuario['sar_nombre'].'</option>';              
  $institucion= 'checked="checked"';
  }  else {
    $institucion = '';
    $opcion_cargo_institucion = '';
    $opcion_area_institucion = '';
 } 

if ($duplicado["tmp_sus_mot_digital"] != '') $tmp_sus_mot_digital= '<div class="help-block with-errors">Valor Excel: '.$duplicado["tmp_sus_mot_digital"].'</div>'; else $tmp_sus_mot_digital = '';
if ($duplicado["tmp_sus_2mas2_digital"] != '') $tmp_sus_2mas2_digital= '<div class="help-block with-errors">Valor Excel: '.$duplicado["tmp_sus_2mas2_digital"].'</div>'; else $tmp_sus_2mas2_digital = '';
if ($duplicado["tmp_sus_mot_impreso"] != '') $tmp_sus_mot_impreso= '<div class="help-block with-errors">Valor Excel: '.$duplicado["tmp_sus_mot_impreso"].'</div>'; else $tmp_sus_mot_impreso = '';
if ($duplicado["tmp_sus_2mas2_impreso"] != '') $tmp_sus_2mas2_impreso= '<div class="help-block with-errors">Valor Excel: '.$duplicado["tmp_sus_2mas2_impreso"].'</div>'; else $tmp_sus_2mas2_impreso = '';

if ($duplicado["tmp_independiente"] != '') $tmp_independiente= '<div class="help-block with-errors">Valor Excel: '.$duplicado["tmp_independiente"].'</div>'; else $tmp_independiente = '';

if ($duplicado["tmp_actividad_dueno"] != '') $tmp_actividad_dueno= '<div class="help-block with-errors">Valor Excel: '.$duplicado["tmp_actividad_dueno"].'</div>'; else $tmp_actividad_dueno = '';

if ($duplicado["tmp_actividad_peq_animales"] != '') $tmp_actividad_peq_animales= '<div class="help-block with-errors">Valor Excel: Pequeños Animales ->'.$duplicado["tmp_actividad_peq_animales"].'</div>'; else $tmp_actividad_peq_animales = '';
if ($duplicado["tmp_actividad_gran_animales"] != '') $tmp_actividad_gran_animales= '<div class="help-block with-errors">Valor Excel: Grandes Animales ->'.$duplicado["tmp_actividad_gran_animales"].'</div>'; else $tmp_actividad_gran_animales = '';





if ($duplicado["tmp_actividad_veterinaria"] != '') $tmp_actividad_veterinaria= '<div class="help-block with-errors">Valor Excel: Actividad Veterinaria-> '.$duplicado["tmp_actividad_veterinaria"].'</div>'; else $tmp_actividad_veterinaria = '';
if ($duplicado["tmp_actividad_industria"] != '') $tmp_actividad_industria= '<div class="help-block with-errors">Valor Excel: Industria/Distribución-> '.$duplicado["tmp_actividad_industria"].'</div>'; else $tmp_actividad_industria = '';
if ($duplicado["tmp_actividad_agropecuaria"] != '') $tmp_actividad_agropecuaria= '<div class="help-block with-errors">Valor Excel: Actividad Agropecuaria '.$duplicado["tmp_actividad_agropecuaria"].'</div>'; else $tmp_actividad_agropecuaria = '';

$intereses = '<div class="help-block with-errors"> Valor en Excel: ';

if ($duplicado["tmp_intereses_1"] != '') $intereses= $intereses.'<br> - Información del sector de la sanidad animal en argentina';
if ($duplicado["tmp_intereses_2"] != '') $intereses= $intereses.'<br> - Información técnica';
if ($duplicado["tmp_intereses_3"] != '') $intereses= $intereses.'<br> - Conocer nuevos productos / proveedores<br>';
if ($duplicado["tmp_intereses_4"] != '') $intereses= $intereses.'<br> - Cursos y capacitación';
if ($duplicado["tmp_intereses_5"] != '') $intereses= $intereses.'<br> - Networking / Eventos';

if ($intereses != '<div class="help-block with-errors"> Valor en Excel: '){
$intereses= $intereses.'</div>';
} else {
  $intereses = '';
}

if ($duplicado["tmp_observaciones"] != '') $tmp_observaciones= 'Obs. Duplicado: '.$duplicado["tmp_observaciones"]; else $tmp_observaciones = '';
if ($duplicado["tmp_observaciones2"] != '') $tmp_observaciones2= 'Obs. Duplicado: '.$duplicado["tmp_observaciones2"];  else $tmp_observaciones2 = '';


  include "vista/modulos/nav_sup.php";

?>

<div class="bg-light" >
<div class="container" style="margin-top: 10px; margin-bottom: 10px;">
    <ul class="nav justify-content-end">
 
      <li class="nav-item" style='margin-left:5px'>
            <a id="" href="duplicado_tmp_act" class="btn btn-outline-primary btn-sm btn-submenu"><span><i class="fas fa-chevron-circle-left"></i> VOLVER</a>
      </li>            
      <li class="nav-item" style='margin-left:5px'>
            <button id="btn-guardar_salir" type="button" class="btn btn-outline-primary btn-sm"><span><i class="far fa-save"></i> GUARDAR Y SALIR</button>
      </li>            
      <li class="nav-item" style='margin-left:5px'>
            <button id="btn-guardar" type="button" class="btn btn-outline-primary btn-sm"><span><i class="far fa-save"></i> GUARDAR</button>
      </li>            
      <li class="nav-item" style='margin-left:5px'>
            <button id="btn-eliminar" type="button" class="btn btn-outline-danger btn-sm btn-delet_id_excel"><span><i class="fas fa-trash-alt"></i> DESCARTAR DUPLICADO</button>
            <input type="hidden" id="delet" value="<?php echo $duplicado['tmp_id'];?>" class="id">
      </li>            
    </ul>   
</div>
</div>

<div class="container shadow p-3 mb-5 bg-white rounded contendor-mot">
  

    <div class="container" id="#form_editar">
              <div class="row">
                <h2>EDITAR SUSCRIPTOR <?php echo $datos_usuario['sug_id'];?> vs DUPLICADO</h2>
              </div>      <br />
        <!-- <form action="#" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8"> -->
        <!-- SmartWizard html -->
    
        <div class="info-superior"><p>
          Para unificar los suscriptores, puede hacer clic en el campo coloreado de naranja (valor duplicado) y luego en el boton de guardar <span><i class="far fa-save"></i></span> para salvar solo la seccion en curso, o en GUARDAR del menu superior para salvar todas las modificaciones.
        </p></div>
              <div class="row">
                <h3>Datos Personales</h3>
                <input type="hidden" id="id" value="<?php echo $datos_usuario['sug_id'];?>">

               </div>
            <div class="row"> 
                 <div class="col-md-6">
                       <div class="form-inline form-group">
                           <input type="text" class="form-control col-md-8" id="nombre" placeholder="Nombre" required value="<?php echo $datos_usuario['sug_nombre'];?>">
                           <input type="text" class="form-control col-md-4 duplicado" value="<?php echo $duplicado['tmp_nombre'];?>" readonly>
                       </div>
                       <div class="form-inline form-group">
                           <input type="text" class="form-control col-md-8" id="apellido" placeholder="Apellido" value="<?php echo $datos_usuario['sug_apellido'];?>" required>
                           <div class="help-block with-errors"></div>
                          <input type="text" class="form-control col-md-4 duplicado" value="<?php echo $duplicado['tmp_apellido'];?>" readonly>
                       </div>
                       <div class="form-inline form-group">
                           <input type="number" class="form-control col-md-8" id="dni" placeholder="DNI" required value="<?php echo $datos_usuario['sug_dni'];?>">
                           <div class="help-block with-errors"></div>
                          <input type="text" class="form-control col-md-4 duplicado" value="<?php echo $duplicado['tmp_dni'];?>" readonly>
                      </div>                       
                       <div class="form-inline form-group">
                           <input type="num" class="form-control col-md-8" class="form-control" id="nacimiento" placeholder="Fecha Nacimiento dd/mm/aaaa"  value="<?php echo $datos_usuario['sug_nacimiento'];?>" required> 
                           <div class="help-block with-errors"></div>
                          <input type="text" class="form-control col-md-4 duplicado" value="<?php echo $duplicado['tmp_nacimiento'];?>" readonly>
                      </div>
                 </div>
                 <div class="col-md-6">
                       <div class="form-inline form-group">
                           <input type="email" class="form-control col-md-8" class="form-control" id="email" placeholder="Correo"  value="<?php echo $datos_usuario['sug_correo_1'];?>" required> 
                           <div class="help-block with-errors"></div>
                          <input type="text" class="form-control col-md-4 duplicado" value="<?php echo $duplicado['tmp_correo_1'];?>" readonly>
                      </div>
                       <div class="form-inline form-group">
                           <input type="email" class="form-control col-md-8" class="form-control" id="email2" placeholder="Correo Alternativo"  value="<?php echo $datos_usuario['sug_correo_2'];?>" required> 
                           <div class="help-block with-errors"></div>
                          <input type="text" class="form-control col-md-4 duplicado" value="<?php echo $duplicado['tmp_correo_2'];?>" readonly>
                      </div>
                       <div class="form-inline form-group">
                           <input type="num" class="form-control col-md-8" id="telefono" placeholder="telefono" value="<?php echo $datos_usuario['sug_telefono_1'];?>" required>
                           <div class="help-block with-errors"></div>
                          <input type="text" class="form-control col-md-4 duplicado" value="<?php echo $duplicado['tmp_telefono_1'];?>" readonly>
                       </div>
                       <div class="form-inline form-group">
                           <input type="num" class="form-control col-md-8" id="telefono2" placeholder="Telefono Alternativo" value="<?php echo $datos_usuario['sug_telefono_2'];?>" required>
                           <div class="help-block with-errors"></div>
                          <input type="text" class="form-control col-md-4 duplicado" value="<?php echo $duplicado['tmp_telefono_2'];?>" readonly>
                       </div>
                  </div>
                </div>      

                                 <hr>

              <div class="row">
                <h3>Datos Postales</h3>

               </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div id="domicilio" class="form-group">
                        <select class="form-control select" id="pais" >
                              <option value="<?php echo $pais_id;?>" selected><?php echo $pais;?></option>
                        </select>
                        <input type="text" class="form-control duplicado_select" value="<?php echo $duplicado['tmp_pais'];?>" readonly>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                        <select class="form-control select" id="provincia" >
                          <option value="<?php echo $datos_usuario['spr_id'];?>" selected><?php echo $datos_usuario['spr_nombre'];?></option>
                        </select>
                        <input type="text" class="form-control duplicado_select" value="<?php echo $duplicado['tmp_provincia'];?>" readonly>

                     </div>
                     <div class="form-group col-md-4">
                         <select class="form-control select" id="localidad" >
                          <option value="<?php echo $datos_usuario['slo_id'];?>" selected><?php echo $datos_usuario['slo_nombre'];?></option>
                         </select>
                          <input type="text" class="form-control duplicado_select" value="<?php echo $duplicado['tmp_localidad'];?>" readonly>
                        <div class="help-block with-errors"></div>
                      </div>
                   <div class="form-group col-md-2">
                       <input class="form-control" id="cod_postal" type=text" placeholder="CP" value="<?php echo $datos_usuario['scp_cp'];?>">
                          <input type="text" class="form-control duplicado" value="<?php echo $duplicado['tmp_cp'];?>" readonly>
                       <div class="help-block with-errors"></div>
                   </div>
                   <div class="form-group  col-md-6">
                       <input class="form-control " id="calle" type="text"placeholder="Calle" value="<?php echo $datos_usuario['scp_calle'];?>" >
                          <input type="text" class="form-control duplicado" value="<?php echo $duplicado['tmp_calle'];?>" readonly>
                        <div class="help-block with-errors"></div>
                    </div>
                   <div class="form-group col-md-3">
                   <input class="form-control" id="numero" type="text" placeholder="Número" value="<?php echo $datos_usuario['scp_numero'];?>">
                          <input type="text" class="form-control duplicado" value="<?php echo $duplicado['tmp_numero'];?>" readonly>
                   <div class="help-block with-errors"></div>
                     </div>
                     <div class="form-group col-md-3">
                         <input class="form-control" id="piso" type="text"placeholder="Piso, Dpto, Timbre" value="<?php echo $datos_usuario['scp_piso_dto'];?>" >                          
                         <input type="text" class="form-control duplicado" value="<?php echo $duplicado['tmp_piso_dpto'];?>" readonly>

                          <div class="help-block with-errors"></div>
                     </div>
                    </div>
                        <hr>

              <div class="row">
                <h3>Suscripciones</h3>
               </div>
                    <div class="row">
                      <div class="col-md-3">
                           <label>
                            <input type="checkbox" name="moti_ed_impreso" value="1" id="moti_ed_impreso" <?php echo $ssu_motivar_impreso;?>"> 
                              EDICIÓN IMPRESA </label><?php echo $tmp_sus_mot_impreso;?> 
                      </div>
                      <div class="col-md-3">
                            <label>
                            <input type="checkbox" name="moti_ed_digital" value="1" id="moti_ed_digital" <?php echo $ssu_motivar_digital;?>"> EDICIÓN DIGITAL</label><?php echo $tmp_sus_mot_digital;?>                        
                      </div>
                      <div class="col-md-3">
                            <label>
                            <input type="checkbox" name="dosm_ed_impreso" value="1" id="dosm_ed_impreso" <?php echo $ssu_2_2_impreso?>"> 
                            EDICIÓN IMPRESA</label><?php echo $tmp_sus_2mas2_impreso;?>
                      </div>
                      <div class="col-md-3">
                            <label>
                            <input type="checkbox" name="dosm_ed_digital" value="1" id="dosm_ed_digital" <?php echo $ssu_2_2_digital;?>"> EDICIÓN DIGITAL</label><?php echo $tmp_sus_2mas2_digital;?>                        
                      </div>                      
                    </div>                      

                      
                        <hr>
          <form  id="laboral" role="form" data-toggle="validator" method="post" accept-charset="utf-8">


              <div class="row">
                <h4>Formación</h4>
               </div>

                        <div class="row">
                          <div class="col-md-2">
                              <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" name="chk-profesional" type="checkbox" value="is_profesional" id="chk-profesional" <?php echo $sip_profesional;?>>
                                      <label class="form-check-label" for="chk-profesional">Profesional</label>
                                    </div>                          
                              </div>
                          </div>
                           <div class="col-md-4">
                                <div class="form-group">
                                        <select class="form-control" id="profesion" name="tipo-profesional">
                          <option value="<?php echo $datos_usuario['sup_id'];?>" selected><?php echo html_entity_decode($datos_usuario['sup_nombre']);?></option>
                        </select>                          
                         <input type="text" class="form-control duplicado chk-profesional" value="<?php echo $duplicado['tmp_formacion_profesional'];?>" readonly>
                                 </div>
                              </div>
                            </div>
                            <div class="row">
                            <div class="col-md-2">
                                  <div class="form-group">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="chk-estudiante"  value="estudiante" id="chk-estudiante" <?php echo $sip_carrera;?>>
                                          <label class="form-check-label" for="chk-estudiante">Estudiante</label>
                                        </div>                          
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                            <select class="form-control" id="carrera" name="carrera">
                          <option value="<?php echo $datos_usuario['sca_id'];?>" selected><?php echo $datos_usuario['sca_nombre'];?></option>
                                            </select>                        
                                 <input type="text" class="form-control duplicado chk-estudiante" value="<?php echo $duplicado['tmp_formacion_carrera'];?>" readonly>

                                   </div>
                               </div>
                              <div class="col-md-4">
                                  <div class="form-group">                         
                                            <select class="form-control" id="institucion" name="institucion">
                          <option value="<?php echo $datos_usuario['sit_id'];?>" selected><?php echo html_entity_decode($datos_usuario['sit_nombre']);?></option>
                                            </select>
                       <input type="text" class="form-control duplicado chk-estudiante" value="<?php echo $duplicado['tmp_formacion_institucion'];?>" readonly>

                                   </div>
                               </div>
                          </div>
                          
                        <hr>
                <div class="row">
                <h4> Información Laboral</h4>
               </div>
                        <div class="row">
                            <div class="form-check col-md-12">
                          <input class="form-check-input" type="radio" name="edit_tipo_empresa" id="opc_independiente" value="3" <?php echo $independiente;?>>
                          <label class="form-check-label" for="opc_independiente">Independiente</label><?php echo $tmp_independiente;?>                        
                        </div>       
                        </div>       

                        <div class="row">
                            <div class="form-check col-md-2">
                              <input class="form-check-input" type="radio" name="edit_tipo_empresa" id="opc_empresa" value="1" <?php echo $empresa;?>>
                              <label class="form-check-label" for="opc_empresa">Empresa</label>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control area" id="area-empresa"  name="area-empresa">
                               <?php echo $opcion_area_empresa;?>
                                </select>  
                                <input type="text" class="form-control duplicado opt-empresa" value="<?php echo $duplicado['tmp_empresa_area'];?>" readonly>

                            </div>
                            <div class="form-group col-md-4">
                              <select class="form-control cargo" id="cargo-empresa"  name="cargo-empresa">
                              <?php echo $opcion_cargo_empresa;?>
                              </select> 
                              <input type="text" class="form-control duplicado opt-empresa" value="<?php echo $duplicado['tmp_empresa_cargo'];?>" readonly>
                              </div> 
                        </div>
                        <div class="row">
                            <div class="form-check col-md-2">
                              <input class="form-check-input" type="radio" name="edit_tipo_empresa" id="opc_institucion" value="2" <?php echo $institucion;?>>
                               <label class="form-check-label" for="opc_institucion">Institución</label>
                            </div>
                            <div class="form-group col-md-4">
                                    <select class="form-control area" id="area-institucion"  name="area-empresa">
                               <?php echo $opcion_area_institucion;?>
                                    </select>
                                    <input type="text" class="form-control duplicado opt-institucion" value="<?php echo $duplicado['tmp_institucion_departamento'];?>" readonly>  
                            </div>
                            <div class="form-group col-md-4">
                                  <select class="form-control cargo" id="cargo-institucion"  name="cargo-empresa">
                              <?php echo $opcion_cargo_institucion;?>
                                          </select>
                                          <input type="text" class="form-control duplicado opt-institucion" value="<?php echo $duplicado['tmp_institucion_cargo'];?>" readonly>  
                            </div> 
                          </div>                        
                                                    

              <div class="row">
                 <h5>Actividad Laboral</h5>
               </div>
                        <div id="act-laboral-edit">
                <?php
                  $edit_usuario -> actividadLaboralUsuarioControlador($datos_usuario['sip_actividad_laboral']);
                  echo $tmp_actividad_veterinaria;
                  echo $tmp_actividad_industria;
                  echo $tmp_actividad_agropecuaria;



                ?>

                        </div>                            
                       
                    <hr>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="rol-laboral" id="opt-dueno" value="1" <?php echo $dueno;?>>
                          <?php echo $tmp_actividad_dueno;?>
                          <label class="form-check-label" for="opt-dueno">Dueño</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="rol-laboral" id="opt-empleado" value="0" <?php echo $empleado;?>>
                          <label class="form-check-label" for="opt-empleado">Empleado</label>
                        </div>
                    <hr>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo-animal" id="opt-pequeno" value="0" <?php echo $pequenos;?>>
                          <label class="form-check-label" for="opt-pequeno">Pequeños Animales</label>
                        </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipo-animal" id="opt-grandes" value="1" <?php echo $grandes;?>>
                          <label class="form-check-label" for="opt-grandes">Grandes Animales</label>
                        <div id="grandes_animales_edit">
                <?php

                  $edit_usuario -> grandesAnimalesUsuarioControlador($datos_usuario['sug_id']);
             echo $tmp_actividad_peq_animales;
             echo $tmp_actividad_gran_animales;
                ?>
                        </div>                            
                </form>     
                    <hr>
          <form  id="otros" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
              <div class="row">
                 <h4>Intereses</h4>
               </div>


              <div class="row">
                    <div class="col-md-6">
                        <div id="intereses_edit">

                <?php

                  $edit_usuario -> interesesUsuarioControlador($datos_usuario['sug_id']);
                  echo $intereses;
                             ?>
                        </div>                            
                    </div>                            
                </div>                            
                    <hr>
              <div class="row">
                    <div class="col-md-6">
                <h4>Observaciones del suscriptor</h4>
                        <textarea rows="4" cols="50" name="comentario1"><?php echo $obser1;?></textarea>
                        <p><span class="text-danger"><?php echo $tmp_observaciones;?></span></p>
                    </div>
                    
                   <div class="col-md-6">
                    <h4>Observaciones de Motivar</h4>
                    
                        <textarea rows="4" cols="50" name="comentario2"><?php echo $obser2;?></textarea>
                        <p><span class="text-danger"><?php echo $tmp_observaciones2;?></span></p>

                    
                    </div>
                    </div>
                    <hr>


                </form>     
               </div>
               </div>

            </div>
        </div>

    </div>

<div class="modal fade" id="guardado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Guardado con exito!</h4>
        <p>Descartar Duplicado?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal" id="confirmar_guardado_dup">Aún NO</button>
        <button type="button" class="btn btn-danger btn-delet_id_excel" data-dismiss="modal" id="descartar_duplicado">
        SI, descartar</button>
        <input type="hidden" id="delet" value="<?php echo $duplicado['tmp_id'];?>" class="id">

      </div>
    </div>
  </div>
</div>

