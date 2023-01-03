<?php

if($peticionAjax){
	require_once "../modelos/proveedorModelo.php";
}else{
	require_once "./modelos/proveedorModelo.php";
}


class proveedorControlador extends proveedorModelo
{

	/*--------- Controlador agregar proveedor ---------*/
	public function agregar_proveedor_controlador()
	{
		$Nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_proveedor_nuevo']));
		$Rtn=ConexionBD::limpiar_cadena($_POST['rtn_proveedor_nuevo']);
		$Telefono=ConexionBD::limpiar_cadena($_POST['telefono_proveedor_nuevo']);
		$Correo=ConexionBD::limpiar_cadena($_POST['correo_proveedor_nuevo']);
		$Direccion=ConexionBD::limpiar_cadena($_POST['direccion_proveedor_nuevo']);
		
		/*== Verificando integridad de los datos ==*/
		if(ConexionBD::verificar_datos("[A-ZÁÉÍÓÚÑ ]{1,30}",$Nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El Nombre no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[0-9]{1,14}",$Rtn)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El RTN no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}
		
		if(ConexionBD::verificar_datos("[0-9]{1,20}",$Telefono)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El telefono no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[a-z@_0-9.]{1,30}",$Correo)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El Correo no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if(ConexionBD::verificar_datos("[A-Za-zÑñ0-9 .,]{1,250}",$Direccion)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"La Dirección no coincide con el formato solicitado",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}
	
					
			/*== AGREGAR PROVEEDOR ==*/
			$datos_proveedor_reg=[
				"nombre"=>$Nombre,
				"rtn"=>$Rtn,
				"telefono"=>$Telefono,
				"correo"=>$Correo,
				"direccion"=>$Direccion
			];

			$agregar_proveedor=proveedorModelo::agregar_proveedor_modelo($datos_proveedor_reg);

			if($agregar_proveedor->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Proveedor registrado",
					"Texto"=>"Los datos del proveedor han sido registrados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido registrar el proveedor",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);

			
	} /* Fin controlador */


	
}