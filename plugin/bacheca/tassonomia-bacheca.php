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



?>
