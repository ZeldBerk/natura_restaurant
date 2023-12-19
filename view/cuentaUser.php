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
                <h2 class="text-center mb-5 titulosLogin">Tu Cuenta</h2>
                <form action=<?=url."?controller=producto&action=saveChanges"?> method="post">
                    <div class="mb-3 row">
                        <label for="nombre" class="labelsLogin col-sm-12">Nombre:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputLogin" name="nombre" value="<?= $usuario->getNombre()?>" required>
                            <input type="number" name="id_producto" value="<?= $usuario->getUserId()?>" hidden required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="apellido" class="labelsLogin col-sm-12">Apellido:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputLogin" name="apellido"  value="<?= $usuario->getApellido()?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="labelsLogin col-sm-12">Email:</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control inputLogin" name="email" value="<?= $usuario->getEmail()?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rol" class="labelsLogin col-sm-12">Rol:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputLogin" name="rol" value="<?= $usuario->getRol()?>" disabled required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="contra" class="labelsLogin col-sm-12">Contraseña:</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control inputLogin" name="contra" value="<?= $usuario->getContra()?>">
                        </div>
                    </div>
                    <button type="submit" name="saveChanges" class="buttonDark">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="separacion_big"></div>