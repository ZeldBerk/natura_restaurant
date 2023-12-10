<?php

class Usuario{

        public $user_id;
        public $nombre;
        public $apellido;
        public $email;
        public $rol;
        public $contra;

        public function __construct($user_id = null, $nombre = null, $apellido = null, $email = null, $rol = null, $contra = null){
            $this->user_id = $user_id;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->email = $email;
            $this->rol = $rol;
            $this->contra = $contra;
        }

        /**
         * Get the value of user_id
         */
        public function getUserId()
        {
                return $this->user_id;
        }

        /**
         * Set the value of user_id
         */
        public function setUserId($user_id): self
        {
                $this->user_id = $user_id;

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
         * Get the value of apellido
         */
        public function getApellido()
        {
                return $this->apellido;
        }

        /**
         * Set the value of apellido
         */
        public function setApellido($apellido): self
        {
                $this->apellido = $apellido;

                return $this;
        }

        /**
         * Get the value of email
         */
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         */
        public function setEmail($email): self
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of rol
         */
        public function getRol()
        {
                return $this->rol;
        }

        /**
         * Set the value of rol
         */
        public function setRol($rol): self
        {
                $this->rol = $rol;

                return $this;
        }

        /**
         * Get the value of contra
         */
        public function getContra()
        {
                return $this->contra;
        }

        /**
         * Set the value of contra
         */
        public function setContra($contra): self
        {
                $this->contra = $contra;

                return $this;
        }
}
?>