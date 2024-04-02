<?php

include("../../Modelo/conexion.php");
include("../../Vista/bootstrap.php");
session_start();
//Validar que los campos que fueron enviados del formulario tipo POST no estén vacíos o sean NULL
if (isset($_POST['idUsuario']) && isset($_POST['contra'])) {

    //Obtenemos los valores de formulario y los asignamos a variables

    $idUsuario = htmlspecialchars($_POST['idUsuario'], ENT_QUOTES, 'UTF-8');
    $pass = htmlspecialchars($_POST['contra'], ENT_QUOTES, 'UTF-8');

    $sql = $conexion->query("UPDATE usuario SET Contrasena='$pass' WHERE idUsuario = $idUsuario");


    if ($sql && $_SESSION['tipo'] == 'Coordinador') {
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="col-auto text-center">
            <p class="fs-5">Realizado con exito</p>
            <i class="bi bi-check2 fs-1 text-success"></i>
        </div>
        </body>';
        header("Refresh:3; ../../Vista/Coordinador/perfil.php");
    }

    if ($sql && $_SESSION['tipo'] == 'Profesor') {
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="col-auto text-center">
            <p class="fs-5">Realizado con exito</p>
            <i class="bi bi-check2 fs-1 text-success"></i>
        </div>
        </body>';
        header("Refresh:3; ../../Vista/Profesor/perfil.php");
    }

} else {
    echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
    <div class="col-auto text-center">
        <p class="fs-5">Algo salió mal</p>
        <i class="bi bi-x-lg fs-1 text-danger"></i>
    </div>
    </body>';

    if ($_SESSION['tipo'] == 'Profesor') {
        header("Refresh:3; ../../Vista/Profesor/index.php");
    }

    if ($_SESSION['tipo'] == 'Coordinador') {
        header("Refresh:3; ../../Vista/Coordinador/perfil.php");
    }

}

?>