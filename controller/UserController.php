<?php
include_once 'model/UserDAO.php';
include_once 'utils/GeneralFunctions.php';

class UserController{

    //carga de la pagina de login y gestion de este
    public function login(){
        session_start();
        //include del header
        GeneralFunctions::header();
        
        //include del login
        include_once 'view/login.php';
        
        //include de el footer
        include_once 'view/footer.html';
    }
    

    //Funcion para iniciar sesion 
    public function singIn(){
        session_start();
        //Si se pasan los dos parametros correctamente empezamos el login
        if(isset($_POST['inicioEmail'], $_POST['inicioPassword'])){
            //Guardamos los valores que introduce el usuario en variables
            $correo = $_POST['inicioEmail'];
            $contra = $_POST['inicioPassword'];

            //realizamos la consulta del correo en la base de datos
            $usuario = UserDAO::getUserByEmail($correo);
            //$contrabd = $usuario->getContra();
            if ($usuario != null){
                $contrabd = $usuario->getContra();
            }
            //comprobamos que las contraseñas coincidan y iniciamos la sesion
            if ($contra == $contrabd) {
                
                $_SESSION['loggedin']['name'] = $usuario->getNombre();
                $_SESSION['loggedin']['id'] = $usuario->getUserId();
                $_SESSION['loggedin']['rol'] = $usuario->getRol();

                header("Location:".url.'?controller=producto');

            } else {
                // usuario incorrecto redirigimos a login de nuevo
                header("Location:".url.'?controller=user&action=login');

            }
        }
    }


    //Funcion para registrarse
    public function register(){
        //comprobamos si no se ha iniciado una sesion previa
        if(!isset($_SESSION['loggedin'])){
            //comrpobamos que se pasen todos los datos por post
            if(isset($_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['contra1'], $_POST['contra2'])){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['correo'];
                $contra1 = $_POST['contra1'];
                $contra2 = $_POST['contra2'];

                //comprobamos si el usuario ya existe si no exixste hacemos el registro
                $usuario = UserDAO::getUserByEmail($correo);
                if ($usuario == null){
                    //si las constraseñas cinciden hacemos el insert en las base de datos del usuario
                    if ($contra1 === $contra2){
                        //reggistramos el usuario e iniciamos sesion directamente
                        $usuario = UserDAO::registerUser($nombre, $apellido, $correo, $contra1);
                        
                        //iniciamos la sesion
                        session_start();

                        $_SESSION['loggedin']['name'] = $usuario->getNombre();
                        $_SESSION['loggedin']['id'] = $usuario->getUserId();
                        $_SESSION['loggedin']['rol'] = $usuario->getRol();

                        header("Location:".url.'?controller=producto');
                    }else{
                        //Contraseñas no coinciden redirigimos a login
                        header("Location:".url.'?controller=user&action=login');
                    }
                }
            }
        }
    }


    //mostramos los datos de la cuenta del usuario
    public function cuenta(){
        session_start();
        //include del header
        GeneralFunctions::header();
        
        //obtener datos del usuario logeado
        $id = $_SESSION['loggedin']['id'];
        $usuario = UserDAO::getUserById($id);

        //include del login
        include_once 'view/cuentaUser.php';
        
        //include de el footer
        include_once 'view/footer.html';
    }


    //Funion para gestionar el formulario de la cuenta
    public function cambiosCuenta(){
        session_start();

        if(isset($_POST['cerrar'])){

            // Destruimos la sesión
            session_destroy();

            header("Location:".url.'?controller=producto');
        }
    }
}
?>