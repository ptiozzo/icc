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

 ?>
