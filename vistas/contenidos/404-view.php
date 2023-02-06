<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

?>

<div class="full-box container-404">
	<div class="error-404">
		<br>
		<h1 class="text-center">ERROR 404</h1>
		<p class="text-center">Página no encontrada</p>
	<!-- 	<img src="<?php echo SERVERURL?>vistas/assets/img/komi-removebg-preview.png">
		<br>
		<h3 class="text-center">"Komi-san se pregunta por qué la página que seleccionó no existe..."</h3>
		<br> -->
		<br>
		<?php
		if($_SESSION['rol']=='PARTICIPANTE'){
		?>
		<a href="<?php echo SERVERURL?>home/">
		<button class="btn btn-light">Regresar a la página principal</button></a>

		<?php
		}else{
		?>
		<a href="<?php echo SERVERURL?>dashboard/">
		<button class="btn btn-light">Regresar a la página principal</button></a>
		<?php
		}
		?>
	</div>
</div>