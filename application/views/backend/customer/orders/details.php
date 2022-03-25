<!-- Content Header -->
<?php include 'header.php'; ?>
<!-- /.content-header -->
<?php 
$customer_details = $this->customer_model->get_by_id($order_data['customer_id']); 
$payment_data = $this->payment_model->get_payment_data_by_order_code($order_code);
?>
<section class="content">
    <div class="container-fluid">

    <?php //Dont show foodriver details on status: delivered|canceled|refunded
     if($order_data['order_status'] !== 'delivered' && $order_data['order_status'] !== 'canceled' && $order_data['order_status'] !== 'refunded') : ?>
                <div class="row">
                    <div class="col-md-12">
                            <!-- About Driver Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo get_phrase('assigned_driver', true); ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body box-profile">
                                <?php if (!$order_data['driver_id']) : ?>
                                    <div class="text-center">
                                        <p class="text-muted text-center"><i class="fas fa-biking"></i> <?php echo get_phrase("a_driver_will_be_assigned_as_soon_as_possible"); ?></p>
                                    </div>
                                <?php else : ?>
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('uploads/user/' . sanitize($order_data['driver_thumbnail'])); ?>" alt="User profile picture">
                                            </div>
                                            <h3 class="profile-username text-center"><?php echo !empty($order_data['driver_name']) ? sanitize($order_data['driver_name']) : "-"; ?></h3>
                                            <p class="text-muted text-center"><i class="far fa-envelope"></i> <?php echo !empty($order_data['driver_email']) ? sanitize($order_data['driver_email']) : get_phrase("not_found"); ?></p>
                                            <a href="tel:<?php echo sanitize($order_data['driver_phone']); ?>" class="btn btn-primary btn-block"><b> <i class="fas fa-phone-alt"></i> <?php echo get_phrase('call'); ?></b></a>
                                      
                                 <?php endif; ?>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <?php endif; ?>
           


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
                                <b><?php echo get_phrase('total_food_price'); ?>: </b> <a class="float-right text-success"><?php echo currency(sanitize(format($order_data['total_menu_price']))); ?></a>
                            </li>

                            <li class="list-group-item">
                                <b>Tax & Service charge:  
                                    <a href="javascript:void(0)" tabindex="0" role="button" data-trigger="focus" data-toggle="popover" data-html="true" title="Tax & Service Charge" data-content="GST : <?php echo currency(sanitize(format($order_data['total_vat_amount'])));?></br>PST : <?php echo currency(sanitize(format($order_data['total_pst_amount'])));?></br>Service charge : <?php echo currency(sanitize(format($order_data['service_charge'])));?>">
                                        <i class="fas fa-info-circle" ></i>
                                    </a> 
                                </b>
                                 <a class="float-right text-success"><?php echo currency(sanitize(format($order_data['total_vat_amount'] + $order_data['total_pst_amount']  + $order_data['service_charge']))); ?></a>
                            </li>
                         
                            <li class="list-group-item">
                                <b><?php echo get_phrase('total_delivery_charge'); ?>: </b> <a class="float-right text-success"><?php echo currency(sanitize(format($order_data['total_delivery_charge']))); ?></a>
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
                                <?php if ($payment_data['payment_method'] == "cash_on_delivery" || $payment_data['payment_method'] == "credit_debit") : ?>
                                <li class="list-group-item border-bottom-0">
                                    <a href="javascript:void(0)" class="btn btn-danger btn-block" onclick="confirm_modal('<?php echo site_url('orders/cancel/' . sanitize($order_data['code'])); ?>')"><b> <i class="fas fa-times-rectangle"></i> <?php echo get_phrase('cancel_this_order'); ?></b>
                                    </a>
                                    <small class="text-muted"><?php echo get_phrase('Once_the_order'); ?> <strong><?php echo get_phrase('Approved_by_the_restaurant'); ?> <?php get_phrase('and');?> <span class="text-danger"><?php echo strtolower(get_phrase('cancellation_option_disappear')); ?>.</span></strong></small>
                                </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- Address Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('deliver_to', true); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="iframe-rwd">
                        <div id="mapid" class="card-body box-profile"></div>
                    </div>
                    <p class="text-muted text-left p-2"><i class="fas fa-map-signs"></i> <?php echo !empty($order_data['landmark']) ? sanitize($order_data['landmark']) : get_phrase("not_found"); ?></p>
                    <!-- /.card-body -->
                </div>

               
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link <?php if (!$this->session->flashdata('review_tab')) echo 'active'; ?>" href="#activity" data-toggle="tab"><i class="fas fa-tasks"></i> <?php echo get_phrase('Activity'); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#ordered_items" data-toggle="tab"><i class="fas fa-clipboard-list"></i> <?php echo get_phrase('ordered_items'); ?></a></li>
                            <li class="nav-item"><a class="nav-link <?php if ($this->session->flashdata('review_tab')) echo 'active'; ?>" href="#rating_and_review" data-toggle="tab"><i class="fas fa-star-half-alt" ></i> <?php echo get_phrase('rating_and_review'); ?></a></li>
                            <?php if ($order_data['order_status'] == "delivered") : ?>
                             <li class="nav-item"><a class="nav-link <?php if ($this->session->flashdata('support_tab')) echo 'active'; ?>" href="#support" data-toggle="tab"><i class="fas fa-headset" ></i> <?php echo get_phrase('Support'); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane <?php if (!$this->session->flashdata('review_tab')) echo 'active'; ?>" id="activity">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">

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
                                        'you_successfully_placed_an_order',
                                        'your_order_has_been_approved',
                                        'preparing_your_food',
                                        'your_food_is_prepared_and_we_are_on_the_way_to_your_destination',
                                        'successfully_delivered',
                                        'your_order_has_been_canceled'
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
                                     
                                    <?php if (!empty($order_data['food_info'])) : ?>
                                         <div class="time-label">
                                            <span class="bg-gray">
                                               Note from Customer to Restaurant
                                            </span>
                                        </div>
                                        <div>
                                            <i class="far fa-comment-alt bg-secondary"></i>
                                            <div class="timeline-item">
                                                <div class="timeline-body">
                                                    <?php echo getter(sanitize($order_data['food_info']), '...'); ?>
                                                </div>
                                            </div>
                                        </div>
                                  <?php endif; ?>

                                    
                                   <?php if (!empty($order_data['delivery_info'])) : ?>
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
                                  <?php endif; ?>

                                   <?php if (!empty($order_data['note'])) : ?>
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
                                  <?php endif; ?>
                                   
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
                                                                    if($query->num_rows() > 0) {
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
                                                            <small class="text-muted"><span class="text-danger"><?php echo get_phrase('note'); ?> :</span> <?php echo sanitize($ordered_item['note']); ?></small>
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
                                <?php if ($order_data['order_status'] == "delivered" || $order_data['order_status'] == "refunded") : ?>
                                    <?php $restaurant_ids = $this->order_model->get_restaurant_ids($order_code);
                                    foreach ($restaurant_ids as $restaurant_id) :
                                        $restaurant_details = $this->restaurant_model->get_by_id(sanitize($restaurant_id));
                                        $review = $this->review_model->get_a_review(['order_code' => sanitize($order_code), 'customer_id' => $this->session->userdata('user_id'), 'restaurant_id' => sanitize($restaurant_id)]);
                                    ?>
                                        <div class="row">
                                            <div class="col-sm-8 alert alert-warning lighten-info alert-dismissible">
                                                <h6><?php echo get_phrase('restaurant_review'); ?> : <strong><?php echo sanitize($restaurant_details['name']); ?></strong></h6>
                                            </div>
                                        </div>
                                        <form class="form-horizontal" action="<?php echo site_url('review/update'); ?>" method="POST">
                                            <input type="hidden" name="order_code" value="<?php echo sanitize($order_code); ?>">
                                            <input type="hidden" name="restaurant_id" value="<?php echo sanitize($restaurant_id); ?>">
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label"><?php echo get_phrase('rating'); ?></label>
                                                <div class="col-sm-6">
                                                    <select name="rating_<?php echo sanitize($restaurant_id); ?>" id="rating_<?php echo sanitize($restaurant_id); ?>" class="form-control">
                                                        <option value="5" <?php if (isset($review['rating']) && $review['rating'] == "5") echo "selected"; ?>>⭑⭑⭑⭑⭑</option>
                                                        <option value="4" <?php if (isset($review['rating']) && $review['rating'] == "4") echo "selected"; ?>>⭑⭑⭑⭑</option>
                                                        <option value="3" <?php if (isset($review['rating']) && $review['rating'] == "3") echo "selected"; ?>>⭑⭑⭑</option>
                                                        <option value="2" <?php if (isset($review['rating']) && $review['rating'] == "2") echo "selected"; ?>>⭑⭑</option>
                                                        <option value="1" <?php if (isset($review['rating']) && $review['rating'] == "1") echo "selected"; ?>>⭑</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="review_<?php echo sanitize($restaurant_id); ?>" class="col-sm-2 col-form-label"><?php echo get_phrase('review'); ?></label>
                                                <div class="col-sm-6">
                                                    <textarea class="form-control" id="review_<?php echo sanitize($restaurant_id); ?>" name="review_<?php echo sanitize($restaurant_id); ?>" placeholder="<?php echo get_phrase('provide_your_honest_review'); ?>."><?php echo isset($review['review']) ? sanitize($review['review']) : ""; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger"><?php echo get_phrase('update_review'); ?></button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="text-center">
                                        <img src="<?php echo base_url('assets/backend/img/review.png'); ?>" class="review-placeholder">
                                        <h6><?php echo get_phrase('please_wait', true); ?>, <strong><?php echo get_phrase('you_can_write_a_review_after_delivering_the_order'); ?>.</strong></h6>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane <?php if ($this->session->flashdata('support_tab')) echo 'active'; ?>" id="support">
                                <?php if ($order_data['order_status'] == "delivered" ) : ?>
                                        <div class="row">
                                            <div class="col-sm-8 alert alert-warning lighten-info alert-dismissible p-2">
                                                <h6>Create dispute for :  <strong>#<?php echo sanitize($order_code); ?></strong></h6>
                                            </div>
                                            <?php if($this->support_model->check_dublicate_ticket($order_code)) : ?>
                                                <div class="col-sm-8 alert alert-warning lighten-warning alert-dismissible">
                                                    <h6><strong> <i class="fas fa-exclamation-circle" ></i> Support request already submitted for this order. We'll contact you shortly.</strong></h6>
                                                </div>
                                             <?php endif; ?>
                                        </div>
                                        <form class="form-horizontal" action="<?php echo site_url('support/request'); ?>" method="POST">
                                            <input type="hidden" name="order_code" value="<?php echo sanitize($order_code); ?>">
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label"><?php echo get_phrase('Reason'); ?></label>
                                                <div class="col-sm-6">
                                                    <select name="subject"  class="form-control">
                                                        <option value="">Select a reason</option>
                                                        <option value="I have packaging or spillage issue">I have packaging or spillage issue</option>
                                                        <option value="I have food taste, quality or quantity issue">I have food taste, quality or quantity issue</option>
                                                        <option value="I have not received my order">I have not received my order</option>
                                                        <option value="Items are missing or incorrect">Items are missing or incorrect</option>
                                                        <option value="Not in the list">Not in the list</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="review_<?php echo sanitize($restaurant_id); ?>" class="col-sm-2 col-form-label"><?php echo get_phrase('In details'); ?></label>
                                                <div class="col-sm-6">
                                                <textarea class="form-control" id="" name="brief" placeholder="Describe your issue here..."></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger float-right"><?php echo get_phrase('submit'); ?> <i class="fas fa-chevron-circle-right" ></i></button>
                                                </div>
                                            </div>
                                        </form>
                                   
                                <?php else : ?>
                                    <div class="text-center">
                                        <img src="<?php echo base_url('assets/backend/img/review.png'); ?>" class="review-placeholder">
                                        <h6><?php echo get_phrase('please_wait', true); ?>, <strong><?php echo get_phrase('you_can_write_a_review_after_delivering_the_order'); ?>.</strong></h6>
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
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
