<?php
echo 'Este es tu panel de pedido';
    //esto va dentro de un una tabla que se hace con html y entre medias hay que meter un foreach
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <td>
        <form action=<?=url."?controller=producto&action=editar"?> method="POST">
            <input name="id" value="<?= $product->getId()?>" />
            <input name="id" value="<?= $product->getName()?>" />
            <button type="submit">Modificar</button>
        </form>    
    </td>
</body>
</html>