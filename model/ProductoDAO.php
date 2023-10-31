<?php
include_once('config/DataBase.php');
include_once('model/Smoothie.php');
include_once('model/Boles.php');


class ProductoDAO{


    public static function getAllProducts(){
        
        //Obntengo la lista de las dos clases 
        $listAllProducts = array_merge(ProductoDAO::getAllByType('Smoothie'),ProductoDAO::getAllByType('Boles'));

        //devuelvo el resulatadoSmoothie
        return $listAllProducts;
        
    }


    public static function getAllByType($tipo){

        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT * FROM productos WHERE tipo=?");
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


    public static function getProductById($id){

        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT tipo FROM productos WHERE id_producto=?");
        $stmt->bind_param("i", $id);

        //Ejecutamos la consulta y guardamos el 'tipo' para poder indicar-le una clase al fetch_object
        $stmt->execute();
        $tipo = $stmt->get_result()->fetch_object()->tipo;

        //Preparamos la consulta del producto
        $stmt = $con->prepare("SELECT * FROM productos WHERE id_producto=?");
        $stmt->bind_param("i", $id);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        //Cerramos la conexión
        $con->close();

        //Almacenamos el resultado en una lista y devolvemos el resultado
        $producto = $result->fetch_object($tipo);

        return $producto;
    }


    public static function deleteProduct($id_producto){
        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("DELETE FROM productos WHERE id_producto=?");
        $stmt->bind_param("i", $id_producto);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        return $result;
    }

    //falta poner los valores correctos de la base de datos de natura restaurant
    public static function updateProduct($nombre,$tipo,$id){
        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE productos SET nombre = ?, tipo = ?, id = ?");
        $stmt->bind_param("ssi", $nombre,$tipo,$id);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        return $result;
    }

}