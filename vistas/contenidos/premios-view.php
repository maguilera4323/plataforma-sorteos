<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./DatosTablas/obtenerDatos.php"); 
include("./DatosTablas/obtenerDatosPremios.php"); 
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
        <input type="text" id="searchBox" class="form-control" onkeyup="filterTable()" placeholder="Filtrar premios">
        <p id="message"></p>
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sorteo</th>                               
                <th>Nombre de Premio</th>  
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
                <td><?php echo $fila['id_premio']; ?></td>
                <td><?php echo $fila['nombre_sorteo']; ?></td>
                <td><?php echo $fila['nombre_premio']; ?></td>
                <td><img src="<?php echo $fila['foto_premio']; ?>" width="150" height="150" alt="" alt=""></td>
                <td>
				<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_premio'];?>">
					<i class="fas fa-sync-alt"></i>
                </button>
						<!-- Modal actualizar-->
                    <div class="modal fade" id="ModalAct<?php echo $fila['id_premio'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <label class="color-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre_act" style="text-transform:uppercase;" 
                                    value="<?php echo $fila['nombre_premio']?>" required="" >
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

   
<!-- Modal Crear -->
<div class="modal fade" id="ModalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label class="color-label">Nombre de Premio</label>
				    <input type="text" class="form-control" name="nombre_nuevo" style="text-transform:uppercase;" required="" >
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
</div>


