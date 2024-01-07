<body>
    <section class="container-lg mt-5">
        <div class="row">
            <div class="col-12">
                <div class="formulario">
                    <h2 class="text-center mb-5 titulosLogin">Añadir Prodcuto</h2>
                    <form action="<?=url."?controller=producto&action=insertarbbdd"?>" method="post">
                        <div class="mb-3 row">
                            <label for="nombre" class="labelsLogin col-sm-12">Nombre:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control inputLogin" name="nombre" required/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="precio" class="labelsLogin col-sm-12">Precio:</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control inputLogin" name="precio" step="0.01" required/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tipo" class="labelsLogin col-sm-12">Tipo Producto:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control inputLogin" name="tipo" required/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="categoria" class="labelsLogin col-sm-12">Categoría:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control inputLogin" name="categoria" required/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="descripcion" class="labelsLogin col-sm-12">Descripción:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control inputLogin" name="descripcion"/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="imagen" class="labelsLogin col-sm-12">Imagen:</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control inputLogin" name="imagen" accept="image/*"/>
                            </div>
                        </div>
                        <button type="submit" name="insertarbbdd" class="buttonDark">Añadir</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="separacion_big"></div>
</body>
