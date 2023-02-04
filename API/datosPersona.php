<?php

$conexion=mysqli_connect('localhost','root','','dbsorteo');
mysqli_set_charset($conexion, "utf8");
$valor=0;
$json=array();

    $query="SELECT sexo, count(*) as contar_personas FROM personas where sexo=2";
	$resultado=mysqli_query($conexion,$query);

	while($fila=mysqli_fetch_array($resultado)){
		$json[]=array(
            'sexo'=>$fila['sexo'],
			'total'=>$fila['contar_personas'],
		);
	}


	$hola= json_encode($json);
    echo $hola;
