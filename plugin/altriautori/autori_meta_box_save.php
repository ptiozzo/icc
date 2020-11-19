<?php


/* Salvo altri autori
-----------------------------*/

add_action("save_post", "save_autori_meta_box", 10, 2);

function save_autori_meta_box($post_id, $post)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    if($_POST["Secondo_Autore"] != "") {
        update_post_meta($post_id, "Secondo_Autore", $_POST["Secondo_Autore"]);
    } elseif (get_post_meta($post_id,"Secondo_Autore")) {
        delete_post_meta($post_id,"Secondo_Autore");
    }

    if($_POST["Intervista_Di"] != "") {
        update_post_meta($post_id, "Intervista_Di", $_POST["Intervista_Di"]);
    } elseif (get_post_meta($post_id,"Intervista_Di")) {
        delete_post_meta($post_id,"Intervista_Di");
    }

    if($_POST["Video_Realizzato_Da"] != "") {
        update_post_meta($post_id, "Video_Realizzato_Da", $_POST["Video_Realizzato_Da"]);
    } elseif (get_post_meta($post_id,"Video_Realizzato_Da")) {
        delete_post_meta($post_id,"Video_Realizzato_Da");
    }

    if($_POST["Riprese_Di"] != "") {
        update_post_meta($post_id, "Riprese_Di", $_POST["Riprese_Di"]);
    } elseif (get_post_meta($post_id,"Riprese_Di")) {
        delete_post_meta($post_id,"Riprese_Di");
    }

    if($_POST["Montaggio_Di"] != "") {
        update_post_meta($post_id, "Montaggio_Di", $_POST["Montaggio_Di"]);
    } elseif (get_post_meta($post_id,"Montaggio_Di")) {
        delete_post_meta($post_id,"Montaggio_Di");
    }

    if($_POST["Illustrazioni_Di"] != "") {
        update_post_meta($post_id, "Illustrazioni_Di", $_POST["Illustrazioni_Di"]);
    } elseif (get_post_meta($post_id,"Illustrazioni_Di")) {
        delete_post_meta($post_id,"Illustrazioni_Di");
    }

    if($_POST["Regia_Di"] != "") {
        update_post_meta($post_id, "Regia_Di", $_POST["Regia_Di"]);
    } elseif (get_post_meta($post_id,"Regia_Di")) {
        delete_post_meta($post_id,"Regia_Di");
    }

    if($_POST["Audio"] != "") {
        update_post_meta($post_id, "Audio", $_POST["Audio"]);
    } elseif (get_post_meta($post_id,"Audio")) {
        delete_post_meta($post_id,"Audio");
    }

    if($_POST["Campo_Libero_Desc"] != "") {
        update_post_meta($post_id, "Campo_Libero_Desc", $_POST["Campo_Libero_Desc"]);
    } elseif (get_post_meta($post_id,"Campo_Libero_Desc")) {
        delete_post_meta($post_id,"Campo_Libero_Desc");
    }
    if($_POST["Campo_Libero_Dato"] != "") {
        update_post_meta($post_id, "Campo_Libero_Dato", $_POST["Campo_Libero_Dato"]);
    } elseif (get_post_meta($post_id,"Campo_Libero_Dato")) {
        delete_post_meta($post_id,"Campo_Libero_Dato");
    }

}

?>
