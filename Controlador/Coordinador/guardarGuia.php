<?php
include("../../Modelo/conexion.php");
include("../../Vista/bootstrap.php");

if (
    isset($_POST['tema']) && isset($_POST['FechaAplicacion']) && isset($_POST['idCoordinador'])
    && isset($_POST['idProfesor']) && isset($_POST['idMateria']) && isset($_POST['contratado'])
    && isset($_POST['aperturaycierre']) && isset($_POST['participacion']) && isset($_POST['tecnica'])
    && isset($_POST['desempeno']) && isset($_POST['observacionGeneral']) && isset($_POST['total'])
) {

    $tema = htmlspecialchars($_POST['tema'], ENT_QUOTES, 'UTF-8');
    $FechaAplicacion = htmlspecialchars($_POST['FechaAplicacion'], ENT_QUOTES, 'UTF-8');
    $idCoordinador = htmlspecialchars($_POST['idCoordinador'], ENT_QUOTES, 'UTF-8');
    $idProfesor = htmlspecialchars($_POST['idProfesor'], ENT_QUOTES, 'UTF-8');
    $idMateria = htmlspecialchars($_POST['idMateria'], ENT_QUOTES, 'UTF-8');
    $observacionGeneral = htmlspecialchars($_POST['observacionGeneral'], ENT_QUOTES, 'UTF-8');
    $contratado = htmlspecialchars($_POST['contratado'], ENT_QUOTES, 'UTF-8');
    $total = htmlspecialchars($_POST['total'], ENT_QUOTES, 'UTF-8');
    $AyC = 0;
    $idAyC = 0;
    $observacionAper = 0;
    foreach ($_POST['aperturaycierre'] as $key => $item) {

        $AyC = $item['ayc'];
        $idAyC = $item['id'];
        $observacionAper = $item['observacionApertura'];

        $apertura = $conexion->query("INSERT INTO guiaAplicacion (Tema, FechaApli, Puntaje, TotalPuntaje, 
                    Observacion, ObservacionGeneral, Estatus, idCoordinador, idProfesor, idMateria, idGuiaObservacion) 
                    VALUES ('$tema', '$FechaAplicacion', $AyC, $total, '$observacionAper', '$observacionGeneral', $contratado, $idCoordinador, $idProfesor, $idMateria, $idAyC)");

    }

    $parti = 0;
    $idParti = 0;
    $observacionParti = 0;
    foreach ($_POST['participacion'] as $key => $item) {

        $parti = $item['parti'];
        $idParti = $item['idParti'];
        $observacionParti = $item['observacionparticipacion'];

        $participacion = $conexion->query("INSERT INTO guiaAplicacion (Tema, FechaApli, Puntaje, TotalPuntaje, 
                    Observacion, ObservacionGeneral, Estatus, idCoordinador, idProfesor, idMateria, idGuiaObservacion) 
                    VALUES ('$tema', '$FechaAplicacion', $parti, $total, '$observacionParti', '$observacionGeneral', $contratado, $idCoordinador, $idProfesor, $idMateria, $idParti)");

    }

    $tecnica = 0;
    $idTenica = 0;
    $observacionTecnica = 0;
    foreach ($_POST['tecnica'] as $key => $item) {

        $tecnica = $item['tecnica'];
        $idTecnica = $item['idtecnica'];
        $observacionTecnica = $item['observaciontecnica'];

        $tecnica = $conexion->query("INSERT INTO guiaAplicacion (Tema, FechaApli, Puntaje, TotalPuntaje, 
                    Observacion, ObservacionGeneral, Estatus, idCoordinador, idProfesor, idMateria, idGuiaObservacion) 
                    VALUES ('$tema', '$FechaAplicacion', $tecnica, $total, '$observacionTecnica', '$observacionGeneral', $contratado, $idCoordinador, $idProfesor, $idMateria, $idTecnica)");

    }

    $desempeno = 0;
    $idDesempeno = 0;
    $observacionDes = 0;
    foreach ($_POST['desempeno'] as $key => $item) {

        $desempeno = $item['desemp'];
        $idDesempeno = $item['iddesemp'];
        $observacionDes = $item['observaciondesempeno'];

        $desempeno = $conexion->query("INSERT INTO guiaAplicacion (Tema, FechaApli, Puntaje, TotalPuntaje, 
                    Observacion, ObservacionGeneral, Estatus, idCoordinador, idProfesor, idMateria, idGuiaObservacion) 
                    VALUES ('$tema', '$FechaAplicacion', $desempeno, $total, '$observacionDes', '$observacionGeneral', $contratado, $idCoordinador, $idProfesor, $idMateria, $idDesempeno)");

    }

    if ($apertura && $participacion && $tecnica && $desempeno) {
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="col-auto text-center">
            <p class="fs-5">Realizado con exito</p>
            <i class="bi bi-check2 fs-1 text-success"></i>
        </div>
        </body>';
        header("Refresh:3; ../../Vista/Coordinador/aplicarGuia.php");
    } else {
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="col-auto text-center">
            <p class="fs-5">Algo salió mal</p>
            <i class="bi bi-x-lg fs-1 text-danger"></i>
        </div>
        </body>';
        header("Refresh:3; ../../Vista/Coordinador/aplicarGuia.php");
    }
}

?>