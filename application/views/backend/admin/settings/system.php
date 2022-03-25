<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('system_info', true); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('settings/update'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="settings_type" value="system">
                            <div class="form-group">
                                <label for="purchase_code"><?php echo get_phrase("purchase_code"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="purchase_code" class="form-control" name="purchase_code" placeholder="<?php echo get_phrase("enter_purchase_code"); ?>" value="<?php echo sanitize(get_system_settings('purchase_code')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="system_name"><?php echo get_phrase("system_name"); ?></label>
                                <input type="text" id="system_name" class="form-control" name="system_name" placeholder="<?php echo get_phrase("enter_system_name"); ?>" value="<?php echo sanitize(get_system_settings('system_name')); ?>" >
                            </div>
                            <div class="form-group">
                                <label for="system_title"><?php echo get_phrase("system_title"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="system_title" class="form-control" name="system_title" placeholder="<?php echo get_phrase("enter_system_title"); ?>" value="<?php echo sanitize(get_system_settings('system_title')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="system_email"><?php echo get_phrase("system_email"); ?><span class="text-danger">*</span></label>
                                <input type="email" id="system_email" class="form-control" name="system_email" placeholder="<?php echo get_phrase("enter_system_email"); ?>" value="<?php echo sanitize(get_system_settings('system_email')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="address"><?php echo get_phrase("address"); ?></label>
                                <textarea name="address" rows="5" class="form-control" placeholder="<?php echo get_phrase('enter_address'); ?>"><?php echo sanitize(get_system_settings('address')); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="phone"><?php echo get_phrase("phone"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="phone" class="form-control" name="phone" placeholder="<?php echo get_phrase("enter_phone"); ?>" value="<?php echo sanitize(get_system_settings('phone')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="website_keywords"><?php echo get_phrase("website_keywords"); ?></label>
                                <input type="text" id="website_keywords" name="website_keywords" class="tagged form-control" data-removeBtn="true" value="<?php echo sanitize(get_system_settings('website_keywords')); ?>" placeholder="<?php echo get_phrase("enter_tags_and_press_enter"); ?>">
                            </div>
                            <div class="form-group">
                                <label for="website_description"><?php echo get_phrase("website_description"); ?></label>
                                <textarea name="website_description" rows="5" class="form-control" placeholder="<?php echo get_phrase('enter_website_description'); ?>"><?php echo sanitize(get_system_settings('website_description')); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label id="timezone"><?php echo get_phrase("choose_your_timezone"); ?><span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" id="timezone" name="timezone" required>
                                    <?php $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
                                    foreach ($tzlist as $tz) : ?>
                                        <option value="<?php echo sanitize($tz); ?>" <?php if (get_system_settings('timezone') == sanitize($tz)) echo 'selected'; ?>><?php echo sanitize($tz); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="author"><?php echo get_phrase("author"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="author" class="form-control" name="author" placeholder="<?php echo get_phrase("enter_author"); ?>" value="<?php echo sanitize(get_system_settings('author')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="footer_text"><?php echo get_phrase("footer_text"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="footer_text" class="form-control" name="footer_text" placeholder="<?php echo get_phrase("enter_footer_text"); ?>" value="<?php echo sanitize(get_system_settings('footer_text')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="footer_link"><?php echo get_phrase("footer_link"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="footer_link" class="form-control" name="footer_link" placeholder="<?php echo get_phrase("enter_footer_link"); ?>" value="<?php echo sanitize(get_system_settings('footer_link')); ?>" required>
                            </div>
                            <button class="btn btn-primary"><?php echo get_phrase('update_system_settings', true); ?></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('Phone_validation_api', true); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('settings/update'); ?>" method="post">
                             <input type="hidden" name="settings_type" value="phone_validation_api">
                            <p>Get new phone validation API from <a href="https://app.abstractapi.com/api/phone-validation/" target="blank">here</a>
                              <br><strong>Temporary mail: <a href="https://temp-mail.org/en/" target="blank">Mail</a></strong>
                              <br><strong>Monthly Quota: 250 hits</strong> 
                             
                          </p>
                            <div class="form-group">
                                <label for="Phone_validation_api"><?php echo get_phrase('API_KEY', true); ?><span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="Phone_validation_api" name="Phone_validation_api" placeholder="API KEY" value="<?php echo get_system_settings('phone_validation'); ?>" required>
                            </div>
                            <button class="btn btn-primary"><?php echo get_phrase('update', true); ?></button>
                        </form>
                    </div>
                </div>
 
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('Disable_inspect_elements', true); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('settings/update'); ?>" method="post">
                             <input type="hidden" name="settings_type" value="inspect_elements">
                            <p> Disable all inspect elements throughout the entire website including backend. </p>
                            <div class="form-group">
                                <?php  $elements = get_system_settings('inspect_elements');?>
                                <label for="elements">Select list:</label>
                                <select class="form-control" id="elements" name="elements">
                                    <option value="true" <?php echo ($elements=='true') ? 'selected':'';?>>True</option>
                                    <option value="false" <?php echo ($elements=='false') ? 'selected':'';?>>False</option>
                                </select>
                                
                            </div>
                            <button class="btn btn-primary"><?php echo get_phrase('update', true); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
