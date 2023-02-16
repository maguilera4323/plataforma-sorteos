<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if($peticionAjax){
	require_once "../modelos/empresaModelo.php";
	include ("../modelos/bitacoraActividades.php");
}else{
	require_once "./modelos/empresaModelo.php";
	include ("./modelos/bitacoraActividades.php");
}


class empresaControlador extends empresaModelo{

	
	public function agregarEmpresa(){
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_nuevo']));
		$direccion=ConexionBD::limpiar_cadena($_POST['direccion_nuevo']);
		$telefono=ConexionBD::limpiar_cadena($_POST['telefono_nuevo']);
		$correo=ConexionBD::limpiar_cadena($_POST['correo_electronico_nuevo']);

		
		/* //validaciones de datos */
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


		if(ConexionBD::verificar_datos("[A-Za-zÑñ0-9 .,]{1,200}",$direccion)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"La direccion no se ha ingresado de acuerdo al formato solicitado",
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

		$revisarNombre=ConexionBD::consultaComprobacion("SELECT nombre_empresa FROM empresas WHERE nombre_empresa='$nombre'");
			if($revisarNombre->rowCount()>0){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"La empresa ingresado ya se encuentra registrada en el sistema",
					"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
			}
		
		$revisarCorreo=ConexionBD::consultaComprobacion("SELECT correo_electronico FROM empresas WHERE 
		correo_electronico='$correo'");
		if($revisarCorreo->rowCount()>0){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El correo electrónico ingresado ya se encuentra registrado en el sistema",
					"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
			}
		
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_empresa_reg=[
				"nom"=>$nombre,
				"dir"=>$direccion,
				"tel"=>$telefono,
				"correo"=>$correo,
			];

			$agregar_empresa=empresaModelo::agregarEmpresaModelo($datos_empresa_reg);

			if($agregar_empresa->rowCount()==1){
				$registroEvento = new bitacora();
				$datos_bitacora = [
					"id_modulo" => 3,
					"fecha" => date('Y-m-d H:i:s'),
					"id_usuario" => $_SESSION['id_login'],
					"accion" => "Inserción",
					"descripcion" => "El usuario ".$_SESSION['usuario_login']." agregó una nueva empresa al sistema"
				];
				$resultado=$registroEvento->guardar_bitacora($datos_bitacora);

				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Empresa Registrado",
					"Texto"=>"Los datos de la empresa han sido registrados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha ocurrido un problema al momento de guardar la nueva empresa",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function actualizarEmpresa(){	
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_act']));
		$direccion=ConexionBD::limpiar_cadena($_POST['direccion_act']);
		$telefono=ConexionBD::limpiar_cadena($_POST['telefono_act']);
		$correo=ConexionBD::limpiar_cadena($_POST['correo_electronico_act']);
		$id_actualizar=ConexionBD::limpiar_cadena($_POST['empresa_id']);


		/* //validaciones de datos */
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


		if(ConexionBD::verificar_datos("[A-Za-zÑñ0-9 .,]{1,200}",$direccion)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"La direccion no se ha ingresado de acuerdo al formato solicitado",
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

			
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_empresa_act=[
				"nom"=>$nombre,
				"dir"=>$direccion,
				"tel"=>$telefono,
				"correo"=>$correo,
			];

			$actualizar_empresa=empresaModelo::actualizarEmpresaModelo($datos_empresa_act,$id_actualizar);

			if($actualizar_empresa->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Empresa Actualizada",
					"Texto"=>"Los datos de la empresa han sido actualizados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha ocurrido un problema al momento de actualizar la empresa seleccionada",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function eliminarEmpresa(){
			$id=ConexionBD::limpiar_cadena(($_POST['id_empresa_del']));
			$array=array();
			$valor='';
		
		$eliminarEmpresa=empresaModelo::eliminarEmpresaModelo($id);
			if($eliminarEmpresa->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Empresa Eliminada",
					"Texto"=>"La empresa seleccionada fue eliminada del sistema",
					"Tipo"=>"success"
				];

				echo json_encode($alerta);

			
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ha ocurrido un error",
					"Texto"=>"Ha ocurrido un problema al momento de eliminar la empresa seleccionada",
					"Tipo"=>"error"
				];echo json_encode($alerta);
			}
			
			exit();

			
	}
}

