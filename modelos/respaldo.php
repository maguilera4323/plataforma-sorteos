<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbsorteo";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificación de la conexión
if ($conn->connect_error) {
    die("Falló la conexión: " . $conn->connect_error);
}

// Nombre del archivo de exportación
$filename = "backup-" . date("Y-m-d_H-i-s") . ".sql";

// Cabezeras del archivo SQL
$header = "-- Archivo de exportación de la base de datos " . $dbname . "\n";
$header .= "-- Fecha de exportación: " . date("Y-m-d H:i:s") . "\n\n";
$header .= "SET NAMES utf8;\n\n";
$header .= "DROP DATABASE IF EXISTS `" . $dbname . "`;\n";
$header .= "CREATE DATABASE `" . $dbname . "` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;\n";
$header .= "USE `" . $dbname . "`;\n\n";

// Obtenemos las tablas de la base de datos
$tables = array();
$result = $conn->query("SHOW TABLES");
while ($row = $result->fetch_array(MYSQLI_NUM)) {
    $tables[] = $row[0];
}

// Recorremos las tablas y exportamos su contenido
foreach ($tables as $table) {
    $result = $conn->query("SELECT * FROM `" . $table . "`");
    $num_fields = $result->field_count;

    // Cabecera de la tabla
    $header .= "-- Estructura de la tabla `" . $table . "`\n";
    $header .= "DROP TABLE IF EXISTS `" . $table . "`;\n";
    $row2 = $conn->query("SHOW CREATE TABLE `" . $table . "`")->fetch_array(MYSQLI_NUM);
    $header .= $row2[1] . ";\n\n";

    // Contenido de la tabla
    $header .= "-- Contenido de la tabla `" . $table . "`\n";
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        $header .= "INSERT INTO `" . $table . "` VALUES(";
        for ($i = 0; $i < $num_fields; $i++) {
            if (isset($row[$i])) {
                $header .= "'" . $conn->real_escape_string($row[$i]) . "'";
            } else {
                $header .= "NULL";
            }
            if ($i < ($num_fields - 1)) {
                $header .= ",";
            }
        }
        $header .= ");\n";
    }
    $header .= "\n";
}

// Escribimos el archivo de exportación
$file = fopen($filename, "w");
fwrite($file, $header);
fclose($file);

// Descarga el archivo de copia de seguridad de SQL en el navegador
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . basename($filename));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filename));
ob_clean();
flush();
readfile($filename);
exec('rm ' . $filename); 

// Cerramos la conexión
$conn->close();

echo "La base de datos " . $dbname . " se ha exportado correctamente en el archivo " . $filename . ".";
