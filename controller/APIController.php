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
            
        }elseif($_POST["accion"] == 'insert_reviews'){
            session_start();

            //Guardamos los datos que pasaremos a la funcion para hacer el insert
            $user_id = $_SESSION['loggedin']['id'];
            $pedido_id = $_POST['pedido_id'];
            $comentario = $_POST['comentario'];
            $rate = $_POST['rate'];

            //Llamada a la funcion que hace el insert 
            ReviewDAO::insert_reviews($user_id, $pedido_id, $comentario, $rate);

            // Devuelve una respuesta adecuada (puede ser un mensaje de éxito o error)
            $mensaje = [
                'mensaje' => 'Comentario insertado con éxito'
            ];
            
            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
            return;
        
        }elseif($_POST["accion"] == 'permision_insert_review'){
            $pedido_id = $_POST['pedido_id'];

            $permission = ReviewDAO::getReviewByIdPedido($pedido_id);

            $permiso = ['permiso' => $permission];

            echo json_encode($permiso, JSON_UNESCAPED_UNICODE);
            return;
        }
    }
}