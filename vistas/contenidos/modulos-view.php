<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./DatosTablas/obtenerDatos.php"); 
?>
<br>
<div class="container">
    <h2><i class="fas fa-table"></i>&nbsp; Módulos</h2>
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
        <input type="text" id="searchBox" class="form-control" onkeyup="filterTable()" placeholder="Filtrar módulos">
        <p id="message"></p>
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
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
                <td><?php echo $fila['id_modulo']; ?></td>
                <td><?php echo $fila['modulo']; ?></td>
                <td><?php echo $fila['descripcion']; ?></td>
                <td><?php echo $fila['tipo_modulo']; ?></td>
                <td>
				<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_modulo'];?>">
					<i class="fas fa-sync-alt"></i>
                </button>
						<!-- Modal actualizar-->
                    <div class="modal fade" id="ModalAct<?php echo $fila['id_modulo'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <option value="2" <?php if ($fila['tipo_modulo'] == 'Empresas'): ?>selected<?php endif; ?>>Empresas</option>
                                            <option value="3" <?php if ($fila['tipo_modulo'] == 'Sorteos'): ?>selected<?php endif; ?>>Sorteos</option>
                                            <option value="4" <?php if ($fila['tipo_modulo'] == 'Premios'): ?>selected<?php endif; ?>>Premios</option>
                                            <option value="5" <?php if ($fila['tipo_modulo'] == 'Configuracion'): ?>selected<?php endif; ?>>Configuración</option>
                                            <option value="6" <?php if ($fila['tipo_modulo'] == 'Administracion'): ?>selected<?php endif; ?>>Administración</option>
                                        </select>
                                </div>
                                <br>
                                <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
                                <input type="hidden" value="<?php echo $fila['id_modulo']; ?>" class="form-control" name="modulo_id">
                                <button type="submit" class="btn btn-danger">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </form>
                            </div>
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
							<option value="2">Empresas</option>
							<option value="3">Sorteos</option>
							<option value="4">Premios</option>
							<option value="5">Configuración</option>
							<option value="6">Administración</option>
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
</div>


