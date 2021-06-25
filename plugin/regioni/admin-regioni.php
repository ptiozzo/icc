<h2>Regioni</h2>


<?php

if($_POST['submit']){

  $regioni = get_terms('postregione',array(
    'hide_empty' => false,));
  foreach ($regioni as $regione) {
    if($_POST[$regione->slug] == $regione->slug){
      $regioni_attive[] = $regione->slug;
    }
  }

  echo "Salvato!";

  update_option('icc_regioni_attive',$regioni_attive,'no');
}

 ?>

<?php
  $regioni_attive = get_option('icc_regioni_attive') ? get_option('icc_regioni_attive') : array();
?>
<form class="" action="<?php echo get_pagenum_link(); ?>" method="post">
  <?php
  $regioni = get_terms('postregione',array(
    'hide_empty' => false,
    'parent' => 0,));
  foreach ($regioni as $regione) {
    ?>

    <input type="checkbox" id="<?php echo $regione->slug; ?>" name="<?php echo $regione->slug; ?>" value="<?php echo $regione->slug; ?>" <?php if(in_array($regione->slug, $regioni_attive)){echo "checked";} ?>>
    <label for="<?php echo $regione->slug; ?>"> <?php echo $regione->name; ?></label><br>

    <?php
    $province = get_terms('postregione',array(
      'hide_empty' => false,
      'parent' => $regione->term_id,));
    foreach ($province as $provincia)  {
      ?>
      <input style="margin-left: 10px;" type="checkbox" id="<?php echo $provincia->slug; ?>" name="<?php echo $provincia->slug; ?>" value="<?php echo $provincia->slug; ?>" <?php if(in_array($provincia->slug, $regioni_attive)){echo "checked";} ?>>
      <label for="<?php echo $provincia->slug; ?>"> <?php echo $provincia->name; ?></label><br>
      <?php
    }
  }


  ?>



  <input name="submit" type="Submit" value="Salva" class="">

</form
