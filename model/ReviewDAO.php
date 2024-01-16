<?php
include_once('config/DataBase.php');
include_once('model/Review.php');

class ReviewDAO{

    public static function getAllReviews(){

        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT * FROM reviews");
        
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