<?php

	/**
	 * Post Type: Mappa.
	 */

	$labels = [
		"name" => __( "Mappa", "icc" ),
		"singular_name" => __( "Mappa", "icc" ),
		"menu_name" => __( "Mappa", "icc" ),
		"all_items" => __( "Mappa", "icc" ),
		"add_new" => __( "Aggiungi nuovo", "icc" ),
		"add_new_item" => __( "Aggiungi nuovo Mappa", "icc" ),
		"edit_item" => __( "Modifica Mappa", "icc" ),
		"new_item" => __( "Nuovo Mappa", "icc" ),
		"view_item" => __( "Visualizza Mappa", "icc" ),
		"view_items" => __( "Visualizza Mappa", "icc" ),
		"search_items" => __( "Cerca Mappa", "icc" ),
		"not_found" => __( "Nessun Mappa trovato", "icc" ),
		"not_found_in_trash" => __( "Nessun Mappa trovato nel cestino", "icc" ),
		"parent" => __( "Genitore Mappa:", "icc" ),
		"featured_image" => __( "Immagine in evidenza per Mappa", "icc" ),
		"set_featured_image" => __( "Imposta immagine in evidenza per Mappa", "icc" ),
		"remove_featured_image" => __( "Rimuovi immagine in evidenza​ per Mappa", "icc" ),
		"use_featured_image" => __( "Usa immagine in evidenza​ per Mappa", "icc" ),
		"archives" => __( "Archivo Mappa", "icc" ),
		"insert_into_item" => __( "Inserisci in Mappa", "icc" ),
		"uploaded_to_this_item" => __( "Caricato in questo Mappa", "icc" ),
		"filter_items_list" => __( "Filtra i Mappa", "icc" ),
		"items_list_navigation" => __( "Elenco voci di Mappa", "icc" ),
		"items_list" => __( "Lista Mappa", "icc" ),
		"attributes" => __( "Attributi Mappa", "icc" ),
		"name_admin_bar" => __( "Nuovo Mappa", "icc" ),
		"item_published" => __( "Mappa pubblicato", "icc" ),
		"item_published_privately" => __( "Mappa pubblicato privatamente", "icc" ),
		"item_reverted_to_draft" => __( "Mappa convertito in draft", "icc" ),
		"item_scheduled" => __( "Mappa programmato", "icc" ),
		"item_updated" => __( "Mappa aggiornato.", "icc" ),
		"parent_item_colon" => __( "Genitore Mappa:", "icc" ),
	];

	$args = [
		"label" => __( "Mappa", "icc" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "mappa",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "mappa",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "mappa2", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-tagcloud",
		"supports" => [ "title", "editor", "excerpt","thumbnail", "author" ],
	];

	register_post_type( 'mappa', $args );

  global $wp_rewrite;
    $wp_rewrite->flush_rules();


		// Add the roles you'd like to administer the custom post types
		$roles = array('editor','administrator');

		// Loop through each role and assign capabilities
		foreach($roles as $the_role) {

		     $role = get_role($the_role);

	             $role->add_cap( 'read' );
	             $role->add_cap( 'read_mappass');
	             $role->add_cap( 'read_private_mappas' );

	             $role->add_cap( 'edit_mappas' );
	             $role->add_cap( 'edit_others_mappas' );
               $role->add_cap( 'edit_private_mappas' );
	             $role->add_cap( 'edit_published_mappas' );

	             $role->add_cap( 'publish_mappas' );

               $role->add_cap( 'assign_tematica' );
               $role->add_cap( 'assign_regione' );
               $role->add_cap( 'assign_cercooffro' );

               $role->add_cap( 'delete_mappas' );
	             $role->add_cap( 'delete_others_mappas' );
	             $role->add_cap( 'delete_private_mappas' );
	             $role->add_cap( 'delete_published_mappas' );

		}

    // Add the roles you'd like to use the custom post types
		$roles = array('icc_user');

		// Loop through each role and assign capabilities
		foreach($roles as $the_role) {

		     $role = get_role($the_role);


              $role->add_cap( 'delete_mappas' );
              $role->add_cap( 'delete_private_mappas' );
              $role->add_cap( 'delete_published_mappas' );

              $role->add_cap( 'edit_mappas' );
              $role->add_cap( 'edit_private_mappas' );
              $role->add_cap( 'edit_published_mappas' );

              $role->add_cap( 'read_mappas');
              $role->add_cap( 'read_private_mappas' );

              $role->add_cap( 'assign_tematica');
              $role->add_cap( 'assign_regione');
              $role->add_cap( 'assign_cercooffro' );


              $role->add_cap( 'upload_files' );

		}

 ?>
