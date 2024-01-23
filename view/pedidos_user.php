<body>
    <div class="separacion_big"></div>
        <section class="container">
            <div class="row compraS">
                <article class="col-12">
                    <h2>Pedidos:</h2>
                </article>
            </div>
            <?php
            foreach ($allPedidos as $pedido){
            ?>
            <div class="row compraS">
                <article class="detallesC">
                    <div class="row producto">
                        <div class="col-sm-12 col-md-4 col-lg-6 col-xl-6">
                            <p>Numero de pedido: <?=$pedido['pedido_id']?></p>
                            <p>Fecha pedido: <?=$pedido['date_pedido']?></p>
                            <p>Precio Total: <?=$pedido['total']?> €</p>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 ">
                            <form action="<?=url."?controller=producto&action=detalles_pedido"?>" method="POST">
                                <input name="id" value="<?=$pedido['pedido_id']?>" hidden />
                                <button class="buttonDark">Ver detalles</button>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                            <form action="<?=url."?controller=review&action=newReview"?>" method="POST">
                                <button class="buttonDark" type="submit" name="newReview">Dejar comentario pedido</button>
                            </form>   
                        </div>
                    </div>
                </article>
            </div>
            <?php
            }
            ?>
        </section>
    <div class="separacion_big"></div>
</body>
