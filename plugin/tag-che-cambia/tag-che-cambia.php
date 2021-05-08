<?php

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

add_action( 'init' , 'icc_tag_activation' );
function icc_tag_activation(){
  $TagAttivi = get_option("icc_tagCheCambia_attivi") ? get_option("icc_tagCheCambia_attivi") : array();

  foreach ($TagAttivi as $tag){
    register_sidebar(array( 'name' => esc_html__( 'TAG '.$tag['tagName'], 'icc' ),'id' => $tag['tagName'],'description' => esc_html__( 'Area '.$tag['tagName'].' nella sidebar', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    register_sidebar(array( 'name' => esc_html__( 'TAG '.$tag['tagName'].' 1', 'icc' ),'id' => $tag['tagName'].'sx','description' => esc_html__( 'Area '.$tag['tagName'].' nella colonna sinistra tra evidenza e mappa, larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    register_sidebar(array( 'name' => esc_html__( 'TAG '.$tag['tagName'].' 2', 'icc' ),'id' => $tag['tagName'].'dx','description' => esc_html__( 'Area '.$tag['tagName'].' nella colonna centrale dopo 2 articoli, larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));

    ;
  }
}

 ?>
