<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php echo COMPANY; ?></title>
	<?php include "./vistas/inc/archivos_css.php"; ?>
	<script src="https://www.paypal.com/sdk/js?client-id=AY8ZdCX_D1xBvYT5-ThAjwKHC26ECXTReASlTO98lkYJCy5CscrlwE3bXKwS1VR_L1XtYopUOQVT3Pfm&currency=USD"></script>
</head>
<body>
	<?php
		$peticionAjax=false;
		require_once "./controladores/vistasControlador.php";
		$IV = new vistasControlador();

		$vistas=$IV->obtener_vistas_controlador();

		if($vistas=="inicio" || $vistas=="login" || $vistas=="404" || $vistas=="recuperacion-clave" || $vistas=="registro"
		|| $vistas=="verifica-codigo" || $vistas=="cambio-contrasena"){
			require_once "./vistas/contenidos/".$vistas."-view.php";

		}else{
			session_start();
			$pagina=explode("/", $_GET['views']);
			require_once './controladores/loginControlador.php';
			$lc= new loginUsuarios();
			
			if(!isset($_SESSION['usuario_login']) || !isset($_SESSION['token_login']) || !isset($_SESSION['id_login'])
			|| !isset($_SESSION['estado']) || !isset($_SESSION['rol']) || !isset($_SESSION['id_rol'])){
				echo $lc->forzarCierreSesionControlador();
				exit;
			}
	?>
	<!-- Main container -->
	<main class="full-box main-container">
		<!-- Nav lateral -->
		<?php 
		//si el usuario conectado no tiene el rol de participante
		//se manda a llamar el menu de navlateral presente en la parte administrativa de la plataforma
		if($_SESSION['rol']!='PARTICIPANTE'){
			include "./vistas/inc/NavLateral.php";
		}
		 ?>
		
		<!-- Page content -->
		<section class="full-box page-content">
			<?php
			//validacion para verificar que navbar se debe mostrar segun el rol del usuario conectado
			if($_SESSION['rol']!='PARTICIPANTE'){
				include "./vistas/inc/NavbarAdm.php"; 
				include  $vistas;
			}else{
				include "./vistas/inc/Navbar.php"; 
				include  $vistas;
			}
				
			?>
		</section>
	</main>
	<?php
		}
		include "./vistas/inc/Script.php";
	?>
</body>
</html>