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
		$cantidad=ConexionBD::limpiar_cadena($_SESSION['cantidad_boletos']);
		$arregloPremios=array();

		//ciclo que se encarga de registrar lo cantidad de boletos que adquiera un usuario
		for($i=0;$i<$cantidad;$i++){

			//consulta que extrae el numero del ultimo boleto adquirido y le suma 1 para obtener el siguiente numero de boleto
			$extraerNumeroBoleto=ConexionBD::consultaComprobacion("SELECT numero_boleto FROM boletos");
			if($extraerNumeroBoleto->rowCount()>0){
				foreach ($extraerNumeroBoleto as $fila){
					$numero_boleto=$fila['numero_boleto']+1;
				}
			}else{
				$numero_boleto=1;
			}

			//consulta que extrae el numero del ultimo boleto adquirido y le suma 1 para obtener el siguiente numero de boleto
			$extraerSorteoActivo=ConexionBD::consultaComprobacion("SELECT id_sorteo FROM sorteos");
			if($extraerSorteoActivo->rowCount()>0){
				foreach ($extraerSorteoActivo as $fila){
					$sorteo=$fila['id_sorteo'];
				}
			}

			//consulta que extrae los premios registrados en el sistema siempre que tengan relacion con el sorteo activo
			//y que tengan cantidad superior a cero
			$extraerPremioGanado=ConexionBD::consultaComprobacion("SELECT id_premio FROM premios where cantidad_disponible>=1");
			if($extraerPremioGanado->rowCount()>0){
				foreach ($extraerPremioGanado as $fila){
					$arregloPremios[]=$fila['id_premio'];
				}
			}

			//variable que genera un id random para que los premios que se entreguen sean distintos
			//tanto si son de cliente individuales o clientes que compren varios boletos
			$id_premio=rand(0,(count($arregloPremios)-1));

			$usuario=$_SESSION['id_login'];
			$fecha=date('y-m-d H:i:s');
			$premio=$arregloPremios[$id_premio];
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_boleto_reg=[
				"usuario"=>$usuario,
				"sorteo"=>$sorteo,
				"numero_boleto"=>$numero_boleto,
				"fecha"=>$fecha
			];

			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_premio_reg=[
				"usuario"=>$usuario,
				"sorteo"=>$sorteo,
				"premio"=>$premio,
				"estado"=>1
			];

			//funciones para agregar registro de los boletos comprados y premios ganados
			$agregar_boleto=boletoModelo::agregarBoletoModelo($datos_boleto_reg);
			$agregar_premioGanado=boletoModelo::agregarPremioModelo($datos_premio_reg);

			//funcion para actualizar la cantidad disponible de los premios
			$actCantidadPremios=boletoModelo::actCantidadPremiosModelo($premio);
		}
		
	} 

}

