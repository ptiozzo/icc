<?php

add_filter('init', 'add_nuovo_redirectPF');
function add_nuovo_redirectPF() {
    // Create post object
    if(!get_page_by_path('redirectPF')){
      $my_post = array(
        'post_title'    => wp_strip_all_tags( 'RedirectPF' ),
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'     => 'page',
        'post_name'     => 'redirectpf'
      );

      // Insert the post into the database
    wp_insert_post( $my_post );
    }
}

add_filter('template_include', 'icc_custom_redirectpf');
function icc_custom_redirectpf( $template ) {
  if ( is_page('redirectpf') ) {
    return dirname( __FILE__ ) . '/redirectpf_page.php';
  }
  return $template;
}

?>
