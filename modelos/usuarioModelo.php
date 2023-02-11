<?php
	
	require_once "../config/conexion.php";

	class usuarioModelo extends ConexionBD{

		protected function agregarPersonaModelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO personas(nombres,apellidos,dni,telefono,sexo,
			direccion,creado_por,fecha_creacion)
			VALUES(?,?,?,?,?,?,?,?)");

			$sql->bindParam(1,$datos['nombres']);
			$sql->bindParam(2,$datos['apellidos']);
			$sql->bindParam(3,$datos['dni']);
			$sql->bindParam(4,$datos['telefono']);
			$sql->bindParam(5,$datos['sexo']);
			$sql->bindParam(6,$datos['direccion']);
			$sql->bindParam(7,$datos['creado_por']);
			$sql->bindParam(8,$datos['fecha_creacion']);
			$sql->execute();
			return $sql;								
		}

		protected function agregarUsuarioModelo($datos){
			$sql=ConexionBD::getConexion()->prepare("INSERT INTO usuarios(id_persona,usuario,estado,contrasena,
			id_rol,correo_electronico,creado_por,fecha_creacion)
			VALUES(?,?,?,?,?,?,?,?)");

			$sql->bindParam(1,$datos['persona']);
			$sql->bindParam(2,$datos['usuario']);
			$sql->bindParam(3,$datos['est']);
			$sql->bindParam(4,$datos['cont']);
			$sql->bindParam(5,$datos['rol']);
			$sql->bindParam(6,$datos['correo']);
			$sql->bindParam(7,$datos['creado_por']);
			$sql->bindParam(8,$datos['fecha_creacion']);
			$sql->execute();
			return $sql;								
		}


		protected function actualizarPersonaModelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE personas SET nombres=?,apellidos=?,dni=?,telefono=?, 
			sexo=?, direccion=? ,modificado_por=? ,fecha_modificacion=? WHERE id_persona=?");

			$sql->bindParam(1,$dato['nombres']);
			$sql->bindParam(2,$dato['apellidos']);	
			$sql->bindParam(3,$dato['dni']);			
			$sql->bindParam(4,$dato['telefono']);			
			$sql->bindParam(5,$dato['sexo']);
			$sql->bindParam(6,$dato['direccion']);
			$sql->bindParam(7,$dato['modif_por']);
			$sql->bindParam(8,$dato['fecha_modif']);
			$sql->bindParam(9,$id);
			$sql->execute();
			return $sql;
		}


		protected function actualizarUsuarioModelo($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE usuarios SET usuario=?,estado=?,id_rol=?, correo_electronico=?, 
			modificado_por=? ,fecha_modificacion=? WHERE id_usuario=?");

			$sql->bindParam(1,$dato['usuario']);
			$sql->bindParam(2,$dato['est']);	
			$sql->bindParam(3,$dato['rol']);			
			$sql->bindParam(4,$dato['correo']);			
			$sql->bindParam(5,$dato['modif_por']);
			$sql->bindParam(6,$dato['fecha_modif']);
			$sql->bindParam(7,$id);
			$sql->execute();
			return $sql;
		}



		protected function eliminarEmpleadoModelo($accion,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE usuarios SET estado=? WHERE id_usuario=?");
				
			$sql->bindParam(1,$accion);
			$sql->bindParam(2,$id);
			$sql->execute();
			return $sql;
		}


		protected function actualizarPersonaPerfil($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE personas SET nombres=?,apellidos=?,dni=?,telefono=?, 
			sexo=?, direccion=? ,modificado_por=? ,fecha_modificacion=? WHERE id_persona=?");

			$sql->bindParam(1,$dato['nombres']);
			$sql->bindParam(2,$dato['apellidos']);	
			$sql->bindParam(3,$dato['dni']);			
			$sql->bindParam(4,$dato['telefono']);			
			$sql->bindParam(5,$dato['sexo']);
			$sql->bindParam(6,$dato['direccion']);
			$sql->bindParam(7,$dato['modif_por']);
			$sql->bindParam(8,$dato['fecha_modif']);
			$sql->bindParam(9,$id);
			$sql->execute();
			return $sql;
		}


		protected function actualizarUsuarioPerfil($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE usuarios SET usuario=?, correo_electronico=?, 
			modificado_por=? ,fecha_modificacion=? WHERE id_usuario=?");

			$sql->bindParam(1,$dato['usuario']);
			$sql->bindParam(2,$dato['correo']);			
			$sql->bindParam(3,$dato['modif_por']);
			$sql->bindParam(4,$dato['fecha_modif']);
			$sql->bindParam(5,$id);
			$sql->execute();
			return $sql;
		}


		protected function actualizarContrasenaUsuario($dato,$id){
			$sql=ConexionBD::getConexion()->prepare("UPDATE usuarios SET contrasena=?, modificado_por=?,
			fecha_modificacion=? WHERE id_usuario=?");
				
			$sql->bindParam(1,$dato['clave']);
			$sql->bindParam(2,$dato['modif']);
			$sql->bindParam(3,$dato['fecha_modif']);
			$sql->bindParam(4,$id);
			$sql->execute();
			return $sql;
		}
		
		
	}