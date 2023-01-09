<?php
    $peticion=true;
	include("obtenerDatos.php");

	$datos=new obtenerDatosTablas();
    $resultado=$datos->datosTablas('insumos');
    $json=array();
    foreach ($resultado as $fila){
		$json[]=array(
			'idInsumo'=>$fila['id_insumo'],
			'nomInsumo'=>$fila['nom_insumo']
		);
	}

	$enviarDatos= json_encode($json);
    echo $enviarDatos;