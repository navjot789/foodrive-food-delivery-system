<div class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="mt-1 text-dark"><?php echo ucwords($page_title); ?></h4>
                    </div>
                    <div class="col-6">
                        <?php if ($page_name == 'cuisine/index') : ?>
                            <a href="<?php echo site_url('cuisine/create'); ?>" class="btn btn-outline-primary btn-rounded float-right" name="button"><?php echo get_phrase("add_new_cuisine", true); ?></a>
                        <?php elseif ($page_name == 'cuisine/create' || $page_name == 'cuisine/edit') : ?>
                            <a href="<?php echo site_url('cuisine'); ?>" class="btn btn-outline-primary btn-rounded float-right" name="button"><?php echo get_phrase("back_to_cuisine", true); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>