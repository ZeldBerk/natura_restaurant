<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
    <title>Document</title>
</head>

<div class="separacion_big"></div>
<div class="pagLogin">
    <section class="login">
        <div class="row">
            <article class="col-6">
                <h2>LOGIN</h2>
                <p>Si tiene una cuenta, inicie sesión con su dirección de correo electrónico, para poder gestionar su cuenta o realizar una compra</p>
                <form action=<?=url."?controller=producto&action=singIn"?> method="POST">
                    <label for="">Correo electrónico</label>
                    <br>
                    <input type="email" id="inicioEmail" name="inicioEmail" required>
                    <br>
                    <label for="">Contraseña</label>
                    <br>
                    <input type="password" id="inicioPassword" name="inicioPassword" required>
                    <br>
                    <button type="submit" name="singIn" class="buttonDark">Iniciar sesión</button>
                </form>
            </article>
            <article class="col-6">
                <h2>Crear una nueva cuenta de cliente</h2>
                <form action=<?=url."?controller=producto&action=register"?> method="POST">
                    <label for="">Correo electrónico</label>
                    <br>
                    <input type="text">
                    <br>
                    <label for="">Nombre</label>
                    <br>
                    <input type="text">
                    <br>
                    <label for="">Apellido</label>
                    <br>
                    <input type="text">
                    <br>
                    <label for="">Contraseña</label>
                    <br>
                    <input type="text">
                    <br>
                    <label for="">Confirmar Contraseña</label>
                    <br>
                    <input type="text">
                    <br>
                    <button type="submit" name="register" class="buttonDark">Crear una cuenta</button>
                </form>
            </article>
        </div>
    </section>
</div>
<div class="separacion_big"></div>