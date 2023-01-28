<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['empresa_nuevo']) || isset($_POST['empresa_act']) || isset($_POST['id_sorteo_del']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/sorteoControlador.php";
		$ins_sorteo = new sorteoControlador();


		if(isset($_POST['empresa_nuevo'])){
			echo $ins_sorteo->agregarSorteo();
			die();
		}
		

		if(isset($_POST['empresa_act'])){
			echo $ins_sorteo->actualizarSorteo();
			die();
		}
		

		if(isset($_POST['id_sorteo_del']) ){
			echo $ins_sorteo->eliminarSorteo();
			die();
		}

	}
