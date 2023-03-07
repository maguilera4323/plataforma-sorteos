<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if($peticionAjax){
	require_once "../modelos/boletoModelo.php";
}else{
	require_once "./modelos/boletoModelo.php";
}


class boletoControlador extends boletoModelo{

	
	public function agregarBoleto(){
		$usuario=$_SESSION['id_login'];
		$sorteo=1;
		$numero_boleto=3;
		$fecha=date('y-m-d H:i:s');
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_mod_reg=[
				"usuario"=>$usuario,
				"sorteo"=>$sorteo,
				"numero_boleto"=>$numero_boleto,
				"fecha"=>$fecha
			];

			$agregar_boleto=boletoModelo::agregarBoletoModelo($datos_mod_reg);
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

