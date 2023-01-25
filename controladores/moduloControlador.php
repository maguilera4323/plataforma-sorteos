<?php

if($peticionAjax){
	require_once "../modelos/moduloModelo.php";
}else{
	require_once "./modelos/moduloModelo.php";
}


class moduloControlador extends moduloModelo{

	
	public function agregarModulo(){
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['modulo_nuevo']));
		$descripcion=ConexionBD::limpiar_cadena($_POST['desc_nuevo']);
		$tipo=ConexionBD::limpiar_cadena($_POST['tipo_modulo_nuevo']);
		$creado_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$creacion=date('y-m-d H:i:s');

		
		/* //validaciones de datos */
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,100}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombre solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}


		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚa-záéíóúnÑ .,]{1,100}",$descripcion)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"Ingresó carácteres no válidos en el campo Descripción",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		$revisarMod=ConexionBD::consultaComprobacion("SELECT modulo FROM modulos WHERE modulo='$nombre'");
			if($revisarMod->rowCount()>0){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El modulo ingresado ya se encuentra registrado en el sistema",
					"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
			}
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_mod_reg=[
				"nom"=>$nombre,
				"desc"=>$descripcion,
				"tipo"=>$tipo,
				"fecha_creacion"=>$creacion,
				"creado_por"=>$creado_por
			];

			$agregar_mod=moduloModelo::agregarModuloModelo($datos_mod_reg);

			if($agregar_mod->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Módulo Registrado",
					"Texto"=>"Los datos del módulo han sido registrados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha ocurrido un problema al momento de guardar el nuevo módulo",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function actualizarModulo(){	
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['modulo_act']));
		$descripcion=ConexionBD::limpiar_cadena($_POST['desc_act']);
		$tipo=ConexionBD::limpiar_cadena($_POST['tipo_modulo_act']);
		$modif_por=ConexionBD::limpiar_cadena($_POST['usuario_login']);
		$modificacion=date('y-m-d H:i:s');
		$id_actualizacion=ConexionBD::limpiar_cadena($_POST['modulo_id']);

		/* //validaciones de datos */
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,100}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombre solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}


		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚa-záéíóúnÑ .,]{1,100}",$descripcion)){
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
			$datos_mod_act=[
				"nom"=>$nombre,
				"desc"=>$descripcion,
				"tipo"=>$tipo,
				"fecha_modif"=>$modificacion,
				"modif_por"=>$modif_por
			];

			$actualizar_mod=moduloModelo::actualizarModuloModelo($datos_mod_act,$id_actualizacion);

			if($actualizar_mod->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Módulo Actualizado",
					"Texto"=>"Los datos del módulo han sido actualizados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha ocurrido un problema al momento de actualizar la información del módulo",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function eliminarModulo(){
			$id=ConexionBD::limpiar_cadena(($_POST['id_mod_del']));
			$array=array();
			$valor='';
		
		$eliminarMod=moduloModelo::eliminarModuloModelo($id);
			if($eliminarMod->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Módulo Eliminado",
					"Texto"=>"El módulo seleccionado fue eliminado",
					"Tipo"=>"success"
				];

				echo json_encode($alerta);

			
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ha ocurrido un error",
					"Texto"=>"Ha ocurrido un problema al momento de eliminar el módulo seleccionado",
					"Tipo"=>"error"
				];echo json_encode($alerta);
			}
			
			exit();

			
	}

}

