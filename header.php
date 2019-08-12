<!DOCTYPE html>
<html <?php language_attributes();?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">

		<?php wp_head(); ?>

  </head>
  <header class="header clearfix">
      <a href="<?php echo home_url(); ?>" class="header__logo"><?php bloginfo('name'); ?> </a>

      <?php /* Main Navigation */
        wp_nav_menu( array('theme_location' => 'main-header'));
      ?>

    </header>
<div class="content">
