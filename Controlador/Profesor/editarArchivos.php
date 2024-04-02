<?php

include("../../Modelo/conexion.php");
include("../../Vista/bootstrap.php");
session_start();

if (isset($_POST['idUsuario'])) {

    $idUsuario = htmlspecialchars($_POST['idUsuario'], ENT_QUOTES, 'UTF-8');

    //If para editar solo el CV
    if (isset($_FILES['cv']) && isset($_POST['btnCV'])) {

        //Mover la imagen al servidor
        $carpeta_destino = "../../Public/";
        $nombre_doc1 = $_FILES['cv']['name'];

        $archivo_destinodoc1 = $carpeta_destino . basename($nombre_doc1);
        $tipo_archivo1 = strtolower(pathinfo($archivo_destinodoc1, PATHINFO_EXTENSION));
        $doc1 = "";

        //Movemos la imagen a la carpeta
        if (move_uploaded_file($_FILES['cv']['tmp_name'], $archivo_destinodoc1)) {

            $doc1 = $nombre_doc1;

            $sql = $conexion->query("UPDATE datoscontrato SET CV = '$doc1' WHERE idUsuario= $idUsuario");

            if ($sql) {
                echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <p class="fs-5">Realizado con exito</p>
                    <i class="bi bi-check2 fs-1 text-success"></i>
                </div>
                </body>';
                header("Refresh:3; ../../Vista/Profesor/perfil.php");

            } else {
                echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <p class="fs-5">Algo salió mal</p>
                    <i class="bi bi-x-lg fs-1 text-danger"></i>
                </div>
                </body>';
                header("Refresh:3; ../../Vista/Profesor/perfil.php");
            }
        }
    }

    //If para editar solo la identificación
    if (isset($_FILES['identificacion']) && isset($_POST['btnIdentificacion'])) {

        //Mover la imagen al servidor
        $carpeta_destino = "../../Public/";
        $nombre_doc2 = $_FILES['identificacion']['name'];

        $archivo_destinodoc2 = $carpeta_destino . basename($nombre_doc2);
        $tipo_archivo2 = strtolower(pathinfo($archivo_destinodoc2, PATHINFO_EXTENSION));
        $doc2 = "";

        //Movemos la imagen a la carpeta
        if (move_uploaded_file($_FILES['identificacion']['tmp_name'], $archivo_destinodoc2)) {

            $doc2 = $nombre_doc2;

            $sql = $conexion->query("UPDATE datoscontrato SET Identificacion = '$doc2' WHERE idUsuario= $idUsuario");

            if ($sql) {
                echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <p class="fs-5">Realizado con exito</p>
                    <i class="bi bi-check2 fs-1 text-success"></i>
                </div>
                </body>';
                header("Refresh:3; ../../Vista/Profesor/perfil.php");

            } else {
                echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <p class="fs-5">Algo salió mal</p>
                    <i class="bi bi-x-lg fs-1 text-danger"></i>
                </div>
                </body>';
                header("Refresh:3; ../../Vista/Profesor/perfil.php");
            }
        }
    }

    //If para editar solo el comprobante de domicilio
    if (isset($_FILES['comprobante']) && isset($_POST['btnComprobante'])) {

        //Mover la imagen al servidor
        $carpeta_destino = "../../Public/";
        $nombre_doc3 = $_FILES['comprobante']['name'];

        $archivo_destinodoc3 = $carpeta_destino . basename($nombre_doc3);
        $tipo_archivo3 = strtolower(pathinfo($archivo_destinodoc3, PATHINFO_EXTENSION));
        $doc3 = "";

        //Movemos la imagen a la carpeta
        if (move_uploaded_file($_FILES['comprobante']['tmp_name'], $archivo_destinodoc3)) {

            $doc3 = $nombre_doc3;

            $sql = $conexion->query("UPDATE datoscontrato SET CompDomicilio = '$doc3' WHERE idUsuario= $idUsuario");

            if ($sql) {
                echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <p class="fs-5">Realizado con exito</p>
                    <i class="bi bi-check2 fs-1 text-success"></i>
                </div>
                </body>';
                header("Refresh:3; ../../Vista/Profesor/perfil.php");

            } else {
                echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <p class="fs-5">Algo salió mal</p>
                    <i class="bi bi-x-lg fs-1 text-danger"></i>
                </div>
                </body>';
                header("Refresh:3; ../../Vista/Profesor/perfil.php");
            }
        }
    }

    //If para editar solo el titulo
    if (isset($_FILES['titulo']) && isset($_POST['btnTitulo'])) {

        //Mover la imagen al servidor
        $carpeta_destino = "../../Public/";
        $nombre_doc4 = $_FILES['titulo']['name'];

        $archivo_destinodoc4 = $carpeta_destino . basename($nombre_doc4);
        $tipo_archivo4 = strtolower(pathinfo($archivo_destinodoc4, PATHINFO_EXTENSION));
        $doc4 = "";

        //Movemos la imagen a la carpeta
        if (move_uploaded_file($_FILES['titulo']['tmp_name'], $archivo_destinodoc4)) {

            $doc4 = $nombre_doc4;

            $sql = $conexion->query("UPDATE datoscontrato SET TituloAcad = '$doc4' WHERE idUsuario= $idUsuario");

            if ($sql) {
                echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <p class="fs-5">Realizado con exito</p>
                    <i class="bi bi-check2 fs-1 text-success"></i>
                </div>
                </body>';
                header("Refresh:3; ../../Vista/Profesor/perfil.php");

            } else {
                echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <p class="fs-5">Algo salió mal</p>
                    <i class="bi bi-x-lg fs-1 text-danger"></i>
                </div>
                </body>';
                header("Refresh:3; ../../Vista/Profesor/perfil.php");
            }
        }
    }

    //If para editar solo la cedula
    if (isset($_FILES['cedula']) && isset($_POST['btnCedula'])) {

        //Mover la imagen al servidor
        $carpeta_destino = "../../Public/";
        $nombre_doc5 = $_FILES['cedula']['name'];

        $archivo_destinodoc5 = $carpeta_destino . basename($nombre_doc5);
        $tipo_archivo5 = strtolower(pathinfo($archivo_destinodoc5, PATHINFO_EXTENSION));
        $doc5 = "";

        //Movemos la imagen a la carpeta
        if (move_uploaded_file($_FILES['cedula']['tmp_name'], $archivo_destinodoc5)) {

            $doc5 = $nombre_doc5;

            $sql = $conexion->query("UPDATE datoscontrato SET Cedula = '$doc5' WHERE idUsuario= $idUsuario");

            if ($sql) {
                echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <p class="fs-5">Realizado con exito</p>
                    <i class="bi bi-check2 fs-1 text-success"></i>
                </div>
                </body>';
                header("Refresh:3; ../../Vista/Profesor/perfil.php");

            } else {
                echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <p class="fs-5">Algo salió mal</p>
                    <i class="bi bi-x-lg fs-1 text-danger"></i>
                </div>
                </body>';
                header("Refresh:3; ../../Vista/Profesor/perfil.php");
            }
        }
    }

    //If para editar solo la acta de nacimiento
    if (isset($_FILES['actaNacimiento']) && isset($_POST['btnActaNacimiento'])) {

        //Mover la imagen al servidor
        $carpeta_destino = "../../Public/";
        $nombre_doc6 = $_FILES['actaNacimiento']['name'];

        $archivo_destinodoc6 = $carpeta_destino . basename($nombre_doc6);
        $tipo_archivo6 = strtolower(pathinfo($archivo_destinodoc6, PATHINFO_EXTENSION));
        $doc6 = "";

        //Movemos la imagen a la carpeta
        if (move_uploaded_file($_FILES['actaNacimiento']['tmp_name'], $archivo_destinodoc6)) {

            $doc6 = $nombre_doc6;

            $sql = $conexion->query("UPDATE datoscontrato SET ActaNaci = '$doc6' WHERE idUsuario= $idUsuario");

            if ($sql) {
               echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <p class="fs-5">Realizado con exito</p>
                    <i class="bi bi-check2 fs-1 text-success"></i>
                </div>
                </body>';
                header("Refresh:3; ../../Vista/Profesor/perfil.php");

            } else {
                echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <p class="fs-5">Algo salió mal</p>
                    <i class="bi bi-x-lg fs-1 text-danger"></i>
                </div>
                </body>';
                header("Refresh:3; ../../Vista/Profesor/perfil.php");
            }
        }
    }
}


?>