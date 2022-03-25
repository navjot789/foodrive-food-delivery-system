<?php $driver_data = $this->driver_model->get_drivers_data_by_id($this->session->userdata('user_id')); //DRIVER ONLINE OFFLINE 
 if ($driver_data['status'] == 1) : ?>
<div class="col-lg-4 col-md-4">
    <div class="card card-outline">
        <div class="card-header bg-maroon">
            <h3 class="card-title"><i class="fas fa-fire"></i> <?php echo get_phrase('preparing_orders'); ?> (<?php echo count($orders['preparing']); ?>)</h3>
        </div>
        <div class="card-body">
            <?php foreach ($orders['preparing'] as $preparing) :
                $order_details = $this->order_model->details(sanitize($preparing['code']));
                $payment_data = $this->payment_model->get_payment_data_by_order_code($preparing['code']);
            ?>
                <div class="card card-outline card-maroon">
                     <div class="row">
                        <div class="col-8">
                          <h5 class="card-title ml-1 text-sm"><b>#<?php echo sanitize($preparing['code']); ?></b></h5>
                        </div>
                        <div class="col-4">
                          <span class="d-block text-xs"><strong>@<?php echo date('h:i A', sanitize($preparing['order_preparing_at'])); ?></strong></span>
                        </div>
                      </div>

                    <div class="card-body">
                        <?php if ($payment_data['payment_method'] !='cash_on_delivery' && $payment_data['amount_to_pay'] == $payment_data['amount_paid']) : ?>
                            <div class="alert alert-light" role="alert">
                              <i class="fas fa-coins text-warning" ></i> <strong>Tip included:</strong> <strong class="text-success"><?php echo currency($preparing['tip']);?></strong>
                            </div>  <hr>              
                        <?php endif; ?>

                          <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('placed_at'); ?> : </strong> @<?php echo date('h:i A', sanitize($preparing['order_placed_at'])); ?></span>
                      
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('total_bill'); ?> : </strong>
                            <?php if (!empty($preparing['credits']) && $preparing['credits'] !== 0) : ?>
                                <?php echo currency(sanitize(format($preparing['grand_total'] - $preparing['credits']))); ?>
                            <?php else : ?>  
                                <?php echo currency(sanitize(format($preparing['grand_total']))); ?>
                            <?php endif; ?> 
                        </span>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('payment_status'); ?> : </strong>
                            <?php if ($payment_data['amount_to_pay'] == $payment_data['amount_paid']) : ?>
                                <span class="badge badge-success lighten-success"><?php echo get_phrase(sanitize('paid')); ?></span>
                            <?php else : ?>
                                <span class="badge badge-danger lighten-danger"><?php echo get_phrase(sanitize('unpaid')); ?></span>
                            <?php endif; ?>
                        </span>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('payment_method'); ?> : </strong>
                            <?php echo ucfirst(str_replace('_', ' ', sanitize($payment_data['payment_method']))); ?>
                        </span>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('ordered_came_in'); ?> : </strong>
                           <?php
                            $restaurant_ids = $this->order_model->get_restaurant_ids(sanitize($preparing['code']));
                            foreach ($restaurant_ids as $restaurant_id) :
                                $restaurant_detail = $this->restaurant_model->get_by_id(sanitize($restaurant_id)); ?>
                                <?php if (isset($restaurant_detail['id'])) : ?>
                                    ∙ <?php echo sanitize($restaurant_detail['name']); ?>
                                <?php else : ?>
                                    <span class="text-red">∙ <?php echo get_phrase("not_found"); ?></span>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </span>

                        <div class="row mt-2">
                            <div class="col-4">
                              <a href="<?php echo site_url('orders/details/' . sanitize($preparing['code'])); ?>" class="btn btn-secondary btn-block btn-sm text-xs"><i class="fas fa-info-circle"></i></a>
                            </div>
                            <div class="col-8">
                                <a href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('orders/process/' . sanitize($preparing['code']) . '/prepared'); ?>')" class="btn bg-purple btn-block btn-sm text-xs"><i class="fas fa-truck"></i> <?php echo get_phrase('Mark_as_Prepared'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (!count($orders['preparing'])) : ?>
                <h6 class="text-center"><?php echo get_phrase('no_data_found'); ?></h6>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4">
    <div class="card card-outline">
        <div class="card-header bg-purple">
            <h3 class="card-title"><i class="fas fa-truck"></i> <?php echo get_phrase('prepared_orders'); ?> (<?php echo count($orders['prepared']); ?>)</h3>
        </div>
        <div class="card-body">
            <?php foreach ($orders['prepared'] as $prepared) :
                $order_details = $this->order_model->details(sanitize($prepared['code']));
                $payment_data = $this->payment_model->get_payment_data_by_order_code($prepared['code']);
            ?>
                <div class="card card-outline card-purple">
                        <div class="row">
                            <div class="col-8">
                              <h5 class="card-title ml-1 text-sm"><b>#<?php echo sanitize($prepared['code']); ?></b></h5>
                            </div>
                            <div class="col-4">
                              <span class="d-block text-xs"><strong>@<?php echo date('h:i A', sanitize($prepared['order_prepared_at'])); ?></strong></span>
                            </div>
                          </div>

                    <div class="card-body">
                         
                            <div class="alert alert-light" role="alert">
                              <i class="fas fa-coins text-warning" ></i> <strong>Tip included:</strong> <strong class="text-success"><?php echo currency(format($prepared['tip']));?></strong>
                            </div>   <hr>         
         
                         <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('placed_at'); ?> : </strong> @<?php echo date('h:i A', sanitize($prepared['order_placed_at'])); ?></span>
                        
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('total_bill'); ?> : </strong>
                        <?php if (!empty($prepared['credits']) && $prepared['credits'] !== 0) : ?>
                                <?php echo currency(sanitize(format($prepared['grand_total'] - $prepared['credits']))); ?>
                            <?php else : ?>  
                                <?php echo currency(sanitize(format($prepared['grand_total']))); ?>
                            <?php endif; ?>   
                        </span>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('payment_status'); ?> : </strong>
                            <?php if ($payment_data['amount_to_pay'] == $payment_data['amount_paid']) : ?>
                                <span class="badge badge-success lighten-success"><?php echo get_phrase(sanitize('paid')); ?></span>
                            <?php else : ?>
                                <span class="badge badge-danger lighten-danger"><?php echo get_phrase(sanitize('unpaid')); ?></span>
                            <?php endif; ?>
                        </span>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('payment_method'); ?> : </strong>
                            <?php echo ucfirst(str_replace('_', ' ', sanitize($payment_data['payment_method']))); ?>
                        </span>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('ordered_came_in'); ?> : </strong>
                           <?php
                            $restaurant_ids = $this->order_model->get_restaurant_ids(sanitize($prepared['code']));
                            foreach ($restaurant_ids as $restaurant_id) :
                                $restaurant_detail = $this->restaurant_model->get_by_id(sanitize($restaurant_id)); ?>
                                <?php if (isset($restaurant_detail['id'])) : ?>
                                    ∙ <?php echo sanitize($restaurant_detail['name']); ?>
                                <?php else : ?>
                                    <span class="text-red">∙ <?php echo get_phrase("not_found"); ?></span>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </span>

                           <div class="row mt-2">
                            <div class="col-4">
                                <button class="btn btn-secondary btn-block btn-sm text-xs" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo site_url('orders/details/' . sanitize($prepared['code'])); ?>"><small><?php echo get_phrase("details"); ?></small></a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/orders/note/' . sanitize($prepared['code'])); ?>', '<?php echo get_phrase('add_a_note', true) ?>')"><small><?php echo get_phrase("add_a_note"); ?></small></a></li>
                                </ul>
                            </div>
                            <div class="col-8">
                               
                                    <?php if ( $payment_data['amount_to_pay'] != $payment_data['amount_paid']) : ?>
                                        <!--offline-->
                                        <a  href="javascript:void(0)"  class="btn btn-success btn-block btn-sm text-xs" onclick="showAjaxModal('<?php echo site_url('modal/popup/orders/tipping/' . sanitize($prepared['code'])); ?>', '<?php echo get_phrase('Enter_your_received_tip', true) ?>')">
                                         <i class="fas fa-coins" ></i> Tip & Paid
                                        </a>

                                    <?php else : ?>
                                        <!--online-->
                                        <a href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('orders/process/' . sanitize($prepared['code']) . '/delivered'); ?>')" class="btn btn-success btn-block btn-sm text-xs">
                                          <i class="fas fa-check-circle" ></i> <?php echo get_phrase('mark_as_delivered'); ?>
                                        </a>
                                    <?php endif; ?>
                              
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (!count($orders['prepared'])) : ?>
                <h6 class="text-center"><?php echo get_phrase('no_data_found'); ?></h6>
            <?php endif; ?>
        </div>
    </div>
</div>


<div class="col-lg-4 col-md-4">
    <div class="card card-outline">
        <div class="card-header bg-success">
            <h3 class="card-title"><i class="fas fa-check-circle" ></i> <?php echo get_phrase('delivered_orders'); ?> (<?php echo count($orders['delivered']); ?>)</h3>
        </div>
        <div class="card-body">
            <?php foreach ($orders['delivered'] as $delivered) :
                $order_details = $this->order_model->details(sanitize($delivered['code']));
                $payment_data = $this->payment_model->get_payment_data_by_order_code($delivered['code']);
                 
            ?>
                <div class="card card-outline card-success">
                      <div class="row">
                            <div class="col-8">
                              <h5 class="card-title ml-1 text-sm"><b>#<?php echo sanitize($delivered['code']); ?></b></h5>
                            </div>
                            <div class="col-4">
                              <span class="d-block text-xs"><strong>@<?php echo date('h:i A', sanitize($delivered['order_delivered_at'])); ?></strong></span>
                            </div>
                          </div>
                    <div class="card-body">
                       
                            <div class="alert alert-light" role="alert">
                              <i class="fas fa-coins text-warning" ></i> <strong>Tip included:</strong> <strong class="text-success"><?php echo currency(format($delivered['tip']));?></strong>
                            </div> <hr>           
                       
                         <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('placed_at'); ?> : </strong> @<?php echo date('h:i A', sanitize($delivered['order_placed_at'])); ?></span>
                       
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('total_bill'); ?> : </strong>
                              
                        <?php if (!empty($delivered['credits']) && $delivered['credits'] !== 0) : ?>
                                <?php echo currency(sanitize(format($delivered['grand_total'] - $delivered['credits']))); ?>
                            <?php else : ?>  
                                <?php echo currency(sanitize(format($delivered['grand_total']))); ?>
                            <?php endif; ?>    
                        </span>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('payment_status'); ?> : </strong>
                            <?php if ($payment_data['amount_to_pay'] == $payment_data['amount_paid']) : ?>
                                <span class="badge badge-success lighten-success"><?php echo get_phrase(sanitize('paid')); ?></span>
                            <?php else : ?>
                                <span class="badge badge-danger lighten-danger"><?php echo get_phrase(sanitize('unpaid')); ?></span>
                            <?php endif; ?>
                        </span>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('payment_method'); ?> : </strong>
                            <?php echo ucfirst(str_replace('_', ' ', sanitize($payment_data['payment_method']))); ?>
                        </span>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('ordered_came_in'); ?> : </strong>
                           <?php
                            $restaurant_ids = $this->order_model->get_restaurant_ids(sanitize($delivered['code']));
                            foreach ($restaurant_ids as $restaurant_id) :
                                $restaurant_detail = $this->restaurant_model->get_by_id(sanitize($restaurant_id)); ?>
                                <?php if (isset($restaurant_detail['id'])) : ?>
                                    ∙ <?php echo sanitize($restaurant_detail['name']); ?>
                                <?php else : ?>
                                    <span class="text-red">∙ <?php echo get_phrase("not_found"); ?></span>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </span>

                        <div class="row mt-2">
                            <div class="col-12">
                                <a href="<?php echo site_url('orders/details/' . sanitize($delivered['code'])); ?>" class="btn btn-success btn-block btn-sm text-xs"><i class="fas fa-info-circle"></i> <?php echo get_phrase('details'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (!count($orders['delivered'])) : ?>
                <h6 class="text-center"><?php echo get_phrase('no_data_found'); ?></h6>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php else : ?>
    <span class="text-muted" id="offline-mode">DRIVER OFFLINE</span>
<?php endif; ?>
