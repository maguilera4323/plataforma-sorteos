<?php
	
	require_once "../config/conexion.php";

	class premioModelo extends ConexionBD{

		protected function agregarPremioModelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO premios(id_sorteo,id_empresa, nombre_premio,
			cantidad_disponible, foto_premio) VALUES(?,?,?,?,?)");

			$sql->bindParam(1,$datos['sorteo']);
			$sql->bindParam(2,$datos['patr']);
			$sql->bindParam(3,$datos['nombre']);
			$sql->bindParam(4,$datos['cant']);
			$sql->bindParam(5,$datos['imagen']);
			$sql->execute();
			return $sql;								
		}


		protected function actualizarPremioModelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE premios SET id_sorteo=?,id_empresa=?, nombre_premio=?,
			cantidad_disponible=?, foto_premio=? WHERE id_premio=?");

			$sql->bindParam(1,$dato['sorteo']);
			$sql->bindParam(2,$dato['patr']);	
			$sql->bindParam(3,$dato['nombre']);	
			$sql->bindParam(4,$dato['cant']);	
			$sql->bindParam(5,$dato['imagen']);
			$sql->bindParam(6,$id);
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
