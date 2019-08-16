<!DOCTYPE html>
<html <?php language_attributes();?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">

		<?php wp_head(); ?>

  </head>
<div class="container clearfix">
  <header class="header clearfix">
      <?php /* Menu */ ?>
        <div class="menu_scomparsa"><?php
          wp_nav_menu( array('theme_location' => 'menu-i-nostri-contenuti'));
          wp_nav_menu( array('theme_location' => 'menu-regioni'));  ?>
        </div>
        <a href="<?php echo home_url(); ?>" class="header__logo"><?php bloginfo('name'); ?> Logo</a>
        <?php
          wp_nav_menu( array('theme_location' => 'menu-principale'));
          wp_nav_menu( array('theme_location' => 'menu-social'));
        ?>
        <?php
          if (is_category('piemonte')){
            wp_nav_menu( array('theme_location' => 'menu-piemonte'));
          }
          if (is_category('casentino')){
            wp_nav_menu( array('theme_location' => 'menu-casentino'));
          }
          if (is_category('berlin')){
            wp_nav_menu( array('theme_location' => 'menu-berlin'));
          }
          if (is_category('salute')){
            wp_nav_menu( array('theme_location' => 'menu-salute'));
          }
          if (is_category('brandeburg')){
            wp_nav_menu( array('theme_location' => 'menu-brandeburg'));
          }
        ?>
    </header>
