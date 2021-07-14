<?php //var_dump($_POST);  ?>

<form id="form_contattaci_step1" class="form-inline mb-4" action="<?php echo get_pagenum_link(); ?>" method="post">
  <h4 class="col-12 mb-3">Sono un</h4>
  <select id="sonoun" class="custom-select col-12" name="sonoun" onchange="sonounjs()">
    <option value="--Seleziona--">--Seleziona--</option>
    <option value="azienda-imprenditore-liberoprofessionista">Azienda / imprenditore / libero professionista</option>
    <option value="lettore">Lettore</option>
    <option value="realta-mappa">Realtà della mappa</option>
    <option value="associazione">Associazione</option>
    <option value="scuola-universita">Scuola / Università</option>
    <option value="giornalista">Giornalista</option>
    <option value="ufficiostampa-evento">Ufficio stampa / Evento</option>
    <option value="altro">Altro</option>
  </select>

  <h4 class="col-12 my-3">Desidero</h4>
  <select id="desidero" class="custom-select col-12" name="desidero" onchange="desiderojs()">
    <option value="">--Seleziona sono un--</option>
  </select>

  <div id="mapparegionediv" class="d-none col-12 p-0 my-3">
    <h4 class="col-12">Seleziona la regione</h4>
    <?php $regioni = get_option('icc_regioni_attive') ? get_option('icc_regioni_attive') : array(); ?>
    <select id="mapparegione" class="custom-select col-12 w-100" name="mapparegione" onchange="regionejs()">
      <option value="--Seleziona--">--Seleziona una regione--</option>
      <?php
      foreach ($regioni as $regione){
        ?>
        <option value="<?php echo $regione; ?>"><?php echo $regione; ?></option>
        <?php } ?>
      <option value="altraregione">Altra regione</option>
    </select>
  </div>

  <input id="submit" type="submit" name="submit_step1" value="Continua con la richiesta" class="mt-3 btn btn-primary" disabled>

</form>

<script type="text/javascript">

function sonounjs() {



  var desidero = document.getElementById("desidero");

  desidero.innerText = null;

  var e = document.getElementById("sonoun").value;

  switch(e){
    case '--Seleziona--':
      var array = ["--Seleziona sono un--"];
    break;
    case 'azienda-imprenditore-liberoprofessionista':
      var array = ["--Seleziona--","Sponsorizzare la mia attività su ICC","Promuovere un evento o un’iniziativa","Fare una donazione a ICC","Proporre una collaborazione", "Altro"];
    break;
    case 'lettore':
      var array = ["--Seleziona--","Segnalare una notizia, un’iniziativa o un progetto alla redazione","Segnalare un progetto per la mappa di ICC","Inserire un annuncio in bacheca","Rispondere a un annuncio in bacheca", "Promuovere un evento o un’iniziativa","Fare una donazione a ICC","Voglio contribuire a cambiare il mondo","Voglio scrivere per ICC","Altro"];
    break;
    case 'realta-mappa':
      var array = ["--Seleziona--", "Segnalare un progetto per la mappa di ICC", "Chiedere una modifica alla mia scheda sulla mappa di ICC","Segnalare una notizia o un progetto alla redazione","Segnalare un evento o un’iniziativa", "Fare una donazione a ICC", "Altro"];
    break;
    case 'associazione':
      var array = ["--Seleziona--", "Segnalare una notizia, un’iniziativa o un progetto alla redazione", "Segnalare un progetto per la mappa di ICC", "Promuovere un evento o un’iniziativa", "Sponsorizzare la mia attività su ICC", "Fare una donazione a ICC", "Altro"];
    break;
    case 'scuola-universita':
      var array = ["--Seleziona--","Proporre una collaborazione", "Contattare la redazione", "Altro"];
    break;
    case 'giornalista':
      var array = ["--Seleziona--","Scrivere per Italia che Cambia", "Proporre una collaborazione","Segnalare una notizia, un’iniziativa o un progetto alla redazione","Segnalare un progetto per la mappa di ICC", "Promuovere un evento o un’iniziativa", "Fare una donazione a ICC", "Altro"];
    break;
    case 'ufficiostampa-evento':
      var array = ["--Seleziona--", "Segnalare un evento o un’iniziativa", "Proporre una collaborazione", "Altro"];
    break;
    case 'altro':
      var array = ["--Seleziona--", "Altro"];
    break;



  }

  for (var i = 0; i < array.length; i++) {
    var option = document.createElement("option");
    option.value = array[i].replace(/ +/g, "").replace(/[^\w\s]/gi, "").toLowerCase();
    option.text = array[i];
    desidero.appendChild(option);
  }

  document.getElementById("submit").setAttribute("disabled", "");

}

function desiderojs(){

  var submit = document.getElementById("submit");
  var desidero = document.getElementById("desidero");
  if( desidero.value != '--Seleziona--' && desidero.value != 'segnalareunprogettoperlamappadiicc'){
    submit.removeAttribute("disabled");
  } else if (desidero.value == 'segnalareunprogettoperlamappadiicc') {
    document.getElementById("mapparegionediv").classList.remove("d-none");
  }else {
    submit.setAttribute("disabled", "");
  }
}

function regionejs(){

  var submit = document.getElementById("submit");
  var regione = document.getElementById("mapparegione");
  if( regione.value != '--Seleziona--'){
    submit.removeAttribute("disabled");
  } else {
    submit.setAttribute("disabled", "");
  }
}



</script>
