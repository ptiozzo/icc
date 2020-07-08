<?php

	/**
	 * Taxonomy: Regioni.
	 */

	$labels = [
		"name" => __( "Regioni", "icc" ),
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
		"rewrite" => [ 'slug' => 'regione', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "regione",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		'capabilities' => array(
        'assign_terms' => 'assign_regione',
    ),
    'map_meta_cap' => true,
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "regione", [ "cerco-offro" ], $args );

	if(term_exists( 'aanazionale', 'regione' ) !== 0){
		wp_insert_term('Nazionale','regione',array('slug' => 'aanazionale' ) );
	}
	if(term_exists( '_tutteleregioni', 'regione' ) !== 0){
		wp_insert_term('Tutte le regioni','regione',array('slug' => '_tutteleregioni' ) );
	}

	if(term_exists( 'abruzzo', 'regione' ) !== 0){
		wp_insert_term('Abruzzo','regione',array('slug' => 'abruzzo' ) );
	}
	if(term_exists( 'basilicata', 'regione' ) !== 0){
		wp_insert_term('Basilicata','regione',array('slug' => 'basilicata' ) );
	}
	if(term_exists( 'calabria', 'regione' ) !== 0){
		wp_insert_term('Calabria','regione',array('slug' => 'calabria' ) );
	}
	if(term_exists( 'campania', 'regione' ) !== 0){
		wp_insert_term('Campania','regione',array('slug' => 'campania' ) );
	}
	if(term_exists( 'emiliaromagna', 'regione' ) !== 0){
		wp_insert_term('Emilia Romagna','regione',array('slug' => 'emiliaromagna' ) );
	}
	if(term_exists( 'friuliveneziagiulia', 'regione' ) !== 0){
		wp_insert_term('Friuli Venezia Giulia','regione',array('slug' => 'friuliveneziagiulia' ) );
	}
	if(term_exists( 'lazio', 'regione' ) !== 0){
		wp_insert_term('Lazio','regione',array('slug' => 'lazio' ) );
	}
	if(term_exists( 'liguria', 'regione' ) !== 0){
		wp_insert_term('Liguria','regione',array('slug' => 'liguria' ) );
	}
	if(term_exists( 'lombardia', 'regione' ) !== 0){
		wp_insert_term('Lombardia','regione',array('slug' => 'lombardia' ) );
	}
	if(term_exists( 'marche', 'regione' ) !== 0){
		wp_insert_term('Marche','regione',array('slug' => 'marche' ) );
	}
	if(term_exists( 'molise', 'regione' ) !== 0){
		wp_insert_term('Molise','regione',array('slug' => 'molise' ) );
	}
	if(term_exists( 'piemonte', 'regione' ) !== 0){
		wp_insert_term('Piemonte','regione',array('slug' => 'piemonte' ) );
	}
	if(term_exists( 'puglia', 'regione' ) !== 0){
		wp_insert_term('Puglia','regione',array('slug' => 'puglia' ) );
	}
	if(term_exists( 'sardegna', 'regione' ) !== 0){
		wp_insert_term('Sardegna','regione',array('slug' => 'sardegna' ) );
	}
	if(term_exists( 'sicilia', 'regione' ) !== 0){
		wp_insert_term('Sicilia','regione',array('slug' => 'sicilia' ) );
	}
	if(term_exists( 'toscana', 'regione' ) !== 0){
		wp_insert_term('Toscana','regione',array('slug' => 'toscana' ) );
	}
	if(term_exists( 'toscana', 'regione' ) !== 0){
		wp_insert_term('Toscana','regione',array('slug' => 'toscana' ) );
	}
	if(term_exists( 'trentinoaltoadige', 'regione' ) !== 0){
		wp_insert_term('Trentino-Alto Adige','regione',array('slug' => 'trentinoaltoadige' ) );
	}
	if(term_exists( 'umbria', 'regione' ) !== 0){
		wp_insert_term('Umbria','regione',array('slug' => 'umbria' ) );
	}
	if(term_exists( 'valledaosta', 'regione' ) !== 0){
		wp_insert_term('Valle d\'Aosta','regione',array('slug' => 'valledaosta' ) );
	}
	if(term_exists( 'veneto', 'regione' ) !== 0){
		wp_insert_term('Veneto','regione',array('slug' => 'veneto' ) );
	}

	/**
	 * Taxonomy: Tematica.
	 */

	$labels = [
		"name" => __( "Tematica", "icc" ),
		"singular_name" => __( "Tematica", "icc" ),
		"menu_name" => __( "Tematica", "icc" ),
	];

	$args = [
		"label" => __( "Tematica", "icc" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'tematica', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "tematica",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		'capabilities' => array(
        'assign_terms' => 'assign_tematica',
    ),
    'map_meta_cap' => true,
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "tematica", [ "cerco-offro" ], $args );

	/**
	 * Taxonomy: cercooffro.
	 */

	$labels = [
		"name" => __( "Cerco/Offro", "icc" ),
		"singular_name" => __( "Cerco/Offro", "icc" ),
		"menu_name" => __( "Cerco/Offro", "icc" ),
	];

	$args = [
		"label" => __( "Cerco/Offro", "icc" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'cercooffor', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "cercooffro",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		'capabilities' => array(
				'assign_terms' => 'assign_cercooffro',
		),
		'map_meta_cap' => true,
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "cercooffro", [ "cerco-offro" ], $args );

	if(term_exists( 'cerco', 'cercooffro' ) !== 0){
		wp_insert_term('Cerco','cercooffro',array('slug' => 'cerco' ) );
	}
	if(term_exists( 'offro', 'cercooffro' ) !== 0){
		wp_insert_term('Offro','cercooffro',array('slug' => 'offro' ) );
	}
	if(term_exists( 'risolto', 'cercooffro' ) !== 0){
		wp_insert_term('Risolto','cercooffro',array('slug' => 'risolto' ) );
	}




?>
