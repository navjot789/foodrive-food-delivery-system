<div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="<?php echo site_url('report/details/'.$restaurant_details['id']); ?>" method="GET">      
                            <div class="input-group justify-content-center">
                            <input type="hidden" name="date_range" id="selected-date-range-value" value="<?php echo date('F d, Y', $starting_timestamp) . ' - ' . date('F d, Y', $ending_timestamp); ?>">
                                        <div class="input-group">
                                            <button type="button" class="btn btn-default btn-block text-left" id="daterange-btn">
                                                <i class="far fa-calendar-alt"></i> <span id="selected-date-range"><?php echo date('F d, Y', $starting_timestamp) . ' - ' . date('F d, Y', $ending_timestamp); ?></span>
                                                <i class="fas fa-caret-down"></i>
                                            </button>
                                        </div>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-success mt-1 mb-2"><i class="fas fa-search"></i></button>
                                </span>
                            </div>          
                        </form>
                </div>
        </div>
    </div>
</div>

<?php if (count($commission_details)) : ?>
    <div class="alert alert-info" role="alert">
    <strong>Note:</strong> (System & partial->system) refund amount excluded from the given calculation.<br>
        <span class="text-warning">By default calculation shown as only for the current month below.</span>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo get_phrase("order_wise_commission_list_for_owner", true); ?>  
                    </h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    
                    <table id="commissions" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase("order_code"); ?></th>
                              
                                <th><?php echo get_phrase("owner_gain"); ?></th>
                                <th><?php echo get_phrase("Tax"); ?></th>
                                <th>Faulter | After Refund Earnings</th>
                                <th><?php echo get_phrase("Placed at"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </thead>
                     <tbody>
                            <?php
                            $support_details = $this->report_model->get_commission_admin_owner();
                            foreach ($commission_details as $key => $commission_detail) : 
                                 //$support_details = $this->support_model->get_by_support_id(sanitize($commission_detail['s_id']));
                                // print_r($support_details);
                              $total_tax = $commission_detail['payable_tax']+$commission_detail['payable_pst'];
                            ?>

                                <tr >
                                    <td>
                                        <a href="<?php echo site_url('orders/details/' . sanitize($commission_detail['order_code'])); ?>">#<?php echo sanitize($commission_detail['order_code']); ?></a>
                                    </td>
                                 
                                    <td class="text-success">
                                       <?php echo currency(sanitize(format($commission_detail['owner_commission']))); ?>
                                    </td>
                                     <td class="text-info">
                                       <?php echo currency(sanitize(format($total_tax))); ?>
                                    </td>
                                   
                                    <!--Refund fault-->  
                                    <td class="text-center">
                                    <?php if($commission_detail['status'] == 1) :?>   
                                        <?php  foreach($support_details as $support_detail) : ?>
                                                
                                                <?php if($commission_detail['order_code'] == $support_detail['order_code']) :?>      
                                                            <?php if(sanitize($support_detail['refund_fault']) !== 'system') :?>
                            
                                                                <span class="badge badge-pill badge-secondary"><?php  echo $support_detail['refund_fault'];?></span> 
                                                                <span class="badge badge-pill badge-light">
                                                                <span class="text-danger">Menu: -<?php  echo  currency(format($support_detail['owner_debt']));?></span>
                                                                <span class="text-danger">Tax: -<?php  echo  currency(format($support_detail['owner_payable_tax']));?></span>
                                                                = 
                                                                <span class="text-success">+<?php echo  currency(format($support_detail['owner_menu_earnings']+$support_detail['refunded_tax_earn']));?></span>
                                                                </span> 
                                                                <a class="btn btn-sm btn-outline-warning btn-rounded mb-1" href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/report/refund_reason/'. sanitize($commission_detail['s_id'])); ?>', '<?php echo get_phrase('Refund reason', true) ?>')"><i class="fas fa-question-circle" ></i></a>            
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
                                        <small><i class="far fa-clock"></i> <?php echo date('h:i A', sanitize($commission_detail['placed_at'])); ?></small><br>
                                        <small><i class="far fa-calendar-alt"></i> <?php echo date('D, d-M-Y', sanitize($commission_detail['placed_at'])); ?></small>
                                    </td>
                                  
                                    <td class="text-center">
                                   
                                 
                                         <a target = "_blank" href="<?php echo site_url('orders/details/' . sanitize($commission_detail['order_code'])); ?>" class="btn btn-sm btn-outline-primary btn-rounded"><i class="fas fa-info-circle" ></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <div class="row">
                                   <?php $earned = $this->report_model->get_owner_comissions(sanitize($restaurant_details['id']));?>
                                         <!-- TILE 1 STARTS -->
                                         <div class="col-md-3 col-sm-4 col-6">
                                                     <div class="info-box">
                                                         <span class="info-box-icon bg-success"><i class="far fa-money-bill-alt"></i></span>
                                                         <div class="info-box-content">
                                                             <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('After'); ?> <small>(<?php echo get_phrase('refund'); ?>)</small></small></span>
                                                             <span class="progress-description">
                                                                 <?php echo get_phrase('Total_Earnings', true); ?>
                                                             </span>
                                                             <span class="info-box-number <?php echo  ($earned['menu_earned'] > 0) ?'text-success' :'text-danger'; ?>">
                                                                 <?php echo currency(sanitize(format(roundoff($earned['menu_earned'])))); ?>
                                                             </span>
                                                         </div>
                                                     </div>

                                                     
                                         </div>
                                                 <!-- TILE 1 ENDS -->

                                      <!-- TILE 2 STARTS -->
                                      <div class="col-md-3 col-sm-4 col-6">
                                                     <div class="info-box">
                                                         <span class="info-box-icon bg-warning"><i class="fas fa-money-check-alt"></i></span>
                                                         <div class="info-box-content">
                                                             <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('After'); ?> <small>(<?php echo get_phrase('refund'); ?>)</small></small></span>
                                                             <span class="progress-description">
                                                               Total TAX
                                                             </span>
                                                             <span class="info-box-number <?php echo  ($earned['earned_total_tax'] > 0) ?'text-success' :'text-danger'; ?>">
                                                               <?php echo currency(sanitize(format(roundoff($earned['earned_total_tax'])))); ?>
                                                             </span>
                                                         </div>
                                                     </div>
                                         </div>
                                      <!-- TILE 2 ENDS -->

                                          <!-- TILE 3 STARTS -->
                                          <div class="col-md-3 col-sm-4 col-6">
                                                     <div class="info-box">
                                                         <span class="info-box-icon bg-warning"><i class="fas fa-money-check-alt"></i></span>
                                                         <div class="info-box-content">
                                                             <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('After'); ?> <small>(<?php echo get_phrase('refund'); ?>)</small></small></span>
                                                             <span class="progress-description">
                                                               G.S.T Collected
                                                             </span>
                                                             <span class="info-box-number <?php echo  ($earned['earned_gst'] > 0) ?'text-success' :'text-danger'; ?>">
                                                               <?php echo currency(sanitize(format(roundoff($earned['earned_gst'])))); ?>
                                                             </span>
                                                         </div>
                                                     </div>
                                         </div>
                                      <!-- TILE 3 ENDS -->

                                        <!-- TILE 4 STARTS -->
                                        <div class="col-md-3 col-sm-4 col-6">
                                                     <div class="info-box">
                                                         <span class="info-box-icon bg-warning"><i class="fas fa-money-check-alt"></i></span>
                                                         <div class="info-box-content">
                                                             <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('After'); ?> <small>(<?php echo get_phrase('refund'); ?>)</small></small></span>
                                                             <span class="progress-description">
                                                               P.S.T Collected
                                                             </span>
                                                             <span class="info-box-number <?php echo  ($earned['earned_pst'] > 0) ?'text-success' :'text-danger'; ?>">
                                                               <?php echo currency(sanitize(format(roundoff($earned['earned_pst'])))); ?>
                                                             </span>
                                                         </div>
                                                     </div>
                                         </div>
                                      <!-- TILE 4 ENDS -->


                             </div>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo get_phrase("order_code"); ?></th>
                                <th><?php echo get_phrase("owner_gain");?></th>
                                <th><?php echo get_phrase("Tax"); ?></th>
                                <th>Faulter | After Refund Earnings</th>                              
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

<?php if (!count($commission_details)) : ?>
    <?php isEmpty(); ?>
<?php endif; ?>