<?php
include_once('config/DataBase.php');

class ProductoDAO{
    public static function getAllProducts(){
        $con = DataBase::connect();
        //if($result)

    }

    public static function getAllByType($tipo){

        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT  * FROM product WHERE tipo=?");
        $stmt->bind_param("s", $tipo);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();

        //almaceno el resultado en una lista
        $listaProductos = [];
        while($productoDB = $result->fetch_objcet($tipo)){
            $listaProductos[] = $productoDB;
        }

        return $listaProductos;
    }

}