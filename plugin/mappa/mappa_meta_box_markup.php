<?php

add_action("add_meta_boxes", "add_mappa_meta_box");

function add_mappa_meta_box()
{
    add_meta_box("mappa-meta-box", "Info mappa", "mappa_meta_box_markup", "mappa", "side");
}

function mappa_meta_box_markup($post)
{
  $mappa_latitudine = get_post_meta($post->ID, "Mappa_Latitudine", true);
  $mappa_longitudine = get_post_meta($post->ID, "Mappa_Longitudine", true);
  ?>

  <label>Latitudine</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Latitudine" value="<?php echo get_post_meta($post->ID, 'Mappa_Latitudine', true);?>">
  <label>Longitudine</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Longitudine" value="<?php echo get_post_meta($post->ID, 'Mappa_Longitudine', true);?>">

  <label>Video di presentazione</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_VideoYT" value="<?php echo get_post_meta($post->ID, 'Mappa_VideoYT', true);?>">

  <label>Indirizzo Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Indirizzo" value="<?php echo get_post_meta($post->ID, 'Mappa_Indirizzo', true);?>">
  <label>Sito Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Sito" value="<?php echo get_post_meta($post->ID, 'Mappa_Sito', true);?>">
  <label>Email Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Email" value="<?php echo get_post_meta($post->ID, 'Mappa_Email', true);?>">
  <label>Telefono Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Telefono" value="<?php echo get_post_meta($post->ID, 'Mappa_Telefono', true);?>">

  <label>Facebook Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_FB" value="<?php echo get_post_meta($post->ID, 'Mappa_FB', true);?>">
  <label>Instagram Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_IG" value="<?php echo get_post_meta($post->ID, 'Mappa_IG', true);?>">
  <label>Youtube Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_YT" value="<?php echo get_post_meta($post->ID, 'Mappa_YT', true);?>">
  <label>LinkedIn Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_IN" value="<?php echo get_post_meta($post->ID, 'Mappa_IN', true);?>">
  <label>Twitter Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_TW" value="<?php echo get_post_meta($post->ID, 'Mappa_TW', true);?>">

  <label>Data Chiusura Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Chiuso_Data" value="<?php echo get_post_meta($post->ID, 'Mappa_Chiuso_Data', true);?>">
  <label>Motivazione Chiusura Realtà</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Chiuso_Motivazione" value="<?php echo get_post_meta($post->ID, 'Mappa_Chiuso_Motivazione', true);?>">
  <?php
}


add_action("add_meta_boxes", "add_mappa_post_meta_box");

function add_mappa_post_meta_box()
{
    add_meta_box("mappa_post-meta-box", "Info per mappa", "mappa_post_meta_box_markup", "post", "side");
}

function mappa_post_meta_box_markup($post)
{
  ?>
  <label>Nome realtà di cui si parla</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Nome_Ralta" value="<?php echo get_post_meta($post->ID, 'Mappa_Nome_Ralta', true);?>">
  <?php
}
?>
