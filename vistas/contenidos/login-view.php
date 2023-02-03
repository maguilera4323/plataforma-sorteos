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

		
<style>
body{
	background: yellow;
	background: linear-gradient(to right, #ffa751,#ffe259 );
}


.bg{
   
	background-image: url(../vistas/assets/img/Fondo.png);
	background-position: center center;
}

.btn-primary{
    width: 100%;
    height: 40px;
    background-color: #017bab;
    border: none;
    color: white;
    margin-bottom: 16px;
    cursor: pointer;
    border-radius: 10px;
    transition: background-color 1s;
  
  }

  .btn-primary:hover{
    background-color:  #ffa751;
  }

  .my-3 a{
	text-decoration:none;
	color:rgba(11, 21, 24, 0.8);
  }

  .my-3 a:hover{
	color:rgba(45, 79, 235, 0.8);
  }
</style>



<div class="container w-75 bg-primary mt-5 rounder">
	<div class="row aling-items-stretch">

		<div class="col bg dn-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounder">
			

		</div>

		<div class="col bg-white p-5 rounder-end">
			<div class="text-end">
				<img src="/Pagos/descarga.png" width="48" alt="">
			</div>


			<h2 class="fw-bold text-center pt-5 mb-5">Bienvenido</h2>
			<?php
				 if(isset($_SESSION['respuesta'])){
					switch($_SESSION['respuesta']){
						case 'Contraseña incorrecta':
							echo '<div div class="alert alert-danger text-center" role="alert">Usuario y/o contraseña inválidos</div>';
							$_SESSION['contador_intentos']+=0.5;
						break;
						case 'Usuario inactivo':
							echo '<div class="alert alert-warning text-center" style="font-size: 20px;">El usuario está inactivo. Comuniquese con el 
							administrador del sistema</div>';
						break;
						case 'Usuario bloqueado':
							echo '<div class="alert alert-dark text-center" style="font-size: 20px;">El usuario está bloqueado. Comuniquese con el 
							administrador del sistema</div>';
							$_SESSION['contador_intentos']=0;
						break;
						case 'Datos incorrectos':
							echo '<div class="alert alert-danger text-center" style="font-size: 20px;">Usuario y/o contraseña inválidos</div>';
							$_SESSION['contador_intentos']=0;
						break;
						case 'Usuario sin permisos':
							echo '<div class="alert alert-dark text-center" style="font-size: 20px;">El usuario no tiene los permisos para iniciar 
							sesión. Comuniquese con el administrador del sistema</div>';
							$_SESSION['contador_intentos']=0;
						break;
					 }
				 }
			 ?>

			<Form  method="POST">


			<!-- CUADRO DE USUARIO  -->

				<div class="mb-4">
					<label for="text" class="form-label">Usuario</label>
					<input type="text" class="form-control" name="txtusuario" placeholder="Ingrese su usuario" required>                 

				</div>

				<!-- CUADRO DE CONTRASEÑA  -->

				<div class="mb-4">

					<label for="password" class="form-label">Contraseña</label>
					<input type="password" class="form-control" name="txtcontrasena" placeholder="Ingrese su contraseña" required>
				</div>

				<!-- BOTON DE INICIAR SESION -->

				<div class="d-grid">
					<button type="submit" name="acceder" class="btn btn-primary">Iniciar sesion</button>
				</div>

				<!--RECUPERAR CONTRASEÑA / CREAR CUENTA -->
				<div class="my-3">
					<span>No tienes cuenta? <a href="<?php echo SERVERURL?>registro/">Registrate</a></span> <br>
					<span><a href="<?php echo SERVERURL?>recuperacion-clave/">Recuperar contraseña</a></span>

				</div>

			</Form>


		</div>

	</div>
</div>