<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=<?=url."?controller=producto&action=insertarbbdd"?> method="POST">

        <label for="nombre">Nombre*:</label>
        <input type="text" name="nombre" required><br><br>

        <label for="precio">Precio*:</label>
        <input type="number" name="precio" step="0.01" required><br><br>

        <label for="tipo">Tipo Producto*:</label>
        <input type="text" name="tipo" required></input><br><br>

        <label for="categoria">Categoría*:</label>
        <input type="text" name="categoria"  required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea type="text" name="descripcion"></textarea><br><br>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" accept="image/*"><br><br>

        <button type="submit" name="insertarbbdd">Añadir Producto</button>
    </form>    
</body>
</html>