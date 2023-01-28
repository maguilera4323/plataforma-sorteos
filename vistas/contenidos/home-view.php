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
          <h5 class="card-title1">AGREGAR EMPLEADOS</h5>
          <p class="card-text1">Agrega empleados de manera rapida y segura.</p>
          <a href="<?php echo SERVERURL?>empleados" class="btn btn-primary">AÑADIR</a>
        </div>
    </div>
</div>

<!-- TARJEA AGREGAR EMPRESA -->

<div class="Tarjeta2">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
        <div class="card-header2"><img class="card-img-top" src="../vistas/assets/img/img-empresa.png" alt="Card image cap"></div>
        <div class="card-body2">
          <h5 class="card-title2">AGREGAR EMPRESAS</h5>
          <p class="card-text2">Agrega empresas de manera rapida y segura.</p>
          <a href="<?php echo SERVERURL?>empresas" class="btn btn-primary">AÑADIR</a>
        </div>
    </div>
</div>
   

<!-- TARJEA AGREGAR SORTEOS -->
<div class="Tarjeta3">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
        <div class="card-header3"><img class="card-img-top" src="../vistas/assets/img/img-sorteo.png" alt="Card image cap"></div>
        <div class="card-body3">
          <h5 class="card-title3">AGREGAR SORTEOS</h5>
          <p class="card-text3">Agrega sorteos de manera rapida y segura.</p>
          <a href="<?php echo SERVERURL?>sorteos" class="btn btn-primary">AÑADIR</a>
        </div>
    </div>
</div>

