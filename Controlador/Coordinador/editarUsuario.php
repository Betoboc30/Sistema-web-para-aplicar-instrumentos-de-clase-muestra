<?php

include("../../Modelo/conexion.php");
include("../../Vista/bootstrap.php");

//Validar que los campos que fueron enviados del formulario tipo POST no estén vacíos o sean NULL
if (
    isset($_POST['tipo']) && isset($_POST['nombre'])
    && isset($_POST['paterno']) && isset($_POST['grado'])
    && isset($_POST['idUsuario']) && isset($_POST['nacimiento'])
    && isset($_POST['correo']) /*&& isset($_POST['contra'])*/
) {

    //Obtenemos los valores de formulario y los asignamos a variables
    $tipo = htmlspecialchars($_POST['tipo'], ENT_QUOTES, 'UTF-8');
    $nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
    $paterno = htmlspecialchars($_POST['paterno'], ENT_QUOTES, 'UTF-8');
    $materno = htmlspecialchars($_POST['materno'], ENT_QUOTES, 'UTF-8');
    $grado = htmlspecialchars($_POST['grado'], ENT_QUOTES, 'UTF-8');
    $idUsuario = htmlspecialchars($_POST['idUsuario'], ENT_QUOTES, 'UTF-8');
    $nacimiento = htmlspecialchars($_POST['nacimiento'], ENT_QUOTES, 'UTF-8');
    $correo = htmlspecialchars($_POST['correo'], ENT_QUOTES, 'UTF-8');

    //Mover la imagen al servidor
    $carpeta_destino = "../../Public/";
    $nombre_img1 = $_FILES['firma']['name'];


    $archivo_destinoimg1 = $carpeta_destino . basename($nombre_img1);

    $tipo_archivo1 = strtolower(pathinfo($archivo_destinoimg1, PATHINFO_EXTENSION));

    $firma = "";

    //Movemos la imagen a la carpeta
    if (move_uploaded_file($_FILES['firma']['tmp_name'], $archivo_destinoimg1)) {
        $firma = $nombre_img1;
    }

    if ($tipo == 'Coordinador') {

        $cargo = htmlspecialchars($_POST['cargo'], ENT_QUOTES, 'UTF-8');
        $academia = htmlspecialchars($_POST['academia'], ENT_QUOTES, 'UTF-8');

        if (isset($_POST['cargo']) && isset($_POST['academia']) && $firma != "") {

            $sql = $conexion->query("UPDATE usuario SET Nombre='$nombre',ApellidoP='$paterno',ApellidoM='$materno',FechaNac='$nacimiento',GradoA='$grado',Correo='$correo', Firma='$firma', Cargo='$cargo', idAcademia = $academia  WHERE idUsuario = $idUsuario");

        } elseif (isset($_POST['cargo']) && isset($_POST['academia']) && empty($firma)) {

            $sql = $conexion->query("UPDATE usuario SET Nombre='$nombre',ApellidoP='$paterno',ApellidoM='$materno',FechaNac='$nacimiento',GradoA='$grado',Correo='$correo', Cargo='$cargo', idAcademia = $academia  WHERE idUsuario = $idUsuario");
        }

        if ($sql) {
            echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="col-auto text-center">
            <p class="fs-5">Realizado con exito</p>
            <i class="bi bi-check2 fs-1 text-success"></i>
        </div>
        </body>';
            header("Refresh:3; ../../Vista/Coordinador/perfil.php");
        }

    } else {

        if ($firma != "") {

            $sql = $conexion->query("UPDATE usuario SET Nombre='$nombre',ApellidoP='$paterno',ApellidoM='$materno',FechaNac='$nacimiento',GradoA='$grado',Correo='$correo', Firma='$firma' WHERE idUsuario = $idUsuario");

        } elseif (empty($firma)) {

            $sql = $conexion->query("UPDATE usuario SET Nombre='$nombre',ApellidoP='$paterno',ApellidoM='$materno',FechaNac='$nacimiento',GradoA='$grado',Correo='$correo' WHERE idUsuario = $idUsuario");

        }


        if ($sql) {
            echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
            <div class="col-auto text-center">
                <p class="fs-5">Realizado con exito</p>
                <i class="bi bi-check2 fs-1 text-success"></i>
            </div>
            </body>';
            header("Refresh:3; ../../Vista/Profesor/perfil.php");
        }
    }


} else {
    echo '<body class="m-0 vh-100 row justify-content-center align-items-center">
    <div class="col-auto text-center">
        <p class="fs-5">Algo salió mal</p>
        <i class="bi bi-x-lg fs-1 text-danger"></i>
    </div>
    </body>';
    header("Refresh:3; ../../Vista/Profesor/perfil.php");
}

?>