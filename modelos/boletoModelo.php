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


		protected function agregarPremioModelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO premios_sorteo(id_sorteo, id_usuario,id_premio,
			estado)VALUES(?,?,?,?)");

			$sql->bindParam(1,$datos['sorteo']);
			$sql->bindParam(2,$datos['usuario']);
			$sql->bindParam(3,$datos['premio']);
			$sql->bindParam(4,$datos['estado']);
			$sql->execute();
			return $sql;								
		}


		protected function actCantidadPremiosModelo($id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE premios SET cantidad_disponible=cantidad_disponible-1
			where id_premio=?");

			$sql->bindParam(1,$id);
			$sql->execute();
			return $sql;								
		}

	}
