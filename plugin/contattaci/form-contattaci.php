<form id="form_contattaci" class="form-inline mb-4" action="<?php echo get_pagenum_link(); ?>" method="post">
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
      var array = ["--Seleziona--","Sponsorizzare","Promuovere","Donazione","Collaborazione", "Altro"];
    break;
    case 'lettore':
      var array = ["--Seleziona--","Lettore 1","Lettore 2","Lettore 3","Lettore 4", "Lettore 5"];
    break;


  }

  for (var i = 0; i < array.length; i++) {
    var option = document.createElement("option");
    option.value = array[i];
    option.text = array[i];
    desidero.appendChild(option);
  }

}

function desiderojs(){

  var form = document.getElementById("form_contattaci");

  var submit = document.createElement("input");
  submit.id = "submit";
  submit.type = "submit";
  submit.value = "Invia";

  form.appendChild(submit);
  document.getElementById("submit").className += "mt-3 btn btn-primary";


}


</script>
