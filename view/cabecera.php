<!--Cabecera-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href=<?=url."?controller=producto&action=compra"?>><?=count($_SESSION['selecciones'])?></a>
</body>
</html>