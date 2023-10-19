<?php
include_once("model/Producto.php");

class Boles extends Producto {
    private $genero;


   public function __construct($id, $name, $tipo, $genero){
        parent::__construct($id, $name, $tipo);
        $this->genero = $genero;
   } 
   
}