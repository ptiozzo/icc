<?php
add_action('init', 'icc_user_init');

if(!function_exists('icc_user_init')){
  function icc_user_init(){
    require 'customuser.php';
  }
}

function icc_custom_registration_form( $template ) {
  if ( is_page('registrati') ) {
    return dirname( __FILE__ ) . '/page-registration.php';
  }
  return $template;
}
add_filter('template_include', 'icc_custom_registration_form');

require 'widget.php';

add_action( 'wp_enqueue_scripts', 'utenteicc_style_scripts' );
if(!function_exists('utenteicc_style_scripts')){
  function utenteicc_style_scripts(){
    wp_enqueue_style( 'utenteicc', get_template_directory_uri().'/plugin/utenteicc/utenteicc.css',array(),filemtime(get_template_directory() . '/plugin/utenteicc/utenteicc.css'),'all');
  }
}

?>
