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
        <input type="text" id="searchBox" class="form-control" placeholder="Filtrar empresas" onkeyup="filterTable()">
        <p id="message"></p>
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>                               
                <th>Direccion</th>  
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosTablas();
                $resultado=$datos->datosTablas('empresas');
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['IdEmpresa']; ?></td>
                <td><?php echo $fila['NombreEmpresa']; ?></td>
                <td><?php echo $fila['Direccion']; ?></td>
                <td><?php echo $fila['Telefono']; ?></td>
                <td><?php echo $fila['Correo']; ?></td>
                <td>
				<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['IdEmpresa'];?>">
					<i class="fas fa-sync-alt"></i>
                </button>
						<!-- Modal actualizar-->
                    <div class="modal fade" id="ModalAct<?php echo $fila['IdEmpresa'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Actualizar Empresa</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <div class="modal-body" id="modal-actualizar">
                            <form action="<?php echo SERVERURL; ?>ajax/empresasAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
                                <div class="form-group">
                                    <label class="label-actualizar">Nombre</label>
                                    <input type="text" class="form-control" name="nombre_act" id="correo_electronico" 
                                    style="text-transform:uppercase;" value="<?php echo $fila['NombreEmpresa']; ?>" required="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="label-actualizar">Direccion</label>
                                    <input type="text" class="form-control" name="direccion_act" id="correo_electronico" 
                                    value="<?php echo $fila['Direccion']; ?>" required="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="label-actualizar">Teléfono</label>
                                    <input type="number" class="form-control" name="telefono_act" id="correo_electronico" 
                                     value="<?php echo $fila['Telefono']; ?>" required="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="label-actualizar">Correo electrónico</label>
                                    <input type="email" class="form-control" name="correo_electronico_act" id="correo_electronico" 
                                    value="<?php echo $fila['Correo']; ?>" required="">
                                </div>
                                    <br>
                                    <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
                                    <input type="hidden" value="<?php echo $fila['IdEmpresa']; ?>" class="form-control" name="empresa_id">
                                    <button type="submit" class="btn btn-danger">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </form>
                            </div>
                        </div>
			    </td>
                <td>
					<form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/empresasAjax.php" method="POST" data-form="delete" autocomplete="off">
					<input type="hidden" pattern="" class="form-control" name="id_empresa_del" value="<?php echo $fila['IdEmpresa'] ?>">	
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
        <h5 class="modal-title" id="exampleModalLabel">Nueva Empresa</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body" id="modal-actualizar">
		<form action="<?php echo SERVERURL; ?>ajax/empresasAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
            <div class="form-group">
				<label class="color-label">Nombre</label>
				<input type="text" class="form-control" name="nombre_nuevo" id="correo_electronico" 
                style="text-transform:uppercase;" required="">
			</div>
            <br>
            <div class="form-group">
				<label class="color-label">Dirección</label>
				<input type="text" class="form-control" name="direccion_nuevo" id="correo_electronico" required="">
			</div>
            <br>
            <div class="form-group">
				<label class="color-label">Teléfono</label>
				<input type="number" class="form-control" name="telefono_nuevo" id="correo_electronico" required="">
			</div>
            <br>
            <div class="form-group">
				<label class="color-label">Correo electrónico</label>
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


