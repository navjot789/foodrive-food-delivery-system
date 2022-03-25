<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="alert alert-info alert-dismissible fade show lighten-info" role="alert">
            <strong><?php echo get_phrase('heads_up'); ?>!</strong>
            <p>
                <?php echo get_phrase('these_are_all_the_existing_categories'); ?>. <?php echo get_phrase('you_are_authorized_to_update_only_those_categories_which_are_created_by_yours'); ?>.
            </p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
<?php if (count($categories)) : ?>
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo get_phrase("list_of_menu_categories", true); ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="categories" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase("category_name"); ?></th>
                                <th><?php echo get_phrase("GST"); ?></th>
                                <th><?php echo get_phrase("PST"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($categories as $category) : ?>
                                <tr>
                                    <td>
                                        <?php echo sanitize($category['name']); ?>
                                        <?php if ($category['is_featured']) : ?>
                                            <span class="badge badge-success lighten-success"><?php echo get_phrase('featured'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span><?php echo sanitize($category['tax']); ?>%</span>
                                    </td>
                                    <td>
                                        <span><?php echo sanitize($category['pst']); ?>%</span>
                                    </td>

                                    <td class="text-center">
                                        <?php if ($category['created_by'] == $this->session->userdata('user_id')) : ?>
                                            <button class="btn action-dropdown" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('category/edit/' . sanitize($category['id'])); ?>"><?php echo get_phrase("edit"); ?></a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('category/delete/' . sanitize($category['id'])); ?>')"><?php echo get_phrase("delete"); ?></a></li>
                                            </ul>
                                        <?php else : ?>
                                            <small>-</small>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo get_phrase("category_name"); ?></th>
                                <th><?php echo get_phrase("GST"); ?></th>
                                <th><?php echo get_phrase("PST"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (!count($categories)) : ?>
    <?php isEmpty(); ?>
<?php endif; ?>