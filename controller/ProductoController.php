<?php
include_once("model/ProductoDAO.php");

class ProductoController {
    public function index() {
        
        $allProducts = ProductoDao::getAllProducts();
        // include "header.php";
        include_once 'view/PanelPedido.php';
        // include "footer.php";
    }

    public function compra() {

        include_once 'view/PanelPedido.php';
    }

    public function eliminar(){
        if(isset($_POST['id'])){
            $id_producto = $_POST['id'];
            ProductoDao::deleteProduct($id_producto);
        } 
        header("Location:".url.'?controller=producto');

    }

    public function editar(){
        $id_producto = $_POST['id'];
        $product = ProductoDao::getProductById($id_producto);

        include_once 'view/editarPedido.php';
        
        //ProductoDao::updateProduct($nombre,$tipo,$id);
    }

    public function actualizar(){
        //falta if
        //$nombre = $_POST['name'];
        //$tipo = $_POST['tipo'];
        //$id = $_POST['id'];
        header("Location:".url.'?controller=producto');
        //ProductoDao::updateProduct($nombre,$tipo,$id);

    }
}




?>