<?php
include_once('config/DataBase.php');

class ProductoDAO{
    public static function getAllProducts(){
        
        //Obntengo la lista de las dos clases 
        $listAllProducts = array_merge(ProductoDAO::getAllById('smoothie'),ProductoDAO::getAllById('bol'));

        //devuelvo el resulatado
        return $listAllProducts;
        
    }

    public static function getAllByType($tipo){

        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT  * FROM product WHERE type=?");
        $stmt->bind_param("s", $tipo);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();

        //almaceno el resultado en una lista
        $listaProductos = [];
        while($productoDB = $result->fetch_object($tipo)){
            $listaProductos[] = $productoDB;
        }

        return $listaProductos;
    }

    public static function getAllById($id){

        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT  * FROM product WHERE product_id=?");
        $stmt->bind_param("i", $id);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        
        return $result->fetch_object($id);
        /*
        //almaceno el resultado en una lista
        $listaProductos = [];
        while($productoDB = $result->fetch_objcet($id)){
            $listaProductos[] = $productoDB;
        }

        return $listaProductos;
        */
    }

    public static function deleteProduct($id){
        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("DELETE * FROM product WHERE id=?");
        $stmt->bind_param("i", $id);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        return $result;
    }

    public static function updateProduct($name,$tipo,$id){
        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE product SET name = ?, tipo = ?, id = ?");
        $stmt->bind_param("ssi", $name,$tipo,$id);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        return $result;
    }

}