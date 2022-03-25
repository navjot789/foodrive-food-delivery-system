<?php
$cart_item_details = $this->cart_model->get_by_id($param2);
$menu_details = $this->menu_model->get_by_id(sanitize($cart_item_details['menu_id'])); ?>
<!--Header-->
<div class="modal-header">
    <img src="<?php echo base_url('uploads/menu/' . sanitize($menu_details['thumbnail'])); ?>" alt="avatar" class="rounded-circle img-responsive foodmenu-thumbnail-for-cart">
</div>

    <?php  $total_sum_addons = $this->cart_model->get_total_addons_id_by_cartid(sanitize($cart_item_details['id'])); ?>
    
<!--Body-->
<div class="modal-body text-center mb-1">
    <h6 class="mt-1 mb-2"><?php echo sanitize($menu_details['name']); ?></h6>
    <!-- IF SERVINGS IS MENU -->
    <?php if ($menu_details['servings'] == "menu") : ?>
        <small><?php echo site_phrase('price'); ?> : <strong><?php echo currency(sanitize(get_menu_price($menu_details['id']))); ?></strong></small>
        <div class="form-group">
            <input type="number" class="form-control text-center" id="quantity_for_menu" min="1" value="<?php echo sanitize($cart_item_details['quantity']); ?>">
        </div>



         <div class="form-group">
               <div class="row">
                    <div class="col-md-12">
                    <?php foreach ($total_sum_addons as $index => $value) : ?>

                                <?php $addon_data = $this->addons_model->get_addon_by_id($value['aid']);?>
                            
                        <?php foreach ($addon_data as $index_addon => $value_addon) : ?>
                            
                                <div class="row addon-delete-<?php echo $value['aid'];?>">

                                        <div class="col-6 text-left mt-1">
                                           <?php echo sanitize($value_addon['addon_name']); ?>
                                        </div> 
                                        <div class="col-2 text-left mt-1">
                                            <span style="font-size: 10px;"><?php echo sanitize($value_addon['addon_price']) ? currency(sanitize(number_format($value_addon['addon_price'], 2, '.', ''))) :'';?></span>
                                            
                                        </div>
                                        <div class="col-3 text-right mt-1">
                                          <?php if($value_addon['status'] == 0) :?>
                                          <a href="javascript:void(0)"  class="text-danger" id="<?php echo $value['aid'];?>" onclick="deleteCartAddon(this.id)"><i class="fa fa-times" aria-hidden="true"></i></a>
                                         <?php else :?>
                                         <?php endif; ?>
                                        </div> 
                                    </div>
                                
                            <?php endforeach; ?>
                     <?php endforeach; ?>

                            
                    </div>
                </div>
            </div>

        <button class="btn btn-success btn-block" onclick="updateCart('<?php echo sanitize($cart_item_details['id']); ?>', '<?php echo sanitize($menu_details['id']); ?>', 'menu', $('#quantity_for_menu').val())"><?php echo site_phrase('update_cart'); ?></button>

        <!-- IF SERVINGS IS PLATE -->
    <?php else : ?>

        <small><?php echo site_phrase('full_plate_price', true); ?> : <strong><?php echo currency(get_menu_price($menu_details['id'], "full_plate")); ?></strong></small><br>

      <?php  $medium_price = get_menu_price($menu_details['id'], "medium_plate");
            if (isset($medium_price) && !empty($medium_price)) : ?>
               
        <small><?php echo site_phrase('medium_plate_price', true); ?> : <strong><?php echo currency(sanitize(get_menu_price($menu_details['id'], "medium_plate"))); ?></strong></small><br>

        <?php endif; ?>

        <small><?php echo site_phrase('half_plate_price', true); ?> : <strong><?php echo currency(get_menu_price($menu_details['id'], "half_plate")); ?></strong></small>

        <div class="form-group">
            <select class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control" id="plate-servings">
                <option value="full_plate" <?php if ($cart_item_details['servings'] == "full_plate") echo "selected"; ?>><?php echo site_phrase('full_plate'); ?></option>

                <?php 
                     if (isset($medium_price) && !empty($medium_price)) : ?>
                               
                          <option value="medium_plate" <?php if ($cart_item_details['servings'] == "medium_plate") echo "selected"; ?>><?php echo site_phrase('medium'); ?></option>

                        <?php endif; ?>

                <option value="half_plate" <?php if ($cart_item_details['servings'] == "half_plate") echo "selected"; ?>><?php echo site_phrase('half_plate'); ?></option>
            </select>
        </div>
        <div class="form-group">
            <input type="number" class="form-control text-center" id="quantity_for_full_plate" min="1" value="<?php echo sanitize($cart_item_details['quantity']); ?>">
        </div>
  <div class="form-group">
               <div class="row">
                    <div class="col-md-12">
                    <?php foreach ($total_sum_addons as $index => $value) : ?>

                                 <?php $addon_data = $this->addons_model->get_addon_by_id($value['aid']);?>
                            
                        <?php foreach ($addon_data as $index_addon => $value_addon) : ?>
                            
                                <div class="row addon-delete-<?php echo $value['aid'];?>">
                                     
                                        <div class="col-6 text-left mt-1">
                                           <?php echo sanitize($value_addon['addon_name']); ?>
                                        </div> 
                                        <div class="col-2 text-left mt-1">
                                            <span style="font-size: 10px;"><?php echo sanitize($value_addon['addon_price']) ? currency(sanitize(number_format($value_addon['addon_price'], 2, '.', ''))) :'';?></span>
                                            
                                        </div>
                                        <div class="col-3 text-right mt-1">
                                          <?php if($value_addon['status'] == 0) :?>
                                          <a href="javascript:void(0)"  class="text-danger" id="<?php echo $value['aid'];?>" onclick="deleteCartAddon(this.id)"><i class="fa fa-times" aria-hidden="true"></i></a>
                                         <?php else :?>
                                         <?php endif; ?>
                                        </div> 
                                    </div>
                                
                            <?php endforeach; ?>
                     <?php endforeach; ?>

                            
                    </div>
                </div>
            </div>
        <button class="btn btn-success btn-block" onclick="updateCart('<?php echo sanitize($cart_item_details['id']); ?>', '<?php echo sanitize($menu_details['id']); ?>', $('#plate-servings').val(), $('#quantity_for_full_plate').val())"><?php echo site_phrase('update_cart'); ?></button>

    <?php endif; ?>
</div>
