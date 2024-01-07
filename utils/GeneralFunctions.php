<?php

class GeneralFunctions{
    //funcion para poner el header
    public static function header(){
        // Verificamos si el usuario está autenticado para insertar un header u otro
        if(!isset($_SESSION['loggedin'])){
            // Insertamos el header 1 si no se ha hecho el inicio de sesión
            include_once 'view/header.php';
        } else {
            // Insertamos el header 2 si la sesión está iniciada
            include_once 'view/header2.php';
        }
    }
}

?>