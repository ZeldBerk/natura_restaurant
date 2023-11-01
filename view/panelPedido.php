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
            foreach($allProducts as $product){?>
                <tr>
                    <!--Creamos una fila por cada producto de la base de datos -->
                    <td><?=$product->getIdProducto()?></td>
                    <td><?=$product->getNombre()?></td>
                    <td><?=$product->getPrecio()?></td>
                    <td><?=$product->getDescripcion()?></td>
                    <td><?=$product->getTipo()?></td>
                    <td><?=$product->getIdCategoria()?></td>
                    <td><?=$product->getImagen()?></td>
                    <td>
                        <form action=<?=url."?controller=producto&action=editar"?> method="POST">
                            <input name="id" value="<?= $product->getIdProducto()?>" hidden />
                            <input name="nombre" value="<?= $product->getNombre()?>" hidden />
                            <button type="submit" name="editar">Editar</button>
                        </form>    
                    </td>
                    <td>
                        <form action=<?=url."?controller=producto&action=eliminar"?> method="POST">
                            <input name="id" value="<?= $product->getIdProducto()?>" hidden />
                            <input name="nombre" value="<?= $product->getNombre()?>" hidden />
                            <button type="submit" name="eliminar">Eliminar</button>
                        </form>    
                    </td>
                </tr>
        <?php
            }?>
    </table>
    <form action=<?=url."?controller=producto&action=insertar"?> method="POST">
        <button type="submit" name="insertar">Añadir Nuevo Producto</button>
    </form>  
</body>
</html>