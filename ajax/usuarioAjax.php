<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['nombre_nuevo']) || isset($_POST['user_empleado_act']) || isset($_POST['id_empleado_del'])|| isset($_POST['usuario_perfil_act']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/usuarioControlador.php";
		$ins_usuario = new usuarioControlador();


		/*--------- Agregar un empleado ---------*/
		if(isset($_POST['nombre_nuevo'])){
			echo $ins_usuario->agregarEmpleado();
			die();
		}
		
		/*--------- Editar un empleado ---------*/
		if(isset($_POST['user_empleado_act'])){
			echo $ins_usuario->actualizarEmpleado();
			die();
		}
		
		/*--------- Eliminar un empleado ---------*/
		if(isset($_POST['id_empleado_del']) ){
			echo $ins_usuario->eliminarEmpleado();
			die();
		}

		/*--------- Actualizar informacion de perfil ---------*/
		if(isset($_POST['usuario_perfil_act']) ){
			echo $ins_usuario->actualizarPerfil();
			die();
		}
	}
