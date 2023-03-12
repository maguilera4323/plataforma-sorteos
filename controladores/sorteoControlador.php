<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if($peticionAjax){
	require_once "../modelos/sorteoModelo.php";
	include ("../modelos/bitacoraActividades.php");
}else{
	require_once "./modelos/sorteoModelo.php";
	include ("./modelos/bitacoraActividades.php");
}


class sorteoControlador extends sorteoModelo{

	
	public function agregarSorteo(){
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_nuevo']));
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

		$revisarSorteo=ConexionBD::consultaComprobacion("SELECT nombre_sorteo FROM sorteos WHERE nombre_sorteo='$nombre'");
			if($revisarSorteo->rowCount()>0){
				$registroEvento = new bitacora();
				$datos_bitacora = [
					"id_modulo" => 4,
					"fecha" => date('Y-m-d H:i:s'),
					"id_usuario" => $_SESSION['id_login'],
					"accion" => "Inserción",
					"descripcion" => "El usuario ".$_SESSION['usuario_login']." agregó un nuevo sorteo al sistema"
				];
				$resultado=$registroEvento->guardar_bitacora($datos_bitacora);


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
		$id_actualizacion=ConexionBD::limpiar_cadena($_POST['sorteo_id']);
		$estado=ConexionBD::limpiar_cadena($_POST['estado_act']);
		$sorteo=0;

		//consulta que extrae el numero del ultimo boleto adquirido y le suma 1 para obtener el siguiente numero de boleto
		$extraerSorteoAct=ConexionBD::consultaComprobacion("SELECT estado_sorteo FROM sorteos where id_sorteo='$id_actualizacion'");
		if($extraerSorteoAct->rowCount()>0){
			foreach ($extraerSorteoAct as $fila){
				$estado_sorteo=$fila['estado_sorteo'];
			}
		}

	

		//consulta que extrae el numero del ultimo boleto adquirido y le suma 1 para obtener el siguiente numero de boleto
		$extraerSorteoActivo=ConexionBD::consultaComprobacion("SELECT id_sorteo FROM sorteos where estado_sorteo=1");
		if($extraerSorteoActivo->rowCount()>0){
			foreach ($extraerSorteoActivo as $fila){
				$sorteo=$fila['id_sorteo'];
			}
		}

		if($sorteo!=0 && $estado==1){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"Solo puede haber un sorteo activo en el sistema",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		} 
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_sorteo_act=[
				"estado"=>$estado
			];

			$actualizar_sorteo=sorteoModelo::actualizarSorteoModelo($datos_sorteo_act,$id_actualizacion);

			if($actualizar_sorteo->rowCount()==1){
				$registroEvento = new bitacora();
				$datos_bitacora = [
					"id_modulo" => 4,
					"fecha" => date('Y-m-d H:i:s'),
					"id_usuario" => $_SESSION['id_login'],
					"accion" => "Actualizacion",
					"descripcion" => "El usuario ".$_SESSION['usuario_login']." actualizó la información de un sorteo"
				];
				$resultado=$registroEvento->guardar_bitacora($datos_bitacora);

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

