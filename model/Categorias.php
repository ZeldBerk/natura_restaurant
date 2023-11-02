<?php

class Categorias {

    protected $id_categoria;
    protected $nombre;

    public function __construct($id_categoria,$nombre){

        $this->id_categoria = $id_categoria;
        $this->nombre = $nombre;
        
    } 


    /**
     * Get the value of id_categoria
     */
    public function getIdCategoria()
    {
        return $this->id_categoria;
    }

    /**
     * Set the value of id_categoria
     */
    public function setIdCategoria($id_categoria): self
    {
        $this->id_categoria = $id_categoria;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }
}
?>