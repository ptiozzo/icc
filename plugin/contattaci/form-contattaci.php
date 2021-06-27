<form id="form_contattaci" class="form-inline mb-3" action="<?php echo get_pagenum_link(); ?>" method="post">
  <h3 class="col-12 mb-3">Sono un</h3>
  <div class="col-12">
    <select id="sonoun" class="custom-select" name="sonoun" onchange="sonounjs()">
      <option value="">--Seleziona--</option>
      <option value="azienda-imprenditore-liberoprofessionista">Azienda / imprenditore / libero professionista</option>
      <option value="lettore">Lettore</option>
      <option value="realta-mappa">Realtà della mappa</option>
      <option value="associazione">Associazione</option>
      <option value="scuola-universita">Scuola / Università</option>
      <option value="giornalista">Giornalista</option>
      <option value="ufficiostampa-evento">Ufficio stampa / Evento</option>
      <option value="altro">Altro</option>

    </select>
  </div>
</form>
<script type="text/javascript">

function sonounjs() {
  
  var form = document.getElementById("form_contattaci");
  var desidero = document.createElement("select");
  desidero.id = "desidero";
  desidero.setAttribute("name", "desidero");
  desidero.setAttribute("class", "custom-select");
  form.appendChild(desidero);

  var e = document.getElementById("sonoun").value;

  switch(e){
    case 'azienda-imprenditore-liberoprofessionista':
      var array = ["Sponsorizzare","Promuovere","Donazione","Collaborazione", "Altro"];
    break;
    case 'lettore':
      var array = ["Lettore 1","Lettore 2","Lettore 3","Lettore 4", "Lettore 5"];
    break;

  }

  for (var i = 0; i < array.length; i++) {
    var option = document.createElement("option");
    option.value = array[i];
    option.text = array[i];
    desidero.appendChild(option);
  }

}


</script>
