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
    $resultado=$datos->datosPermisosID($id_rol,7);

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

<div class="container tarjeta-contenedor">
  <div class="row justify-content-md-center">
    <div class="col col-lg-4">
        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header"><img class="card-img-top" src="../vistas/assets/img/img-empleado.png" alt="Card image cap"></div>
            <div class="card-body">
            <h5 class="card-title">EMPLEADOS</h5>
            <p class="card-text">Gestión y revisión de las cuentas de usuario de los encargados de la plataforma</p>
            <a href="<?php echo SERVERURL?>empleados/" class="btn btn-primary">INGRESAR</a>
            </div>
        </div>
    </div>
    <div class="col col-lg-4">
        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header"><img class="card-img-top" src="../vistas/assets/img/img-empresa.png" alt="Card image cap"></div>
            <div class="card-body">
            <h5 class="card-title">PARTICIPANTES</h5>
            <p class="card-text">Gestión y revisión de las personas registradas en la plataforma para participar en los sorteos</p>
            <a href="<?php echo SERVERURL?>participantes/" class="btn btn-primary">INGRESAR</a>
            </div>
        </div>
    </div>
  </div>


   

