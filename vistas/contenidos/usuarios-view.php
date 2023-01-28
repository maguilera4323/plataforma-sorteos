<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>

<!-- TARJEA AGREGAR EMPLEADOS -->
<div class="Tarjeta1">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
        <div class="card-header1"><img class="card-img-top" src="../vistas/assets/img/img-empleado.png" alt="Card image cap"></div>
        <div class="card-body1">
          <h5 class="card-title1">EMPLEADOS</h5>
          <p class="card-text1">Gestión y revisión de las cuentas de usuario de los encargados de la plataforma</p>
          <a href="<?php echo SERVERURL?>empleados" class="btn btn-primary">INGRESAR</a>
        </div>
    </div>
</div>

<!-- TARJEA AGREGAR EMPRESA -->

<div class="Tarjeta2">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
        <div class="card-header2"><img class="card-img-top" src="../vistas/assets/img/img-empresa.png" alt="Card image cap"></div>
        <div class="card-body2">
          <h5 class="card-title2">PARTICIPANTES</h5>
          <p class="card-text2">Gestión y revisión de las personas registradas en la plataforma para participar en los sorteos</p>
          <a href="<?php echo SERVERURL?>participantes" class="btn btn-primary">INGRESAR</a>
        </div>
    </div>
</div>
   

