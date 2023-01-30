<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./DatosTablas/obtenerDatos.php"); 
include("./DatosTablas/obtenerDatosSorteos.php"); 
?>
<br>
<h2 class="nombre-vista"><i class="fas fa-medal"></i>&nbsp; Sorteos</h2>
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
        <input type="text" id="searchBox" class="form-control" onkeyup="filterTable()" placeholder="Filtrar sorteos">
        <p id="message"></p>
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Empresa</th>                               
                <th>Nombre de sorteo</th>  
                <th>Fecha</th>
                <th>Cantidad de boletos</th>
                <th>Ver Boletos Vendidos</th>
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
                <td><?php echo $fila['id_sorteo']; ?></td>
                <td><?php echo $fila['nombre_empresa']; ?></td>
                <td><?php echo $fila['nombre_sorteo']; ?></td>
                <td><?php echo $fila['fecha_realizacion']; ?></td>
                <td><?php echo $fila['cantidad_boletos']; ?></td>
                <td><a href="<?php echo SERVERURL?>boletos?id=<?php echo $fila['id_sorteo']; ?>">
                <i class="fas fa-info-circle"></i></a></td>
                <td><?php echo $fila['estado_sorteo']; ?></td>
                <td>
				<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_sorteo'];?>">
					<i class="fas fa-sync-alt"></i>
                </button>
						<!-- Modal actualizar-->
                    <div class="modal fade" id="ModalAct<?php echo $fila['id_sorteo'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <label class="label-actualizar">Empresa</label>
                                        <select class="form-control" name="empresa_act" required>
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
                                    value="<?php echo $fila['nombre_sorteo']?>" required="" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="label-actualizar">Fecha de sorteo</label>
                                    <input type="datetime-local" class="form-control" name="fecha_act" value="<?php echo $fila['fecha_realizacion']?>" required="" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="label-actualizar">Cantidad de boletos</label>
                                    <input type="number" class="form-control" value="<?php echo $fila['cantidad_boletos']?>" name="cant_act" required="" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="label-actualizar">Estado</label>
                                        <select class="form-control" name="estado_act">
                                            <option value="1" <?php if ($fila['estado_sorteo'] == 'Pendiente'): ?>selected<?php endif; ?>>Pendiente</option>
                                            <option value="2" <?php if ($fila['estado_sorteo'] == 'Realizado'): ?>selected<?php endif; ?>>Realizado</option>
                                        </select>
                                </div>
                                <br>
                                <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
                                <input type="hidden" value="<?php echo $fila['id_sorteo']; ?>" class="form-control" name="sorteo_id">
                                <button type="submit" class="btn btn-danger">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </form>
                            </div>
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
                    <label class="color-label">Empresa</label>
                        <select class="form-control" name="empresa_nuevo" required>
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
                    <label class="color-label">Nombre</label>
				    <input type="text" class="form-control" name="nombre_nuevo" style="text-transform:uppercase;" required="" >
				</div>
                <br>
				<div class="form-group">
                    <label class="color-label">Fecha de sorteo</label>
					<input type="datetime-local" class="form-control" name="fecha_nuevo" required="" >
				</div>
                <br>
				<div class="form-group">
                    <label class="color-label">Cantidad de boletos</label>
					<input type="number" class="form-control" name="cant_nuevo" required="" >
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


