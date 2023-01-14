<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/DatosTablas/obtenerDatosPerfil.php"); 
?>

<h3 style="padding:3rem;"><i class="fas fa-user-edit"></i> &nbsp; PERFIL </h3>

<img src="<?php echo $_SESSION['foto_login']; ?>" width="150" height="150" alt="" alt="">
<br>
<h3>Datos del usuario</h3>

<?php
    //variables para generar la url completa del sitio y obtener el id del registro
	$host= $_SERVER["HTTP_HOST"];
	$url= $_SERVER["REQUEST_URI"];
	$url_completa="http://" . $host . $url; 
	//variable que contiene el id de la compra a editar
	$id = explode('/',$url_completa)[5];
    
    //se hace una instancia a la clase
    $datos=new obtenerDatosPerfil();
    $resultado=$datos->datosPerfil($id);
    foreach ($resultado as $fila){
?>
    <div class="form-group perfil">
		<label class="perfil">Usuario</label>
		<input type="text" class="form-group" name="parametro_nuevo" id="input perfil" maxlength="27" 
        style="text-transform:uppercase;" value="<?php echo $fila['usuario'] ?>">
	</div>

    <div class="form-group perfil">
		<label class="perfil">Nombre</label>
		<input type="text" class="" name="parametro_nuevo" id="input perfil" maxlength="27" 
        style="text-transform:uppercase;" value="<?php echo $fila['nombre_usuario'] ?>">
	</div>

    <div class="form-group perfil">
		<label class="perfil">Estado</label>
		<input type="text" class="" name="parametro_nuevo" id="input perfil" maxlength="27" 
        style="text-transform:uppercase;" value="<?php echo $fila['estado_usuario'] ?>">
	</div>

    <div class="form-group perfil">
		<label class="perfil">Rol</label>
		<input type="text" class="" name="parametro_nuevo" id="input perfil" maxlength="27" 
        style="text-transform:uppercase;" value="<?php echo $fila['id_rol'] ?>">
	</div>

    <?php
            }
    ?>
<div class="modal fade" id="ModalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Parámetro</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body" id="modal-actualizar">
			<form action="<?php echo SERVERURL; ?>ajax/parametroAjax.php" class="FormularioAjax" method="POST" data-form="save" autocomplete="off">
			<div class="form-group">
				<label class="color-label">Parámetro</label>
				<input type="text" class="form-control" name="parametro_nuevo" id="cliente_dni" maxlength="27" 
                style="text-transform:uppercase;" required>
			</div>
            <br>
            <div class="form-group">
				<label class="color-label">Valor</label>
				<input type="text" class="form-control" name="valor_nuevo" id="cliente_dni" maxlength="27" required>
			</div>
            <br>
            <input type="hidden" value="<?php echo $_SESSION['usuario_login']; ?>" class="form-control" name="usuario_login">
            <input type="hidden" value="<?php echo $_SESSION['id_login']; ?>" class="form-control" name="usuario_id">
            <button type="submit" class="btn btn-primary">Guardar</button>
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			</form>
      </div>
    </div>
  </div>
</div>



