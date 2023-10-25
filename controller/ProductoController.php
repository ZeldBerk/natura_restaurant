<?php
//Creamos el controlador de pedidos
include_once("model/ProductoDAO.php");

class productoController{

    public function index(){
        //Llamo al modelo para obtrener los datos
        $allProducts = ProductoDao::getAllProducts();
        //cabecera
        include_once '';
        //panel
        include_once '';
        //footer
        include_once '';
    }


        public function compra(){
            echo 'Pagina de compra';
        }

        public function producto(){
            echo 'Pagina de producto';
        }
}




?>