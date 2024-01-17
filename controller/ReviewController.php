<?php	
include_once('model/ReviewDAO.php');

class ReviewController{

    //mostramos la pagina de reseñas
    public function index(){
        session_start();
        
        //include del header
        GeneralFunctions::header();

        include_once 'view/review.php';
        
        //include de el footer
        include_once 'view/footer.html';
    }

    public function newReview(){
        session_start();


        // Verificamos si el usuario está autenticado
        if(!isset($_SESSION['loggedin'])){
            // Redirigir a la página de inicio de sesión si no está autenticado
            header("Location:".url.'?controller=user&action=login');
            return;
        }else{
            //include del header
            GeneralFunctions::header();

            //mostramos el formulario si el usuario esta autenticado
            include_once 'view/newReview.php';

            //include de el footer
        include_once 'view/footer.html';
        }

    }
}
?>