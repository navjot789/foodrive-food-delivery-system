<div class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="m-0 text-dark"><?php echo ucwords($page_title); ?></h4>
                    </div>
                    <div class="col-lg-6">
                        <?php if ($page_name == 'restaurant/index') : ?>
                            <a href="<?php echo site_url('restaurant/create'); ?>" class="btn btn-outline-primary btn-rounded float-right" name="button"><?php echo get_phrase("create_restaurant", true); ?></a>
                        <?php elseif ($page_name == 'restaurant/create') : ?>
                            <a href="<?php echo site_url('restaurant'); ?>" class="btn btn-outline-primary btn-rounded float-right" name="button"><?php echo get_phrase("back_to_restaurants", true); ?></a>
                        <?php elseif ($page_name == 'restaurant/edit') : ?>
                            <a href="<?php echo site_url('restaurant'); ?>" class="btn btn-outline-primary btn-rounded float-right" name="button"><?php echo get_phrase("back_to_restaurants", true); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>