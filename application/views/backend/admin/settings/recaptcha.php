<!-- Content Header -->
<?php include 'header.php'; ?>

<!-- Main Conten -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="alert alert-info lighten-info" role="alert">
                    <h5 class="alert-heading"><i class="icon fas fa-exclamation-triangle"></i> <?php echo get_phrase('help'); ?></h5>
                    <p>
                        <?php echo get_phrase('you_can_get_your_own_keys_from'); ?> <a href="https://www.google.com/recaptcha/admin/create" class="text-primary" target="_blank"><?php echo strtolower(get_phrase('here')); ?></a>.
                    </p>
                </div>
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo "ReCaptcha " . get_phrase('settings'); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('settings/update'); ?>" method="post">
                            <input type="hidden" name="settings_type" value="recaptcha">
                            <div class="form-group">
                                <label for="recaptcha_sitekey"><?php echo "ReCaptcha " . get_phrase("sitekey"); ?> <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" id="recaptcha_sitekey" class="form-control" name="recaptcha_sitekey" placeholder="<?php echo get_phrase("enter_recaptcha_sitekey"); ?>" value="<?php echo sanitize(get_system_settings('recaptcha_sitekey')); ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recaptcha_secretkey"><?php echo "ReCaptcha " . get_phrase("secretkey"); ?> <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" id="recaptcha_secretkey" class="form-control" name="recaptcha_secretkey" placeholder="<?php echo get_phrase("enter_recaptcha_secretkey"); ?>" value="<?php echo sanitize(get_system_settings('recaptcha_secretkey')); ?>" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                 <p><strong>
                                    <?php echo get_phrase('you_can_get_your_own_GMAP_key__from'); ?> <a href="https://console.cloud.google.com/google/maps-apis/api-list" class="text-primary" target="_blank"><?php echo strtolower(get_phrase('here')); ?></a>.
                                </strong>
                                <br>
                               
                                    <strong>Khana Gmap Paid key: </strong><span class="text-success">AIzaSyAHmGT1kzyIK8bgc7Mqrn2bpaIQ-IlUTtE</span><br>
                                    <strong>Spyce Gmap Paid key: </strong><span class="text-success">AIzaSyA6FFVGq29kQZws-OzhuCYwcSdirU3tjWI</span>
                                </p>
                            </div>

                             <div class="form-group">
                                <label for="gmap_api_key"><?php echo "Google Maps All in one " . get_phrase("API"); ?> </label>
                                <div class="input-group mb-3">
                                    <input type="text" id="gmap_api_key" class="form-control" name="gmap_api_key" placeholder="<?php echo get_phrase("enter_GMap_api_key"); ?>" value="<?php echo sanitize(get_system_settings('gmap_api_key')); ?>" >
                                </div>
                            </div>

                            <button class="btn btn-primary"><?php echo get_phrase('update') ." ". get_phrase('settings'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
