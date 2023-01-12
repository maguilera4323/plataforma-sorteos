<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/obtenerDatos.php"); 
?>

<h3 style="padding:3rem;"><i class="fas fa-wrench"></i> &nbsp; CONFIGURACION </h3>

<div class="row row-cols-4 row-cols-md-3 g-3 text-center">
  <div class="col">
  <a href="<?php echo SERVERURL?>usuarios/">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center"><i class="fas fa-users-cog" style="font-size:30px; color:black;"></i></h5>
        <p class="card-text text-center" style="font-size:30px; color:black;">Usuarios</p>
      </div>
    </div>
</a>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
      <h5 class="card-title text-center"><i class="fas fa-wrench" style="font-size:30px;"></i></h5>
        <p class="card-text text-center" style="font-size:30px;">Roles</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
    <div class="card-body">
      <h5 class="card-title text-center"><i class="fas fa-wrench" style="font-size:30px;"></i></h5>
        <p class="card-text text-center" style="font-size:30px;">Roles</p>
      </div>
    </div>
  </div>
  <div class="col text-center">
    <div class="card ">
    <div class="card-body">
      <h5 class="card-title text-center"><i class="fas fa-wrench" style="font-size:30px;"></i></h5>
        <p class="card-text text-center" style="font-size:30px;">Roles</p>
      </div>
    </div>
  </div>
</div>