<?php
include_once('model/ProductoDAO.php');
include_once('model/Pedido.php');
include_once('utils/CalcularPrecios.php');
include_once 'utils/GeneralFunctions.php';


class ProductoController{


    //cargamos la pagina de home
    public function index(){
        // Iniciamos la sesión para guardar cosas en el carrito y verificar si el usuario ha iniciado sesión
        session_start();

        if(isset($_POST['id'])){
            // Se está intentando agregar un producto al carrito

            // Verificamos si el usuario está autenticado
            if(!isset($_SESSION['loggedin'])){
                // Redirigir a la página de inicio de sesión si no está autenticado
                header("Location:".url.'?controller=user&action=login');
                return; // Terminamos la ejecución para evitar que se siga procesando la solicitud
            }else{
                // El usuario está autenticado, continuamos con la lógica para agregar al carrito
                if(!isset($_SESSION['carrito'])){
                    $_SESSION['carrito'] = array();
                }
    
                $id_product = $_POST['id'];
                $product = ProductoDAO::getProductById($id_product);
                $pedido = new Pedido($product);
                array_push($_SESSION['carrito'], $pedido);
                header("Location:".url.'?controller=producto&action=show_carta');
            }

        }

        //include del header
        GeneralFunctions::header();

        // Include de la home
        include_once 'view/home.php';

        // Include del footer
        include_once 'view/footer.html';
    }


    //Carga la pagina de carta y elementos necessarios de esta
    public function show_carta(){
        session_start();
        //include del header
        GeneralFunctions::header();
        
        //Recojemos todos los productos para mostrarlos en el carrito
        $allProducts = ProductoDAO::getAllProducts();
        //include de la carta
        include_once 'view/carta.php';
        
        //include de el footer
        include_once 'view/footer.html';
    }


    //carga de la pagina de carrito
    public function carrito(){
        session_start();

        //gestion de las cantidades de cada producto
        if(isset($_POST['Add'])){
            //añadimos uno a la cantidad
            $pedido = $_SESSION['carrito'][$_POST['Add']];
            $pedido->setCantidad($pedido->getCantidad()+1);
        }else if(isset($_POST['Del'])){
            //quitamos uno a la cantidad
            $pedido = $_SESSION['carrito'][$_POST['Del']];
            if($pedido->getCantidad()==1){
                unset($_SESSION['carrito'][$_POST['Del']]);
                //debemos re-indexar el array
                $_SESSION['carrito'] = array_values($_SESSION['carrito']);
            }else{
                $pedido->setCantidad($pedido->getCantidad()-1);
            }
        }else if(isset($_POST['delete'])){
            unset($_SESSION['carrito'][$_POST['delete']]);
            //debemos re-indexar el array
            $_SESSION['carrito'] = array_values($_SESSION['carrito']);
        }

        if ((count($_SESSION['carrito'])) < 1){
            header("Location:".url.'?controller=producto');
            return;
        }

        //include del header
        GeneralFunctions::header();

        //include del login
        include_once 'view/carrito.php';
        
        //include de el footer
        include_once 'view/footer.html';
    }


    //finalizar la compra
    public function finalizarCompra(){
        session_start();
        //recojemos los valores que queremos insertar en la base de datos
        $user_id = $_SESSION['loggedin']['id'];
        $estado = "finalizado";
        $fecha_actual = date('Y-m-d');
        $total = CalcularPrecios::calculdorPrecioPedido($_SESSION['carrito']);
        
        //pasamos los datos a la funcion para que haga el insert i nos devuelva el id
        $ultimoPedidoId = ProductoDAO::insertPedido($user_id, $estado, $fecha_actual, $total, $_SESSION['carrito']);

        // guardamos el último ID de pedido como cookie asociada al usuario
        setcookie('ultimo_pedido_'.$user_id, $ultimoPedidoId, time() + 120, "/");

        //eliminamos el carrito, y lo dejamos vacio
        unset($_SESSION['carrito']);

        //redirigimos al pagina home despues de cerrar el pedido
        header("Location:".url.'?controller=producto');
    }

    
    
}
?>