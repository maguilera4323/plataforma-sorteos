<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/obtenerDatos.php"); 
?>
<br>
<br>
<div class="container contenedor-tabla">
    <div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#ModalCrear"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar</div>
            <div class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#ModalCrear"><i class="fas fa-file-pdf"></i> &nbsp; Exportar a PDF</div>
            <div class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#ModalCrear"><i class="fas fa-file-excel"></i> &nbsp; Exportar a Excel</div>
        </div>
        <div class="col-2"></div>
    </div>
    </div>

<div class="table-responsive">
    <br>
        <input type="text" id="searchBox" placeholder="Filtrar empleados">
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>                               
                <th>Nombre</th>  
                <th>Estado</th>
                <th>Rol</th>
                <th>Correo</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosTablas();
                $resultado=$datos->datosTablas('empleados');
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['id_empleado']; ?></td>
                <td><?php echo $fila['usuario']; ?></td>
                <td><?php echo $fila['nombre_empleados']; ?></td>
                <td><?php echo $fila['estado_empleado']; ?></td>
                <td><?php echo $fila['id_rol']; ?></td>
                <td><?php echo $fila['correo_electronico']; ?></td>
                <td>
				<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_empleado'];?>">
					<i class="fas fa-sync-alt"></i>
                </button>
						<!-- Modal actualizar-->
                    <div class="modal fade" id="ModalAct<?php echo $fila['id_empleado'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <?php
                            //validación para impedir la modificación del usuario que está conectado en el sistema
							if(($fila['id_empleado']==$_SESSION['id_login']) || ($fila['id_usuario']==$_SESSION['id_login'])){
								echo '<div class="alert alert-warning text-center" style="font-size: 28px;">No se puede actualizar el usuario conectado actualmente
								<button type="button" class="close" data-dismiss="alert" onclick="window.location.reload()">X</button>
								</div>
                                <div class="modal-body" id="modal-actualizar" style="display:none">';
							}
						?>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar Empleado</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <div class="modal-body" id="modal-actualizar">
                            <form action="<?php echo SERVERURL; ?>ajax/empleadosAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                            <div class="row">
                                            <div class="col-10 col-md-6">
                                                <div class="form-group">
                                                    <label class="label-actualizar">Usuario</label>
                                                    <input type="text" class="form-control" name="empleado_act" id="nom_usuario" 
                                                    style="text-transform:uppercase;" value="<?php echo $fila['usuario']?>" required="" >
                                                </div>
                                            </div>
                                            <div class="col-10 col-md-6">
                                                <div class="form-group">
                                                    <label class="label-actualizar">Nombre</label>
                                                    <input type="text" class="form-control" name="nombre_empleado_act" id="nombre_usuario" 
                                                    style="text-transform:uppercase;" value="<?php echo $fila['nombre_empleados']?>" required="" >
                                                </div>
                                            </div>
                                            <div class="col-10 col-md-6">
                                                <br>
                                                <label class="label-actualizar">Estado</label>
                                                <select class="form-control" name="estado_act">
                                                    <option value="1" <?php if ($fila['estado_empleado'] == 'Activo'): ?> selected<?php endif; ?>>Activo</option>
                                                    <option value="2" <?php if ($fila['estado_empleado'] == 'Inactivo'): ?> selected<?php endif; ?>>Inactivo</option>
                                                    <option value="3" <?php if ($fila['estado_empleado'] == 'Bloqueado'): ?> selected<?php endif; ?>>Bloqueado</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-10 col-md-6">
                                                <br>
                                                <div class="form-group">
                                                    <label class="label-actualizar">Roles</label>
                                                        <select class="form-control" name="rol_act" required>
                                                                <?php
                                                                    $datos=new obtenerDatosTablas();
                                                                    $resultado=$datos->datosTablas('roles');
                                                                    foreach ($resultado as $valores){
                                                                        //validación para obtener el valor guardado en la base de datos
															            //y que este se muestre seleccionado en la base de datos
                                                                        if($fila['id_rol']==$valores['id_rol']){
                                                                            echo '<option value="'.$valores['id_rol'].'" selected>'.$valores['rol'].'</option>';
                                                                        //validación para obtener los demás valores de la base de datos para el select
                                                                        }elseif($fila['id_rol']!=$valores['id_rol']){
                                                                            echo '<option value="'.$valores['id_rol'].'">'.$valores['rol'].'</option>';
                                                                        }
                                                                    }
                                                                ?>
                                                        </select>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Correo</label>
                                        <input type="email" class="form-control" name="correo_electronico_act" id="correo_electronico" value="<?php echo $fila['correo_electronico']?>"required="">
                                    </div>
                                    <br>
                                    <br>
                                    <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
                                    <input type="hidden" value="<?php echo $fila['id_empleado']; ?>" class="form-control" name="empleado_id">
                                    <button type="submit" class="btn btn-danger">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </form>
                            </div>
                        </div>
			    </td>
                <td>
					<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/empleadosAjax.php" method="POST" data-form="delete" autocomplete="off">
					<input type="hidden" pattern="" class="form-control" name="id_empleado_del" value="<?php echo $fila['id_empleado'] ?>">	
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

<!-- <div class="container">
    <div class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#ModalCrear"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR EMPLEADO</div>
    <div onload="editar()">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <table id="tablaEmpleados" class="table-striped table-bordered text-center">
                    <thead>
                    <tr>
                        <th>ID</th>                         
                        <th>Usuario</th>
                        <th>Nombre</th>  
                        <th>Estado</th>
                        <th>Rol</th>
                        <th>Correo</th>
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                
            </div>
        </div> 
        </div>
</div>
<br> -->



   
<!-- Modal Crear -->
<div class="modal fade" id="ModalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Empleado</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body" id="modal-actualizar">
			<form action="<?php echo SERVERURL; ?>ajax/empleadosAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
			<div class="row">
					<div class="col-10 col-md-6">
						<div class="form-group">
                            <label class="color-label">Usuario</label>
				            <input type="text" class="form-control" name="empleado_nuevo" id="nom_usuario" 
				            style="text-transform:uppercase;" required="" >
						</div>
					</div>
					<div class="col-10 col-md-6">
						<div class="form-group">
                            <label class="color-label">Nombre</label>
					        <input type="text" class="form-control" name="nom_empleado_nuevo" id="nombre_usuario" 
					        style="text-transform:uppercase;" required="" >
						</div>
					</div>
                    <div class="col-10 col-md-6">
                        <br>
                        <label class="color-label">Estado</label>
                        <select class="form-control" name="estado_nuevo" disabled>
                            <option value="1" selected="">Activo</option>
                            <option value="2">Inactivo</option>
                            <option value="3">Bloqueado</option>
                        </select>
					</div>
					
					<div class="col-10 col-md-6">
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
					</div>

                    <div class="col-10 col-md-6 contrasena">
                        <br>
                        <label class="color-label">Contraseña</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="contrasena_nuevo" id="contrasena" pattern="[a-zA-Z0-9!#%&/()=?¡*+_$@.-]{8,100}" maxlength="10" required="" >
                            <span onclick="mosContrasena()" class="input-group-text"><i class="fas fa-eye-slash icon-clave" style="color:black;"></i></span>
                        </div>
					</div>

                    <div class="col-10 col-md-6 conf-contrasena">
                        <br>
                        <label class="color-label">Confirmar Contraseña</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="conf_contrasena_nuevo" id="conf_contra" pattern="[a-zA-Z0-9!#%&/()=?¡*+_$@.-]{5,10}" maxlength="10" required="" >
                            <span onclick="mosConfContrasena()" class="input-group-text"><i class="fas fa-eye-slash icon-confclave" style="color:black;"></i></span>
                        </div>
					</div>
            </div>
        
			<div class="form-group">
				<label class="color-label">Correo</label>
				<input type="email" class="form-control" name="correo_electronico_nuevo" id="correo_electronico" required="">
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


