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
		$cantidad=$_SESSION['cantidad_boletos'];

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
			$extraerSorteoActivo=ConexionBD::consultaComprobacion("SELECT id_sorteo FROM sorteos where estado_sorteo=1");
			if($extraerSorteoActivo->rowCount()>0){
				foreach ($extraerSorteoActivo as $fila){
					$sorteo=$fila['id_sorteo'];
				}
			}

			$usuario=$_SESSION['id_login'];
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
		
	} 

}

