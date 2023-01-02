<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/obtenerDatos.php"); 
?>

<h3 style="padding:5rem;"><i class="fas fa-warehouse"></i> &nbsp; INVENTARIO </h3>

<div class="botones-proveedores">
	<button type="submit" class="btn btn-danger mx-auto btn-lg"><i class="fas fa-file-pdf"></i> &nbsp;Descargar PDF</button>
    <button type="submit" class="btn btn-success mx-auto btn-lg"><i class="fas fa-file-excel"></i> &nbsp;Descargar Excel</button>
</div>
<br>
<div class="table-responsive">
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>RTN</th>
                <th>Teléfono</th>
                <th>Correo electronico</th>
                <th>Dirección</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
			<?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosTablas();
                $resultado=$datos->datosTablas('proveedores');
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['id_proveedor']; ?></td>
                <td><?php echo $fila['nom_proveedor']; ?></td>
                <td><?php echo $fila['rtn_proveedor']; ?></td>
                <td><?php echo $fila['tel_proveedor']; ?></td>
                <td><?php echo $fila['correo_proveedor']; ?></td>
                <td><?php echo $fila['dir_proveedor']; ?></td>
                <td><i class="fas fa-trash-alt" style="color:red; justify-items:center;"></i></td>
                <td><i class="fas fa-pen"></i></td>
                </tr>


            <?php
                    }
            ?>
        </tbody>

    </table>

</div>

