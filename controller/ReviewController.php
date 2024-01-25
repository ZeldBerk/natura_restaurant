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
        
        //include del header
        GeneralFunctions::header();

        $pedido_id = null;
        //Comprobamos que nos pasen el id
        if (isset($_POST['pedido_id'])){
            $pedido_id = $_POST['pedido_id'];
        }
        //mostramos el formulario si el usuario esta autenticado
        include_once 'view/newReview.php';

        //include de el footer
        include_once 'view/footer.html';
    }
}
?>