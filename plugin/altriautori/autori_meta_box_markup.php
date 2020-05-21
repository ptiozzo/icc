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
  <select class="" name="Intervista_Di" style="width:80%; margin-bottom: 10px;">
    <option value="" <?php if ($Intervista_Di == '') {echo 'selected';}?> >Seleziona intervista di</option>
    <?php
    $args = array(
              'orderby' => 'display_name',
              'order'=>'ASC',
              'has_published_posts'=> false,
    );
    $allUsers = get_users($args);
    foreach($allUsers as $user){
      $option = '<option value="'.$user->ID.'" ';
      if ($Intervista_Di == $user->ID) {$option .= 'selected ';};
      $option .= '>'.$user->display_name;
      $option .= '</option>';
      echo $option;
    }
     ?>
  </select>

  <label>Video Realizzato Da</label>
  <select class="" name="Video_Realizzato_Da" style="width:80%; margin-bottom: 10px;">
    <option value="" <?php if ($Video_Realizzato_Da == '') {echo 'selected';}?> >Seleziona video realizzato da</option>
    <?php
    $args = array(
              'orderby' => 'display_name',
              'order'=>'ASC',
              'has_published_posts'=> false,
    );
    $allUsers = get_users($args);
    foreach($allUsers as $user){
      $option = '<option value="'.$user->ID.'" ';
      if ($Video_Realizzato_Da == $user->ID) {$option .= 'selected ';};
      $option .= '>'.$user->display_name;
      $option .= '</option>';
      echo $option;
    }
     ?>
  </select>

  <label>Riprese di</label>
  <select class="" name="Riprese_Di" style="width:80%; margin-bottom: 10px;">
    <option value="" <?php if ($Riprese_Di == '') {echo 'selected';}?> >Seleziona riprese di</option>
    <?php
    $args = array(
              'orderby' => 'display_name',
              'order'=>'ASC',
              'has_published_posts'=> false,
    );
    $allUsers = get_users($args);
    foreach($allUsers as $user){
      $option = '<option value="'.$user->ID.'" ';
      if ($Riprese_Di == $user->ID) {$option .= 'selected ';};
      $option .= '>'.$user->display_name;
      $option .= '</option>';
      echo $option;
    }
     ?>
  </select>

  <label>Montaggio di</label>
  <select class="" name="Montaggio_Di" style="width:80%; margin-bottom: 10px;">
    <option value="" <?php if ($Montaggio_Di == '') {echo 'selected';}?> >Seleziona montaggio di</option>
    <?php
    $args = array(
              'orderby' => 'display_name',
              'order'=>'ASC',
              'has_published_posts'=> false,
    );
    $allUsers = get_users($args);
    foreach($allUsers as $user){
      $option = '<option value="'.$user->ID.'" ';
      if ($Montaggio_Di == $user->ID) {$option .= 'selected ';};
      $option .= '>'.$user->display_name;
      $option .= '</option>';
      echo $option;
    }
     ?>
  </select>

  <label>Illustrazioni di</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Illustrazioni_Di" value="<?php echo get_post_meta($post->ID, 'Illustrazioni_Di', true);?>">
  <br>
  <label>Regia di</label>
  <input style="width:90%; margin-bottom: 10px;" type="text" name="Regia_Di" value="<?php echo get_post_meta($post->ID, 'Regia_Di', true);?>">

  <?php
}
?>
