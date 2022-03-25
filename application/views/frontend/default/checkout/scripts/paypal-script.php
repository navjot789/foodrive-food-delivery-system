<!-- jQuery -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/payment/js/paypal-objects-api.js'); ?>"></script>
<script>
    paypal.Button.render({
    env: '<?php echo sanitize($paypal[0]->mode);?>', // 'sandbox' or 'production'
    style: {
      label: 'paypal',
      size:  'medium',    // small | medium | large | responsive
      shape: 'pill',     // pill | rect
      color: 'gold',     // gold | blue | silver | black
      tagline: false
    },
    client: {
      sandbox:    '<?php echo sanitize($paypal[0]->sandbox_client_id);?>',
      production: '<?php echo sanitize($paypal[0]->production_client_id);?>'
    },

    commit: true, // Show a 'Pay Now' button

    payment: function(data, actions) {
      return actions.payment.create({
        payment: {
          transactions: [
            {
              amount: { total: '<?php echo sanitize($amount_to_pay);?>', currency: '<?php echo sanitize($paypal[0]->currency);?>' }
            }
          ]
        }
      });
    },

    onAuthorize: function(data, actions) {
      // executes the payment
      return actions.payment.execute().then(function() {
        // PASSING TO CONTROLLER FOR CHECKING
        var redirectUrl = '<?php echo site_url('checkout/paypal_payment/'.$amount_to_pay.'/'.$address_number);?>'+'/'+data.paymentID+'/'+data.paymentToken+'/'+data.payerID;
        $('#loader_modal').fadeIn(50);
        window.location = redirectUrl;
      });
    }

  }, '#paypal-button');


  // CHECK IF PAYPAL IS ACTIVE OR NOT.
  $(document).ready(function() {
  let paypalActivity = '<?php echo sanitize($paypal[0]->active);?>';
  if(parseInt(paypalActivity) != 1){
    var redirectUrl = '<?php echo site_url('cart');?>';
      window.location = redirectUrl;
  }
});
</script>