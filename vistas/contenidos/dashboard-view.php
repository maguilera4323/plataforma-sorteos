<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include ("./DatosTablas/obtenerDatos.php");

//llamado al archivo de la bitacora
include ("./modelos/bitacoraActividades.php");
$registroEntrada = new bitacora();

//archivo para obtener los permisos del rol conectado al sistema en la vista a la que ha accedido
include("./DatosTablas/obtenerDatosPermisos.php"); 

//verificación de permisos
//se revisa si el usuario tiene acceso a una vista específica por medio del rol que tiene y el objeto al que quiere acceder
	$id_rol=$_SESSION['id_rol'];
	$datos=new obtenerDatosPermisos();
    $resultado=$datos->datosPermisosID($id_rol,2);

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
	}else{
        $datos_bitacora = [
            "id_modulo" => 2,
            "fecha" => date('Y-m-d H:i:s'),
            "id_usuario" => $_SESSION['id_login'],
            "accion" => "Cambio de vista",
            "descripcion" => "El usuario ".$_SESSION['usuario_login']." entró al dashboard"
        ];
        $resultado=$registroEntrada->guardar_bitacora($datos_bitacora);
    }
?>

<div class="container-sm dashboard-contenedor">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <a href="<?php echo SERVERURL?>usuarios/">
                <div class="card-body">
                <?php
                //se hace una instancia a la clase
                    $datos=new obtenerDatosTablas();
                    $resultado=$datos->contarRegistros('usuarios');
                    foreach ($resultado as $fila){
                        $cantidad_usuarios=$fila['contar_registros'];
                    }
                ?>
                    <h3 class="card-title text-center"> <?php echo $cantidad_usuarios;?> </h3>
                    <h5 class="card-title text-center">Usuarios</h5>
                    <h5 class="card-title text-center">Registrados</h5>
                </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <a href="<?php echo SERVERURL?>boletos/">
                <div class="card-body">
                <?php
                //se hace una instancia a la clase
                    $datos=new obtenerDatosTablas();
                    $resultado=$datos->contarRegistros('boletos');
                    foreach ($resultado as $fila){
                        $cantidad_boletos=$fila['contar_registros'];
                    }
                ?>
                    <h3 class="card-title text-center"> <?php echo $cantidad_boletos;?> </h3>
                    <h5 class="card-title text-center">Boletos</h5>
                    <h5 class="card-title text-center">Vendidos</h5>
                </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <a href="<?php echo SERVERURL?>sorteos/">
                <div class="card-body">
                <?php
                //se hace una instancia a la clase
                    $datos=new obtenerDatosTablas();
                    $resultado=$datos->contarRegistros('sorteos');
                    foreach ($resultado as $fila){
                        $cantidad_sorteos=$fila['contar_registros'];
                    }
                ?>
                    <h3 class="card-title text-center"> <?php echo $cantidad_sorteos;?> </h3>
                    <h5 class="card-title text-center">Sorteos</h5>
                    <h5 class="card-title text-center">Registrados</h5>
                </div>
            </a>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
            <a href="<?php echo SERVERURL?>premios/">
                <div class="card-body">
                <?php
                //se hace una instancia a la clase
                    $datos=new obtenerDatosTablas();
                    $resultado=$datos->contarRegistros('premios');
                    foreach ($resultado as $fila){
                        $cantidad_premios=$fila['contar_registros'];
                    }
                ?>
                    <h3 class="card-title text-center"> <?php echo $cantidad_premios;?> </h3>
                    <h5 class="card-title text-center">Premios</h5>
                    <h5 class="card-title text-center">Registrados</h5>
                </div>
            </a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container-fluid text-center">
        <img src="../vistas/assets/img/logo-compania.png" width="536" height="361" alt="" style="margin:0 auto;">
    </div>

</div>








