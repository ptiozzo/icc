<?php

add_action( 'admin_menu', 'icc_menu_macro_admin' );
function icc_menu_macro_admin()
{
  add_submenu_page(
    'icc-theme',
    'ICC Macro test',
    'Macrolibrarsi test',
    'edit_posts',
    'icc-macro-test',
    'icc_menu_admin_macro_test'
  );
}

function icc_menu_admin_macro_test()
{
  require 'admin-macro.php';
}

add_shortcode( 'ICCMacoLibrarsi', 'ICCMacoLibrarsi_shortcode' );

if(!function_exists('ICCMacoLibrarsi_shortcode')){
  function ICCMacoLibrarsi_shortcode($atts) {
    $a = shortcode_atts( array(
      'code' => ''
   ), $atts );
     ob_start();
     include 'shortcode.php';
     return ob_get_clean();
  }
}

 ?>
