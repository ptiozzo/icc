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

      if( !($_POST[$tag['tagName'].'1'] == "" && $_POST[$tag['tagName'].'2'] == "" && $_POST[$tag['tagName'].'3'] == "") && $tag['tagName'] != 'default' ){

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

    /* Aggiungo i valori di default */
    $TagAttiviNew[] = array(
      'tagName' => 'default',
      'tagName1' => $_POST['default1'],
      'tagName1Link' => $_POST['default1Link'],
      'tagName2' => $_POST['default2'],
      'tagName2Link' => $_POST['default2Link'],
      'tagName3' => $_POST['default3'],
      'tagName3Link' => $_POST['default3Link'],
    );

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
  if($tag['tagName'] == 'default'){
    echo '<br><br>';
  }
  echo '<input type="text" name="'.$tag['tagName'].'" value="'.$tag['tagName'].'" readonly>';
  echo '<input type="text" name="'.$tag['tagName'].'1" value="'.$tag['tagName1'].'" placeholder="valore1">';
  echo '<input type="text" name="'.$tag['tagName'].'1Link" value="'.$tag['tagName1Link'].'" placeholder="note1">';
  echo ' - <input type="text" name="'.$tag['tagName'].'2" value="'.$tag['tagName2'].'" placeholder="valore2">';
  echo '<input type="text" name="'.$tag['tagName'].'2Link" value="'.$tag['tagName2Link'].'" placeholder="note2">';
  echo ' - <input type="text" name="'.$tag['tagName'].'3" value="'.$tag['tagName3'].'" placeholder="valore3">';
  echo '<input type="text" name="'.$tag['tagName'].'3Link" value="'.$tag['tagName3Link'].'" placeholder="note3">';
  echo "<br>";
}

 ?>
 <br>
 <input name="MacroLibrarsi_Tag_List_Save" type="Submit" value="Salva" class="button">
</form>
<hr>
<h2>Istruzioni</h2>
<h4>Aggiungi TAG/libri</h4>
<p>Seleziona il TAG dal menu' a tendina e premi aggiungi</p>
<p>A questo punto il TAG verrà visualizzato tra quelli disponibili. Inserisci i codici di MacroLibrarsiAPI ed un'eventuale nota.</p>
<p>Premi salva per rendere effettiva la modifica.</p>
<h4>Rimuovi TAG/Libri</h4>
<p>Per rimuovere un TAG cancella i valori inseriti (puoi lasciare le note) e premi salva</p>
