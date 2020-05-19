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


?>
