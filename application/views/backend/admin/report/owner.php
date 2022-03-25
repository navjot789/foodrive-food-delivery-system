<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><?php echo get_phrase('filter_orders'); ?></div>
            <div class="card-body">
                <form action="<?php echo site_url('report/index'); ?>" method="GET">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label><?php echo get_phrase('restaurant'); ?></label>
                                <select class="form-control select2 w-100" name="restaurant_id" id="restaurant_id">
                                    <option value="all" <?php if ($restaurant_id == "all") echo "selected"; ?>><?php echo get_phrase('all'); ?></option>
                                    <?php foreach ($restaurants as $key => $restaurant) : ?>
                                        <option value="<?php echo sanitize($restaurant['id']); ?>" <?php if ($restaurant_id == $restaurant['id']) echo "selected"; ?>><?php echo sanitize($restaurant['name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
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

    <div class="row">
    <?php foreach ($commissions as $key => $commission) :?>
        <?php  $restaurant_detail = $this->restaurant_model->get_by_id(sanitize($commission['restaurant_id']));
               $owner_details = $this->user_model->get_user_by_id(sanitize($restaurant_detail['owner_id']));
               if ($owner_details['role_id'] == 1) continue; ?>
                <?php $earned = $this->report_model->get_owner_comissions(sanitize($restaurant_detail['id']));?>
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title"> 
                                <a href="<?php echo site_url('site/restaurant/' . rawurlencode(sanitize($restaurant_detail['slug'])) . '/' . sanitize($restaurant_detail['id'])); ?>" target="_blank">
                                  <i class="fas fa-store"></i> <?php echo sanitize($restaurant_detail['name']); ?>
                                </a>
                            </h4>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <?php if (get_user_role('user_role', $owner_details['id']) != "admin") : ?>
                                           <a  class="text-sm" href="<?php echo site_url('owner/profile/' . sanitize($owner_details['id'])) ?>">
                                             <?php echo sanitize($owner_details['name']); ?>
                                            </a>
                                    <?php else : ?>
                                         <small><?php echo sanitize($owner_details['name']); ?></small>
                                    <?php endif; ?>
                                </h6>

                                <div class="d-flex justify-content-between mb-0">
                                    <div class="p-1 bd-highlight"><i class="fas fa-chart-line"></i> Total Sale <br> 
                                       <span class="text-success">$250</span>
                                    </div>
                                    <div class="p-1 bd-highlight"><i class="fas fa-calendar"></i> Month <br> 
                                         <span class="<?php echo  ($earned['menu_earned'] > 0) ?'text-success' :'text-danger'; ?>"> 
                                            <?php echo currency(sanitize(format(roundoff($earned['menu_earned'])))); ?>
                                        </span>
                                   </div>
                                    <div class="p-1 bd-highlight"><i class="fas fa-calendar-week"></i> Week <br> 
                                       <span class="text-success">$250</span>
                                    </div>
                                </div> 

                                <div class="d-flex justify-content-between mb-0">
                                    <div class="p-1 bd-highlight"><i class="fas fa-percentage"></i> Total Tax <br> 
                                       <span class="text-success">$250</span>
                                    </div>
                                    <div class="p-1 bd-highlight"><i class="fas fa-calendar"></i> Month <br> 
                                        
                                      <small class="<?php echo  ($earned['earned_total_tax'] > 0) ?'text-success' :'text-danger'; ?>">
                                          TOTAL:  <?php echo currency(sanitize(format(roundoff($earned['earned_total_tax'])))); ?>
                                       </small><br>
                                        <small class="<?php echo  ($earned['earned_gst'] > 0) ?'text-success' :'text-danger'; ?>">
                                           G.S.T:  <?php echo currency(sanitize(format(roundoff($earned['earned_gst'])))); ?>
                                        </small><br>
                                    
                                        <small class="<?php echo  ($earned['earned_pst'] > 0) ?'text-success' :'text-danger'; ?>">
                                           P.S.T: <?php echo currency(sanitize(format(roundoff($earned['earned_pst'])))); ?>
                                        </small>
                                      
                                    </div>
                                    <div class="p-1 bd-highlight"><i class="fas fa-calendar-week"></i> Week <br> 
                                       <span class="text-success">$250</span>
                                    </div>
                                </div> 
                            <hr>
                            <a class="card-link" href="<?php echo site_url('report/details/' . sanitize($commission['restaurant_id'])); ?>"><i class="fas fa-info-circle"></i> <?php echo get_phrase("details"); ?></a>
                            <a class="card-link" href="<?php echo site_url('report/payment_history/' . sanitize($commission['restaurant_id'])); ?>"><i class="fas fa-history"></i> <?php echo get_phrase("payment_history"); ?></a>
                            <a class="card-link" href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/report/pay/' . sanitize($commission['restaurant_id'])); ?>', '<?php echo get_phrase('pay_to_restaurant_owner', true) ?>')"><i class="fas fa-cash-register"></i> <?php echo get_phrase("payout"); ?></a>
                            </div>
                        </div>
                    </div>
                  
    <?php endforeach; ?>  
  </div>
<?php endif; ?>

<?php if (!count($commissions)) : ?>
    <?php isEmpty(); ?>
<?php endif; ?>
