<?php
    $usuario = "wero"; 
    $password = "1234_0123";   
    $servidor = "localhost"; 
    $basededatos ="claseprueba"; 
     
    $conexion = mysqli_connect  ($servidor,$usuario,$password) or die ("Error con el servidor de la Base de datos"); 
    $db = mysqli_select_db($conexion, $basededatos) or die ("Error conexion al conectarse a la Base de datos");

    $conexion-> set_charset("utf8");

?>