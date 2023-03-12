<?php
	
	require_once "../config/conexion.php";

	class sorteoModelo extends ConexionBD{

		protected function agregarSorteoModelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO sorteos(nombre_sorteo,estado_sorteo)VALUES(?,?)");

			$sql->bindParam(1,$datos['nombre']);
			$sql->bindParam(2,$datos['estado']);
			$sql->execute();
			return $sql;								
		}


		protected function actualizarSorteoModelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE sorteos SET estado_sorteo=? WHERE id_sorteo=?");

			$sql->bindParam(1,$dato['estado']);
			$sql->bindParam(2,$id);
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
