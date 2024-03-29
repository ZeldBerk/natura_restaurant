<?php
include_once 'controller/ProductoController.php';
include_once 'controller/UserController.php';
include_once 'controller/ReviewController.php';
include_once 'controller/APIController.php';
include_once 'config/parameters.php';

if(!isset($_GET['controller'])){
    //Si no se pasa nada, se mostrara pagina principal de pedidos
    header("Location:".url.'?controller=producto');
}else{
    $nombre_controller = $_GET['controller'] . 'Controller';

    if(class_exists($nombre_controller)){
        //Miramos si nos pasa una accion
        //si no mostramos por defecto
        $controller = new $nombre_controller();

        if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
            $action = $_GET['action'];
        }else{
            $action = action_default;
        }
        $controller->$action();
    }else{
        header("Location:".url.'?controller=producto');
    }

}

?>