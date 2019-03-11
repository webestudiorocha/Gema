<?php
require_once "Config/Autoload.php";
Config\Autoload::runSitio();
$template = new Clases\TemplateSite();
$funciones = new Clases\PublicFunction();
$imagenes = new Clases\Imagenes();
$portfolio = new Clases\Portfolio();
$novedades = new Clases\Novedades();
$sliders = new Clases\Sliders();
$contenido= new Clases\Contenidos();
$template->set("title", TITULO . " | Contacto");
$template->set("description", "Contacto de " . TITULO);
$template->set("keywords", "Contacto de " . TITULO);
$template->set("body", "header-fixed page no-sidebar header-style-2 topbar-style-1 menu-has-search");
$enviar = new Clases\Email();
$template->themeInit();
?>
<div id="wrapper" class="animsition">
    <div id="page" class="clearfix">
        <!-- Featured Title -->
        <div id="featured-title" class="featured-title clearfix">
            <div id="featured-title-inner" class="container clearfix">
                <div class="featured-title-inner-wrap">
                    <div class="featured-title-heading-wrap">
                        <h1 class="feautured-title-heading">
                            Contacto
                        </h1>
                    </div>
                </div><!-- /.featured-title-inner-wrap -->
            </div><!-- /#featured-title-inner -->
        </div>
        <!-- End Featured Title -->

        <!-- Main Content -->
        <div id="main-content" class="site-main clearfix">
            <div id="content-wrap">
                <div id="site-content" class="site-content clearfix">
                    <div id="inner-content" class="inner-content-wrap">
                       <div class="page-content">
                            <!-- ICONBOX -->
                            <div class="row-iconbox">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="themesflat-spacer clearfix" data-desktop="61" data-mobile="60" data-smobile="60"></div>
                                            <div class="themesflat-headings style-1 text-center clearfix">
                                                <h2 class="heading">CONTACTO</h2>
                                                <div class="sep has-icon width-125 clearfix">
                                                    <div class="sep-icon">
                                                        <span class="sep-icon-before sep-center sep-solid"></span>
                                                        <span class="icon-wrap"><i class="autora-icon-build"></i></span>
                                                        <span class="sep-icon-after sep-center sep-solid"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="themesflat-spacer clearfix" data-desktop="45" data-mobile="35" data-smobile="35"></div>
                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->

                                    <div class="row gutter-16 ">
                                        <?php $contenido->set("cod", "CONTACTO");
                                        $conContacto =  $contenido->view();
                                        echo $conContacto["contenido"];

                                        ?>
                                    </div><!-- /.row -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="themesflat-spacer clearfix" data-desktop="58" data-mobile="35" data-smobile="35"></div>
                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->
                                </div><!-- /.container -->
                            </div>
                            <!-- END ICONBOX -->

                           <!-- CONTACT -->
                           <div class="row-contact">
                               <div class="container">
                                   <div class="row">
                                       <div class="col-md-4">
                                           <div class="themesflat-contact-form style-2 w100 clearfix">
                                               <?php if (isset($_POST["enviar"])):
                                                   $nombre = $funciones->antihack_mysqli(isset($_POST["nombre"]) ? $_POST["nombre"] : '');
                                                   $email = $funciones->antihack_mysqli(isset($_POST["email"]) ? $_POST["email"] : '');
                                                   $telefono = $funciones->antihack_mysqli(isset($_POST["telefono"]) ? $_POST["telefono"] : '');
                                                   $consulta = $funciones->antihack_mysqli(isset($_POST["consulta"]) ? $_POST["consulta"] : '');
                                                   $asunto = $funciones->antihack_mysqli(isset($_POST["asunto"]) ? $_POST["asunto"] : '');

                                                   $mensajeFinal = "<b>Nombre</b>: " . $nombre . " <br/>";
                                                   $mensajeFinal .= "<b>Email</b>: " . $email . "<br/>";
                                                   $mensajeFinal .= "<b>Teléfono</b>: " . $telefono . " <br/>";
                                                   $mensajeFinal .= "<b>Consulta</b>: " . $consulta . "<br/>";

                                                   //USUARIO
                                                   $enviar->set("asunto", "Realizaste tu consulta");
                                                   $enviar->set("receptor", $email);
                                                   $enviar->set("emisor", EMAIL);
                                                   $enviar->set("mensaje", $mensajeFinal);
                                                   if ($enviar->emailEnviar() == 1):
                                                       echo '<div class="alert alert-success" role="alert">¡Consulta enviada correctamente!</div>';
                                                   endif;

                                                   //ADMIN

                                                   $mensajeFinalAdmin = "<b>Nombre</b>: " . $nombre . " <br/>";
                                                   $mensajeFinalAdmin .= "<b>URL</b>: " . $asunto . "<br/>";
                                                   $mensajeFinalAdmin .= "<b>Email</b>: " . $email . "<br/>";
                                                   $mensajeFinalAdmin .= "<b>Teléfono</b>: " . $telefono . " <br/>";
                                                   $mensajeFinalAdmin .= "<b>Consulta</b>: " . $consulta . "<br/>";
                                                   //ADMIN
                                                   $enviar->set("asunto", "Consulta Web");
                                                   $enviar->set("receptor", EMAIL);
                                                   $enviar->set("mensaje", $mensajeFinalAdmin);
                                                   if ($enviar->emailEnviar() == 0):
                                                       echo '<div class="alert alert-danger" role="alert">¡No se ha podido enviar la consulta!</div>';
                                                   endif;
                                               endif; ?>
                                               <form id="contact-form" method="post">
                                                   <input type="text"  id="name" name="nombre" value="" class="wpcf7-form-control" placeholder="Nombre" required>
                                                   <input type="hidden" name="asunto" class="form-control" placeholder="Nombre" required id="name"
                                                          title="asunto" value="<?= CANONICAL ?>"/>
                                                   <input type="email"  id="email" name="email" value="" class="wpcf7-form-control" placeholder=" Email" required>
                                                   <input type="text"  id="telefono" name="telefono" value="" class="wpcf7-form-control" placeholder="Telefono">



                                                   <textarea name="consulta"   id="comment" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" placeholder="Consulta" required ></textarea>

                                                   <div class="col-md-12">
                                                       <input type="submit" name="enviar" id="submit" value="Enviar Mensaje">
                                                   </div>
                                               </form>
                                           </div><!-- /.themesflat-contact-form -->
                                       </div><!-- /.col-md-6 -->
                                       <div class="col-md-8">
                                           <div class="themesflat-spacer clearfix" data-desktop="0" data-mobile="0" data-smobile="35"></div>
                                           <div class="themesflat-map style-2"></div>
                                       </div><!-- /.col-md-6 -->
                                   </div><!-- /.row -->
                                   <div class="row">
                                       <div class="col-md-12">
                                           <div class="themesflat-spacer clearfix" data-desktop="81" data-mobile="60" data-smobile="60"></div>
                                       </div><!-- /.col-md-12 -->
                                   </div><!-- /.row -->
                               </div><!-- /.container -->
                           </div>
                            <!-- END CONTACT -->
                       </div><!-- /.page-content -->
                    </div><!-- /#inner-content -->
                </div><!-- /#site-content -->
            </div><!-- /#content-wrap -->
        </div><!-- /#main-content -->


    </div><!-- /#page -->
</div><!-- /#wrapper -->
<?php $template->themeEnd(); ?>

