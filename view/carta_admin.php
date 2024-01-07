<body>
    <div class="separacion_big"></div>
        <section class="mCarta container mx-auto">
            <h2>Todos Los Productos</h2>
            <form action="<?=url."?controller=producto&action=insertar"?>" method="POST">
                <button class="buttonDelete" type="submit" name="insertar">
                <svg width="30px" height="30px" viewBox="-51.2 -51.2 614.40 614.40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#004733" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="5.12"/>
                        <g id="SVGRepo_iconCarrier"> <title>add</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Shape" fill="#004733" transform="translate(65.929697, 65.929697)"> <polygon points="211.189225 2.36847579e-14 211.189225 168.95138 380.140606 168.95138 380.140606 211.189225 211.189225 211.189225 211.189225 380.140606 168.95138 380.140606 168.95138 211.189225 -1.42108547e-14 211.189225 -1.42108547e-14 168.95138 168.95138 168.95138 168.95138 -1.42108547e-14"> </polygon> </g> </g> </g>
                    </svg>
                </button>
            </form>
            <div class="row">
                <?php
                    foreach($allProducts as $product){?>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <article class="producto">
                        <div class="imgProducto d-flex justify-content-center align-items-center">
                            <img src="../assets/images/<?=$product->getImagen()?>" alt="icono de imagen" type="image/svg+xml"/>
                            <div class="anadirCarrito">
                                <form action="<?=url."?controller=producto&action=editar"?>" method="POST">
                                    <input name="id" value="<?=$product->getIdProducto()?>" hidden />
                                    <button type="submit" name="editar" class="bCarrito">Editar Producto</button>
                                </form>
                            </div>
                        </div>
                        <div class="productoTexto">
                            <p><?=$product->getNombre()?></p>
                            <p><?=$product->getPrecio()?>€</p>
                            <form action="<?=url."?controller=producto&action=delete"?>" method="POST">
                                <input name="id" value="<?=$product->getIdProducto()?>" hidden />
                                <button class="buttonDelete mt-auto" type="submit" name="delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 13" xml:space="preserve">
                                        <path d="M11.7 2H8.8V.5c0-.3-.2-.5-.5-.5H4.4c-.3 0-.5.2-.5.5V2H1c-.3 0-.5.2-.5.5s.2.5.5.5h.9v9c0 .3.2.5.5.5h8.2c.3 0 .5-.2.5-.5V3h.6c.3 0 .5-.2.5-.5S12 2 11.7 2zM4.9 1h2.9v1H4.9V1zm5.2 10.5H2.9V3h7.2v8.5z"></path>
                                        <path d="M8.5 10.2c-.3 0-.5-.2-.5-.5V4.9c0-.3.2-.5.5-.5s.5.2.5.5v4.8c0 .3-.2.5-.5.5zm-2 0c-.3 0-.5-.2-.5-.5V4.9c0-.3.2-.5.5-.5s.5.2.5.5v4.8c0 .3-.2.5-.5.5zm-2 0c-.3 0-.5-.2-.5-.5V4.9c0-.3.2-.5.5-.5s.5.2.5.5v4.8c0 .3-.2.5-.5.5z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </article>
                </div>
                <?php
                    }?>
            </div>
        </section>
    <div class="separacion_big"></div>
</body>
