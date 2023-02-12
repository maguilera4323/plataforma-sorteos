<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./DatosTablas/obtenerDatos.php"); 
include("./DatosTablas/obtenerDatosSorteos.php"); 

//archivo para obtener los permisos del rol conectado al sistema en la vista a la que ha accedido
include("./DatosTablas/obtenerDatosPermisos.php"); 

//verificación de permisos
//se revisa si el usuario tiene acceso a una vista específica por medio del rol que tiene y el objeto al que quiere acceder
	$id_rol=$_SESSION['id_rol'];
	$datos=new obtenerDatosPermisos();
    $resultado=$datos->datosPermisosID($id_rol,4);

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

<div class="main-contenedor">
<br>
<div class="container">
    <h2><i class="fas fa-medal"></i>&nbsp; Sorteos</h2>
</div>
<br>

<!-- Menu de desplazamiento de vistas - forma descendente -->
<div class="container">
    <h5><i class="fas fa-home"></i>&nbsp; 
    <a href="<?php echo SERVERURL?>dashboard/"> Home </a>
    / 
    <a href="<?php echo SERVERURL?>sorteos/"> Sorteos </a></h5>
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
        <input type="text" id="searchBox" class="form-control" onkeyup="filterTable()" placeholder="Filtrar sorteos">
        <p id="message"></p>
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Nombre de sorteo</th>  
                <th>Rango Inicial</th>
                <th>Rango Final</th>
                <th>Ver boletos vendidos</th>
                <th>Estado</th> 
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody class="body">
        <?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosSorteos();
                $resultado=$datos->datosSorteos();
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['nombre_sorteo']; ?></td>
                <td><?php echo $fila['rango_inicial']; ?></td>
                <td><?php echo $fila['rango_final']; ?></td>
                <td><a href="<?php echo SERVERURL?>boletos?id=<?php echo $fila['id_sorteo']; ?>">
                <i class="fas fa-info-circle"></i></a></td>
                <td><?php echo $fila['estado_sorteo']; ?></td>
                <td>
				<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_sorteo'];?>">
					<i class="fas fa-sync-alt"></i>
                </button>
						<!-- Modal actualizar-->
                    <div class="modal fade" id="ModalAct<?php echo $fila['id_sorteo'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <?php
                            if(!isset($permiso_act)){
                                echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para editar la información del sorteo</div>';
                                echo "<script> window.location.href='".SERVERURL."home/'; </script>";	
                            //valida si el permiso tiene valor de cero, lo que significa que no puede acceder a la vista	
                            }else if($permiso_act==0){
                                echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para editar la información del sorteo
                                <button type="button" class="close" data-bs-dismiss="alert" onclick="window.location.reload()">X</button>
                                </div>
                                <div class="modal-dialog" style="display:none">;';
                            }else{
                        ?>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Sorteo</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="modal-actualizar">
                                <form action="<?php echo SERVERURL; ?>ajax/sorteoAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                                    <div class="form-group">
                                        <label class="label-actualizar">Nombre</label>
                                        <input type="text" class="form-control" name="nombre_act" style="text-transform:uppercase;" 
                                        value="<?php echo $fila['nombre_sorteo']?>" required="" >
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Rango Inicial</label>
                                        <input type="number" class="form-control" name="rango_inicial_act" value="<?php echo $fila['rango_inicial']?>" required="" >
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Rango Final</label>
                                        <input type="number" class="form-control" value="<?php echo $fila['rango_final']?>" name="rango_final_act" required="" >
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Estado</label>
                                            <select class="form-control" name="estado_act">
                                                <option value="1" <?php if ($fila['estado_sorteo'] == 'Activo'): ?>selected<?php endif; ?>>Activo</option>
                                                <option value="2" <?php if ($fila['estado_sorteo'] == 'Inactivo'): ?>selected<?php endif; ?>>Inactivo</option>
                                            </select>
                                    </div>
                                    <br>
                                    <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
                                    <input type="hidden" value="<?php echo $fila['id_sorteo']; ?>" class="form-control" name="sorteo_id">
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
					<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/sorteoAjax.php" method="POST" data-form="delete" autocomplete="off">
					<input type="hidden" pattern="" class="form-control" name="id_sorteo_del" value="<?php echo $fila['id_sorteo'] ?>">	
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
            echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para añadir un sorteo</div>';
            echo "<script> window.location.href='".SERVERURL."home/'; </script>";	
        //valida si el permiso tiene valor de cero, lo que significa que no puede acceder a la vista	
        }else if($permiso_in==0){
            echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para añadir un sorteo
            <button type="button" class="close" data-bs-dismiss="alert" onclick="window.location.reload()">X</button>
            </div>
            <div class="modal-dialog" style="display:none">;';
        }else{
    ?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Sorteo</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body" id="modal-actualizar">
                    <form action="<?php echo SERVERURL; ?>ajax/sorteoAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                        <div class="form-group">
                            <label class="color-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre_nuevo" style="text-transform:uppercase;" required="" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="color-label">Rango Inicial</label>
                            <input type="number" class="form-control" name="rango_inicial_nuevo" required="" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="color-label">Rango Final</label>
                            <input type="number" class="form-control" name="rango_final_nuevo" required="" >
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


