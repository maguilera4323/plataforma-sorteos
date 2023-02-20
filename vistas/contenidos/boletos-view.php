<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./DatosTablas/obtenerDatos.php"); 
include("./DatosTablas/obtenerDatosSorteos.php");

//llamado al archivo de la bitacora
include ("./modelos/bitacoraActividades.php");
$registroEntrada = new bitacora();

//archivo para obtener los permisos del rol conectado al sistema en la vista a la que ha accedido
include("./DatosTablas/obtenerDatosPermisos.php"); 

//verificación de permisos
//se revisa si el usuario tiene acceso a una vista específica por medio del rol que tiene y el objeto al que quiere acceder
	$id_rol=$_SESSION['id_rol'];
	$datos=new obtenerDatosPermisos();
    $resultado=$datos->datosPermisosID($id_rol,5);

    foreach ($resultado as $fila){
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
            "id_modulo" => 5,
            "fecha" => date('Y-m-d H:i:s'),
            "id_usuario" => $_SESSION['id_login'],
            "accion" => "Cambio de vista",
            "descripcion" => "El usuario ".$_SESSION['usuario_login']." entró a la vista de Boletos Comprados"
        ];
        $resultado=$registroEntrada->guardar_bitacora($datos_bitacora);
    }
?>
<br>
<div class="container">
    <h2><i class="fas fa-vote-yea"></i>&nbsp; Boletos Vendidos</h2>
</div>
<hr/>

<!-- Menu de desplazamiento de vistas - forma descendente -->
<div class="container">
    <h5><i class="fas fa-home"></i>&nbsp; 
    <a href="<?php echo SERVERURL?>dashboard/"> Home </a>
    / 
    <a href="<?php echo SERVERURL?>sorteos/"> Sorteos </a>
    / 
    <a href="<?php echo SERVERURL?>boletos/"> Boletos </a></h5>
</div>
<br>

<div class="container contenedor-tabla">
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-6">
                <a href="<?php echo SERVERURL?>sorteos/">
                <div class="btn btn-outline-primary btn-lg"><i class="fas fa-reply"></i> &nbsp; Regresar a pestaña de Sorteos</div>
                </a>
            </div>
            <div class="col-2"></div>
        </div>
    </div>


<div class="table-responsive">
    
<?php
	//variables para generar la url completa del sitio y obtener el id del registro
	$host= $_SERVER["HTTP_HOST"];
	$url= $_SERVER["REQUEST_URI"];
	$url_completa="http://" . $host . $url; 
			//variable que contiene el id de la compra a editar
	$id = explode('=',$url_completa)[1]; 

	?>
    <br>
        <input type="text" id="searchBox" class="form-control" onkeyup="filterTable()" placeholder="Filtrar boletos vendidos">
        <p id="message"></p>
    <table id="datos-usuario" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>DNI</th>                                 
                <th># Boleto</th>
                <th>Fecha de Compra</th>
            </tr>
        </thead>
        <tbody class="body">
        <?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosSorteos();
                $resultado=$datos->boletosComprados($id);
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['nombres'] . ' ' . $fila['apellidos']; ?></td>
                <td><?php echo $fila['dni']; ?></td>
                <td><?php echo $fila['numero_boleto']; ?></td>
                <td><?php echo $fila['fecha_compra']; ?></td>
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


