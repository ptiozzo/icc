<h2>Regioni</h2>


<?php

if($_POST['submit']){
  if($_POST['Abruzzo'] == 'Abruzzo'){
    $regioni[] = 'Abruzzo';
  }
  if($_POST['Basilicata'] == 'Basilicata'){
    $regioni[] = 'Basilicata';
  }
  if($_POST['Calabria'] == 'Calabria'){
    $regioni[] = 'Calabria';
  }
  if($_POST['Campania'] == 'Campania'){
    $regioni[] = 'Campania';
  }
  if($_POST['Emilia-Romagna'] == 'Emilia-Romagna'){
    $regioni[] = 'Emilia-Romagna';
  }
  if($_POST['Friuli-Venezia-Giulia'] == 'Friuli-Venezia-Giulia'){
    $regioni[] = 'Friuli-Venezia-Giulia';
  }
  if($_POST['Lazio'] == 'Lazio'){
    $regioni[] = 'Lazio';
  }
  if($_POST['Liguria'] == 'Liguria'){
    $regioni[] = 'Liguria';
  }
  if($_POST['Lombardia'] == 'Lombardia'){
    $regioni[] = 'Lombardia';
  }
  if($_POST['Marche'] == 'Marche'){
    $regioni[] = 'Marche';
  }
  if($_POST['Molise'] == 'Molise'){
    $regioni[] = 'Molise';
  }
  if($_POST['Piemonte'] == 'Piemonte'){
    $regioni[] = 'Piemonte';
  }
  if($_POST['Puglia'] == 'Puglia'){
    $regioni[] = 'Puglia';
  }
  if($_POST['Sardegna'] == 'Sardegna'){
    $regioni[] = 'Sardegna';
  }
  if($_POST['Sicilia'] == 'Sicilia'){
    $regioni[] = 'Sicilia';
  }
  if($_POST['Toscana'] == 'Toscana'){
    $regioni[] = 'Toscana';
  }
  if($_POST['Trentino-Alto-Adige'] == 'Trentino-Alto-Adige'){
    $regioni[] = 'Trentino-Alto-Adige';
  }
  if($_POST['Umbria'] == 'Umbria'){
    $regioni[] = 'Umbria';
  }
  if($_POST['Valle-d-Aosta'] == 'Valle-d-Aosta'){
    $regioni[] = 'Valle-d-Aosta';
  }
  if($_POST['Veneto'] == 'Veneto'){
    $regioni[] = 'Veneto';
  }

  echo "Salvato!";

  update_option('icc_regioni_attive',$regioni,'no');
}

 ?>

<?php
  $regioni = get_option('icc_regioni_attive');
?>
<form class="" action="<?php echo get_pagenum_link(); ?>" method="post">

  <input type="checkbox" id="Abruzzo" name="Abruzzo" value="Abruzzo" <?php if(in_array("Abruzzo", $regioni)){echo "checked";} ?>>
  <label for="Abruzzo"> Abruzzo</label><br>
  <input type="checkbox" id="Basilicata" name="Basilicata" value="Basilicata" <?php if(in_array("Basilicata", $regioni)){echo "checked";} ?>>
  <label for="Basilicata"> Basilicata</label><br>
  <input type="checkbox" id="Calabria" name="Calabria" value="Calabria" <?php if(in_array("Calabria", $regioni)){echo "checked";} ?>>
  <label for="Calabria"> Calabria</label><br>
  <input type="checkbox" id="Campania" name="Campania" value="Campania" <?php if(in_array("Campania", $regioni)){echo "checked";} ?>>
  <label for="Campania"> Campania</label><br>
  <input type="checkbox" id="Emilia-Romagna" name="Emilia-Romagna" value="Emilia-Romagna" <?php if(in_array("Emilia-Romagna", $regioni)){echo "checked";} ?>>
  <label for="Emilia-Romagna"> Emilia-Romagna</label><br>
  <input type="checkbox" id="Friuli-Venezia-Giulia" name="Friuli-Venezia-Giulia" value="Friuli-Venezia-Giulia" <?php if(in_array("Friuli-Venezia-Giulia", $regioni)){echo "checked";} ?>>
  <label for="Friuli-Venezia-Giulia"> Friuli Venezia Giulia</label><br>
  <input type="checkbox" id="Lazio" name="Lazio" value="Lazio" <?php if(in_array("Lazio", $regioni)){echo "checked";} ?>>
  <label for="Lazio"> Lazio</label><br>
  <input type="checkbox" id="Liguria" name="Liguria" value="Liguria" <?php if(in_array("Liguria", $regioni)){echo "checked";} ?>>
  <label for="Liguria"> Liguria</label><br>
  <input type="checkbox" id="Lombardia" name="Lombardia" value="Lombardia" <?php if(in_array("Lombardia", $regioni)){echo "checked";} ?>>
  <label for="Lombardia"> Lombardia</label><br>
  <input type="checkbox" id="Marche" name="Marche" value="Marche" <?php if(in_array("Marche", $regioni)){echo "checked";} ?>>
  <label for="Marche"> Marche</label><br>
  <input type="checkbox" id="Molise" name="Molise" value="Molise" <?php if(in_array("Molise", $regioni)){echo "checked";} ?>>
  <label for="Molise"> Molise</label><br>
  <input type="checkbox" id="Piemonte" name="Piemonte" value="Piemonte" <?php if(in_array("Piemonte", $regioni)){echo "checked";} ?>>
  <label for="Piemonte"> Piemonte</label><br>
  <input type="checkbox" id="Puglia" name="Puglia" value="Puglia" <?php if(in_array("Puglia", $regioni)){echo "checked";} ?>>
  <label for="Puglia"> Puglia</label><br>
  <input type="checkbox" id="Sardegna" name="Sardegna" value="Sardegna" <?php if(in_array("Sardegna", $regioni)){echo "checked";} ?>>
  <label for="Sardegna"> Sardegna</label><br>
  <input type="checkbox" id="Sicilia" name="Sicilia" value="Sicilia" <?php if(in_array("Sicilia", $regioni)){echo "checked";} ?>>
  <label for="Sicilia"> Sicilia</label><br>
  <input type="checkbox" id="Toscana" name="Toscana" value="Toscana" <?php if(in_array("Toscana", $regioni)){echo "checked";} ?>>
  <label for="Toscana"> Toscana</label><br>
  <input type="checkbox" id="Trentino-Alto-Adige" name="Trentino-Alto-Adige" value="Trentino-Alto-Adige" <?php if(in_array("Trentino-Alto-Adige", $regioni)){echo "checked";} ?>>
  <label for="Trentino-Alto-Adige"> Trentino-Alto Adige</label><br>
  <input type="checkbox" id="Umbria" name="Umbria" value="Umbria" <?php if(in_array("Umbria", $regioni)){echo "checked";} ?>>
  <label for="Umbria"> Umbria</label><br>
  <input type="checkbox" id="Valle-d-Aosta" name="Valle-d-Aosta" value="Valle-d-Aosta" <?php if(in_array("Valle-d-Aosta", $regioni)){echo "checked";} ?>>
  <label for="Valle-d-Aosta"> Valle d'Aosta</label><br>
  <input type="checkbox" id="Veneto" name="Veneto" value="Veneto" <?php if(in_array("Veneto", $regioni)){echo "checked";} ?>>
  <label for="Veneto"> Veneto</label><br>

  <input name="submit" type="Submit" value="Salva" class="">

</form
