<script src="https://www.paypal.com/sdk/js?client-id=<?php echo $icc_paypal_API;?>&currency=EUR&disable-funding=venmo,sofort,card"></script>
<!-- PAYPAL -->
<div class="paypal-button" id="paypal-button-container"></div>
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
          var form = document.getElementById("contribuisci_ok");
          var metodoPagamento = document.createElement("input");
          metodoPagamento.setAttribute("type", "text");
          metodoPagamento.setAttribute("name", "metodoPagamento");
          metodoPagamento.setAttribute("value", "paypal");
          form.appendChild(metodoPagamento);
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
