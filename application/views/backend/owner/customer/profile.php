<!-- Content Header (Page header) -->
<?php include  'header.php'; ?>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle light-thumb-circle" src="<?php echo base_url('uploads/user/' . sanitize($customer['thumbnail'])); ?>" alt="<?php echo get_phrase('customer_profile_image'); ?>">
                        </div>

                        <h3 class="profile-username text-center"><?php echo sanitize($customer['name']); ?></h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b><?php echo get_phrase('status'); ?></b>
                                <a class="float-right">
                                    <?php if ($customer['status']) : ?>
                                        <span class="badge badge-success lighten-success"><?php echo get_phrase('approved'); ?></span>
                                    <?php else : ?>
                                        <span class="badge badge-danger lighten-danger"><?php echo get_phrase('pending'); ?></span>
                                    <?php endif; ?>

                                </a>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo get_phrase('email'); ?></b><a class="float-right"><?php echo sanitize($customer['email']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo get_phrase('phone'); ?></b><a class="float-right"><?php echo sanitize($customer['phone']); ?></a>
                            </li>
                              <li class="list-group-item">
                                <b><?php echo get_phrase('address'); ?></b><a class="float-right"> <?php echo getter(sanitize($customer['address_1']), get_phrase('not_found')); ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <?php if (is_restaurant_owner($customer['id'])) : ?>
                    <!-- Restaurant owner Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo get_phrase('restaurant_owner_of', true); ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            $restaurants = $this->restaurant_model->get_restaurants_by_condition(['owner_id' => sanitize($customer['id'])]); ?>
                            <?php
                            if (count($restaurants) > 0) :
                                foreach ($restaurants as $key => $restaurant) : ?>
                                    <strong><i class="fas fa-utensils"></i></strong> <a href="<?php echo site_url('site/restaurant/' . rawurlencode(sanitize($restaurant['slug'])) . '/' . sanitize($restaurant['id'])); ?>" target="_blank"><span class="text-muted"><?php echo sanitize($restaurant['name']); ?></span></a>
                                    <hr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="alert alert-warning lighten-warning"><?php echo get_phrase('this_restaurant_owner_does_not_have_any_restaurant_created'); ?>.</div>
                            <?php endif; ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <?php endif; ?>

              
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><?php echo get_phrase('activity'); ?></a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- /.tab-pane -->
                            <div class="active tab-pane" id="activity">
                                <!-- The timeline -->
                                <table id="orders" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo get_phrase("ordered_from"); ?></th>
                                            <th><?php echo get_phrase("order_placing_time"); ?></th>
                                            <th><?php echo get_phrase("delivery_address"); ?></th>
                                            <th><?php echo get_phrase("order_status"); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $orders = $this->order_model->get_by_condition(['customer_id' => sanitize($customer['id'])]);
                                        foreach ($orders as $order) : ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $restaurant_ids = $this->order_model->get_restaurant_ids($order['code']);
                                                    foreach ($restaurant_ids as $restaurant_id) :
                                                        $restaurant_detail = $this->restaurant_model->get_by_id($restaurant_id); ?>
                                                        <a href="<?php echo site_url('site/restaurant/' . rawurlencode(sanitize($restaurant_detail['slug'])) . '/' . sanitize($restaurant_detail['id'])); ?>" class="text-dark" target="_blank"><small class="d-block"> ∙ <?php echo sanitize($restaurant_detail['name']); ?></small></a>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td>
                                                    <small><i class="far fa-clock"></i> <?php echo date('h:i A', sanitize($order['order_placed_at'])); ?></small><br>
                                                    <small><i class="far fa-calendar-alt"></i> <?php echo date('D, d-M-Y', sanitize($order['order_placed_at'])); ?></small>
                                                </td>
                                                <td>
                                                    <small data-toggle="tooltip" data-placement="top" title="<?php echo sanitize($order['delivery_address']); ?>">
                                                        <i class="fas fa-map-marker-alt"></i> <?php echo ellipsis(sanitize($order['delivery_address'])); ?>
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
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo get_phrase("ordered_from"); ?></th>
                                            <th><?php echo get_phrase("order_placing_time"); ?></th>
                                            <th><?php echo get_phrase("delivery_address"); ?></th>
                                            <th><?php echo get_phrase("order_status"); ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>