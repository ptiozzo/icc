<h1>Gestione TAG</h1>

<?php
/* ---- Rimuovi nuova voce ai TAG ---- */
if ($_POST['icc_tagCheCambia_attivi_Rimuovi']){
  $TagAttivi = get_option("icc_tagCheCambia_attivi") ? get_option("icc_tagCheCambia_attivi") : array();

  foreach ($TagAttivi as $tag){
    if($_POST['icc_tagCheCambia_attivi_Rimuovi'] != "Rimuovi ".$tag['tagName']){
      $TagAttiviNew[] = array('tagName' => $tag['tagName']);
    }
  }

  update_option('icc_tagCheCambia_attivi',$TagAttiviNew,'no');
}
?>

<!-- Aggiungo nuova voce ai TAG -->
<?php $TagAttivi = get_option("icc_tagCheCambia_attivi") ? get_option("icc_tagCheCambia_attivi") : array(); ?>
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
      foreach (get_tags() as $tag):
        $result = array_search( $tag->slug ,array_column($TagAttivi, 'tagName') );
        echo "--".$result."--";
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
  echo '<input type="submit" name="icc_tagCheCambia_attivi_Rimuovi" value="Rimuovi '.$tag['tagName'].'">';
  echo "<br>";
}

 ?>
 <br>
</form>
