<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['rol_nuevo']) || isset($_POST['rol_act']) || isset($_POST['id_rol_del']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/rolControlador.php";
		$ins_rol = new rolControlador();


		if(isset($_POST['rol_nuevo'])){
			echo $ins_rol->agregarRol();
			die();
		}
		

		if(isset($_POST['rol_act'])){
			echo $ins_rol->actualizarRol();
			die();
		}
		

		if(isset($_POST['id_rol_del']) ){
			echo $ins_rol->eliminarRol();
			die();
		}

	}
