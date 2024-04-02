<?php
include("../../Modelo/conexion.php");
include("../../Vista/bootstrap.php");

//Validar que los campos que fueron enviados del formulario tipo POST no estén vacíos o sean NULL
if (isset($_POST['idUsuario'])) {
    $id = htmlspecialchars($_POST['idUsuario'], ENT_QUOTES, 'UTF-8');
    $sql = $conexion->query("DELETE FROM usuario WHERE idUsuario=$id");

    if ($sql) {
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                    <div class="col-auto text-center">
                        <p class="fs-5">Realizado con exito</p>
                        <i class="bi bi-check2 fs-1 text-success"></i>
                    </div>
                    </body>';
        header("Refresh:3; ../../Vista/Administrador/gestionUsuario.php");

    } else {
        echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
                    <div class="col-auto text-center">
                        <p class="fs-5">Algo salió mal</p>
                        <i class="bi bi-x-lg fs-1 text-danger"></i>
                    </div>
                    </body>';
        header("Refresh:3; ../../Vista/Administrador/gestionUsuario.php");

    }
}

?>