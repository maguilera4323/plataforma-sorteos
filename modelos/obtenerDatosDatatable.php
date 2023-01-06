<?php
include("../config/conexion.php");
include("../API/consulta.php");
include("../modelos/obtenerDatos.php");

$query='';
$stmt='';
$salida=array();
$query= "SELECT * FROM proveedores ";

if (isset($_POST["search"]["value"])){
    $query .='WHERE nom_proveedor LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .='OR dir_proveedor LIKE "%' . $_POST["search"]["value"] . '%" ';
}

if (isset($_POST["order"])){
    $query .= 'ORDER BY' . $_POST["order"]["0"]["column"] . ' '.$_POST["order"][0]["dir"] . ' ';
}else{
    $query .= 'ORDER BY id_proveedor desc ';
}

if($_POST["length"]!=1){
    $query .= 'LIMIT '. $_POST["start"] . ' ' . $_POST["length"];
}

$dat=new obtenerDatosTablas();
$resultado=$dat->datosTablas('proveedores');
$datos=array();
$filteredrows=$datos->rowCount();
foreach ($resultado as $fila){
    $subarray=array();
    $subarray[]=$fila["id_proveedor"];
    $subarray[]=$fila["nom_proveedor"];
    $subarray[]=$fila["rtn_proveedor"];
    $subarray[]=$fila["tel_proveedor"];
    $subarray[]=$fila["correo_proveedor"];
    $subarray[]=$fila["dir_proveedor"];
    $subarray[]="<button type='button' class='form btn btn-primary btn-xs' data-bs-toggle='modal' data-bs-target='#ModalAct'><i class='fas fa-sync-alt'></i></button>";
    $subarray[]="<button type='button' class='form btn btn-primary btn-xs' data-bs-toggle='modal' data-bs-target='#ModalAct'><i class='fas fa-sync-alt'></i></button>";
    $datos=$subarray;
}

$salida=array(
    "draw"=>intval($_POST["draw"]),
    "recordsTotal"=>$filteredrows,
    "recordsFiltered"=>cantidadRegistros(),
    "data"=>$datos
);

echo json_encode($salida);