<?php

if($peticionAjax){
	require_once "../modelos/premioModelo.php";
}else{
	require_once "./modelos/premioModelo.php";
}


class premioControlador extends premioModelo{

	
	public function agregarPremio(){
		$sorteo=ConexionBD::limpiar_cadena($_POST['sorteo_nuevo']);
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_nuevo']));

		$nombre_img=($_FILES['imagen_nuevo']['name']);
		$file_type = strtolower(pathinfo($nombre_img,PATHINFO_EXTENSION));
		$temporal=$_FILES['imagen_nuevo']['tmp_name'];
		$carpeta='../vistas/assets/premios';
		$ruta=$carpeta.'/'.$nombre_img;
		move_uploaded_file($temporal,$carpeta.'/'. $nombre_img);

		/* //validaciones de datos */
		if(ConexionBD::verificar_datos("[0-9A-ZÁÉÍÓÚÑ ]{1,300}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombre solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png" && $file_type != "gif" ){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"Solo se pueden guardar imágenes en formato .jpg, .png, .jpeg y .gif",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		$revisarPremio=ConexionBD::consultaComprobacion("SELECT nombre_premio FROM premios WHERE nombre_premio='$nombre'");
			if($revisarPremio->rowCount()>0){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El premio ingresado ya se encuentra registrado en el sistema",
					"Tipo"=>"error"
					];
					echo json_encode($alerta);
					exit();
			}
	
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_premio_reg=[
				"sorteo"=>$sorteo,
				"nombre"=>$nombre,
				"imagen"=>$ruta,
			];

			$agregar_premio=premioModelo::agregarPremioModelo($datos_premio_reg);

			if($agregar_premio->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Premio Registrado",
					"Texto"=>"Los datos del premio han sido registrados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha ocurrido un problema al momento de guardar el nuevo premio",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function actualizarPremio(){	
		$sorteo=ConexionBD::limpiar_cadena($_POST['sorteo_act']);
		$nombre=ConexionBD::limpiar_cadena(strtoupper($_POST['nombre_act']));
		$id_actualizacion=ConexionBD::limpiar_cadena($_POST['premio_id']);

		$nombre_img=($_FILES['imagen_act']['name']);
		$file_type = strtolower(pathinfo($nombre_img,PATHINFO_EXTENSION));
		$temporal=$_FILES['imagen_act']['tmp_name'];
		$carpeta='../vistas/assets/premios';
		$ruta=$carpeta.'/'.$nombre_img;
		move_uploaded_file($temporal,$carpeta.'/'. $nombre_img);

		/* //validaciones de datos */
		if(ConexionBD::verificar_datos("[0-9A-ZÁÉÍÓÚÑ ]{1,300}",$nombre)){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"El campo Nombre solo acepta letras y espacios",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}

		if($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png" && $file_type != "gif" ){
			$alerta=[
				"Alerta"=>"simple",
				"Titulo"=>"Ocurrió un error inesperado",
				"Texto"=>"Solo se pueden guardar imágenes en formato .jpg, .png, .jpeg y .gif",
				"Tipo"=>"error"
			];
			echo json_encode($alerta);
			exit();
		}
					
			//arreglo enviado al modelo para ser usado en una sentencia INSERT
			$datos_premio_act=[
				"sorteo"=>$sorteo,
				"nombre"=>$nombre,
				"imagen"=>$ruta,
			];

			$actualizar_premio=premioModelo::actualizarPremioModelo($datos_premio_act,$id_actualizacion);

			if($actualizar_premio->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Premio Actualizado",
					"Texto"=>"Los datos del premio han sido actualizados con exito",
					"Tipo"=>"success"
				];

				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"Ha ocurrido un problema al momento de actualizar la información del premio",
					"Tipo"=>"error"
				];
			}
			echo json_encode($alerta);
	} 



	public function eliminarPremio(){
			$id=ConexionBD::limpiar_cadena(($_POST['id_premio_del']));
		
		$eliminarPremio=premioModelo::eliminarPremioModelo($id);
			if($eliminarPremio->rowCount()==1){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Premio Eliminado",
					"Texto"=>"El premio seleccionado fue eliminado",
					"Tipo"=>"success"
				];

				echo json_encode($alerta);

			
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ha ocurrido un error",
					"Texto"=>"Ha ocurrido un problema al momento de eliminar el premio seleccionado",
					"Tipo"=>"error"
				];echo json_encode($alerta);
			}
			
			exit();

			
	}

}

