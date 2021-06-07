<?php
/**
 * Taxonomy: Regioni.
 */

$labels = [
  "name" => __( "Regione", "icc" ),
  "singular_name" => __( "Regione", "icc" ),
  "menu_name" => __( "Regione", "icc" ),
  "search_items" => __( "Cerca regione", "icc") ,
];

$args = [
  "label" => __( "Regioni", "icc" ),
  "labels" => $labels,
  "public" => true,
  "publicly_queryable" => true,
  "hierarchical" => true,
  "show_ui" => true,
  "show_in_menu" => true,
  "show_in_nav_menus" => true,
  "query_var" => true,
  "rewrite" => [ 'slug' => 'postregione', 'with_front' => true,  'hierarchical' => true, ],
  "show_admin_column" => true,
  "show_in_rest" => true,
  "rest_base" => "postregione",
  "rest_controller_class" => "WP_REST_Terms_Controller",
  'map_meta_cap' => true,
  "show_in_quick_edit" => true,
  ];
register_taxonomy( "postregione", [ "post" ], $args );

if(term_exists( 'abruzzo', 'postregione' ) !== 0){
  wp_insert_term('Abruzzo','postregione',array('slug' => 'abruzzo' ) );
}
if(term_exists( 'basilicata', 'postregione' ) !== 0){
  wp_insert_term('Basilicata','postregione',array('slug' => 'basilicata' ) );
}
if(term_exists( 'calabria', 'postregione' ) !== 0){
  wp_insert_term('Calabria','postregione',array('slug' => 'calabria' ) );
}
if(term_exists( 'campania', 'postregione' ) !== 0){
  wp_insert_term('Campania','postregione',array('slug' => 'campania' ) );
}
if(term_exists( 'emilia-romagna', 'postregione' ) !== 0){
  wp_insert_term('Emilia-Romagna','postregione',array('slug' => 'emilia-romagna' ) );
}
if(term_exists( 'friuliveneziagiulia', 'postregione' ) !== 0){
  wp_insert_term('Friuli Venezia Giulia','postregione',array('slug' => 'friuliveneziagiulia' ) );
}
if(term_exists( 'lazio', 'postregione' ) !== 0){
  wp_insert_term('Lazio','postregione',array('slug' => 'lazio' ) );
}
if(term_exists( 'liguria', 'postregione' ) !== 0){
  wp_insert_term('Liguria','postregione',array('slug' => 'liguria' ) );
}
if(term_exists( 'lombardia', 'postregione' ) !== 0){
  wp_insert_term('Lombardia','postregione',array('slug' => 'lombardia' ) );
}
if(term_exists( 'marche', 'postregione' ) !== 0){
  wp_insert_term('Marche','postregione',array('slug' => 'marche' ) );
}
if(term_exists( 'molise', 'postregione' ) !== 0){
  wp_insert_term('Molise','postregione',array('slug' => 'molise' ) );
}
if(term_exists( 'piemonte', 'postregione' ) !== 0){
  wp_insert_term('Piemonte','postregione',array('slug' => 'piemonte' ) );
}
if(term_exists( 'puglia', 'postregione' ) !== 0){
  wp_insert_term('Puglia','postregione',array('slug' => 'puglia' ) );
}
if(term_exists( 'sardegna', 'postregione' ) !== 0){
  wp_insert_term('Sardegna','postregione',array('slug' => 'sardegna' ) );
}
if(term_exists( 'sicilia', 'postregione' ) !== 0){
  wp_insert_term('Sicilia','postregione',array('slug' => 'sicilia' ) );
}
if(term_exists( 'toscana', 'postregione' ) !== 0){
  wp_insert_term('Toscana','postregione',array('slug' => 'toscana' ) );
}
if(term_exists( 'toscana', 'postregione' ) !== 0){
  wp_insert_term('Toscana','postregione',array('slug' => 'toscana' ) );
}
if(term_exists( 'trentino-alto-adige', 'postregione' ) !== 0){
  wp_insert_term('Trentino Alto Adige','postregione',array('slug' => 'trentino-alto-adige' ) );
}
if(term_exists( 'umbria', 'postregione' ) !== 0){
  wp_insert_term('Umbria','postregione',array('slug' => 'umbria' ) );
}
if(term_exists( 'valledaosta', 'postregione' ) !== 0){
  wp_insert_term('Valle d\'Aosta','postregione',array('slug' => 'valledaosta' ) );
}
if(term_exists( 'veneto', 'postregione' ) !== 0){
  wp_insert_term('Veneto','postregione',array('slug' => 'veneto' ) );
}
?>
