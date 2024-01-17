<?php	
include_once('model/ReviewDAO.php');

class ReviewController{

    //mostramos la pagina de reseñas
    public function index(){
        
        //include del header
        GeneralFunctions::header();

        include_once 'view/review.php';
        
        //include de el footer
        include_once 'view/footer.html';
    }
}
?>