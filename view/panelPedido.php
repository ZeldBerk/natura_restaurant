<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table id='products'></table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
        </tr>
        <tr> 
        <?php
            foreach($allProducts as $product){?>
            <!--Creamos una fila por cada producto de la base de datos -->
            <td><?=$product->getProductId()?></td>
            <td><?=$product->getName()?></td>
            <td><?=$product->getType()?></td>
            <td>
                <form action=<?=url."?controller=producto&action=eliminar"?> method="POST">
                    <input name="id" value="<?= $product->getProductId()?>" hidden />
                    <input name="nombre" value="<?= $product->getName()?>" hidden />
                    <button type="submit" name="eliminar">Eliminar</button>
                </form>    
            </td>
            <?php
            }?>
        </tr>
    </table>
</body>
</html>