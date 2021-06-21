
<form action="<?php echo get_pagenum_link(); ?>" method="post" class="form-inline mb-3">

  <h3 class="col-12 mb-3">Dati anagrafici</h3>
  <div class="row mx-auto">
    <div class="form-group col-12 col-md-6 p-2">
      <label for="fullname">Nome</label>
      <input id="fullname" name="fullname" type="text" class="form-control" placeholder="Nome" required>
    </div>
    <div class="form-group col-12 col-md-6  p-2">
      <label for="fullsurname">Cognome</label>
      <input id="fullsurname" name="fullsurname" type="text" class="form-control" placeholder="Cognome" required>
    </div>
    <div class="form-group col-12 col-md-6  p-2">
      <label for="email">eMail</label>
      <input id="email" name="email" type="email" class="form-control" placeholder="email" required>
    </div>
    <div class="form-group col-12 col-md-6  p-2">
      <label for="telephone">Telefono</label>
      <input id="telephone" name="telephone" type="text" class="form-control" placeholder="Telefono">
    </div>
    <div class="form-group col-12 col-md-6  p-2">
      <label for="indirizzo">Indirizzo</label>
      <input id="indirizzo" name="indirizzo" type="text" class="form-control" placeholder="Indirizzo" required>
    </div>
    <div class="form-group col-12 col-md-6  p-2">
      <label for="citta">Città</label>
      <input id="citta" name="citta" type="text" class="form-control" placeholder="Città" required>
    </div>
    <div class="form-group col-12 col-md-6  p-2">
      <label for="provincia">Provincia</label>
      <input id="provincia" name="provincia" type="text" class="form-control" placeholder="Provincia" required>
    </div>
    <div class="form-group col-12 col-md-6  p-2">
      <label for="cap">Cap</label>
      <input id="cap" name="cap" type="text" class="form-control" placeholder="CAP" required>
    </div>
    <input id="destinazione" name="destinazione" type="text" class="form-control" value="<?php echo $destinazione; ?>" hidden>
    <?php
    if ($destinazione != 'Generico') {
      ?>
      <div class="form-group col-12 col-md-6  p-2">
        <label for="destinazione">Destinazione</label>
        <input id="destinazione2" name="destinazione2" type="text" class="form-control" value="<?php echo $destinazione; ?>" disabled>
      </div>
      <?php
    }?>

  </div>

    <h3 class="col-12 my-3">Frequenza contributo</h3>

    <div class="btn-group btn-group-toggle col-12" data-toggle="buttons">
      <label class="btn btn-light">
        <input type="radio" name="frequenza" id="inlineRadio1" value="singola"> Singola
      </label>
      <label class="btn btn-light active">
        <input type="radio" name="frequenza" id="inlineRadio2" value="mensile" checked> Mensile
      </label>
      <label class="btn btn-light">
        <input type="radio" name="frequenza" id="inlineRadio3" value="annuale"> Annuale
      </label>
    </div>

    <h3 class="col-12 my-3">Contributo economico</h3>

    <div class="btn-group btn-group-toggle col-12" data-toggle="buttons">
      <label class="btn btn-light">
        <input type="radio" name="contributo" id="inlineRadio1" value="10"> 10€
      </label>
      <label class="btn btn-light active">
        <input type="radio" name="contributo" id="inlineRadio2" value="20" checked> 20€
      </label>
      <label class="btn btn-light">
        <input type="radio" name="contributo" id="inlineRadio3" value="50"> 50€
      </label>
      <label class="btn btn-light">
        <input type="radio" name="contributo" id="inlineRadio4" value="100"> 100€
      </label>
      <label class="btn btn-light">
        <input type="radio" name="contributo" id="inlineRadio5" value="250"> 250€
      </label>
      <label class="btn btn-light">
        <input type="radio" name="contributo" id="inlineRadio6" value="500"> 500€
      </label>
      <label class="btn btn-light">
        <input type="text" name="contributoLibero" id="inlineRadio7" placeholder="libero" class="w-100">
      </label>
    </div>
    <small id="emailHelp" class="form-text text-muted">Il contributo libero è disponibile per la sola donazione singola</small>

    <h3 class="col-12 my-3">Metodo di pagamento</h3>

    <div class="btn-group btn-group-toggle col-12" data-toggle="buttons">
      <label class="btn btn-light">
        <input type="radio" name="metodoPagamento" id="inlineRadio1" value="stripe" checked> Carta di credito
      </label>
      <label class="btn btn-light active">
        <input type="radio" name="metodoPagamento" id="inlineRadio2" value="paypal"> PayPal o MyBank (sepa)
      </label>
    </div>


<div class="form-check mt-3">
  <input class="form-check-input" checked="checked" type="checkbox" value="privacy" id="privacy-check">
  <label class="form-check-label" for="privacy-check">
    Accetto la privacy policy
  </label>
</div>
<small class="form-text text-muted">
* Cliccando sul bottone "PROCEDI ORA" dichiari di aver preso visione ed accettare i <a href="/contribuisci/termini-e-condizioni/">TERMINI e le CONDIZIONI</a> nonchè la <a href="//www.iubenda.com/privacy-policy/7778043" class="iubenda-white iubenda-embed" title="Privacy Policy">PRIVACY POLICY</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script></small>

  <input id="inviaform" class="btn btn-primary mt-2" name="submit_button" type="submit" value="Procedi ora">
</form>
