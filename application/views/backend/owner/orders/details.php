<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- /.content-header -->
<?php 
$customer_details = $this->customer_model->get_by_id(sanitize($order_data['customer_id'])); 
$payment_data = $this->payment_model->get_payment_data_by_order_code($order_code);
?>
<section class="content">
    <div class="container-fluid">   

    <div class="row">
       <div class="col-md-7">
                <?php if (!$order_data['driver_id']) : ?>
                            <!-- About Driver Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"><?php echo get_phrase('assigned_driver', true); ?></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body box-profile" id="assign_driver">
                                        <div class="text-center">
                                            <p class="text-muted text-center"><i class="fas fa-biking"></i> <?php echo get_phrase("foodriver_will_assign_soon.."); ?></p>
                                        </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                <?php endif; ?>


                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link <?php if ($this->session->flashdata('review_tab')) echo 'active'; ?>" href="#activity" data-toggle="tab"><i class="fas fa-tasks"></i>  <?php echo get_phrase('Activity'); ?></a></li>
                            <li class="nav-item"><a class="nav-link <?php if (!$this->session->flashdata('review_tab')) echo 'active'; ?>" href="#ordered_items" data-toggle="tab"><i class="fas fa-clipboard-list"></i> <?php echo get_phrase('ordered_items'); ?></a></li>
                            <li class="nav-item"><a class="nav-link <?php if ($this->session->flashdata('review_tab')) echo 'active'; ?>" href="#rating_and_review" data-toggle="tab"><i class="fas fa-star-half-alt" ></i> <?php echo get_phrase('rating_and_review'); ?></a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane <?php if ($this->session->flashdata('review_tab')) echo 'active'; ?>" id="activity">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <div class="alert alert-success lighten-success alert-dismissible">
                                        <?php echo get_phrase('order_status'); ?> : <strong><?php echo get_phrase($order_data['order_status']); ?></strong>
                                    </div>
                                    <!-- ORDER PHASES STARTS -->
                                    <?php
                                    $phases  = ['placed', 'approved', 'preparing', 'prepared', 'delivered', 'canceled'];
                                    $bgs = [
                                        'warning',
                                        'primary',
                                        'maroon',
                                        'purple',
                                        'success',
                                        'danger'
                                    ];
                                    $icons = [
                                        'fas fa-folder-plus',
                                        'far fa-thumbs-up',
                                        'fas fa-fire',
                                        'fas fa-truck',
                                        'far fa-check-circle',
                                        'fas fa-times-circle'
                                    ];
                                    $messages = [
                                        'customer_successfully_placed_an_order',
                                        'order_has_been_approved',
                                        'preparing_food',
                                        'food_is_prepared_and_driver_is_on_the_way_to_customers_destination',
                                        'successfully_delivered',
                                        'order_has_been_canceled'
                                    ];
                                    foreach ($phases as $key => $phase) : ?>
                                        <?php if (!empty($order_data['order_' . $phases[$key] . '_at'])) : ?>
                                            <div class="time-label">
                                                <span class="bg-<?php echo sanitize($bgs[$key]); ?>">
                                                    <?php echo date('h:i A', $order_data['order_' . $phases[$key] . '_at']); ?>
                                                </span>
                                            </div>
                                            <div>
                                                <i class="<?php echo sanitize($icons[$key]); ?> bg-<?php echo sanitize($bgs[$key]); ?>"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body">
                                                        <?php echo get_phrase($messages[$key]); ?>.
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <!-- ORDER PHASES ENDS -->
                                    
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane <?php if (!$this->session->flashdata('review_tab')) echo 'active'; ?>" id="ordered_items">
                                <?php
                                foreach ($ordered_items as $key => $ordered_item) :
                                    $restaurant_details = $this->restaurant_model->get_by_id($ordered_item['restaurant_id']);
                                    $menu_details = $this->menu_model->get_by_id($ordered_item['menu_id']); ?>

                                    <div class="row mb-1">
                                        <div class="col-12">
                                            <div class="card p-3 bg-light">
                                                <div class="d-flex d-block">
                                                    <div class="px-0 px-0">
                                                        <span class="badge badge-pill badge-secondary mr-1" id="cart-quantity-<?php echo sanitize($ordered_item['id']); ?>"> <?php echo sanitize($ordered_item['quantity']); ?></span>
                                                    </div>
                                                    <div>
                                                        <div class="d-flex d-block">
                                                            <?php if ($menu_details['thumb_status']) : ?>
                                                                <img src="<?php echo base_url('uploads/menu/' . sanitize($menu_details['thumbnail'])); ?>" class="img-icon" alt=""> 
                                                            <?php endif; ?>
                                                            <div class="ml-2 ml-0">
                                                                
                                                                <h6 class="mb-0 menu-name text-primary"> <strong><?php echo sanitize($menu_details['name']); ?></strong></h6> 
                                                                <span class="text-muted menu-serving"><?php echo site_phrase(sanitize($restaurant_details['name'])); ?></span>
                                                            </div>
                                                        </div>
                                                        <ul class="list-unstyled mt-1 ml-5">
                                                        <?php if (!empty($ordered_item['variant_id'])) : ?>
                                                                <!--Variants-->
                                                                <?php
                                                                        $variant_exploded = explode(',', $ordered_item['variant_id']);
                                                                        foreach ($variant_exploded as $key => $variant) {
                                                                            $this->db->where('id' , $variant);
                                                                            $query  = $this->db->get('variants');
                                                                            if($query->num_rows() > 0){
                                                                                $variant_details = $query->row_array();
                                                                                    //$variant_details = $this->db->get_where('variants', ['id' => $variant])->row_array();
                                                                                echo '<li>- '.ucfirst(sanitize($variant_details['variant'])) . ': ' . currency(format($variant_details['price'])) . '</li>';
                                                                            }
                                                                        
                                                                        }
                                                                    ?>                                             
                                                            <?php endif; ?>

                                                            <?php if (!empty($ordered_item['addons'])) : ?>
                                                                <!--addons-->
                                                                        <?php
                                                                        $addons_exploded = explode(',', $ordered_item['addons']);
                                                                        foreach ($addons_exploded as $key => $addon) {
                                                                            $addon_details = $this->db->get_where('addons', ['aid' => $addon])->row_array();
                                                                            echo '<li>- '.ucfirst(sanitize($addon_details['addon_name'])) . ': ' . currency(format($addon_details['addon_price'])) . '</li>';
                                                                        }
                                                                        ?>                                           
                                                                <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                    <div class="ml-auto d-block">
                                                        <div class="d-flex  flex-column h-100 text-right">
                                                                <span id="sub-total-<?php echo sanitize($ordered_item['id']); ?>" class="text-success"><?php echo currency(sanitize(format($ordered_item['total']))); ?></span>
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                                <?php if ($ordered_item['note'] && !empty($ordered_item['note'])) : ?>
                                                    <div class="row">
                                                        <div class="col note">
                                                            <small>
                                                            <span class="text-danger"><?php echo get_phrase('note'); ?> :</span> <?php echo sanitize($ordered_item['note']); ?></small>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                            
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane <?php if ($this->session->flashdata('review_tab')) echo 'active'; ?>" id="rating_and_review">
                                <?php if ($order_data['order_status'] == "delivered") : ?>
                                    <?php $restaurant_ids = $this->order_model->get_restaurant_ids(sanitize($order_code));
                                    foreach ($restaurant_ids as $restaurant_id) :
                                        $restaurant_details = $this->restaurant_model->get_by_id(sanitize($restaurant_id));
                                        if ($restaurant_details['owner_id'] != $this->session->userdata('user_id'))
                                            continue;
                                        $review = $this->review_model->get_a_review(['order_code' => sanitize($order_code), 'customer_id' => sanitize($order_data['customer_id']), 'restaurant_id' => sanitize($restaurant_id)]);
                                    ?>
                                        <div class="callout">
                                            <h5><?php echo get_phrase('review_for'); ?> : <?php echo sanitize($restaurant_details['name']); ?></h5>
                                            <div class="card-footer card-comments bg-white">
                                                <div class="card-comment">
                                                    <span class="d-block">
                                                        <strong><?php echo get_phrase('rating'); ?> :</strong>
                                                        <?php if (isset($review['rating'])) : ?>
                                                            <?php for ($i = 1; $i <= sanitize($review['rating']); $i++) : ?>
                                                                <i class="fas fa-star text-warning"></i>
                                                            <?php endfor; ?>
                                                            <?php for ($i = 1; $i <= 5 - sanitize($review['rating']); $i++) : ?>
                                                                <i class="fas fa-star text-black-50"></i>
                                                            <?php endfor; ?>
                                                            <span class="text-muted float-right"><?php echo date('D, d-M-Y', sanitize($review['timestamp'])); ?></span>
                                                        <?php else : ?>
                                                            <span class="font-weight-500"><?php echo get_phrase('customer_has_not_provided_yet'); ?></span>
                                                        <?php endif; ?>
                                                    </span>
                                                    <span class="d-block">
                                                        <strong><?php echo get_phrase('review'); ?> : </strong>
                                                        <?php echo isset($review['review']) ? sanitize($review['review']) : get_phrase('customer_has_not_provided_yet'); ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="text-center">
                                        <img src="<?php echo base_url('assets/backend/img/review.png'); ?>" class="review-placeholder">
                                        <h6><?php echo get_phrase('please_wait', true); ?>, <strong><?php echo get_phrase('customer_can_write_a_review_after_delivering_the_order'); ?>.</strong></h6>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->

                <!-- CUSTOMER INFORMATION Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-user" ></i> <?php echo get_phrase('customer_information', true); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('uploads/user/' . sanitize($customer_details['thumbnail'])); ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?php echo sanitize($customer_details['name']); ?></h3>

                        <p class="text-muted text-center"><i class="far fa-envelope"></i> <?php echo sanitize($customer_details['email']); ?></p>
                        <div class="text-center">
                        <a href="#" class="btn btn-light"><b> <i class="fas fa-phone-alt"></i> <?php echo sanitize($customer_details['phone']); ?></b></a>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div> 

            </div>
            <!-- /.col -->

            <div class="col-md-5">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">

                            <h3 class="profile-username text-center">#<?php echo sanitize($order_code); ?></h3>

                            <p class="text-muted text-center">
                                <i class='far fa-calendar-alt'></i> <?php echo date('D, d-M-Y', sanitize($order_data['order_placed_at'])); ?><br>
                            </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b><?php echo get_phrase('total_food_price'); ?>: </b> <a class="float-right text-success"><?php echo currency(sanitize(number_format($order_data['total_menu_price'], 2, '.', ''))); ?></a>
                                </li>
                            <li class="list-group-item">
                                    <b>Tax & Service charge:  
                                    <a href="javascript:void(0)" data-trigger="focus" data-toggle="popover" data-html="true" title="Tax & Service Charge" data-content="GST : <?php echo currency(sanitize(format($order_data['total_vat_amount'])));?></br>PST : <?php echo currency(sanitize(format($order_data['total_pst_amount'])));?></br>Service charge : <?php echo currency(sanitize(format($order_data['service_charge'])));?>">
                                            <i class="fas fa-info-circle" ></i>
                                        </a> 
                                    </b>
                                    <a class="float-right text-success"><?php echo currency(sanitize(format($order_data['total_vat_amount'] + $order_data['total_pst_amount']  + $order_data['service_charge']))); ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b><?php echo get_phrase('sub_total'); ?>: </b> <a class="float-right text-success"><?php 
                                    echo currency(number_format(sanitize($order_data['total_menu_price']) + sanitize($order_data['total_addons_price']) + sanitize($order_data['total_vat_amount']) + sanitize($order_data['service_charge']), 2, '.', ''));
                                    ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b><?php echo get_phrase('total_delivery_charge'); ?>: </b> <a class="float-right text-success"><?php echo currency(sanitize(number_format($order_data['total_delivery_charge'], 2, '.', ''))); ?></a>
                                </li>
                                
                                <?php if (!empty($order_data['tip']) && $order_data['tip'] !== 0) : ?>
                                <?php if ($payment_data['payment_method'] == "stripe") : ?>
                                    <li class="list-group-item">
                                        <b><?php echo get_phrase('Foodriver_tip'); ?>: </b> <a class="float-right text-success"><?php echo currency(sanitize(format($order_data['tip']))); ?></a>
                                    </li>
                                    <?php endif; ?>
                            <?php endif; ?>
                            
                            <?php if (!empty($order_data['credits']) && $order_data['credits'] !== 0) : ?>
                                <li class="list-group-item">
                                    <b>FD Credits: </b> <a class="float-right text-danger">-<?php echo currency(sanitize(format($order_data['credits']))); ?></a>
                                </li>
                            <?php endif; ?>

                                <li class="list-group-item">
                                    <b><?php echo get_phrase('grand_total'); ?>: </b> <strong><a class="float-right text-success">
                                    <?php if (!empty($order_data['credits']) && $order_data['credits'] !== 0) : ?>
                                        <?php echo currency(sanitize(format($order_data['grand_total'] - $order_data['credits']))); ?>
                                    <?php else : ?>  
                                        <?php echo currency(sanitize(format($order_data['grand_total']))); ?>
                                    <?php endif; ?>    
                                    </a></strong>
                                </li>
                                <li class="list-group-item">
                                    <b><?php echo get_phrase('payment_status'); ?>: </b> 
                                    <a class="float-right">
                                                <?php if($payment_data['amount_to_pay'] == $payment_data['amount_paid'] && $payment_data['refund_status'] == 0):?>
                                                    <span class="badge badge-success lighten-success"><?php echo get_phrase(sanitize('paid'));?></span>
                                                
                                                <?php elseif($payment_data['amount_to_pay'] == $payment_data['amount_paid'] && $payment_data['refund_status'] == 1):?>
                                                    <span class="badge badge-danger lighten-info"><?php echo get_phrase(sanitize('refunded'));?></span>
                                                <?php else:?>
                                                    <span class="badge badge-danger lighten-danger"><?php echo get_phrase(sanitize('unpaid'));?></span>
                                                <?php endif;?>
                                    </a>
                                </li>
                                <li class="list-group-item border-bottom-0">
                                    <b><?php echo get_phrase('payment_method'); ?>: </b> 
                                    <a class="float-right">
                                        <strong>
                                            <?php echo ucfirst(str_replace('_',' ',sanitize($payment_data['payment_method']))); ?>
                                        </strong>
                                    </a>
                                </li>

                                <?php if ($order_data['order_status'] == "pending") : ?>
                                    <li class="list-group-item border-bottom-0">
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block" onclick="confirm_modal('<?php echo site_url('orders/cancel/' . sanitize($order_data['code'])); ?>')"><b> <i class="fas fa-times-rectangle"></i> <?php echo get_phrase('cancel_this_order'); ?></b></a>
                                    </li>
                                <?php endif; ?>
                                <?php if ($order_data['order_status'] == "pending") : ?>
                                    <li class="list-group-item border-bottom-0 text-center">
                                        <a href="javascript:void(0)" class="btn btn-primary btn-block" onclick="confirm_modal('<?php echo site_url('orders/process/' . sanitize($order_data['code']) . '/preparing'); ?>')"><b> <i class="fas fa-times-rectangle"></i> <?php echo get_phrase('preparing'); ?></b></a>
                                        <small class="text-muted"><?php echo get_phrase('update_order_status_to'); ?> <strong><?php echo get_phrase('preparing'); ?></strong></small>
                                    </li>       
                                <?php elseif ($order_data['order_status'] == "preparing") : ?>
                                    <li class="list-group-item border-bottom-0 text-center">
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block bg-maroon" onclick="confirm_modal('<?php echo site_url('orders/process/' . sanitize($order_data['code']) . '/prepared'); ?>')"><b> <i class="fas fa-times-rectangle"></i> <?php echo get_phrase('prepared'); ?></b></a>
                                        <small class="text-muted"><?php echo get_phrase('click_update_order_status_to'); ?> <strong><?php echo get_phrase('prepared_&_ready_for_pickup'); ?></strong></small>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->      


        </div>
   </div>


    </div><!-- /.container-fluid -->
</section>
