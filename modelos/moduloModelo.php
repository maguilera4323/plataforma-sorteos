<?php
	
	require_once "../config/conexion.php";

	class moduloModelo extends ConexionBD{

		protected function agregarModuloModelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO modulos(modulo,descripcion,tipo_modulo,
			creado_por,fecha_creacion)VALUES(?,?,?,?,?)");

			$sql->bindParam(1,$datos['nom']);
			$sql->bindParam(2,$datos['desc']);
			$sql->bindParam(3,$datos['tipo']);
			$sql->bindParam(4,$datos['creado_por']);
			$sql->bindParam(5,$datos['fecha_creacion']);
			$sql->execute();
			return $sql;								
		}


		protected function actualizarModuloModelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE modulos SET modulo=?,descripcion=?,tipo_modulo=?,
			modificado_por=?, fecha_modificacion=? WHERE id_modulo=?");

			$sql->bindParam(1,$dato['nom']);
			$sql->bindParam(2,$dato['desc']);	
			$sql->bindParam(3,$dato['tipo']);
			$sql->bindParam(4,$dato['modif_por']);
			$sql->bindParam(5,$dato['fecha_modif']);
			$sql->bindParam(6,$id);
			$sql->execute();
			return $sql;
		}



		protected function eliminarModuloModelo($id){
			$sql=ConexionBD::getConexion()->prepare("DELETE FROM modulos where id_modulo=?");
				
			$sql->bindParam(1,$id);
			$sql->execute();
			return $sql;
		}

	}
