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
		<img src="<?php echo SERVERURL?>vistas/assets/img/komi-removebg-preview.png">
		<br>
		<h3 class="text-center">"Komi-san se pregunta quien es la persona que entró a la página..."</h3>
		<br>
		<a href="<?php echo SERVERURL?>salir/">
		<button class="btn btn-danger">Cerrar Sesión</button></a>
	</div>
</div>

