<?php $categories_index_data = $this->category_model->get_index_order_by_restaurant(sanitize($restaurant_data['id']));?>

<section class="content">
    <div class="container-fluid">
            <?php if (count($categories_index_data)) : ?>

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible fade show lighten-info" role="alert">
                            <strong><?php echo get_phrase('heads_up'); ?>!</strong>
                            <p>
                                <?php echo get_phrase('these_are_all_the_existing_categories_of_your_restaurants'); ?>. <?php echo get_phrase('you_can_change_their_index_order_to_rearrange_categories_according_to_you'); ?>.
                            </p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <?php echo get_phrase("list_of_selective_menu_categories", true); ?>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="reordering" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo get_phrase("category_name"); ?></th>
                                            <th><?php echo get_phrase("GST"); ?></th>
                                            <th><?php echo get_phrase("PST"); ?></th>
                                            <th><?php echo get_phrase("order"); ?></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($categories_index_data as $data) : ?>
                                        <?php $categories = $this->category_model->get_by_id(sanitize($data['id'])); ?>   
                                                    <tr>
                                                        <td>
                                                          <?php echo sanitize($categories['name']);?>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-secondary"> <?php echo sanitize($categories['tax']);?>%</span>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-secondary"> <?php echo sanitize($categories['pst']);?>%</span>
                                                        </td>
                                                        <td width="20%">
                                                            <form action="<?php echo site_url('category/change_order'); ?>" method="post">
                                                                <div class="input-group">
                                                                    <input type="hidden" name="key" value="<?php echo sanitize($data['indx_id']);?>">
                                                                    <input type="hidden" name="id" value="<?php echo sanitize($data['restaurant_id']);?>">
                                                                    <input type="number" class="form-control" name="index" value="<?php echo sanitize($data['index_order']);?>">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-outline-success" type="submit">submit</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td> 
                                                    </tr>
                                           
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo get_phrase("category_name"); ?></th>
                                            <th><?php echo get_phrase("GST"); ?></th>
                                            <th><?php echo get_phrase("PST"); ?></th>
                                            <th><?php echo get_phrase("order"); ?></th>
                                            
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!count($categories_index_data)) : ?>
                <?php isEmpty(); ?>
            <?php endif; ?>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->


