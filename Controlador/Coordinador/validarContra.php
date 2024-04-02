<?php
session_start();
include_once("../../Modelo/conexion.php");

if (!empty($_POST['pass'])) {

    $id = htmlspecialchars($_POST['idUsuario'], ENT_QUOTES, 'UTF-8');
    $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');

    $sql = $conexion->query("SELECT Contrasena FROM usuario WHERE idUsuario = $id");
    $consulta = ($sql->fetch_object());

    if ($consulta->Contrasena == $pass) {
        echo '<i class="bi bi-check-circle"></i>';
    } else {
        echo "La contraseña no coindice con nuestros registros";

    }
}else{
    echo "Por favor escribe una contraseña ";

}


?>