<?php
include_once("model/ProductoDAO.php");

class ProductoController {
    public function index() {
        // Descomenta y completa la lógica para obtener y mostrar todos los productos.
        // $allProducts = ProductoDao::getAllProducts();
        // include "header.php";
        // include "panel.php";
        // include "footer.php";
        echo 'estas en el index';
    }

    public function compra() {
        echo 'Página de compra';
    }

    public function eliminar(){
        echo 'Producto a Eliminar';
        //falta if
        $id_producto = $_POST['id'];
        ProductoDao::deleteProduct($id_producto);
        header("Location:".url.'?controller=producto');

    }

    public function editar(){
        echo 'Actualizar producto';
        $id_producto = $_POST['id'];

        include_once 'view/editarPedido.php';
        
        //ProductoDao::updateProduct($nombre,$tipo,$id);
    }

    public function actualizar(){
        echo 'Actualizar producto';
        //falta if
        $nombre = $_POST['name'];
        $tipo = $_POST['tipo'];
        $id = $_POST['id'];

        //ProductoDao::updateProduct($nombre,$tipo,$id);

    }
}




?>