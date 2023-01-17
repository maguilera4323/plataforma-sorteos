<?php
	//verifica si hay sesiones iniciadas
	if (session_status() !== PHP_SESSION_ACTIVE) {
	 	session_start();
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

    <form method="POST" >
        <section class="form-login">
          <h5>FORMULARIO DE LOGIN</h5>
          <input class="controls" type="text" name="txtusuario" value="" placeholder="Usuario" required>
          <input class="controls" type="password" name="txtcontrasena" value="" placeholder="Contraseña" required>
          <button class="buttons" type="submit" name="acceder">Iniciar Sesión</button>
    
            <div class="reset-password">
                <p><a href="IndexReset.html">¿Olvidastes tu contraseña?</a></p>
            </div>
        </section>
    </form>


