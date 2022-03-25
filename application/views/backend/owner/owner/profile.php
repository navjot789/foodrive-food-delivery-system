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
                            <img class="profile-user-img img-fluid img-circle light-thumb-circle" src="<?php echo base_url('uploads/user/' . sanitize($owner['thumbnail'])); ?>" alt="<?php echo get_phrase('owner_profile_image'); ?>">
                        </div>

                        <h3 class="profile-username text-center"><?php echo sanitize($owner['name']); ?></h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b><?php echo get_phrase('status'); ?></b>
                                <a class="float-right">
                                    <?php if ($owner['status']) : ?>
                                        <span class="badge badge-success lighten-success"><?php echo get_phrase('approved'); ?></span>
                                    <?php else : ?>
                                        <span class="badge badge-danger lighten-danger"><?php echo get_phrase('pending'); ?></span>
                                    <?php endif; ?>

                                </a>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo get_phrase('email'); ?></b><a class="float-right"><?php echo sanitize($owner['email']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo get_phrase('phone'); ?></b><a class="float-right"><?php echo sanitize($owner['phone']); ?></a>
                            </li>
                        </ul>
                        <?php if ($owner['status']) : ?>
                            <a href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('owner/update_status/' . sanitize($owner['id'])); ?>')" class="btn btn-danger btn-block"><b><?php echo get_phrase('mark_as_pending'); ?></b></a>
                        <?php else : ?>
                            <a href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('owner/update_status/' . sanitize($owner['id'])); ?>')" class="btn btn-success btn-block"><b><?php echo get_phrase('mark_as_approved'); ?></b></a>
                        <?php endif; ?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- Restaurant owner Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('restaurant_owner_of', true); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php $restaurants = $this->restaurant_model->get_restaurants_by_condition(['owner_id' => sanitize($owner['id'])]); ?>
                        <?php if (count($restaurants) > 0) : ?>
                            <?php foreach ($restaurants as $key => $restaurant) : ?>
                                <strong><i class="fas fa-utensils"></i></strong> <a href="<?php echo site_url('site/restaurant/' . rawurlencode(sanitize($restaurant['slug'])) . '/' . sanitize($restaurant['id'])) ?>"><span class="text-muted"><?php echo sanitize($restaurant['name']); ?></span></a>
                                <?php if ($restaurant['status']) : ?>
                                    <span class="badge badge-success lighten-success"><?php echo get_phrase('approved'); ?></span>
                                <?php else : ?>
                                    <span class="badge badge-danger lighten-danger"><?php echo get_phrase('pending'); ?></span>
                                <?php endif; ?>
                                <hr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?php if ($owner['number_of_approved_restaurants'] == 0 && $owner['number_of_pending_restaurants'] == 0) : ?>
                                <div class="alert alert-warning lighten-warning"><?php echo get_phrase('this_restaurant_owner_does_not_have_any_restaurant_created'); ?>. <?php echo get_phrase('you_can_mark_his_as_customer_only'); ?></div>
                                <a href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('owner/become_customer/' . sanitize($owner['id'])); ?>')" class="btn btn-warning btn-block"><b><?php echo get_phrase('mark_him_as_customer_only', true); ?></b></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('owner_addresses', true); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div id="mapid1"></div>
                        <p class="text-muted p-2">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> <?php echo get_phrase('address_1'); ?> : </strong>
                            <?php echo getter(sanitize($owner['address_1']), get_phrase('not_found')); ?>
                        </p>

                        <div id="mapid2"></div>
                        <p class="text-muted p-2">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> <?php echo get_phrase('address_2'); ?> : </strong>
                            <?php echo getter(sanitize($owner['address_2']), get_phrase('not_found')); ?>
                        </p>

                        <div id="mapid3"></div>
                        <p class="text-muted p-2">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> <?php echo get_phrase('address_3'); ?> : </strong>
                            <?php echo getter(sanitize($owner['address_3']), get_phrase('not_found')); ?>
                        </p>
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
                            <?php if ($tab == "activity") : ?>
                                <li class="nav-item"><a class="nav-link <?php if ($tab == "activity") echo "active"; ?>" href="#activity" data-toggle="tab"><?php echo get_phrase('Activity'); ?></a></li>
                            <?php else : ?>
                                <li class="nav-item"><a class="nav-link <?php if ($tab == "profile") echo "active"; ?>" href="#profile" data-toggle="tab"><?php echo get_phrase('profile'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" href="#address_1" data-toggle="tab"><?php echo get_phrase('address_1'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" href="#address_2" data-toggle="tab"><?php echo get_phrase('address_2'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" href="#address_3" data-toggle="tab"><?php echo get_phrase('address_3'); ?></a></li>
                                <li class="nav-item"><a class="nav-link" href="#finish" data-toggle="tab"><?php echo get_phrase('finish'); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- /.tab-pane -->
                            <div class=" <?php if ($tab == "activity") echo "active"; ?> tab-pane" id="activity">
                                <div class="alert alert-warning lighten-info alert-dismissible">
                                    <strong><?php echo get_phrase('note'); ?></strong> : <?php echo get_phrase('since_a_restaurant_owner_can_also_order_from_various_restaurant'); ?>, <?php echo get_phrase('these_are_the_orders_made_by') . ' ' . $owner['name']; ?>.
                                </div>
                                <!-- The timeline -->
                                <table id="orders" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo get_phrase("order_code"); ?></th>
                                            <th><?php echo get_phrase("order_placing_time"); ?></th>
                                            <th><?php echo get_phrase("delivery_address"); ?></th>
                                            <th><?php echo get_phrase("order_status"); ?></th>
                                            <th><?php echo get_phrase("action"); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $orders = $this->order_model->get_by_condition(['customer_id' => sanitize($owner['id'])]);
                                        foreach ($orders as $order) : ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo site_url('orders/details/' . sanitize($order['code'])); ?>"><?php echo sanitize($order['code']); ?></a>
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
                                                <td class="text-center">
                                                    <a href="<?php echo site_url('orders/details/' . $order['code']); ?>" class="btn btn-rounded btn-outline-primary btn-sm mt-2"><?php echo get_phrase('details'); ?></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th><?php echo get_phrase("order_code"); ?></th>
                                            <th><?php echo get_phrase("order_placing_time"); ?></th>
                                            <th><?php echo get_phrase("delivery_address"); ?></th>
                                            <th><?php echo get_phrase("order_status"); ?></th>
                                            <th><?php echo get_phrase("action"); ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="<?php if ($tab == "profile") echo "active"; ?> tab-pane" id="profile">
                                <form action="<?php echo site_url('owner/update'); ?>" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo sanitize($owner['id']); ?>">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label"><?php echo get_phrase('name'); ?><span class='text-danger'>*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="<?php echo get_phrase('provide_name'); ?>" value="<?php echo sanitize($owner['name']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label"><?php echo get_phrase('email'); ?><span class='text-danger'>*</span></label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="<?php echo get_phrase('provide_valid_email'); ?>" value="<?php echo sanitize($owner['email']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label"><?php echo get_phrase("phone"); ?><span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo get_phrase("enter_phone"); ?>" value="<?php echo sanitize($owner['phone']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label"><?php echo get_phrase("image"); ?></label>
                                        <div class="col-sm-10">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' class="imageUploadPreview" id="image" name="image" accept=".png, .jpg, .jpeg" />
                                                    <label for="image"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="image_preview" thumbnail="<?php echo base_url('uploads/user/' . sanitize($owner['thumbnail'])); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="tab-pane" id="address_1">
                                <div class="form-group row">
                                    <label for="address_1" class="col-sm-2 col-form-label"><?php echo get_phrase('address_1'); ?><span class='text-danger'>*</span></label>
                                    <div class="col-sm-10">
                                        <textarea name="address_1" class="form-control" id="address_1" rows="5" placeholder="<?php echo get_phrase('provide_full_address'); ?>."><?php echo sanitize($owner['address_1']); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="latitude_1" class="col-sm-2 col-form-label"><?php echo get_phrase('latitude'); ?><span class='text-danger'>*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="latitude_1" class="form-control" id="latitude_1" placeholder="<?php echo get_phrase('latitude_for_address_1'); ?>" value="<?php echo sanitize($owner['coordinate_1']['latitude']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="longitude_1" class="col-sm-2 col-form-label"><?php echo get_phrase("longitude"); ?><span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="longitude_1" name="longitude_1" placeholder="<?php echo get_phrase("longitude_for_address_1"); ?>" value="<?php echo sanitize($owner['coordinate_1']['longitude']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="address_2">
                                <div class="form-group row">
                                    <label for="address_2" class="col-sm-2 col-form-label"><?php echo get_phrase('address_2'); ?></label>
                                    <div class="col-sm-10">
                                        <textarea name="address_2" class="form-control" id="address_2" rows="5" placeholder="<?php echo get_phrase('provide_full_address'); ?>."><?php echo sanitize($owner['address_2']); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="latitude_2" class="col-sm-2 col-form-label"><?php echo get_phrase('latitude'); ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="latitude_2" class="form-control" id="latitude_2" placeholder="<?php echo get_phrase('latitude_for_address_2'); ?>" value="<?php echo sanitize($owner['coordinate_2']['latitude']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="longitude_2" class="col-sm-2 col-form-label"><?php echo get_phrase("longitude"); ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="longitude_2" name="longitude_2" placeholder="<?php echo get_phrase("longitude_for_address_2"); ?>" value="<?php echo sanitize($owner['coordinate_2']['longitude']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="address_3">
                                <div class="form-group row">
                                    <label for="address_3" class="col-sm-2 col-form-label"><?php echo get_phrase('address_3'); ?></label>
                                    <div class="col-sm-10">
                                        <textarea name="address_3" class="form-control" id="address_3" rows="5" placeholder="<?php echo get_phrase('provide_full_address'); ?>."><?php echo sanitize($owner['address_3']); ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="latitude_3" class="col-sm-2 col-form-label"><?php echo get_phrase('latitude'); ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="latitude_3" class="form-control" id="latitude_3" placeholder="<?php echo get_phrase('latitude_for_address_3'); ?>" value="<?php echo sanitize($owner['coordinate_3']['latitude']); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="longitude_3" class="col-sm-2 col-form-label"><?php echo get_phrase("longitude"); ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="longitude_3" name="longitude_3" placeholder="<?php echo get_phrase("longitude_for_address_3"); ?>" value="<?php echo sanitize($owner['coordinate_3']['longitude']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="finish">
                                <div class="row justify-content-center">
                                    <div class="col text-center">
                                        <h1 class="my-3 text-primary"><i class="far fa-smile"></i></h1>
                                        <h3 class="my-3 "><?php echo get_phrase('thank_you', true); ?>!</h3>
                                        <h5 class="font-weight-light"><?php echo get_phrase('you_are_just_one_click_away'); ?>...</h5>
                                        <button type="submit" class="btn btn-primary mt-5"><?php echo get_phrase('update_owner'); ?></button>
                                    </div>
                                </div>
                                </form>
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