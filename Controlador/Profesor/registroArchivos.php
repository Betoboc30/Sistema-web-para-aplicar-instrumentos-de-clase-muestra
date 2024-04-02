<?php

include("../../Modelo/conexion.php");
include("../../Vista/bootstrap.php");
session_start();

//Mover la imagen al servidor
$carpeta_destino = "../../Public/";
$nombre_doc1 = $_FILES['cv']['name'];
$nombre_doc2 = $_FILES['identificacion']['name'];
$nombre_doc3 = $_FILES['comprobante']['name'];
$nombre_doc4 = $_FILES['titulo']['name'];
$nombre_doc5 = $_FILES['cedula']['name'];
$nombre_doc6 = $_FILES['actaNacimiento']['name'];

$archivo_destinodoc1 = $carpeta_destino . basename($nombre_doc1);
$archivo_destinodoc2 = $carpeta_destino . basename($nombre_doc2);
$archivo_destinodoc3 = $carpeta_destino . basename($nombre_doc3);
$archivo_destinodoc4 = $carpeta_destino . basename($nombre_doc4);
$archivo_destinodoc5 = $carpeta_destino . basename($nombre_doc5);
$archivo_destinodoc6 = $carpeta_destino . basename($nombre_doc6);

$tipo_archivo1 = strtolower(pathinfo($archivo_destinodoc1, PATHINFO_EXTENSION));
$tipo_archivo2 = strtolower(pathinfo($archivo_destinodoc2, PATHINFO_EXTENSION));
$tipo_archivo3 = strtolower(pathinfo($archivo_destinodoc3, PATHINFO_EXTENSION));
$tipo_archivo4 = strtolower(pathinfo($archivo_destinodoc4, PATHINFO_EXTENSION));
$tipo_archivo5 = strtolower(pathinfo($archivo_destinodoc5, PATHINFO_EXTENSION));
$tipo_archivo6 = strtolower(pathinfo($archivo_destinodoc6, PATHINFO_EXTENSION));

$doc1 = "";
$doc2 = "";
$doc3 = "";
$doc4 = "";
$doc5 = "";
$doc6 = "";

//Movemos la imagen a la carpeta
if (
    move_uploaded_file($_FILES['cv']['tmp_name'], $archivo_destinodoc1)
    && move_uploaded_file($_FILES['identificacion']['tmp_name'], $archivo_destinodoc2)
    && move_uploaded_file($_FILES['comprobante']['tmp_name'], $archivo_destinodoc3)
    && move_uploaded_file($_FILES['titulo']['tmp_name'], $archivo_destinodoc4)
    && move_uploaded_file($_FILES['cedula']['tmp_name'], $archivo_destinodoc5)
    && move_uploaded_file($_FILES['actaNacimiento']['tmp_name'], $archivo_destinodoc6)
) {
    //echo "Logramos subir la imagen<br>";
    $doc1 = $nombre_doc1;
    $doc2 = $nombre_doc2;
    $doc3 = $nombre_doc3;
    $doc4 = $nombre_doc4;
    $doc5 = $nombre_doc5;
    $doc6 = $nombre_doc6;

    $usuario = $_SESSION['usuario'];

    $sql = $conexion->query("INSERT INTO datoscontrato (CV, Identificacion, CompDomicilio, TituloAcad, Cedula, ActaNaci,idUsuario) 
         values ('$doc1','$doc2','$doc3','$doc4','$doc5','$doc6',$usuario)");

    if ($sql) {
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="col-auto text-center">
            <p class="fs-5">Realizado con exito</p>
            <i class="bi bi-check2 fs-1 text-success"></i>
        </div>
        </body>';
        header("Refresh:3; ../../Vista/Profesor/resultados.php");

    } else {
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="col-auto text-center">
            <p class="fs-5">Algo salió mal</p>
            <i class="bi bi-x-lg fs-1 text-danger"></i>
        </div>
        </body>';
        header("Refresh:3; ../../Vista/Profesor/resultados.php");
    }
}

?>