<?php
// Datos para realizar la conexión con mysql.
$host = 'localhost';
$user = 'wero';
$pass = '1234_0123';
$bd = 'claseprueba';

// Fecha para el nombrado del archivo.
$fecha = date('Y-m-d');

// Nombrado del archivo.
$nombreArchivo = "respaldo_{$bd}_{$fecha}.sql";

// Dirección en donde estará ubicado el archivo.
$dir_server = '../restauraciones/';
$dir_files = $dir_server . basename($nombreArchivo);

$dump = "C:/xampp/mysql/bin/mysqldump.exe --add-drop-database --add-drop-table --databases claseprueba -h{$host} -u{$user} -p{$pass} > {$dir_files}";

system($dump, $output);

header("Location: {$dir_files}");