<!-- NAVIGATION BAR -->
<?php include APPPATH . 'views/frontend/default/navigation/dark.php'; ?>

<!-- RESTAURANT TITLE HEADER -->
<section class="reserve-block">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h5 class="mb-3">
          <?php echo sanitize($restaurant_details['name']); ?>
            <small>  <?php if (!empty($restaurant_details['schedule'])) : ?>   
                              <?php if (is_open($restaurant_details['id'])) : ?>
                                <span class="badge badge-pill badge-success"><?php echo strtoupper(site_phrase('open_now')); ?></span>
                              <?php else : ?>
                              <span class="badge badge-pill badge-danger"><?php echo strtoupper(site_phrase('close_now')); ?></span>
                              <?php endif; ?>
                          <?php else : ?>
                          <?php echo site_phrase('not_found'); ?>
                      <?php endif; ?>
              </small>
              <?php if ($restaurant_details['rating'] > 0) : ?>
                <span class="badge badge-pill badge-success"><?php echo sanitize($restaurant_details['rating']); ?> <i class="fas fa-star"></i></span>
              <?php endif; ?>
        </h5>

        <div class="reserve-description">
          <?php foreach (json_decode($restaurant_details['cuisine']) as $cuisine) : ?>
          <?php
            $cuisine = $this->cuisine_model->get_by_id($cuisine);
            if (isset($cuisine) && count($cuisine)) : ?>
                <label class="custom-checkbox">
                  <span class="ti-check-box text-danger"></span>
                  <span class="custom-control-description">
                    <?php echo sanitize($cuisine['name']); ?>
                  </span>
                </label>
          <?php endif; ?>
          <?php endforeach; ?>
          <?php if (count(json_decode($restaurant_details['cuisine'])) == 0) : ?>
          <small><?php echo site_phrase('no_cuisine_found'); ?></small>
          <?php endif; ?>
        </div>
        
      </div>


      <div class="col-md-4">
        <div class="d-block">
          <p class="reserve-description text-dark d-block text-right"><i class="far fa-clock"></i>
            <?php echo site_phrase('foodrive in'); ?> :
            <strong><?php echo sanitize(maximum_time_to_deliver($restaurant_details['id'])); ?></strong>
            <?php echo site_phrase('mins'); ?></p>
        </div>

        <!-- Custom rounded search bars with input group -->
        <div class="d-block mt-2 mb-0">
          <form action="<?php echo site_url('site/search'); ?>" method="GET">
            <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
              <div class="input-group">
                <input type="hidden" name="id" value="<?php echo sanitize($restaurant_details['id']); ?>">
                <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon1"
                  class="form-control border-0 bg-light" name="query">
                <div class="input-group-append">
                  <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                      class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- End -->

      </div>


      <!-- Categories tab -->
      <div class="col-md-12 responsive-wrap">
          <div class="horizontal-scrolling" >
                <?php
                      $check = 0;
                       $categories = $this->category_model->get_index_order_by_restaurant($restaurant_details['id']); //WITH ORDER INDEX
                      //$categories = $this->category_model->get_categories_by_restaurant_id($restaurant_details['id']);
                      //print_r( $categories);
                if(count($categories) > 0) :
                        foreach ($categories as $category) :?>
                          <?php 
                            $category_data = $this->category_model->get_by_id($category['id']);
                          if($check==0) :?>
                                  <strong>
                                    <a href="<?php echo site_url("site/restaurant/".$slug."/".$restaurant_details['id']); ?>" class="badge badge-light badge-pill p-3 shadow-sm text-muted">
                                      <strong>All</strong>
                                    </a>
                                  </strong>
                          <?php $check=1; ?>
                          <?php endif;?>

                          <strong>
                            <a href="<?php echo site_url("site/restaurant/".$slug."/".$restaurant_details['id'].'/'.$category['id']); ?>"
                            class="text-center badge badge-light badge-pill p-3 shadow-sm text-muted">
                              <?php echo sanitize($category_data['name']);  ?>
                              
                              <?php   if($this->session->userdata('user_role_id') == 1 || $this->session->userdata('user_role_id') == 3 ) :?>
                               <!--ADMIN/OWNER--> 
                                <small class="badge badge-success badge-pill"> <?php echo sanitize($category['index_order']);  ?></small>
                              <?php endif;?>
                            </a> 
                          </strong>
                      <?php endforeach;  ?>
                <?php else:?>
                       <?php if(empty($this->session->userdata('user_role_id'))) :?>
                        <!--VISITOR-->
                         <a href="#" class="btn btn-default btn-outline-secondary"><i class="fas fa-sad-cry" ></i> Restaurant has no menu yet</a> 
                        <?php else:?>
                            <!--LOGGED-->
                            <?php if($this->session->userdata('user_role') == 'customer' || $this->session->userdata('user_role') == 'driver') :?>
                               <!--FOR DRIVER/CUST-->
                                <a href="#" class="btn btn-default btn-outline-secondary"><i class="fas fa-sad-cry" ></i> Restaurant has no menu yet, come back later!</a> 
                              <?php else:?> 
                                  <!--FOR ADMIN/OWNER-->
                                <p class="text-center">
                                    <a href="<?php echo site_url("menu/create");?>" class="btn btn-default btn-outline-secondary">
                                    <i class="fas fa-edit"></i> Create your first menu</a> 
                                </p>
                              <?php endif;?>  
                         <?php endif;?>        
                <?php endif;?>
             
            </div>
        </div>

    </div>
  </div>
</section>
<!-- MAIN CONTENT -->
<section class="light-bg booking-details_wrap">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-9 responsive-wrap">
        
        
        <div class="container-fluid ">
          <div class="row">
        <?php   
         foreach ($menus as $key => $menu) : ?>
            <div class="col-md-4">
              <div class="row p-2 <?php echo ($menu->availability == 1) ? "bg-white": "bg-secondry"; ?> border rounded mt-1 mb-1  shadow-sm rounded" style="min-height: 130px;">

                <?php if($menu->thumb_status) :?>
                  <div class="col-4 mt-1">
                    <img class="img-fluid img-responsive rounded product-image"
                      src="<?php echo base_url('uploads/menu/' . sanitize($menu->thumbnail)); ?>">
                  </div>
                <?php endif;?>

                <div class="<?php echo (!$menu->thumb_status) ? 'col-9': 'col-5';?> mt-1">
                  <span class="text-primary " data-toggle="tooltip" data-placement="top"
                    title="<?php echo sanitize($menu->name); ?>">
                    <p class="text-truncate p-0 m-0"><?php echo sanitize($menu->name); ?></p>
                  </span>

                  <!-- IF SERVINGS IS MENU -->
                  <?php if ($menu->servings == "menu") : ?>
                  <?php if (has_discount($menu->id)) : ?>
                  <div class="d-flex flex-wrap flex-row align-items-center">
                    <h4 class="mr-1 text-success h6"><?php echo currency(get_menu_price($menu->id)); ?></h4>
                    <small
                      class="strike-text mb-2"><?php echo currency(sanitize(get_menu_price($menu->id, "menu", "actual_price"))); ?></small>
                  </div>
                  <?php else : ?>
                  <div class="d-flex flex-row align-items-center">
                    <h4 class="mr-1 text-success h6"><?php echo currency(sanitize(get_menu_price($menu->id))); ?></h4>
                  </div>
                  <?php endif; ?>
                  <?php endif; ?>

                  <p class="text-justify text-truncate para mb-0">
                    <?php $menu_details = $this->menu_model->get_by_id($menu->id); ?>
                    <?php if (!empty($menu_details['details'])) : ?>
                    <?php echo sanitize($menu_details['details']); ?>
                    <?php else : ?>
                    <?php //echo 'Item description not found.'; ?>
                    <?php endif; ?>
                  </p>

                </div>
                <div class="align-items-center align-content-center col-3 border-left mt-1">

                  <!-- DETAIL ICON -->
                  <div class="d-flex flex-column mt-1">
                    <a href="javascript:void(0)"
                      onclick="showModalWithHeader('<?php echo site_url('modal/showup/restaurant/menu/' . $menu->id); ?>', '<?php echo sanitize($menu->name); ?>')"
                      class="btn btn-primary btn-sm txt-wrp-on-btn">
                      <i class="fas fa-info-circle"></i>
                    </a>

                    <!-- FAVOURITE ICON -->
                    <?php $class_name = $this->favourite_model->is_added($menu->id) ? "fas fa-heart filled-favourite" : "far fa-heart";  ?>
                    <a href="#"
                      class="<?php echo sanitize($class_name); ?> btn btn-outline-danger btn-sm mt-2 txt-wrp-on-btn"
                      onclick="confirm_modal('<?php echo site_url('favourite/update/' . $menu->id); ?>')"></a>

                    <!-- ADD TO CART -->
                    <?php if ($menu->availability) : ?>
                    <div class="closed-now">

                      <a href="javascript:void(0)" class=" btn btn-outline-success btn-sm mt-2 btn-block txt-wrp-on-btn"
                        onclick="showCartModal('<?php echo site_url('modal/showup/restaurant/cart/' . $menu->id); ?>', '<?php echo site_phrase('add_to_cart'); ?>')">
                        <span class="fas fa-shopping-cart"></span></a>
                    </div>
                    <?php else : ?>
                    <!--unavailable-->
                    <div class="closed-now">
                      <button class="btn btn-danger btn-sm mt-2 btn-block"> <span class="fas fa-times-circle"></span>
                      </button>
                    </div>
                    <?php endif; ?>

                  </div>
                </div>
              </div>
            </div>
            
            <?php endforeach; ?>
          </div>
          <div class="row justify-content-center light-bg detail-options-wrap">
            <?php echo $this->pagination->create_links(); ?>
          </div>
        </div>

        <!-- REVIEW PORTION -->
        <?php $reviews = $this->review_model->get_by_condition(['restaurant_id' => $restaurant_details['id']]); ?>
        <?php if(count($reviews) > 0) :?>
            <div class="booking-checkbox_wrap mt-4" id="review-portion">
              <h5> <?php echo count($reviews) . ' ' . site_phrase('Reviews'); ?></h5>

              <div class="card" style="border: 0px;">
                <div class="card-body">
                  <div class="row">

                    <?php foreach ($reviews as $key => $review) :
                    $customer_details = $this->db->get_where('users', ['id' => $review['customer_id']])->row_array();
                    ?>
                    <div class="col-md-2">
                      <div class="customer-img">
                        <img src="<?php echo base_url('uploads/user/' . $customer_details['thumbnail']); ?>"
                          class="img-fluid" alt="#" style="max-width: 100px;
                    max-height: 100px;">
                        <p class="h5"><?php echo sanitize($customer_details['name']); ?></p>
                      </div>

                      <p class="text-secondary text-center"><?php echo site_phrase('Reviewed'); ?>
                        <br><?php echo date('D, d-M-Y', $review['timestamp']); ?>
                      </p>
                    </div>

                    <div class="col-md-10">
                      <p>
                        <span class="float-left text-primary" href="#">
                          <strong><?php echo sanitize($customer_details['name']); ?></strong></span>

                        <?php for ($i = 1; $i <= $review['rating']; $i++) : ?>
                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                        <?php endfor; ?>

                        <?php //descinding order loop
                                            //$rest_rating = 5 - $review['rating'];
                                            //for ($i = 1; $i <= $rest_rating; $i++) : ?>
                        <!--<span class="float-right"><i class="text-warning fa fa-star"></i></span>-->

                        <?php //endfor; ?>

                      </p>
                      <div class="clearfix"></div>
                      <p class="customer-text text-justify ">
                        <?php echo sanitize($review['review']); ?>

                                <?php if(!empty(sanitize($review['review']))) :?>
                                    <?php if($this->session->userdata('owner_login') == 1 && 
                                            $this->session->userdata('user_role_id') == 3 && 
                                            $this->session->userdata('user_role') == 'owner') :?>
                                            
                                            <form action="<?php echo site_url('review/update_restaurant_reply');?>" method="post" >
                                            <input type="hidden" name="restaurant_id" value="<?php echo sanitize($restaurant_details['id']); ?>">
                                            <input type="hidden" name="order_code" value="<?php echo sanitize($review['order_code']); ?>">
                                                  <div class="form-group">
                                                    <label for="res_name"><?php echo sanitize($restaurant_details['name']); ?></label>
                                                    <textarea placeholder="reply to this customer..." class="form-control" id="res_name" name="reply" rows="3"><?php echo sanitize($review['res_reply']); ?></textarea>
                                                  </div>
                                                  <button type="submit" class="btn btn-outline-primary float-right mb-1"><i class="far fa-save"></i> Save</button>
                                            </form>
                                
                                    <?php else:?>
                                      <?php if(!empty(sanitize($review['res_reply']))) :?>
                                          <p class="customer-text text-justify ml-4">
                                          <strong class="text-primary"><?php echo sanitize($restaurant_details['name']); ?></strong></br>
                                            <?php echo sanitize($review['res_reply']); ?>
                                          </p>
                                        <?php endif;?>
                                    <?php endif;?>
                              <?php endif;?>       
                        
                       </p>

                    </div>
                    <?php endforeach; ?>

                  </div>

                </div>
              </div>
            </div>
            <?php endif; ?>
  
      </div>

      <div class="col-md-3 responsive-wrap">
        <div class="contact-info shadow-sm rounded">
          <div class="iframe-rwd">
            <div id="maps"></div>
          </div>
           <!--Address-->
          <div class="address">
            <span class="icon-location-pin"></span>
            <p><?php echo getter(sanitize($restaurant_details['address']), site_phrase('not_found')); ?></p>
          </div>

          <?php if(!empty($restaurant_details['phone'])):?>
            <!--phone-->
            <div class="address">
              <span class="icon-screen-smartphone"></span>
              <p><a href="tel:<?php echo (!empty(sanitize($restaurant_details['phone']))) ? sanitize($restaurant_details['phone']) :"#";?>">
                  <?php echo getter(sanitize($restaurant_details['phone']), site_phrase('not_found')); ?>
                </a></p>
            </div>
          <?php endif;?>
          <?php if(!empty($restaurant_details['website'])):?>
             <!--website link--> 
            <div class="address">
              <span class="icon-link"></span>
              <p><a href="<?php echo sanitize($restaurant_details['website']); ?>" target="_blank"
                  class="text-body"><?php echo getter(sanitize($restaurant_details['website']), site_phrase('not_found')); ?></a>
              </p>
            </div>
            <?php endif;?>
         <!--website schedule--> 
          <div class="address pb-3">
            <span class="icon-clock"></span>
            <p>
              <?php if (!empty($restaurant_details['schedule'])) : ?>
              <?php $time_configurations = json_decode($restaurant_details['schedule'], true);
                    $today = strtolower(date('l'));
                    echo ucfirst($today); ?> :
                    <?php if (is_open($restaurant_details['id'])) : ?>
                      <span class="badge badge-pill badge-success"><?php echo strtoupper(site_phrase('open_now')); ?></span>
                    <?php else : ?>
                    <span class="badge badge-pill badge-danger"><?php echo strtoupper(site_phrase('close_now')); ?></span>
                    <?php endif; ?>
              <?php else : ?>
              <span class="badge badge-pill badge-danger"> <?php echo site_phrase('not_found'); ?></span>
              <?php endif; ?>
            </p>
          </div>
        </div>

        <div class="follow shadow-sm rounded">
          <div class="follow-img">
            <h6><?php echo site_phrase('Restaurant_timing', true); ?></h6>
          </div>
          <div class="restaurant-schedule">
            <?php $schedule = json_decode($restaurant_details['schedule'], true);
            $days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday']; ?>
            <table class="w-100">
              <?php foreach ($days as $key => $day) : ?>
              <tr class="text-center" style="border: 0px;">
                <td class="w-50 restaurant-day-schedule" style="border: 0px;"><?php echo ucfirst($day); ?></td>
                <td class="w-50 restaurant-time-schedule" style="border: 0px;">
                  <?php if (!isset($schedule[$day . '_opening']) || $schedule[$day . '_opening'] == "closed") : ?>
                  <span class="text-danger"><?php echo site_phrase('closed'); ?></span>
                  <?php else : ?>
                  <?php echo date("h:i A", strtotime($schedule[$day . '_opening'])); ?> -
                  <?php echo date("h:i A", strtotime($schedule[$day . '_closing'])); ?>
                  <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
