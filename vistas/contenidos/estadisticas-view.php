<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
    include("./DatosTablas/obtenerDatos.php"); 
//archivo para obtener los permisos del rol conectado al sistema en la vista a la que ha accedido
    include("./DatosTablas/obtenerDatosPermisos.php"); 

//verificación de permisos
//se revisa si el usuario tiene acceso a una vista específica por medio del rol que tiene y el objeto al que quiere acceder
	$id_rol=$_SESSION['id_rol'];
	$datos=new obtenerDatosPermisos();
    $resultado=$datos->datosPermisosID($id_rol,3);

    foreach ($resultado as $fila){
		$permiso_in=$fila['permiso_insercion'];
		$permiso_act=$fila['permiso_actualizacion'];
		$permiso_eli=$fila['permiso_eliminacion'];
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
    <h2><i class="fas fa-chart-area"></i>&nbsp; Estadísticas</h2>
</div>
<br>

<!-- Menu de desplazamiento de vistas - forma descendente -->
<div class="container">
    <h5><i class="fas fa-home"></i>&nbsp; 
    <a href="<?php echo SERVERURL?>dashboard/"> Home </a>
    / 
    <a href="<?php echo SERVERURL?>empresas/"> Empresas </a></h5>
</div>
<br>
<div class="row">
    <div class="col-1"></div>
    <div class="col-4">
        <h5 class="text-center">Usuarios Registrados por Sexo</h5>
        <canvas id="grafica" style="width:3rem; height:2.5rem;"></canvas>
    </div>
    <div class="col-1"></div>
    <div class="col-5">
        <h5 class="text-center">Usuarios Registrados por Mes</h5>
        <canvas id="grafica2" width="500" height="350"></canvas>
    </div>
</div>
<br>
<br>
<div class="row">
        <div class="col-1"></div>
        <div class="col-4">
            <h5 class="text-center">Usuarios Registrados por Edad</h5>
            <canvas id="grafica3" width="500" height="350"></canvas></div>
            <div class="col-1"></div>
        <div class="col-4"><canvas id="grafica4" width="500" height="350"></canvas></div></div>
</div>