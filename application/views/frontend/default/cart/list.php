<?php
$restaurant_ids = $this->cart_model->get_restaurant_ids();
if (count($restaurant_ids) > 0) :
    foreach ($restaurant_ids as $restaurant_id) :
        $restaurant_details = $this->restaurant_model->get_by_id($restaurant_id);
        $distance_in_details = $this->cart_model->distanceMatrix(sanitize($restaurant_details['address']), sanitize($this->session->userdata('fullAddress')));
        $distance = $this->cart_model->distance_price();
        ?>   

    <div class="container-fluid shadow-sm rounded mb-2">
        <div class="row  p-0 ">
            <div class="col-md-12  p-0 ">
                <a href="https://play.google.com/store/apps/details?id=ca.foodrive.foodrive" target="_blank">
                    <img alt="foodrive android app" src="https://ik.imagekit.io/l4f8iqzrdp1c/Foodrive_graphics/Banner/ANDROID_APPFD_BANNER_copy_reduced_FpI2ASrWA.jpg?ik-sdk-version=javascript-1.4.3&updatedAt=1643199254274" 
                    class="img-fluid rounded restaurant-thumbnail "/>
                </a>
            </div>
        </div>
    </div>

        <div class="booking-checkbox_wrap shadow-sm rounded">

            <div class="d-flex justify-content-between">
                    <div class="p-2"> <i class="far fa-clock"></i> Foodrive in <strong><?php echo sanitize(maximum_time_to_deliver($restaurant_details['id'])); ?></strong> Mins</div>
                    <div class="p-2"><strong><i class="fas fa-location-arrow"></i> <?php echo sanitize(format($distance_in_details['km'] / 1000)); ?>km</strong></div>
            </div>
        <hr>
        <div class="booking-checkbox">
            <?php
            $ordered_items = $this->cart_model->get_cart_by_condition(['customer_id' => $this->session->userdata('user_id'), 'restaurant_id' => sanitize($restaurant_details['id'])]);
            foreach ($ordered_items as $ordered_item) :  ?>

                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="card p-3 bg-light shadow-sm">
                                <div class="d-flex d-block">
                                    <div class="px-0 px-0">
                                        <span class=" badge badge-pill badge-success mr-1" id="cart-quantity-<?php echo sanitize($ordered_item['id']); ?>"> <?php echo sanitize($ordered_item['quantity']); ?></span>
                                    </div>
                                    <div>
                                        <div class="d-flex d-block">
                                            <?php if ($ordered_item['thumb_status']) : ?>
                                                <img src="<?php echo base_url('uploads/menu/' . sanitize($ordered_item['menu_thumbnail'])); ?>" class="img-icon" alt=""> 
                                            <?php endif; ?>
                                            <div class="ml-2 ml-0">
                                                <h6 class="mb-0 menu-name  text-primary"> <strong><?php echo sanitize($ordered_item['menu_name']); ?></strong></h6> 
                                                <span class="text-muted menu-serving"><?php echo site_phrase('servings') . ': ' . site_phrase(sanitize($ordered_item['servings'])); ?></span>
                                            </div>
                                        </div>
                                        <ul class="list-unstyled mt-1 ml-5">

                                        <?php if (!empty($ordered_item['variant_id'])) : ?>
                                             <!--Variants-->
                                                <?php
                                                    $variant_exploded = explode(',', $ordered_item['variant_id']);
                                                    foreach ($variant_exploded as $key => $variant) {
                                                        $variant_details = $this->db->get_where('variants', ['id' => $variant])->row_array();
                                                        echo '<li>- '.ucfirst(sanitize($variant_details['variant'])) . ': ' . currency(format($variant_details['price'])) . '</li>';
                                                    }
                                                ?>                                           
                                        <?php endif; ?>

                                        <?php if (!empty($ordered_item['addons'])) : ?>
                                            <!--addons-->
                                                    <?php
                                                    $addons_exploded = explode(',', $ordered_item['addons']);
                                                    foreach ($addons_exploded as $key => $addon) {
                                                        $addon_details = $this->db->get_where('addons', ['aid' => $addon])->row_array();
                                                        echo '<li>- '.ucfirst(sanitize($addon_details['addon_name'])) . ': ' . currency(format($addon_details['addon_price'])) . '</li>';
                                                    }
                                                    ?>                                           
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <div class="ml-auto d-block">
                                        <div class="d-flex  flex-column h-100 text-right">
                                                 <span id="sub-total-<?php echo sanitize($ordered_item['id']); ?>" class="text-success"><?php echo currency(sanitize(format($ordered_item['price']))); ?></span>                                
                                            <div class="d-flex mt-auto justify-content-end">
                                              <div class="cart-page-actions">
                                                            <button type="button" class="btn btn-sm btn-default btn-circle cart-actions p-0" onclick="updateCart('<?php echo sanitize($ordered_item['id']); ?>', true)"><i class="fas fa-plus text-success"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-default btn-circle cart-actions p-0" onclick="updateCart('<?php echo sanitize($ordered_item['id']); ?>', false)"><i class="fas fa-minus text-danger"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-default btn-circle cart-actions p-0" onclick="confirm_modal('<?php echo site_url('cart/delete/' . sanitize($ordered_item['id'])); ?>')"><i class="far fa-times-circle text-danger"></i>
                                                            </button>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                                 <?php if ($ordered_item['note'] && !empty($ordered_item['note'])) : ?>
                                        <div class="row">
                                            <div class="col note">
                                                <small><span class="text-danger"><?php echo get_phrase('note'); ?> :</span> <?php echo sanitize($ordered_item['note']); ?></small>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                
                            </div>
                        </div>
                    </div> 
    
  <?php endforeach; ?>

    </div>
</div>
<?php endforeach; ?>
<?php else : ?>
    <div class="booking-checkbox_wrap mb-2 shadow-sm rounded">
        <div class="row">
            <div class="col-sm-12 text-center">
                <?php if ($this->session->flashdata('confirm_order')) : ?>
                    <h5><?php echo site_phrase('congratulations'); ?>!</h5>
                    <img src="https://ik.imagekit.io/l4f8iqzrdp1c/check__1__RIxl5SSNO.png?updatedAt=1641292482555" class="img-fluid success-tick" alt="<?php echo "success-logo"; ?>">
                    <span class="d-block mt-2"><?php echo site_phrase('your_order_has_been_placed_successfully'); ?>.</span>
                    <span class="d-block mt-2"><?php echo site_phrase('check_your_order_status'); ?> <a href="<?php echo site_url('orders/today'); ?>"><?php echo strtolower(site_phrase('here')); ?>.</a></span>
                <?php else : ?>
                    <img src="https://ik.imagekit.io/l4f8iqzrdp1c/Empty-pana_UO7eUmryF.png?updatedAt=1641292948530" class="img-fluid" alt="<?php echo "empty-cart-logo"; ?>">
                    <span class="d-block mt-2"><?php echo site_phrase('you_got_nothing_to_order'); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
