<body>
    <div class="separacion_big"></div>
        <section class="container">
            <div class="row compraS">
                <article class="col-12">
                    <h2>Detalles del pedido</h2>
                </article>
            </div>
            <div class="row compraS">
                <article class="detallesC">
                <?php
                    foreach($_SESSION['pedidos'] as $pedido){?>
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
                            <p class="mt-auto"><?=$pedido->getCantidad()?></p>
                        </div>
                    </div>
                    <?php
                    }?>
                </article>
            </div>
            <div class="row">
                <article class="ticket">
                    <div class="row d-flex flex-column">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                            <form action="<?=url."?controller=producto&action=show_pedidos"?>" method="POST">
                                <button class="buttonDark">Volver atras</button>
                            </form>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    <div class="separacion_big"></div>
</body>
