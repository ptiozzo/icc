<h1>Test integrazione macrolibrarsi</h1>
<form method="post" action="<?php echo get_pagenum_link(); ?>">
  <input type="text" name="codice_prodotto" value="" placeholder="Codice prodotto">
  <input name="macrolibrarsi_test_button" type="Submit" value="Prova" class="button">
</form>


<?php

if($_POST["macrolibrarsi_test_button"]){
  echo "<p><b>Codice prodotto</b> ".$_POST['codice_prodotto']."</p>";
  echo "<code>[ICCMacoLibrarsi code='".$_POST['codice_prodotto']."']</code><br>";
  echo "<div style='border: 1px solid red;margin-top: 10px; display: inline-block;'>";
    MacroLibrarsiAPI($_POST['codice_prodotto']);
  echo "</div>";
}


 ?>
