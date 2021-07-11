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

add_shortcode( 'ICCmappa', 'mappa_shortcode' );
if(!function_exists('mappa_shortcode')){
  function mappa_shortcode($atts) {
    $a = shortcode_atts( array(
      'regione' => 'tutteleregioni',
      'rete' => 'tuttelereti',
      'opzioni' => '',
   ), $atts );
   if(!is_archive()) {
     ob_start();
     include 'shortcode.php';
     return ob_get_clean();
   } else{
     return true;
   }
  }
}

add_filter( 'bulk_actions-edit-mappa', 'my_custom_bulk_actions' );
function my_custom_bulk_actions( $actions ){
  unset( $actions[ 'edit' ] );
  return $actions;
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

add_action( 'widgets_init', 'icc_mappa_sidebars' );
if ( ! function_exists( 'icc_mappa_sidebars' ) ) {
	function icc_mappa_sidebars() {
    register_sidebar(array( 'name' => esc_html__( 'Mappa', 'icc' ),'id' => 'mappa','description' => esc_html__( 'Area visualizzata sotto filtri e descrizione', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
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



//add_action( 'transition_post_status', 'mappa_run_on_publish_only', 10, 3 );
function mappa_run_on_publish_only( $new_status, $old_status, $post ) {
    if ( ( 'publish' === $new_status && 'publish' !== $old_status )
        && 'mappa' === $post->post_type ) {


          $to = get_user_by('id',$post->post_author)->user_email;
          $subject = 'ItaliaCheCambia - Mappa: '.$post->post_title;
          $body = "<html><body>";
          $body .= "Ciao ".get_user_by('id',$post->post_author)->display_name."<br>";
          $body .= "La realtà segnalata è stata pubblicata con successo. <br>";
          $body .= "Il link per raggiungerlo direttamente è ".get_permalink($post->ID);
          $body .= "</body></html>";
          $headers = array('Content-Type: text/html; charset=UTF-8');
          $headers[] = 'From: Italia Che Cambia <checambiaitalia@gmail.com>';
          $headers[] = 'Bcc: ptiozzo@me.com';

          wp_mail( $to, $subject, $body, $headers );
    }
}
add_action( 'admin_menu', 'icc_menu_mappa_admin' );
function icc_menu_mappa_admin()
{
  add_submenu_page(
    'icc-theme',
    'ICC Mappa Reti Nascoste',
    'Mappa Reti Nascoste',
    'edit_posts',
    'icc-mappa-reti-nascoste',
    'icc_menu_admin_mappa_reti_nascoste'
  );
  add_submenu_page(
    'icc-theme',
    'ICC Mappa Nascondi Realtà Rete',
    'Mappa Nascondi Realtà Rete',
    'edit_posts',
    'icc-mappa-nascondi-realta-rete',
    'icc_menu_admin_mappa_nascondi_realta_rete'
  );
  add_submenu_page(
    'icc-theme',
    'ICC Mappa Export',
    'Mappa Export',
    'edit_posts',
    'icc-mappa-export',
    'icc_menu_admin_mappa_export'
  );

  add_submenu_page(
    'icc-theme',
    'ICC Mappa PF',
    'Mappa PF',
    'edit_posts',
    'icc-mappa-pf',
    'icc_menu_admin_mappa_pf'
  );
}
function icc_menu_admin_mappa_nascondi_realta_rete(){
  require 'admin-mappaNascondiRealtaRete.php';
}
function icc_menu_admin_mappa_reti_nascoste(){
  require 'admin-mappaRetiNascoste.php';
}
function icc_menu_admin_mappa_export()
{
  require 'admin-mappaExport.php';
}

function icc_menu_admin_mappa_pf()
{
  require 'admin-mappapf.php';
}

add_action( 'init', 'icc_mappa_rewrite' );
function icc_mappa_rewrite(){
    add_rewrite_rule( '^mappa/tag/([a-z0-9-]+)[/]?$', 'index.php?pagename=mappa&mappatag=$matches[1]','top' );
}

function icc_is_ReteNascosta($rete){
  $RetiNascoste = get_option('icc_RetiNascoste_attivi') ? get_option('icc_RetiNascoste_attivi') : array();

  foreach ($RetiNascoste as $reti){
    if (strtolower($rete) === $reti['ReteSlug']){
      return true;
    }
  }
  return false;
}


if ( isset($_GET['action'] ) && $_GET['action'] == 'download_csv' )  {
	add_action( 'admin_init', 'icc_mappaExport_downloadCSV' );
}
function icc_mappaExport_downloadCSV(){

    // Check for current user privileges
    if( !current_user_can( 'edit_posts' ) ){ return false; }

    // Check if we are in WP-Admin
    if( !is_admin() ){ return false; }

    // Nonce Check
    $nonce = isset( $_GET['_wpnonce'] ) ? $_GET['_wpnonce'] : '';
    if ( ! wp_verify_nonce( $nonce, 'download_csv' ) ) {
        die( 'Security check error' );
    }

  require 'admin-mappaExport-downloadCSV.php';
}



?>
