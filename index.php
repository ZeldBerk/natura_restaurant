<?php
include_once 'controller/ProductoController.php';
include_once 'config/Parameters.php';

if(!isset($GET['controller'])){
    //Si no se pasa nada, se mostrara pagina principal de pedidos
    header("Location:".url.'?controller=producto');
}else{
    $nombre_controller = $GET['controller'].' Controller ';

    if(class_exists($nombre_controller)){
        //Miramos si nos pasa una accion
        //si no mostramos por defecto

        $controller = new $nombre_controller();

        if(isset($GET['action']) && method_exists($controller, $_GET['action'])){
            $action = $GET['action'];
        }else{
            $action = action_default;
        }
        $controller->$action();
    }else{
        header("Location:".url.'?controller=producto');
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natura Restaurant</title>
</head>
<body>
    <h1>Natura Restaurant</h1>    
</body>
</html>
