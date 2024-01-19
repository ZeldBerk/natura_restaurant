<?php
include_once('config/DataBase.php');
include_once('model/Review.php');

class ReviewDAO{

    //Funcion para obtener todas las reseñas de la base de dtos
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


    //Funcion para insertar un nuevo comentario a la base de datos
    public static function insert_reviews($user_id,$review,$valoracion){
        //preparamos la conexion
        $con = DataBase::connect();

        // Usar una sentencia preparada con marcadores de posición
        $stmt = $con->prepare("INSERT INTO reviews (user_id, review, valoracion) VALUES (?, ?, ?)");

        // Vincular los valores a los marcadores de posición
        $stmt->bind_param("isi", $user_id,$review,$valoracion);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        return $result;
    }
}