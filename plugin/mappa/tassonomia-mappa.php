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
	"rewrite" => [ 'slug' => 'mappacategoria', 'with_front' => true,  'hierarchical' => true, ],
	"show_admin_column" => true,
	"show_in_rest" => true,
	"rest_base" => "categoria",
	"rest_controller_class" => "WP_REST_Terms_Controller",
	'map_meta_cap' => true,
	"show_in_quick_edit" => true,
	];
register_taxonomy( "mappacategoria", [ "mappa" ], $args );

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
	"rewrite" => [ 'slug' => 'mapparete', 'with_front' => true,  'hierarchical' => true, ],
	"show_admin_column" => true,
	"show_in_rest" => true,
	"rest_base" => "rete",
	"rest_controller_class" => "WP_REST_Terms_Controller",
	'map_meta_cap' => true,
	"show_in_quick_edit" => true,
	];
	register_taxonomy( "mapparete", [ "mappa" ], $args );

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
		"rewrite" => [ 'slug' => 'mapparegione', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "mapparegione",
		"rest_controller_class" => "WP_REST_Terms_Controller",
    'map_meta_cap' => true,
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "mapparegione", [ "mappa" ], $args );

	if(term_exists( 'abruzzo', 'mapparegione' ) !== 0){
		wp_insert_term('Abruzzo','mapparegione',array('slug' => 'abruzzo' ) );
	}
	if(term_exists( 'basilicata', 'mapparegione' ) !== 0){
		wp_insert_term('Basilica','mapparegione',array('slug' => 'basilicata' ) );
	}
	if(term_exists( 'calabria', 'mapparegione' ) !== 0){
		wp_insert_term('Calabria','mapparegione',array('slug' => 'calabria' ) );
	}
	if(term_exists( 'campania', 'mapparegione' ) !== 0){
		wp_insert_term('Campania','mapparegione',array('slug' => 'campania' ) );
	}
	if(term_exists( 'emilia-romagna', 'mapparegione' ) !== 0){
		wp_insert_term('Emilia-Romagna','mapparegione',array('slug' => 'emilia-romagna' ) );
	}
	if(term_exists( 'friuliveneziagiulia', 'mapparegione' ) !== 0){
		wp_insert_term('Friuli Venezia Giulia','mapparegione',array('slug' => 'friuliveneziagiulia' ) );
	}
	if(term_exists( 'lazio', 'mapparegione' ) !== 0){
		wp_insert_term('Lazio','mapparegione',array('slug' => 'lazio' ) );
	}
	if(term_exists( 'liguria', 'mapparegione' ) !== 0){
		wp_insert_term('Liguria','mapparegione',array('slug' => 'liguria' ) );
	}
	if(term_exists( 'lombardia', 'mapparegione' ) !== 0){
		wp_insert_term('Lombardia','mapparegione',array('slug' => 'lombardia' ) );
	}
	if(term_exists( 'marche', 'mapparegione' ) !== 0){
		wp_insert_term('Marche','mapparegione',array('slug' => 'marche' ) );
	}
	if(term_exists( 'molise', 'mapparegione' ) !== 0){
		wp_insert_term('Molise','mapparegione',array('slug' => 'molise' ) );
	}
	if(term_exists( 'piemonte', 'mapparegione' ) !== 0){
		wp_insert_term('Piemonte','mapparegione',array('slug' => 'piemonte' ) );
	}
	if(term_exists( 'puglia', 'mapparegione' ) !== 0){
		wp_insert_term('Puglia','mapparegione',array('slug' => 'puglia' ) );
	}
	if(term_exists( 'sardegna', 'mapparegione' ) !== 0){
		wp_insert_term('Sardegna','mapparegione',array('slug' => 'sardegna' ) );
	}
	if(term_exists( 'sicilia', 'mapparegione' ) !== 0){
		wp_insert_term('Sicilia','mapparegione',array('slug' => 'sicilia' ) );
	}
	if(term_exists( 'toscana', 'mapparegione' ) !== 0){
		wp_insert_term('Toscana','mapparegione',array('slug' => 'toscana' ) );
	}
	if(term_exists( 'toscana', 'mapparegione' ) !== 0){
		wp_insert_term('Toscana','mapparegione',array('slug' => 'toscana' ) );
	}
	if(term_exists( 'trentinoaltoadige', 'mapparegione' ) !== 0){
		wp_insert_term('Trentino-Alto Adige','mapparegione',array('slug' => 'trentinoaltoadige' ) );
	}
	if(term_exists( 'umbria', 'mapparegione' ) !== 0){
		wp_insert_term('Umbria','mapparegione',array('slug' => 'umbria' ) );
	}
	if(term_exists( 'valledaosta', 'mapparegione' ) !== 0){
		wp_insert_term('Valle d\'Aosta','mapparegione',array('slug' => 'valledaosta' ) );
	}
	if(term_exists( 'veneto', 'mapparegione' ) !== 0){
		wp_insert_term('Veneto','mapparegione',array('slug' => 'veneto' ) );
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
		"rewrite" => [ 'slug' => 'mappatipologia', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "tipologia",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		'map_meta_cap' => true,
		"show_in_quick_edit" => true,
		];
		register_taxonomy( "mappatipologia", [ "mappa" ], $args );

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
		"rewrite" => [ 'slug' => 'mappastato', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "stato",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		'map_meta_cap' => true,
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "mappastato", [ "mappa" ], $args );

	if(term_exists( 'utente', 'mappastato' ) !== 0){
		wp_insert_term('Utente','mappastato',array('slug' => 'utente' ) );
	}
	if(term_exists( 'redazione', 'mappastato' ) !== 0){
		wp_insert_term('Redazione','mappastato',array('slug' => 'redazione' ) );
	}
	if(term_exists( 'chiuso', 'mappastato' ) !== 0){
		wp_insert_term('Chiuso','mappastato',array('slug' => 'chiuso' ) );
	}




?>
