<?php
include_once('model/ProductoDAO.php');
//include_once('model/Pedido.php');


class ProductoController{


    public function index(){
        
        //include del header
        include_once 'view/header.php';
        
        //include de la home
        include_once 'view/home.php';
        
        //include de el footer
        include_once 'view/footer.html';

    }

    
    public function show_carta(){
        //include del header
        include_once 'view/header.php';
        
        //Recojemos todos los productos
        $allProducts = ProductoDAO::getAllProducts();
        //include de la carta
        include_once 'view/carta.php';
        
        //include de el footer
        include_once 'view/footer.html';
    }


    public function login(){
        //include del header
        include_once 'view/header.php';
        
        //include del login
        include_once 'view/login.html';
        
        //include de el footer
        include_once 'view/footer.html';
    }


    
}
?>