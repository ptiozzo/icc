<?php



 add_role('icc_user',
            'Utente di ItaliaCheCambia',
            array(
                'read' => true,
                'edit_posts' => false,
                'delete_posts' => false,
                'publish_posts' => false,
                'upload_files' => true,
            )
        );


    // Add the roles you'd like to administer the custom post types
		$roles = array('editor','administrator');

		// Loop through each role and assign capabilities
		foreach($roles as $the_role) {

		     $role = get_role($the_role);

	             $role->add_cap( 'read' );
	             $role->add_cap( 'read_cerco-offross');
	             $role->add_cap( 'read_private_cerco-offros' );

	             $role->add_cap( 'edit_cerco-offros' );
	             $role->add_cap( 'edit_others_cerco-offros' );
               $role->add_cap( 'edit_private_cerco-offros' );
	             $role->add_cap( 'edit_published_cerco-offros' );

	             $role->add_cap( 'publish_cerco-offros' );
               
               $role->add_cap( 'delete_cerco-offros' );
	             $role->add_cap( 'delete_others_cerco-offros' );
	             $role->add_cap( 'delete_private_cerco-offros' );
	             $role->add_cap( 'delete_published_cerco-offros' );

		}

    // Add the roles you'd like to use the custom post types
		$roles = array('icc_user');

		// Loop through each role and assign capabilities
		foreach($roles as $the_role) {

		     $role = get_role($the_role);


              $role->add_cap( 'delete_cerco-offros' );
              $role->add_cap( 'delete_private_cerco-offros' );
              $role->add_cap( 'delete_published_cerco-offros' );

              $role->add_cap( 'edit_cerco-offros' );
              $role->add_cap( 'edit_private_cerco-offros' );
              $role->add_cap( 'edit_published_cerco-offros' );

              $role->add_cap( 'publish_cerco-offros' );

              $role->add_cap( 'read_cerco-offros');
              $role->add_cap( 'read_private_cerco-offros' );

              $role->add_cap( 'upload_files' );

		}


?>
