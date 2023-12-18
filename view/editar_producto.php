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
            <div class="formulario">
                <h2 class="text-center mb-5 titulosLogin">Editar Prodcuto</h2>
                <form action=<?=url."?controller=producto&action=saveChanges"?> method="post">
                    <div class="mb-3 row">
                        <label for="nombre" class="labelsLogin col-sm-12">Nombre:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputLogin" name="nombre" value="<?= $product->getNombre()?>" required>
                            <input type="number" name="id_producto" value="<?= $product->getIdProducto()?>" hidden required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="precio" class="labelsLogin col-sm-12">Precio:</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control inputLogin" name="precio" step="0.01" value="<?= $product->getPrecio()?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tipo" class="labelsLogin col-sm-12">Tipo Producto:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputLogin" name="tipo" value="<?= $product->getTipo()?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="categoria" class="labelsLogin col-sm-12">Categoría:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputLogin" name="categoria" value="<?= $product->getIdCategoria()?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="descripcion" class="labelsLogin col-sm-12">Descripción:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputLogin" name="descripcion" value="<?= $product->getDescripcion()?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="imagen" class="labelsLogin col-sm-12">Imagen:</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control inputLogin" name="imagen" value="<?= $product->getImagen()?>" accept="image/*">
                        </div>
                    </div>
                    <button type="submit" name="saveChanges" class="buttonDark">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="separacion_big"></div>