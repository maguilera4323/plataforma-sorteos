<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<br>
<div class="container">
    <h2><i class="fas fa-wrench"></i>&nbsp; Configuración</h2>
</div>
<br>

<div class="container config-contenedor">
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
        <div class="card h-100">
        <a href="<?php echo SERVERURL?>usuarios/">
        <i class="fas fa-users"></i></i>
        <div class="card-body">
            <h5 class="card-title">Usuarios</h5>
            <p class="card-text">Consulta y gestión de los usuarios de la plataforma</p>
        </div>
        </a>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
        <a href="<?php echo SERVERURL?>roles/">
        <i class="fas fa-users-cog"></i>
        <div class="card-body">
            <h5 class="card-title">Roles</h5>
            <p class="card-text">Consulta y gestión de los roles de la plataforma</p>
        </div>
        </a>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
        <a href="<?php echo SERVERURL?>permisos/">
        <i class="fas fa-tasks"></i>
        <div class="card-body">
            <h5 class="card-title">Permisos</h5>
            <p class="card-text">Consulta y gestión de los permisos de la plataforma</p>
        </div>
        </a>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
        <a href="<?php echo SERVERURL?>modulos/">
        <i class="fas fa-table"></i>
        <div class="card-body">
            <h5 class="card-title">Módulos</h5>
            <p class="card-text">Consulta y gestión de los módulos de la plataforma</p>
        </div>
        </a>
        </div>
    </div>
    </div>
</div>
