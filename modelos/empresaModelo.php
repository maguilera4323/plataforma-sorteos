<?php
	
	require_once "../config/conexion.php";

	class empresaModelo extends ConexionBD{

		protected function agregarEmpresaModelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO empresas(NombreEmpresa,Direccion,Telefono,Correo)
			VALUES(?,?,?,?)");

			$sql->bindParam(1,$datos['nom']);
			$sql->bindParam(2,$datos['dir']);
			$sql->bindParam(3,$datos['tel']);
			$sql->bindParam(4,$datos['correo']);
			$sql->execute();
			return $sql;								
		}


		protected function actualizarEmpresaModelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE empresas SET NombreEmpresa=?,Direccion=?,Telefono=?,
			Correo=? where IdEmpresa=?");

			$sql->bindParam(1,$dato['nom']);
			$sql->bindParam(2,$dato['dir']);	
			$sql->bindParam(3,$dato['tel']);			
			$sql->bindParam(4,$dato['correo']);			
			$sql->bindParam(5,$id);
			$sql->execute();
			return $sql;
		}



		protected function eliminarEmpresaModelo($id){
			$sql=ConexionBD::getConexion()->prepare("DELETE FROM empresas where IdEmpresa=?");
				
			$sql->bindParam(1,$id);
			$sql->execute();
			return $sql;
		}
}


		