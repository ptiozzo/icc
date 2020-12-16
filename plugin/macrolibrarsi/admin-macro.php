<h1>Test integrazione macrolibrarsi</h1>
<form method="post" action="<?php echo get_pagenum_link(); ?>">
  <input type="text" name="codice_prodotto" value="" placeholder="Codice prodotto">
  <input name="macrolibrarsi_test_button" type="Submit" value="Prova" class="button">
</form>


<?php

if($_POST["macrolibrarsi_test_button"]){
  echo "<p><b>Codice prodotto</b> ".$_POST['codice_prodotto']."</p>";
  echo "<code>[ICCMacroLibrarsi code='".$_POST['codice_prodotto']."']</code><br>";
  echo "<div style='border: 1px solid red;margin-top: 10px; display: inline-block;'>";
    MacroLibrarsiAPI($_POST['codice_prodotto']);
  echo "</div>";
}
?>
<br>


<hr>
<style media="screen">

  input{
    width: 140px;
  }

</style>
<h1>Gestione TAG</h1>

<?php $TagAttivi = get_option("ICC_MacroLibrarsi_Tag_Added") ? get_option("ICC_MacroLibrarsi_Tag_Added") : array(); ?>

<?php
  /* ---- Aggiungo nuova voce ai TAG ---- */
  if($_POST["MacroLibrarsi_Tag_List_Add"]){
    $TagAttivi = get_option("ICC_MacroLibrarsi_Tag_Added") ? get_option("ICC_MacroLibrarsi_Tag_Added") : array();
    $TagAttivi[] = array('tagName' => $_POST['MacroLibrarsi_Tag_List']);

    update_option('ICC_MacroLibrarsi_Tag_Added',$TagAttivi,'no');
  }

  /* ---- Salvo i valori dei TAG, se tutti e 3 i valori vuoti tolgo il TAG ---- */
  if($_POST['MacroLibrarsi_Tag_List_Save']){

    $TagAttivi = get_option("ICC_MacroLibrarsi_Tag_Added") ? get_option("ICC_MacroLibrarsi_Tag_Added") : array();

    foreach ($TagAttivi as $tag){

      if( !($_POST[$tag['tagName'].'1'] == "" && $_POST[$tag['tagName'].'2'] == "" && $_POST[$tag['tagName'].'3'] == "") ){

        $TagAttiviNew[] = array(
          'tagName' => $tag['tagName'],
          'tagName1' => $_POST[$tag['tagName'].'1'],
          'tagName1Link' => $_POST[$tag['tagName'].'1Link'],
          'tagName2' => $_POST[$tag['tagName'].'2'],
          'tagName2Link' => $_POST[$tag['tagName'].'2Link'],
          'tagName3' => $_POST[$tag['tagName'].'3'],
          'tagName3Link' => $_POST[$tag['tagName'].'3Link'],
        );

      }

    }
    update_option('ICC_MacroLibrarsi_Tag_Added',$TagAttiviNew,'no');

  }

?>

<?php $TagAttivi = get_option("ICC_MacroLibrarsi_Tag_Added") ? get_option("ICC_MacroLibrarsi_Tag_Added") : array();  ?>

<form class="" action="<?php echo get_pagenum_link(); ?>" method="post">
  <select class="" name="MacroLibrarsi_Tag_List">
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
  <input name="MacroLibrarsi_Tag_List_Add" type="Submit" value="Aggiungi" class="button">
</form>

<br><br>

<form class="" action="<?php echo get_pagenum_link(); ?>" method="post">
<?php

$TagAttivi = get_option("ICC_MacroLibrarsi_Tag_Added") ? get_option("ICC_MacroLibrarsi_Tag_Added") : array();


foreach ($TagAttivi as $tag) {
  echo '<input type="text" name="'.$tag['tagName'].'" value="'.$tag['tagName'].'" readonly>';
  echo '<input type="text" name="'.$tag['tagName'].'1" value="'.$tag['tagName1'].'" placeholder="valore1">';
  echo '<input type="text" name="'.$tag['tagName'].'1Link" value="'.$tag['tagName1Link'].'" placeholder="link1">';
  echo ' - <input type="text" name="'.$tag['tagName'].'2" value="'.$tag['tagName2'].'" placeholder="valore2">';
  echo '<input type="text" name="'.$tag['tagName'].'2Link" value="'.$tag['tagName2Link'].'" placeholder="link2">';
  echo ' - <input type="text" name="'.$tag['tagName'].'3" value="'.$tag['tagName3'].'" placeholder="valore3">';
  echo '<input type="text" name="'.$tag['tagName'].'3Link" value="'.$tag['tagName3Link'].'" placeholder="link3">';
  echo "<br>";
}
 ?>
 <br>
 <input name="MacroLibrarsi_Tag_List_Save" type="Submit" value="Salva" class="button">
</form>



<?php

//var_dump(get_option("ICC_MacroLibrarsi_Tag_Added"));

?>
