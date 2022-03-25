<div class="content-header">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="mt-1 text-dark"><?php echo ucwords($page_title); ?></h4>
                    </div>
                    <div class="col-6">
                        <?php if ($report_type == 'details'): ?>
                            <a href="<?php echo site_url('report'); ?>" class="btn btn-outline-primary btn-rounded float-right"><?php echo get_phrase('back_to_list'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
