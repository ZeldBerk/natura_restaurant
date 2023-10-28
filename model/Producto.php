<?php
    abstract class Producto{
        const PRECIOSMOOTHIE = 4.99;
        const PRECIOBOLES = 9.99;

        protected $product_id;
        protected $name;
        protected $type;

        public function __construct(){
        
        }

        /**
         * Get the value of product_id
         */
        public function getProductId()
        {
                return $this->product_id;
        }

        /**
         * Set the value of product_id
         */
        public function setProductId($product_id): self
        {
                $this->product_id = $product_id;

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
         * Get the value of type
         */
        public function getType()
        {
                return $this->type;
        }

        /**
         * Set the value of type
         */
        public function setType($type): self
        {
                $this->type = $type;

                return $this;
        }

        //public abstract function calculaPrecioTotal($numDias);
        //public abstract function devuelvePrecioDia();
    }