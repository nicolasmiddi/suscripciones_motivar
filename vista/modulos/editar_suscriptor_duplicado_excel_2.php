<?php
if (!$_SESSION['validar']){
      echo '<script> window.location = "dashboard"</script>';
      exit ();
}

  include "vista/modulos/nav_sup.php";
$dashboard = new SuscriptoresController();     
//validar campo

if (isset($_GET['id']))
{  $id= htmlentities($_GET['id']);
  $id= htmlentities($_GET['id']);
}
if (isset($_POST['id']))
{  $id= htmlentities($_POST['id']);
    $id= htmlentities($_POST['id']);
    $dashboard -> editar_duplicado_temporal($_POST);

  }  


?>

<div class="bg-light" >
<div class="container" style="margin-top: 10px; margin-bottom: 10px;">
    <ul class="nav justify-content-end">
 
      <li class="nav-item" style='margin-left:5px'>
            <a id="" href="duplicado_temporal" class="btn btn-outline-primary btn-sm btn-submenu"><span><i class="fas fa-chevron-circle-left"></i> VOLVER</a>
      </li>            
      <form method="post">      
      <li class="nav-item" style='margin-left:5px'>
            <button id="" type="submit" class="btn btn-outline-primary btn-sm"><span><i class="far fa-save"></i> GUARDAR</button>
      </li>            
    </ul>   
</div>
</div>

<div class="container shadow p-3 mb-5 bg-white rounded contendor-mot">

    <div class="container" id="#form_editar">
              <div class="row">
                <h2>EDITAR TEMPORAL <?php echo $id;?></h2>
                <input type="hidden" name="id" value="<?php echo $id;?>">
              </div>      <br />
        <!-- <form action="#" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8"> -->
        <!-- SmartWizard html -->
    
        <div class="info-superior">
          <p>Para editar los campos temporales se debe hacer clic sobre el campo a modificar. Luego, se debe hacer clic en <i class="far fa-save"></i> GUARDAR. &nbsp;
          Para eliminar un duplicado, debe hacer clic en <i class="fas fa-trash-alt"></i> ELIMINAR.&nbsp;
          Para insertar un duplicado, debe hacer clic  <i class="fas fa-arrow-circle-right"></i> INSERTAR. Si hizo cambios, primero debe guardarlo.&nbsp;&nbsp;
          Recuerde que si edita un campo clave, el mismo dejará de considerarse <strong>duplicado</strong></p>
           
        </div>
        <div>
          <table class="table">
          <thead>
                <?php
                  $dashboard -> full_duplicado_activo_tmp($id);
                ?>

          </tbody>
          </table>
        </form>

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

<div class="modal fade" id="confirmarDuplicado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Correo ya existe. Ingresar de todos modos?</h4>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="id_deplicado">
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="confirmar_duplicado">Si, Ingresar!</button>
        <button type="button" class="btn" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


