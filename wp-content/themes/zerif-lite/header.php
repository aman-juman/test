<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package zerif-lite
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

    <head>

        <?php zerif_top_head_trigger(); ?>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <script language="JavaScript" type="text/javascript" src="//static.ticketon.kz/widget/consumer.js"></script>
        <?php wp_head(); ?>

        <?php zerif_bottom_head_trigger(); ?>
        <script>
            ticketon.lang("kz");
            ticketon.tryMobile(false);
        </script>
    </head>

    <?php if (isset($_POST['scrollPosition'])) : ?>

        <body <?php body_class(); ?> onLoad="window.scrollTo(0,<?php echo intval($_POST['scrollPosition']); ?>)">

        <?php else : ?>

        <body <?php body_class(); ?> >

        <?php
        endif;

        zerif_top_body_trigger();

        /* Preloader */

        if (is_front_page() && !is_customize_preview()) :

            $zerif_disable_preloader = get_theme_mod('zerif_disable_preloader');

            if (isset($zerif_disable_preloader) && ( $zerif_disable_preloader != 1 )) :
                echo '<div class="preloader">';
                echo '<div class="status">&nbsp;</div>';
                echo '</div>';
            endif;

        endif;
        ?>


        <div id="mobilebgfix">
            <div class="mobile-bg-fix-img-wrap">
                <div class="mobile-bg-fix-img"></div>
            </div>
            <div class="mobile-bg-fix-whole-site">

                <div class="container">
                    <div class="row">
                        <?php
                        if (has_custom_logo()) {

                            the_custom_logo();
                        }
                        ?>
                        <h4 class="site-title">
<!--                            <a href=" --><?php //echo esc_url(home_url('/')); ?><!-- ">-->
<?php //bloginfo('title'); ?>
                            </a>
                        </h4>
                    </div>
                </div>
                <header id="home" class="header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

                    <div id="main-nav" class="navbar navbar-inverse bs-docs-nav" role="banner">

                        <div class="container">

                            <div class="col-md-12 col-md-offset-1 col-lg-12 main-nav-wrap">


<?php zerif_before_navbar_trigger(); ?>

                                <div class="navbar-header responsive-logo">

                                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">

                                        <span class="sr-only"><?php _e('Toggle navigation', 'zerif-lite'); ?></span>

                                        <span class="icon-bar"></span>

                                        <span class="icon-bar"></span>

                                        <span class="icon-bar"></span>

                                    </button>



                                </div> <!-- /.navbar-header -->

<?php zerif_primary_navigation_trigger(); ?>

                                <!-- /.container -->

<?php zerif_after_header_container_trigger(); ?>
                            </div>
                        </div> 
                    </div> <!-- /#main-nav -->
                    <!-- / END TOP BAR -->
