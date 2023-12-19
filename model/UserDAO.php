<?php
include_once('config/DataBase.php');
include_once('model/user.php');
include_once('model/admin.php');


class UserDAO{


    //Devuelve los datos del usuario si los correos coinciden
    public static function getUserByEmail($correo){
        //preparamos la conexion
        $con = DataBase::connect();

        //preparamos la consulta
        $stmt = $con->prepare("SELECT * FROM usuarios WHERE email=?");

        //vinculamos los valores a los marcadores de posicion
        $stmt->bind_param("s", $correo);

        //ejecutamos la consulta
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $nombre, $apellido, $email, $rol, $contra);
            $stmt->fetch();

            // Creamos un array asociativo con los datos del usuario
            $usuario = [
                'user_id' => $user_id,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'rol' => $rol,
                'contra' => $contra,
            ];

            // Cerramos la conexión
            $con->close();

            // Retornamos el array asociativo con los datos del usuario
            return $usuario;
        } else {
            // Cerramos la conexión en caso de que no haya resultados
            $con->close();

            // Retornamos null si no hay resultados
            return null;
        }
    }


    public static function getUserById($id){
        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT rol FROM usuarios WHERE user_id=?");
        $stmt->bind_param("i", $id);

        //Ejecutamos la consulta y guardamos el 'rol' para poder indicar-le una clase al fetch_object
        $stmt->execute();
        $rol = $stmt->get_result()->fetch_object()->rol;

        //Preparamos la consulta del usuario
        $stmt = $con->prepare("SELECT * FROM usuarios WHERE user_id=?");
        $stmt->bind_param("i", $id);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        //Cerramos la conexión
        $con->close();

        //Almacenamos el resultado en una lista y devolvemos el resultado
        $usuario = $result->fetch_object($rol);

        return $usuario;
    }

    
    //Funcion para registar un usuario a la base de datos
    public static function registerUser($nombre, $apellido, $correo, $contra1){
        //preparamos la conexion
        $con = DataBase::connect();

        // Usar una sentencia preparada con marcadores de posición
        $stmt = $con->prepare("INSERT INTO usuarios (nombre, apellido, email, rol, contra) VALUES (?, ?, ?, ?, ?)");

        //ponemos por defecto rol en usuer
        $rol = "user";
        // Vincular los valores a los marcadores de posición
        $stmt->bind_param("sssss", $nombre, $apellido, $correo, $rol, $contra1);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        return $result;
    }
}
?>