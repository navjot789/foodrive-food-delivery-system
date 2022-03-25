<!DOCTYPE html>
<html lang="en">
<head>
  <title>Paypal | <?php echo get_system_settings('system_name');?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include APPPATH . "views/frontend/default/checkout/styles/paypal-style.php"; ?>
  <title><?php echo htmlspecialchars($page_title); ?> | <?php echo sanitize(get_system_settings('system_title')); ?></title>
<link rel="shortcut icon" href="<?php echo base_url('uploads/system/' . get_website_settings('favicon')); ?>">
</head>
<body>
  <?php
  $paypal_keys = get_payment_settings('paypal');
  $paypal = json_decode($paypal_keys);
  ?>
  <!--required for getting the stripe token-->

  <div class="package-details">
    <strong><?php echo site_phrase('customer_name');?> | <?php echo sanitize($user_details['name']);?></strong> <br>
    <strong><?php echo site_phrase('amount_to_pay');?> | <?php echo currency(sanitize($amount_to_pay));?></strong> <br>
    <div id="paypal-button" class="margin-top-20"></div><br>
  </div>

  <?php include APPPATH . "views/frontend/default/checkout/scripts/paypal-script.php"; ?>

</body>
</html>
