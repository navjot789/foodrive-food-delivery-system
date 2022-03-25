<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('update_user_info', true); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('settings/update'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="settings_type" value="profile">
                            <input type="hidden" name="updater" value="profile">
                            <div class="form-group">
                                <label for="name"><?php echo get_phrase("name"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="<?php echo get_phrase("enter_full_name"); ?>" value="<?php echo sanitize($user_info['name']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email"><?php echo get_phrase("email"); ?><span class="text-danger">*</span></label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="<?php echo get_phrase("enter_valid_email"); ?>" value="<?php echo sanitize($user_info['email']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="phone"><?php echo get_phrase("phone"); ?><span class="text-danger">*</span></label>
                                <input type="text" id="phone" class="form-control" name="phone" placeholder="<?php echo get_phrase("enter_your_phone_number"); ?>" value="<?php echo sanitize($user_info['phone']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="user_image"><?php echo get_phrase("user_image"); ?> <span class="badge badge-default">(500 X 500)</span></label>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' class="imageUploadPreview" id="user_image" name="user_image" accept=".png, .jpg, .jpeg" />
                                        <label for="user_image"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="user_image_preview" thumbnail="<?php echo base_url('uploads/user/' . sanitize($user_info['thumbnail'])); ?>"></div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary"><?php echo get_phrase('update_user_profile', true); ?></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('update_password', true); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('settings/update'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="settings_type" value="profile">
                            <input type="hidden" name="updater" value="password">
                            <div class="form-group">
                                <label for="current_password"><?php echo get_phrase("current_password"); ?><span class="text-danger">*</span></label>
                                <input type="password" id="current_password" class="form-control" name="current_password" placeholder="<?php echo get_phrase("enter_your_current_password"); ?>" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password"><?php echo get_phrase("new_password"); ?><span class="text-danger">*</span></label>
                                <input type="password" id="new_password" class="form-control" name="new_password" placeholder="<?php echo get_phrase("enter_your_new_password"); ?>" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password"><?php echo get_phrase("confirm_password"); ?><span class="text-danger">*</span></label>
                                <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="<?php echo get_phrase("confirm_password"); ?>" value="" required>
                            </div>
                            <button class="btn btn-primary"><?php echo get_phrase('update_your_password', true); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>