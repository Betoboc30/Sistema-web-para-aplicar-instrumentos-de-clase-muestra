<?php
//Incluimos la conexion a la base de datos para poder validar los datos
include_once("../Modelo/conexion.php");

    //Validar que los campos de usuario y contraseña no sean vacíos o nulos.
    if (isset($_POST['correo']) && isset($_POST['pass'])) {
        //Asigamos el valor de los campos a las variables
        $correo = htmlentities($_POST['correo']);
        //$pass = md5(htmlentities($_POST['pass'])); //Descomenta esta línea cuando hayas actualizado las password
        $pass = htmlentities($_POST['pass']); //Borra esta cuando hayas actualizado las password

        // Obtener el usuario y el tipo de usuario de la base de datos
        $sql = 'SELECT idUsuario, TipoUsuario FROM Usuario WHERE Correo = ? AND Contrasena = ?';
        $consulta = $conexion->prepare($sql);
        $consulta->bind_param('ss', $correo, $pass);

        //Ejecuta la consulta
        $consulta->execute();
        $resultado = $consulta->get_result()->fetch_assoc();
        //Validar sí el resultado es diferente de nulo
        if (!is_null($resultado)) {
            //Inicia una nueva sesión y guardamos los el id el usuario y el tipo de usuario en
            //variables de tipo Session.
            session_start();
            $_SESSION['usuario'] = $resultado['idUsuario'];
            $_SESSION['tipo'] = $resultado['TipoUsuario'];
            //Sí el usuario es tipo 1 redirige a la página del administrador
            if($_SESSION['tipo']=='Administrador'){
                header("location: ../Vista/Administrador/index.php");
            }else if($_SESSION['tipo']=='Coordinador'){
                //Si es diferente de 2 redirige a la página de inicio
                header("location: ../Vista/Coordinador/index.php");
            }else{
                //Si es diferente de 3 redirige a la página de inicio
                header("location: ../Vista/Profesor/index.php");
            }
            //Detenmos el script
            die();
        } else {
            //Sí las credenciales para el inicio de sesión muestra el siguiente error.
            include_once('../Vista/errorInicioSesion.php');
        }

    
    }

?>