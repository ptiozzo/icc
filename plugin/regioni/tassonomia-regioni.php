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
  "rewrite" => [ 'slug' => 'territori', 'with_front' => true,  'hierarchical' => true, ],
  "show_admin_column" => true,
  "show_in_rest" => true,
  "rest_base" => "territori",
  "rest_controller_class" => "WP_REST_Terms_Controller",
  'map_meta_cap' => true,
  "show_in_quick_edit" => true,
  ];
register_taxonomy( "territori", [ "post" ], $args );

if(term_exists( 'abruzzo', 'territori' ) !== 0){
  wp_insert_term('Abruzzo','territori',array('slug' => 'abruzzo' ) );
}
if(term_exists( 'basilicata', 'territori' ) !== 0){
  wp_insert_term('Basilicata','territori',array('slug' => 'basilicata' ) );
}
if(term_exists( 'calabria', 'territori' ) !== 0){
  wp_insert_term('Calabria','territori',array('slug' => 'calabria' ) );
}
if(term_exists( 'campania', 'territori' ) !== 0){
  wp_insert_term('Campania','territori',array('slug' => 'campania' ) );
}
if(term_exists( 'emilia-romagna', 'territori' ) !== 0){
  wp_insert_term('Emilia-Romagna','territori',array('slug' => 'emilia-romagna' ) );
}
if(term_exists( 'friuliveneziagiulia', 'territori' ) !== 0){
  wp_insert_term('Friuli Venezia Giulia','territori',array('slug' => 'friuliveneziagiulia' ) );
}
if(term_exists( 'lazio', 'territori' ) !== 0){
  wp_insert_term('Lazio','territori',array('slug' => 'lazio' ) );
}
if(term_exists( 'liguria', 'territori' ) !== 0){
  wp_insert_term('Liguria','territori',array('slug' => 'liguria' ) );
}
if(term_exists( 'lombardia', 'territori' ) !== 0){
  wp_insert_term('Lombardia','territori',array('slug' => 'lombardia' ) );
}
if(term_exists( 'marche', 'territori' ) !== 0){
  wp_insert_term('Marche','territori',array('slug' => 'marche' ) );
}
if(term_exists( 'molise', 'territori' ) !== 0){
  wp_insert_term('Molise','territori',array('slug' => 'molise' ) );
}
if(term_exists( 'piemonte', 'territori' ) !== 0){
  wp_insert_term('Piemonte','territori',array('slug' => 'piemonte' ) );
}
if(term_exists( 'puglia', 'territori' ) !== 0){
  wp_insert_term('Puglia','territori',array('slug' => 'puglia' ) );
}
if(term_exists( 'sardegna', 'territori' ) !== 0){
  wp_insert_term('Sardegna','territori',array('slug' => 'sardegna' ) );
}
if(term_exists( 'sicilia', 'territori' ) !== 0){
  wp_insert_term('Sicilia','territori',array('slug' => 'sicilia' ) );
}
if(term_exists( 'toscana', 'territori' ) !== 0){
  wp_insert_term('Toscana','territori',array('slug' => 'toscana' ) );
}
if(term_exists( 'toscana', 'territori' ) !== 0){
  wp_insert_term('Toscana','territori',array('slug' => 'toscana' ) );
}
if(term_exists( 'trentino-alto-adige', 'territori' ) !== 0){
  wp_insert_term('Trentino Alto Adige','territori',array('slug' => 'trentino-alto-adige' ) );
}
if(term_exists( 'umbria', 'territori' ) !== 0){
  wp_insert_term('Umbria','territori',array('slug' => 'umbria' ) );
}
if(term_exists( 'valledaosta', 'territori' ) !== 0){
  wp_insert_term('Valle d\'Aosta','territori',array('slug' => 'valledaosta' ) );
}
if(term_exists( 'veneto', 'territori' ) !== 0){
  wp_insert_term('Veneto','territori',array('slug' => 'veneto' ) );
}
?>
