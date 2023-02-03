<?php

if($peticionAjax){
	require_once "../modelos/sorteoModelo.php";
}else{
	require_once "./modelos/sorteoModelo.php";
}


class sorteoControlador extends sorteoModelo{

	
	public function agregarSorteo(){
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_nuevo']));
		$rango_inicial=ConexionBD::limpiar_cadena($_POST['rango_inicial_nuevo']);
		$rango_final=ConexionBD::limpiar_cadena($_POST['rango_final_nuevo']);
		$estado=2;

		
		/* //validaciones de datos */
		if(ConexionBD::verificar_datos("[0-9A-ZÁÉÍÓÚÑ ]{1,100}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombre solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}


		if(ConexionBD::verificar_datos("[0-9]{1,10}",$rango_inicial)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Rango Inicial solo acepta números",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[0-9]{1,10}",$rango_final)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Rango Final solo acepta números",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		$revisarSorteo=ConexionBD::consultaComprobacion("SELECT nombre_sorteo FROM sorteos WHERE nombre_sorteo='$nombre'");
			if($revisarSorteo->rowCount()>0){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El sorteo ingresado ya se encuentra registrado en el sistema",
					"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
			}
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_sorteo_reg=[
				"nombre"=>$nombre,
				"rango_i"=>$rango_inicial,
				"rango_f"=>$rango_final,
				"estado"=>$estado
			];

			$agregar_sorteo=sorteoModelo::agregarSorteoModelo($datos_sorteo_reg);

			if($agregar_sorteo->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Sorteo Registrado",
					"Texto"=>"Los datos del sorteo han sido registrados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha ocurrido un problema al momento de guardar el nuevo sorteo",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function actualizarSorteo(){	
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_act']));
		$rango_inicial=ConexionBD::limpiar_cadena($_POST['rango_inicial_act']);
		$rango_final=ConexionBD::limpiar_cadena($_POST['rango_final_act']);
		$estado=ConexionBD::limpiar_cadena($_POST['estado_act']);
		$id_actualizacion=ConexionBD::limpiar_cadena($_POST['sorteo_id']);

		
		/* //validaciones de datos */
		if(ConexionBD::verificar_datos("[0-9A-ZÁÉÍÓÚÑ ]{1,100}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombre solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}


		if(ConexionBD::verificar_datos("[0-9]{1,10}",$rango_inicial)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Rango Inicial solo acepta números",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[0-9]{1,10}",$rango_final)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Rango Final solo acepta números",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_sorteo_act=[
				"nombre"=>$nombre,
				"rango_i"=>$rango_inicial,
				"rango_f"=>$rango_final,
				"estado"=>$estado
			];

			$actualizar_sorteo=sorteoModelo::actualizarSorteoModelo($datos_sorteo_act,$id_actualizacion);

			if($actualizar_sorteo->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Sorteo Actualizado",
					"Texto"=>"Los datos del sorteo han sido actualizados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha ocurrido un problema al momento de actualizar la información del sorteo",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function eliminarSorteo(){
			$id=ConexionBD::limpiar_cadena(($_POST['id_sorteo_del']));
		
		$eliminarSorteo=sorteoModelo::eliminarSorteoModelo($id);
			if($eliminarSorteo->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Sorteo Eliminado",
					"Texto"=>"El sorteo seleccionado fue eliminado",
					"Tipo"=>"success"
				];

				echo json_encode($alerta);

			
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ha ocurrido un error",
					"Texto"=>"Ha ocurrido un problema al momento de eliminar el sorteo seleccionado",
					"Tipo"=>"error"
				];echo json_encode($alerta);
			}
			
			exit();

			
	}

}

