<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./DatosTablas/obtenerDatos.php"); 

//llamado al archivo de la bitacora
include ("./modelos/bitacoraActividades.php");
$registroEntrada = new bitacora();

//archivo para obtener los permisos del rol conectado al sistema en la vista a la que ha accedido
include("./DatosTablas/obtenerDatosPermisos.php"); 

//verificación de permisos
//se revisa si el usuario tiene acceso a una vista específica por medio del rol que tiene y el objeto al que quiere acceder
	$id_rol=$_SESSION['id_rol'];
	$datos=new obtenerDatosPermisos();
    $resultado=$datos->datosPermisosID($id_rol,12);

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
	}else{
        $datos_bitacora = [
            "id_modulo" => 12,
            "fecha" => date('Y-m-d H:i:s'),
            "id_usuario" => $_SESSION['id_login'],
            "accion" => "Cambio de vista",
            "descripcion" => "El usuario ".$_SESSION['usuario_login']." entró a la vista de Módulos"
        ];
        $resultado=$registroEntrada->guardar_bitacora($datos_bitacora);
    }
?>
<br>
<div class="container">
    <h2><i class="fas fa-table"></i>&nbsp; Módulos</h2>
</div>
<br>

<!-- Menu de desplazamiento de vistas - forma descendente -->
<div class="container">
    <h5><i class="fas fa-home"></i>&nbsp; 
    <a href="<?php echo SERVERURL?>dashboard/"> Home </a>
    / 
    <a href="<?php echo SERVERURL?>configuracion/"> Configuración </a>
    / 
    <a href="<?php echo SERVERURL?>modulos/"> Módulos </a></h5>
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
        <input type="text" id="searchBox" class="form-control" onkeyup="filterTable()" placeholder="Filtrar módulos">
        <p id="message"></p>
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Modulo</th>                               
                <th>Descripción</th>  
                <th>Tipo</th> 
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody class="body">
        <?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosTablas();
                $resultado=$datos->datosTablas('modulos');
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['modulo']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>
                <td><?php echo $fila['tipo_modulo']; ?></td>
                <td>
				<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_modulo'];?>">
					<i class="fas fa-sync-alt"></i>
                </button>
						<!-- Modal actualizar-->
                    <div class="modal fade" id="ModalAct<?php echo $fila['id_modulo'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <?php
                            if(!isset($permiso_act)){
                                echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para editar la información del módulo</div>';
                                echo "<script> window.location.href='".SERVERURL."home/'; </script>";	
                            //valida si el permiso tiene valor de cero, lo que significa que no puede acceder a la vista	
                            }else if($permiso_act==0){
                                echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para editar la información del módulo
                                <button type="button" class="close" data-bs-dismiss="alert" onclick="window.location.reload()">X</button>
                                </div>
                                <div class="modal-dialog" style="display:none">;';
                            }else{
                        ?>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar Módulo</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <div class="modal-body" id="modal-actualizar">
                            <form action="<?php echo SERVERURL; ?>ajax/moduloAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                                <div class="form-group">
                                    <label class="label-actualizar">Nombre</label>
                                    <input type="text" class="form-control" name="modulo_act" value="<?php echo $fila['modulo']?>"required="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="label-actualizar">Descripción</label>
                                    <input type="text" class="form-control" name="desc_act" value="<?php echo $fila['descripcion']?>"required="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="label-actualizar">Tipo de Módulo</label>
                                        <select class="form-control" name="tipo_modulo_act">
                                            <option value="" selected>Seleccione una opción</option>
                                            <option value="1" <?php if ($fila['tipo_modulo'] == 'Home'): ?>selected<?php endif; ?>>Home</option>
                                            <option value="2" <?php if ($fila['tipo_modulo'] == 'Dashboard'): ?>selected<?php endif; ?>>Dashboard</option>
                                            <option value="3" <?php if ($fila['tipo_modulo'] == 'Empresas'): ?>selected<?php endif; ?>>Empresas</option>
                                            <option value="4" <?php if ($fila['tipo_modulo'] == 'Sorteos'): ?>selected<?php endif; ?>>Sorteos</option>
                                            <option value="5" <?php if ($fila['tipo_modulo'] == 'Premios'): ?>selected<?php endif; ?>>Premios</option>
                                            <option value="6" <?php if ($fila['tipo_modulo'] == 'Configuracion'): ?>selected<?php endif; ?>>Configuración</option>
                                            <option value="7" <?php if ($fila['tipo_modulo'] == 'Administracion'): ?>selected<?php endif; ?>>Administración</option>
                                        </select>
                                </div>
                                <br>
                                <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
                                <input type="hidden" value="<?php echo $fila['id_modulo']; ?>" class="form-control" name="modulo_id">
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
					<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/moduloAjax.php" method="POST" data-form="delete" autocomplete="off">
					<input type="hidden" pattern="" class="form-control" name="id_mod_del" value="<?php echo $fila['id_modulo'] ?>">	
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
            echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para añadir un módulo</div>';
            echo "<script> window.location.href='".SERVERURL."home/'; </script>";	
        //valida si el permiso tiene valor de cero, lo que significa que no puede acceder a la vista	
        }else if($permiso_in==0){
            echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para añadir un módulo
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
                <form action="<?php echo SERVERURL; ?>ajax/moduloAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                    <div class="form-group">
                        <label class="color-label">Nombre</label>
                        <input type="text" class="form-control" name="modulo_nuevo" style="text-transform:uppercase;" required="" >
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="color-label">Descripción</label>
                        <input type="text" class="form-control" name="desc_nuevo" required="" >
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="color-label">Tipo de Módulo</label>
                            <select class="form-control" name="tipo_modulo_nuevo">
                                <option value="" selected>Seleccione una opción</option>
                                <option value="1">Home</option>
                                <option value="2">Dashboard</option>
                                <option value="3">Empresas</option>
                                <option value="4">Sorteos</option>
                                <option value="5">Premios</option>
                                <option value="6">Configuración</option>
                                <option value="7">Administración</option>
                            </select>
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


