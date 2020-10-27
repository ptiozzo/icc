<h2>Regioni</h2>


<?php

if($_POST['submit']){
  if($_POST['abruzzo'] == 'abruzzo'){
    $regioni[] = 'abruzzo';
  }
  if($_POST['basilicata'] == 'basilicata'){
    $regioni[] = 'basilicata';
  }
  if($_POST['calabria'] == 'calabria'){
    $regioni[] = 'calabria';
  }
  if($_POST['campania'] == 'campania'){
    $regioni[] = 'campania';
  }
  if($_POST['emilia-romagna'] == 'emilia-romagna'){
    $regioni[] = 'emilia-romagna';
  }
  if($_POST['friuliveneziagiulia'] == 'friuliveneziagiulia'){
    $regioni[] = 'friuliveneziagiulia';
  }
  if($_POST['lazio'] == 'lazio'){
    $regioni[] = 'lazio';
  }
  if($_POST['liguria'] == 'liguria'){
    $regioni[] = 'liguria';
  }
  if($_POST['lombardia'] == 'lombardia'){
    $regioni[] = 'lombardia';
  }
  if($_POST['marche'] == 'marche'){
    $regioni[] = 'marche';
  }
  if($_POST['molise'] == 'molise'){
    $regioni[] = 'molise';
  }
  if($_POST['piemonte'] == 'piemonte'){
    $regioni[] = 'piemonte';
  }
  if($_POST['puglia'] == 'puglia'){
    $regioni[] = 'puglia';
  }
  if($_POST['sardegna'] == 'sardegna'){
    $regioni[] = 'sardegna';
  }
  if($_POST['sicilia'] == 'sicilia'){
    $regioni[] = 'sicilia';
  }
  if($_POST['toscana'] == 'toscana'){
    $regioni[] = 'toscana';
  }
  if($_POST['trentino-alto-adige'] == 'trentino-alto-adige'){
    $regioni[] = 'trentino-alto-adige';
  }
  if($_POST['umbria'] == 'umbria'){
    $regioni[] = 'umbria';
  }
  if($_POST['valle-d-aosta'] == 'valle-d-aosta'){
    $regioni[] = 'valle-d-aosta';
  }
  if($_POST['veneto'] == 'veneto'){
    $regioni[] = 'veneto';
  }

  echo "Salvato!";

  update_option('icc_regioni_attive',$regioni,'no');
}

 ?>

<?php
  $regioni = get_option('icc_regioni_attive') ? get_option('icc_regioni_attive') : array();
?>
<form class="" action="<?php echo get_pagenum_link(); ?>" method="post">

  <input type="checkbox" id="abruzzo" name="abruzzo" value="abruzzo" <?php if(in_array("abruzzo", $regioni)){echo "checked";} ?>>
  <label for="abruzzo"> abruzzo</label><br>
  <input type="checkbox" id="basilicata" name="basilicata" value="basilicata" <?php if(in_array("basilicata", $regioni)){echo "checked";} ?>>
  <label for="basilicata"> basilicata</label><br>
  <input type="checkbox" id="calabria" name="calabria" value="calabria" <?php if(in_array("calabria", $regioni)){echo "checked";} ?>>
  <label for="calabria"> calabria</label><br>
  <input type="checkbox" id="campania" name="campania" value="campania" <?php if(in_array("campania", $regioni)){echo "checked";} ?>>
  <label for="campania"> campania</label><br>
  <input type="checkbox" id="emilia-romagna" name="emilia-romagna" value="emilia-romagna" <?php if(in_array("emilia-romagna", $regioni)){echo "checked";} ?>>
  <label for="emilia-romagna"> emilia-romagna</label><br>
  <input type="checkbox" id="friuliveneziagiulia" name="friuliveneziagiulia" value="friuliveneziagiulia" <?php if(in_array("friuliveneziagiulia", $regioni)){echo "checked";} ?>>
  <label for="friuliveneziagiulia"> Friuli Venezia Giulia</label><br>
  <input type="checkbox" id="lazio" name="lazio" value="lazio" <?php if(in_array("lazio", $regioni)){echo "checked";} ?>>
  <label for="lazio"> lazio</label><br>
  <input type="checkbox" id="liguria" name="liguria" value="liguria" <?php if(in_array("liguria", $regioni)){echo "checked";} ?>>
  <label for="liguria"> liguria</label><br>
  <input type="checkbox" id="lombardia" name="lombardia" value="lombardia" <?php if(in_array("lombardia", $regioni)){echo "checked";} ?>>
  <label for="lombardia"> lombardia</label><br>
  <input type="checkbox" id="marche" name="marche" value="marche" <?php if(in_array("marche", $regioni)){echo "checked";} ?>>
  <label for="marche"> marche</label><br>
  <input type="checkbox" id="molise" name="molise" value="molise" <?php if(in_array("molise", $regioni)){echo "checked";} ?>>
  <label for="molise"> molise</label><br>
  <input type="checkbox" id="piemonte" name="piemonte" value="piemonte" <?php if(in_array("piemonte", $regioni)){echo "checked";} ?>>
  <label for="piemonte"> piemonte</label><br>
  <input type="checkbox" id="puglia" name="puglia" value="puglia" <?php if(in_array("puglia", $regioni)){echo "checked";} ?>>
  <label for="puglia"> puglia</label><br>
  <input type="checkbox" id="sardegna" name="sardegna" value="sardegna" <?php if(in_array("sardegna", $regioni)){echo "checked";} ?>>
  <label for="sardegna"> sardegna</label><br>
  <input type="checkbox" id="sicilia" name="sicilia" value="sicilia" <?php if(in_array("sicilia", $regioni)){echo "checked";} ?>>
  <label for="sicilia"> sicilia</label><br>
  <input type="checkbox" id="toscana" name="toscana" value="toscana" <?php if(in_array("toscana", $regioni)){echo "checked";} ?>>
  <label for="toscana"> toscana</label><br>
  <input type="checkbox" id="trentino-alto-adige" name="trentino-alto-adige" value="trentino-alto-adige" <?php if(in_array("trentino-alto-adige", $regioni)){echo "checked";} ?>>
  <label for="trentino-alto-adige"> Trentino-Alto Adige</label><br>
  <input type="checkbox" id="umbria" name="umbria" value="umbria" <?php if(in_array("umbria", $regioni)){echo "checked";} ?>>
  <label for="umbria"> umbria</label><br>
  <input type="checkbox" id="valle-d-aosta" name="valle-d-aosta" value="valle-d-aosta" <?php if(in_array("valle-d-aosta", $regioni)){echo "checked";} ?>>
  <label for="valle-d-aosta"> Valle d'Aosta</label><br>
  <input type="checkbox" id="veneto" name="veneto" value="veneto" <?php if(in_array("veneto", $regioni)){echo "checked";} ?>>
  <label for="veneto"> veneto</label><br>

  <input name="submit" type="Submit" value="Salva" class="">

</form
