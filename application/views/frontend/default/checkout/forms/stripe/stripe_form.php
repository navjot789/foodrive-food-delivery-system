<?php
	// Stripe API configuration
    $stripe_keys = get_payment_settings('stripe');
    $values = json_decode($stripe_keys);
    if ($values[0]->testmode == 'on') {
        $public_key = $values[0]->public_key;
        $private_key = $values[0]->secret_key;
    } else {
        $public_key = $values[0]->public_live_key;
        $private_key = $values[0]->secret_live_key;
    }

	define('STRIPE_API_KEY', $private_key);
	define('STRIPE_PUBLISHABLE_KEY', $public_key);
?>

<?php  
        //SETTING TIP INTO SESSION THROUGHOUT CHECKOUT
        //initilizing TIP
       $session_custom_tip = $this->checkout_model->tip_handler($type, $custom_tip);   
       $tip = !empty($this->session->userdata('custom_tip')) ? sanitize($this->session->userdata('custom_tip')) : '';
        
?>
       
      
<div id="pay-with-stripe-form-structure">
    <div id="stripePaymentResponse" class="text-danger"></div>
    <!--tipping-->
    <?php if (!empty($tip)): ?>
         <div class="d-flex justify-content-between mt-2" > 
                <span class="fw-500"><?php echo site_phrase('tip_for_your_foodriver'); ?>
                <button class="btn text-danger btn-sm" id="clear-tip" ><i class="fas fa-times-circle" ></i></button> </span> 
                <span class="text-success"><strong class ="tip-responce"><?php echo currency(format($tip)); ?></strong></span>      
        </div>
    <?php endif; ?>
    <hr>
     <!--GT-->
         <div class="d-flex justify-content-between mt-2"> 
            <span class="fw-500"><?php echo site_phrase('grand_total'); ?> </span> 
            <span class="text-success"><strong id="grand-total">     <?php echo currency(sanitize($this->cart_model->display_grand_total())); ?></strong></span> 
        </div>

   <div class="form-group">
        <label><strong>Any delivery instructions?</strong></label>
        <textarea class="form-control" id="stripe_driver_info"  rows="3" placeholder="Describe here..."><?php echo sanitize($this->session->userdata('delivery_info')); ?></textarea>
      </div>


    <!-- Buy button -->
    <div id="buynow" class="featured-btn-wrap text-right mt-3">
        <button type="submit" class="btn btn-danger btn-sm pl-5 pr-5 pt-2 pb-2" id="pay-with-stripe-form"><?php echo get_phrase("pay_with_stripe"); ?></button>
    </div>

</div>
<?php include APPPATH . "views/frontend/default/checkout/scripts/stripe-script.php"; ?>

<!--Stripe API-->
<script>
var buyBtn = document.getElementById('pay-with-stripe-form');
var responseContainer = document.getElementById('stripePaymentResponse');

// Create a Checkout Session with the selected product
var createCheckoutSession = function (stripe) {
       
        return fetch("<?= site_url('checkout/pay_with_stripe'); ?>", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            checkoutSession: 1,
            info: document.getElementById('stripe_driver_info').value
        }),
    }).then(function (result) {
        return result.json();
    });
};

// Handle any errors returned from Checkout
var handleResult = function (result) {
    if (result.error) {
        responseContainer.innerHTML = '<p>'+result.error.message+'</p>';
    }
    buyBtn.disabled = false;
    buyBtn.textContent = 'Buy Now';
};

// Specify Stripe publishable key to initialize Stripe.js
var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

buyBtn.addEventListener("click", function (evt) {
    buyBtn.disabled = true;
    buyBtn.textContent = '<?php echo get_phrase("please_wait"); ?>...';

    createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);
        }else{
            handleResult(data);
        }
    });
});

//FIRING AJAX ON CLEAR TIP
 $("#clear-tip").click(function(e) {
    e.preventDefault();

           $.ajax({ 
                type:'GET',
                url: "<?php echo site_url('checkout/clear_tip');?>",
                success: function(result) {
                    if (result) {
                             localStorage.setItem('remainonpage', '1');
                             window.location.reload();
                      }
                },
               error: function(result) {
                alert('error');
                window.location.reload();
               }
            });
  
});
</script>
