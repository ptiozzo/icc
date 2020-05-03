<?php

	/**
	 * Post Type: Cerco/Offro.
	 */

	$labels = [
		"name" => __( "Cerco/Offro", "icc" ),
		"singular_name" => __( "Cerco/Offro", "icc" ),
		"menu_name" => __( "Cerco/Offro", "icc" ),
		"all_items" => __( "Cerco/Offro", "icc" ),
		"add_new" => __( "Aggiungi nuovo", "icc" ),
		"add_new_item" => __( "Aggiungi nuovo Cerco/Offro", "icc" ),
		"edit_item" => __( "Modifica Cerco/Offro", "icc" ),
		"new_item" => __( "Nuovo Cerco/Offro", "icc" ),
		"view_item" => __( "Visualizza Cerco/Offro", "icc" ),
		"view_items" => __( "Visualizza Cerco/Offro", "icc" ),
		"search_items" => __( "Cerca Cerco/Offro", "icc" ),
		"not_found" => __( "Nessun Cerco/Offro trovato", "icc" ),
		"not_found_in_trash" => __( "Nessun Cerco/Offro trovato nel cestino", "icc" ),
		"parent" => __( "Genitore Cerco/Offro:", "icc" ),
		"featured_image" => __( "Immagine in evidenza per Cerco/Offro", "icc" ),
		"set_featured_image" => __( "Imposta immagine in evidenza per Cerco/Offro", "icc" ),
		"remove_featured_image" => __( "Rimuovi immagine in evidenza​ per Cerco/Offro", "icc" ),
		"use_featured_image" => __( "Usa immagine in evidenza​ per Cerco/Offro", "icc" ),
		"archives" => __( "Archivo Cerco/Offro", "icc" ),
		"insert_into_item" => __( "Inserisci in Cerco/Offro", "icc" ),
		"uploaded_to_this_item" => __( "Caricato in questo Cerco/Offro", "icc" ),
		"filter_items_list" => __( "Filtra i Cerco/Offro", "icc" ),
		"items_list_navigation" => __( "Elenco voci di Cerco/Offro", "icc" ),
		"items_list" => __( "Lista Cerco/Offro", "icc" ),
		"attributes" => __( "Attributi Cerco/Offro", "icc" ),
		"name_admin_bar" => __( "Nuovo Cerco/Offro", "icc" ),
		"item_published" => __( "Cerco/Offro pubblicato", "icc" ),
		"item_published_privately" => __( "Cerco/Offro pubblicato privatamente", "icc" ),
		"item_reverted_to_draft" => __( "Cerco/Offro convertito in draft", "icc" ),
		"item_scheduled" => __( "Cerco/Offro programmato", "icc" ),
		"item_updated" => __( "Cerco/Offro aggiornato.", "icc" ),
		"parent_item_colon" => __( "Genitore Cerco/Offro:", "icc" ),
	];

	$args = [
		"label" => __( "Cerco/Offro", "icc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "cerco-offro",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "cerco-offro",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "cerco-offro", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-tagcloud",
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "comments", "author" ],
	];

	register_post_type( 'cerco-offro', $args );

  global $wp_rewrite;
    $wp_rewrite->flush_rules();

 ?>
