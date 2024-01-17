<?php
include_once('config/DataBase.php');
include_once('model/Review.php');

class ReviewDAO{

    public static function getAllReviews(){

        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT r.*, u.nombre AS nombre_usuario FROM reviews r JOIN usuarios u ON r.user_id = u.user_id;");
        
        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();

        //almaceno el resultado en una lista
        $listaReviews = [];
        while($reviewBD = $result->fetch_object('Review')){
            $listaReviews[] = $reviewBD; 
        }

        //devolvemos la lista de reseñas
        return $listaReviews;
    }
}