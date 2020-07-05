<?php

$user = wp_get_current_user();
if ( in_array( 'icc_user', (array) $user->roles ) ) {
  add_filter('show_admin_bar', '__return_false');
}


add_action('init', 'mappa_paolo_init');
if(!function_exists('mappa_paolo_init')){
  function mappa_paolo_init(){
    require 'cpt-mappa.php';
    require 'tassonomia-mappa.php';
  }
}

add_action( 'wp_enqueue_scripts', 'mappa_style_scripts' );
if(!function_exists('mappa_style_scripts')){
  function mappa_style_scripts(){
    wp_enqueue_style( 'icc-mappa-pers', get_template_directory_uri().'/plugin/mappa/mappa.css',array(),filemtime(get_template_directory() . '/plugin/mappa/mappa.css'),'all');
    wp_enqueue_style( 'icc-leaflet-css', get_template_directory_uri().'/plugin/mappa/asset/leaflet/leaflet.css',array(),filemtime(get_template_directory() . '/plugin/mappa/asset/leaflet/leaflet.css'),'all');
    wp_enqueue_style( 'icc-leaflet-gesture-css', get_template_directory_uri().'/plugin/mappa/asset/leaflet/leaflet-gesture-handling.min.css',array(),filemtime(get_template_directory() . '/plugin/mappa/asset/leaflet/leaflet-gesture-handling.min.css'),'all');
    wp_enqueue_style( 'icc-leaflet-MarkerCluster-css', get_template_directory_uri().'/plugin/mappa/asset/leaflet/MarkerCluster.css',array(),filemtime(get_template_directory() . '/plugin/mappa/asset/leaflet/MarkerCluster.css'),'all');
    wp_enqueue_style( 'icc-leaflet-MarkerClusterDefault-css', get_template_directory_uri().'/plugin/mappa/asset/leaflet/MarkerCluster.Default.css',array(),filemtime(get_template_directory() . '/plugin/mappa/asset/leaflet/MarkerCluster.Default.css'),'all');
    wp_enqueue_script( 'icc-leaflet-js', get_template_directory_uri().'/plugin/mappa/asset/leaflet/leaflet.js','','',false);
    wp_enqueue_script( 'icc-leaflet-gesture-js', get_template_directory_uri().'/plugin/mappa/asset/leaflet/leaflet-gesture-handling.min.js','','',false);
    wp_enqueue_script( 'icc-leaflet-MarkerCluster-js', get_template_directory_uri().'/plugin/mappa/asset/leaflet/leaflet.markercluster.js','','',false);
  }
}

add_action('admin_head', 'mappa_admin_style_scripts');
if(!function_exists('mappa_admin_style_scripts')){
  function mappa_admin_style_scripts() {
    $user = wp_get_current_user();
    if ( in_array( 'icc_user', (array) $user->roles ) ) {
      wp_enqueue_style( 'mappa-admin', get_template_directory_uri().'/plugin/mappa/mappa-admin.css',array(),filemtime(get_template_directory() . '/plugin/mappa/mappa-admin.css'),'all');
      wp_enqueue_script('mappa-admin-js', get_template_directory_uri() . '/plugin/mappa/mappa-admin.js');
    }
  }
}

add_filter('template_include', 'mappa_archive_template');
function mappa_archive_template( $template ) {
  if ( is_post_type_archive('mappa') ) {
    $theme_files = array('archive-mappa.php', 'archive-mappa.php');
    $exists_in_theme = locate_template($theme_files, false);
    echo $exists_in_theme;
    if ( $exists_in_theme != '' ) {
      return $exists_in_theme;
    } else {
      return dirname( __FILE__ ) . '/archive-mappa.php';
    }
  }
  return $template;
}

add_filter('single_template', 'mappa_single_template');
function mappa_single_template( $template ) {
  if ( get_post_type() == "mappa" ) {
    $theme_files = array('single-mappa.php', 'single-mappa.php');
    $exists_in_theme = locate_template($theme_files, false);
    echo $exists_in_theme;
    if ( $exists_in_theme != '' ) {
      return $exists_in_theme;
    } else {
      return dirname( __FILE__ ) . '/single-mappa.php';
    }
  }
  return $template;
}

add_filter('init', 'add_nuovo_mappa_page');
function add_nuovo_mappa_page() {
    // Create post object
    if(!get_page_by_path('nuovarealtasegnalata')){
      $my_post = array(
        'post_title'    => wp_strip_all_tags( 'Segnala Nuova Realtà' ),
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page',
        'post_name'     => 'nuovarealtasegnalata'
      );

      // Insert the post into the database
    wp_insert_post( $my_post );
    }
}

add_filter('template_include', 'icc_custom_new_mappa');
function icc_custom_new_mappa( $template ) {
  if ( is_page('nuovarealtasegnalata') ) {
    return dirname( __FILE__ ) . '/new-mappa.php';
  }
  return $template;
}


require 'mappa_meta_box_markup.php';
require 'mappa_meta_box_save.php';

require 'mappa_calcolo_realta.php';

add_filter('init', 'import_nuovo_mappa_page');
function import_nuovo_mappa_page() {
    // Create post object
    if(!get_page_by_path('importmappa')){
      $my_post = array(
        'post_title'    => wp_strip_all_tags( 'Import Mappa' ),
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page',
        'post_name'     => 'importmappa'
      );

      // Insert the post into the database
    wp_insert_post( $my_post );
    }
}

add_filter('template_include', 'icc_custom_import_mappa');
function icc_custom_import_mappa( $template ) {
  if ( is_page('importmappa') ) {
    return dirname( __FILE__ ) . '/import-mappa.php';
  }
  return $template;
}

?>