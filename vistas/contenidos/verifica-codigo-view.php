<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

  //llamado al controlador de login
  require_once 'controladores/emailControlador.php';
  $enviarCodigo = new Correo(); //se crea nueva instancia de usuario

//valdacion para ver si se recibieron datos de ingreso
  if (isset($_POST['acceder'])) {
  $codigo =  $_POST['txtcodigo'];
      $respuesta = $enviarCodigo->verificaCodigoToken($codigo); //se envian los datos a la funcion accesoUsuario de modelo Login
  }
	?>

<style>
    body{
  background: yellow;
  background: linear-gradient(to right, #ffa751,#ffe259 );

  }

</style>
  
  <div class="codigo-form">
    <form method="POST" action="">
        <section class="form-login">
          <h5>RECUPERACION DE CONTRASEÑA</h5>

        <?php
				if(isset($_SESSION['respuesta'])){
					switch($_SESSION['respuesta']){
						case 'codigo valido':
              echo "<script>
              setTimeout(function(){location.href='".SERVERURL."cambio-contrasena/'} , 2500); </script>";
							echo '<style>
              .codigo-form .form-login{
                width: 25rem;
                height: 23rem;
              }
              </style>

              <div class="alert alert-success text-center">Código correcto. Será redireccionado en unos segundos...</div>';
						break;
						case 'codigo invalido':
							echo '<style>
              .codigo-form .form-login{
                width: 25rem;
                height: 23rem;
              }
              </style>

              <div class="alert alert-danger text-center">El código ingresado es incorrecto.</div>';
						break;
						case 'token vencido':
							echo '<style>
              .codigo-form .form-login{
                width: 25rem;
                height: 23rem;
              }
              </style>

              <div class="alert alert-danger text-center">El código ya está vencido. Realice el proceso nuevamente.</div>';
						break;
					 	}
				 	}
			 		?>
          
          <p><b>Ingrese el código enviado para realizar la verificación correspondiente</p></b>
          <input class="controls text-center" style="font-size:1rem;"type="number" name="txtcodigo" placeholder="Ingrese codigo" required>
          <input class="buttons"  type="submit" name="acceder" value="ENVIAR">
        </section>
    </form>
</div>
