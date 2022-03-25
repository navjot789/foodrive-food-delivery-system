<?php if (count($orders)) : ?>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo get_phrase("list_of_todays_orders", true); ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="orders" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase("order_code"); ?></th>
                                <th><?php echo get_phrase("ordered_from"); ?></th>
                                <th><?php echo get_phrase("order_placing_time"); ?></th>
                                <th><?php echo get_phrase("delivery_address"); ?></th>
                                <th><?php echo get_phrase("payment_details"); ?></th>
                                <th><?php echo get_phrase("order_status"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($orders as $order) : ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo site_url('orders/details/' . sanitize($order['code'])); ?>">#<?php echo sanitize($order['code']); ?></a>
                                    </td>
                                    <td>
                                        <?php
                                        $restaurant_ids = $this->order_model->get_restaurant_ids(sanitize($order['code']));
                                        foreach ($restaurant_ids as $restaurant_id) :
                                            $restaurant_detail = $this->restaurant_model->get_by_id(sanitize($restaurant_id)); ?>
                                            <?php if (isset($restaurant_detail['id'])) : ?>
                                                <a href="<?php echo site_url('site/restaurant/' . sanitize(rawurlencode($restaurant_detail['slug'])) . '/' . sanitize($restaurant_detail['id'])); ?>" class="text-dark" target="_blank"><small class="d-block"> ∙ <?php echo sanitize($restaurant_detail['name']); ?></small></a>
                                            <?php else: ?>
                                                <a href="javascript:void(0)" class="text-red"><small class="d-block"> ∙ <?php echo get_phrase("not_found");; ?></small></a>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <i class="far fa-clock"></i> <?php echo date('h:i A', sanitize($order['order_placed_at'])); ?>
                                    </td>
                                    <td>
                                        <small data-toggle="tooltip" data-placement="top" title="<?php echo sanitize($order['landmark']); ?>">
                                            <strong><?php echo get_phrase('address'); ?> : </strong> <?php echo ellipsis(sanitize($order['landmark'])); ?>
                                        </small>
                                    </td>
                                    <td>
                                        <?php $payment_data = $this->payment_model->get_payment_data_by_order_code($order['code']); ?>
                                        <small class="d-block">
                                            <strong><?php echo get_phrase('amount'); ?> : </strong> <?php echo currency(sanitize($payment_data['amount_to_pay'])); ?>
                                        </small>
                                        <small class="d-block">
                                            <strong><?php echo get_phrase('status'); ?> : </strong>
                                            <?php if($payment_data['amount_to_pay'] == $payment_data['amount_paid'] && $payment_data['refund_status'] == 0):?>
                                                <span class="badge badge-success lighten-success"><?php echo get_phrase(sanitize('paid'));?></span>
                                            
                                            <?php elseif($payment_data['amount_to_pay'] == $payment_data['amount_paid'] && $payment_data['refund_status'] == 1):?>
                                                 <span class="badge badge-danger lighten-info"><?php echo get_phrase(sanitize('refunded'));?></span>
                                            <?php else:?>
                                                <span class="badge badge-danger lighten-danger"><?php echo get_phrase(sanitize('unpaid'));?></span>
                                            <?php endif;?>
                                        </small>
                                        <small class="d-block">
                                            <strong><?php echo get_phrase('method'); ?> : </strong> <?php echo ucfirst(str_replace('_',' ',sanitize($payment_data['payment_method']))); ?>
                                        </small>
                                    </td>
                                    <td>
                                        <?php if ($order['order_status'] == 'pending') : ?>
                                            <span class="badge badge-warning lighten-warning"><?php echo get_phrase(sanitize($order['order_status'])); ?></span>
                                        <?php elseif ($order['order_status'] == 'delivered') : ?>
                                            <span class="badge badge-success lighten-success"><?php echo get_phrase(sanitize($order['order_status'])); ?></span>
                                        <?php elseif ($order['order_status'] == 'canceled') : ?>
                                            <span class="badge badge-danger lighten-danger"><?php echo get_phrase(sanitize($order['order_status'])); ?></span>
                                        <?php else : ?>
                                            <span class="badge badge-primary lighten-primary"><?php echo get_phrase(sanitize($order['order_status'])); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo site_url('orders/details/' . sanitize($order['code'])); ?>" class="btn btn-rounded btn-outline-primary btn-sm mt-2"><?php echo get_phrase('details'); ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo get_phrase("order_code"); ?></th>
                                <th><?php echo get_phrase("ordered_from"); ?></th>
                                <th><?php echo get_phrase("order_placing_time"); ?></th>
                                <th><?php echo get_phrase("delivery_address"); ?></th>
                                <th><?php echo get_phrase("payment_details"); ?></th>
                                <th><?php echo get_phrase("order_status"); ?></th>
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

<?php if (!count($orders)) : ?>
    <?php isEmpty(); ?>
<?php endif; ?>
