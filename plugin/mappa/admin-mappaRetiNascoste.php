<h1>Mappa Reti Nascoste</h1>

<?php
/* ---- Rimuovi nuova voce ai Rete ---- */
if ($_POST['icc_RetiNascoste_attivi_Rimuovi']){
  $RetiNascoste = get_option("icc_RetiNascoste_attivi") ? get_option("icc_RetiNascoste_attivi") : array();

  foreach ($RetiNascoste as $Rete){
    if($_POST['icc_RetiNascoste_attivi_Rimuovi'] != "Rimuovi ".$Rete['ReteSlug']){
      $RetiNascosteNew[] = array('ReteSlug' => $Rete['ReteSlug']);
    }else{
      wp_delete_term( get_term_by('slug', $Rete['ReteSlug'].'sticky','icc_altri_filtri')->term_id." sticky",'icc_altri_filtri' );
      echo "<h3>Rimosso ".$Rete['ReteSlug']."</h3><br>";
    }
  }

  update_option('icc_RetiNascoste_attivi',$RetiNascosteNew,'no');
}
?>

<!-- Aggiungo nuova voce ai Rete -->
<?php $RetiNascoste = get_option("icc_RetiNascoste_attivi") ? get_option("icc_RetiNascoste_attivi") : array(); ?>
<?php
  if($_POST["icc_RetiNascoste_Add"]){

    $RetiNascoste = get_option("icc_RetiNascoste_attivi") ? get_option("icc_RetiNascoste_attivi") : array();
    $RetiNascoste[] = array('ReteSlug' => $_POST['icc_RetiNascoste_attivi']);

    update_option('icc_RetiNascoste_attivi',$RetiNascoste,'no');
  }

?>

<!-- FORM per aggiunta nuova voce ai Rete -->
<?php $RetiNascoste = get_option("icc_RetiNascoste_attivi") ? get_option("icc_RetiNascoste_attivi") : array();  ?>
<form class="" action="<?php echo get_pagenum_link(); ?>" method="post">
  <select class="" name="icc_RetiNascoste_attivi">
    <?php
      foreach (get_terms( array('taxonomy' => 'mapparete')) as $Rete):
        $result = array_search( $Rete->slug ,array_column($RetiNascoste, 'ReteSlug') );

        if( $result === false ) {
          ?>
          <option value="<?php echo $Rete->slug; ?>"><?php echo $Rete->name; ?></option>
          <?php
        }
    ?>
    <?php endforeach; ?>
  </select>
  <input name="icc_RetiNascoste_Add" type="Submit" value="Aggiungi" class="button">
</form>

<br><br>

<!-- Form di riepilogo/rimozione -->
<form class="" action="<?php echo get_pagenum_link(); ?>" method="post">
<?php

$RetiNascoste = get_option("icc_RetiNascoste_attivi") ? get_option("icc_RetiNascoste_attivi") : array();
foreach ($RetiNascoste as $Rete) {
  echo '<input type="text" name="'.$Rete['ReteSlug'].'" value="'.$Rete['ReteSlug'].'" readonly>';
  echo '<input type="submit" name="icc_RetiNascoste_attivi_Rimuovi" value="Rimuovi '.$Rete['ReteSlug'].'" class="button">';
  echo "<br>";
}
 ?>
 <br>
</form>
