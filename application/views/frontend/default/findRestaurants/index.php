<!-- NAVIGATION BAR -->
<?php include APPPATH . 'views/frontend/default/navigation/dark.php'; ?>
<!--============================= DETAIL =============================-->
<!-- RESTAURANT GALLERY -->
<div class="container-fluid">
    <?php  include 'gallery.php'; ?>
</div>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 responsive-wrap">

                <h5 class="d-block text-center"><strong><?php echo sanitize($page_header); ?></strong></h5>

                <!-- EMERGENCY ALERTS 
                <div class="row p-0">
                    <div class="col-md-12  p-0">
                        <div class="alert alert-warning mt-2 ml-2 mr-2" role="alert">
                            <i class="fas fa-snowplow" ></i> Due to heavy snow, We have to close the delivery for a moment. We apologize for this inconvenience.
                            </div>
                        </div>
                    </div>-->

                <!-- APP BANNER-->
                <div class="container-fluid mb-2">  
                    <div class="row  p-0 ">
                        <div class="col-md-12  p-0 ">
                            <a href="https://play.google.com/store/apps/details?id=ca.foodrive.foodrive" target="_blank">
                                <img alt="foodrive android app" src="https://ik.imagekit.io/l4f8iqzrdp1c/Foodrive_graphics/Banner/ANDROID_APPFD_BANNER_copy_reduced_FpI2ASrWA.jpg?ik-sdk-version=javascript-1.4.3&updatedAt=1643199254274" 
                                class="img-fluid rounded restaurant-thumbnail "/>
                            </a>
                        </div>
                    </div>
                </div> 

                <!-- RESTAURANT LIST STARTS -->
                <div class="row justify-content-center light-bg detail-options-wrap">
                     
                    <?php foreach ($restaurants as $key => $restaurant) : ?>

                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 featured-responsive mb-1">
                        <div class="card-thumb bg-white border-upper-radius border-downer-radius">
                            <div class="thumb-container">
                                <a href="<?php echo site_url('site/restaurant/' . sanitize(rawurlencode($restaurant->slug)) . '/' . sanitize($restaurant->id)); ?>"
                                    class="thumb-anchor">
                                       <div class="thumb-promoted-container">
                                          <div class="thumb-promoted">
                                          <?php $schedule = json_decode($restaurant->schedule, true);
                                                          $today = strtolower(date('l'));?>
                                                <?php if (is_open($restaurant->id)) : ?>
                                                        <strong>
                                                            <?php if (!isset($schedule[$today . '_opening']) || $schedule[$today . '_opening'] == "closed") : ?>
                                                                 <?php echo site_phrase('closed'); ?> today
                                                            <?php else : ?>
                                                                close at :<?php echo date("h:i A", strtotime($schedule[$today . '_closing'])); ?>
                                                            <?php endif; ?>
                                                        </strong>
                                                <?php else : ?>
                                                       <strong>
                                                        
                                                        <?php if (!isset($schedule[$today . '_opening']) || $schedule[$today . '_opening'] == "closed") : ?>
                                                                <?php echo site_phrase('closed'); ?> today
                                                        <?php else : ?>
                                                            Open at :  <?php echo date("h:i A", strtotime($schedule[$today . '_opening'])); ?> 
                                                        <?php endif; ?>
                                                    </strong>
                                                <?php endif; ?>
                                          </div>
                                        </div>
                                    <div height="24.8rem" width="100%" class="restaurant-thumb-container">
                                        <img alt="Restaurant Card"
                                            src="<?php echo base_url('uploads/restaurant/thumbnail/' . sanitize($restaurant->thumbnail)); ?>"
                                            class="img-fluid rounded restaurant-thumbnail">
                                    </div>
                                    <div class="thumb-left-badge-container">

                                        <?php if ($restaurant->delivery_charge < 0.01) : ?>
                                        <p class="thum-left-badge-1 btn-success"><strong>FREE DELIVERY</strong></p>
                                        <?php endif; ?>

                                        <?php if (is_open($restaurant->id)) : ?>
                                           <p class="thum-left-badge-1 btn-success"><strong>OPEN NOW</strong></p>
                                        <?php else : ?>
                                           <p class="thum-left-badge-1 btn-danger"><strong>CLOSED</strong></p>
                                        <?php endif; ?>

                                    </div>
                                    <p class="thum-right-badge-1">
                                        <small><i class="fas fa-stopwatch text-success"></i>
                                            <?php echo sanitize(maximum_time_to_deliver($restaurant->id)); ?>
                                            min</small>
                                    </p>
                                </a>
                            </div>


                            <div class="featured-title-box">

                                <div class="d-flex">
                                    <div>
                                        <h6><?php echo sanitize($restaurant->name); ?></h6>
                                    </div>
                                    <div class="ml-auto">
                                        <?php if ($restaurant->rating >= 4) : ?>
                                        <span
                                            class="badge badge-success p-1 text-white"><?php echo sanitize($restaurant->rating); ?>
                                            <i class="fas fa-star"></i></span>
                                        <?php elseif ($restaurant->rating > 2 && $restaurant->rating < 4) : ?>
                                        <span
                                            class="badge badge-warning p-1 text-white"><?php echo sanitize($restaurant->rating); ?>
                                            <i class="fas fa-star"></i></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <p>
                                    <?php if (!empty($restaurant->about)) : ?>
                                    <?php echo sanitize($restaurant->about); ?>
                                    <?php endif; ?>
                                </p>

                            </div>

                        </div>
                    </div>
                    
                    <?php endforeach; ?>
                </div>

                <?php if (count($restaurants) == 0) : ?>
                <div class="row justify-content-center light-bg detail-options-wrap">
                    <h3><?php echo site_phrase('no_restaurant_found_in_the_given_address'); ?></h3>
                </div>
                <?php endif; ?>
                <div class="row justify-content-center light-bg detail-options-wrap">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
                <!-- RESTAURANT LIST ENDS -->
            </div>
        </div>
    </div>
</section>
<!--//END DETAIL -->