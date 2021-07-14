<?php //var_dump($_POST);  ?>

<form id="form_contattaci_step3" class=" mb-4" action="<?php echo get_pagenum_link(); ?>" method="post">
  <div class="row mx-auto">
    <h3 class="col-12 mb-3">Dati anagrafici</h3>
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
    <input type="hidden" name="submit_step2" value="submit_step2">
  </div>
  <h3 class="col-12 mb-3">Messaggio</h3>
  <div class="form-group col-12 p-2">
    <label for="MessaggioTextarea">Messaggio per la redazione</label>
    <textarea class="form-control" rows="10" id="MessaggioTextarea" name="messaggio"  placeholder="Inserisci il tuo messaggio per la redazione" required></textarea>
  </div>
  <input type="hidden" name="sonoun" value="<?php echo $_POST['sonoun']; ?>">
  <input type="hidden" name="desidero" value="<?php echo $_POST['desidero']; ?>">
  <input type="submit" name="submit_step3" value="Invia" class="mt-3 btn btn-primary">
</form>
