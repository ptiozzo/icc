<?php get_header(); ?>

<div class="container pt-4">
  <?php if( have_posts() ) : ?>
    <?php
      while(have_posts() ) : the_post();
  ?>
  <?php
    if ($_POST['submit_button']){
      echo "FORM INVIATO <br>";
      echo $_POST['fullname']." ";
      echo $_POST['fullsurname']." ";
      echo $_POST['email']." ";
      echo $_POST['telephone']." ";
      echo $_POST['frequenza']." ";
      echo $_POST['contributo']." ";
      echo $_POST['metodopagamento']." ";

    }
  ?>
  <div class="row">
    <div class="col-12 col-md-6">
      <form action="<?php echo get_pagenum_link(); ?>" method="post" class="form-inline mb-3">

        <h3 class="col-12 mb-3">Dati anagrafici</h3>
        <div class="row mx-auto">
          <div class="form-group col-12 col-md-6 p-2">
            <label for="fullname">Nome</label>
            <input id="fullname" name="fullname" type="text" class="form-control" placeholder="Nome">
          </div>
          <div class="form-group col-12 col-md-6  p-2">
            <label for="fullsurname">Cognome</label>
            <input id="fullsurname" name="fullsurname" type="text" class="form-control" placeholder="Cognome">
          </div>
          <div class="form-group col-12 col-md-6  p-2">
            <label for="email">eMail</label>
            <input id="email" name="email" type="email" class="form-control" placeholder="email">
          </div>
          <div class="form-group col-12 col-md-6  p-2">
            <label for="telephone">Telefono</label>
            <input id="telephone" name="telephone" type="text" class="form-control" placeholder="Telefono">
          </div>
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
              <input type="text" name="contributo" id="inlineRadio7" value="libero" class="w-100">
            </label>
          </div>

        <h3 class="col-12 my-3">Seleziona modalità di pagamento</h3>

        <div class="btn-group btn-group-toggle col-12 my-3" data-toggle="buttons">
          <label class="btn btn-light">
            <input type="radio" name="metodopagamento" id="PayWhirl" value="PayWhirl">
            <div class="row">
              <div class="col-12">
                CARTA DI CREDITO
              </div>
              <div class="col-12">
                <img class="" src="https://www.italiachecambia.org/wp-content/uploads/2016/01/paywhirl.png" alt="">
              </div>
            </div>
          </label>
          <label class="btn btn-light active">
            <input type="radio" name="metodopagamento" id="PayPal" value="PayPal" checked>
            <div class="row">
              <div class="col-12">
                PAYPAL
              </div>
              <div class="col-12">
                <img src="https://www.italiachecambia.org/wp-content/uploads/2016/03/paypal.png" alt="">
              </div>
            </div>
          </label>
          <label class="btn btn-light">
            <input type="radio" name="metodopagamento" id="SlimPay" value="SlimPay">
            <div class="row">
              <div class="col-12">
                BONIFICO RICORRENTE (SLIMPAY)
              </div>
              <div class="col-12">
                <img src="https://www.italiachecambia.org/wp-content/uploads/2016/01/slimpay.png" alt="">
              </div>
            </div>
          </label>
        </div>



        <input id="privacy-check" checked="checked" name="privacy" type="checkbox" value="privacy" class="col-auto">
        <small class="form-text text-muted col-auto">
        * Cliccando sul bottone "PROCEDI ORA" dichiari di aver preso visione ed accettare i <a href="/termini-e-condizioni">TERMINI e le CONDIZIONI</a> nonchè la <a href="//www.iubenda.com/privacy-policy/7778043" class="iubenda-white iubenda-embed" title="Privacy Policy">PRIVACY POLICY</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script></small>
        <br>

        <input id="inviaform" class="btn btn-primary mt-2" name="submit_button" type="submit" value="Procedi ora">
      </form>
    </div>


    <div class="col-12 col-md-6">
      <div class="contribuisci p-3 rounded">
        <h1><?php echo get_the_title(); ?></h1>
        <?php echo the_content(); ?>
      </div>

    </div>
  </div>


  <?php
      endwhile;
  else:
  ?>

  <p>Non ho trovato nulla</p>

  <?php
  endif;
  ?>
</div> <!-- .content 	-->
<!-- carico footer -->
<?php get_footer(); ?>
