<?php
	
	require_once "../config/conexion.php";

	class premioModelo extends ConexionBD{

		protected function agregarPremioModelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO premios(id_sorteo,nombre_premio,foto_premio)
			VALUES(?,?,?)");

			$sql->bindParam(1,$datos['sorteo']);
			$sql->bindParam(2,$datos['nombre']);
			$sql->bindParam(3,$datos['imagen']);
			$sql->execute();
			return $sql;								
		}


		protected function actualizarPremioModelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE premios SET id_sorteo=?,nombre_premio=?,foto_premio=?
			 WHERE id_premio=?");

			$sql->bindParam(1,$dato['sorteo']);
			$sql->bindParam(2,$dato['nombre']);	
			$sql->bindParam(3,$dato['imagen']);
			$sql->bindParam(4,$id);
			$sql->execute();
			return $sql;
		}



		protected function eliminarPremioModelo($id){
			$sql=ConexionBD::getConexion()->prepare("DELETE FROM premios where id_premio=?");
				
			$sql->bindParam(1,$id);
			$sql->execute();
			return $sql;
		}

	}
