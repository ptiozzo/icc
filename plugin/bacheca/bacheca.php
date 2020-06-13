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

 $user = wp_get_current_user();
 if ( in_array( 'icc_user', (array) $user->roles ) ) {
   add_filter('show_admin_bar', '__return_false');
 }


 add_action('init', 'bacheca_paolo_init');

 if(!function_exists('bacheca_paolo_init')){
   function bacheca_paolo_init(){
     require 'cpt-bacheca.php';
     require 'tassonomia-bacheca.php';
   }
 }


require 'widget.php';


add_shortcode( 'bacheca-cercooffro', 'bacheca_cercooffro_shortcode' );

if(!function_exists('bacheca_cercooffro_shortcode')){
  function bacheca_cercooffro_shortcode($atts) {
    $a = shortcode_atts( array(
      'regione' => '_tutteleregioni'
   ), $atts );
   if(!is_archive()) {
     ob_start();
     include 'shortcode.php';
     return ob_get_clean();
   } else{
     include 'shortcode.php';
     return true;
   }
  }
}

add_action( 'wp_enqueue_scripts', 'bacheca_style_scripts' );
if(!function_exists('bacheca_style_scripts')){
  function bacheca_style_scripts(){
    wp_enqueue_style( 'bacheca', get_template_directory_uri().'/plugin/bacheca/bacheca.css',array(),filemtime(get_template_directory() . '/plugin/bacheca/bacheca.css'),'all');

  }
}

add_action('admin_head', 'bacheca_admin_style_scripts');
function bacheca_admin_style_scripts() {

  $user = wp_get_current_user();
  if ( in_array( 'icc_user', (array) $user->roles ) ) {
    wp_enqueue_style( 'bacheca-admin', get_template_directory_uri().'/plugin/bacheca/bacheca-admin.css',array(),filemtime(get_template_directory() . '/plugin/bacheca/bacheca-admin.css'),'all');
    wp_enqueue_script('bacheca-admin-js', get_template_directory_uri() . '/plugin/bacheca/bacheca-admin.js');
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


function add_nuovo_cercooffro_page() {
    // Create post object
    if(!get_page_by_path('nuovocercooffro')){
      $my_post = array(
        'post_title'    => wp_strip_all_tags( 'Nuovo cerco/offro' ),
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page',
        'post_name'     => 'nuovocercooffro'
      );

      // Insert the post into the database
    wp_insert_post( $my_post );


    }
}
add_filter('init', 'add_nuovo_cercooffro_page');

function icc_custom_new_cerco_offro( $template ) {
  if ( is_page('nuovocercooffro') ) {
    return dirname( __FILE__ ) . '/new-cercooffro.php';
  }
  return $template;
}
add_filter('template_include', 'icc_custom_new_cerco_offro');



function wpdocs_run_on_publish_only( $new_status, $old_status, $post ) {
    if ( ( 'publish' === $new_status && 'publish' !== $old_status )
        && 'cerco-offro' === $post->post_type ) {


          $to = get_user_by('id',$post->post_author)->user_email;
          $subject = 'ItaliaCheCambia - Cerco\Offro: '.$post->post_title;
          $body = "<html><body>";
          $body .= "Ciao ".get_user_by('id',$post->post_author)->display_name."<br>";
          $body .= "Il tuo annuncio è stato pubblicato con successo. <br>";
          $body .= "Il link per raggiungerlo direttamente è ".get_permalink($post->ID);
          $body .= "</body></html>";
          $headers = array('Content-Type: text/html; charset=UTF-8');
          $headers[] = 'From: Italia Che Cambia <checambiaitalia@gmail.com>';
          $headers[] = 'Bcc: ptiozzo@me.com';

          wp_mail( $to, $subject, $body, $headers );
    }
}
add_action( 'transition_post_status', 'wpdocs_run_on_publish_only', 10, 3 );

 ?>
