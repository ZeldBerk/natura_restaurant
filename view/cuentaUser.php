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
                            <input type="text" class="form-control inputLogin" name="nombre" value="<?= $usuario->getNombre()?>" required>
                            <input type="number" name="id_producto" value="<?= $usuario->getUserId()?>" hidden required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="precio" class="labelsLogin col-sm-12">Apellido:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputLogin" name="precio" step="0.01" value="<?= $product->getApellido()?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tipo" class="labelsLogin col-sm-12">Email:</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control inputLogin" name="tipo" value="<?= $product->getEmail()?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="categoria" class="labelsLogin col-sm-12">Rol:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputLogin" name="categoria" value="<?= $product->getRol()?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="descripcion" class="labelsLogin col-sm-12">Contraseña:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputLogin" name="descripcion" value="<?= $product->getContra()?>">
                        </div>
                    </div>
                    <button type="submit" name="saveChanges" class="buttonDark">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="separacion_big"></div>