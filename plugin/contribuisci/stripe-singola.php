<!-- STRIPE -->
<script src="https://js.stripe.com/v3/"></script>
<form id="payment-form" class="mb-2">
  <div id="card-element" class="border rounded-top p-2" style="hei">
    <!-- Elements will create input elements here -->
  </div>

  <div id="card-errors" role="alert"></div>

  <button id="submit" class="btn btn-primary rounded-bottom w-100">Contribuisci con carta di credito</button>
  <div class="text-center font-weight-lighter w-100">powered by stripe</div>
</form>

<?php
  \Stripe\Stripe::setApiKey($stripeSecretKey);

  $intent = \Stripe\PaymentIntent::create([
    'amount' => $amount*100,
    'currency' => 'eur',
    // Verify your integration in this guide by including this parameter
    'metadata' => ['integration_check' => 'accept_a_payment'],
  ]);
  $clientsegret = json_encode(array('client_secret' => $intent->client_secret));
?>

<script>
  // Set up Stripe.js and Elements to use in checkout form
  var stripe = Stripe('<?php echo $stripePuclicKey; ?>');
  var clientSecret = <?php echo $clientsegret; ?>;
  var clientSecret = clientSecret.client_secret;
  var elements = stripe.elements();
  var style = {
    base: {
      color: "#32325d",
      fontFamily: 'Arial, sans-serif',
      fontSmoothing: "antialiased",
      fontSize: "16px",
      "::placeholder": {
        color: "#32325d"
      }
    }
  };


  var card = elements.create("card", { style: style });
  card.mount("#card-element");

  card.on('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
  });


  var form = document.getElementById('payment-form');

  form.addEventListener('submit', function(ev) {
    ev.preventDefault();
    // If the client secret was rendered server-side as a data-secret attribute
    // on the <form> element, you can retrieve it here by calling `form.dataset.secret`
    stripe.confirmCardPayment(clientSecret, {
      payment_method: {
        card: card,
        billing_details: {
          name: '<?php echo $_POST['fullname']." ".$_POST['fullsurname'] ?>'
        }
      }
    }).then(function(result) {
      if (result.error) {
        // Show error to your customer (e.g., insufficient funds)
        console.log(result.error.message);
        window.location.href = "/contribuisci/errore";
      } else {
        // The payment has been processed!
        if (result.paymentIntent.status === 'succeeded') {

          var form = document.getElementById("contribuisci_ok");
          var metodoPagamento = document.createElement("input");
          metodoPagamento.setAttribute("type", "text");
          metodoPagamento.setAttribute("name", "metodoPagamento");
          metodoPagamento.setAttribute("value", "stripe");
          form.appendChild(metodoPagamento);

          document.getElementById("contribuisci_ok").submit();
        }
      }
    });
  });
</script>
