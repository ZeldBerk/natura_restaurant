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
<body class="">
    <section class="section1">
        <div class="row mx-auto">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 position-relative">
                <article class="articleS1L">
                    <img src="../assets/images/smoothie_platano_home.png" alt="Smoothie de platano" class="img-fluid position-absolute top-0 end-0" style="z-index: 1; max-width: 325px; max-height: 406px; transform: scaleX(-1); padding: 4px;">
                    <h2 class="position-relative" style="z-index: 2;">NUEVOS SABORES A PROBAR</h2>
                    <form action=<?=url."?controller=producto&action=show_carta"?> method="POST">
                        <button class="position-relative" type="submit" name="show_carta">Nuevos Smoothies</button>
                    </form>
                </article>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 position-relative">
                <article class="articleS1R">
                    <img src="../assets/images/bol_fresas_home.png" alt="Bol con fresas trozos de coco y pipas de girasol" class="img-fluid position-absolute top-0 end-0" style="z-index: 1; max-width: 428px; max-height: 416px; transform: scaleY(-1); padding: 4px;">
                    <h2 class="position-relative" style="z-index: 2;">NUEVOS DESAYUNOS</h2>
                    <form action=<?=url."?controller=producto&action=show_carta"?> method="POST">
                        <button class="position-relative" type="submit" name="show_carta">Nuevos Desayunos</button>
                    </form>                
                </article>
            </div>
        </div>
        <div class="separacion_lite"></div>
        <div class="row">
            <div class="col-12 text-center position-relative">
                <article class="articleS1B">
                    <div class="row">
                        <div class="col-3">
                            <img src="../assets/images/bol_frutos_platano.png" alt="Bol de frutos del bocque, platano frutos secos" class="img-fluid position-absolute top-0 start-0" style="z-index: 1; max-width: 393px; max-height: 465px;">
                        </div>
                        <div class="col-6">
                            <h2 class="position-relative" style="z-index: 2;">NUEVOS PRODUCTOS</h2>
                            <h2 class="position-relative">OTOÑALES</h2>
                            <form action=<?=url."?controller=producto&action=show_carta"?> method="POST">
                                <button class="position-relative" type="submit" name="show_carta">Sabores Otoño</button>
                            </form>   
                        </div>
                        <div class="col-3 d-flex align-items-center">
                            <img src="../assets/images/smoothie_kiwi.png" alt="Smoothie de platano" class="img-fluid position-absolute " style="z-index: 1; max-width: 230px; max-height: 421px;">
                        </div>   
                    </div>
                </article>
            </div>
        </div>
    </section>
    <div class="separacion_big"></div>
    <section class="section2">
        <div class="row mx-auto">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center">
                <article class="articleS2L" style="background-image: url('../assets/images/fondoS2L.png'); background-size: cover; background-position: center;">
                    <h2 class="h2white">SMOOTHIES CLÁSICOS</h2>
                    <form action=<?=url."?controller=producto&action=show_carta"?> method="POST">
                        <button class="buttonWhite" type="submit" name="show_carta">Mejores Clásicos</button>
                    </form>
                </article>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center">
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
            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
                <div class="row">
                    <div class="col-6 text-center">
                        <article class="articleS3L1">
                            <img src="../assets/images/img.svg" alt="icono de imagen" type="image/svg+xml" width="100" height="100">
                        </article>
                    </div>
                    <div class="col-6 text-center">
                        <article class="articleS3L2">
                            <img src="../assets/images/img.svg" alt="icono de imagen" type="image/svg+xml" width="100" height="100">
                        </article>
                    </div>
                </div>
            </div>
            <article class="col-sm-12 col-md-12 col-lg-2 col-xl-2 articulo_promo d-flex justify-content-center align-items-center">
                <form action=<?=url."?controller=producto&action=show_carta"?> method="POST">
                    <button class="position-relative" type="submit" name="show_carta">Promociones</button>
                </form>
            </article>
            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
                <div class="row">
                    <div class="col-6 text-center">
                        <article class="articleS3R1">
                            <img src="../assets/images/img.svg" alt="icono de imagen" type="image/svg+xml" width="100" height="100">
                        </article>
                    </div>
                    <div class="col-6 text-center">
                        <article class="articleS3R2">
                            <img src="../assets/images/img.svg" alt="icono de imagen" type="image/svg+xml" width="100" height="100">
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="separacion_big"></div>
</body>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</html>