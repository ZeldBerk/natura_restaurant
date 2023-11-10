<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Tipo</th>
            <th>Id Categoria</th>
            <th>Imagen</th>
        </tr> 
        <?php
            foreach($_SESSION['selecciones'] as $pedido){?>
                <tr>
                    <!--Creamos una fila por cada producto de la base de datos -->
                    <td><?=$pedido->getProducto()->getIdProducto()?></td>
                    <td><?=$pedido->getProducto()->getNombre()?></td>
                    <td><?=$pedido->getProducto()->getPrecio()?></td>
                    <td><?=$pedido->getProducto()->getDescripcion()?></td>
                    <td><?=$pedido->getProducto()->getTipo()?></td>
                    <td><?=$pedido->getProducto()->getIdCategoria()?></td>
                    <td><?=$pedido->getProducto()->getImagen()?></td>
                </tr>
        <?php
            }?>
    </table> 
</body>
</html>