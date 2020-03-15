<?php get_header(); ?>

<?php

if ($_SERVER['SERVER_NAME'] == 'www.italiachecambia.org'){
  $icc_paypal_API = 'ARN1KrIpgxFNuB0ZkZQ31y4CbJJ4o36N9TZSFajcSkvMrukjHzEQbjnsLAIjzauR9MBfGMNT3UtOwn7O';
  $icc10mese = 'P-37224294SU217912RLZWS6LQ';
  $icc20mese = 'P-5HE28648AN455770LLZWS65I';
  $icc50mese = 'P-3F385464EP992694TLZWTG7I';
  $icc100mese = 'P-9BR47289TH950191FLZWTHLY';
  $icc250mese = 'P-8ER19785J92642247LZWTH3Y';
  $icc500mese = 'P-9AM39017SH726754RLZWTIFI';
  $icc10anno = 'P-3PP066687Y715944MLZWTJIY';
  $icc20anno = 'P-06F43075088441902LZWTJSY';
  $icc50anno = 'P-50P95046WF434302CLZWTJ7A';
  $icc100anno = 'P-7NP38256C5143092CLZWTKJA';
  $icc250anno = 'P-2BR781013N798401DLZWTKXQ';
  $icc500anno = 'P-7F9378847M556733YLZWTLCI';
}
else{ //se server differente da WWW
  $icc_paypal_API = 'AcuA_crJU2LOSvbTXAT907AY1CeUpQHqzwTpD5yxlRi4bLBAPs9OrrUps22VHoSc-WKGAgs-SQDio90M';
  $icc10mese = 'P-9AU56054CD509794XLY5KCRA';
  $icc20mese = 'P-2A100646DT395035VLY5KDCQ';
  $icc50mese = 'P-7U871187DY6980310LY5KEKY';
  $icc100mese = 'P-17D00947XB807025FLY5KFGY';
  $icc250mese = 'P-7EN57308226310709LY5KFTA';
  $icc500mese = 'P-0UM89965CV242504NLY5KF5I';
  $icc10anno = 'P-80480559B2684774KLY5OAVQ';
  $icc20anno = 'P-6AS83261CA290731ELY5OBCQ';
  $icc50anno = 'P-7GH57463U0107712NLY5OBOA';
  $icc100anno = 'P-2322185446664332VLY5OBYI';
  $icc250anno = 'P-67K52472AA427112VLY5OCGY';
  $icc500anno = 'P-8N131668LC884432DLY5OCQQ';
}

 ?>
<div class="container pt-4">
  <?php if( have_posts() ) : ?>
    <?php
      while(have_posts() ) : the_post();
  ?>
  <div class="row">
    <div class="col-12 col-lg-6 order-2 order-lg-1">
      <?php
        if ($_POST['submit_button']){

          if ($_POST['contributoLibero'] != ''){
              $amount = $_POST['contributoLibero'];
          }else{
            $amount = $_POST['contributo'];
          }
//add contribuisci OLD
          ?>

          <?php if ($_POST['frequenza'] == "singola"): ?>

            <!-- Pagamento one time -->
            <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $icc_paypal_API;?>&currency=EUR&disable-funding=venmo,sofort"></script>
            <h2>Contributo singolo</h2>
            <p><strong>Nome:</strong> <?php echo $_POST['fullname']; ?></p>
            <p><strong>Cognome:</strong> <?php echo $_POST['fullsurname']; ?></p>
            <p><strong>eMail:</strong> <?php echo $_POST['email']; ?></p>
            <p><strong>Telefono:</strong> <?php echo $_POST['telephone']; ?></p>
            <p><strong>CAP:</strong> <?php echo $_POST['cap']; ?></p>
            <p><strong>Contributo:</strong> <?php echo $amount; ?>€</p>

            <div class="paypal-button" id="paypal-button-container"></div>


            <form action="/contribuisci/grazie" id="contribuisci_ok" name="contribuisci_ok" method="post" style="display:none;">
              <input type="text" name="fullname" value="<?php echo $_POST['fullname'];?>" />
              <input type="text" name="fullsurname" value="<?php echo $_POST['fullsurname'];?>" />
              <input type="text" name="email" value="<?php echo $_POST['email'];?>" />
              <input type="text" name="telephone" value="<?php echo $_POST['telephone'];?>" />
              <input type="text" name="cap" value="<?php echo $_POST['cap'];?>" />
              <input type="text" name="amount" value="<?php echo $amount;?>" />
              <input type="text" name="frequenza" value="<?php echo $_POST['frequenza'];?>" />
            </form>


              <script>
                //Donazione singola
                paypal.Buttons({
                  createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                      purchase_units: [{
                        amount: {
                          value: '<?php echo $amount; ?>'
                        }
                      }]
                    });
                  },
                  onApprove: function(data, actions) {
                    // This function captures the funds from the transaction.
                    return actions.order.capture().then(function(details) {
                      //window.location.href = "/contribuisci/grazie";
                      document.getElementById("contribuisci_ok").submit();

                    });
                  },
                  onCancel: function (data) {
                    // Show a cancel page, or return to cart
                    window.location.href = "/contribuisci/cancellata";
                  },
                  onError: function (err) {
                    // Show an error page here, when an error occurs
                    window.location.href = "/contribuisci/errore";
                  }
                }).render('#paypal-button-container');
              </script>
            <?php else:
              ?>

              <script src="https://www.paypal.com/sdk/js?client-id=AcuA_crJU2LOSvbTXAT907AY1CeUpQHqzwTpD5yxlRi4bLBAPs9OrrUps22VHoSc-WKGAgs-SQDio90M&currency=EUR&disable-funding=venmo,sofort&vault=true"></script>
              <?php
                if($_POST['frequenza'] == 'mensile'){
                  if( $amount == 10){
                    $codicePiano = $icc10mese; //10mese
                  } elseif($amount == 20){
                    $codicePiano = $icc20mese; //20mese
                  } elseif($amount == 50){
                    $codicePiano = $icc50mese; //50mese
                  } elseif($amount == 100){
                    $codicePiano = $icc100mese; //100mese
                  } elseif($amount == 250){
                    $codicePiano = $icc250mese; //250mese
                  } elseif($amount == 500){
                    $codicePiano = $icc500mese; //500mese
                  } else{
                    $codicePiano = 'ERRORE';
                  }
                } elseif ($_POST['frequenza'] == 'annuale') {
                  if( $amount == 10){
                    $codicePiano = $icc10anno; //10anno
                  } elseif($amount == 20){
                    $codicePiano = $icc20anno; //20anno
                  } elseif($amount == 50){
                    $codicePiano = $icc50anno; //50anno
                  } elseif($amount == 100){
                    $codicePiano = $icc100anno; //100anno
                  } elseif($amount == 250){
                    $codicePiano = $icc250anno; //250anno
                  } elseif($amount == 500){
                    $codicePiano = $icc500anno; //500anno
                  } else{
                    $codicePiano = 'ERRORE';
                  }
                }
              ?>
              <h2>Contributo <?php echo $_POST['frequenza'];?></h2>
              <p><strong>Nome:</strong> <?php echo $_POST['fullname']; ?></p>
              <p><strong>Cognome:</strong> <?php echo $_POST['fullsurname']; ?></p>
              <p><strong>eMail:</strong> <?php echo $_POST['email']; ?></p>
              <p><strong>Telefono:</strong> <?php echo $_POST['telephone']; ?></p>
              <p><strong>CAP:</strong> <?php echo $_POST['cap']; ?></p>
              <p><strong>Contributo  <?php echo $_POST['frequenza'];?>:</strong> <?php echo $amount; ?>€</p>
              <?php
                if($codicePiano != 'ERRORE'){
                  ?>
              <div class="paypal-button" id="paypal-button-container"></div>
                <script>
                //Donazione in abbonamento
                  paypal.Buttons({
                    createSubscription: function(data, actions) {
                      return actions.subscription.create({
                        'plan_id': '<?php echo $codicePiano; ?>'
                      });

                    },
                    onApprove: function(data, actions) {
                      // This function captures the funds from the transaction.
                      document.getElementById("contribuisci_ok").submit();
                    },
                    onCancel: function (data) {
                      // Show a cancel page, or return to cart
                      window.location.href = "/contribuisci/cancellata";
                    },
                    onError: function (err) {
                      // Show an error page here, when an error occurs
                      window.location.href = "/contribuisci/errore";
                    }
                  }).render('#paypal-button-container');
                </script>

                <?php
              }else{
                ?>
                 <h3>Il contributo selezionato non è al momento disponibile</h3>
                 <p>Il contributo libero è disponible per la sola donazione singola, grazie</p>
                 <a href="/contribuisci/" data-no-swup>Torna alla pagina contribuisci</a>
                <?php
              }
             ?>

          <?php
            endif;

        }else{
      ?>
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
            <input id="telephone" name="telephone" type="text" class="form-control" placeholder="Telefono" required>
          </div>
          <div class="form-group col-12 col-md-6  p-2">
            <label for="cap">Cap</label>
            <input id="cap" name="cap" type="text" class="form-control" placeholder="CAP" required>
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
              <input type="text" name="contributoLibero" id="inlineRadio7" placeholder="libero" class="w-100">
            </label>
          </div>
          <small id="emailHelp" class="form-text text-muted">Il contributo libero è disponibile per la sola donazione singola</small>

          <!--
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
      -->


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
    <?php } ?>
    </div>


    <div class="col-12 col-lg-6 order-1 order-lg-2">
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
