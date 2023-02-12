<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./DatosTablas/obtenerDatos.php"); 
include("./DatosTablas/obtenerDatosPremios.php"); 

//archivo para obtener los permisos del rol conectado al sistema en la vista a la que ha accedido
include("./DatosTablas/obtenerDatosPermisos.php"); 

//verificación de permisos
//se revisa si el usuario tiene acceso a una vista específica por medio del rol que tiene y el objeto al que quiere acceder
	$id_rol=$_SESSION['id_rol'];
	$datos=new obtenerDatosPermisos();
    $resultado=$datos->datosPermisosID($id_rol,6);

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
    <h2><i class="fas fa-trophy"></i>&nbsp; Premios</h2>
</div>
<br>

<!-- Menu de desplazamiento de vistas - forma descendente -->
<div class="container">
    <h5><i class="fas fa-home"></i>&nbsp; 
    <a href="<?php echo SERVERURL?>dashboard/"> Home </a>
    / 
    <a href="<?php echo SERVERURL?>premios/"> Premios </a></h5>
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
        <input type="text" id="searchBox" class="form-control" onkeyup="filterTable()" placeholder="Filtrar premios">
        <p id="message"></p>
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Sorteo</th> 
                <th>Patrocinador</th>                              
                <th>Nombre de Premio</th>  
                <th>Cantidad</th> 
                <th>Fotografía</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody class="body">
        <?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosPremios();
                $resultado=$datos->datosPremios();
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['nombre_sorteo']; ?></td>
                <td><?php echo $fila['nombre_empresa']; ?></td>
                <td><?php echo $fila['nombre_premio']; ?></td>
                <td><?php echo $fila['cantidad_disponible']; ?></td>
                <td><img src="<?php echo $fila['foto_premio']; ?>" width="150" height="150" alt="" alt=""></td>
                <td>
				<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_premio'];?>">
					<i class="fas fa-sync-alt"></i>
                </button>
						<!-- Modal actualizar-->
                    <div class="modal fade" id="ModalAct<?php echo $fila['id_premio'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <?php
                            if(!isset($permiso_act)){
                                echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para editar la información del premio</div>';
                                echo "<script> window.location.href='".SERVERURL."home/'; </script>";	
                            //valida si el permiso tiene valor de cero, lo que significa que no puede acceder a la vista	
                            }else if($permiso_act==0){
                                echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para editar la información del premio
                                <button type="button" class="close" data-bs-dismiss="alert" onclick="window.location.reload()">X</button>
                                </div>
                                <div class="modal-dialog" style="display:none">;';
                            }else{
                        ?>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Premio</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>
                            <div class="modal-body" id="modal-actualizar">
                                <form action="<?php echo SERVERURL; ?>ajax/premiosAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                                    <div class="form-group">
                                        <label class="label-actualizar">Sorteo</label>
                                            <select class="form-control" name="sorteo_act" required>
                                                <?php
                                                    $datos=new obtenerDatosTablas();
                                                    $resultado=$datos->datosTablas('sorteos');
                                                    foreach ($resultado as $valores){
                                                    //validación para obtener el valor guardado en la base de datos
                                                    //y que este se muestre seleccionado en la base de datos
                                                        if($fila['id_sorteo']==$valores['id_sorteo']){
                                                            echo '<option value="'.$valores['id_sorteo'].'" selected>'.$valores['nombre_sorteo'].'</option>';
                                                    //validación para obtener los demás valores de la base de datos para el select
                                                        }elseif($fila['id_sorteo']!=$valores['id_sorteo']){
                                                            echo '<option value="'.$valores['id_sorteo'].'">'.$valores['nombre_sorteo'].'</option>';
                                                            }
                                                    }
                                                ?>
                                            </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Patrocinador</label>
                                            <select class="form-control" name="patrocinador_act" required>
                                                <?php
                                                    $datos=new obtenerDatosTablas();
                                                    $resultado=$datos->datosTablas('empresas');
                                                    foreach ($resultado as $valores){
                                                    //validación para obtener el valor guardado en la base de datos
                                                    //y que este se muestre seleccionado en la base de datos
                                                        if($fila['id_empresa']==$valores['id_empresa']){
                                                            echo '<option value="'.$valores['id_empresa'].'" selected>'.$valores['nombre_empresa'].'</option>';
                                                    //validación para obtener los demás valores de la base de datos para el select
                                                        }elseif($fila['id_empresa']!=$valores['id_empresa']){
                                                            echo '<option value="'.$valores['id_empresa'].'">'.$valores['nombre_empresa'].'</option>';
                                                            }
                                                    }
                                                ?>
                                            </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Nombre</label>
                                        <input type="text" class="form-control" name="nombre_act" style="text-transform:uppercase;" 
                                        value="<?php echo $fila['nombre_premio']?>" required="" >
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Cantidad Disponible</label>
                                        <input type="number" class="form-control" name="cantidad_act" 
                                        value="<?php echo $fila['cantidad_disponible']?>" required="" >
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Fotografía</label>
                                        <input type="file" class="form-control" name="imagen_act" id="imagen" maxlength="300" placeholder="Agregar imagen">
                                        <img src="<?php echo $fila['foto_premio']; ?>" width="100" height="100" alt="">
                                    </div>
                                    <br>
                                    <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
                                    <input type="hidden" value="<?php echo $fila['id_premio']; ?>" class="form-control" name="premio_id">
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
					<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/premiosAjax.php" method="POST" data-form="delete" autocomplete="off">
					<input type="hidden" pattern="" class="form-control" name="id_premio_del" value="<?php echo $fila['id_premio'] ?>">	
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
            echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para añadir un premio</div>';
            echo "<script> window.location.href='".SERVERURL."home/'; </script>";	
        //valida si el permiso tiene valor de cero, lo que significa que no puede acceder a la vista	
        }else if($permiso_in==0){
            echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para añadir un premio
            <button type="button" class="close" data-bs-dismiss="alert" onclick="window.location.reload()">X</button>
            </div>
            <div class="modal-dialog" style="display:none">;';
        }else{
    ?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Premio</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>

        </div>
            <div class="modal-body" id="modal-actualizar">
                <form action="<?php echo SERVERURL; ?>ajax/premiosAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                    <div class="form-group">
                        <label class="color-label">Sorteo</label>
                            <select class="form-control" name="sorteo_nuevo" required>
                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <?php
                                        $datos=new obtenerDatosTablas();
                                        $resultado=$datos->datosTablas('sorteos');
                                        foreach ($resultado as $fila){
                                            echo '<option value="'.$fila['id_sorteo'].'">'.$fila['nombre_sorteo'].'</option>';
                                        }
                                    ?>
                            </select>
                    </div>	
                    <br>
                    <div class="form-group">
                        <label class="color-label">Patrocinador</label>
                            <select class="form-control" name="patrocinador_nuevo" required>
                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                    <?php
                                        $datos=new obtenerDatosTablas();
                                        $resultado=$datos->datosTablas('empresas');
                                        foreach ($resultado as $fila){
                                            echo '<option value="'.$fila['id_empresa'].'">'.$fila['nombre_empresa'].'</option>';
                                        }
                                    ?>
                            </select>
                    </div>	
                    <br>
                    <div class="form-group">
                        <label class="color-label">Nombre de Premio</label>
                        <input type="text" class="form-control" name="nombre_nuevo" style="text-transform:uppercase;" required="" >
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="color-label">Cantidad Disponible</label>
                        <input type="number" class="form-control" name="cantidad_nuevo" required="" >
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="label-actualizar">Fotografía</label>
                        <input type="file" class="form-control" name="imagen_nuevo" id="imagen" maxlength="300" placeholder="Agregar imagen">
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


