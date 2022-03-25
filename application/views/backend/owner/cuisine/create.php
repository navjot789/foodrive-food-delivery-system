<!-- Content Header (Page header) -->
<?php include  'header.php'; ?>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('add_form'); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?php echo site_url('cuisine/store'); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="cuisine"><?php echo get_phrase("cuisine"); ?></label>
                                <input type="text" class="form-control" id="cuisine" name="cuisine" placeholder="<?php echo get_phrase("enter_cuisine"); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="thumbnail"><?php echo get_phrase("thumbnail"); ?></label>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' class="imageUploadPreview" id="cuisine_thumbnail" name="thumbnail" accept=".png, .jpg, .jpeg" />
                                        <label for="cuisine_thumbnail"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="cuisine_thumbnail_preview" thumbnail="<?php echo base_url('uploads/cuisine/placeholder.png'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

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