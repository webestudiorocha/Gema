<?php
$id = isset($_GET["id"]) ? $_GET["id"] : '';
$servicio = new Clases\Servicios();
$servicio->set("cod", $id);
$servicio_data = $servicio->lista("", "", "");
$funciones_nav = new Clases\PublicFunction();
?>

<div id="site-header-wrap">
    <!-- Top Bar -->
    <div id="top-bar">
        <div id="top-bar-inner" class="container">
            <div class="top-bar-inner-wrap">
                <div class="top-bar-content">
                    <div class="inner">
                        <span class="address content">fgdgdfgd</span>
                        <span class="phone content">11111</span>
                    </div>
                </div><!-- /.top-bar-content -->

                <div class="top-bar-socials">
                    <div class="inner">
                        <span class="text">Seguinos</span>
                        <span class="icons">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </span>
                    </div>
                </div><!-- /.top-bar-socials -->
            </div>
        </div>
    </div><!-- /#top-bar -->

    <!-- Header -->
    <header id="site-header">
        <div id="site-header-inner" class="container">
            <div class="wrap-inner clearfix">
                <div id="site-logo" class="clearfix">
                    <div id="site-log-inner">
                        <a href="<?= URL; ?>/index.phpl" rel="home" class="main-logo">
                            <img src="<?= URL; ?>/assets/img/logo-small.png" alt="Autora" width="186" height="39" data-retina="assets/img/logo-small@2x.png" data-width="186" data-height="39">
                        </a>
                    </div>
                </div><!-- /#site-logo -->

                <div class="mobile-button">
                    <span></span>
                </div><!-- /.mobile-button -->

                <nav id="main-nav" class="main-nav">
                    <ul id="menu-primary-menu" class="menu">
                        <li class="menu-item menu-item-has-children current-menu-item">
                            <a href="<?= URL; ?>/index">Inicio</a>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="<?= URL; ?>/c/empresa" alt="EMPRESA">Sobre Nosotros</a>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="<?= URL; ?>/servicios">Servicios</a>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="<?= URL; ?>/productos">Productos</a>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="<?= URL; ?>/blogs">Blog</a>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="<?= URL; ?>/contacto">Contacto</a>
                        </li>
                    </ul>
                </nav><!-- /#main-nav -->


            </div><!-- /.wrap-inner -->
        </div><!-- /#site-header-inner -->
    </header><!-- /#site-header -->
</div><!-- #site-header-wrap -->
