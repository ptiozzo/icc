<?php

/* Aggiunta pagina in area admin */
add_action( 'admin_menu', 'icc_menu_tag_admin' );
function icc_menu_tag_admin()
{
  add_submenu_page(
    'icc-theme',
    'ICC Regioni',
    'Tag Che Cambia',
    'edit_posts',
    'icc-tag-setting',
    'icc_menu_admin_tag_isctruction'
  );
}

function icc_menu_admin_tag_isctruction()
{
  require 'admin-tag.php';
}

function icc_is_tag_active($tag){
  $tag = get_option('icc_tag_attive') ? get_option('icc_tag_attive') : array();

  if(in_array(strtolower($tag),$tag)){
    return true;
  } else {
    return false;
  }
}

/* Inizializzazione widget/menu/urlRewrite */
add_action( 'init' , 'icc_tag_activation' );
function icc_tag_activation(){
  $TagAttivi = get_option("icc_tagCheCambia_attivi") ? get_option("icc_tagCheCambia_attivi") : array();

  foreach ($TagAttivi as $tag){

    /* Sidebar */
    register_sidebar(array( 'name' => esc_html__( 'TAG '.get_term_by('slug', $tag['tagName'],'post_tag')->name, 'icc' ),'id' => $tag['tagName'],'description' => esc_html__( 'Area '.get_term_by('slug', $tag['tagName'],'post_tag')->name.' nella sidebar', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    register_sidebar(array( 'name' => esc_html__( 'TAG '.get_term_by('slug', $tag['tagName'],'post_tag')->name.' 1', 'icc' ),'id' => $tag['tagName'].'sx','description' => esc_html__( 'Area '.get_term_by('slug', $tag['tagName'],'post_tag')->name.' nella colonna sinistra tra evidenza e mappa, larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    register_sidebar(array( 'name' => esc_html__( 'TAG '.get_term_by('slug', $tag['tagName'],'post_tag')->name.' 2', 'icc' ),'id' => $tag['tagName'].'dx','description' => esc_html__( 'Area '.get_term_by('slug', $tag['tagName'],'post_tag')->name.' nella colonna centrale dopo 2 articoli, larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    register_sidebar(array( 'name' => esc_html__( 'TAG '.get_term_by('slug', $tag['tagName'],'post_tag')->name.' footer', 'icc' ),'id' => $tag['tagName'].'footer','description' => esc_html__( 'Area '.get_term_by('slug', $tag['tagName'],'post_tag')->name.' nel footer della pagina', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));

    /* Menu */
    register_nav_menus( array(
      'menu-'.$tag['tagName'] => esc_html__( 'Menu '.get_term_by('slug', $tag['tagName'],'post_tag')->name, 'icc' ),
		) );

    /* Filtro sticky */
    if( term_exists( $tag['tagName'].'sticky', 'icc_altri_filtri' ) == 0 ){
  		wp_insert_term( get_term_by('slug', $tag['tagName'],'post_tag')->name." sticky",'icc_altri_filtri',array('slug' => $tag['tagName'].'sticky' ) );
  	}

    /* UrlRewrite */

    /* articoli */
    add_rewrite_rule( '^'.$tag['tagName'].'/articoli/page/?([0-9]{1,})/?', 'index.php?pagename=tag-che-cambia_articoli&paged=$matches[1]&tag='.$tag['tagName'].'','top' );
  	add_rewrite_rule( '^'.$tag['tagName'].'/articoli/?', 'index.php?pagename=tag-che-cambia_articoli&tag='.$tag['tagName'].'','top' );
    /* storie */
    add_rewrite_rule( '^'.$tag['tagName'].'/storie/page/?([0-9]{1,})/?', 'index.php?pagename=tag-che-cambia_storie&paged=$matches[1]&tag='.$tag['tagName'].'','top' );
  	add_rewrite_rule( '^'.$tag['tagName'].'/storie/?', 'index.php?pagename=tag-che-cambia_storie&tag='.$tag['tagName'].'','top' );
    /* mappa */
    add_rewrite_rule( '^'.$tag['tagName'].'/mappa/?', 'index.php?pagename=tag-che-cambia_mappa&tag='.$tag['tagName'].'','top' );
    /* home */
    add_rewrite_rule( $tag['tagName'], 'index.php?pagename=tag-che-cambia&tag='.$tag['tagName'].'','top' );
  }
}


add_action( 'template_redirect' , 'icc_tag_redirect' );
function icc_tag_redirect(){
  $TagAttivi = get_option("icc_tagCheCambia_attivi") ? get_option("icc_tagCheCambia_attivi") : array();

  foreach ($TagAttivi as $tag){
    /* Redirect */
    $url = home_url($tag['tagName']);

    if( is_tag($tag['tagName']) ){
      if ( wp_redirect( $url,301 ) ) {
        exit;
      }
    }
  }
}

/* Creo pagina tag-che-cambia */
add_filter('init', 'add_nuovo_tagCheCambia_page');
function add_nuovo_tagCheCambia_page() {
    // Creo pagina Home
    if(!get_page_by_path('tag-che-cambia')){
      $my_post = array(
        'post_title'    => wp_strip_all_tags( 'Tag che cambia' ),
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page',
        'post_name'     => 'tag-che-cambia'
      );
      // Insert the post into the database
      wp_insert_post( $my_post );
    }
    // Creo pagina Articoli
    if(!get_page_by_path('tag-che-cambia_articoli')){
      $my_post = array(
        'post_title'    => wp_strip_all_tags( 'Tag che cambia articoli' ),
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page',
        'post_name'     => 'tag-che-cambia_articoli'
      );
      // Insert the post into the database
      wp_insert_post( $my_post );
    }
    // Creo pagina Storie
    if(!get_page_by_path('tag-che-cambia_storie')){
      $my_post = array(
        'post_title'    => wp_strip_all_tags( 'Tag che cambia storie' ),
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page',
        'post_name'     => 'tag-che-cambia_storie'
      );
      // Insert the post into the database
      wp_insert_post( $my_post );
    }
    // Creo pagina Mappa
    if(!get_page_by_path('tag-che-cambia_mappa')){
      $my_post = array(
        'post_title'    => wp_strip_all_tags( 'Tag che cambia mappa' ),
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page',
        'post_name'     => 'tag-che-cambia_mappa'
      );
      // Insert the post into the database
      wp_insert_post( $my_post );
    }
}

add_filter('template_include', 'icc_custom_new_tagCheCambia');
function icc_custom_new_tagCheCambia( $template ) {
  if ( is_page('tag-che-cambia') ) {
    return dirname( __FILE__ ) . '/tagCheCambia_page.php';
  }
  if ( is_page('tag-che-cambia_articoli') ) {
    return dirname( __FILE__ ) . '/tagCheCambia_pageArticoli.php';
  }
  if ( is_page('tag-che-cambia_storie') ) {
    return dirname( __FILE__ ) . '/tagCheCambia_pageStorie.php';
  }
  if ( is_page('tag-che-cambia_mappa') ) {
    return dirname( __FILE__ ) . '/tagCheCambia_pageMappa.php';
  }
  return $template;
}

 ?>
