<?php
	
	require_once "../config/conexion.php";

	class boletoModelo extends ConexionBD{

		protected function agregarBoletoModelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO boletos(id_usuario,id_sorteo,numero_boleto,
			fecha_compra)VALUES(?,?,?,?)");

			$sql->bindParam(1,$datos['usuario']);
			$sql->bindParam(2,$datos['sorteo']);
			$sql->bindParam(3,$datos['numero_boleto']);
			$sql->bindParam(4,$datos['fecha']);
			$sql->execute();
			return $sql;								
		}

	}
