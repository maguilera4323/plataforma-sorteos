<?php
	$peticionAjax=true;
	require_once "../config/app.php";

	if(isset($_POST['nombre_nuevo']) || isset($_POST['empleado_act']) || isset($_POST['id_empleado_del'])|| isset($_POST['usuario_perfil_act']))
	{
		/*--------- Instancia al controlador ---------*/
		require_once "../controladores/empleadoControlador.php";
		$ins_empleado = new empleadoControlador();


		/*--------- Agregar un empleado ---------*/
		if(isset($_POST['nombre_nuevo'])){
			echo $ins_empleado->agregarUsuario();
			die();
		}
		
		/*--------- Editar un empleado ---------*/
		if(isset($_POST['empleado_act'])){
			echo $ins_empleado->actualizarEmpleado();
			die();
		}
		
		/*--------- Eliminar un empleado ---------*/
		if(isset($_POST['id_empleado_del']) ){
			echo $ins_empleado->eliminarEmpleado();
			die();
		}

		/*--------- Actualizar informacion de perfil ---------*/
		if(isset($_POST['usuario_perfil_act']) ){
			echo $ins_usuario->actualizarPerfil();
			die();
		}
	}
