<body>
    <div class="separacion_big"></div>
        <section class="container">
            <div class="row compraS">
                <article class="col-12">
                    <h2>Resumen de compra</h2>
                    <p>Revisa tu pedido antes de continuar.</p>
                </article>
            </div>
            <div class="row compraS">
                <article class="detallesC">
                <input type="number" name="id_usuario" value="<?=$_SESSION['loggedin']['id'] ?>" hidden required/>
                <?php
                    $pos = 0;
                    foreach($_SESSION['carrito'] as $pedido){?>
                    <div class="row producto">
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            <img src="../assets/images/carrito/<?=$pedido->getProducto()->getImagen()?>" alt="icono de imagen" type="image/svg+xml"/>
                        </div>
                        <div class="col-3 d-flex flex-column">
                            <p class="mb-auto sub"><?=$pedido->getProducto()->getNombre()?></p>
                            <p class="mt-auto"><?=$pedido->getProducto()->getPrecio()?></p>
                            <p>Subtotal: <?=$pedido->devuelvePrecio()?></p>
                        </div>
                        <div class="col-1 d-flex flex-column">
                            <p class="mt-auto">Cantidad</p>
                        </div>
                        <div class="col-2 d-flex flex-column">
                            <form class="mt-auto" action="<?=url."?controller=producto&action=carrito"?>" method="POST">
                                <button class="butonCantidad" type="submit" name="Del" value=<?=$pos?>>-</button>
                                <label class="labelCantidad"><?=$pedido->getCantidad()?></label>
                                <button class="butonCantidad marginLeftBcantidad" type="submit" name="Add" value=<?=$pos?>>+</button>
                            </form>
                        </div>
                        <div class="col-5 d-flex flex-column justify-content-end">
                            <form class="align-self-end" action="<?=url."?controller=producto&action=carrito"?>" method="POST">
                                <button class="buttonDelete" type="submit" name="delete" value=<?=$pos?>>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 13" xml:space="preserve">
                                        <path d="M11.7 2H8.8V.5c0-.3-.2-.5-.5-.5H4.4c-.3 0-.5.2-.5.5V2H1c-.3 0-.5.2-.5.5s.2.5.5.5h.9v9c0 .3.2.5.5.5h8.2c.3 0 .5-.2.5-.5V3h.6c.3 0 .5-.2.5-.5S12 2 11.7 2zM4.9 1h2.9v1H4.9V1zm5.2 10.5H2.9V3h7.2v8.5z"></path>
                                        <path d="M8.5 10.2c-.3 0-.5-.2-.5-.5V4.9c0-.3.2-.5.5-.5s.5.2.5.5v4.8c0 .3-.2.5-.5.5zm-2 0c-.3 0-.5-.2-.5-.5V4.9c0-.3.2-.5.5-.5s.5.2.5.5v4.8c0 .3-.2.5-.5.5zm-2 0c-.3 0-.5-.2-.5-.5V4.9c0-.3.2-.5.5-.5s.5.2.5.5v4.8c0 .3-.2.5-.5.5z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php
                    $pos++;
                    }?>
                </article>
            </div>
            <div class="row">
                <article class="ticket">
                    <div class="row d-flex flex-column">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 order-last">
                            <p class="pLCarrito">Natura no se hace responsable de las tasas de aduana fuera del espacio Schengen.</p>
                            <p class="pLCarrito">Ver los gastos de envío a Baleares, Canarias, Ceuta y Melilla </p>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 ms-auto">
                            <div class="row mbFila">
                                <div class="col-8 d-flex flex-column justify-content-end">
                                    <div class="align-self-end">
                                        <p class="catorcepx">Subtotal</p>
                                        <p class="catorcepx">Usar Puntos</p>
                                        <p class="diezSeispx">Total</p>
                                    </div>
                                </div>
                                <div class="col-4 d-flex flex-column justify-content-end">
                                    <div class="align-self-end">
                                        <div>
                                            <p class="catorcepx"><?=CalcularPrecios::calculdorPrecioPedido($_SESSION['carrito'])?></p>
                                            <form action="" method="POST">
                                            <button class="butonCantidad" id="restarPuntos" type="button">-</button>
                                            <label class="catorcepx puntos" id="puntosLabel"></label>
                                            <input type="hidden" name="puntos_usar" id="puntosUsar" value="0" />
                                            <button class="butonCantidad" id="sumarPuntos" type="button">+</button>
                                            </form>
                                            <input type="number" name="precioSinPuntos" value="<?=CalcularPrecios::calculdorPrecioPedido($_SESSION['carrito'])?>" hidden required/>
                                            <p class="diezSeispx" id="showPrecioTotal"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7"></div>
                                <div class="col-5 d-flex flex-column justify-content-end">
                                    <div class="align-self-end">
                                        <form action="<?=url."?controller=producto&action=finalizarCompra"?>" method="POST">
                                            <button class="buttonDark">Realizar compra | <?=CalcularPrecios::calculdorPrecioPedido($_SESSION['carrito'])?></button>
                                        </form>
                                    </div>
                                    <p class="catorcepx">Puntos ganados con esta compra: +<?=CalcularPrecios::calcularPuntosPedido(CalcularPrecios::calculdorPrecioPedido($_SESSION['carrito']))?>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    <div class="separacion_big"></div>
    <script src="../assets/js/control_puntos.js"></script>
</body>
