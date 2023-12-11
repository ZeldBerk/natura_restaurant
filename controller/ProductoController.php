<?php
include_once('model/ProductoDAO.php');
include_once('model/Pedido.php');


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
                header("Location:".url.'?controller=producto&action=login');
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

        //incluimos el header
        $this->header();

        // Include de la home
        include_once 'view/home.php';

        // Include del footer
        include_once 'view/footer.html';
    }

    
    //funcion para poner el header
    public function header(){
        // Verificamos si el usuario está autenticado para insertar un header u otro
        if(!isset($_SESSION['loggedin'])){
            // Insertamos el header 1 si no se ha hecho el inicio de sesión
            include_once 'view/header.php';
        } else {
            // Insertamos el header 2 si la sesión está iniciada
            include_once 'view/header2.php';
        }
    }


    //Carga la pagina de carta y elementos necessarios de esta
    public function show_carta(){
        session_start();
        //include del header
        $this->header();
        
        //Recojemos todos los productos para mostrarlos en el carrito
        $allProducts = ProductoDAO::getAllProducts();
        //include de la carta
        include_once 'view/carta.php';
        
        //include de el footer
        include_once 'view/footer.html';
    }


    //carga de la pagina de login y gestion de este
    public function login(){
        session_start();
        //include del header
        $this->header();
        
        //include del login
        include_once 'view/login.php';
        
        //include de el footer
        include_once 'view/footer.html';
    }


    //Funcion para iniciar sesion 
    public function singIn(){
        session_start();
        //Si se pasan los dos parametros correctamente empezamos el login
        if(isset($_POST['inicioEmail'], $_POST['inicioPassword'])){
            //Guardamos los valores que introduce el usuario en variables
            $correo = $_POST['inicioEmail'];
            $contra = $_POST['inicioPassword'];

            //realizamos la consulta del correo en la base de datos
            $usuario = ProductoDAO::getUserByEmail($correo, $contra);
            
            if ($contra === $usuario['contra'] ) {

                $nombre = $usuario['nombre'];
                $user_id = $usuario['user_id'];
                
                $_SESSION['loggedin']['name'] = $nombre;
                $_SESSION['loggedin']['id'] = $user_id;

                header("Location:".url.'?controller=producto');

            } else {
                // usuario incorrecto
                header("Location:".url.'?controller=producto&action=login');

            }
        }
    }


    //Funcion para registrarse
    public function register(){

    }


    //carga de la pagina de carrito
    public function carrito(){
        session_start();
        //include del header
        $this->header();
        
        //include del login
        include_once 'view/carrito.html';
        
        //include de el footer
        include_once 'view/footer.html';
    }


    /** 
    public function addCarrito(){
        
    }
    */    
}
?>