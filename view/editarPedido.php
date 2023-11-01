<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=<?=url."?controller=producto&action=actualizar"?> method="POST">
        <label for="id">ID:</label>
        <input type="number" name="id" value="<?= $product->getIdProducto()?>" disabled required><br><br>
        <input type="number" name="id_producto" value="<?= $product->getIdProducto()?>" hidden required>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= $product->getNombre()?>" required><br><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" step="0.01" value="<?= $product->getPrecio()?>" required><br><br>

        <label for="tipo">Tipo Producto:</label>
        <input type="text" name="tipo" value="<?= $product->getTipo()?>" required></input><br><br>

        <label for="categoria">Categoría:</label>
        <input type="text" name="categoria" value="<?= $product->getIdCategoria()?>" required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea type="text" name="descripcion"><?= $product->getDescripcion()?></textarea><br><br>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen"  value="<?= $product->getImagen()?>" accept="image/*"><br><br>

        <button type="submit" name="actualizar">Actualizar</button>
    </form>    
</body>
</html>