<?php
include_once('config/DataBase.php');
include_once('model/Usuario.php');


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