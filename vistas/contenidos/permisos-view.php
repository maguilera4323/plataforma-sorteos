<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./DatosTablas/obtenerDatos.php"); 
include("./DatosTablas/obtenerDatosPermisos.php"); 
?>
<br>
<div class="container">
    <h2><i class="fas fa-tasks"></i>&nbsp; Permisos</h2>
</div>
<br>
<div class="container contenedor-tabla">
    <div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-7">
            <div class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#ModalCrear"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar</div>
            <div class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#ModalCrear"><i class="fas fa-file-pdf"></i> &nbsp; Exportar a PDF</div>
            <div class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#ModalCrear"><i class="fas fa-file-excel"></i> &nbsp; Exportar a Excel</div>
        </div>
        <div class="col-2"></div>
    </div>
    </div>

<div class="table-responsive">
    <br>
        <input type="text" id="searchBox" class="form-control" onkeyup="filterTable()" placeholder="Filtrar permisos">
        <p id="message"></p>
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Rol</th>
                <th>Modulo</th>                               
                <th>Inserción</th>
                <th>Actualización</th>
                <th>Eliminación</th> 
                <th>Consulta</th>   
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody class="body">
        <?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosPermisos();
                $resultado=$datos->datosPermisos();
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['rol']; ?></td>
                <td><?php echo $fila['modulo']; ?></td>
                <?php
				if($fila['permiso_insercion']==1){
                ?>
                <td><i class="fas fa-check"></i></td>
                <?php
                    }else{
                ?>
                <td><i class="fas fa-ban" style="color: red;"></i></td>
                <?php
                    }
                ?>
                <?php
				if($fila['permiso_actualizacion']==1){
			?>
			<td><i class="fas fa-check"></i></td>
			<?php
				}else{
			?>
			<td><i class="fas fa-ban" style="color: red;"></i></td>
			<?php
				}
			?>
			<?php
				if($fila['permiso_eliminacion']==1){
			?>
			<td><i class="fas fa-check"></i></td>
			<?php
				}else{
			?>
			<td><i class="fas fa-ban" style="color: red;"></i></td>
			<?php
				}
			?>
			<?php
				if($fila['permiso_consulta']==1){
			?>
			<td><i class="fas fa-check"></i></td>
			<?php
				}else{
			?>
			<td><i class="fas fa-ban" style="color: red;"></i></td>
			<?php
				}
			?>
                <td>
				<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_rol'];?><?php echo $fila['id_modulo'];?>">
					<i class="fas fa-sync-alt"></i>
                </button>
						<!-- Modal actualizar-->
                    <div class="modal fade" id="ModalAct<?php echo $fila['id_rol'];?><?php echo $fila['id_modulo'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar Permiso</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <div class="modal-body" id="modal-actualizar">
                            <form action="<?php echo SERVERURL; ?>ajax/permisoAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                                <div class="form-group">
                                    <label class="label-actualizar">Rol</label>
                                    <input type="text" class="form-control" value="<?php echo $fila['rol']?>" readonly>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="label-actualizar">Módulo</label>
                                    <input type="text" class="form-control" value="<?php echo $fila['modulo']?>" readonly>
                                </div>
                                <br>
                                <br>
                                <label class="label-actualizar">Permisos</label>
                                <div class="form-group label-actualizar">
                                    <div class="form-check form-check-inline">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="insertar_permiso_act"
                                            <?php if ($fila['permiso_insercion'] == 1): ?>checked<?php endif; ?>>
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Insertar</label>
                                    </div>
                                    <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="actualizar_permiso_act"
                                            <?php if ($fila['permiso_actualizacion'] == 1): ?>checked<?php endif; ?>>
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Actualizar</label>
                                    </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="eliminar_permiso_act"
                                            <?php if ($fila['permiso_eliminacion'] == 1): ?>checked<?php endif; ?>>
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Eliminar</label>
                                    </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="consultar_permiso_act"
                                            <?php if ($fila['permiso_consulta'] == 1): ?>checked<?php endif; ?>>
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Consultar</label>
                                    </div>
                                </div>
                                <br>
                                <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
                                <input type="hidden" value="<?php echo $fila['id_modulo']; ?>" name="modulo_id">
                                <input type="hidden" value="<?php echo $fila['id_rol']?>" name="rol_id">
                                <button type="submit" class="btn btn-danger">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </form>
                            </div>
                        </div>
			    </td>
                <td>
					<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/permisoAjax.php" method="POST" data-form="delete" autocomplete="off">
					<input type="hidden" pattern="" class="form-control" name="id_mod_del" value="<?php echo $fila['id_modulo'] ?>">
                    <input type="hidden" pattern="" class="form-control" name="id_rol_del" value="<?php echo $fila['id_rol'] ?>">	
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

   
<!-- Modal Crear -->
<div class="modal fade" id="ModalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Módulo</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body" id="modal-actualizar">
		    <form action="<?php echo SERVERURL; ?>ajax/permisoAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
            <div class="form-group">
                <label class="color-label">Rol</label>
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
                <div class="form-group">
                <label class="color-label">Módulo</label>
                    <select class="form-control" name="modulo_nuevo" required>
                        <option value="" selected="" disabled="">Seleccione una opción</option>
                            <?php
                                $datos=new obtenerDatosTablas();
                                $resultado=$datos->datosTablas('modulos');
                                foreach ($resultado as $fila){
                                    echo '<option value="'.$fila['id_modulo'].'">'.$fila['modulo'].'</option>';
                                }
                            ?>
                    </select>
				</div>
                <br>
                <label>Permisos</label>
				<div class="form-group">
                    <div class="form-check form-check-inline">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="insertar_permiso" value="1">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Insertar</label>
                    </div>
                    <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="actualizar_permiso" value="1">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Actualizar</label>
                    </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="eliminar_permiso" value="1">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Eliminar</label>
                    </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="consultar_permiso" value="1">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Consultar</label>
                    </div>
                    
                </div>
				
			</div>
            <br>
            <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
            <button type="submit" class="btn btn-danger">Guardar</button>
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			</form>
      </div>
    </div>
  </div>
</div>


