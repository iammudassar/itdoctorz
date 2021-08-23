<?php
/**
 * Header file 
 * 
 * @package itdoctorz
 */
?>
<!doctype html>
<html lang="<?php language_attributes(); ?>">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
        <title>IT Doctorz</title>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?> >

    <?php 
    if( function_exists( 'wp_body_open' ) ){
      wp_body_open();
    }
    ?>

    <div class="page" class="site">

        <header id="mastheader" class="site-header" role="banner">  
          <?php get_template_part('template-parts/header/nav') ?> 
        </header>
        <div class="content" class="site-content"> 
