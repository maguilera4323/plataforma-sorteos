<?php

if($peticionAjax){
	require_once "../modelos/usuarioModelo.php";
}else{
	require_once "./modelos/usuarioModelo.php";
}


class usuarioControlador extends usuarioModelo{

	
	public function agregarUsuario(){
		$usuario=ConexionBD::limpiar_cadena(strtoupper($_POST['usuario_nuevo']));
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_usuario_nuevo']));
		$estado=1;
		$contrasena=ConexionBD::limpiar_cadena($_POST['contrasena_nuevo']);
		$conf_contrasena=ConexionBD::limpiar_cadena($_POST['conf_contrasena_nuevo']);
		$correo=ConexionBD::limpiar_cadena($_POST['correo_electronico_nuevo']);
		$rol=ConexionBD::limpiar_cadena($_POST['rol_nuevo']);
		$creado_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$creacion=date('y-m-d H:i:s');


		$nombre_img=($_FILES['imagen_nuevo']['name']);//ADQUIERE LA IMAGEN
		$temporal=$_FILES['imagen_nuevo']['tmp_name'];
		$carpeta='../vistas/assets/usuarios';
		$ruta=$carpeta.'/'.$nombre_img;
		move_uploaded_file($temporal,$carpeta.'/'. $nombre_img);

		$clave=ConexionBD::EncriptaClave($contrasena);

		
		//validaciones de datos
		/* if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,30}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El nombre no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[0-9]{1,14}",$cantidad_max)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"Este campo no admite letras o caracteres especiales",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[0-9]{1,14}",$cantidad_min)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"Este campo no admite letras o caracteres especiales",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}
		
		if($cantidad_max<$cantidad_min){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"La cantidad máxima no puede ser menor que la cantidad minina",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		} */
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_usuario_reg=[
				"usuario"=>$usuario,
				"nom"=>$nombre,
				"est"=>$estado,
				"cont"=>$clave,
				"correo"=>$correo,
				"rol"=>$rol,
				"imagen"=>$ruta,
				"fecha_creacion"=>$creacion,
				"creado_por"=>$creado_por
			];

			$agregar_usuario=usuarioModelo::agregar_usuario_modelo($datos_usuario_reg);

			if($agregar_usuario->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Usuario Registrado",
					"Texto"=>"Los datos del usuario han sido registrados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido registrar el usuario",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function actualizarInsumo(){	
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_insumo_act']));
		$categoria=ConexionBD::limpiar_cadena($_POST['categoria_insumo_act']);
		$cantidad_max=ConexionBD::limpiar_cadena($_POST['cant_max_act']);
		$cantidad_min=ConexionBD::limpiar_cadena($_POST['cant_min_act']);
		$unidad_medida=ConexionBD::limpiar_cadena($_POST['unidad_insumo_act']);
		$id_actualizar=ConexionBD::limpiar_cadena($_POST['id_actualizacion']);

			//validaciones de datos ingresados
			if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,30}",$nombre)){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El nombre no coincide con el formato solicitado",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}
	
			if(ConexionBD::verificar_datos("[0-9]{1,14}",$cantidad_max)){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Este campo no admite letras o caracteres especiales",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}
	
			if(ConexionBD::verificar_datos("[0-9]{1,14}",$cantidad_min)){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Este campo no admite letras o caracteres especiales",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}
			
			if($cantidad_max<$cantidad_min){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"La cantidad máxima no puede ser menor que la cantidad minina",
					"Tipo"=>"error"
				];
				echo json_encode($alerta);
				exit();
			}
		
	
			//arreglo enviado al modelo
		$datos_insumo_actu=
			[
				"nombre"=>$nombre,
				"cat"=>$categoria,
				"cant_max"=>$cantidad_max,
				"cant_min"=>$cantidad_min,
				"unid"=>$unidad_medida
			];

			$actualizar_insumo=insumoModelo::actualizar_insumo_modelo($datos_insumo_actu,$id_actualizar);

			if($actualizar_insumo->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Insumo Actualizado",
					"Texto"=>"Insumo Actualizado exitosamente",
					"Tipo"=>"success"
				];
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido actualizar el insumo",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);	
	} 



	public function eliminarInsumo(){
			$id=ConexionBD::limpiar_cadena(($_POST['id_insumo_del']));
			$array=array();
			$valor='';
		
		$eliminarInsumo=insumoModelo::eliminar_insumo_modelo($id);
			if($eliminarInsumo->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Insumo Eliminado",
					"Texto"=>"El insumo fue eliminado del sistema",
					"Tipo"=>"success"
				];

				echo json_encode($alerta);

			
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ha ocurrido un error",
					"Texto"=>"El insumo no puede ser borrado",
					"Tipo"=>"error"
				];echo json_encode($alerta);
			}
			
			exit();

			
	}
	
}