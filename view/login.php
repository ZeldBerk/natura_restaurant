<body>
    <section class="container-lg mt-5">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="formulario">
                    <h2 class="text-center mb-5 titulosLogin">Inicia sesión</h2>
                    <form action="<?=url."?controller=user&action=singIn"?>" method="post">
                        <div class="mb-3 row">
                            <label for="inicioEmail" class="labelsLogin col-sm-12">Correo:</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control inputLogin" id="inicioEmail" name="inicioEmail" required/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inicioPassword" class="labelsLogin col-sm-12">Contraseña:</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control inputLogin" id="inicioPassword" name="inicioPassword" required/>
                            </div>
                        </div>
                        <button type="submit" name="singIn" class="buttonDark">Iniciar sesión</button>
                    </form>
                </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="formulario bg-color5 rounded-3">
                    <h2 class="text-center mb-5 titulosLogin">Registrar-se</h2>
                    <form action="<?=url."?controller=user&action=register"?>" method="post">
                        <div class="mb-3 row">
                            <label for="nombre" class="labelsLogin col-sm-12">Nombre:</label>
                            <div class="col-sm-12 mb-3">
                                <input type="text" class="form-control inputLogin" id="nombre" name="nombre" required/>
                            </div>

                            <label for="apellido" class="labelsLogin col-sm-12">Apellido:</label>
                            <div class="col-sm-12 mb-3">
                                <input type="text" class="form-control inputLogin" id="apellido" name="apellido" required/>
                            </div>

                            <label for="correo" class="labelsLogin col-sm-12">Correo:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control inputLogin" id="correo" name="correo" required/>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="contra1" class="labelsLogin col-sm-12">Contraseña:</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control inputLogin" id="contra1" name="contra1" required/>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="contra2" class="labelsLogin col-sm-12">Confirmar Contraseña:</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control inputLogin" id="contra2" name="contra2" required/>
                            </div>
                        </div>

                        <button type="submit" name="singIn" class="buttonDark">Registrar-se</button>
                    </form>
                </div>
            </div> 
        </div>
    </section>
    <div class="separacion_big"></div>
</body>