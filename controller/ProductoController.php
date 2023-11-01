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
        
    }

    public function actualizar(){

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
        
        header("Location:".url.'?controller=producto');
    
    }
}




?>