<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['modulo_nuevo']) || isset($_POST['modulo_id']) || isset($_POST['id_mod_del']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/permisoControlador.php";
		$ins_permiso = new permisoControlador();


		if(isset($_POST['modulo_nuevo'])){
			echo $ins_permiso->agregarPermiso();
			die();
		}
		

		if(isset($_POST['modulo_id'])){
			echo $ins_permiso->actualizarPermiso();
			die();
		}
		

		if(isset($_POST['id_mod_del']) ){
			echo $ins_permiso->eliminarPermiso();
			die();
		}

	}
