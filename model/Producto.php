<?php
    abstract class Producto{
        const PRECIOSMOOTHIE = 4.99;
        const PRECIOBOLES = 9.99;

        protected $id_producto;
        protected $nombre;
        protected $precio;
        protected $descripcion;
        protected $tipo;
        protected $id_categoria;
        protected $imagen;

        public function __construct($id_producto,$nombre,$precio,$descripcion,$tipo,$id_categoria,$imagen){
                $this->id_producto = $id_producto;
                $this->nombre = $nombre;
                $this->precio = $precio;
                $this->descripcion = $descripcion;
                $this->tipo = $tipo;
                $this->id_categoria = $id_categoria;
                $this->imagen = $imagen;
        }

       

        //public abstract function calculaPrecioTotal($numDias);
        //public abstract function devuelvePrecioDia();

        /**
         * Get the value of id_producto
         */
        public function getIdProducto()
        {
                return $this->id_producto;
        }

        /**
         * Set the value of id_producto
         */
        public function setIdProducto($id_producto): self
        {
                $this->id_producto = $id_producto;

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

        /**
         * Get the value of precio
         */
        public function getPrecio()
        {
                return $this->precio;
        }

        /**
         * Set the value of precio
         */
        public function setPrecio($precio): self
        {
                $this->precio = $precio;

                return $this;
        }

        /**
         * Get the value of descripcion
         */
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         */
        public function setDescripcion($descripcion): self
        {
                $this->descripcion = $descripcion;

                return $this;
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
         * Get the value of imagen
         */
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of imagen
         */
        public function setImagen($imagen): self
        {
                $this->imagen = $imagen;

                return $this;
        }

        /**
         * Get the value of tipo
         */
        public function getTipo()
        {
                return $this->tipo;
        }

        /**
         * Set the value of tipo
         */
        public function setTipo($tipo): self
        {
                $this->tipo = $tipo;

                return $this;
        }
    }