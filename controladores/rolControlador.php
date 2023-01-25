<?php

if($peticionAjax){
	require_once "../modelos/rolModelo.php";
}else{
	require_once "./modelos/rolModelo.php";
}


class rolControlador extends rolModelo{

	
	public function agregarRol(){
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['rol_nuevo']));
		$descripcion=ConexionBD::limpiar_cadena($_POST['desc_nuevo']);
		$creado_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$creacion=date('y-m-d H:i:s');

		
		/* //validaciones de datos */
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,50}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombre solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}


		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚa-záéíóúnÑ .,]{1,200}",$descripcion)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"Ingresó carácteres no válidos en el campo Descripción",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		$revisarRol=ConexionBD::consultaComprobacion("SELECT rol FROM roles WHERE rol='$nombre'");
			if($revisarRol->rowCount()>0){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El rol ingresado ya se encuentra registrado en el sistema",
					"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
			}
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_rol_reg=[
				"nom"=>$nombre,
				"desc"=>$descripcion,
				"fecha_creacion"=>$creacion,
				"creado_por"=>$creado_por
			];

			$agregar_rol=rolModelo::agregarRolModelo($datos_rol_reg);

			if($agregar_rol->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Rol Registrado",
					"Texto"=>"Los datos del rol han sido registrados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha ocurrido un problema al momento de guardar el nuevo rol",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function actualizarRol(){	
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['rol_act']));
		$descripcion=ConexionBD::limpiar_cadena($_POST['desc_act']);
		$modif_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$modificacion=date('y-m-d H:i:s');
		$id_actualizacion=ConexionBD::limpiar_cadena($_POST['rol_id']);

		/* //validaciones de datos */
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,50}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombre solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}


		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚa-záéíóúnÑ .,]{1,200}",$descripcion)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"Ingresó carácteres no válidos en el campo Descripción",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_rol_act=[
				"nom"=>$nombre,
				"desc"=>$descripcion,
				"fecha_modif"=>$modificacion,
				"modif_por"=>$modif_por
			];

			$actualizar_rol=rolModelo::actualizarRolModelo($datos_rol_act,$id_actualizacion);

			if($actualizar_rol->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Rol Actualizado",
					"Texto"=>"Los datos del rol han sido actualizados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha ocurrido un problema al momento de actualizar la información del rol",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function eliminarRol(){
			$id=ConexionBD::limpiar_cadena(($_POST['id_rol_del']));
			$array=array();
			$valor='';
		
		$eliminarRol=rolModelo::eliminarRolModelo($id);
			if($eliminarRol->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Rol Eliminado",
					"Texto"=>"El rol seleccionado fue eliminado",
					"Tipo"=>"success"
				];

				echo json_encode($alerta);

			
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ha ocurrido un error",
					"Texto"=>"Ha ocurrido un problema al momento de eliminar el rol seleccionado",
					"Tipo"=>"error"
				];echo json_encode($alerta);
			}
			
			exit();

			
	}

}

