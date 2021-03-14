 <?php 	
if (!$_SESSION['validar']){
					echo '<script> window.location = "login"</script>';
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="dashboard">APP Suscripción</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link " href="dashboard">INICIO</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="alta_suscripcion">NUEVO</a>
      </li>
      <li class="nav-item active">
          <a class="nav-link" href="importar_excel">IMPORTAR</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          DUPLICADOS
        </a>
        <div class="dropdown-menu" href="dashboard" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="duplicado_activo">ACTIVOS</a>
          <a class="dropdown-item" href="duplicado_temporal">TEMPORALES</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="duplicado_tmp_act">ACTIVOS vs TEMPORALES</a>
        </div>
      </li>
    </ul>
    <ul class="nav justify-content-end">
      <li class="nav-item">
        <a class="nav-link active" href="#">Admin</a>
      </li>
      <li class="nav-item">
        <img src="http://via.placeholder.com/30x30" style="border-radius: 15px;" alt="user" class="profile-pic">
      </li>
    </ul>    
  </div>
</nav>
