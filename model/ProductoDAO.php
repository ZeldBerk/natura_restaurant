<?php
include_once('config/dataBase.php');
include_once('model/Smoothie.php');
include_once('model/Boles.php');


class ProductoDAO{

    public static function getAllProducts(){
        
        //Obntengo la lista de las dos clases 
        $listAllProducts = array_merge(ProductoDAO::getAllByType('Smoothie'),ProductoDAO::getAllByType('Boles'));

        //devuelvo el resulatadoSmoothie
        return $listAllProducts;
        
    }


    public static function getAllByType($tipo){

        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT * FROM productos WHERE tipo=?");
        $stmt->bind_param("s", $tipo);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();

        //almaceno el resultado en una lista
        $listaProductos = [];
        while($productoDB = $result->fetch_object($tipo)){
            $listaProductos[] = $productoDB;
        }
        
        return $listaProductos;
    }


    public static function getProductById($id){

        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT tipo FROM productos WHERE id_producto=?");
        $stmt->bind_param("i", $id);

        //Ejecutamos la consulta y guardamos el 'tipo' para poder indicar-le una clase al fetch_object
        $stmt->execute();
        $tipo = $stmt->get_result()->fetch_object()->tipo;

        //Preparamos la consulta del producto
        $stmt = $con->prepare("SELECT * FROM productos WHERE id_producto=?");
        $stmt->bind_param("i", $id);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        //Cerramos la conexión
        $con->close();

        //Almacenamos el resultado en una lista y devolvemos el resultado
        $producto = $result->fetch_object($tipo);

        return $producto;
    }


    public static function deleteProduct($id_producto){
        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("DELETE FROM productos WHERE id_producto=?");
        $stmt->bind_param("i", $id_producto);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        return $result;
    }


    public static function updateProduct($id,$nombre,$precio,$descripcion,$tipo,$categoria,$imagen){
        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE productos SET nombre=? , precio=? , descripcion=? , tipo=? , id_categoria=? , imagen=? WHERE id_producto=?");
        $stmt->bind_param("sdssisi", $nombre,$precio,$descripcion,$tipo,$categoria,$imagen,$id);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        return $result;
    }


    public static function insertarbbdd($nombre,$precio,$descripcion,$tipo,$categoria,$imagen){
        //preparamos la conexion
        $con = DataBase::connect();

        // Usar una sentencia preparada con marcadores de posición
        $stmt = $con->prepare("INSERT INTO productos (nombre, precio, descripcion, tipo, id_categoria, imagen) VALUES (?, ?, ?, ?, ?, ?)");

        // Vincular los valores a los marcadores de posición
        $stmt->bind_param("sdssis", $nombre, $precio, $descripcion, $tipo, $categoria, $imagen);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();
        return $result;
    }


    public static function insertPedido($user_id,$estado,$fecha_actual,$total, $productos, $puntos_sumar, $puntos_restar, $propina, $review_id=0){
        //preparamos la consulta
        $con = DataBase::connect();

        // Usar una sentencia preparada con marcadores de posición
        $stmt = $con->prepare("INSERT INTO pedidos (user_id, review_id, estado, date_pedido, total, puntos_usados, propina) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Vincular los valores a los marcadores de posición
        $stmt->bind_param("iissdid", $user_id,$review_id,$estado,$fecha_actual,$total, $puntos_restar, $propina);

        //ejecutamos la consulta
        $stmt->execute();
        
        //Recuperamos el id del pedido que acabamos de insertar
        $ultimoInsertId = $con->insert_id;

        foreach ($productos as $producto){

            $productoId = $producto->getProducto()->getIdProducto();
            $cantidad = $producto->getCantidad();

            // Usar una sentencia preparada con marcadores de posición
            $stmt = $con->prepare("INSERT INTO detallespedido (pedido_id, producto_id, cantidad) VALUES (?, ?, ?)");

            // Vincular los valores a los marcadores de posición
            $stmt->bind_param("iii", $ultimoInsertId, $productoId, $cantidad);

            //ejecutamos la consulta
            $stmt->execute();

        }

        $stmt = $con->prepare("UPDATE usuarios SET puntos = puntos + ? WHERE user_id = ?");

        $stmt->bind_param("ii", $puntos_sumar, $user_id);

        $stmt->execute();

        $con->close();
        return $ultimoInsertId;
    }


    //Funcion para restar puntos usados en un pedido
    public static function restarPuntosUser($puntos_restar, $user_id){
        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE usuarios SET puntos = puntos - ? WHERE user_id = ?");

        $stmt->bind_param("ii", $puntos_restar, $user_id);

        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();

        return $result;
    }


    //Funion que recupera los pedidos por su id
    public static function getUltPedido($id){
        //preparamos la consulta
        $con = DataBase::connect();

        //Preparamos la consulta del pedido
        $stmt = $con->prepare("SELECT producto_id, cantidad	 FROM detallespedido WHERE pedido_id=?");
        $stmt->bind_param("i", $id);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->store_result();

        $stmt->bind_result($productoId, $cantidad);

        //Creamos una array asociativocon los datos del pedido
        $pedido = array();
            
        while ($stmt->fetch()){
            $pedido[] = ['prodcutoId' => $productoId, 'cantidad' => $cantidad];
        }

        //cerramos la conexion
        $con->close();

        //devolvemos el array de pedido
        return $pedido;

    }


    //Funcion que nos da todos los pedidos
    public static function getAllPedidos($id){
        //preparamos la consulta
        $con = DataBase::connect();

        //Preparamos la consulta del pedido
        $stmt = $con->prepare("SELECT pedido_id, date_pedido, total FROM pedidos WHERE user_id=?");
        $stmt->bind_param("i", $id);

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->store_result();

        $stmt->bind_result($pedido_id, $date_pedido, $total);

        //Creamos una array asociativocon los datos del pedido
        $pedido = array();
            
        while ($stmt->fetch()){
            $pedido[] = ['pedido_id' => $pedido_id, 'date_pedido' => $date_pedido, 'total' => $total];
        }

        //cerramos la conexion
        $con->close();

        //devolvemos el array de pedido
        return $pedido;
    }    


    // Función para extraer los puntos por id de usuario
    public static function getPuntosById($user_id){
        // Preparamos la conexión
        $con = DataBase::connect();

        // Preparamos la consulta del pedido
        $stmt = $con->prepare("SELECT puntos FROM usuarios WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);

        // Ejecutamos la consulta
        $stmt->execute();

        // Vinculamos el resultado a una variable
        $stmt->bind_result($puntos);

        // Obtenemos el valor de 'puntos'
        $stmt->fetch();

        // Cerramos la conexión
        $con->close();

        // Devolvemos los puntos
        return $puntos;
    }


    // Función para obtener el último ID de pedido del usuario
    public static function getUltPedidoUser($user_id){
        // Preparamos la conexión
        $con = DataBase::connect();

        // Verificamos la conexión
        if ($con->connect_error) {
            die("Conexión fallida: " . $con->connect_error);
        }

        // Preparamos la consulta del pedido_id
        $stmt = $con->prepare("SELECT pedido_id, puntos_usados, propina, total, date_pedido FROM pedidos WHERE user_id = ? ORDER BY pedido_id DESC LIMIT 1;");
        $stmt->bind_param("i", $user_id);

        // Ejecutamos la consulta
        $stmt->execute();

        // Vinculamos el resultado a variables
        $stmt->bind_result($id_pedido, $puntos_usados, $propina, $total, $date_pedido);

        // Obtenemos los valores
        $stmt->fetch();

        // Cerramos la conexión
        $con->close();

        // Devolvemos un array asociativo con la información del pedido
        return array(
            'id_pedido' => $id_pedido,
            'puntos_usados' => $puntos_usados,
            'propina' => $propina,
            'total' => $total,
            'date_pedido' => $date_pedido
        );
    }
}   