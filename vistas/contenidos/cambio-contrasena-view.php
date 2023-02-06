<?php
	//verifica si hay sesiones iniciadas
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	//llamado al controlador de login
    require_once 'controladores/loginControlador.php';
    $usuario = new loginUsuarios(); //se crea nueva instancia de usuario

	//valdacion para ver si se recibieron datos de ingreso
     if (isset($_POST['acceder'])) {
		$datos = array(
          'contrasena_nueva'=> $_POST['txtcontrasena'],
			    'conf_contrasena_nueva'=> $_POST['txtcontrasena_conf'],
          'email'=> $_SESSION['correo']
        );
        $respuesta = $usuario->modificarContrasena($datos); //se envian los datos a la funcion accesoUsuario de modelo Login
    }
	?>

<style>
    body{
  background: yellow;
  background: linear-gradient(to right, #ffa751,#ffe259 );

  }

</style>
  
  <div class="cambio-form">
    <form method="POST" action="">
        <section class="form-login">
          <h5>CAMBIO DE CONTRASEÑA</h5>
          
			<?php
				 if(isset($_SESSION['respuesta'])){
					switch($_SESSION['respuesta']){
						case 'Contraseña nueva igual a la actual':
							echo '<style>
              .cambio-form .form-login{
                width: 25rem;
                height: 24rem;
              }
              </style>

              <div class="alert alert-danger text-center">La contraseña actual y la contraseña 
							nueva no pueden ser iguales</div>';
						break;
						case 'Contraseñas no coinciden':
							echo '<style>
              .cambio-form .form-login{
                width: 25rem;
                height: 24rem;
              }
              </style>

              <div class="alert alert-danger text-center">Las nuevas contraseñas ingresadas no coinciden</div>';
						break;
						case 'Cambio de contraseña exitoso':
							echo "<script>
              setTimeout(function(){location.href='".SERVERURL."login/'} , 2500); </script>";
							echo '<style>
              .cambio-form .form-login{
                width: 25rem;
                height: 24rem;
              }
              </style>

              <div class="alert alert-success text-center">Contraseña cambiada exitosamente.
							Se le redirigirá a la página de Login...</div>';
						break;
					 }
				 }
			 ?>
          <input class="controls" type="password" name="txtcontrasena" placeholder="Ingrese contraseña" required>
          <input class="controls" type="password" name="txtcontrasena_conf" placeholder="Confirme su contraseña" required>
          <input class="buttons"  type="submit" name="acceder" value="ENVIAR">
        </section>
    </form>
</div>
