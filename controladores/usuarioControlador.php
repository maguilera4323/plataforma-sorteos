<?php

if($peticionAjax){
	require_once "../modelos/usuarioModelo.php";
}else{
	require_once "./modelos/usuarioModelo.php";
}


class usuarioControlador extends usuarioModelo{

	
	public function agregarEmpleado(){
		//datos para la tabla de Usuarios
		$usuario=ConexionBD::limpiar_cadena(strtoupper($_POST['user_empleado_nuevo']));
		$persona=ConexionBD::limpiar_cadena($_POST['idPersona']);
		$estado=1;
		$contrasena=ConexionBD::limpiar_cadena($_POST['contrasena_nuevo']);
		$conf_contrasena=ConexionBD::limpiar_cadena($_POST['conf_contrasena_nuevo']);
		$correo=ConexionBD::limpiar_cadena($_POST['correo_electronico_nuevo']);
		$rol=ConexionBD::limpiar_cadena($_POST['rol_nuevo']);
		$creado_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$creacion=date('y-m-d H:i:s');
		
		$clave=ConexionBD::EncriptaClave($contrasena);

		//datos para la tabla de Personas
		$nombres=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_nuevo']));
		$apellidos=ConexionBD::limpiar_cadena(strtoupper($_POST['apellido_nuevo']));
		$dni=ConexionBD::limpiar_cadena($_POST['dni_nuevo']);
		$telefono=ConexionBD::limpiar_cadena($_POST['telefono_nuevo']);
		$sexo=ConexionBD::limpiar_cadena($_POST['sexo_nuevo']);
		$contrasena=ConexionBD::limpiar_cadena($_POST['contrasena_nuevo']);
		$direccion=ConexionBD::limpiar_cadena($_POST['direccion_nuevo']);

		
		/* //validaciones de datos */
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,50}",$nombres)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombres solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,50}",$apellidos)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Apellidos solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}


		if(ConexionBD::verificar_datos("[A-Z]{1,30}",$usuario)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Usuario solo acepta letras, sin espacios ni carácteres especiales",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[0-9]{1,20}",$dni)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo DNI solo acepta números",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[0-9]{1,15}",$telefono)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Teléfono solo acepta números",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚa-záéíóúÑñ0-9 .,]{1,300}",$direccion)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Dirección no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		$revisarUsuario=ConexionBD::consultaComprobacion("SELECT usuario FROM usuarios WHERE usuario='$usuario'");
			if($revisarUsuario->rowCount()>0){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El usuario ingresado ya se encuentra registrado en el sistema",
					"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
			}
		
		$revisarUsuario=ConexionBD::consultaComprobacion("SELECT correo_electronico FROM usuarios WHERE 
		correo_electronico='$correo'");
		if($revisarUsuario->rowCount()>0){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El correo electrónico ingresado ya se encuentra registrado en el sistema",
					"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
			}

		if(ConexionBD::verificar_datos("[a-zA-Z0-9$@.-]{5,10}",$contrasena) ){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"La contraseña no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		} 

		if($contrasena!=$conf_contrasena){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"Las contraseñas no coinciden. Ingreselas nuevamente.",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		} 
		
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_empleado_reg=[
				"usuario"=>$usuario,
				"persona"=>$persona,
				"est"=>$estado,
				"cont"=>$clave,
				"correo"=>$correo,
				"rol"=>$rol,
				"fecha_creacion"=>$creacion,
				"creado_por"=>$creado_por
			];

			$datos_persona_reg=[
				"nombres"=>$nombres,
				"apellidos"=>$apellidos,
				"dni"=>$dni,
				"telefono"=>$telefono,
				"sexo"=>$sexo,
				"direccion"=>$direccion,
				"fecha_creacion"=>$creacion,
				"creado_por"=>$creado_por
			];

			$agregar_persona=usuarioModelo::agregarPersonaModelo($datos_persona_reg);
			$agregar_usuario=usuarioModelo::agregarUsuarioModelo($datos_empleado_reg);

			if(($agregar_usuario->rowCount()==1) && ($agregar_persona->rowCount()==1) ){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Empleado Registrado",
					"Texto"=>"Los datos del empleado han sido registrados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha ocurrido un problema al momento de guardar el nuevo empleado",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 


	public function actualizarEmpleado(){	
		//datos para la tabla de Usuarios
		$usuario=ConexionBD::limpiar_cadena(strtoupper($_POST['user_empleado_act']));
		$estado=ConexionBD::limpiar_cadena($_POST['estado_act']);
		$correo=ConexionBD::limpiar_cadena($_POST['correo_electronico_act']);
		$rol=ConexionBD::limpiar_cadena($_POST['rol_act']);
		$modif_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$modificacion=date('y-m-d H:i:s');

		//datos para la tabla de Personas
		$nombres=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_act']));
		$apellidos=ConexionBD::limpiar_cadena(strtoupper($_POST['apellido_act']));
		$dni=ConexionBD::limpiar_cadena($_POST['dni_act']);
		$telefono=ConexionBD::limpiar_cadena($_POST['telefono_act']);
		$sexo=ConexionBD::limpiar_cadena($_POST['sexo_act']);
		$direccion=ConexionBD::limpiar_cadena($_POST['direccion_act']);

		$id_actualizacion=ConexionBD::limpiar_cadena($_POST['empleado_id']);
		
		/* //validaciones de datos */
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,50}",$nombres)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombres solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,50}",$apellidos)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Apellidos solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}


		if(ConexionBD::verificar_datos("[A-Z]{1,30}",$usuario)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Usuario solo acepta letras, sin espacios ni carácteres especiales",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[0-9]{1,20}",$dni)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo DNI solo acepta números",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[0-9]{1,15}",$telefono)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Teléfono solo acepta números",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚa-záéíóúÑñ0-9 .,]{1,300}",$direccion)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Dirección no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

			
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_empleado_act=[
				"usuario"=>$usuario,
				"est"=>$estado,
				"correo"=>$correo,
				"rol"=>$rol,
				"fecha_modif"=>$modificacion,
				"modif_por"=>$modif_por
			];

			$datos_persona_act=[
				"nombres"=>$nombres,
				"apellidos"=>$apellidos,
				"dni"=>$dni,
				"telefono"=>$telefono,
				"sexo"=>$sexo,
				"direccion"=>$direccion,
				"fecha_modif"=>$modificacion,
				"modif_por"=>$modif_por
			];

			$actualizar_persona=usuarioModelo::actualizarPersonaModelo($datos_persona_act,$id_actualizacion);
			$actualizar_usuario=usuarioModelo::actualizarUsuarioModelo($datos_empleado_act,$id_actualizacion);

			if(($actualizar_persona->rowCount()==1) && ($actualizar_usuario->rowCount()==1)){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Empleado Actualizado",
					"Texto"=>"Los datos del empleado han sido actualizados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha ocurrido un problema al momento de actualizar la información del empleado",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function eliminarEmpleado(){
			$id=ConexionBD::limpiar_cadena(($_POST['id_empleado_del']));
			$array=array();
			$valor=4;
		
		$eliminarEmpleado=usuarioModelo::eliminarEmpleadoModelo($valor,$id);
			if($eliminarEmpleado->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Empleado Eliminado",
					"Texto"=>"El empleado seleccionado fue inactivado permanentemente
					y ya no cuenta con acceso al sistema",
					"Tipo"=>"success"
				];

				echo json_encode($alerta);

			
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ha ocurrido un error",
					"Texto"=>"Ha ocurrido un problema al momento de eliminar el empleado seleccionado",
					"Tipo"=>"error"
				];echo json_encode($alerta);
			}
			
			exit();

			
	}


	public function actualizarPerfil(){	
		$usuario=ConexionBD::limpiar_cadena(strtoupper($_POST['usuario_perfil_act']));
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_usuario_act']));
		$correo=ConexionBD::limpiar_cadena($_POST['correo_electronico_act']);
		$contrasena=ConexionBD::limpiar_cadena($_POST['contrasena_act']);
		$modif_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$modificacion=date('y-m-d H:i:s');
		$id_actualizacion=ConexionBD::limpiar_cadena($_POST['usuario_id']);
		$clave=ConexionBD::EncriptaClave($contrasena);


		//validacion para comprobar si se guardó una imagen nueva
		if(isset($_FILES['imagen_act']['name'])){
			$nombre_img=($_FILES['imagen_act']['name']);//ADQUIERE LA IMAGEN
			$temporal=$_FILES['imagen_act']['tmp_name'];
			$carpeta='../vistas/assets/usuarios';
			$ruta=$carpeta.'/'.$nombre_img;
			move_uploaded_file($temporal,$carpeta.'/'. $nombre_img);
		}else{
			$ruta='';
		}
		

		//validaciones de datos
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,30}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombre solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[A-Z]{1,30}",$usuario)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Usuario solo acepta letras, sin espacios ni carácteres especiales",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}	

		if(ConexionBD::verificar_datos("[a-zA-Z0-9$@.-]{5,10}",$contrasena) ){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"La contraseña no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		} 
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			
			$datos_perfil_act=[
				"usuario"=>$usuario,
				"nom"=>$nombre,
				"correo"=>$correo,
				"clave"=>$clave,
				"imagen"=>$ruta,
				"fecha_modif"=>$modificacion,
				"modif_por"=>$modif_por
			];

			$actualizar_perfil=usuarioModelo::actualizar_perfil_modelo($datos_perfil_act,$id_actualizacion);

			if($actualizar_perfil->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Perfil de Usuario Actualizado",
					"Texto"=>"Los datos del usuario han sido actualizados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido actualizar los datos del usuario",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 
	
}