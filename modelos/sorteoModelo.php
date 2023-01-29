<?php
	
	require_once "../config/conexion.php";

	class sorteoModelo extends ConexionBD{

		protected function agregarSorteoModelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO sorteos(id_empresa,nombre_sorteo,fecha_realizacion,
			cantidad_boletos,estado_sorteo)VALUES(?,?,?,?,?)");

			$sql->bindParam(1,$datos['empresa']);
			$sql->bindParam(2,$datos['nombre']);
			$sql->bindParam(3,$datos['fecha']);
			$sql->bindParam(4,$datos['cant_boletos']);
			$sql->bindParam(5,$datos['estado']);
			$sql->execute();
			return $sql;								
		}


		protected function actualizarSorteoModelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE sorteos SET id_empresa=?,nombre_sorteo=?,fecha_realizacion=?,
			cantidad_boletos=?, estado_sorteo=? WHERE id_sorteo=?");

			$sql->bindParam(1,$dato['empresa']);
			$sql->bindParam(2,$dato['nombre']);	
			$sql->bindParam(3,$dato['fecha']);
			$sql->bindParam(4,$dato['cant_boletos']);
			$sql->bindParam(5,$dato['estado']);
			$sql->bindParam(6,$id);
			$sql->execute();
			return $sql;
		}



		protected function eliminarSorteoModelo($id){
			$sql=ConexionBD::getConexion()->prepare("DELETE FROM sorteos where id_sorteo=?");
				
			$sql->bindParam(1,$id);
			$sql->execute();
			return $sql;
		}

	}
