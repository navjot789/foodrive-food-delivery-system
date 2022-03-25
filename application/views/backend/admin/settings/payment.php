<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- /.content-header -->
<?php
  $cod_keys = get_payment_settings('cash_on_delivery');
  $cod = json_decode($cod_keys);

  $cdod_keys = get_payment_settings('credit_debit_on_delivery');
  $cdod = json_decode($cdod_keys);

  $paypal_keys = get_payment_settings('paypal');
  $paypal = json_decode($paypal_keys);
  
  $stripe_keys = get_payment_settings('stripe');
  $stripe = json_decode($stripe_keys);
?>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <!-- SYSTEM PAYMENT SETTINGS -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('payment_info', true); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('payment/update'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="settings_type" value="payment">
                            <input type="hidden" name="payment_type" value="system">
                            <div class="form-group">
                                <label id="system_currency"><?php echo get_phrase("choose_system_currency"); ?><span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" id="system_currency" name="system_currency" required>
                                    <option value=""><?php echo get_phrase('select_system_currency'); ?></option>
                                    <?php foreach ($currencies as $currency) : ?>
                                        <option value="<?php echo sanitize($currency['code']); ?>" <?php if (get_system_settings('system_currency') == sanitize($currency['code'])) echo 'selected'; ?>> <?php echo sanitize($currency['code']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label id="currency_position"><?php echo get_phrase("currency_position"); ?><span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" id="currency_position" name="currency_position" required>
                                    <option value="left" <?php if (sanitize(get_system_settings('currency_position')) == 'left') echo 'selected'; ?>><?php echo get_phrase('left'); ?></option>
                                    <option value="right" <?php if (sanitize(get_system_settings('currency_position')) == 'right') echo 'selected'; ?>><?php echo get_phrase('right'); ?></option>
                                    <option value="left-space" <?php if (sanitize(get_system_settings('currency_position')) == 'left-space') echo 'selected'; ?>><?php echo get_phrase('left_with_a_space'); ?></option>
                                    <option value="right-space" <?php if (sanitize(get_system_settings('currency_position')) == 'right-space') echo 'selected'; ?>><?php echo get_phrase('right_with_a_space'); ?></option>
                                </select>
                            </div>
                            <button class="btn btn-primary"><?php echo get_phrase('update_system_settings', true); ?></button>
                        </form>
                    </div>
                </div>
                
                <!-- CASH ON DELIVERY SETTINGS -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('cash_on_delivery_info', true); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('payment/update'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="settings_type" value="payment">
                            <input type="hidden" name="payment_type" value="cod">
                            <div class="form-group">
                                <label id="cod_active"><?php echo get_phrase("active"); ?><span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" id="cod_active" name="active" required>
                                    <option value="1" <?php if($cod[0]->active == 1) echo "selected";?>><?php echo get_phrase('yes'); ?></option>
                                    <option value="0" <?php if($cod[0]->active == 0) echo "selected";?>><?php echo get_phrase('no'); ?></option>
                                </select>
                            </div>
                            <button class="btn btn-primary"><?php echo get_phrase('update_cash_on_delivery_settings', true); ?></button>
                        </form>
                    </div>
                </div>

                 <!-- CREDIT/DEBIT ON DELIVERY SETTINGS -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('credit/debit_on_delivery_info', true); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('payment/update'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="settings_type" value="payment">
                            <input type="hidden" name="payment_type" value="cdod">
                            <div class="form-group">
                                <label id="cdod_active"><?php echo get_phrase("active"); ?><span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" id="cdod_active" name="active" required>
                                    <option value="1" <?php if($cdod[0]->active == 1) echo "selected";?>><?php echo get_phrase('yes'); ?></option>
                                    <option value="0" <?php if($cdod[0]->active == 0) echo "selected";?>><?php echo get_phrase('no'); ?></option>
                                </select>
                            </div>
                            <button class="btn btn-primary"><?php echo get_phrase('update_credit/debit_on_delivery_settings', true); ?></button>
                        </form>
                    </div>
                </div>

                <!-- PAYPAL PAYMENT SETTINGS -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('paypal_info', true); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('payment/update'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="settings_type" value="payment">
                            <input type="hidden" name="payment_type" value="paypal">
                            <div class="form-group">
                                <label for="paypal_active"><?php echo get_phrase("active"); ?><span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" id="paypal_active" name="active" required>
                                    <option value="1" <?php if($paypal[0]->active == 1) echo "selected";?>><?php echo get_phrase('yes'); ?></option>
                                    <option value="0" <?php if($paypal[0]->active == 0) echo "selected";?>><?php echo get_phrase('no'); ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mode"><?php echo get_phrase("mode"); ?><span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" id="mode" name="mode" required>
                                    <option value="sandbox" <?php if($paypal[0]->mode == "sandbox") echo "selected";?>><?php echo get_phrase('sandbox'); ?></option>
                                    <option value="production" <?php if($paypal[0]->mode == "production") echo "selected";?>><?php echo get_phrase('production'); ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="paypal_currency"><?php echo get_phrase("choose_paypal_currency"); ?><span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" id="paypal_currency" name="paypal_currency" required>
                                    <option value=""><?php echo get_phrase('select_paypal_currency'); ?></option>
                                    <?php foreach ($paypal_currencies as $paypal_currency) : ?>
                                        <option value="<?php echo sanitize($paypal_currency['code']); ?>" <?php if ($paypal[0]->currency == sanitize($paypal_currency['code'])) echo 'selected'; ?>> <?php echo sanitize($paypal_currency['code']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sandbox_client_id"><?php echo get_phrase("sandbox_client_id"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="sandbox_client_id" class="form-control" name="sandbox_client_id" placeholder="<?php echo get_phrase("sandbox_client_id", true); ?>" value="<?php echo sanitize($paypal[0]->sandbox_client_id); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="sandbox_secret_key"><?php echo get_phrase("sandbox_secret_key"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="sandbox_secret_key" class="form-control" name="sandbox_secret_key" placeholder="<?php echo get_phrase("sandbox_secret_key", true); ?>" value="<?php echo sanitize($paypal[0]->sandbox_secret_key); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="production_client_id"><?php echo get_phrase("production_client_id"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="production_client_id" class="form-control" name="production_client_id" placeholder="<?php echo get_phrase("production_client_id", true); ?>" value="<?php echo sanitize($paypal[0]->production_client_id); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="production_secret_key"><?php echo get_phrase("production_secret_key"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="production_secret_key" class="form-control" name="production_secret_key" placeholder="<?php echo get_phrase("production_secret_key", true); ?>" value="<?php echo sanitize($paypal[0]->production_secret_key); ?>" required>
                            </div>
                            <button class="btn btn-primary"><?php echo get_phrase('update_paypal_settings', true); ?></button>
                        </form>
                    </div>
                </div>

                <!-- STRIPE PAYMENT SETTINGS -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('stripe_info', true); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('payment/update'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="settings_type" value="payment">
                            <input type="hidden" name="payment_type" value="stripe">
                            <div class="form-group">
                                <label for="stripe_active"><?php echo get_phrase("active"); ?><span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" id="stripe_active" name="active" required>
                                    <option value="1" <?php if($stripe[0]->active == 1) echo "selected";?>><?php echo get_phrase('yes'); ?></option>
                                    <option value="0" <?php if($stripe[0]->active == 0) echo "selected";?>><?php echo get_phrase('no'); ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="test_mode"><?php echo get_phrase("test_mode"); ?><span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" id="test_mode" name="test_mode" required>
                                    <option value="on" <?php if($stripe[0]->testmode == "on") echo "selected";?>><?php echo get_phrase('on'); ?></option>
                                    <option value="off" <?php if($stripe[0]->testmode == "off") echo "selected";?>><?php echo get_phrase('off'); ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label id="stripe_currency"><?php echo get_phrase("choose_stripe_currency"); ?><span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" id="stripe_currency" name="stripe_currency" required>
                                    <option value=""><?php echo get_phrase('select_stripe_currency'); ?></option>
                                    <?php foreach ($stripe_currencies as $stripe_currency) : ?>
                                        <option value="<?php echo sanitize($stripe_currency['code']); ?>" <?php if ($stripe[0]->currency == sanitize($stripe_currency['code'])) echo 'selected'; ?>> <?php echo sanitize($stripe_currency['code']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="test_public_key"><?php echo get_phrase("test_public_key"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="test_public_key" class="form-control" name="test_public_key" placeholder="<?php echo get_phrase("test_public_key", true); ?>" value="<?php echo sanitize($stripe[0]->public_key); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="test_secret_key"><?php echo get_phrase("test_secret_key"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="test_secret_key" class="form-control" name="test_secret_key" placeholder="<?php echo get_phrase("test_secret_key", true); ?>" value="<?php echo sanitize($stripe[0]->secret_key); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="live_public_key"><?php echo get_phrase("live_public_key"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="live_public_key" class="form-control" name="live_public_key" placeholder="<?php echo get_phrase("live_public_key", true); ?>" value="<?php echo sanitize($stripe[0]->public_live_key); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="live_secret_key"><?php echo get_phrase("live_secret_key"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="live_secret_key" class="form-control" name="live_secret_key" placeholder="<?php echo get_phrase("live_secret_key", true); ?>" value="<?php echo sanitize($stripe[0]->secret_live_key); ?>" required>
                            </div>
                            <button class="btn btn-primary"><?php echo get_phrase('update_stripe_settings', true); ?></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="alert alert-info alert-dismissible fade show lighten-info" role="alert">
                    <strong><?php echo get_phrase('heads_up'); ?>!</strong>
                    <p>
                    <?php echo get_phrase('make_sure_that_system_currency_and_payment_gateway_currencies_are_same'); ?>. <?php echo get_phrase('otherwise_it_will_create_inconsistency'); ?>.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
