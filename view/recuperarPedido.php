<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
    <title>Document</title>
</head>

<section class="container-lg mt-5">
    <div class="row">
        <div class="col-12">
        <form action=<?=url."?controller=producto&action=recuperarPedido"?> method="POST">
            <button type="submit" name="recuperar" class="buttonDark">Recuperar ultimo pedido</button>
        </form>
        </div>
    </div>
</section>