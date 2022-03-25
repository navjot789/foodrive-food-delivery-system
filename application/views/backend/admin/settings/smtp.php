<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('smtp_info', true); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('settings/update'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="settings_type" value="smtp">
                            <div class="form-group">
                                <label id="sender"><?php echo get_phrase("sender"); ?><span class="text-danger">*</span></label>
                                <select class="form-control select2 w-100" id="sender" name="sender" required>
                                    <option value="php_mailer" <?php if (sanitize(get_smtp_settings('sender')) == "php_mailer") echo "selected"; ?>><?php echo get_phrase('php_mailer'); ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="protocol"><?php echo get_phrase("protocol"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="protocol" class="form-control" name="protocol" placeholder="<?php echo get_phrase("smtp_protocol"); ?>" value="<?php echo sanitize(get_smtp_settings('protocol')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="host"><?php echo get_phrase("host"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="host" class="form-control" name="host" placeholder="<?php echo get_phrase("smtp_host"); ?>" value="<?php echo sanitize(get_smtp_settings('host')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="port"><?php echo get_phrase("port"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="port" class="form-control" name="port" placeholder="<?php echo get_phrase("smtp_port"); ?>" value="<?php echo sanitize(get_smtp_settings('port')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username"><?php echo get_phrase("username"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="username" class="form-control" name="username" placeholder="<?php echo get_phrase("smtp_username"); ?>" value="<?php echo sanitize(get_smtp_settings('username')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password"><?php echo get_phrase("password"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="password" class="form-control" name="password" placeholder="<?php echo get_phrase("smtp_password"); ?>" value="<?php echo sanitize(get_smtp_settings('password')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="security"><?php echo get_phrase("security"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="security" class="form-control" name="security" placeholder="<?php echo get_phrase("smtp_security"); ?>" value="<?php echo sanitize(get_smtp_settings('security')); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="from"><?php echo get_phrase("from"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="from" class="form-control" name="from" placeholder="<?php echo get_phrase("smtp_from"); ?>" value="<?php echo sanitize(get_smtp_settings('from')); ?>" required>
                            </div>
                            <button class="btn btn-primary"><?php echo get_phrase('update_smtp_settings', true); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
