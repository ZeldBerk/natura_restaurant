<?php
include_once('model/ReviewDAO.php');
/** IMPORTANTE**/
//Cargar Modelos necesarios BBDD

class APIController{    
    
    public function api(){

        if($_POST["accion"] == 'mostrar_reviews'){
            
            $comentarios = ReviewDAO::getAllReviews();

            $asComentarios = [];
            foreach ($comentarios as $comentario) {
                // Crear un nuevo array asociativo para cada comentario
                $asComentarios [] = [
                    'review_id' => $comentario->getReviewId(),
                    'user_id' => $comentario->getUserId(), 
                    'review' => $comentario->getReview(), 
                    'valoracion' => $comentario->getValoracion(),
                    'nombre_usuario' => $comentario->getNombreUsuario(),
                ];
            }

            echo json_encode($asComentarios, JSON_UNESCAPED_UNICODE);
            return;
            
        }
    }
}