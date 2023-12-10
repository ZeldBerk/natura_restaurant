<?php
include_once('model/ProductoDAO.php');
include_once('model/Pedido.php');


class ProductoController{


    //carga de la pagina home
    public function index(){
        
        //iniciamos la session para guadar cosas en el carrito
        session_start();

        if(!isset($_SESSION['carrito'])){
            $_SESSION['carrito'] = array();
        }else{
            if(isset($_POST['id'])){
                $id_product = $_POST['id'];

                $product = ProductoDAO::getProductById($id_product);

                $pedido = new Pedido($product);

                array_push($_SESSION['carrito'], $pedido);
            }
        }

        //include del header
        include_once 'view/header.php';
        
        //include de la home
        include_once 'view/home.php';
        
        //include de el footer
        include_once 'view/footer.html';

    }

    
    //Carga la pagina de carta y elementos necessarios de esta
    public function show_carta(){
        session_start();
        //include del header
        include_once 'view/header.php';
        
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
        include_once 'view/header.php';
        
        //include del login
        include_once 'view/login.php';
        
        //include de el footer
        include_once 'view/footer.html';
    }


    //Funcion para iniciar sesion 
    public function singIn(){

        //Si se pasan los dos parametros correctamente empezamos el login
        if(isset($_POST['inicioEmail'], $_POST['inicioPassword'])){
            //Guardamos los valores que introduce el usuario en variables
            $correo = $_POST['inicioEmail'];
            $contra = $_POST['inicioPassword'];

            //realizamos la consulta del correo en la base de datos
            $usuario = ProductoDAO::getUserByEmail($correo, $contra);
            
            if ($contra === $usuario['contra'] ) {
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $usuario['nombre'];
                $_SESSION['id'] = $usuario['user_id'];

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
        include_once 'view/header.php';
        
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