<?php
include_once('config/dataBase.php');

class ProductoDAO{
    public static function getAllProducts(){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM productos");

    }
}