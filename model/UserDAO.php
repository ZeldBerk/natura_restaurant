<?php
include_once('config/DataBase.php');
include_once('model/user.php');
include_once('model/admin.php');


class UserDAO{


    //Devuelve los datos del usuario si los correos coinciden
    public static function getUserByEmail($correo){
        //preparamos la conexion
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT rol FROM usuarios WHERE email=?");
        $stmt->bind_param("s", $correo);

        //Ejecutamos la consulta y guardamos el resultado
        $stmt->execute();
        $result = $stmt->get_result();

        //Si tenemos algun resultado ejecutamos la segunda parte de la funcion
        if ($result->num_rows > 0) {
            //Guardamos el 'rol' para poder indicar-le una clase al fetch_object
            $rol = $result->fetch_object()->rol;

            //Preparamos la consulta del usuario
            $stmt = $con->prepare("SELECT * FROM usuarios WHERE email=?");
            $stmt->bind_param("s", $correo);

            //ejecutamos la consulta
            $stmt->execute();
            $result = $stmt->get_result();

            //Almacenamos el resultado en una lista y devolvemos el resultado
            $usuario = $result->fetch_object($rol);
        
            //Cerramos la conexión
            $con->close();

            return $usuario;
        } else {

            //Cerramos la conexión
            $con->close();
            //Si no devuelve ninguna fila cerramos la funcion
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

        // Ejecutamos la consulta
        $status = $stmt->execute();

        //Recuperamos el id del usuario que acabamos de insertar
        $ultimoInsertId = $con->insert_id;

        //cerramos la conexion
        $con->close();
        
        //almacenamos el ultimo usuario insertado y lo devolvemos
        $usuario = self::getUserById($ultimoInsertId);
        return $usuario;
    }

    public static function updateUser($id,$nombre,$apellido,$email){
       
        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE usuarios SET nombre=? , apellido=? , email=? WHERE user_id =?");
        $stmt->bind_param("sssi", $nombre,$apellido,$email,$id);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        return $result;
    }
}
?>