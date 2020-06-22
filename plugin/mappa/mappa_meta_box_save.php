<?php


/* Salvo Latitudine e Longitudine Mappa
-----------------------------*/

add_action("save_post", "save_mappa_meta_box", 10, 2);
function save_mappa_meta_box($post_id, $post)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if((defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) || defined("DOING_AJAX") && DOING_AJAX)
        return $post_id;

    $slug = "mappa";
    if($slug != $post->post_type)
        return $post_id;

    if($_POST["Mappa_Latitudine"] != "") {
        update_post_meta($post_id, "Mappa_Latitudine", $_POST["Mappa_Latitudine"]);
    } elseif (get_post_meta($post_id,"Mappa_Latitudine")) {
        delete_post_meta($post_id,"Mappa_Latitudine");
    }

    if($_POST["Mappa_Longitudine"] != "") {
        update_post_meta($post_id, "Mappa_Longitudine", $_POST["Mappa_Longitudine"]);
    } elseif (get_post_meta($post_id,"Mappa_Longitudine")) {
        delete_post_meta($post_id,"Mappa_Longitudine");
    }

    mappa_calcolo_realta();

}

?>
