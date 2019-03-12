<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$cod = isset($_GET["cod"]) ? $_GET["cod"] : '';
$servicio = new Clases\Servicios();
$servicio->set("cod", $cod);
$servicio_data = $servicio->view();
$serviciosData = $servicio->lista("","","3");
$imagenes = new Clases\Imagenes();
$imagenes_data = $imagenes->list("" );
$template->set("title", TITULO . ' | '.ucfirst(strip_tags($servicio_data['titulo'])));
$template->set("description", ucfirst(substr(strip_tags($servicio_data['desarrollo']), 0, 160)));
$template->set("keywords", strip_tags($servicio_data['keywords']));
$template->set("imagen", LOGO);
$template->set("body", "header-fixed page sidebar-left header-style-2 topbar-style-1 menu-has-search");
$template->themeInit();
?>
<div id="wrapper" class="animsition">
    <div id="page" class="clearfix">


        <!-- Featured Title -->
        <div id="featured-title" class="featured-title clearfix">
            <div id="featured-title-inner" class="container clearfix row">
                <div class="featured-title-inner-wrap">
                    <div class="featured-title-heading-wrap">
                        <h1 class="feautured-title-heading">
                            <?= ucfirst($servicio_data["titulo"]);?>
                        </h1>
                    </div>
                </div><!-- /.featured-title-inner-wrap -->
            </div><!-- /#featured-title-inner -->
        </div>
        <!-- End Featured Title -->

        <!-- Main Content -->
        <div id="main-content" class="site-main clearfix">
            <div id="content-wrap" class="container">
                <div id="site-content" class="site-content clearfix">
                    <div id="inner-content" class="inner-content-wrap">
                        <div class="themesflat-spacer clearfix" data-desktop="80" data-mobile="60" data-smobile="60"></div>
                        <div class="themesflat-row equalize sm-equalize-auto clearfix row">
                            <div class="col-md-12 bg-f7f">
                                <div class="themesflat-content-box clearfix" data-margin="0 10px 0 43px" data-mobilemargin="0 15px 0 15px">
                                    <?php
                                    $imagenes->set("cod", $servicio_data["cod"]);
                                    $img = $imagenes->view();?>
                                    <div class="themesflat-headings style-2 clearfix">
                                     <img src="<?= URL . '/' . $img['ruta'] ?>" width="100%" style=" background: no-repeat center center/cover;">

                                        <div class="sep has-width w80 accent-bg margin-top-20 clearfix"></div>
                                        <p class="sub-heading margin-top-33 line-height-24"><?= ucfirst($servicio_data['desarrollo']); ?></p>
                                    </div>
                                </div>
                                <div class="themesflat-spacer clearfix" data-desktop="56" data-mobile="56" data-smobile="56"></div>
                            </div>

                        </div><!-- /.themesflat-row -->
                        <div class="themesflat-spacer clearfix" data-desktop="39" data-mobile="39" data-smobile="39"></div>
                        <div class="themesflat-spacer clearfix" data-desktop="37" data-mobile="35" data-smobile="35"></div>
                    </div><!-- /#inner-content -->
                </div><!-- /#site-content -->
                <div id="sidebar">
                    <div class=" col-md-4 themesflat-spacer clearfix" data-desktop="80" data-mobile="0" data-smobile="0"></div>
                    <div id="inner-sidebar" class="inner-content-wrap">
                        <div class="widget widget_list">
                        <?php foreach ($serviciosData as $port): ?>
                            <div class="inner">
                                <ul class="list-wrap">
                                    <li class="list-item">
                                        <a href="<?= URL . '/servicio/' . $funciones->normalizar_link($port['titulo']) . '/' . $funciones->normalizar_link($port['cod']) ?>"><span class="text"><?= ucfirst($port['titulo']); ?></span></a>
                                    </li>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                        </div><!-- /.widget_list -->
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="60" data-smobile="60"></div>
                </div><!-- /#sidebar -->
            </div><!-- /#content-wrap -->
        </div><!-- /#main-content -->





    </div><!-- /#page -->
</div><!-- /#wrapper -->

<?php $template->themeEnd(); ?>