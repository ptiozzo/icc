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
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Latitudine" value="<?php echo get_post_meta($post->ID, 'Intervista_Di', true);?>">

  <label>Longitudine</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Mappa_Longitudine" value="<?php echo get_post_meta($post->ID, 'Video_Realizzato_Da', true);?>">


  <?php
}
?>
