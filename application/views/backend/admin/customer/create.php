<!-- Content Header (Page header) -->
<?php include  'header.php'; ?>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <!-- Custom Tabs -->
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#basic" data-toggle="tab"><?php echo get_phrase('basic'); ?></a></li>
                  
                    <li class="nav-item"><a class="nav-link" href="#finish" data-toggle="tab"><?php echo get_phrase('finish'); ?></a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <form action="<?php echo site_url('customer/store'); ?>" method="post" enctype="multipart/form-data">
                    <div class="tab-content">
                        <div class="tab-pane active" id="basic">
                            <div class="row">
                                <div class="col-lg-6">
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
                                </div>
                            </div>
                        </div>
                     
                        <div class="tab-pane" id="finish">
                            <div class="row justify-content-center">
                                <div class="col text-center">
                                    <h1 class="my-3 text-primary"><i class="far fa-smile"></i></h1>
                                    <h3 class="my-3 "><?php echo get_phrase('thank_you', true); ?>!</h3>
                                    <h5 class="font-weight-light"><?php echo get_phrase('you_are_just_one_click_away'); ?>...</h5>
                                    <button type="submit" class="btn btn-primary mt-5"><?php echo get_phrase('save_customer'); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.card-body -->
        </div>
        <!-- ./card -->
    </div>
    <!--/. container-fluid -->
</section>
