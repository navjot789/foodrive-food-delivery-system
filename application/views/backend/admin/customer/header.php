<div class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="mt-1 text-dark"><?php echo ucwords($page_title); ?></h4>
                    </div>
                    <div class="col-6">
                        <?php if ($page_name == 'customer/index') : ?>
                            <a href="<?php echo site_url('customer/create'); ?>" class="btn btn-outline-primary btn-rounded float-right" name="button"><?php echo get_phrase("add_new_customer", true); ?></a>
                        <?php elseif ($page_name == 'customer/create' || $page_name == 'customer/edit' || $page_name == 'customer/profile') : ?>
                            <a href="<?php echo site_url('customer'); ?>" class="btn btn-outline-primary btn-rounded float-right" name="button"><?php echo get_phrase("back_to_customer", true); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>