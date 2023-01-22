<?php
	//verifica si hay sesiones iniciadas
	if (session_status() !== PHP_SESSION_ACTIVE) {
	 	session_start();
	}

	//verifica si la variable del contador está creada
	if (!isset($_SESSION['contador_intentos'])){
		$_SESSION['contador_intentos'] = 0;
	}

	//llamado al controlador de login
	require_once 'controladores/loginControlador.php';
	$usuario = new loginUsuarios(); //se crea nueva instancia de usuario

	//valdacion para ver si se recibieron datos de ingreso
	if (isset($_POST['acceder'])) {
		$datos = array(
			'usuario'=> $_POST['txtusuario'],
			'password'=> $_POST['txtcontrasena'],
		);
		$respuesta = $usuario->accesoSistema($datos); //se envian los datos a la funcion accesoUsuario de Logincontrolador
}
?>

<?php
				 if(isset($_SESSION['respuesta'])){
					switch($_SESSION['respuesta']){
						case 'Contraseña incorrecta':
							echo '<div div class="alert alert-danger text-center" role="alert">Usuario y/o contraseña inválidos</div>';
							$_SESSION['contador_intentos']+=0.5;
						break;
						case 'Usuario inactivo':
							echo '<div class="alert alert-warning text-center" style="font-size: 22px;">El usuario está inactivo. Comuniquese con el 
							administrador del sistema</div>';
						break;
						case 'Usuario bloqueado':
							echo '<div class="alert alert-dark text-center" style="font-size: 22px;">El usuario está bloqueado. Comuniquese con el 
							administrador del sistema</div>';
							$_SESSION['contador_intentos']=0;
						break;
						case 'Datos incorrectos':
							echo '<div class="alert alert-danger text-center" style="font-size: 22px;">Usuario y/o contraseña inválidos</div>';
							$_SESSION['contador_intentos']=0;
						break;
						case 'Usuario sin permisos':
							echo '<div class="alert alert-dark text-center" style="font-size: 22px;">El usuario no tiene los permisos para iniciar 
							sesión. Comuniquese con el administrador del sistema</div>';
							$_SESSION['contador_intentos']=0;
						break;
					 }
				 }
			 ?>

    <form method="POST" >
        <section class="form-login">
          <h5>FORMULARIO DE LOGIN</h5>
          <input class="controls" type="text" name="txtusuario" value="" placeholder="Usuario" required>
          <input class="controls" type="password" name="txtcontrasena" value="" placeholder="Contraseña" required>
		  <div class="reset-password">
                <p><a href="<?php echo SERVERURL?>recuperacion-clave/">¿Olvidaste tu contraseña?</a></p>
            </div>
			<br>
          <button class="buttons" type="submit" name="acceder">Iniciar Sesión</button>
        </section>
    </form>


