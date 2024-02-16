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
                
                $existItem = null;
                foreach($_SESSION['carrito'] as $item){
                    if($item->getProducto()->getIdProducto() == $id_product){
                        $existItem = $item;
                    }
                }

                if($existItem){
                    $existItem->setCantidad($existItem->getCantidad()+1);
                }else{
                    $pedido = new Pedido($product);
                    array_push($_SESSION['carrito'], $pedido);
                }
                    
                header("Location:".url.'?controller=producto&action=show_carta');
            }

        }


        // Verificamos si el usuario está autenticado
        if(isset($_SESSION['loggedin'])){
            //comprobamos is existe la cookie con su id
            $user_id = $_SESSION['loggedin']['id'];
            if(isset($_COOKIE['ultimo_pedido_'.$user_id])){
                //si esxiste mostramos el boton para recuperar el ultimo pedido
                include_once('view/recuperarPedido.php');
            }
        }

        //include del header
        GeneralFunctions::header();

        // Include de la home
        include_once 'view/home.php';

        // Include del footer
        include_once 'view/footer.html';
    }

    public function recuperarPedido(){
        session_start();
        $user_id = $_SESSION['loggedin']['id'];
        $ultimoPedido = $_COOKIE['ultimo_pedido_'.$user_id];
        $pedidos = ProductoDAO::getUltPedido($ultimoPedido);

        if(!isset($_SESSION['carrito'])){
            $_SESSION['carrito'] = array();
        }
        
        foreach($pedidos as $pedido){
            $producto_id = $pedido['prodcutoId'];
            $cantidad = $pedido['cantidad'];

            $product = ProductoDAO::getProductById($producto_id);
            $pedido_carrito = new Pedido($product);
            $pedido_carrito->setCantidad($cantidad);
            array_push($_SESSION['carrito'], $pedido_carrito);

            header("Location:".url.'?controller=producto&action=carrito');
        }
    }


    //Carga la pagina de carta y elementos necessarios de esta
    public function show_carta(){
        session_start();
        //include del header
        GeneralFunctions::header();
        
        //Recojemos todos los productos para mostrarlos en el carrito
        $allProducts = ProductoDAO::getAllProducts();

        //include de la carta
        // Verificamos si el usuario está autenticado para insertar una carta u otro
        if(isset($_SESSION['loggedin'])){
            // verficamos si el usuario es admin
            $rol = $_SESSION['loggedin']['rol'];
            if($rol == "admin"){
                //include de la carta del admin
                include_once 'view/carta_admin.php';
            }else{
                //si no es admin se inserta la carta normal
                include_once 'view/carta.php';
            }
        }else{
            // Insertamos la carta normal si la sesión no está iniciada
            include_once 'view/carta.php';
        }
        
        //include de el footer
        include_once 'view/footer.html';
    }


    //carga de la pagina de carrito
    public function carrito(){
        session_start();
        if(isset($_SESSION['carrito'])){
            //gestion de las cantidades de cada producto
            if(isset($_POST['Add'])){
                //añadimos uno a la cantidad
                $pedido = $_SESSION['carrito'][$_POST['Add']];
                $pedido->setCantidad($pedido->getCantidad()+1);
            }else if(isset($_POST['Del'])){
                //quitamos uno a la cantidad
                $pedido = $_SESSION['carrito'][$_POST['Del']];
                if($pedido->getCantidad()==1){
                    //elimnamos el prodcuto del carrito
                    unset($_SESSION['carrito'][$_POST['Del']]);
                    //debemos re-indexar el array
                    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
                }else{
                    //quitamos uno a la cantidad
                    $pedido->setCantidad($pedido->getCantidad()-1);
                }
            //eliminamos el preducto del carrito sin importar la cantidad
            }else if(isset($_POST['delete'])){
                unset($_SESSION['carrito'][$_POST['delete']]);
                //debemos re-indexar el array
                $_SESSION['carrito'] = array_values($_SESSION['carrito']);
            }

            //si el carrito esta vacio redirigimos a la home
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
        }else{
            header("Location:".url.'?controller=producto');
        }
    }


    public function finalizarCompra(){
        session_start();
        // Recolectamos los valores que queremos insertar en la base de datos
        $user_id = $_SESSION['loggedin']['id'];
        $estado = "finalizado";
        $fecha_actual = date('Y-m-d');
        $total = $_POST['precioConDescuento'];
        $puntos_sumar = CalcularPrecios::calcularPuntosPedido(CalcularPrecios::calculdorPrecioPedido($_SESSION['carrito']));        
        $puntos_restar = $_POST['puntosUtilizados']; // Puntos que se han usado en la compra
        $propina  = $_POST['propinaAplicada'];
    
        // Pasamos los datos a la función para que haga el insert y nos devuelva el id
        $ultimoPedidoId = ProductoDAO::insertPedido($user_id, $estado, $fecha_actual, $total, $_SESSION['carrito'], $puntos_sumar, $puntos_restar, $propina);
        
        ProductoDAO::restarPuntosUser($puntos_restar, $user_id);        
        // Guardamos el último ID de pedido como cookie asociada al usuario
        setcookie('ultimo_pedido_'.$user_id, $ultimoPedidoId, time() + 120, "/");
        
        echo json_encode(['success' => true]);

        unset($_SESSION['carrito']);

        exit();
    }
    


    // mostrar la lista de pedidos
    public function show_pedidos(){
        session_start();
        //include del header
        GeneralFunctions::header();

        //Recojemos todos los pedidos para mostrarlos
        $user_id = $_SESSION['loggedin']['id'];
        $allPedidos = ProductoDAO::getAllPedidos($user_id);

        //include del login
        include_once 'view/pedidos_user.php';
        
        //include de el footer
        include_once 'view/footer.html';
    }


    //mostrar detalles del pedido
    public function detalles_pedido(){
        
        //Comprobamos que nos pasen el id
        if (isset($_POST['id'])){
            session_start();
            
            //Recojemos todos los id de los productos 
            $id_pedido = $_POST['id'];
            $productos = ProductoDAO::getUltPedido($id_pedido);

            if (!isset($_SESSION['pedidos'])) {
                // Si no existe pedidos o está vacío, lo creamos o lo dejamos como está
                $_SESSION['pedidos'] = array();
            }else{
                //so existe vaciamos la sesion
                $_SESSION['pedidos'] = array();
            }

            foreach($productos as $producto){
                $producto_id = $producto['prodcutoId'];
                $cantidad = $producto['cantidad'];

                $product = ProductoDAO::getProductById($producto_id);
                $pedido_carrito = new Pedido($product);
                $pedido_carrito->setCantidad($cantidad);
                array_push($_SESSION['pedidos'], $pedido_carrito);

            }
            header("Location:".url.'?controller=producto&action=detalles_prodcuto');
        }
    }


    //Mostramos el listado de productos
    public function detalles_prodcuto(){
        session_start();

        //include del header
        GeneralFunctions::header();

        //include de los detalles de los productos
        include_once 'view/detalles_productos_pedido.php';
        
        //include de el footer
        include_once 'view/footer.html';
    }

    
    //funciones de editar insertar y eliminar productos del admin
    public function editar(){

        $id_producto = $_POST['id'];
        $product = ProductoDao::getProductById($id_producto);

        //include del header
        GeneralFunctions::header();

        include_once 'view/editar_producto.php';
        
        //include de el footer
        include_once 'view/footer.html';
    }


    //funcion para actualiza los productos
    public function saveChanges(){

        //Verificamos que se pase lo necesario por POST
        if (isset($_POST['id_producto']) && isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['tipo']) && isset($_POST['categoria'])){

            //Guardamos los valores recogido por post en variables
            $id = $_POST['id_producto'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $tipo = $_POST['tipo'];
            $categoria = $_POST['categoria'];
            $descripcion = $_POST['descripcion'];
            $imagen = $_POST['imagen'];

            //Pasamos los valores a la funcion para que actualize los productos
            ProductoDAO::updateProduct($id,$nombre,$precio,$descripcion,$tipo,$categoria,$imagen);
            
        }
        
        //recargamos la carta
        header("Location:".url.'?controller=producto&action=show_carta');
    }
    

    //mostrar formulario para insertar producto nuevo
    public function insertar(){

        //include del header
        GeneralFunctions::header();

        include_once 'view/insertarProducto.php';
        
        //include de el footer
        include_once 'view/footer.html';
        
    }


    //funcion que inserta un nuevo producto en la base de datos
    public function insertarbbdd(){

        //Verificamos que se pase lo necesario por POST
        if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['tipo']) && isset($_POST['categoria'])){

            //Guardamos los valores recogido por post en variables
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $tipo = $_POST['tipo'];
            $categoria = $_POST['categoria'];
            $descripcion = $_POST['descripcion'];
            $imagen = $_POST['imagen'];

            //Pasamos los valores a la funcion para que actualize los productos
            ProductoDAO::insertarbbdd($nombre,$precio,$descripcion,$tipo,$categoria,$imagen);
            
        }

        //recargamos la carta
        header("Location:".url.'?controller=producto&action=show_carta');

    }


    //funcion que elimina un producto
    public function delete(){

        //verificamos que se nos pase el id del producto
        if(isset($_POST['id'])){
            
            //guardamos el id y se lo pasamos a la funcion para que lo elimine
            $id_producto = $_POST['id'];
            ProductoDao::deleteProduct($id_producto);
        } 

        //recargamos la carta
        header("Location:".url.'?controller=producto&action=show_carta');
    }

    public function detallesQR(){
        session_start();

        //include del header
        GeneralFunctions::header();

        //Comprobamos que nos pasen el id
        if (isset($_GET['idUsuario'])){

            //recojemos id de usuario
            $idUsuario = $_GET['idUsuario'];

            //recojemos el id del ultimo pedido realizado por el usuario
            $result_array = ProductoDAO::getUltPedidoUser($idUsuario);
            //guardo los datos del array en variables
            $id_pedido = $result_array['id_pedido'];
            $puntos_usados = $result_array['puntos_usados'];
            $propina = $result_array['propina'];
            $total = $result_array['total'];
            $date_pedido = $result_array['date_pedido'];
            //Recojemos todos los id de los productos
            $productos = ProductoDAO::getUltPedido($id_pedido);

            if (!isset($_SESSION['pedidos'])) {
                // Si no existe pedidos o está vacío, lo creamos o lo dejamos como está
                $_SESSION['pedidos'] = array();
            }else{
                //so existe vaciamos la sesion
                $_SESSION['pedidos'] = array();
            }

            foreach($productos as $producto){
                $producto_id = $producto['prodcutoId'];
                $cantidad = $producto['cantidad'];

                $product = ProductoDAO::getProductById($producto_id);
                $pedido_carrito = new Pedido($product);
                $pedido_carrito->setCantidad($cantidad);
                array_push($_SESSION['pedidos'], $pedido_carrito);

            }
            //include vista detalles pedido
            include_once 'view/detalles_pedido_qr.php';
        }
        
        //include de el footer
        include_once 'view/footer.html';
    }
}
?>