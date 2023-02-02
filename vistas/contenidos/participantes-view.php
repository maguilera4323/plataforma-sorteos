<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include ("./DatosTablas/obtenerDatos.php");
include("./DatosTablas/obtenerDatosUsuarios.php"); 

    $contar=new obtenerDatosUsuarios();
    $resultadoContar=$contar->contarUsuarios();
        foreach ($resultadoContar as $fila){
            $idPersonaActual=$fila['id_usuario']+1;
        }
    
    if (!isset($idPersonaActual)){
        $idPersonaActual=1;
    }

?>
<br>
<br>
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
                <th>ID</th>
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
                <td><?php echo $fila['id_usuario']; ?></td>
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

