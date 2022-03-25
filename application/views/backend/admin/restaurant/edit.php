<!-- Content Header (Page header) -->
<?php include  'header.php'; ?>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <!-- Custom Tabs -->
        <div class="card">
            <div class="card-header d-flex p-0">
                <ul class="nav nav-pills p-2">
                    <li class="nav-item"><a href="<?php echo site_url('restaurant/edit/' . sanitize($id) . '/basic'); ?>" class="nav-link <?php if ($active_tab == 'basic') echo 'active' ?>"><?php echo get_phrase('basic_data') ?></a></li>
                    <li class="nav-item"><a href="<?php echo site_url('restaurant/edit/' . sanitize($id) . '/revenue'); ?>" class="nav-link <?php if ($active_tab == 'revenue') echo 'active' ?>">Revenue</a></li> 
                    <li class="nav-item"><a href="<?php echo site_url('restaurant/edit/' . sanitize($id) . '/address'); ?>" class="nav-link <?php if ($active_tab == 'address') echo 'active' ?>"><?php echo get_phrase('address_and_phone') ?></a></li>
                    <li class="nav-item"><a href="<?php echo site_url('restaurant/edit/' . sanitize($id) . '/owner'); ?>" class="nav-link <?php if ($active_tab == 'owner') echo 'active' ?>"><?php echo get_phrase('owner_data') ?></a></li>
                    <li class="nav-item"><a href="<?php echo site_url('restaurant/edit/' . sanitize($id) . '/delivery'); ?>" class="nav-link <?php if ($active_tab == 'delivery') echo 'active' ?>"><?php echo get_phrase('delivery_data') ?></a></li>
                    <li class="nav-item"><a href="<?php echo site_url('restaurant/edit/' . sanitize($id) . '/schedule'); ?>" class="nav-link <?php if ($active_tab == 'schedule') echo 'active' ?>"><?php echo get_phrase('schedule') ?></a></li>
                    <li class="nav-item"><a href="<?php echo site_url('restaurant/edit/' . sanitize($id) . '/gallery'); ?>" class="nav-link <?php if ($active_tab == 'gallery') echo 'active' ?>"><?php echo get_phrase("Thumbnail"); ?></a></li>
                    <li class="nav-item"><a href="<?php echo site_url('restaurant/edit/' . sanitize($id) . '/reorder'); ?>" class="nav-link <?php if ($active_tab == 'reorder') echo 'active' ?>">Category management</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane <?php if ($active_tab == 'basic') echo 'active' ?>" id="basic">
                        <form action="<?php echo site_url('restaurant/update/basic'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo sanitize($restaurant_data['id']); ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="restaurant_name"><?php echo get_phrase("restaurant_name"); ?></label>
                                        <input type="text" class="form-control" id="restaurant_name" name="restaurant_name" placeholder="<?php echo get_phrase("enter_restaurant_name"); ?>" value="<?php echo sanitize($restaurant_data['name']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cuisine"><?php echo get_phrase("cuisine"); ?></label> <small class="float-right"><a href="<?php echo site_url('cuisine/create'); ?>"><?php echo get_phrase("create_new_cuisine"); ?></a></small>
                                        <select class="form-control select2" name="cuisine[]" multiple="multiple" data-placeholder="<?php echo get_phrase("choose_cuisines"); ?>" required>
                                            <?php foreach ($cuisines as $cuisine) : ?>
                                                <option value="<?php echo sanitize($cuisine['id']); ?>" <?php if (in_array($cuisine['id'], json_decode($restaurant_data['cuisine'], true))) echo "selected"; ?>><?php echo sanitize($cuisine['name']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="restaurant_about"><?php echo get_phrase("restaurant_about"); ?></label>
                                        <textarea  class="form-control" id="restaurant_about" name="restaurant_about" placeholder="<?php echo get_phrase("something about your restaurant..."); ?>" required ><?php echo sanitize($restaurant_data['about']); ?></textarea>
                                    </div>
                                    <button class="btn btn-primary"><?php echo get_phrase('update_basic_data'); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane <?php if ($active_tab == 'revenue') echo 'active' ?>" id="revenue">
                            <form action="<?php echo site_url('restaurant/update/revenue'); ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo sanitize($restaurant_data['id']); ?>">
                                <div class="row">
                                  
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <label for="foodrive_cut"><?php echo get_phrase("foodrive_commission"); ?></label>
                                                <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="foodrive_cut" name="foodrive_cut" placeholder="<?php echo get_phrase("enter_percentage"); ?>" value="<?php echo sanitize($settings_data['admin_percent']); ?>"  min="0" max="100" onkeyup="calculateRestaurantRevenue(this.value)" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="restaurant_cut"><?php echo get_phrase("Restaurant_commission"); ?></label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" id="restaurant_cut" name="restaurant_cut" placeholder="<?php echo get_phrase("enter_percentage"); ?>" value="<?php echo sanitize($settings_data['res_percent']); ?>"  min="0" max="100"  required readonly>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <label for="service_charge"><?php echo get_phrase("service_charge"); ?></label>
                                                <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="service_charge" name="service_charge" placeholder="<?php echo get_phrase("enter_percentage"); ?>" value="<?php echo sanitize($settings_data['service_charge']); ?>"  min="0" max="100" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                 <button class="btn btn-primary"><?php echo get_phrase('update_revenue'); ?></button>
                            </form>
                        </div>
                    <!-- /.tab-pane -->


                    <div class="tab-pane <?php if ($active_tab == 'address') echo 'active' ?>" id="address">
                        <form method="post">
                            <input type="hidden" name="id" id="restaurant_id" value="<?php echo sanitize($restaurant_data['id']); ?>">
                            <div id="resposnse"></div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="restaurant_address"><?php echo get_phrase("address"); ?></label>
                                        <textarea class="form-control" id="restaurant_address" name="restaurant_address" rows="2" placeholder="<?php echo get_phrase('provide_restaurant_address'); ?>"><?php echo sanitize($restaurant_data['address']); ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="restaurant_latitude"><?php echo get_phrase("latitude"); ?></label> <small class="float-right"><a href="https://youtu.be/CgFiSJ11Uk8" target="_blank"><?php echo get_phrase("how_to_get_it"); ?>?</a></small>
                                        <input type="text" id="restaurant_latitude" class="form-control" name="restaurant_latitude" placeholder="<?php echo get_phrase("enter_restaurant_latitude"); ?>" value="<?php echo sanitize($restaurant_data['latitude']); ?>" readonly disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="restaurant_longitude"><?php echo get_phrase("longitude"); ?></label> <small class="float-right"><a href="https://youtu.be/CgFiSJ11Uk8" target="_blank"><?php echo get_phrase("how_to_get_it"); ?>?</a></small>
                                        <input type="text" class="form-control" id="restaurant_longitude" name="restaurant_longitude" placeholder="<?php echo get_phrase("enter_restaurant_longitude"); ?>" value="<?php echo sanitize($restaurant_data['longitude']); ?>" readonly disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="restaurant_phone"><?php echo get_phrase("phone"); ?></label>
                                        <input type="text" class="form-control" id="restaurant_phone" id="restaurant_phone" name="restaurant_phone" value="<?php echo sanitize($restaurant_data['phone']); ?>"  placeholder="<?php echo get_phrase('phone_number_without_+1'); ?>" maxlength="10" pattern="[0-9]*"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="restaurant_website_link"><?php echo get_phrase("restaurant_website_link"); ?></label>
                                        <input type="text" class="form-control" id="restaurant_website_link" id="restaurant_website_link" name="restaurant_website_link" placeholder="<?php echo get_phrase("enter_restaurant_website_link_"); ?>" value="<?php echo sanitize($restaurant_data['website']); ?>" required>
                                    </div>
                                    <button class="btn btn-primary" id="update_address"><?php echo get_phrase('update_address_data'); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane <?php if ($active_tab == 'owner') echo 'active' ?>" id="owner">
                        <form action="<?php echo site_url('restaurant/update/owner'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo sanitize($restaurant_data['id']); ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="existing_user" name="restaurant_owner_type" checked value="existing" onclick="toggleUserArea(this)">
                                        <label for="existing_user" class="custom-control-label"><?php echo get_phrase("choose_from_existing_restaurant_owners_and_customers"); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="new_user" name="restaurant_owner_type" value="new" onclick="toggleUserArea(this)">
                                        <label for="new_user" class="custom-control-label"><?php echo get_phrase("create_a_new_restaurant_owner"); ?></label>
                                    </div>
                                    <br>
                                    <div id="existing_user_area">
                                        <div class="form-group">
                                            <label id="restaurant_owner_id"><?php echo get_phrase("choose_from_existing_restaurant_owners_and_customers"); ?></label>
                                            <select class="form-control select2 w-100" id="restaurant_owner_id" name="restaurant_owner_id">
                                                <option value=""><?php echo get_phrase("choose_from_existing_users"); ?></option>
                                                <?php
                                                $approved_users = $this->user_model->get_approved_users();
                                                foreach ($approved_users as $key => $approved_user) : ?>
                                                    <option value="<?php echo sanitize($approved_user['id']); ?>" <?php if ($approved_user['id'] == $restaurant_data['owner_id']) echo "selected"; ?>><?php echo sanitize($approved_user['name']); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="new_user_area" class="hidden">
                                        <div class="form-group">
                                            <label for="restaurant_owner_name"><?php echo get_phrase("restaurant_owner_name"); ?></label>
                                            <input type="text" id="restaurant_owner_name" class="form-control" name="restaurant_owner_name" placeholder="<?php echo get_phrase("enter_restaurant_owner_name"); ?>" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="restaurant_owner_email"><?php echo get_phrase("restaurant_owner_email"); ?></label>
                                            <input type="email" class="form-control" id="restaurant_owner_email" name="restaurant_owner_email" placeholder="<?php echo get_phrase("enter_restaurant_owner_email"); ?>" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="restaurant_owner_password"><?php echo get_phrase("restaurant_owner_password"); ?></label>
                                            <input type="password" class="form-control" id="restaurant_owner_password" name="restaurant_owner_password" placeholder="<?php echo get_phrase("enter_restaurant_owner_password"); ?>" value="">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary"><?php echo get_phrase('update_owner_data'); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane <?php if ($active_tab == 'delivery') echo 'active' ?>" id="delivery">
                        <form action="<?php echo site_url('restaurant/update/delivery'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo sanitize($restaurant_data['id']); ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="delivery_charge"><?php echo get_phrase("delivery_charge") . ' (' . currency_code_and_symbol('code') . ')'; ?></label>
                                        <input type="number" step="0.01" id="delivery_charge" class="form-control" name="delivery_charge" placeholder="<?php echo get_delivery_settings('delivery_charge') . ' (' . get_phrase("default") . ') '; ?>" value="<?php echo sanitize($restaurant_data['delivery_charge']); ?>" min="0">
                                    </div>

                                <div class="form-group">

                                    <div class="row">
                                        <div class="col-md-6">
                                              <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="time" id="time-1" value="max" 
                                                  <?php if(substr_count (sanitize($restaurant_data['maximum_time_to_deliver']), ':'))
                                                                echo "checked"; ?>>

                                                  <label class="form-check-label" for="exampleRadios1">
                                                    Maximum time to deliver (00:45 mins)
                                                  </label>
                                                </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-check">
                                                  <input class="form-check-input" type="radio" name="time" id="time-2" value="avg" 
                                                  <?php if(substr_count (sanitize($restaurant_data['maximum_time_to_deliver']), '-'))
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
                                                if (!empty(sanitize($restaurant_data['maximum_time_to_deliver']))) {
                                                    if(substr_count (sanitize($restaurant_data['maximum_time_to_deliver']), ':')){
                                                          echo sanitize($restaurant_data['maximum_time_to_deliver']);
                                                      }elseif (substr_count (sanitize($restaurant_data['maximum_time_to_deliver']), '-')) {
                                                          echo sanitize($restaurant_data['maximum_time_to_deliver']);
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
                                        <input type="text" class="form-control" id="maximum_time_to_deliver" name="maximum_time_to_deliver" placeholder="00:30 (hh:mm)" value="<?php if(substr_count (sanitize($restaurant_data['maximum_time_to_deliver']), ':'))
                                                                 echo sanitize($restaurant_data['maximum_time_to_deliver']); ?>">
                                    </div>
                              </div>

                              <div id="avg-time-selection" style="display: none">
                                    <div class="form-group ">
                                        <label for="avg_time_to_deliver"><?php echo get_phrase("average_time_to_deliver"); ?></label>
                                        <input type="text" class="form-control" id="avg_time_to_deliver" name="avg_time_to_deliver" placeholder="20-30" value="<?php if(substr_count (sanitize($restaurant_data['maximum_time_to_deliver']), '-'))
                                                                 echo sanitize($restaurant_data['maximum_time_to_deliver']); ?>">
                                    </div>
                              </div>

                                    <button class="btn btn-primary"><?php echo get_phrase('update_delivery_data'); ?></button>
                                </div>
                                <div class="col-lg-6">
                                    <div class="alert alert-info lighten-info mt-4" role="alert">
                                        <h5 class="alert-heading"><i class="icon fas fa-exclamation-triangle"></i> <?php echo get_phrase('heads_up'); ?>!</h5>
                                        <p><?php echo get_phrase('you_can_overwrite_the_default_delivery_charge_and_maximum_time_to_deliver'); ?>.</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                  <div class="tab-pane <?php if ($active_tab == 'schedule') echo 'active' ?>" id="schedule">
                        <form action="<?php echo site_url('restaurant/update/schedule'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo sanitize($restaurant_data['id']); ?>">
                            <?php
                            $schedule = json_decode($restaurant_data['schedule'], true);
                            $days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
                            foreach ($days as $day) : ?>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="<?php echo sanitize($day); ?>_opening"><?php echo get_phrase($day . "_opening"); ?></label>
                                            <input type="time" class="form-control" name="<?php echo sanitize($day); ?>_opening" value="<?php echo isset($schedule[$day . "_opening"]) ? $schedule[$day . "_opening"] : "00:00:00"; ?>">
                                            <div class="custom-control custom-checkbox mt-2">
                                                <input type="checkbox" class="custom-control-input" name="<?php echo sanitize($day); ?>_opening_is_closed" id="<?php echo sanitize($day); ?>_opening_is_closed" value="1" <?php if (isset($schedule[$day . "_opening"]) && $schedule[$day . "_opening"] == "closed") echo "checked"; ?>>
                                                <label class="custom-control-label" for="<?php echo sanitize($day); ?>_opening_is_closed"><?php echo get_phrase('is_closed_this_day'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="<?php echo sanitize($day); ?>_closing"><?php echo get_phrase($day . "_closing"); ?></label>
                                            <input type="time" class="form-control" name="<?php echo sanitize($day); ?>_closing" value="<?php echo isset($schedule[$day . "_closing"]) ? $schedule[$day . "_closing"] : "00:00:00"; ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <button class="btn btn-primary"><?php echo get_phrase('update_schedule'); ?></button>
                        </form>
                    </div>
                   
                    <!-- /.tab-pane -->
                    <div class="tab-pane <?php if ($active_tab == 'gallery') echo 'active' ?>" id="gallery">
                        <form action="<?php echo site_url('restaurant/update/gallery'); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo sanitize($restaurant_data['id']); ?>">

                            <!-- RESTAURANT THUMBNAIL -->
                            <div class="form-group">
                                <label for="restaurant_thumbnail"><?php echo get_phrase("restaurant_thumbnail"); ?> <span class="badge badge-default">(400 X 291)</span></label>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' class="imageUploadPreview" id="restaurant_thumbnail" name="restaurant_thumbnail" accept=".png, .jpg, .jpeg" />
                                        <label for="restaurant_thumbnail"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="restaurant_thumbnail_preview" thumbnail="<?php echo base_url('uploads/restaurant/thumbnail/' . $restaurant_data['thumbnail']); ?>"></div>
                                    </div>
                                </div>
                            </div>

            
                            <button type="submit" class="btn btn-primary"><?php echo get_phrase('update_Thumbnail'); ?></button>
                        </form>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane <?php if ($active_tab == 'reorder') echo 'active' ?>" id="reorder">  
                        <!-- Page including -->
                        <?php include "reorder.php";?>                  
                    </div>
                    <!-- /.tab-pane -->
                    
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- ./card -->
    </div>
    <!--/. container-fluid -->
</section>
