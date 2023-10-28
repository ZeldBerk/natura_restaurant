<?php
include_once("model/Producto.php");

class Smoothie extends Producto {

   public function __construct(){
   } 
   
/*
    public function calculaPrecioTotal($numDias){
        $precioTotal = $numDias*self::PRECIOSMOOTHIE;
        return $precioTotal;
    }

    public function devuelvePrecioDia(){
        return self::PRECIOSMOOTHIE;
    }
*/
}