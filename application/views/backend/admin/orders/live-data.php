<style>
    ::-webkit-scrollbar {
  height: 3px;              /* height of horizontal scrollbar  */
  width: 4px;               /* width of vertical scrollbar */
  border: 0.5px solid #d5d5d5;
}
::-webkit-scrollbar-thumb:horizontal{
        background: #363636;
        border-radius: 10px;
    }
</style>

<div class="col-lg-3 col-md-3">
    <div class="card card-outline">
        <div class="card-header bg-warning">
            <h3 class="card-title"><i class="fas fa-clock"></i>  <?php echo get_phrase('pending_orders'); ?> (<?php echo count($orders['pending']); ?>)</h3>
        </div>
        <div class="card-body">
            <?php //print_r($orders);?>
            <?php foreach ($orders['pending'] as $pending) :
                  $order_details = $this->order_model->details(sanitize($pending['code']));
                  $payment_data = $this->payment_model->get_payment_data_by_order_code($pending['code']);
                  $ordered_items = $this->order_model->details($pending['code']);
            ?>
                <div class="card card-outline card-warning">
                     <div class="row">
                        <div class="col-8">
                          <h5 class="card-title ml-1 text-sm"><b>#<?php echo sanitize($pending['code']); ?></b></h5>
                        </div>
                        <div class="col-4">
                          <span class="d-block text-xs"><strong>@<?php echo date('h:i A', sanitize($pending['order_placed_at'])); ?></strong></span>
                        </div>
                      </div>


                    <div class="card-body">
                        <?php if (empty($pending['driver_id'])) :?>    
                            <div class="alert alert-warning p-0" role="alert">
                             Foodriver Assign : <a href="<?php echo site_url('orders/details/'.$pending['code'].'#assign_driver');?>" class="alert-link"> Click here</a>
                            </div>
                        <?php endif;?>

                         <?php if ($payment_data['payment_method'] =='stripe' && $payment_data['amount_to_pay'] == $payment_data['amount_paid']) : ?>
                            <div class="alert alert-light" role="alert">
                              <i class="fas fa-coins text-warning" ></i> <strong>Tip included:</strong> <strong class="text-success"><?php echo currency($pending['tip']);?></strong>
                            </div>            
                        <?php endif; ?>
                    
                         <?php foreach ($ordered_items as $key => $ordered_item) :
                            $menu_details = $this->menu_model->get_by_id(sanitize($ordered_item['menu_id']));
                             ?>
  
                            <div style="overflow-x: auto;white-space: nowrap;">   
                                <ul class="list-inline m-0">     
                                    <li>
                                        <?php if ($ordered_item['note'] && !empty($ordered_item['note'])) : ?>
                                            <li class="list-inline-item">
                                                <a href="javascript:void(0)"  data-trigger="focus" data-toggle="popover" data-html="true" title="Note" 
                                                data-content="<?php echo sanitize($ordered_item['note']);?>">
                                                <span class="badge badge-success lighten-warning"><i class="fas fa-info-circle" ></i></span>
                                                </a> 
                                            </li>
                                        <?php endif; ?>
                                        <li class="list-inline-item"><span class="badge badge-danger lighten-info">X<?php echo sanitize($ordered_item['quantity']); ?></span></li>
                                        <li class="list-inline-item"><span class="badge badge-danger lighten-info"> <?php echo sanitize($menu_details['name']); ?></span></li>
                                        <li class="list-inline-item"><span class="badge badge-success lighten-success"><?php echo currency(sanitize(format($ordered_item['total']))); ?></span></li>
                                    
                                        <ul class="text-xs m-0">
                                        
                                            <?php if (!empty($ordered_item['variant_id'])) : ?>
                                                <!--Variants-->
                                                    <?php
                                                        $variant_exploded = explode(',', $ordered_item['variant_id']);
                                                        foreach ($variant_exploded as $key => $variant) {
                                                            $variant_details = $this->db->get_where('variants', ['id' => $variant])->row_array();
                                                            echo '<li><span class="badge badge-success lighten-danger"> - '.ucfirst(sanitize($variant_details['variant'])). '</span></li>';
                                                           
                                                        }
                                                    ?>                                           
                                            <?php endif; ?>

                                            <?php if (!empty($ordered_item['addons'])) : ?> <!--Addons-->
                                                <?php
                                                $addons_exploded = explode(',', $ordered_item['addons']);
                                                foreach ($addons_exploded as $key => $addon) {
                                                    $addon_details = $this->db->get_where('addons', ['aid' => $addon])->row_array();
                                                    echo '<li><span class="badge badge-success lighten-danger"> - '.ucfirst(sanitize($addon_details['addon_name'])). '</span></li>';
                                                }
                                                ?>                                           
                                            <?php endif; ?>  
                                        </ul>
                                    </li>
                                
                                </ul>             
                            </div>

                        <?php endforeach; ?>  
                     
                        <hr>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('placed_at'); ?> : </strong> @<?php echo date('h:i A', sanitize($pending['order_placed_at'])); ?></span>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('ordered_items'); ?> : </strong> <?php echo count($order_details); ?></span>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('total_bill'); ?> : </strong>
                            <?php if (!empty($pending['credits']) && $pending['credits'] !== 0) : ?>
                                <?php echo currency(sanitize(format($pending['grand_total'] - $pending['credits']))); ?>
                            <?php else : ?>  
                                <?php echo currency(sanitize(format($pending['grand_total']))); ?>
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
                            $restaurant_ids = $this->order_model->get_restaurant_ids(sanitize($pending['code']));
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
                                <a href="<?php echo site_url('orders/details/' . sanitize($pending['code'])); ?>" class="btn btn-secondary btn-block btn-sm text-xs"><i class="fas fa-info-circle"></i></a>
                            </div>
                            <div class="col-8">
                             <a href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('orders/process/' . sanitize($pending['code']) . '/preparing'); ?>')" class="btn bg-maroon btn-block btn-sm text-xs"><i class="fas fa-fire"></i> <?php echo get_phrase('Mark_as_preparing'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (!count($orders['pending'])) : ?>
                <h6 class="text-center"><?php echo get_phrase('no_data_found'); ?></h6>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-3">
    <div class="card card-outline">
        <div class="card-header bg-maroon">
            <h3 class="card-title"><i class="fas fa-fire"></i> <?php echo get_phrase('preparing_orders'); ?> (<?php echo count($orders['preparing']); ?>)</h3>
        </div>
        <div class="card-body">
            <?php foreach ($orders['preparing'] as $preparing) :
                $order_details = $this->order_model->details(sanitize($preparing['code']));
                $payment_data = $this->payment_model->get_payment_data_by_order_code($preparing['code']);
                $ordered_items = $this->order_model->details($preparing['code']);
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
                           <?php if (empty($preparing['driver_id'])) :?>    
                            <div class="alert alert-warning p-0" role="alert">
                               <i class="fas fa-biking" ></i> Assign soon...
                            </div>
                        <?php endif;?>


                     <?php foreach ($ordered_items as $key => $ordered_item) :
                            $menu_details = $this->menu_model->get_by_id(sanitize($ordered_item['menu_id']));
                             ?>

                            <div style="overflow-x: auto;white-space: nowrap;">   
                            <ul class="list-inline m-0">     
                                <li>
                                    <?php if ($ordered_item['note'] && !empty($ordered_item['note'])) : ?>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)"  data-trigger="focus" data-toggle="popover" data-html="true" title="Note" 
                                               data-content="<?php echo sanitize($ordered_item['note']);?>">
                                               <span class="badge badge-success lighten-warning"><i class="fas fa-info-circle" ></i></span>
                                            </a> 
                                        </li>
                                    <?php endif; ?>
                                    <li class="list-inline-item"><span class="badge badge-danger lighten-info">X<?php echo sanitize($ordered_item['quantity']); ?></span></li>
                                    <li class="list-inline-item"><span class="badge badge-danger lighten-info"> <?php echo sanitize($menu_details['name']); ?></span></li>
                                    <li class="list-inline-item"><span class="badge badge-success lighten-success"><?php echo currency(sanitize(format($ordered_item['total']))); ?></span></li>
                                  
                                    <ul class="text-xs m-0">
                                    <?php if (!empty($ordered_item['variant_id'])) : ?>
                                                <!--Variants-->
                                                    <?php
                                                        $variant_exploded = explode(',', $ordered_item['variant_id']);
                                                        foreach ($variant_exploded as $key => $variant) {
                                                            $variant_details = $this->db->get_where('variants', ['id' => $variant])->row_array();
                                                            echo '<li><span class="badge badge-success lighten-danger"> - '.ucfirst(sanitize($variant_details['variant'])). '</span></li>';
                                                           
                                                        }
                                                    ?>                                           
                                            <?php endif; ?>

                                        <?php if (!empty($ordered_item['addons'])) : ?> <!--Addons-->
                                            <?php
                                            $addons_exploded = explode(',', $ordered_item['addons']);
                                            foreach ($addons_exploded as $key => $addon) {
                                                $addon_details = $this->db->get_where('addons', ['aid' => $addon])->row_array();
                                                echo '<li><span class="badge badge-success lighten-danger"> - '.ucfirst(sanitize($addon_details['addon_name'])). '</span></li>';
                                            }
                                            ?>                                           
                                        <?php endif; ?>  
                                    </ul>
                                </li>
                            
                            </ul>             
                        </div>
                        <?php endforeach; ?> 
                     

                         <hr>
                          <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('placed_at'); ?> : </strong> @<?php echo date('h:i A', sanitize($preparing['order_placed_at'])); ?></span>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('ordered_items'); ?> : </strong> <?php echo count($order_details); ?></span>
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

<div class="col-lg-3 col-md-3">
    <div class="card card-outline">
        <div class="card-header bg-purple">
            <h3 class="card-title"><i class="fas fa-truck"></i> <?php echo get_phrase('prepared_orders'); ?> (<?php echo count($orders['prepared']); ?>)</h3>
        </div>
        <div class="card-body">
            <?php foreach ($orders['prepared'] as $prepared) :
                $order_details = $this->order_model->details(sanitize($prepared['code']));
                $payment_data = $this->payment_model->get_payment_data_by_order_code($prepared['code']);
                $ordered_items = $this->order_model->details($prepared['code']);
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
                       <?php if (empty($prepared['driver_id'])) :?>    
                            <div class="alert alert-warning p-0" role="alert">
                             Foodriver Assign : <a href="<?php echo site_url('orders/details/'.$prepared['code'].'#assign_driver');?>" class="alert-link"> Click here</a>
                            </div>
                        <?php endif;?>

                         <?php if ($payment_data['payment_method'] =='stripe' && $payment_data['amount_to_pay'] == $payment_data['amount_paid']) : ?>
                            <div class="alert alert-light" role="alert">
                              <i class="fas fa-coins text-warning" ></i> <strong>Tip included:</strong> <strong class="text-success"><?php echo currency($prepared['tip']);?></strong>
                            </div>            
                        <?php endif; ?>
                        
                          
                         <?php foreach ($ordered_items as $key => $ordered_item) :
                            $menu_details = $this->menu_model->get_by_id(sanitize($ordered_item['menu_id']));
                             ?>

                            <div style="overflow-x: auto;white-space: nowrap;">   
                            <ul class="list-inline m-0">     
                                <li>
                                    <?php if ($ordered_item['note'] && !empty($ordered_item['note'])) : ?>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)"  data-trigger="focus" data-toggle="popover" data-html="true" title="Note" 
                                               data-content="<?php echo sanitize($ordered_item['note']);?>">
                                               <span class="badge badge-success lighten-warning"><i class="fas fa-info-circle" ></i></span>
                                            </a> 
                                        </li>
                                    <?php endif; ?>
                                    <li class="list-inline-item"><span class="badge badge-danger lighten-info">X<?php echo sanitize($ordered_item['quantity']); ?></span></li>
                                    <li class="list-inline-item"><span class="badge badge-danger lighten-info"> <?php echo sanitize($menu_details['name']); ?></span></li>
                                    <li class="list-inline-item"><span class="badge badge-success lighten-success"><?php echo currency(sanitize(format($ordered_item['total']))); ?></span></li>
                                  
                                    <ul class="text-xs m-0">
                                          <?php if (!empty($ordered_item['variant_id'])) : ?>
                                                <!--Variants-->
                                                    <?php
                                                        $variant_exploded = explode(',', $ordered_item['variant_id']);
                                                        foreach ($variant_exploded as $key => $variant) {
                                                            $variant_details = $this->db->get_where('variants', ['id' => $variant])->row_array();
                                                            echo '<li><span class="badge badge-success lighten-danger"> - '.ucfirst(sanitize($variant_details['variant'])). '</span></li>';
                                                           
                                                        }
                                                    ?>                                           
                                            <?php endif; ?>

                                        <?php if (!empty($ordered_item['addons'])) : ?> <!--Addons-->
                                            <?php
                                            $addons_exploded = explode(',', $ordered_item['addons']);
                                            foreach ($addons_exploded as $key => $addon) {
                                                $addon_details = $this->db->get_where('addons', ['aid' => $addon])->row_array();
                                                echo '<li><span class="badge badge-success lighten-danger"> - '.ucfirst(sanitize($addon_details['addon_name'])). '</span></li>';
                                            }
                                            ?>                                           
                                        <?php endif; ?>  
                                    </ul>
                                </li>
                            
                            </ul>             
                        </div>
                        <?php endforeach; ?> 

                         <hr>
                         <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('placed_at'); ?> : </strong> @<?php echo date('h:i A', sanitize($prepared['order_placed_at'])); ?></span>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('ordered_items'); ?> : </strong> <?php echo count($order_details); ?></span>
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
                            <div class="col-12">
                                <a href="<?php echo site_url('orders/details/' . sanitize($prepared['code'])); ?>" class="btn btn-secondary btn-block btn-sm text-xs"><i class="fas fa-info-circle"></i> <?php echo get_phrase('details'); ?></a>
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


<div class="col-lg-3 col-md-3">
    <div class="card card-outline">
        <div class="card-header bg-success">
            <h3 class="card-title"><i class="fas fa-check-circle" ></i> <?php echo get_phrase('delivered_orders'); ?> (<?php echo count($orders['delivered']); ?>)</h3>
        </div>
        <div class="card-body">
            <?php foreach ($orders['delivered'] as $delivered) :
                $order_details = $this->order_model->details(sanitize($delivered['code']));
                $payment_data = $this->payment_model->get_payment_data_by_order_code($delivered['code']);
                  $ordered_items = $this->order_model->details($delivered['code']);
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
                           <?php if (empty($delivered['driver_id'])) :?>    
                            <div class="alert alert-danger p-0" role="alert">
                             Foodriver Assign : <a href="<?php echo site_url('orders/details/'.$delivered['code'].'#assign_driver');?>" class="alert-link"> Click here</a>
                            </div>
                        <?php endif;?>
                        
                            <div class="alert alert-light p-0" role="alert">
                              <i class="fas fa-coins text-warning" ></i> <strong>Tip included:</strong> <strong class="text-success"><?php echo currency(format($delivered['tip']));?></strong>
                            </div>            
                      
                         <?php foreach ($ordered_items as $key => $ordered_item) :
                            $menu_details = $this->menu_model->get_by_id(sanitize($ordered_item['menu_id']));
                             ?>

                        <div style="overflow-x: auto;white-space: nowrap;">   
                            <ul class="list-inline m-0">     
                                <li>
                                    <?php if ($ordered_item['note'] && !empty($ordered_item['note'])) : ?>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)"  data-trigger="focus" data-toggle="popover" data-html="true" title="Note" 
                                               data-content="<?php echo sanitize($ordered_item['note']);?>">
                                               <span class="badge badge-success lighten-warning"><i class="fas fa-info-circle" ></i></span>
                                            </a> 
                                        </li>
                                    <?php endif; ?>
                                    <li class="list-inline-item"><span class="badge badge-danger lighten-info">X<?php echo sanitize($ordered_item['quantity']); ?></span></li>
                                    <li class="list-inline-item"><span class="badge badge-danger lighten-info"> <?php echo sanitize($menu_details['name']); ?></span></li>
                                    <li class="list-inline-item"><span class="badge badge-success lighten-success"><?php echo currency(sanitize(format($ordered_item['total']))); ?></span></li>
                                 
                                    <ul class="text-xs m-0">
                                    <?php if (!empty($ordered_item['variant_id'])) : ?>
                                                <!--Variants-->
                                                    <?php
                                                    
                                                        $variant_exploded = explode(',', $ordered_item['variant_id']);
                                                        foreach ($variant_exploded as $key => $variant) {
                                                            $variant_details = $this->db->get_where('variants', ['id' => $variant])->row_array();
                                                            echo '<li><span class="badge badge-success lighten-danger"> - '.ucfirst(sanitize($variant_details['variant'])). '</span></li>';
                                                           
                                                        }
                                                    ?>                                           
                                            <?php endif; ?>

                                        <?php if (!empty($ordered_item['addons'])) : ?> <!--Addons-->
                                            <?php
                                            $addons_exploded = explode(',', $ordered_item['addons']);
                                            foreach ($addons_exploded as $key => $addon) {
                                                $addon_details = $this->db->get_where('addons', ['aid' => $addon])->row_array();
                                                echo '<li><span class="badge badge-success lighten-danger"> - '.ucfirst(sanitize($addon_details['addon_name'])). '</span></li>';
                                            }
                                            ?>                                           
                                        <?php endif; ?>  
                                    </ul>
                                </li>
                            
                            </ul>             
                        </div>
                        <?php endforeach; ?> 

                         <hr>

                         <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('placed_at'); ?> : </strong> @<?php echo date('h:i A', sanitize($delivered['order_placed_at'])); ?></span>
                        <span class="d-flex text-xs justify-content-between align-items-center"><strong><?php echo get_phrase('ordered_items'); ?> : </strong> <?php echo count($order_details); ?></span>
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


