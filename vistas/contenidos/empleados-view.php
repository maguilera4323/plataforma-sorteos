<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include ("./DatosTablas/obtenerDatos.php");
include("./DatosTablas/obtenerDatosUsuarios.php"); 

//archivo para obtener los permisos del rol conectado al sistema en la vista a la que ha accedido
include("./DatosTablas/obtenerDatosPermisos.php"); 

//verificación de permisos
//se revisa si el usuario tiene acceso a una vista específica por medio del rol que tiene y el objeto al que quiere acceder
	$id_rol=$_SESSION['id_rol'];
	$datos=new obtenerDatosPermisos();
    $resultado=$datos->datosPermisosID($id_rol,8);

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


    //fragmento de codigo para calcular el id_persona, dato que se agregará a la tabla de Usuarios
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
<div class="container">
    <h2><i class="fas fa-industry"></i>&nbsp; Empleados</h2>
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
    <a href="<?php echo SERVERURL?>empleados/"> Empleados </a></h5>
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
            <input type="text" id="searchBox" class="form-control" onkeyup="filterTable()" placeholder="Filtrar empleados">
            <p id="message"></p>
        <table id="datos-usuario" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>Usuario</th>                               
                    <th>Nombre</th>  
                    <th>Estado</th>
                    <th>Rol</th>
                    <th>Correo</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody class="body">
            <?php
                //se hace una instancia a la clase
                    $datos=new obtenerDatosUsuarios();
                    $resultado=$datos->datosEmpleados();
                    foreach ($resultado as $fila){
                ?>
                <tr>
                    <td><?php echo $fila['usuario']; ?></td>
                    <td><?php echo $fila['nombres'] . " " . $fila['apellidos']; ?></td>
                    <td><?php echo $fila['estado']; ?></td>
                    <td><?php echo $fila['rol']; ?></td>
                    <td><?php echo $fila['correo_electronico']; ?></td>
                    <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_usuario'];?>">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                            <!-- Modal actualizar-->
                        <div class="modal fade" id="ModalAct<?php echo $fila['id_usuario'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <?php
                                //validación para impedir la modificación del usuario que está conectado en el sistema
                                if(($fila['id_usuario']==$_SESSION['id_login'])){
                                    echo '<div class="alert alert-warning text-center" style="font-size: 28px;">No se puede actualizar el usuario conectado actualmente
                                    <button type="button" class="close" data-dismiss="alert" onclick="window.location.reload()">X</button>
                                    </div>
                                    <div class="modal-body" id="modal-actualizar" style="display:none">';
                                }
                            ?>
                            <?php
                                if(!isset($permiso_act)){
                                    echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para actualizar la información del empleado</div>';
                                    echo "<script> window.location.href='".SERVERURL."home/'; </script>";	
                                //valida si el permiso tiene valor de cero, lo que significa que no puede acceder a la vista	
                                }else if($permiso_in==0){
                                    echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para actualizar la información del empleado
                                    <button type="button" class="close" data-bs-dismiss="alert" onclick="window.location.reload()">X</button>
                                    </div>
                                    <div class="modal-dialog" style="display:none">;';
                                }else{
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
                                <form action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                                <div class="row">
                                    <div class="col-10 col-md-6">
                                        <div class="form-group">
                                            <label class="label-actualizar">Nombres</label>
                                            <input type="text" class="form-control" name="nombre_act" 
                                            style="text-transform:uppercase;" value="<?php echo $fila['nombres']; ?>" required="" >
                                        </div>
                                    </div>
                                    <div class="col-10 col-md-6">
                                        <div class="form-group">
                                            <label class="label-actualizar">Apellidos</label>
                                            <input type="text" class="form-control" name="apellido_act" 
                                            style="text-transform:uppercase;" value="<?php echo $fila['apellidos']; ?>" required="" >
                                        </div>
                                    </div>
                                    <div class="col-10 col-md-6">
                                    <br>
                                        <div class="form-group">
                                            <label class="label-actualizar">Usuario</label>
                                            <input type="text" class="form-control" name="user_empleado_act" 
                                            style="text-transform:lowercase;" value="<?php echo $fila['usuario']; ?>" required="" >
                                        </div>
                                    </div>
                                    <div class="col-10 col-md-6">
                                    <br>
                                        <div class="form-group">
                                            <label class="label-actualizar">DNI</label>
                                            <input type="text" class="form-control" name="dni_act" value="<?php echo $fila['dni']; ?>" required="" >
                                        </div>
                                    </div>
                                    <div class="col-10 col-md-6">
                                        <br>
                                        <label class="label-actualizar">Estado</label>
                                        <select class="form-control" name="estado_act">
                                            <option value="1" <?php if ($fila['estado'] == 'Activo'): ?> selected<?php endif; ?>>Activo</option>
                                            <option value="2" <?php if ($fila['estado'] == 'Inactivo'): ?> selected<?php endif; ?>>Inactivo</option>
                                            <option value="3" <?php if ($fila['estado'] == 'Bloqueado'): ?> selected<?php endif; ?>>Bloqueado</option>
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
                                    <div class="col-10 col-md-6">
                                        <br>
                                        <div class="form-group">
                                            <label class="label-actualizar">Sexo</label>
                                            <select class="form-control" name="sexo_act" required>
                                                <option value="" selected>Seleccione una opción</option>
                                                <option value="1" <?php if ($fila['sexo'] == 'Masculino'): ?> selected<?php endif; ?>>Masculino</option>
                                                <option value="2" <?php if ($fila['sexo'] == 'Femenino'): ?> selected<?php endif; ?>>Femenino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-10 col-md-6">
                                        <br>
                                        <div class="form-group">
                                            <label class="label-actualizar">Teléfono</label>
                                            <input type="text" class="form-control" name="telefono_act" id="nombre_usuario" 
                                            value="<?php echo $fila['telefono']; ?>" required="" >
                                        </div>
                                    </div>
                                </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Correo</label>
                                        <input type="email" class="form-control" name="correo_electronico_act" id="correo_electronico" 
                                        value="<?php echo $fila['correo_electronico']; ?>" required="">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Dirección</label>
                                        <input type="text" class="form-control" name="direccion_act" id="correo_electronico" 
                                        value="<?php echo $fila['direccion']; ?>" required="">
                                    </div>
                                    <br>
                                        <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
                                        <input type="hidden" value="<?php echo $fila['id_usuario']; ?>" class="form-control" name="empleado_id">
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
                        <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" method="POST" data-form="delete" autocomplete="off">
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
</div>

   
<!-- Modal Crear -->
<div class="modal fade" id="ModalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php
        if(!isset($permiso_in)){
            echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para añadir un empleado</div>';
            echo "<script> window.location.href='".SERVERURL."home/'; </script>";	
        //valida si el permiso tiene valor de cero, lo que significa que no puede acceder a la vista	
        }else if($permiso_in==0){
            echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para añadir un empleado
            <button type="button" class="close" data-bs-dismiss="alert" onclick="window.location.reload()">X</button>
            </div>
            <div class="modal-dialog" style="display:none">;';
        }else{
    ?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Empleado</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>

        </div>
        <div class="modal-body" id="modal-actualizar">
                <form action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                <div class="row">
                        <div class="col-10 col-md-6">
                            <div class="form-group">
                                <label class="color-label">Nombres</label>
                                <input type="text" class="form-control" name="nombre_nuevo" 
                                placeholder="Ingrese los nombres" required="" >
                            </div>
                        </div>
                        <div class="col-10 col-md-6">
                            <div class="form-group">
                                <label class="color-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellido_nuevo" 
                                placeholder="Ingrese los apellidos" required="" >
                            </div>
                        </div>
                        <div class="col-10 col-md-6">
                        <br>
                            <div class="form-group">
                                <label class="color-label">Usuario</label>
                                <input type="text" class="form-control" name="user_empleado_nuevo" id="nom_usuario" 
                                placeholder="Ingrese el usuario" style="text-transform:lowercase;" required="" >
                            </div>
                        </div>
                        <div class="col-10 col-md-6">
                        <br>
                            <div class="form-group">
                                <label class="color-label">DNI (con guiones)</label>
                                <input type="dni" class="form-control" name="dni_nuevo" 
                                placeholder="0000-0000-00000" required="" >
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
                        <div class="col-10 col-md-6">
                            <br>
                            <div class="form-group">
                                <label class="color-label">Sexo</label>
                                <select class="form-control" name="sexo_nuevo">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-10 col-md-6">
                            <br>
                            <div class="form-group">
                                <label class="color-label">Teléfono</label>
                                <input type="text" class="form-control" name="telefono_nuevo" 
                                placeholder="0000-0000" required="" >
                            </div>
                        </div>
                        <div class="col-10 col-md-6 contrasena">
                            <br>
                            <label class="color-label">Contraseña</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="contrasena_nuevo" id="contrasena" pattern="[a-zA-Z0-9!#%&/()=?¡*+_$@.-]{5,25}" 
                                placeholder="Ingresar contraseña" maxlength="25" required="" >
                                <span onclick="mosContrasena()" class="input-group-text"><i class="fas fa-eye-slash icon-clave" style="color:black;"></i></span>
                            </div>
                        </div>

                        <div class="col-10 col-md-6 conf-contrasena">
                            <br>
                            <label class="color-label">Confirmar Contraseña</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="conf_contrasena_nuevo" id="conf_contra" pattern="[a-zA-Z0-9!#%&/()=?¡*+_$@.-]{5,25}" 
                                placeholder="Confirmar contraseña" maxlength="25" required="" >
                                <span onclick="mosConfContrasena()" class="input-group-text"><i class="fas fa-eye-slash icon-confclave" style="color:black;"></i></span>
                            </div>
                        </div>
                </div>
            
                <div class="form-group">
                    <label class="color-label">Correo</label>
                    <input type="email" class="form-control" name="correo_electronico_nuevo" placeholder="ejemplo@correo.com" required="">
                </div>
                <br>
                <div class="form-group">
                    <label class="color-label">Dirección</label>
                    <textarea class="form-control" name="direccion_nuevo" rows="3" placeholder="Ingrese la dirección completa"></textarea>
                </div>
                <br>
                <input type="hidden" name="idPersona" class="form-control" value="<?php echo $idPersonaActual; ?>">
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


