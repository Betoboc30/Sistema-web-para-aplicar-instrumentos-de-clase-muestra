<?php

include("../../Modelo/conexion.php");
include("../../Vista/bootstrap.php");

session_start();
//Validar que los campos que fueron enviados del formulario tipo POST no estén vacíos o sean NULL
if (isset($_POST['idUsuario'])) {

    $idUsuario = htmlspecialchars($_POST['idUsuario'], ENT_QUOTES, 'UTF-8');
    $_SESSION['tipo'];

    //Mover la imagen al servidor
    $carpeta_destino = "../../Public/";
    $nombre_img1 = $_FILES['perfil']['name'];


    $archivo_destinoimg1 = $carpeta_destino . basename($nombre_img1);

    $tipo_archivo1 = strtolower(pathinfo($archivo_destinoimg1, PATHINFO_EXTENSION));

    $firma = "";

    //Movemos la imagen a la carpeta
    if (move_uploaded_file($_FILES['perfil']['tmp_name'], $archivo_destinoimg1)) {
        $firma = $nombre_img1;
    }

    $sql = $conexion->query("UPDATE usuario SET fotoperfil='$firma'  WHERE idUsuario = $idUsuario");

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