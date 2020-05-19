<?php
function ICC_register_my_taxes() {

	/**
	 * Taxonomy: ICC altri filtri .
	 */

	$labels = [
		"name" => __( "ICC altri filtri ", "icc" ),
		"singular_name" => __( "ICC altro filtro", "icc" ),
	];

	$args = [
		"label" => __( "ICC altri filtri ", "icc" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'icc_altri_filtri', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "icc_altri_filtri",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		];
	register_taxonomy( "icc_altri_filtri", [ "post", "rassegna-stampa" ], $args );

	/**
	 * Taxonomy: Contenuti speciali filtri.
	 */

	$labels = [
		"name" => __( "Contenuti speciali filtri", "icc" ),
		"singular_name" => __( "Contenuto speciale filtro", "icc" ),
	];

	$args = [
		"label" => __( "Contenuti speciali filtri", "icc" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'contenuti_speciali_filtri', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "contenuti_speciali_filtri",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( "contenuti_speciali_filtri", [ "contenuti-speciali" ], $args );
}
add_action( 'init', 'ICC_register_my_taxes' );
 ?>
