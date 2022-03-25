<!-- Content Header (Page header) -->
<?php include  'header.php'; ?>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('driver_registration_form', true); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?php echo site_url('driver/store'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name"><?php echo get_phrase("name"); ?><span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo get_phrase("enter_name"); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email"><?php echo get_phrase("email"); ?><span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo get_phrase("enter_valid_email"); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="password"><?php echo get_phrase("password"); ?><span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo get_phrase("enter_password"); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="phone"><?php echo get_phrase("phone"); ?><span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo get_phrase("enter_phone"); ?>" required maxlength="10">
                            </div>

                            <div class="form-group">
                                <label for="vehicle_type"><?php echo get_phrase("vehicle_type"); ?></label>
                                <select class="form-control select2" name="vehicle_type">
                                    <option value=""><?php echo get_phrase("choose_vehicle_type"); ?></option>
                                    <option value="bicycle"><?php echo get_phrase('bicycle'); ?></option>
                                    <option value="tricycle"><?php echo get_phrase('tricycle'); ?></option>
                                    <option value="scooters"><?php echo get_phrase('scooters'); ?></option>
                                    <option value="motorcycle"><?php echo get_phrase('motorcycle'); ?></option>
                                    <option value="van"><?php echo get_phrase('van'); ?></option>
                                    <option value="car"><?php echo get_phrase('car'); ?></option>
                                    <option value="pick_up"><?php echo get_phrase('pick_up'); ?></option>
                                    <option value="others"><?php echo get_phrase('others'); ?></option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="address"><?php echo get_phrase("address"); ?></label>
                                <textarea name="address" class="form-control" id="address" rows="2" placeholder="<?php echo get_phrase('enter_full_address'); ?>."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image"><?php echo get_phrase("image"); ?></label>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' class="imageUploadPreview" id="image" name="image" accept=".png, .jpg, .jpeg" />
                                        <label for="image"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="image_preview" thumbnail="<?php echo base_url('uploads/user/placeholder.png'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" name="button"><?php echo get_phrase("submit"); ?></button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>