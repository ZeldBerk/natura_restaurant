<header>
    <div class="headerTopBar">
        <p>ENVÍO GRATIS EN PENÍNSULA A PARTIR DE 40€. ENVÍO ESTIMADO 24H-72H</p>
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav nav-underline navbar-nav mr-manual mb-2 mb-lg-0 padB">
                        <li class="nav-item">
                            <a class="navlinkP" aria-current="page" href="#">Sobre Natura</a>
                        </li>
                        <li class="nav-item">
                            <a class="navlinkP" href="#">Compromiso Natura</a>
                        </li>
                    </ul>
                    <div class="mx-auto">
                        <a href=<?=url."?controller=producto"?>>
                            <img class="logo" src="../assets/icons/logo.png" alt="Logo Natura">
                        </a>
                    </div>
                    <ul class="nav nav-underline navbar-nav mb-2 mb-lg-0 padB">
                        <li class="nav-item buscador">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                <path fill="none" stroke="#004733" stroke-miterlimit="10" d="M17.52 17.521l-5.278-5.278S14 10.564 14 8s-1.989-6-6-6-6 3.415-6 6 2.053 6 6 6c2.755 0 4.242-1.757 4.242-1.757"></path>
                            </svg>
                            <input class="buscar" type="text" placeholder="Buscar">
                        </li>
                        <li class="nav-item">
                            <a class="navlinkP" aria-current="page" href=<?=url."?controller=producto&action=cuenta"?>>cuenta</a>
                        </li>
                        <li class="nav-item">
                            <a href=<?=url."?controller=producto&action=carrito"?>>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                    <g fill="none" fill-rule="evenodd" stroke="#004733">
                                        <path d="M3.585 5.554h12.678l1.585 12.142H2z"></path>
                                        <path d="M12.971 8.286v-4.2C12.971 2.38 11.607 1 9.924 1S6.876 2.381 6.876 4.085v4.2"></path>
                                    </g>
                                </svg>
                                <?= isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0 ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav nav-underline navbar-nav mr-manual mb-lg-0 mx-auto">
                        <li class="nav-item">
                            <a class="menu" aria-current="page" href=<?=url."?controller=producto&action=show_carta"?>>Carta</a>
                        </li>
                        <li class="nav-item">
                            <a class="menu" href=<?=url."?controller=producto"?>>Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>