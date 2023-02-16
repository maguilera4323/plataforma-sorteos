<?php

$conexion=mysqli_connect('localhost','root','','dbsorteo');
mysqli_set_charset($conexion, "utf8");
$valor_inicial=18;
$valor_final=27;
$contador_registros=0;
$labels=array();
$cantidades=array();

$labels=['18-27','28-36','37-45','46-54','54-63'];

while($valor_inicial<55 && $valor_final<64){
	$query="SELECT count(*) as contar_personas FROM personas where edad between $valor_inicial and $valor_final";
	$resultado=mysqli_query($conexion,$query);

	while($fila=mysqli_fetch_array($resultado)){
		$cantidades[$contador_registros]=$fila['contar_personas'];
		$nombre_mes[$contador_registros]=$labels[$contador_registros];
	}
	$contador_registros++;
	$valor_inicial+=9;
	$valor_final+=9;
}

$respuesta=[
	"nombre_mes"=>$nombre_mes,
	"cantidades"=>$cantidades,
];

echo json_encode($respuesta);

	