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
                        <h3 class="card-title"><?php echo get_phrase('edit_form'); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?php echo site_url('category/update'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo sanitize($category['id']); ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="category_name"><?php echo get_phrase("category_name"); ?></label>
                                        <input type="text" id="category_name" class="form-control" name="category_name" placeholder="<?php echo get_phrase("enter_category_name"); ?>" value="<?php echo sanitize($category['name']); ?>">
                                    </div>
                                </div>
                            </div>

                         <?php  $gst = $this->taxation_model->get_all_gst();?>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="gst"><?php echo get_phrase("GST"); ?> <span class="text-danger">*</span> </label>
                                    <select class="form-control select2" name="gst" data-placeholder="<?php echo get_phrase("Enter Category GST %"); ?>">
                                    <option value="">Choose GST percentage</option>
                                        <?php foreach ($gst as $key => $row) : ?>
                                            <option value="<?php echo sanitize($row['gst']); ?>" <?php echo ($row['gst']  ==  $category['tax']) ? 'selected':''; ?>><?php echo sanitize($row['gst']); ?>%</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <?php  $pst = $this->taxation_model->get_all_pst();?>
                            <div class="col-md-6"> 
                             <div class="form-group">
                                    <label for="pst"><?php echo get_phrase("PST"); ?> <span class="text-danger">*</span> </label>
                                    <select class="form-control select2" name="pst" data-placeholder="<?php echo get_phrase("Enter Category PST %"); ?>">
                                    <option value="">Choose PST percentage</option>
                                        <?php foreach ($pst as $key => $row) : ?>
                                            <option value="<?php echo sanitize($row['pst']); ?>" <?php echo ($row['pst']  ==  $category['pst']) ? 'selected':''; ?>><?php echo sanitize($row['pst']); ?>%</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="index_order"><?php echo get_phrase("order"); ?></label>
                                    <input type="number" id="index_order" class="form-control" name="index_order" placeholder="<?php echo get_phrase("index_order"); ?>" value="">
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
                                        <div id="category_thumbnail_preview" thumbnail="<?php echo base_url('uploads/category/' . sanitize($category['thumbnail'])); ?>"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="is_featured" name="is_featured" value="featured" <?php if ($category['is_featured']) echo "checked"; ?>>
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
