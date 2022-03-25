<!-- Content Header (Page header) -->
<?php include  'header.php'; ?>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="alert alert-info lighten-info alert-dismissible">
                    <i class="icon fas fa-exclamation-triangle"></i> <strong><?php echo get_phrase('heads_up'); ?></strong>!
                    <?php echo get_phrase('you_can_add') . ' ' . (8 - count($this->category_model->get_featured_categories())) . ' ' . get_phrase('more_categories_as_featured'); ?>.
                </div>
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('add_form'); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?php echo site_url('category/store'); ?>" method="post" enctype="multipart/form-data">
                            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category_name"><?php echo get_phrase("category_name"); ?></label>
                                    <input type="text" id="category_name" class="form-control" name="category_name" placeholder="<?php echo get_phrase("enter_category_name"); ?>" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category-per">Enter Category GST %</label><br>
                                    <div class="input-group mb-3">
                                        <input type="number" step="0.01" class="form-control" id="category-per" name="gst" placeholder="Enter Category GST %" value="0" min="0;" >
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label for="category-per-pst">Enter Category PST %</label><br>
                                    <div class="input-group mb-3">
                                        <input type="number" step="0.01" class="form-control" id="category-per-pst" name="pst" placeholder="Enter Category PST %" value="0" min="0;" >
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                           
                             

                      


                            <!-- CATEGORY THUMBNAIL -->
                            <div class="form-group">
                                <label for="category_thumbnail"><?php echo get_phrase("category_thumbnail"); ?> <span class="badge badge-default">(512 X 512)</span></label>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' class="imageUploadPreview" id="category_thumbnail" name="category_thumbnail" accept=".png, .jpg, .jpeg" />
                                        <label for="category_thumbnail"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="category_thumbnail_preview" thumbnail="<?php echo base_url('uploads/category/placeholder.png'); ?>"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="is_featured" name="is_featured" value="featured">
                                <label for="is_featured" class="custom-control-label"><?php echo get_phrase('mark_as_featured'); ?></label>
                            </div>
                            <br>
                            <button class="btn btn-primary"><?php echo get_phrase('save_category'); ?></button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
