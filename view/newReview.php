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
                        <div class="mb-3 row fit_content">
                            <div class="rating">
                                <input value="5" name="rate" id="star5" type="radio">
                                <label title="text" for="star5"></label>
                                <input value="4" name="rate" id="star4" type="radio">
                                <label title="text" for="star4"></label>
                                <input value="3" name="rate" id="star3" type="radio">
                                <label title="text" for="star3"></label>
                                <input value="2" name="rate" id="star2" type="radio">
                                <label title="text" for="star2"></label>
                                <input value="1" name="rate" id="star1" type="radio">
                                <label title="text" for="star1"></label>
                            </div>
                        </div>
                        <input name="pedido_id" value="<?=$pedido_id?>" hidden />
                        <button id="insertReview" type="submit" name="insertReview" class="buttonDark">Añadir</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="separacion_big"></div>
    <script src="../assets/js/insert_review.js"></script>
    <script src="https://unpkg.com/notie"></script>
</body>
