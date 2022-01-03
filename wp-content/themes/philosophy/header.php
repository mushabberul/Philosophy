<!DOCTYPE html>
<html class="no-js"                                                          <?php language_attributes();?>>
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php wp_head();?>

</head>

<body id="top"                                           <?php body_class();?>>
<?php wp_body_open();?>

    <!-- pageheader
    ================================================== -->
    <section class="s-pageheader                                                                                                 <?php if ( is_home() ) {echo 's-pageheader--home';}?> ">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <?php if ( has_custom_logo() ): ?>
                    <a class="logo" href="<?php echo home_url( "/" ) ?>">
                        <?php
                           the_custom_logo();
                        ?>
                    </a>
                    <?php else: ?>
                        <h1>
                            <a href="<?php echo home_url( "/" ) ?>">
                        <?php
                           bloginfo( 'name' );
                        ?>
                        </a>
                    </h1>
                    <?php endif;?>
                </div> <!-- end header__logo -->

                <ul class="header__social">
                    <li>
                        <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </li>
                </ul> <!-- end header__social -->

                <a class="header__search-trigger" href="#0"></a>

                <div class="header__search">

                    <?php
                       echo get_search_form();
                    ?>

                    <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

                </div>  <!-- end header__search -->


 <?php get_template_part( "template-parts/common/navigation" );?>

            </div> <!-- header-content -->
        </header> <!-- header -->




 <?php
    if ( is_home() ) {
       get_template_part( "template-parts/blog-home/featured" );
    }
 ?>

    </section> <!-- end s-pageheader -->
