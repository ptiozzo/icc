<?php

/**
 * Plugin Name: Bacheca per portale ICC
 * Plugin URI: http://ptiozzo.net
 * Description: Bacheca cerco/offo per ItaliaCheCambia
 * Version: 0.1
 * Author: Paolo Tiozzo
 * Author URI: http://ptiozzo.net/
 * License: GPL2
 */


 add_action('init', 'bacheca_paolo_init');

 if(!function_exists('bacheca_paolo_init')){
   function bacheca_paolo_init(){
     require 'cpt-bacheca.php';
     require 'tassonomia-bacheca.php';
   }
 }

add_action( 'wp_enqueue_scripts', 'bacheca_style_scripts' );
if(!function_exists('bacheca_style_scripts')){
  function bacheca_style_scripts(){
    wp_enqueue_style( 'bacheca', get_template_directory_uri().'/plugin/bacheca/bacheca.css',array(),filemtime(get_template_directory() . '/plugin/bacheca/bacheca.css'),'all');
  }
}

 add_filter('template_include', 'cercooffro_archive_template');

 function cercooffro_archive_template( $template ) {
   if ( is_post_type_archive('cerco-offro') ) {
     $theme_files = array('archive-cerco-offro.php', 'archive-cerco-offro.php');
     $exists_in_theme = locate_template($theme_files, false);
     echo $exists_in_theme;
     if ( $exists_in_theme != '' ) {
       return $exists_in_theme;
     } else {
       return dirname( __FILE__ ) . '/archive-cerco-offro.php';
     }
   }
   return $template;
 }

 add_filter('single_template', 'cercooffro_single_template');

 function cercooffro_single_template( $template ) {
   if ( get_post_type() == "cerco-offro" ) {
     $theme_files = array('single-cerco-offro.php', 'single-cerco-offro.php');
     $exists_in_theme = locate_template($theme_files, false);
     echo $exists_in_theme;
     if ( $exists_in_theme != '' ) {
       return $exists_in_theme;
     } else {
       return dirname( __FILE__ ) . '/single-cerco-offro.php';
     }
   }
   return $template;
 }

 function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function wcc_comment_reform ($arg) {
$arg['title_reply'] = __('Lascia un commento pubblico');
return $arg;
}
add_filter('comment_form_defaults','wcc_comment_reform');
 ?>
