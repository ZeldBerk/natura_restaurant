<?php
include_once('config/DataBase.php');
include_once('model/Smoothie.php');
include_once('model/Boles.php');


class ProductoDAO{

    public static function getAllProducts(){
        
        //Obntengo la lista de las dos clases 
        $listAllProducts = array_merge(ProductoDAO::getAllByType('Smoothie'),ProductoDAO::getAllByType('Boles'));

        //devuelvo el resulatadoSmoothie
        return $listAllProducts;
        
    }

    /**
    public static function getAllCategorias(){
        //preparamos la consulta
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT id_categoria, nombre FROM categorias");

        //ejecutamos la consulta
        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();

        //almaceno el resultado en una lista
        $listaCategorias = [];
        while($categoriaDB = $result->fetch_object('Categorias')){
            $listaCategorias[] = $categoriaDB;
        }
        
        return $listaCategorias;
    }
    */

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


    public static function insertPedido($user_id,$estado,$fecha_actual,$total, $productos){
        //preparamos la consulta
        $con = DataBase::connect();

        // Usar una sentencia preparada con marcadores de posición
        $stmt = $con->prepare("INSERT INTO pedidos (user_id, estado, date_pedido, total) VALUES (?, ?, ?, ?)");

        // Vincular los valores a los marcadores de posición
        $stmt->bind_param("issd", $user_id,$estado,$fecha_actual,$total);

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

        $con->close();
        return $ultimoInsertId;
    }
}