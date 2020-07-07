<?php

/**
 * Taxonomy: Categoria.
 */

$labels = [
	"name" => __( "Categoria", "icc" ),
	"singular_name" => __( "Categoria", "icc" ),
	"menu_name" => __( "Categoria", "icc" ),
];

$args = [
	"label" => __( "categoria", "icc" ),
	"labels" => $labels,
	"public" => true,
	"publicly_queryable" => true,
	"hierarchical" => true,
	"show_ui" => true,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"query_var" => true,
	"rewrite" => [ 'slug' => 'categoria', 'with_front' => true,  'hierarchical' => true, ],
	"show_admin_column" => true,
	"show_in_rest" => true,
	"rest_base" => "categoria",
	"rest_controller_class" => "WP_REST_Terms_Controller",
	'map_meta_cap' => true,
	"show_in_quick_edit" => true,
	];
register_taxonomy( "categoria", [ "mappa" ], $args );

/**
 * Taxonomy: Rete.
 */

$labels = [
	"name" => __( "Rete", "icc" ),
	"singular_name" => __( "Rete", "icc" ),
	"menu_name" => __( "Rete", "icc" ),
];

$args = [
	"label" => __( "rete", "icc" ),
	"labels" => $labels,
	"public" => true,
	"publicly_queryable" => true,
	"hierarchical" => true,
	"show_ui" => true,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"query_var" => true,
	"rewrite" => [ 'slug' => 'rete', 'with_front' => true,  'hierarchical' => true, ],
	"show_admin_column" => true,
	"show_in_rest" => true,
	"rest_base" => "rete",
	"rest_controller_class" => "WP_REST_Terms_Controller",
	'map_meta_cap' => true,
	"show_in_quick_edit" => true,
	];
	register_taxonomy( "rete", [ "mappa" ], $args );

	/**
	 * Taxonomy: Regioni.
	 */

	$labels = [
		"name" => __( "Regione", "icc" ),
		"singular_name" => __( "Regione", "icc" ),
		"menu_name" => __( "Regione", "icc" ),
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
		"rewrite" => [ 'slug' => 'regionemappa', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "regionemappa",
		"rest_controller_class" => "WP_REST_Terms_Controller",
    'map_meta_cap' => true,
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "regionemappa", [ "mappa" ], $args );

	if(term_exists( 'abruzzo', 'regionemappa' ) !== 0){
		wp_insert_term('Abruzzo','regionemappa',array('slug' => 'abruzzo' ) );
	}
	if(term_exists( 'basilicata', 'regionemappa' ) !== 0){
		wp_insert_term('Basilica','regionemappa',array('slug' => 'basilicata' ) );
	}
	if(term_exists( 'calabria', 'regionemappa' ) !== 0){
		wp_insert_term('Calabria','regionemappa',array('slug' => 'calabria' ) );
	}
	if(term_exists( 'campania', 'regionemappa' ) !== 0){
		wp_insert_term('Campania','regionemappa',array('slug' => 'campania' ) );
	}
	if(term_exists( 'emilia-romagna', 'regionemappa' ) !== 0){
		wp_insert_term('Emilia-Romagna','regionemappa',array('slug' => 'emilia-romagna' ) );
	}
	if(term_exists( 'friuliveneziagiulia', 'regionemappa' ) !== 0){
		wp_insert_term('Friuli Venezia Giulia','regionemappa',array('slug' => 'friuliveneziagiulia' ) );
	}
	if(term_exists( 'lazio', 'regionemappa' ) !== 0){
		wp_insert_term('Lazio','regionemappa',array('slug' => 'lazio' ) );
	}
	if(term_exists( 'liguria', 'regionemappa' ) !== 0){
		wp_insert_term('Liguria','regionemappa',array('slug' => 'liguria' ) );
	}
	if(term_exists( 'lombardia', 'regionemappa' ) !== 0){
		wp_insert_term('Lombardia','regionemappa',array('slug' => 'lombardia' ) );
	}
	if(term_exists( 'marche', 'regionemappa' ) !== 0){
		wp_insert_term('Marche','regionemappa',array('slug' => 'marche' ) );
	}
	if(term_exists( 'molise', 'regionemappa' ) !== 0){
		wp_insert_term('Molise','regionemappa',array('slug' => 'molise' ) );
	}
	if(term_exists( 'piemonte', 'regionemappa' ) !== 0){
		wp_insert_term('Piemonte','regionemappa',array('slug' => 'piemonte' ) );
	}
	if(term_exists( 'puglia', 'regionemappa' ) !== 0){
		wp_insert_term('Puglia','regionemappa',array('slug' => 'puglia' ) );
	}
	if(term_exists( 'sardegna', 'regionemappa' ) !== 0){
		wp_insert_term('Sardegna','regionemappa',array('slug' => 'sardegna' ) );
	}
	if(term_exists( 'sicilia', 'regionemappa' ) !== 0){
		wp_insert_term('Sicilia','regionemappa',array('slug' => 'sicilia' ) );
	}
	if(term_exists( 'toscana', 'regionemappa' ) !== 0){
		wp_insert_term('Toscana','regionemappa',array('slug' => 'toscana' ) );
	}
	if(term_exists( 'toscana', 'regionemappa' ) !== 0){
		wp_insert_term('Toscana','regionemappa',array('slug' => 'toscana' ) );
	}
	if(term_exists( 'trentinoaltoadige', 'regionemappa' ) !== 0){
		wp_insert_term('Trentino-Alto Adige','regionemappa',array('slug' => 'trentinoaltoadige' ) );
	}
	if(term_exists( 'umbria', 'regionemappa' ) !== 0){
		wp_insert_term('Umbria','regionemappa',array('slug' => 'umbria' ) );
	}
	if(term_exists( 'valledaosta', 'regionemappa' ) !== 0){
		wp_insert_term('Valle d\'Aosta','regionemappa',array('slug' => 'valledaosta' ) );
	}
	if(term_exists( 'veneto', 'regionemappa' ) !== 0){
		wp_insert_term('Veneto','regionemappa',array('slug' => 'veneto' ) );
	}

	/**
	 * Taxonomy: Tipologia.
	 */

	$labels = [
		"name" => __( "Tipologia", "icc" ),
		"singular_name" => __( "Tipologia", "icc" ),
		"menu_name" => __( "Tipologia", "icc" ),
	];

	$args = [
		"label" => __( "tipologia", "icc" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'tipologia', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "tipologia",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		'map_meta_cap' => true,
		"show_in_quick_edit" => true,
		];
		register_taxonomy( "tipologia", [ "mappa" ], $args );

	/**
	 * Taxonomy: Stato.
	 */

	$labels = [
		"name" => __( "Stato", "icc" ),
		"singular_name" => __( "Stato", "icc" ),
		"menu_name" => __( "Stato", "icc" ),
	];

	$args = [
		"label" => __( "Stato", "icc" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'stato', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "stato",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		'map_meta_cap' => true,
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "stato", [ "mappa" ], $args );

	if(term_exists( 'utente', 'stato' ) !== 0){
		wp_insert_term('Utente','stato',array('slug' => 'utente' ) );
	}
	if(term_exists( 'redazione', 'stato' ) !== 0){
		wp_insert_term('Redazione','stato',array('slug' => 'redazione' ) );
	}
	if(term_exists( 'chiuso', 'stato' ) !== 0){
		wp_insert_term('Chiuso','stato',array('slug' => 'chiuso' ) );
	}




?>
