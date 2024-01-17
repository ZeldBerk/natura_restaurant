<body>
    <section class="container-lg mt-5">
        <div class="row">
            <div class="col-12">
                <div class="formulario">
                    <h2 class="text-center mb-5 titulosLogin">Nuevo comentario</h2>
                    <form action="" method="post">
                        <div class="mb-3 row">
                            <label for="comentario" class="labelsLogin col-sm-12">Comentario:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control inputLogin" name="comentario" required/>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="valoracion" class="labelsLogin col-sm-12">Valoracion:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control inputLogin" name="valoracion" required/>
                            </div>
                        </div>
                        <button type="submit" name="insertReview" class="buttonDark">Añadir</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="separacion_big"></div>
    <script src="../assets/js/insert_review.js"></script>
</body>
