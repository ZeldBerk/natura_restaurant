<?php
    abstract class Producto{
        const PRECIOSMOOTHIE = 4.99;
        const PRECIOBOLES = 9.99;

        protected $id;
        protected $name;
        protected $tipo;

        public function __construct($id, $name, $tipo){
            $this->id = $id;
            $this->name = $name;
            $this->tipo = $tipo;
        }

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         */
        public function setId($id): self
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of name
         */
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         */
        public function setName($name): self
        {
                $this->name = $name;

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

        public abstract function calculaPrecioTotal($numDias);
        public abstract function devuelvePrecioDia();
    }