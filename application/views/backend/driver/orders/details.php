<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- /.content-header -->
<?php 
$customer_details = $this->customer_model->get_by_id(sanitize($order_data['customer_id'])); 
$payment_data = $this->payment_model->get_payment_data_by_order_code($order_code);
$order_details = $this->order_model->details($payment_data['order_code']);
$restaurant_details = $this->restaurant_model->get_by_id($order_details[0]['restaurant_id']);
?>
<section class="content">
    <div class="container-fluid">

    <?php if ($order_data['order_status'] !== "delivered" && $order_data['order_status'] !== "canceled" && $order_data['order_status'] !== "refunded" ) : ?>
                <!-- CUSTOMER INFORMATION Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('customer_informations', true); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('uploads/user/' . sanitize($customer_details['thumbnail'])); ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?php echo sanitize($customer_details['name']); ?></h3>

                        <p class="text-muted text-center"><i class="far fa-envelope"></i> <?php echo sanitize($customer_details['email']); ?></p>
                        <a href="tel:<?php echo sanitize($customer_details['phone']); ?>" class="btn btn-primary btn-block"><b> <i class="fas fa-phone-alt"></i> <?php echo get_phrase('call_customer'); ?></b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
 <?php endif;?>

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">

                        <h3 class="profile-username text-center">#<?php echo sanitize($order_code); ?></h3>

                        <p class="text-muted text-center">
                            <i class='far fa-calendar-alt'></i> <?php echo date('D, d-M-Y', sanitize($order_data['order_placed_at'])); ?><br>
                        </p>

                        <ul class="list-group list-group-unbordered mb-3">
                           
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
                                       
                                 <?php if ($order_data['order_status'] !=='delivered' && $order_data['order_status'] !=='refunded' && $order_data['order_status'] !=='canceled') : ?>
                                        <?php if ( $payment_data['payment_method'] !== 'stripe' && $payment_data['payment_method'] !== 'fdcredit') : ?>
                                            <a class="btn btn-success btn-xs rounded-circle" href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/orders/swap_pay_method/'.$order_data['code']);?>', 'Change payment method')">
                                                <i class="fas fa-exchange-alt" ></i>
                                            </a>
                                         <?php endif; ?>
                                 <?php endif; ?>

                                    </strong>
                                </a> 
                            </li>
                            <?php if ($order_data['order_status'] == "approved") : ?>
                                <li class="list-group-item border-bottom-0 text-center">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-block" onclick="confirm_modal('<?php echo site_url('orders/process/' . sanitize($order_data['code']) . '/preparing'); ?>')"><b> <i class="fas fa-times-rectangle"></i> <?php echo get_phrase('preparing'); ?></b></a>
                                    <small class="text-muted"><?php echo get_phrase('update_order_status_to'); ?> <strong><?php echo get_phrase('preparing'); ?></strong></small>
                                </li>
                            <?php elseif ($order_data['order_status'] == "preparing") : ?>
                                <li class="list-group-item border-bottom-0 text-center">
                                    <a href="javascript:void(0)" class="btn btn-danger btn-block bg-maroon" onclick="confirm_modal('<?php echo site_url('orders/process/' . sanitize($order_data['code']) . '/prepared'); ?>')"><b> <i class="fas fa-times-rectangle"></i> <?php echo get_phrase('prepared'); ?></b></a>
                                    <small class="text-muted"><?php echo get_phrase('update_order_status_to'); ?> <strong><?php echo get_phrase('prepared'); ?></strong></small>
                                </li>
                            <?php elseif ($order_data['order_status'] == "prepared") : ?>
                                <li class="list-group-item border-bottom-0 text-center">
                                    
                                      <?php if ( $payment_data['amount_to_pay'] != $payment_data['amount_paid']) : ?>
                                        <!--offline-->
                                        <a  href="javascript:void(0)"  class="btn btn-success btn-block btn-sm text-xs" onclick="showAjaxModal('<?php echo site_url('modal/popup/orders/tipping/' . sanitize($order_data['code'])); ?>', '<?php echo get_phrase('Enter_your_received_tip', true) ?>')">
                                         <i class="fas fa-coins" ></i> Tip & Paid
                                        </a>
                                         <small class="text-muted"><?php echo get_phrase('update_order_status_to'); ?> <strong><?php echo get_phrase('delivered'); ?> <?php get_phrase('and');?> <span class="text-danger"><?php echo strtolower(get_phrase('mark_this_order_as_paid')); ?></span></strong></small>

                                    <?php else : ?>
                                        <!--online-->
                                        <a href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('orders/process/' . sanitize($order_data['code']) . '/delivered'); ?>')" class="btn btn-success btn-block btn-sm text-xs">
                                          <i class="fas fa-check-circle" ></i> <?php echo get_phrase('mark_as_delivered'); ?>
                                        </a>
                                         <small class="text-muted"><?php echo get_phrase('update_order_status_to'); ?> <strong><?php echo get_phrase('delivered'); ?></strong></small>  
                                    <?php endif; ?>
                                    
                                    
                                    
                                    
                                    
                                </li>
                            <?php endif; ?>

                        </ul>
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

                            <div class="tab-pane active" id="activity">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">

                                    <?php if (!$order_data['driver_id'] && $this->session->userdata('user_role') == "admin" || $this->session->userdata('user_role') == "owner") : ?>
                                        <div class="alert alert-warning lighten-warning alert-dismissible">
                                            <?php echo get_phrase('at_first_assign_a_driver'); ?> : <strong><a href="#assign_driver" class="text-warning text-dec-none"><?php echo get_phrase('click_here'); ?></a></strong>
                                        </div>
                                    <?php endif; ?>
                                    <div class="alert alert-success lighten-success alert-dismissible">
                                        <?php echo get_phrase('order_status'); ?> : <strong><?php echo get_phrase(sanitize($order_data['order_status'])); ?></strong>
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
                                    <div class="time-label">
                                        <span class="bg-gray">
                                           Note from Customer
                                        </span>
                                    </div>
                                    <div>
                                        <i class="far fa-comment-alt bg-secondary"></i>
                                        <div class="timeline-item">
                                            <div class="timeline-body">
                                                <?php echo getter(sanitize($order_data['delivery_info']), '...'); ?>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="time-label">
                                        <span class="bg-gray">
                                            <?php echo get_phrase('note_from_driver', true); ?>
                                        </span>
                                    </div>
                                    <div>
                                        <i class="far fa-comment-alt bg-secondary"></i>
                                        <div class="timeline-item">
                                            <div class="timeline-body">
                                                <?php echo getter(sanitize($order_data['note']), '...'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php if ($order_data['order_status'] !== "delivered" && $order_data['order_status'] !== "canceled" && $order_data['order_status'] !== "refunded" ) : ?>
                                      <div class="col-md-12">
                                        <div class="row">
                                          <div class="col-md-6">
                                               <!-- Address Box Restaurant-->
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h3 class="card-title"><?php echo get_phrase('pickup_address', true); ?></h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                     <div class="iframe-rwd">
                                                      <div id="maps" class="card-body box-profile"></div>
                                                     </div>
                                                    <p class="text-muted text-left p-2"><i class="fas fa-map-signs"></i> <?php echo !empty($restaurant_details['address']) ? sanitize($restaurant_details['address']) : get_phrase("not_found"); ?></p>
                                                    <!-- /.card-body -->
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                               <!-- Address Box customer-->
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title"><?php echo get_phrase('delivery_address', true); ?></h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                     <div class="iframe-rwd">
                                                      <div id="mapid" class="card-body box-profile"></div>
                                                     </div>
                                                    <p class="text-muted text-left p-2"><i class="fas fa-map-signs"></i> <?php echo !empty($order_data['landmark']) ? sanitize($order_data['landmark']) : get_phrase("not_found"); ?></p>
                                                    <!-- /.card-body -->
                                                </div>

                                          </div>
                                      </div>
                                  </div>
                                  <?php endif;?>

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
