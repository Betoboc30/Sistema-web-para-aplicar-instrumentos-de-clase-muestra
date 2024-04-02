<?php
include("../../Modelo/conexion.php");
include("../../Vista/bootstrap.php");
session_start();

if (isset($_POST['respuesta'])) {
    $usuario = $_SESSION['usuario'];
    $res = 0;
    $id = 0;
    foreach ($_POST['respuesta'] as $key => $item) {

        $res = $item['res'];
        $id = $item['id'];

        $sql = $conexion->query("INSERT INTO respuesta (Respuesta, idEncuesta, idUsuario) VALUES ('$res', $id, $usuario)");

    }

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