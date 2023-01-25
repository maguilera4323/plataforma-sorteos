<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['modulo_nuevo']) || isset($_POST['modulo_act']) || isset($_POST['id_mod_del']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/moduloControlador.php";
		$ins_modulo = new moduloControlador();


		if(isset($_POST['modulo_nuevo'])){
			echo $ins_modulo->agregarModulo();
			die();
		}
		

		if(isset($_POST['modulo_act'])){
			echo $ins_modulo->actualizarModulo();
			die();
		}
		

		if(isset($_POST['id_mod_del']) ){
			echo $ins_modulo->eliminarModulo();
			die();
		}

	}
