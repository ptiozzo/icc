<?php

add_action( 'admin_menu', 'icc_menu_regioni_admin' );
function icc_menu_regioni_admin()
{
  add_submenu_page(
    'icc-theme',
    'ICC Regioni',
    'Regioni',
    'edit_posts',
    'icc-regioni-setting',
    'icc_menu_admin_regioni_isctruction'
  );
}

function icc_menu_admin_regioni_isctruction()
{
  require 'admin-regioni.php';
}

function icc_is_region_active($regione){
  $regioni = get_option('icc_regioni_attive') ? get_option('icc_regioni_attive') : array();

  if(in_array(strtolower($regione),$regioni)){
    return true;
  } else {
    return false;
  }
}

add_action('init', 'icc_post_regioni');
function icc_post_regioni(){
  require 'tassonomia-regioni.php';
}

include 'regione-prima-contenuto.php';

?>
