<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/obtenerDatosInventario.php"); 
?>

<h3 style="padding:5rem;"><i class="fas fa-warehouse"></i> &nbsp; INVENTARIO </h3>

<div class="botones-proveedores">
	<button type="submit" class="btn btn-danger mx-auto btn-lg"><i class="fas fa-file-pdf"></i> &nbsp;Descargar PDF</button>
    <button type="submit" class="btn btn-success mx-auto btn-lg"><i class="fas fa-file-excel"></i> &nbsp;Descargar Excel</button>
    <button type="submit" class="btn btn-dark mx-auto btn-lg"><i class="fas fa-file-excel"></i> &nbsp;Ver Movimientos de Inventario</button>
</div>
<br>
<div class="table-responsive">
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
			<?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosInventario();
                $resultado=$datos->datosInventario();
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['nom_insumo']; ?></td>
                <td><?php echo $fila['cant_existencia']; ?></td>
                <td><i class="fas fa-trash-alt" style="color:red; justify-items:center;"></i></td>
                <td><i class="fas fa-pen"></i></td>
                </tr>


            <?php
                    }
            ?>
        </tbody>

    </table>

</div>

