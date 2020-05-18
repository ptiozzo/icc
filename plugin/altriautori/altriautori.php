<?php

require 'autori_meta_box_markup.php';
require 'autori_meta_box_save.php';

function author_archive_template( $template ) {
  if ( is_author() ) {
    $theme_files = array('author.php');
    $exists_in_theme = locate_template($theme_files, false);
    if ( $exists_in_theme != '' ) {
      return $exists_in_theme;
    } else {
      return dirname( __FILE__ ) . '/author.php';
    }
  }
  return $template;
}

add_filter('author_template', 'author_archive_template');

 ?>
