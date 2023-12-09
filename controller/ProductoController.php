<?php

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
        
        //include de la home
        include_once 'view/carta.html';
        
        //include de el footer
        include_once 'view/footer.html';
    }

}
?>