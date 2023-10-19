<?php
//Creamos el controlador de pedidos
include_once("model/ProductoDAO.php");
class pedidoController{

    public function index(){
        //cabecera

        //panel

        ProductoDAO::getAllProducts();
        //footer
        echo 'Pagina principal pedidos';
    }


        public function compra(){
            echo 'Pagina de compra';
        }
}




?>