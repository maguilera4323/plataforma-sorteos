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
    $resultado=$datos->datosPermisosID($id_rol,5);

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
    <h2><i class="fas fa-vote-yea"></i>&nbsp; Bitácora del sistema</h2>
</div>
<br>

<!-- Menu de desplazamiento de vistas - forma descendente -->
<div class="container">
    <h5><i class="fas fa-home"></i>&nbsp; 
    <a href="<?php echo SERVERURL?>dashboard/"> Home </a>
    / 
    <a href="<?php echo SERVERURL?>administracion/"> Administración </a>
    / 
    <a href="<?php echo SERVERURL?>bitacora/"> Bitácora </a></h5>
</div>

<div class="container contenedor-tabla">
    <div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-6">
            <a href="<?php echo SERVERURL?>sorteos/">
            <div class="btn btn-outline-primary btn-lg"><i class="fas fa-reply"></i> &nbsp; Regresar a pestaña de Sorteos</div>
            </a>
        </div>
        <div class="col-2"></div>
    </div>
    </div>


<div class="table-responsive">
    <br>
        <input type="text" id="searchBox" class="form-control" onkeyup="filterTable()" placeholder="Filtrar boletos vendidos">
        <p id="message"></p>
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Módulo</th>
                <th>Fecha</th>                                 
                <th>Usuario</th>
                <th>Acción</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody class="body">
        <?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosTablas();
                $resultado=$datos->datosBitacora();
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['modulo']; ?></td>
                <td><?php echo $fila['fecha']; ?></td>
                <td><?php echo $fila['usuario']; ?></td>
                <td><?php echo $fila['accion']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>
            </tr>


            <?php
                    }
            ?>
        </tbody>

    </table>
</div>
<div id="paginador" class=""></div>	
</div>
<br>
<br>
