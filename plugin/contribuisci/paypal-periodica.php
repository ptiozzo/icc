<script src="https://www.paypal.com/sdk/js?client-id=<?php echo $icc_paypal_API;?>&currency=EUR&disable-funding=venmo,sofort&vault=true"></script>
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
