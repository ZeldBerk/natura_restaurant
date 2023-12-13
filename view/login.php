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
        <div class="col-sm-12 col-md-6">
            <div class="formulario">
                <h2 class="text-center mb-5 titulosLogin">Inicia sesión</h2>
                <form action=<?=url."?controller=producto&action=singIn"?> method="post">
                    <div class="mb-3 row">
                        <label for="inicioEmail" class="labelsLogin col-sm-12">Correo:</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control inputLogin" id="inicioEmail" name="inicioEmail" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inicioPassword" class="labelsLogin col-sm-12">Contraseña:</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control inputLogin" id="inicioPassword" name="inicioPassword" required>
                        </div>
                    </div>
                    <button type="submit" name="singIn" class="buttonDark">Iniciar sesión</button>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="formulario bg-color5 rounded-3">
                <h2 class="text-center mb-5 titulosLogin">Registrar-se</h2>
                <form action=<?=url."?controller=producto&action=singIn"?> method="post">
                    <div class="mb-3 row">
                        <label for="nom" class="labelsLogin col-sm-12">Nombre:</label>
                        <div class="col-sm-12 mb-3">
                            <input type="text" class="form-control inputLogin" id="nom" name="nom" required>
                        </div>

                        <label for="cognom" class="labelsLogin col-sm-12">Apellido:</label>
                        <div class="col-sm-12 mb-3">
                            <input type="text" class="form-control inputLogin" id="cognom" name="cognom" required>
                        </div>

                        <label for="staticEmail" class="labelsLogin col-sm-12">Correo:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputLogin" id="staticEmail" name="staticEmail" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputPassword" class="labelsLogin col-sm-12">Contraseña:</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control inputLogin" id="inputPassword" name="inputPassword" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputPassword2" class="labelsLogin col-sm-12">Confirmar Contraseña:</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control inputLogin" id="inputPassword2" name="inputPassword2" required>
                        </div>
                    </div>

                    <button type="submit" name="singIn" class="buttonDark">Registrar-se</button>
                </form>
            </div>
        </div> 
    </div>
</section>

<div class="separacion_big"></div>