<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	//llamado al controlador de login
    require_once './controladores/loginControlador.php';
    $usuario = new loginUsuarios(); //se crea nueva instancia de usuario

	//valdacion para ver si se recibieron datos de ingreso
    if (isset($_POST['acceder'])) {
		  $email = $_POST['txtcorreo'];
      $respuesta = $usuario->verificaUsuarioExistente($email); //se envian los datos a la funcion accesoUsuario de modelo Login
    }
	?>

<style>
    body{
  background: yellow;
  background: linear-gradient(to right, #ffa751,#ffe259 );

  }

</style>
  
  <div class="recuperacion-form">
    <form method="POST" action="">
        <section class="form-login">
          <h5>RECUPERACION DE CONTRASEÑA</h5>
          <?php
				  if(isset($_SESSION['respuesta'])){
					switch($_SESSION['respuesta']){
						case 'Usuario no existe':
							echo ' <style>
              .recuperacion-form .form-login{
                width: 25rem;
                height: 20rem;
              }
              </style>

              <div div class="alert alert-danger text-center justify-content-center" role="alert">El correo ingresado no existe en el sistema</div>';
             
						break;
						case 'Usuario esta inactivo':
							echo '<div div class="alert alert-danger text-center justify-content-center" role="alert">El usuario está inactivo, por lo que no se puede realizar
							la recuperación de contraseña</div>';
						break;
						case 'Correo enviado':
							echo "<script>
              setTimeout(function(){location.href='".SERVERURL."verifica-codigo/'} , 2500); </script>";
							echo '<style>
              .recuperacion-form .form-login{
                width: 25rem;
                height: 20rem;
              }
              </style>

              <div class="alert alert-success text-center">Se envió un código de seguridad a la 
							dirección de correo del usuario ingresado.</div>';
						break;
					 	}
				 	}
			 	?>
          <input class="controls" type="text" name="txtcorreo" placeholder="Ingrese su correo" required>
          <input class="buttons"  type="submit" name="acceder" value="ENVIAR">
        </section>
    </form>
</div>
