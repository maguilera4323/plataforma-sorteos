<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//archivo para obtener los permisos del rol conectado al sistema en la vista a la que ha accedido
include("./DatosTablas/obtenerDatosPermisos.php"); 

//verificación de permisos
//se revisa si el usuario tiene acceso a una vista específica por medio del rol que tiene y el objeto al que quiere acceder
	$id_rol=$_SESSION['id_rol'];
	$datos=new obtenerDatosPermisos();
    $resultado=$datos->datosPermisosID($id_rol,13);

    foreach ($resultado as $fila){
		$permiso_con=$fila['permiso_consulta'];
	}

//valida si el query anterior no retornó ningún valor
//en este caso no había un permiso registrado del objeto para el rol del usuario conectado
	if(!isset($permiso_con)){
		echo '<div class="modal-body" id="modal-actualizar" style="display:none">;';
		echo "<script>
              setTimeout(function(){location.href='".SERVERURL."404/'} , 0000); </script>";
//valida si el permiso tiene valor de cero, lo que significa que no puede acceder a la vista	
	}else if($permiso_con==0){
		echo '<div class="modal-body" id="modal-actualizar" style="display:none">;';
		echo "<script>
              setTimeout(function(){location.href='".SERVERURL."404/'} , 0000); </script>";
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
