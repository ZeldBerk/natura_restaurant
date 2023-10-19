<?php
include_once("model/Producto.php");

class Smoothie extends Producto {
    private $genero;

   public function __construct($id, $name, $tipo, $genero){
        parent::__construct($id, $name, $tipo);
        $this->genero = $genero;
   } 
   

    /**
     * Get the value of genero
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     */
    public function setGenero($genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function calculaPrecioTotal($numDias){
        $precioTotal = $numDias*self::PRECIOSMOOTHIE;
        return $precioTotal;
    }

    public function devuelvePrecioDia(){
        return self::PRECIOSMOOTHIE;
    }
}