<?php
if (!$_SESSION['validar']){
          echo '<script> window.location = "login"</script>';
}


  include "vista/modulos/nav_sup.php";

 $edit_usuario = new SuscriptoresController();                 

if ((isset($_POST["masivo"]))&&($_POST["masivo"]>0)){
     $edit_usuario -> insertMasivoSuscripciones($_POST["masivo"]);
}
?>

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


<div class="bg-light" >
<div class="container" style="margin-top: 10px; margin-bottom: 10px;">
    <ul class="nav justify-content-end">
 
      <li class="nav-item" style='margin-left:5px'>
            <a id="" href="importar_excel" class="btn btn-outline-primary btn-sm btn-submenu"><span><i class="fas fa-chevron-circle-left"></i> VOLVER</a>
      </li>     <li class="nav-item" style='margin-left:5px'>
      <form method="post" action="duplicado_excel">
        <input type="hidden" value="<?php echo $_POST['tabla']?>" name="duplicados">
         <button type="submit" class="btn btn-outline-primary btn-sm btn-submenu"><i class="far fa-copy"></i> BUSCAR DUPLICADOS</button>
      </form>
      </li>            
    </ul>   
</div>
</div>
  



<div class="container shadow p-3 mb-5 bg-white rounded contendor-mot">
    <div class="container row " style="margin-top:20px; margin-bottom: 20px;">
      <div class="row panel-excel">
        <div class="col-md-12">
            <h3>Importador Masivo</h3>
        </div>
          
        <div class="col-md-12">
          <div class="form-group">

            <form method="post" enctype="multipart/form-data">
                <input type="file" name="excel" id="excel" class="inputfile" />
                <input type="submit" class="btn btn-primary" value="Cargar  ">
            </form>
          </div>
        </div>
      </div>
<?php
  if (isset($_FILES['excel'])){
 ?>   
  <div class="row justify-content-end">
  <div class="col col-lg-6">
      <form method="post">
<!--         <input type="hidden" value="<?php echo $_POST['tabla']?>" name="masico">
 -->         <input type="submit" class="btn btn-success" value="INSERT MASIVO">
      </form>

  </div>
  </div>
 <?php 
   $edit_usuario -> ImportarExcel($_FILES['excel']["tmp_name"]);

 } elseif(isset($_POST['tabla'])) {
 
 ?>       
  <div class="row justify-content-end">
  <div class="col col-lg-6">
      <form method="post">
        <input type="hidden" value="<?php echo $_POST['tabla']?>" name="masivo">
         <input type="submit" class="btn btn-success" value="INSERT MASIVO">
      </form>

  </div>
  </div>

  <table class="table tabla-pre-excel table-striped table-bordered table-sm table-responsive datatables-basic" id="tb_duplicados">

 <?php
   $edit_usuario -> TablaImportacionesxID($_POST['tabla']);
 ?>   
 </table>
     
 <?php
 } else {
 ?>       

  <table class="table table-striped table-responsive table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>FECHA</th>
        <th>VER</th>
      </tr>
    </thead>
    <tbody>

 <?php
   $edit_usuario -> TablaImportaciones();
 ?>   
  </tbody>
 </table>
     
 <?php
 }
 ?>       

    </div>
    </div>
  </body>
</html>
