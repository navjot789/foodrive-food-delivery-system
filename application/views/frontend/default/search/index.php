<!-- NAVIGATION BAR -->
<?php include APPPATH . 'views/frontend/default/navigation/dark.php'; ?>
<!--============================= RESERVE A SEAT =============================-->
<section class="reserve-block">
    <div class="container">
        <div class="row">
        
             <div class="col-md-12 responsive-wrap">
                <div class="row detail-filter-wrap">
                  <div class="col-md-4 featured-responsive">
                    <div class="detail-filter-text">
                      <p>
                         <h5><?php echo sanitize($total_rows); ?> Search results for: "<?php echo sanitize($_GET['query']); ?>"</h5>
                      </p>
                    </div>
                  </div>   
                </div>
              </div>
        </div>
    </div>
</section>
<!--//END RESERVE A SEAT -->
<!--============================= BOOKING DETAILS =============================-->
<section class="light-bg booking-details_wrap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              
                      
            <?php
           

        if(!empty($search_result)) {
     
            foreach ($search_result as $menu) : ?> 

                    
                     <div class="col-md-3 d-inline-block">  
                      <div class="row p-2 bg-white border rounded mt-2 mb-2" style="min-height: 120px;">
                        <div class="col-4 mt-1">
                          <img class="img-fluid img-responsive rounded product-image" src="<?php echo base_url('uploads/menu/' . sanitize($menu->thumbnail)); ?>">
                        </div>
                        <div class="col-5 mt-1">
                          <span class="text-primary " data-toggle="tooltip" data-placement="top" title="<?php echo sanitize($menu->name); ?>">
                            <p class="text-truncate p-0 m-0"><?php echo sanitize($menu->name); ?></p>
                          </span>


                          <!-- PRICE SECTION -->

                          <!-- IF SERVINGS IS MENU -->
                          <?php if ($menu->servings == "menu") : ?>
                            <?php if (has_discount($menu->id)) : ?>
                              <div class="d-flex flex-wrap flex-row align-items-center">
                                <h4 class="mr-1 text-success h6"><?php echo currency(get_menu_price($menu->id)); ?></h4>
                                <small class="strike-text mb-2"><?php echo currency(sanitize(get_menu_price($menu->id, "menu", "actual_price"))); ?></small>
                              </div>
                              <?php else : ?>
                               <div class="d-flex flex-row align-items-center">
                                <h4 class="mr-1 text-success h6"><?php echo currency(sanitize(get_menu_price($menu->id))); ?></h4>
                              </div>
                            <?php endif; ?>
                            <!-- IF SERVINGS IS PLATE -->
                            <?php else : ?>
                               <!-- IF SERVINGS IS LARGE -->
                             <?php if (has_discount($menu->id, "full_plate")) : ?>
                              <div class="d-flex flex-wrap flex-row align-items-center">
                                <small class="m-0 p-0">L:</small>
                                <small class="mr-1 text-success "> <?php echo currency(sanitize(get_menu_price($menu->id, "full_plate"))); ?></small>
                                <small class="strike-text"><?php echo currency(get_menu_price($menu->id, "full_plate", "actual_price")); ?></small>
                              </div>

                              <?php else : ?>
                                <div class="d-flex flex-wrap flex-row align-items-center">
                                 <small class="m-0 p-0">L:</small>
                                 <small class="mr-1 text-success"> <?php echo currency(sanitize(get_menu_price($menu->id, "full_plate"))); ?></small>
                               </div>
                             <?php endif; ?>
                            <!-- IF SERVINGS IS MEDIUM -->
                              <?php if (has_discount($menu->id, "medium_plate")) : ?>
                              <div class="d-flex flex-wrap flex-row align-items-center">
                                <small class="m-0 p-0">M:</small>
                                <small class="mr-1 text-success"> <?php echo currency(sanitize(get_menu_price($menu->id, "medium_plate"))); ?></small>
                                <small class="strike-text"><?php echo currency(get_menu_price($menu->id, "medium_plate", "actual_price")); ?></small>
                              </div>

                              <?php else : ?>
                                   <?php  $medium_price = get_menu_price($menu->id, "medium_plate");
                                        if (isset($medium_price) && !empty($medium_price)) : ?>
                                            <div class="d-flex flex-wrap flex-row align-items-center">
                                             <small class="m-0 p-0">M:</small>
                                             <small class="mr-1 text-success small"> <?php echo currency(sanitize(get_menu_price($menu->id, "medium_plate"))); ?></small>
                                           </div>
                                    <?php else : ?>
                                    <?php endif; ?>
                                      
                             <?php endif; ?>
                              <!-- IF SERVINGS IS SMALL -->
                             <?php if (has_discount($menu->id, "half_plate")) : ?>
                              <div class="d-flex flex-wrap flex-row align-items-center">
                               <small class="m-0 p-0">S:</small>
                               <small class="mr-1 text-success"> <?php echo currency(sanitize(get_menu_price($menu->id, "half_plate"))); ?></small>
                               <small class="strike-text"><?php echo currency(get_menu_price($menu->id, "half_plate", "actual_price")); ?></small>
                             </div>

                             <?php else : ?>
                              <div class="d-flex flex-wrap flex-row align-items-center">
                               <small class="m-0 p-0">S:</small>
                               <small class="mr-1 text-success"> <?php echo currency(sanitize(get_menu_price($menu->id, "half_plate"))); ?></small>
                             </div>
                           <?php endif; ?>

                         <?php endif; ?>


                         <p class="text-justify text-truncate para mb-0">
                          <?php $menu_details = $this->menu_model->get_by_id($menu->id); ?>
                          <?php if (!empty($menu_details['details'])) : ?>
                            <?php echo sanitize($menu_details['details']); ?>
                            <?php else : ?>
                             <?php echo 'Item description not found.'; ?>
                           <?php endif; ?>
                         </p>



                       </div>
                       <div class="align-items-center align-content-center col-3 border-left mt-1">


                         <!-- DETAIL ICON -->
                         <div class="d-flex flex-column mt-1">
                          <a href="javascript:void(0)" onclick="showModalWithHeader('<?php echo site_url('modal/showup/restaurant/menu/' . $menu->id); ?>', '<?php echo sanitize($menu->name); ?>')" class="btn btn-primary btn-sm txt-wrp-on-btn">
                            <i class="fas fa-info-circle" ></i> 
                          </a>

                      

                          <!-- ADD TO CART -->
                          <?php if ($menu->availability) : ?>
                            <div class="closed-now">

                               <a href="javascript:void(0)" class=" btn btn-outline-success btn-sm mt-2 btn-block txt-wrp-on-btn" onclick="showCartModal('<?php echo site_url('modal/showup/restaurant/cart/' . $menu->id); ?>', '<?php echo site_phrase('add_to_cart'); ?>')"> <span class="fas fa-shopping-cart"></span></a>
                         </div>
                         <?php else : ?>
                          <!--unavailable-->
                          <div class="closed-now">
                               <button class="btn btn-danger btn-sm mt-2 btn-block" > <span class="fas fa-times-circle"></span>
                                </button>
                            </div>
                        <?php endif; ?>

                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; 
                    }else {
               ?>

               <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="error-template text-center">
                          
                            <h2>404 Not Found</h2>
                            <div class="error-details">
                                Sorry, an error has occured, Search item not found!
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>


              <?php
                    }
              ?>  

               <div class="row justify-content-center light-bg detail-options-wrap">
                <?php echo $this->pagination->create_links(); ?>
              </div>      
            </div>
        </div>
    </div>
</section>