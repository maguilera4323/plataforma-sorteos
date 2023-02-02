<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>

<div class="container tarjeta-contenedor">
  <div class="row justify-content-md-center">
    <div class="col col-lg-4">
        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header"><img class="card-img-top" src="../vistas/assets/img/img-empleado.png" alt="Card image cap"></div>
            <div class="card-body">
            <h5 class="card-title">EMPLEADOS</h5>
            <p class="card-text">Gestión y revisión de las cuentas de usuario de los encargados de la plataforma</p>
            <a href="<?php echo SERVERURL?>empleados" class="btn btn-primary">INGRESAR</a>
            </div>
        </div>
    </div>
    <div class="col col-lg-4">
        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header"><img class="card-img-top" src="../vistas/assets/img/img-empresa.png" alt="Card image cap"></div>
            <div class="card-body">
            <h5 class="card-title">PARTICIPANTES</h5>
            <p class="card-text">Gestión y revisión de las personas registradas en la plataforma para participar en los sorteos</p>
            <a href="<?php echo SERVERURL?>participantes" class="btn btn-primary">INGRESAR</a>
            </div>
        </div>
    </div>
  </div>


   

