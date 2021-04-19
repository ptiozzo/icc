<?php

add_action("add_meta_boxes", "add_autori_meta_box");

function add_autori_meta_box()
{
    add_meta_box("autori-meta-box", "Altri autori", "autori_meta_box_markup", "post", "side");
}

function autori_meta_box_markup($post)
{
  $Secondo_Autore = get_post_meta($post->ID, "Secondo_Autore", true);
  $Intervista_Di = get_post_meta($post->ID, "Intervista_Di", true);
  $Video_Realizzato_Da = get_post_meta($post->ID, "Video_Realizzato_Da", true);
  $Riprese_Di = get_post_meta($post->ID, "Riprese_Di", true);
  $Montaggio_Di = get_post_meta($post->ID, "Montaggio_Di", true);

  ?>
  <label>Secondo Autore</label>
  <select class="" name="Secondo_Autore" style="width:80%; margin-bottom: 10px;">
    <option value="" <?php if ($Secondo_Autore == '') {echo 'selected';}?> >Seleziona il secondo autore</option>
    <?php
    $args = array(
              'orderby' => 'display_name',
              'order'=>'ASC',
              'has_published_posts'=> false,
    );
    $allUsers = get_users($args);
    foreach($allUsers as $user){
      $option = '<option value="'.$user->ID.'" ';
      if ($Secondo_Autore == $user->ID) {$option .= 'selected ';};
      $option .= '>'.$user->display_name;
      $option .= '</option>';
      echo $option;
    }
     ?>
  </select>

  <label>Intervista Di</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Intervista_Di" value="<?php echo get_post_meta($post->ID, 'Intervista_Di', true);?>">

  <label>Video Realizzato Da</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Video_Realizzato_Da" value="<?php echo get_post_meta($post->ID, 'Video_Realizzato_Da', true);?>">

  <label>Riprese di</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Riprese_Di" value="<?php echo get_post_meta($post->ID, 'Riprese_Di', true);?>">

  <label>Montaggio di</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Montaggio_Di" value="<?php echo get_post_meta($post->ID, 'Montaggio_Di', true);?>">

  <label>Illustrazioni di</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Illustrazioni_Di" value="<?php echo get_post_meta($post->ID, 'Illustrazioni_Di', true);?>">

  <label>Regia di</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Regia_Di" value="<?php echo get_post_meta($post->ID, 'Regia_Di', true);?>">

  <label>Audio</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Audio" value="<?php echo get_post_meta($post->ID, 'Audio', true);?>">

  <label>Campo libero descrizione</label>
  <input style="width:90%; margin-bottom: 1px;" type="text" name="Campo_Libero_Desc" value="<?php echo get_post_meta($post->ID, 'Campo_Libero_Desc', true);?>">
  <label>Campo libero dato</label>
  <input style="width:90%; margin-bottom: 1px;" type="text" name="Campo_Libero_Dato" value="<?php echo get_post_meta($post->ID, 'Campo_Libero_Dato', true);?>">

  <?php
}
?>
