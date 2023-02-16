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
    $resultado=$datos->datosPermisosID($id_rol,3);

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
            "id_modulo" => 3,
            "fecha" => date('Y-m-d H:i:s'),
            "id_usuario" => $_SESSION['id_login'],
            "accion" => "Cambio de vista",
            "descripcion" => "El usuario ".$_SESSION['usuario_login']." entró a la vista de Empresas"
        ];
        $resultado=$registroEntrada->guardar_bitacora($datos_bitacora);
    }
?>
<br>
<div class="container">
    <h2><i class="fas fa-industry"></i>&nbsp; Empresas</h2>
</div>
<br>

<!-- Menu de desplazamiento de vistas - forma descendente -->
<div class="container">
    <h5><i class="fas fa-home"></i>&nbsp; 
    <a href="<?php echo SERVERURL?>dashboard/"> Home </a>
    / 
    <a href="<?php echo SERVERURL?>empresas/"> Empresas </a></h5>
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
            <input type="text" id="searchBox" class="form-control" placeholder="Filtrar empresas" onkeyup="filterTable()">
            <p id="message"></p>
        <table id="datos-usuario" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
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
                    <td><?php echo $fila['nombre_empresa']; ?></td>
                    <td><?php echo $fila['direccion']; ?></td>
                    <td><?php echo $fila['telefono']; ?></td>
                    <td><?php echo $fila['correo_electronico']; ?></td>
                    <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalAct<?php echo $fila['id_empresa'];?>">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                            <!-- Modal actualizar-->
                        <div class="modal fade" id="ModalAct<?php echo $fila['id_empresa'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <?php
                            if(!isset($permiso_act)){
                                echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para editar la información de la empresa</div>';
                                echo "<script> window.location.href='".SERVERURL."home/'; </script>";	
                            //valida si el permiso tiene valor de cero, lo que significa que no puede acceder a la vista	
                            }else if($permiso_act==0){
                                echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para editar la información de la empresa
                                <button type="button" class="close" data-bs-dismiss="alert" onclick="window.location.reload()">X</button>
                                </div>
                                <div class="modal-dialog" style="display:none">;';
                            }else{
                        ?>    
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
                                        <input type="text" class="form-control" name="nombre_act" 
                                        style="text-transform:uppercase;" value="<?php echo $fila['nombre_empresa']; ?>" required="">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Direccion</label>
                                        <input type="text" class="form-control" name="direccion_act"
                                        value="<?php echo $fila['direccion']; ?>" required="">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Teléfono</label>
                                        <input type="number" class="form-control" name="telefono_act" 
                                        value="<?php echo $fila['telefono']; ?>" required="">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="label-actualizar">Correo electrónico</label>
                                        <input type="email" class="form-control" name="correo_electronico_act" 
                                        value="<?php echo $fila['correo_electronico']; ?>" required="">
                                    </div>
                                        <br>
                                        <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
                                        <input type="hidden" value="<?php echo $fila['id_empresa']; ?>" class="form-control" name="empresa_id">
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
                        
                        <form class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/empresasAjax.php" method="POST" data-form="delete" autocomplete="off">
                        <input type="hidden" pattern="" class="form-control" name="id_empresa_del" value="<?php echo $fila['id_empresa'] ?>">	
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
</div>
<br>
<br>


   
<!-- Modal Crear -->
<div class="modal fade" id="ModalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<?php
	if(!isset($permiso_in)){
		echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para añadir una empresa</div>';
		echo "<script> window.location.href='".SERVERURL."home/'; </script>";	
	//valida si el permiso tiene valor de cero, lo que significa que no puede acceder a la vista	
	}else if($permiso_in==0){
		echo '<div class="alert alert-warning text-center" style="font-size: 28px;">Usted no tiene autorización para añadir una empresa
		<button type="button" class="close" data-bs-dismiss="alert" onclick="window.location.reload()">X</button>
		</div>
        <div class="modal-dialog" style="display:none">;';
	}else{
?>
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
				<input type="text" class="form-control" name="nombre_nuevo" 
                style="text-transform:uppercase;" required="">
			</div>
            <br>
            <div class="form-group">
				<label class="color-label">Dirección</label>
				<input type="text" class="form-control" name="direccion_nuevo" required="">
			</div>
            <br>
            <div class="form-group">
				<label class="color-label">Teléfono</label>
				<input type="number" class="form-control" name="telefono_nuevo" required="">
			</div>
            <br>
            <div class="form-group">
				<label class="color-label">Correo electrónico</label>
				<input type="email" class="form-control" name="correo_electronico_nuevo" required="">
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


