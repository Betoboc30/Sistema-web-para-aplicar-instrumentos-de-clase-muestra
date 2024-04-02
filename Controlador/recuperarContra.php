<?php

if(isset($_POST["btn1"])){
    if(isset($_POST['correo'])){
    $contra = generatePassword(8);
    $correo = htmlspecialchars($_POST['correo'], ENT_QUOTES,'UTF-8');
    $asunto    = 'Recuperacion de contraseña';
    $descripcion   = 'Estimado usuario tu nueva contraseña es: '.$contra;
    $de = 'From: UPEMOR';
    $contramd5 = md5($contra);
    
    $sql=$conexion->query("UPDATE usuario SET Contrasena='$contramd5' WHERE Correo LIKE '%$correo%'");      
        if($sql){
            if (mail($correo, $asunto, $descripcion, $de)){  
              echo '<div class="alert alert-success text-center">Revisa tu correo hemos enviado tu nueva contraseña.</div>';
            }else{
              echo '<div class="alert alert-danger text-center">No se pudo enviar el correo</div>';
            }

        }else{
          echo '<div class="alert alert-danger text-center">El correo que has ingresado no existe.</div>';
        }
    }
}

function generatePassword($length)
{
    $key = "";
    $pattern = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.-_*?";
    $max = strlen($pattern)-1;
    for($i = 0; $i < $length; $i++){
        $key .= substr($pattern, mt_rand(0,$max), 1);
    }
    return $key;
}

?>

