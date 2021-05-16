<h1>Gestione TAG</h1>

<?php
/* ---- Rimuovi nuova voce ai TAG ---- */
if ($_POST['icc_tagCheCambia_attivi_Rimuovi']){
  $TagAttivi = get_option("icc_tagCheCambia_attivi") ? get_option("icc_tagCheCambia_attivi") : array();

  foreach ($TagAttivi as $tag){
    if($_POST['icc_tagCheCambia_attivi_Rimuovi'] != "Rimuovi ".$tag['tagName']){
      $TagAttiviNew[] = array('tagName' => $tag['tagName']);
    }else{
      wp_delete_term( get_term_by('slug', $tag['tagName'].'sticky','icc_altri_filtri')->term_id." sticky",'icc_altri_filtri' );
      echo "<h3>Rimosso ".$tag['tagName']."</h3><br>";
    }
  }

  update_option('icc_tagCheCambia_attivi',$TagAttiviNew,'no');
}
?>

<!-- Aggiungo nuova voce ai TAG -->
<?php
  if($_POST["icc_tagCheCambia_Add"]){

    $TagAttivi = get_option("icc_tagCheCambia_attivi") ? get_option("icc_tagCheCambia_attivi") : array();
    $TagAttivi[] = array('tagName' => $_POST['icc_tagCheCambia_attivi']);

    update_option('icc_tagCheCambia_attivi',$TagAttivi,'no');
  }

?>

<!-- FORM per aggiunta nuova voce ai TAG -->
<?php $TagAttivi = get_option("icc_tagCheCambia_attivi") ? get_option("icc_tagCheCambia_attivi") : array();  ?>
<form class="" action="<?php echo get_pagenum_link(); ?>" method="post">
  <select class="" name="icc_tagCheCambia_attivi">
    <?php
        $args = array(
          'taxonomy' => 'post_tag',
          'orderby' => 'name',
          'hide_empty' => false
        );
      foreach (get_tags($args) as $tag):
        $result = array_search( $tag->slug ,array_column($TagAttivi, 'tagName') );
        if( $result === false ) {
          ?>
          <option value="<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></option>
          <?php
        }
    ?>
    <?php endforeach; ?>
  </select>
  <input name="icc_tagCheCambia_Add" type="Submit" value="Aggiungi" class="button">
</form>

<br><br>

<!-- Form di riepilogo/rimozione -->
<form class="" action="<?php echo get_pagenum_link(); ?>" method="post">
<?php

$TagAttivi = get_option("icc_tagCheCambia_attivi") ? get_option("icc_tagCheCambia_attivi") : array();
foreach ($TagAttivi as $tag) {
  echo '<input type="text" name="'.$tag['tagName'].'" value="'.$tag['tagName'].'" readonly>';
  echo '<input type="submit" name="icc_tagCheCambia_attivi_Rimuovi" value="Rimuovi '.$tag['tagName'].'" class="button">';
  echo "<br>";
}

 ?>
 <br>
</form>
