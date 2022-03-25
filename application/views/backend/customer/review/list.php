<?php if (count($reviews)) : ?>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo get_phrase("list_of_reviews", true); ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="reviews" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase("order_code"); ?></th>
                                <th><?php echo get_phrase("restaurant_name"); ?></th>
                                <th><?php echo get_phrase("rating"); ?></th>
                                <th><?php echo get_phrase("review"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($reviews as $review) : ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo site_url('orders/details/' . sanitize($review['order_code'])); ?>"><?php echo sanitize($review['order_code']); ?></a>
                                    </td>
                                    <td>
                                        <small><?php echo sanitize($review['restaurant_name']); ?></small>
                                    </td>
                                    <td>
                                        <?php for ($i = 1; $i <= $review['rating']; $i++) : ?>
                                            <i class="fas fa-star text-warning"></i>
                                        <?php endfor; ?>
                                    </td>
                                    <td class="text-center">
                                        <small><?php echo sanitize(ellipsis($review['review'], 50)); ?></small>
                                    </td>
                                    <td class="text-center"><a href="<?php echo site_url('orders/details/' . sanitize($review['order_code'])); ?>" class="btn btn-sm btn-outline-primary btn-rounded"><?php echo get_phrase('update_review'); ?></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo get_phrase("order_code"); ?></th>
                                <th><?php echo get_phrase("restaurant_name"); ?></th>
                                <th><?php echo get_phrase("rating"); ?></th>
                                <th><?php echo get_phrase("review"); ?></th>
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

<?php if (!count($reviews)) : ?>
    <?php isEmpty(); ?>
<?php endif; ?>
