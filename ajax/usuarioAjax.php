<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['usuario_nuevo']) || isset($_POST['nombre_insumo_act']) || isset($_POST['id_insumo_del']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/usuarioControlador.php";
		$ins_usuario = new usuarioControlador();


		/*--------- Agregar un usuario ---------*/
		if(isset($_POST['usuario_nuevo'])){
			echo $ins_usuario->agregarUsuario();
			die();
		}
		
		/*--------- Editar un proveedor ---------*/
		if(isset($_POST['nombre_insumo_act']) ){
			echo $ins_insumo->actualizarInsumo();
			die();
		}
		
		/*--------- Eliminar un insumo ---------*/
		if(isset($_POST['id_insumo_del']) ){
			echo $ins_insumo->eliminarInsumo();
			die();
		}
	}

	