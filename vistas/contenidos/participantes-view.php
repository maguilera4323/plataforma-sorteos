<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include ("./DatosTablas/obtenerDatos.php");
include("./DatosTablas/obtenerDatosUsuarios.php"); 

//llamado al archivo de la bitacora
include ("./modelos/bitacoraActividades.php");
$registroEntrada = new bitacora();

//archivo para obtener los permisos del rol conectado al sistema en la vista a la que ha accedido
include("./DatosTablas/obtenerDatosPermisos.php"); 

//verificación de permisos
//se revisa si el usuario tiene acceso a una vista específica por medio del rol que tiene y el objeto al que quiere acceder
	$id_rol=$_SESSION['id_rol'];
	$datos=new obtenerDatosPermisos();
    $resultado=$datos->datosPermisosID($id_rol,9);

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
            "id_modulo" => 9,
            "fecha" => date('Y-m-d H:i:s'),
            "id_usuario" => $_SESSION['id_login'],
            "accion" => "Cambio de vista",
            "descripcion" => "El usuario ".$_SESSION['usuario_login']." entró a la vista de Participantes"
        ];
        $resultado=$registroEntrada->guardar_bitacora($datos_bitacora);
    }

?>
<br>
<div class="container">
    <h2><i class="fas fa-industry"></i>&nbsp; Participantes</h2>
</div>
<br>

<!-- Menu de desplazamiento de vistas - forma descendente -->
<div class="container">
    <h5><i class="fas fa-home"></i>&nbsp; 
    <a href="<?php echo SERVERURL?>dashboard/"> Home </a>
    / 
    <a href="<?php echo SERVERURL?>configuracion/"> Configuración </a>
    / 
    <a href="<?php echo SERVERURL?>usuarios/"> Usuarios </a>
    / 
    <a href="<?php echo SERVERURL?>participantes/"> Participantes </a></h5>
</div>
<div class="container contenedor-tabla">
    <div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-6">
            <div class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#ModalCrear"><i class="fas fa-file-pdf"></i> &nbsp; Exportar a PDF</div>
            <div class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#ModalCrear"><i class="fas fa-file-excel"></i> &nbsp; Exportar a Excel</div>
        </div>
        <div class="col-2"></div>
    </div>
    </div>

<div class="table-responsive">
    <br>
        <input type="text" id="searchBox" class="form-control" onkeyup="filterTable()" placeholder="Filtrar participantes">
        <p id="message"></p>
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Usuario</th>                               
                <th>Nombre</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>Sexo</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th>Correo</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody class="body">
        <?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosUsuarios();
                $resultado=$datos->datosParticipantes();
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['usuario']; ?></td>
                <td><?php echo $fila['nombres'] . " " . $fila['apellidos']; ?></td>
                <td><?php echo $fila['dni']; ?></td>
                <td><?php echo $fila['telefono']; ?></td>
                <td><?php echo $fila['sexo']; ?></td>
                <td><?php echo $fila['direccion']; ?></td>
                <td><?php echo $fila['estado']; ?></td>
                <td><?php echo $fila['correo_electronico']; ?></td>
                <td>
					<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/empleadosAjax.php" method="POST" data-form="delete" autocomplete="off">
					<input type="hidden" pattern="" class="form-control" name="id_empleado_del" value="<?php echo $fila['id_usuario'] ?>">	
					<button type="submit" class="btn btn-danger">
						<i class="far fa-trash-alt"></i>
					</button>
					</form>
				</td>
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

