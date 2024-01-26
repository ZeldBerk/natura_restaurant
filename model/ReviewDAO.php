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
    public static function insert_reviews($user_id, $pedido_id, $review,$valoracion){
       //preparamos la conexion
        $con = DataBase::connect();

        // Usar una sentencia preparada con marcadores de posición
        $stmt = $con->prepare("INSERT INTO reviews (user_id, pedido_id, review, valoracion) VALUES (?, ?, ?, ?)");

        // Vincular los valores a los marcadores de posición
        $stmt->bind_param("iisi", $user_id, $pedido_id, $review, $valoracion);

        //ejecutamos la consulta
        $insertSuccess = $stmt->execute();

        if ($insertSuccess) {
            // Insertar review_id en pedido
            // Recuperamos el id del pedido que acabamos de insertar
            $ultimoInsertId = $con->insert_id;

            // Usar una sentencia preparada con marcadores de posición
            $stmtUpdate = $con->prepare("UPDATE pedidos SET review_id = ? WHERE pedido_id = ?");

            // Vincular los valores a los marcadores de posición
            $stmtUpdate->bind_param("ii", $ultimoInsertId, $pedido_id);

            // Ejecutamos la consulta
            $stmtUpdate->execute();

            // Cerrar la segunda consulta
            $stmtUpdate->close();

            // Cerrar la conexión
            $con->close();

            // Retorna true para indicar éxito
            return true;
        } else {
            // Si hay un error en la primera consulta, cierra la conexión y retorna false
            $stmt->close();
            $con->close();

            return false;
        }
    }


    //funcion para sacar la review por id de pedido
    public static function getReviewByIdPedido($pedido_id){
        //preparamos la conexion
        $con = DataBase::connect();

        // Usar una sentencia preparada con marcadores de posición
        $stmt = $con->prepare("SELECT review_id FROM pedidos WHERE pedido_id = ?");

        // Vincular los valores a los marcadores de posición
        $stmt->bind_param("i", $pedido_id);

        //ejecutamos la consulta
        $stmt->execute();
        
        // Vinculamos el resultado a una variable
        $stmt->bind_result($review_id);

        // Obtenemos el resultado
        $stmt->fetch();

        // Cerramos la conexión
        $con->close();

        // Devolvemos true si review_id es igual a cero, false en caso contrario
        return ($review_id === 0);
    }
}