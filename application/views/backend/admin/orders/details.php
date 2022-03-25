<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- /.content-header -->
<?php
 $customer_details = $this->customer_model->get_by_id($order_data['customer_id']); 
 $payment_data = $this->payment_model->get_payment_data_by_order_code($order_code);
 $order_details = $this->order_model->details($payment_data['order_code']);

 $restaurant_details = $this->restaurant_model->get_by_id($order_details[0]['restaurant_id']);

 ?>
<section class="content">
    <div class="container-fluid">
   <!-- <?php 
            $refund_details = $this->support_model->get_by_order_status($payment_data['order_code'], '1');
            if($refund_details['status'] == 1 ): ?>
                <div class="alert alert-info" role="alert">
                    <Strong>Refunded!</Strong> We have refunded <b><?php echo currency(format(sanitize($refund_details['refund_amt'])));?></b> into your FD wallet on <?php echo date("F j, Y", sanitize($refund_details['update_at'])); ?> 
                </div>
            <?php endif;?>-->
             
        <div class="row">
            <div class="col-md-9">
            <div class="card">
                    <div class="card-header p-2">
                    <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link <?php if (!$this->session->flashdata('review_tab')) echo 'active'; ?>" href="#activity" data-toggle="tab"><i class="fas fa-tasks"></i>  <?php echo get_phrase('Activity'); ?></a></li>
                                    <li class="nav-item"><a class="nav-link" href="#ordered_items" data-toggle="tab"><i class="fas fa-clipboard-list"></i> <?php echo get_phrase('ordered_items'); ?></a></li>
                                    <li class="nav-item"><a class="nav-link <?php if ($this->session->flashdata('review_tab')) echo 'active'; ?>" href="#rating_and_review" data-toggle="tab"><i class="fas fa-star-half-alt" ></i> <?php echo get_phrase('rating_and_review'); ?></a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane <?php if (!$this->session->flashdata('review_tab')) echo 'active'; ?>" id="activity">
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
                                                    <?php echo date('h:i A', sanitize($order_data['order_' . $phases[$key] . '_at'])); ?>
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
                                           Note from Customer to Driver
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
                                                <div class="card card-primary">
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


                                    
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="ordered_items">
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
                                    <?php $restaurant_ids = $this->order_model->get_restaurant_ids($order_code);
                                    foreach ($restaurant_ids as $restaurant_id) :
                                        $restaurant_details = $this->restaurant_model->get_by_id($restaurant_id);
                                        $review = $this->review_model->get_a_review(['order_code' => $order_code, 'customer_id' => $order_data['customer_id'], 'restaurant_id' => $restaurant_id]);
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
                
            </div>
            <!-- /.col -->
            <div class="col-md-3">

             <!-- About Driver Box -->
             <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-car" ></i> <?php echo get_phrase('assigned_driver', true); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body box-profile" id="assign_driver">
                        <!--DRIVER ASSIGN FORM-->
                        <?php if (!$order_data['driver_id']) : ?>
                             <?php if ($order_data['order_status'] == "pending" || $order_data['order_status'] == "approved"
                                      || $order_data['order_status'] == "preparing" || $order_data['order_status'] == "prepared") : ?>
                                <form action="<?php echo site_url('orders/assign_driver'); ?>" method="POST">
                                    <?php $drivers = $this->driver_model->get_approved_drivers(); ?>
                                    <input type="hidden" name="order_code" value="<?php echo sanitize($order_code); ?>">
                                    <div class="form-group">
                                        <label><?php echo get_phrase('driver'); ?> <span class='text-danger'>*</span></label>
                                        
                                        <select class="form-control select2" name="driver_id" id="driver_id" >
                                            <option value=""><?php echo get_phrase('choose_a_driver'); ?></option>
                                            <?php foreach ($drivers as $key => $driver) : ?>

                                                <?php $driver_status = $this->driver_model->in_ride(sanitize($driver['id']));?>
                                                <option value="<?php echo sanitize($driver['id']); ?>">
                                                <?php if ($driver_status == 0) : ?>
                                                   (OFFLINE)
                                                <?php elseif($driver_status == 2) : ?>
                                                    (BUSY)
                                                <?php elseif($driver_status == 3) : ?>
                                                    (READY)
                                                <?php endif; ?>
                                                <?php echo sanitize($driver['name']); ?>  
                                                </option>

                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block"><b><i class="fas fa-edit"></i> <?php echo get_phrase('assign_driver'); ?></b></button>
                                </form>
                                 <?php else : ?>
                                    <!--ORDER CANCELED BEFORE DRIVER ASSIGNED-->
                                      <div class="text-center">                                           
                                        <h3 class="text-center text-danger">Order Cancelled!</h3>
                                        <h6 class="text-center text-danger">No driver assigned before order cancellation</h6>
                                      </div>
                                  <?php endif; ?>
                        <?php else : ?>
                            <!--DRIVER ASSIGNED-->
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('uploads/user/' . sanitize($order_data['driver_thumbnail'])); ?>" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center"><?php echo !empty($order_data['driver_name']) ? sanitize($order_data['driver_name']) : "-"; ?></h3>
                            <p class="text-muted text-center"><i class="far fa-envelope"></i> <?php echo !empty($order_data['driver_email']) ? sanitize($order_data['driver_email']) : get_phrase("not_found"); ?></p>
                            <a href="tel:<?php echo sanitize($order_data['driver_phone']); ?>" class="btn btn-primary btn-block"><b> <i class="fas fa-phone-alt"></i> <?php echo get_phrase('call_driver'); ?></b></a>    
                            
                            <?php if ($order_data['order_status'] !=='delivered' && $order_data['order_status'] !=='refunded' && $order_data['order_status'] !=='canceled') : ?>
                                <?php if ($order_data['driver_id']) : ?>
                                <hr>   
                                <a class="btn btn-success btn-block mb-1" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-exchange-alt" ></i> <?php echo get_phrase('Interchange'); ?>
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">    
                                            <form action="<?php echo site_url('orders/interchange_driver'); ?>" method="POST">
                                                <?php $drivers = $this->driver_model->get_approved_drivers(); ?>
                                                <input type="hidden" name="order_code" value="<?php echo sanitize($order_code); ?>">
                                                <div class="form-group">
                                                    <label><?php echo get_phrase('driver'); ?> <span class='text-danger'>*</span></label>
                                                    
                                                    <select class="form-control select2" name="driver_id" id="driver_id" >
                                                        <option value=""><?php echo get_phrase('choose_a_driver'); ?></option>
                                                        <?php foreach ($drivers as $key => $driver) : ?>

                                                            <?php $driver_status = $this->driver_model->in_ride(sanitize($driver['id']));?>
                                                            <option value="<?php echo sanitize($driver['id']); ?>">
                                                            <?php if ($driver_status == 0) : ?>
                                                            (OFFLINE)
                                                            <?php elseif($driver_status == 2) : ?>
                                                                (BUSY)
                                                            <?php elseif($driver_status == 3) : ?>
                                                                (READY)
                                                            <?php endif; ?>
                                                            <?php echo sanitize($driver['name']); ?>  
                                                            </option>

                                                        <?php endforeach; ?>
                                                    </select>

                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block"><b><i class="fas fa-edit"></i> <?php echo get_phrase('swap'); ?></b></button>
                                            </form>                         
                                    </div>
                                </div>
                             <?php endif; ?>   
                                   
                            <?php endif; ?>
                            <?php endif; ?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

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
                            <?php if ($order_data['order_status'] !== "delivered" && $order_data['order_status'] !== "refunded" && $order_data['order_status'] !== "canceled") : ?>
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
                                    <small class="text-muted"><?php echo get_phrase('update_order_status_to'); ?> <strong><?php echo get_phrase('prepared'); ?></strong></small>
                                </li>
                            <?php elseif ($order_data['order_status'] == "prepared") : ?>

                                <li class="list-group-item border-bottom-0 text-center">
                                    <?php if($payment_data['amount_to_pay'] !== $payment_data['amount_paid']):?>

                                         <?php if ($order_data['driver_id']) : ?>

                                            <a href="javascript:void(0)" class="btn btn-success btn-block" onclick="confirm_modal('<?php echo site_url('orders/process/' . sanitize($order_data['code']) . '/delivered'); ?>')"><b> <i class="fas fa-times-rectangle"></i> <?php echo get_phrase('paid_and_delivered'); ?></b></a>
                                            <small class="text-muted"><?php echo get_phrase('update_order_status_to'); ?> <strong><?php echo get_phrase('delivered'); ?> <?php get_phrase('and');?> <span class="text-danger"><?php echo strtolower(get_phrase('mark_this_order_as_paid')); ?></span></strong></small>
                                             
                                             <?php else:?>
                                                <div class="alert alert-warning lighten-warning text-center">
                                                <p>At first assign a driver, then mark as paid this order.</p>
                                                <strong><a href="#assign_driver" class="text-warning text-dec-none">Click here</a></strong>
                                                </div>
                                             <?php endif;?>

                                    <?php else:?>
                                        <a href="javascript:void(0)" class="btn btn-success btn-block" onclick="confirm_modal('<?php echo site_url('orders/process/' . sanitize($order_data['code']) . '/delivered'); ?>')"><b> <i class="fas fa-times-rectangle"></i> <?php echo get_phrase('delivered'); ?></b></a>
                                        <small class="text-muted"><?php echo get_phrase('update_order_status_to'); ?> <strong><?php echo get_phrase('delivered'); ?></strong></small>                                        
                                    <?php endif;?>
                                    
                                </li>
                       
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- CUSTOMER INFORMATION Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('customer_information', true); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('uploads/user/' . sanitize($customer_details['thumbnail'])); ?>" alt="User profile picture">
                        </div>

                        <a href="<?php echo site_url('customer/profile/'.$customer_details['id']); ?>"><h3 class="profile-username text-center"><?php echo sanitize($customer_details['name']); ?></h3></a>

                        <p class="text-muted text-center"><i class="far fa-envelope"></i> <?php echo sanitize($customer_details['email']); ?></p>
                        <a href="tel:<?php echo sanitize($customer_details['phone']); ?>" class="btn btn-primary btn-block"><b> <i class="fas fa-phone-alt"></i> <?php echo get_phrase('call_customer'); ?></b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
               
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
