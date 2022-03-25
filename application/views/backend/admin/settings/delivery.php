<!-- Content Header -->
<?php include 'header.php'; ?>

<!-- Main Conten -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="alert alert-info lighten-info" role="alert">
                    <h5 class="alert-heading"><i class="icon fas fa-exclamation-triangle"></i> <?php echo get_phrase('heads_up'); ?>!</h5>
                    <p>
                        <?php echo get_phrase('this_is_the_global_delivery_cahrge'); ?> <?php echo get_phrase('for'); ?> <strong><?php echo get_phrase('each'); ?></strong> <?php echo get_phrase('restaurant'); ?>. <br>
                        <?php echo get_phrase('you_can_overwrite_the_charge_for_individual_restaurant_from_their_edit_section'); ?>.
                    </p>
                </div>
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo get_phrase('delivery_settings'); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo site_url('settings/update'); ?>" method="post">
                            <input type="hidden" name="settings_type" value="delivery">

                           

                            <div class="form-group">
                                <label for="delivery_charge"><?php echo get_phrase("base_delivery_charge") . ' (' . currency_code_and_symbol('code') . ')'; ?></label>
                                <input type="number" id="delivery_charge" class="form-control" name="delivery_charge" placeholder="<?php echo get_phrase("enter_a_convenient_delivery_charge"); ?>" value="<?php echo sanitize(get_delivery_settings('delivery_charge')); ?>"  min="0" required>
                            </div>

                            <div class="form-group">
                                <label for="delivery_charge"><?php echo get_phrase("base_distance_in_meters"); ?></label>
                                <input type="number" id="base_meter" class="form-control" name="base_meter" placeholder="<?php echo get_phrase("enter_a_convenient_distance_in_meter"); ?>" value="<?php echo sanitize(get_delivery_settings('base_meter')); ?>" min="0" required>
                                <small class="text-muted">Under <?php echo sanitize(get_delivery_settings('base_meter')); ?>m customer will charge with <?php echo currency(sanitize(get_delivery_settings('delivery_charge'))); ?> delivery fee.</small>
                            </div>

                            <div class="form-group">

                                    <div class="row">
                                        <div class="col-md-6">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="time" id="time-1" value="max" 
                                                  <?php if(substr_count (sanitize(get_delivery_settings('maximum_time_to_deliver')), ':'))
                                                                echo "checked"; ?>>

                                                  <label class="form-check-label" for="exampleRadios1">
                                                    Maximum time to deliver (00:45 mins)
                                                  </label>
                                                </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="time" id="time-2" value="avg" 
                                                  <?php if(substr_count (sanitize(get_delivery_settings('maximum_time_to_deliver')), '-'))
                                                                echo "checked"; ?>>

                                                  <label class="form-check-label" for="exampleRadios1">
                                                    Avg time to deliver (30-45 mins)
                                                  </label>
                                                </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-light" role="alert">
                                            <center> <i class="fas fa-clock" ></i> <span class="text-success">
                                                <?php 
                                                if (!empty(sanitize(get_delivery_settings('maximum_time_to_deliver')))) {
                                                    if(substr_count (sanitize(get_delivery_settings('maximum_time_to_deliver')), ':')){
                                                          echo sanitize(get_delivery_settings('maximum_time_to_deliver'));
                                                      }elseif (substr_count (sanitize(get_delivery_settings('maximum_time_to_deliver')), '-')) {
                                                          echo sanitize(get_delivery_settings('maximum_time_to_deliver'));
                                                      }else{
                                                          echo "<span class='text-danger'>Invalid time format!</span>";
                                                      }
                                                }else{

                                                    echo "<span class='text-danger'>Not defined!</span>";
                                                }
                                                ?>
                                            </div
                                          
                                               </span> 
                                           </center>
                                        </div>
                                    </div>

                                 <div id="max-time-selection" style="display: none">
                                    <div class="form-group clockpicker">
                                        <label for="maximum_time_to_deliver"><?php echo get_phrase("maximum_time_to_deliver"); ?></label>
                                        <input type="text" class="form-control" id="maximum_time_to_deliver" name="maximum_time_to_deliver" placeholder="<?php echo get_phrase("provide_maximum_time_to_deliver"); ?> (hh:mm) " value="<?php if(substr_count (sanitize(get_delivery_settings('maximum_time_to_deliver')), ':'))
                                                                 echo sanitize(get_delivery_settings('maximum_time_to_deliver')); ?>">
                                    </div>
                              </div>

                              <div id="avg-time-selection" style="display: none">
                                    <div class="form-group ">
                                        <label for="avg_time_to_deliver"><?php echo get_phrase("average_time_to_deliver"); ?></label>
                                        <input type="text" class="form-control" id="avg_time_to_deliver" name="avg_time_to_deliver" placeholder="20-30" value="<?php if(substr_count (sanitize(get_delivery_settings('maximum_time_to_deliver')), '-'))
                                                                 echo sanitize(get_delivery_settings('maximum_time_to_deliver')); ?>">
                                    </div>
                              </div> 

                        
                            <button class="btn btn-primary"><?php echo get_phrase('update_delivery_data'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>