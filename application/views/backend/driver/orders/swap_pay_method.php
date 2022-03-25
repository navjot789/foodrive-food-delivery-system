<?php  $payment_data = $this->payment_model->get_payment_data_by_order_code(sanitize($param2));?>

<form action="<?php echo site_url('payment/swap_payment_method'); ?>" method="post" >
    <input type="hidden" name="code" value="<?php echo sanitize($param2); ?>">
    <div class="form-group">
      <label for="sel1">Swap Payment Method:</label>
    <select class="form-control" id="method" name="method">
        <option value="cash_on_delivery" <?php echo ($payment_data['payment_method']=='cash_on_delivery') ? 'selected':''; ?>>Cash On Delivery</option>
        <option value="credit_debit" <?php echo ($payment_data['payment_method']=='credit_debit') ? 'selected':''; ?>>Credit / Debit</option>
    </select>
    </div>

    <button type="submit" class="btn btn-success float-right"><?php echo get_phrase('Swap pay method'); ?></button>
</form>