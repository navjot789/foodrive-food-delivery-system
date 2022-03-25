<?php if($cash_on_delivery_settings[0]->active):?>
<label for="cash-on-delivery">
    <div class="callout col-div-cod callout-primary shadow-sm rounded">
        <input type="radio" class="payment-gateway-radio" name="payment_gateway" value="cash_on_delivery" checked
            id="cash-on-delivery">
        <img src="<?php echo base_url('assets/payment/COD.png'); ?>" alt="cash-on-delivery">
    </div>
</label>
<?php endif;?>

<?php if($credit_debit_on_delivery_settings[0]->active):?>
<label for="credit-debit-on-delivery">
    <div class="callout col-div-cd shadow-sm rounded">
        <input type="radio" class="payment-gateway-radio" name="payment_gateway" value="credit_debit_on_delivery"
            id="credit-debit-on-delivery">
        <img src="<?php echo base_url('assets/payment/POS.png'); ?>" alt="credit-debit-on-delivery">
    </div>
</label>
<?php endif;?>

<?php if($paypal_settings[0]->active):?>
<label for="paypal">
    <div class="callout col-div-pypl shadow-sm rounded">
        <input type="radio" class="payment-gateway-radio" name="payment_gateway" value="paypal" id="paypal">
        <img src="<?php echo base_url('assets/payment/paypal.png'); ?>" alt="paypal">
    </div>
</label>
<?php endif;?>

<?php if($stripe_settings[0]->active):?>
<label for="stripe">
    <div class="callout col-div-st shadow-sm rounded">
        <input type="radio" class="payment-gateway-radio" name="payment_gateway" value="stripe" id="stripe">
        <img src="<?php echo base_url('assets/payment/stripe.png'); ?>" alt="stripe">
    </div>
</label>
<?php endif;?>