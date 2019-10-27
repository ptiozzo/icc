<?php

/**
 * Register custom query vars
 *
 * @param array $vars The array of available query variables
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/query_vars
 */
function myplugin_register_query_vars( $vars ) {
	$vars[] = 'par1';
  $vars[] = 'par2';
	return $vars;
}
add_filter( 'query_vars', 'myplugin_register_query_vars' );

/**
 * Add rewrite rules
 *
 * @link https://codex.wordpress.org/Rewrite_API/add_rewrite_rule
 */
function myplugin_rewrite_rule() {

  add_rewrite_rule( '^mappa/([^/]*)/([^/]*)/?', 'index.php?pagename=mappa&par1=$matches[1]&par2=$matches[2]','top' );
  add_rewrite_rule( '^mappa/([^/]*)/?', 'index.php?pagename=mappa&par1=$matches[1]','top' );
	

}
add_action('init', 'myplugin_rewrite_rule', 10, 0);

 ?>
