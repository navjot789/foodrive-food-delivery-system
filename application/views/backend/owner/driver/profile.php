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
                            <img class="profile-user-img img-fluid img-circle light-thumb-circle" src="<?php echo base_url('uploads/user/' . $driver['thumbnail']); ?>" alt="<?php echo get_phrase('driver_profile_image'); ?>">
                        </div>

                        <h3 class="profile-username text-center"><?php echo sanitize($driver['name']); ?></h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b><?php echo get_phrase('status'); ?></b>
                                <a class="float-right">
                                    <?php if ($driver['status']) : ?>
                                        <span class="badge badge-success lighten-success"><?php echo get_phrase('approved'); ?></span>
                                    <?php else : ?>
                                        <span class="badge badge-danger lighten-danger"><?php echo get_phrase('pending'); ?></span>
                                    <?php endif; ?>

                                </a>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo get_phrase('email'); ?></b><a class="float-right"><?php echo sanitize($driver['email']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo get_phrase('phone'); ?></b><a class="float-right"><?php echo sanitize($driver['phone']); ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('more_information'); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-truck mr-1"></i> <?php echo get_phrase('vehicle_type'); ?></strong>

                        <p class="text-muted">
                            <?php echo ucfirst($driver['vehicle_type']); ?>
                        </p>
                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> <?php echo get_phrase('address'); ?></strong>

                        <p class="text-muted"><?php echo sanitize($driver['address']); ?></p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><?php echo get_phrase('Activity'); ?></a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- /.tab-pane -->
                            <div class="active tab-pane" id="activity">
                                <form action="<?php echo site_url('driver/profile/' . $driver['id']) ?>" method="GET">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label><?php echo get_phrase('date_range'); ?></label>
                                                <input type="hidden" name="date_range" id="selected-date-range-value" value="<?php echo date('F d, Y', $starting_timestamp) . ' - ' . date('F d, Y', $ending_timestamp); ?>">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-default btn-block text-left" id="daterange-btn">
                                                        <i class="far fa-calendar-alt"></i> <span id="selected-date-range"><?php echo date('F d, Y', $starting_timestamp) . ' - ' . date('F d, Y', $ending_timestamp); ?></span>
                                                        <i class="fas fa-caret-down"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="text-white"><?php echo get_phrase('submit'); ?></label>
                                            <button type="submit" class="btn btn-primary"><?php echo get_phrase('filter'); ?></button>
                                        </div>
                                    </div>
                                </form>
                                <!-- The timeline -->
                                <table id="orders" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo get_phrase("ordered_from"); ?></th>
                                            <th><?php echo get_phrase("order_placed_at"); ?></th>
                                            <th><?php echo get_phrase("order_delivered_at"); ?></th>
                                            <th><?php echo get_phrase("delivery_address"); ?></th>
                                            <th><?php echo get_phrase("order_status"); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orders as $order) : ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                    $restaurant_ids = $this->order_model->get_restaurant_ids($order['code']);
                                                    foreach ($restaurant_ids as $restaurant_id) :
                                                        $restaurant_detail = $this->restaurant_model->get_by_id($restaurant_id); ?>
                                                        <a href="<?php echo site_url('site/restaurant/' . rawurlencode(sanitize($restaurant_detail['slug'])) . '/' . $restaurant_detail['id']); ?>" class="text-dark" target="_blank"><small class="d-block"> ∙ <?php echo sanitize($restaurant_detail['name']); ?></small></a>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td>
                                                    <small><i class="far fa-clock"></i>
                                                        <?php echo !empty(sanitize($order['order_placed_at'])) ? date('h:i A', sanitize($order['order_placed_at'])) : "-"; ?>
                                                    </small><br>
                                                    <small><i class="far fa-calendar-alt"></i>
                                                        <?php echo !empty(sanitize($order['order_placed_at'])) ? date('D, d-M-Y', sanitize($order['order_placed_at'])) : "-"; ?>
                                                    </small>
                                                </td>
                                                <td>
                                                    <small><i class="far fa-clock"></i>
                                                        <?php echo !empty(sanitize($order['order_delivered_at'])) ? date('h:i A', sanitize($order['order_delivered_at'])) : "-"; ?>
                                                    </small><br>
                                                    <small><i class="far fa-calendar-alt"></i>
                                                        <?php echo !empty(sanitize($order['order_delivered_at'])) ? date('D, d-M-Y', sanitize($order['order_delivered_at'])) : "-"; ?>
                                                    </small>
                                                </td>
                                                <td>
                                                    <small data-toggle="tooltip" data-placement="top" title="<?php echo sanitize($order['delivery_address']); ?>">
                                                        <i class="fas fa-map-marker-alt"></i> <?php echo ellipsis(sanitize($order['delivery_address'])); ?>
                                                    </small>
                                                </td>
                                                <td>
                                                    <small>
                                                        <?php if ($order['order_status'] == 'pending') : ?>
                                                            <span class="badge badge-warning lighten-warning"><?php echo get_phrase(sanitize($order['order_status'])); ?></span>
                                                        <?php elseif ($order['order_status'] == 'delivered') : ?>
                                                            <span class="badge badge-success lighten-success"><?php echo get_phrase(sanitize($order['order_status'])); ?></span>
                                                        <?php elseif ($order['order_status'] == 'canceled') : ?>
                                                            <span class="badge badge-danger lighten-danger"><?php echo get_phrase(sanitize($order['order_status'])); ?></span>
                                                        <?php else : ?>
                                                            <span class="badge badge-primary lighten-primary"><?php echo get_phrase(sanitize($order['order_status'])); ?></span>
                                                        <?php endif; ?>
                                                    </small>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo get_phrase("ordered_from"); ?></th>
                                            <th><?php echo get_phrase("order_placed_at"); ?></th>
                                            <th><?php echo get_phrase("order_delivered_at"); ?></th>
                                            <th><?php echo get_phrase("delivery_address"); ?></th>
                                            <th><?php echo get_phrase("order_status"); ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
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