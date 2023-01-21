<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['nombre_nuevo']) || isset($_POST['nombre_act']) || isset($_POST['id_empresa_del']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/empresaControlador.php";
		$ins_empresa = new empresaControlador();


		if(isset($_POST['nombre_nuevo'])){
			echo $ins_empresa->agregarEmpresa();
			die();
		}
		

		if(isset($_POST['nombre_act'])){
			echo $ins_empresa->actualizarEmpresa();
			die();
		}
		

		if(isset($_POST['id_empresa_del']) ){
			echo $ins_empresa->eliminarEmpresa();
			die();
		}

	}
