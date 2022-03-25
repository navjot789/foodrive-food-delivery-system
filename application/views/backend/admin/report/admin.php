<div class="alert alert-info" role="alert">
   <strong>Note:</strong> (Restaurants & partial->Restaurants) refund amount excluded from the given calculation.
</div>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><?php echo get_phrase('filter_orders'); ?></div>
            <div class="card-body">
                <form action="<?php echo site_url('report/admin'); ?>" method="GET">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label><?php echo get_phrase('date_range'); ?></label>
                                <input type="hidden" name="date_range" id="selected-date-range-value" value="<?php echo date('F d, Y', sanitize($starting_timestamp)) . ' - ' . date('F d, Y', sanitize($ending_timestamp)); ?>">
                                <div class="input-group">
                                    <button type="button" class="btn btn-default btn-block text-left" id="daterange-btn">
                                        <i class="far fa-calendar-alt"></i> <span id="selected-date-range"><?php echo date('F d, Y', sanitize($starting_timestamp)) . ' - ' . date('F d, Y', sanitize($ending_timestamp)); ?></span>
                                        <i class="fas fa-caret-down"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label class="text-white"><?php echo get_phrase('submit'); ?></label>

                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> <?php echo get_phrase('filter'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if (count($commissions)) : ?>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo get_phrase("order_wise_commission_list_for_admin", true); ?> <small>( <?php echo sanitize(get_delivery_settings('admin_revenue')) . '% ' . sanitize(get_phrase('commission_in_each_order')); ?>)</small>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="commissions" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase("order_code"); ?></th>
                                <th><?php echo get_phrase("ordered_from"); ?></th>
                                <th><?php echo get_phrase("admin_commission"); ?></th>
                                <th>Faulter | After Refund</th>
                                <th><?php echo get_phrase("Placed at"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </thead>
                        <tbody> 
                        
                            <?php
                            $support_details = $this->report_model->get_commission_admin_owner();
                            foreach ($commissions as $key => $commission) :
                                $restaurant_detail = $this->restaurant_model->get_by_id(sanitize($commission['restaurant_id']));
                                $owner_details = $this->user_model->get_user_by_id(sanitize($restaurant_detail['owner_id']));
                                //$support_details = $this->support_model->get_by_support_id(sanitize($commission['s_id'])); 
                               
                                ?>
                            
                    
                                <tr >
                                    <td>
                                        <a href="<?php echo site_url('orders/details/' . sanitize($commission['order_code'])); ?>">#<?php echo sanitize($commission['order_code']); ?></a>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('site/restaurant/' . rawurlencode(sanitize($restaurant_detail['slug'])) . '/' . sanitize($restaurant_detail['id'])); ?>" target="_blank"><?php echo sanitize($restaurant_detail['name']); ?></a><br>
                                        <small class="text-muted">
                                            <strong><?php echo get_phrase('owner'); ?> : </strong>
                                            <?php if (get_user_role('user_role', $owner_details['id']) != "admin") : ?>
                                                <a href="<?php echo site_url('owner/profile/' . sanitize($owner_details['id'])) ?>"><?php echo sanitize($owner_details['name']); ?></a>
                                            <?php else : ?>
                                                <?php echo sanitize($owner_details['name']); ?>
                                            <?php endif; ?>
                                        </small>
                                    </td>
                                    <td class="text-success">
                                        <?php echo currency(format(sanitize($commission['admin_commission']))); ?>
                                    </td>
                                    <!--Refund_faulter-->
                                    <td class="text-center">
                                    <?php if($commission['status'] == 1) :?>   
                                            <?php  foreach($support_details as $support_detail) : ?>
                                             
                                                        <?php if($commission['order_code'] ==  $support_detail['order_code']) :?>      
                                                                <?php if(sanitize($support_detail['refund_fault']) !== 'restaurant') :?>
                                
                                                                    <span class="badge badge-pill badge-secondary"><?php  echo $support_detail['refund_fault'];?></span> 
                                                                    <span class="badge badge-pill badge-light">
                                                                    <span class="text-danger">-<?php  echo  currency(format($support_detail['system_debt']));?></span>  = 
                                                                    <?php if($support_detail['admin_earnings'] > 0):?>
                                                                            <span class="text-success">+<?php echo  currency(format($support_detail['admin_earnings']));?></span>
                                                                            <?php else : ?>
                                                                            <span class="text-danger"><?php echo  currency(format($support_detail['admin_earnings']));?></span>      
                                                                        <?php endif; ?> 
                                                                    </span> 

                                                                <?php else:?>
                                                                    <span class="badge badge-pill badge-secondary"><?php  echo $support_detail['refund_fault'];?></span> 
                                                                <?php endif;?>
                                                            <?php endif;?> 
                                                       
                                            <?php endforeach;?>
                                    <?php else:?>
                                        <span class="badge badge-pill badge-light">N/A</span>
                                    <?php endif;?>
                                    </td> 
                                    

                                    <td> 
                                        <small><i class="far fa-clock"></i> <?php echo date('h:i A', sanitize($commission['placed_at'])); ?></small><br>
                                        <small><i class="far fa-calendar-alt"></i> <?php echo date('D, d-M-Y', sanitize($commission['placed_at'])); ?></small>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn action-dropdown" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo site_url('orders/details/' . sanitize($commission['order_code'])); ?>"><i class="fas fa-info-circle" ></i> <?php echo get_phrase("order_details"); ?></a></li>
                                        
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <div class="row">

                            
                                    <!-- TILE 2 ENDS -->
                                <!-- TILE 2 STARTS -->
                                <div class="col-md-3 col-sm-6 col-12">
                                            <div class="info-box">
                                            <span class="info-box-icon bg-warning"><i class="fas fa-coins"></i></span>
                                                <div class="info-box-content">
                                                    <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('After'); ?> <small>(<?php echo get_phrase('refund'); ?>)</small></small></span>
                                                    <span class="progress-description">
                                                    System revenue
                                                    </span>
                                                    <?php $total_earnings = $this->report_model->get_admin_comissions();?>
                                                    <span class="info-box-number <?php echo  ($total_earnings > 0) ?'text-success' :'text-danger'; ?>">
                                                        <?php echo currency(format($total_earnings)); ?>
                                                    </span>
                                                </div>
                                            </div>
                                </div>
                            <!-- TILE 2 ENDS -->
                            </div>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo get_phrase("order_code"); ?></th>
                                <th><?php echo get_phrase("ordered_from"); ?></th>
                                <th><?php echo get_phrase("total_commission"); ?></th>
                                <th>Faulter | After Refund</th>
                                <th><?php echo get_phrase("Placed at"); ?></th>
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

<?php if (!count($commissions)) : ?>
    <?php isEmpty(); ?>
<?php endif; ?>