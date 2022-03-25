<!-- Content Header (Page header) -->
<?php include  'header.php'; ?>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="alert alert-info lighten-info alert-dismissible">
                    <i class="icon fas fa-exclamation-triangle"></i> <strong><?php echo get_phrase('heads_up'); ?></strong>!
                    <?php echo get_phrase('you_can_add') . ' ' . (8 - count($this->cuisine_model->get_featured_cuisine())) . ' ' . get_phrase('more_cuisine_as_featured'); ?>.
                </div>
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
                                <label for="thumbnail"><?php echo get_phrase("thumbnail"); ?> (484 X 484)</label>
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

                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="is_featured" name="is_featured" value="featured">
                                <label for="is_featured" class="custom-control-label"><?php echo get_phrase('mark_as_featured'); ?></label>
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