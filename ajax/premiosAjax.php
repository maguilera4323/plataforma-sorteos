<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['sorteo_nuevo']) || isset($_POST['sorteo_act']) || isset($_POST['id_premio_del']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/premioControlador.php";
		$ins_premio = new premioControlador();


		if(isset($_POST['sorteo_nuevo'])){
			echo $ins_premio->agregarPremio();
			die();
		}
		

		if(isset($_POST['sorteo_act'])){
			echo $ins_premio->actualizarPremio();
			die();
		}
		

		if(isset($_POST['id_premio_del']) ){
			echo $ins_premio->eliminarPremio();
			die();
		}

	}
