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

<body class="">
    <?php
        include("header.html");
    ?>
    <section class="section1">
        <div class="row">
            <div class="col-6">
                <article class="articleS1L">
                    <h2>NUEVOS SABORES A PROBAR</h2>
                    <button type="button" onclick="#">Nuevos Smoothies</button>
                </article>
            </div>
            <div class="col-6">
                <article class="articleS1R">
                    <h2>NUEVOS DESAYUNOS</h2>
                    <button type="button" onclick="#">Nuevos Desayunos</button>        
                </article>
            </div>
        </div>
        <div class="separacion_lite"></div>
        <div class="row">
            <div class="col-12 text-center">
                <article class="articleS1B">
                    <h2>NUEVOS PRODUCTOS</h2>
                    <h2>OTOÑALES</h2>
                    <button type="button" onclick="#">Sabores Otoño</button>        
                </article>
            </div>
        </div>
    </section>
    <div class="separacion_big"></div>
    <section class="section2">
        <div class="row">
            <div class="col-6 text-center">
                <article class="articleS2L" style="background-image: url('assets/images/fondoS2L.png'); background-size: cover; background-position: center;">
                    <h2 class="h2white">SMOOTHIES CLÁSICOS</h2>
                    <button class="buttonWhite" type="button" onclick="#">Mejores Clásicos</button> 
                </article>
            </div>
            <div class="col-6 text-center">
                <article class="articleS2R">
                    <h2>SABOR DE SIEMPRE EN CADA SORBO</h2>
                    <div class="marginP">
                        <p class="sombra">
                            ¡Descubre la frescura en cada sorbo con nuestros smoothies clásicos y 
                            atemporales! Deléitate con sabores tradicionales como fresa, plátano, 
                            mango y piña. Refresca tu día y disfruta de la esencia de los sabores de 
                            toda la vida en cada vaso. ¡Ven y prueba la nostalgia en un smoothie!
                        </p>
                    </div>       
                </article>
            </div>
        </div>
    </section>
    <div class="separacion_big"></div>
    <section class="section3">
        <div class="row">
            <div class="col-5">
                <div class="row">
                    <div class="col-6 text-center">
                        <article class="articleS3L1">
                            <img src="assets/images/img.svg" alt="icono de imagen" type="image/svg+xml" width="100" height="100">
                        </article>
                    </div>
                    <div class="col-6 text-center">
                        <article class="articleS3L2">
                            <img src="assets/images/img.svg" alt="icono de imagen" type="image/svg+xml" width="100" height="100">
                        </article>
                    </div>
                </div>
            </div>
            <article class="col-2 articulo_promo d-flex justify-content-center align-items-center">
                <button type="button" onclick="#">Promociones</button>
            </article>
            <div class="col-5">
                <div class="row">
                    <div class="col-6 text-center">
                        <article class="articleS3R1">
                            <img src="assets/images/img.svg" alt="icono de imagen" type="image/svg+xml" width="100" height="100">
                        </article>
                    </div>
                    <div class="col-6 text-center">
                        <article class="articleS3R2">
                            <img src="assets/images/img.svg" alt="icono de imagen" type="image/svg+xml" width="100" height="100">
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="separacion_big"></div>
    <?php
        include("footer.html");
    ?>
</body>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</html>
