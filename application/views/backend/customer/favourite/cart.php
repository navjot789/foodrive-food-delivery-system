<?php
$menu_details = $this->menu_model->get_by_id($param2);
if ($menu_details['has_variant']) {
    $variant_options = $this->variation_model->get_options($param2);
}else{
    $variant_options = array();
}
$addon_data = $this->addons_model->get_addon_by_menu_id($menu_details['id']);
?>
   <?php if($menu_details['thumb_status']) :?>
        <!--Header-->
        <div class="modal-header">
            <img src="<?php echo base_url('uploads/menu/' . sanitize($menu_details['thumbnail'])); ?>" alt="avatar" class="rounded-circle img-responsive foodmenu-thumbnail-for-cart">
        </div>
    <?php endif;?>

<!--Body-->
<div class="modal-body text-center mb-1">
    <h6 class="mt-1 mb-2"><?php echo sanitize($menu_details['name']); ?></h6>

        <div class="form-group">
            <input type="hidden" name="rest-id" id="rest-id" value="<?php echo sanitize($menu_details['restaurant_id']); ?>">
            <input type="hidden" name="menu-id" id="menu-id" value="<?php echo sanitize($menu_details['id']); ?>">
            <input type="hidden" name="variant-id" id="variant-id" value="">
            <input type="hidden" name="variant-count" id="variant-count" value="<?php echo count($variant_options);?>">
            <input type="hidden" name="addons" id="addons" value="">
        </div>

        <!-- VARIANTS -->
        <?php if ($menu_details['has_variant']) : ?>
                <div class="container-fluid">
                        <div class="row">    
                              <div class="list-group w-100">
                                    <?php foreach ($variant_options as $variant_option) : ?>
                                       
                                                 <a href="javascript:void(0)" style="background: #f8f9fa;" class="rounded font-weight-bold p-1 list-group-item-action border-0 d-flex justify-content-between align-items-center" aria-current="true">
                                                        <?php echo ' Choose '.ucfirst(sanitize($variant_option['name'])); ?>
                                                        <span class="badge badge-danger badge-pill">Required</span>
                                                    </a> 
                                        <?php $menu_variants = $this->variation_model->get_variants_by_id($variant_option['menu_id'], $variant_option['id']);?>
                                                <?php foreach ($menu_variants as $menu_variant) : ?>  

                                                    <a href="javascript:void(0)"  class="p-1 border-0 list-group-item-action d-flex justify-content-between align-items-center" aria-current="true">
                                                        <label class="ml-1" for="<?php echo sanitize($menu_variant['id']); ?>" >
                                                            <small><?php echo get_phrase(sanitize($menu_variant['variant']), true); ?></small></label>
                                                        <input class="mr-1" type="radio" id="<?php echo sanitize($menu_variant['id']); ?>" name="<?php echo sanitize($variant_option['id']); ?>" value="<?php echo sanitize($menu_variant['id']); ?>" class="menu-variants" onclick="calculateMenuPrice()" >
                                                    </a>
                                                            
                                                <?php endforeach; ?>   
                                            
                                    <?php endforeach; ?>
                                </div>         
                        </div>
                    </div>
              <?php endif; ?>

         <!-- ADDONS -->
         <?php if ($addon_data && count($addon_data)) : ?>
            <div class="container-fluid mb-3">
                     <div class="row">
                              <div class="list-group w-100">
                                     <a href="javascript:void(0)" style="background: #f8f9fa;" class="rounded font-weight-bold p-1 list-group-item-action border-0 d-flex justify-content-between align-items-center " aria-current="false">
                                        <?php echo site_phrase('addons'); ?>
                                         <span class="badge badge-secondary badge-pill">Optional</span>
                                      </a>
                                     
                                     <?php foreach ($addon_data as $addon) : ?>
                                                  <a  href="javascript:void(0)"  class="p-1 border-0 list-group-item-action d-flex justify-content-between align-items-center <?php echo (sanitize($addon['status']) == 1) ? 'disabled bg-light' : ''; ?>" aria-current="true">
                                                    <label class="ml-1" for="<?php echo sanitize($addon['aid']); ?>" class="mr-2">
                                                                <small><?php echo get_phrase(sanitize($addon['addon_name']),true); ?> - Add <?php echo currency(sanitize($addon['addon_price'])); ?> </small>
                                                    </label>
                                                    <input class="mr-1" type="checkbox" id="<?php echo sanitize($addon['aid']); ?>" name="addons" class="addons" value="<?php echo $addon['aid']; ?>" onclick="calculateMenuPrice()" <?php echo (sanitize($addon['status']) == 1) ? 'checked disabled' : ''; ?>> 
                                                  </a>   
                                    <?php endforeach; ?>
                              </div>
                 </div>
            </div>
            <?php endif; ?>


              <!--INC DEC-->
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <button class="btn quantity-incrementar" type="button" onclick="changeQuantity(0)">-</button>
                </div>
                <input type="number" class="form-control text-center bg-white" id="quantity_for_menu" min="1" value="1" aria-describedby="basic-addon1" onchange="calculateMenuPrice()" readonly>
                <div class="input-group-append">
                    <button class="btn quantity-decrementer" type="button" onclick="changeQuantity(1)">+</button>
                </div>
            </div>
        
          <div class="row">
            <div class="col-md-12">

                <div class="justify-content-center mb-2">
                        <textarea class="form-control" rows="1" id="note" placeholder="Any food instructions?" name="note" style="border-top: none;border-left: none;border-right: none;"></textarea>
                </div>
              
                <?php if (is_open($menu_details['restaurant_id'])) : ?>
                    <span id="message-response"></span>
                    <?php if ($menu_details['availability']) : ?>
                        <button class="btn btn-block btn-success" onclick="addToCart()" <?php if ($menu_details['has_variant']) echo 'disabled'; ?>><i class="fas fa-cart-plus"></i> <?php echo site_phrase('add_to_cart'); ?>
                                 <strong id="menu-price" >
                                     <i class="fas fa-circle-notch fa-spin d-none"></i> 
                                     <span class="calculated-price float-right"><?php echo currency(sanitize(get_menu_price($menu_details['id']))); ?> 
                                     </span>
                                </strong>
                        </button>
                    <?php else : ?>
                        <button class="btn btn-secondary btn-block"><?php echo site_phrase('unavailable_item', true); ?></button>
                    <?php endif; ?>
                <?php else : ?>
                    <button class="btn btn-secondary btn-block"><?php echo site_phrase('already_closed', true); ?></button>
                <?php endif; ?>
            </div>
        </div>

          <div class="justify-content-center">
              <button class="btn btn-default btn-lg" data-dismiss="modal" aria-label="Close"><i class="fa fa-times text-danger"></i> </button>
          </div>
 
</div>


