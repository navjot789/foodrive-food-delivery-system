<!-- Content Header (Page header) -->
<?php include  'header.php'; ?>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <form class="" action="<?php echo site_url('restaurant/store') ?>" method="post">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo get_phrase('basic_information'); ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="restaurant_name"><?php echo get_phrase("restaurant_name"); ?></label>
                                <input type="text" class="form-control" id="restaurant_name" name="restaurant_name" placeholder="<?php echo get_phrase("enter_restaurant_name"); ?>" required>
                            </div>
                            <div class="form-group">
                                <label><?php echo get_phrase("cuisine"); ?></label> <small class="float-right"><a href="<?php echo site_url('cuisine/create'); ?>"><?php echo get_phrase("create_new_cuisine"); ?></a></small>
                                <select class="form-control select2" name="cuisine[]" multiple="multiple" data-placeholder="<?php echo get_phrase("choose_cuisines"); ?>" required>
                                    <?php foreach ($cuisines as $cuisine) : ?>
                                        <option value="<?php echo sanitize($cuisine['id']); ?>"><?php echo sanitize($cuisine['name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="restaurant_about"><?php echo get_phrase("restaurant_about"); ?></label>
                                <textarea  class="form-control" id="restaurant_about" name="restaurant_about" placeholder="<?php echo get_phrase("something about your restaurant..."); ?>"  required></textarea>
                            </div>
                            <button class="btn btn-primary"><?php echo get_phrase('submit'); ?></button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--/. container-fluid -->
</section>
