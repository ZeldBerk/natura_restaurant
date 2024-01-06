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

<div class="separacion_big"></div>
    <section class="mCarta container mx-auto">
        <h2>Todos Los Productos</h2>
        <div class="row">
            <?php
                foreach($allProducts as $product){?>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <article class="producto">
                    <div class="imgProducto d-flex justify-content-center align-items-center">
                        <img src="../assets/images/<?=$product->getImagen()?>" alt="icono de imagen" type="image/svg+xml">
                        <div class="anadirCarrito">
                            <form action="<?=url."?controller=producto&action=addCarrito"?>" method="POST">
                                <input name="id" value="<?=$product->getIdProducto()?>" hidden />
                                <button type="submit" name="addCarrito" class="bCarrito">Añadir a la cesta</button>
                            </form>
                        </div>
                    </div>
                    <div class="productoTexto">
                        <p><?=$product->getNombre()?></p>
                        <p><?=$product->getPrecio()?>€</p>
                    </div>
                </article>
            </div>
            <?php
                }?>
        </div>
    </section>
<div class="separacion_big"></div>

<script src="assets/js/bootstrap.bundle.min.js"></script>