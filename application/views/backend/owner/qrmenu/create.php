<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="alert alert-info lighten-info alert-dismissible">
                    <i class="icon fas fa-exclamation-triangle"></i> <strong><?php echo get_phrase('heads_up'); ?></strong>!
                    <?php echo get_phrase('we_would_suggest_to_use_some_dark_color_for_better_result'); ?>.
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo "QR ".get_phrase('menu_builder_form', true); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="restaurant_id"><?php echo get_phrase("restaurant"); ?> <span class="text-danger">*</span></label> <small class="float-right"><a href="<?php echo site_url('restaurant/create'); ?>"><?php echo get_phrase("create_new_restaurant"); ?></a></small>
                                <select class="form-control select2 w-100" id="restaurant_id" name="restaurant_id">
                                    <option value=""><?php echo get_phrase("choose_restaurant"); ?></option>
                                    <?php foreach ($restaurants as $restaurant) : ?>
                                        <option value="<?php echo sanitize($restaurant['id']); ?>"><?php echo sanitize($restaurant['name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foreground_color"><?php echo get_phrase("foreground_color"); ?></label>
                                <div class="picker">
                                    <input type="color" value="#424242">
                                    <input type="text" id="foreground_color" class="form-control foreground_color" name="foreground_color" value="#424242" readonly>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="generateQrCode()"><?php echo get_phrase('generate')." QR ".get_phrase('code'); ?></button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('generated_qr_code', true); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="qr-menu-preview">
                            <img src="<?php echo sanitize(base_url('assets/backend/img/loader.gif')); ?>" id="qr-menu-preview-preloader" class="hidden" alt="">
                            <img src="<?php echo sanitize(base_url('uploads/qrcode/placeholder.png')); ?>" id="qr-menu-preview" alt="">
                        </div>
                        <div class="text-center hidden" id="qr-code-actions">
                            <a href="" id="download-qrcode-btn" type="button" class="btn btn-primary"><?php echo get_phrase('download')." QR ".get_phrase('code'); ?></a>
                            <a href="" id="delete-qrcode-btn" type="button" class="btn btn-danger"><?php echo get_phrase('delete')." QR ".get_phrase('code'); ?></a>
                            <div class="text-left"> <strong>N.B :</strong> <?php echo get_phrase("after_downloading_the_code_you_can_delete_it_for_saving_your_server_storage"); ?></div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
