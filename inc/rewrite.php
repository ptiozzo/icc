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

  add_rewrite_rule( '^piemonte/articoli/page/?([0-9]{1,})/?', 'index.php?page_id=41188&paged=$matches[1]','top' );
	add_rewrite_rule( '^piemonte/articoli/?', 'index.php?page_id=41188','top' );
	add_rewrite_rule( '^piemonte/bacheca/?', 'index.php?page_id=68057','top' );
	add_rewrite_rule( '^piemonte/calendario/?', 'index.php?page_id=57957','top' );
	add_rewrite_rule( '^piemonte/contattaci/?', 'index.php?page_id=41204','top' );
	add_rewrite_rule( '^piemonte/mappa/?', 'index.php?page_id=57961','top' );
	add_rewrite_rule( '^piemonte/visione-azioni-2040-cuneo/agricoltura-e-alimentazione/?', 'index.php?page_id=93360','top' );
	add_rewrite_rule( '^piemonte/visione-azioni-2040-cuneo/ambiente-e-verde/?', 'index.php?page_id=93363','top' );
	add_rewrite_rule( '^piemonte/visione-azioni-2040-cuneo/comunita/?', 'index.php?page_id=93366','top' );
	add_rewrite_rule( '^piemonte/visione-azioni-2040-cuneo/?', 'index.php?page_id=93357','top' );
	add_rewrite_rule( '^piemonte/pianetafuturo/?', 'index.php?page_id=64470','top' );
	add_rewrite_rule( '^piemonte/storie/page/?([0-9]{1,})/?', 'index.php?page_id=41191&paged=$matches[1]','top' );
	add_rewrite_rule( '^piemonte/storie/?', 'index.php?page_id=41191','top' );
	add_rewrite_rule( '^piemonte/([^/]*)/page/?([0-9]{1,})/?', 'index.php?pagename=template-province&par1=$matches[1]&paged=$matches[2]','top' );
	add_rewrite_rule( '^piemonte/([^/]*)/?', 'index.php?pagename=template-province&par1=$matches[1]','top' );
	add_rewrite_rule( '^liguria/articoli/page/?([0-9]{1,})/?', 'index.php?page_id=73309&paged=$matches[1]','top' );
	add_rewrite_rule( '^liguria/articoli/?', 'index.php?page_id=73309','top' );
	add_rewrite_rule( '^liguria/bacheca/?', 'index.php?page_id=68061','top' );
	add_rewrite_rule( '^liguria/calendario/?', 'index.php?page_id=57957','top' );
	add_rewrite_rule( '^liguria/contattaci/?', 'index.php?page_id=59233','top' );
	add_rewrite_rule( '^liguria/mappa/?', 'index.php?page_id=59231','top' );
	add_rewrite_rule( '^liguria/storie/page/?([0-9]{1,})/?', 'index.php?page_id=59227&paged=$matches[1]','top' );
	add_rewrite_rule( '^liguria/storie/?', 'index.php?page_id=59227','top' );
	add_rewrite_rule( '^liguria/([^/]*)/page/?([0-9]{1,})/?', 'index.php?pagename=template-province&par1=$matches[1]&paged=$matches[2]','top' );
	add_rewrite_rule( '^liguria/([^/]*)/?', 'index.php?pagename=template-province&par1=$matches[1]','top' );
	add_rewrite_rule( '^sicilia/storie/page/?([0-9]{1,})/?', 'index.php?page_id=100623&paged=$matches[1]','top' );
	add_rewrite_rule( '^sicilia/storie/?', 'index.php?page_id=100623','top' );

}
add_action('init', 'myplugin_rewrite_rule', 10, 0);

 ?>
