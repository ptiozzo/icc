<?php


/* Salvo metadata Mappa
-----------------------------*/

add_action("save_post", "save_mappa_meta_box", 10, 2);
function save_mappa_meta_box($post_id, $post)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if((defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) || (defined("DOING_AJAX") && DOING_AJAX))
        return $post_id;

    $slug = "mappa";
    if($slug == $post->post_type)
    {
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

      if($_POST["Mappa_VideoYT"] != "") {
          update_post_meta($post_id, "Mappa_VideoYT", $_POST["Mappa_VideoYT"]);
      } elseif (get_post_meta($post_id,"Mappa_VideoYT")) {
          delete_post_meta($post_id,"Mappa_VideoYT");
      }

      if($_POST["Mappa_Indirizzo"] != "") {
          update_post_meta($post_id, "Mappa_Indirizzo", $_POST["Mappa_Indirizzo"]);
      } elseif (get_post_meta($post_id,"Mappa_Indirizzo")) {
          delete_post_meta($post_id,"Mappa_Indirizzo");
      }

      if($_POST["Mappa_Sito"] != "") {
          update_post_meta($post_id, "Mappa_Sito", $_POST["Mappa_Sito"]);
      } elseif (get_post_meta($post_id,"Mappa_Sito")) {
          delete_post_meta($post_id,"Mappa_Sito");
      }

      if($_POST["Mappa_Email"] != "") {
          update_post_meta($post_id, "Mappa_Email", $_POST["Mappa_Email"]);
      } elseif (get_post_meta($post_id,"Mappa_Email")) {
          delete_post_meta($post_id,"Mappa_Email");
      }

      if($_POST["Mappa_Telefono"] != "") {
          update_post_meta($post_id, "Mappa_Telefono", $_POST["Mappa_Telefono"]);
      } elseif (get_post_meta($post_id,"Mappa_Telefono")) {
          delete_post_meta($post_id,"Mappa_Telefono");
      }

      if($_POST["Mappa_FB"] != "") {
          update_post_meta($post_id, "Mappa_FB", $_POST["Mappa_FB"]);
      } elseif (get_post_meta($post_id,"Mappa_FB")) {
          delete_post_meta($post_id,"Mappa_FB");
      }

      if($_POST["Mappa_IG"] != "") {
          update_post_meta($post_id, "Mappa_IG", $_POST["Mappa_IG"]);
      } elseif (get_post_meta($post_id,"Mappa_IG")) {
          delete_post_meta($post_id,"Mappa_IG");
      }

      if($_POST["Mappa_YT"] != "") {
          update_post_meta($post_id, "Mappa_YT", $_POST["Mappa_YT"]);
      } elseif (get_post_meta($post_id,"Mappa_YT")) {
          delete_post_meta($post_id,"Mappa_YT");
      }

      if($_POST["Mappa_IN"] != "") {
          update_post_meta($post_id, "Mappa_IN", $_POST["Mappa_IN"]);
      } elseif (get_post_meta($post_id,"Mappa_IN")) {
          delete_post_meta($post_id,"Mappa_IN");
      }

      if($_POST["Mappa_TW"] != "") {
          update_post_meta($post_id, "Mappa_TW", $_POST["Mappa_TW"]);
      } elseif (get_post_meta($post_id,"Mappa_TW")) {
          delete_post_meta($post_id,"Mappa_TW");
      }

      if($_POST["Mappa_Chiuso_Data"] != "") {
          update_post_meta($post_id, "Mappa_Chiuso_Data", $_POST["Mappa_Chiuso_Data"]);
      } elseif (get_post_meta($post_id,"Mappa_Chiuso_Data")) {
          delete_post_meta($post_id,"Mappa_Chiuso_Data");
      }
      if($_POST["Mappa_Chiuso_Motivazione"] != "") {
          update_post_meta($post_id, "Mappa_Chiuso_Motivazione", $_POST["Mappa_Chiuso_Motivazione"]);
      } elseif (get_post_meta($post_id,"Mappa_Chiuso_Motivazione")) {
          delete_post_meta($post_id,"Mappa_Chiuso_Motivazione");
      }

      if($_POST["Mappa_legaleRappresentante"] != "") {
          update_post_meta($post_id, "Mappa_legaleRappresentante", $_POST["Mappa_legaleRappresentante"]);
      } elseif (get_post_meta($post_id,"Mappa_legaleRappresentante")) {
          delete_post_meta($post_id,"Mappa_legaleRappresentante");
      }

      if($_POST["Mappa_privacy"] != "") {
          update_post_meta($post_id, "Mappa_privacy", $_POST["Mappa_privacy"]);
      } elseif (get_post_meta($post_id,"Mappa_privacy")) {
          delete_post_meta($post_id,"Mappa_privacy");
      }


      mappa_calcolo_realta();
    }

    elseif("post" == $post->post_type){
      if($_POST["Mappa_Nome_Ralta"] != "") {
        update_post_meta($post_id, "Mappa_Nome_Ralta", $_POST["Mappa_Nome_Ralta"]);
      } elseif (get_post_meta($post_id,"Mappa_Nome_Ralta")) {
        delete_post_meta($post_id,"Mappa_Nome_Ralta");
      }
      if($_POST["MappaProgetto"] != "") {
        update_post_meta($post_id, "MappaProgetto", $_POST["MappaProgetto"]);
      } elseif (get_post_meta($post_id,"MappaProgetto")) {
        delete_post_meta($post_id,"MappaProgetto");
      }
    }

    else{
      return $post_id;
    }



}

?>
