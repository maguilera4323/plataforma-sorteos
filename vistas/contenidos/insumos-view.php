<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/obtenerDatos.php"); 
?>

<h3 style="padding:5rem;"><i class="fas fa-dolly-flatbed"></i> &nbsp; INSUMOS </h3>

<div class="botones-proveedores">
	<div class="btn btn-dark btn-lg" data-toggle="modal" data-target="#ModalCrear"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR INSUMO</div>
	<button type="submit" class="btn btn-danger mx-auto btn-lg"><i class="fas fa-file-pdf"></i> &nbsp;Descargar PDF</button>
    <button type="submit" class="btn btn-success mx-auto btn-lg"><i class="fas fa-file-excel"></i> &nbsp;Descargar Excel</button>
</div>
<br>
<input type="text" class="filtro" placeholder="Filtrar insumos">
<div class="table-responsive">
    <table id="datos-usuario" class="table table-bordered table-striped text-center datos-usuario">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Cantidad Maxima</th>
                <th>Cantidad Minima</th>
                <th>Unidad de medida</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
			<?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosTablas();
                $resultado=$datos->datosTablas('insumos');
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['id_insumo']; ?></td>
                <td><?php echo $fila['nom_insumo']; ?></td>
                <td><?php echo $fila['id_categoria']; ?></td>
                <td><?php echo $fila['cant_max']; ?></td>
                <td><?php echo $fila['cant_min']; ?></td>
                <td><?php echo $fila['unidad_medida']; ?></td>
                <td><i class="fas fa-trash-alt" style="color:red; justify-items:center;"></i></td>
                <td><i class="fas fa-pen"></i></td>
                </tr>


            <?php
                    }
            ?>
        </tbody>

    </table>

</div>


<div class="modal fade" id="ModalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Insumo</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body" id="modal-actualizar">
			<form action="<?php echo SERVERURL; ?>ajax/insumoAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
			<div class="form-group">
				<label class="color-label">Nombre</label>
				<input type="text" class="form-control" name="nombre_insumo_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
            <br>
			<div class="form-group">
				<label class="color-label">Categoria</label>
				<input type="text" class="form-control" name="rtn_proveedor_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
            <br>
			<div class="form-group">
				<label class="color-label">Correo</label>
				<input type="text" class="form-control" name="correo_proveedor_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
            <br>
			<div class="form-group">
				<label class="color-label">Telefono</label>
				<input type="text" class="form-control" name="telefono_proveedor_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
            <br>
			<div class="form-group">
				<label class="color-label">Dirección</label>
				<input type="text" class="form-control" name="direccion_proveedor_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
			<br>
			<button type="submit" class="btn btn-primary">Guardar</button>
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			</form>
      </div>
    </div>
  </div>
</div>



