<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/obtenerDatosUsuarios.php"); 
include("./modelos/obtenerDatos.php"); 
?>

<h3 style="padding:5rem;"><i class="fas fa-users-cog"></i> &nbsp; USUARIOS </h3>

<div class="botones-proveedores">
	<div class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#ModalCrear"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR INSUMO</div>
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
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Rol</th>
                <th>Correo Electronico</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
			<?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosUsuarios();
                $resultado=$datos->datosUsuarios();
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['id_usuario']; ?></td>
                <td><?php echo $fila['usuario']; ?></td>
                <td><?php echo $fila['nombre_usuario']; ?></td>
                <td><?php echo $fila['estado_usuario']; ?></td>
                <td><?php echo $fila['rol']; ?></td>
                <td><?php echo $fila['correo_electronico']; ?></td>
                <td>
				<div data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_usuario'];?>">
					<i class="fas fa-sync-alt"></i>
				</div>
						<!-- Modal actualizar-->
                    <div class="modal fade" id="ModalAct<?php echo $fila['id_insumo'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar Insumo</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <div class="modal-body" id="modal-actualizar">
                            <form action="<?php echo SERVERURL; ?>ajax/insumoAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                                    <div class="form-group">
                                        <label class="color-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre_insumo_act" maxlength="27" value="<?php echo $fila['nom_insumo']?>" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="color-label">Categoria</label>
                                            <select class="form-control" name="categoria_insumo_act" required>
                                                <option value="1" <?php if ($fila['categoria'] == 'Comestibles'): ?> selected<?php endif; ?>>Comestibles</option>
                                                <option value="2" <?php if ($fila['categoria'] == 'Utensillos'): ?> selected<?php endif; ?>>Utensillos</option>
                                                <option value="3" <?php if ($fila['categoria'] == 'Varios'): ?> selected<?php endif; ?>>Varios</option>
                                            </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="color-label">Cantidad Maxima</label>
                                        <input type="number" class="form-control" name="cant_max_act" value="<?php echo $fila['cant_max']?>" maxlength="27" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="color-label">Cantidad Minima</label>
                                        <input type="number" class="form-control" name="cant_min_act" value="<?php echo $fila['cant_min']?>" maxlength="27" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="color-label">Unidad de medida</label>
                                                <select class="form-control" name="unidad_insumo_act" required>
													<option value="1" <?php if ($fila['unidad_medida'] == 'LB'): ?>selected<?php endif; ?>>LB</option>
													<option value="2" <?php if ($fila['unidad_medida'] == 'UN'): ?>selected<?php endif; ?>>UN</option>
													<option value="3" <?php if ($fila['unidad_medida'] == 'L'): ?>selected<?php endif; ?>>L</option>
													<option value="4" <?php if ($fila['unidad_medida'] == 'GAL'): ?>selected<?php endif; ?>>GAL</option>
                                                    <option value="5" <?php if ($fila['unidad_medida'] == 'BOLSAS'): ?>selected<?php endif; ?>>BOLSAS</option>
                                                </select>
                                    </div>
                                    <div class="col-12 col-md-4">
										<div class="form-group">
											<input type="hidden" pattern="" class="form-control" name="id_actualizacion" value="<?php echo $fila['id_insumo']; ?>">
										</div>
									</div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </form>
                            </div>
                        </div>
			    </td>
				<td>
					<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/insumoAjax.php" method="POST" data-form="delete" autocomplete="off">
					<input type="hidden" pattern="" class="form-control" name="id_insumo_del" value="<?php echo $fila['id_usuario'] ?>">	
					<button type="submit" class="btn btn-warning">
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
			<form action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
			<div class="form-group">
                <label class="color-label">Usuario</label>
				<input type="text" class="form-control" name="usuario_nuevo" id="nom_usuario" 
				style="text-transform:uppercase;" required="" >
			</div>
            <br>
            <div class="form-group">
                    <label class="color-label">Nombre</label>
					<input type="text" class="form-control" name="nombre_usuario_nuevo" id="nombre_usuario" 
					style="text-transform:uppercase;" required="" >
			</div>
            <br>
			<div class="form-group">
				<label class="color-label">Estado</label>
                    <select class="form-control" name="estado_nuevo" disabled>
						<option value="1" selected="">Activo</option>
						<option value="2">Inactivo</option>
						<option value="3">Bloqueado</option>
					</select>
			</div>
            <br>
			<div class="form-group contrasena">
				<label class="color-label">Contraseña</label>
				<input type="password" class="form-control" name="contrasena_nuevo" id="contrasena" pattern="[a-zA-Z0-9!#%&/()=?¡*+_$@.-]{8,100}" maxlength="10" required="" >
<!-- 				<span onclick="mosContrasena()"><i class="fas fa-eye-slash icon-clave" style="color:black;"></i></span> -->
			</div>
            <br>
			<div class="form-group conf-contrasena">
				<label class="color-label">Confirmar Contraseña</label>
				<input type="password" class="form-control" name="conf_contrasena_nuevo" id="conf_contra" pattern="[a-zA-Z0-9!#%&/()=?¡*+_$@.-]{8,100}" maxlength="10" required="" >
				<!-- <span onclick="mosConfContrasena()"><i class="fas fa-eye-slash icon-confclave" style="color:black;"></i></span> -->
			</div>
            <br>
			<div class="form-group">
				<label class="color-label">Correo</label>
				<input type="email" class="form-control" name="correo_electronico_nuevo" id="correo_electronico" required="">
			</div>
			<br>
            <div class="form-group">
				<label class="color-label">Roles</label>
				<select class="form-control" name="rol_nuevo" required>
					<option value="" selected="" disabled="">Seleccione una opción</option>
						<?php
							$datos=new obtenerDatosTablas();
                            $resultado=$datos->datosTablas('roles');
                            foreach ($resultado as $fila){
									echo '<option value="'.$fila['id_rol'].'">'.$fila['rol'].'</option>';
								}
						?>
				</select>
			</div>
            <br>
            <input type="file" class="form-control" name="imagen_nuevo" id="imagen" maxlength="256" placeholder="Imagen">
			<button type="submit" class="btn btn-primary">Guardar</button>
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			</form>
      </div>
    </div>
  </div>
</div>



