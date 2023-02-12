<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./DatosTablas/obtenerDatos.php"); 
include("./DatosTablas/obtenerDatosPermisos.php"); 


//verificación de permisos
//se revisa si el usuario tiene acceso a una vista específica por medio del rol que tiene y el objeto al que quiere acceder
	$id_rol=$_SESSION['id_rol'];
	$datos=new obtenerDatosPermisos();
    $resultado=$datos->datosPermisosID($id_rol,11);

    foreach ($resultado as $fila){
		$permiso_in=$fila['permiso_insercion'];
		$permiso_act=$fila['permiso_actualizacion'];
		$permiso_eli=$fila['permiso_eliminacion'];
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
    <h2><i class="fas fa-tasks"></i>&nbsp; Permisos</h2>
</div>
<br>

<!-- Menu de desplazamiento de vistas - forma descendente -->
<div class="container">
    <h5><i class="fas fa-home"></i>&nbsp; 
    <a href="<?php echo SERVERURL?>dashboard/"> Home </a>
    / 
    <a href="<?php echo SERVERURL?>configuracion/"> Configuración </a>
    / 
    <a href="<?php echo SERVERURL?>permisos/"> Permisos </a></h5>
</div>
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
                        <?php
                            if(!isset($permiso_act)){
                                echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para editar la información del permiso</div>';
                                echo "<script> window.location.href='".SERVERURL."home/'; </script>";	
                            //valida si el permiso tiene valor de cero, lo que significa que no puede acceder a la vista	
                            }else if($permiso_act==0){
                                echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para editar la información del permiso
                                <button type="button" class="close" data-bs-dismiss="alert" onclick="window.location.reload()">X</button>
                                </div>
                                <div class="modal-dialog" style="display:none">;';
                            }else{
                        ?>
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
                            <?php
                                }
                            ?>
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
    <?php
        if(!isset($permiso_in)){
            echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para añadir un permiso</div>';
            echo "<script> window.location.href='".SERVERURL."home/'; </script>";	
        //valida si el permiso tiene valor de cero, lo que significa que no puede acceder a la vista	
        }else if($permiso_in==0){
            echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para añadir un permiso
            <button type="button" class="close" data-bs-dismiss="alert" onclick="window.location.reload()">X</button>
            </div>
            <div class="modal-dialog" style="display:none">;';
        }else{
    ?>
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
    <?php
		}
	?>
</div>


