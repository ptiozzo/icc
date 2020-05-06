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
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "regione", [ "cerco-offro" ], $args );


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
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "tematica", [ "cerco-offro" ], $args );


?>
