<?php

$dir = "../restauraciones/";
$file_dir = $dir . basename(($_FILES['restore_file']['name']));

if (move_uploaded_file($_FILES['restore_file']['tmp_name'], $file_dir)) {
    $host = "localhost";
    $user = "wero";
    $pass = "1234_0123";
    $bd = "claseprueba";

    // Realizamos la restauración de la base de datos.
    $dump = "C:/xampp/mysql/bin/mysql.exe -h{$host} -u{$user} -p{$pass} {$bd} < {$file_dir}";

    $respuesta = system($dump, $output);

    if (gettype($respuesta) == 'string') {
        echo "<script>alert('Restauración exitosa.');</script>";
        header("Refresh:0; ./respaldobd.php");
    } else {
        echo "<script>alert('La restauración fracasó :( porqué yo rompí mis pantalones.');</script>";
        header("Refresh:0; ./respaldobd.php");
    }
} else {
    echo "<script>alert('Hubo un error con tu archivo.');</script>";
    header("Refresh:0; ./respaldobd.php");
}

die();
