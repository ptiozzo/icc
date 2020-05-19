<?php
add_action('init', 'icc_user_init');

if(!function_exists('icc_user_init')){
  function icc_user_init(){
    require 'customuser.php';
  }
}

function add_registrati_page() {
    // Create post object
    if(!get_page_by_path('registrati')){
      $my_post = array(
        'post_title'    => wp_strip_all_tags( 'Registrati' ),
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page',
        'post_name'     => 'registrati'
      );

      // Insert the post into the database
      wp_insert_post( $my_post );
    }
}
add_filter('init', 'add_registrati_page');


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

add_action('wp_logout','go_home');
function go_home(){
  wp_redirect( home_url() );
  exit();
}

add_filter( 'register_url', 'custom_register_url' );
function custom_register_url( $register_url )
{
    $register_url = "/registrati//";
    return $register_url;
}

?>
