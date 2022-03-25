<?php
$menu_options = $this->variation_model->get_options(sanitize($param2));
?>
<?php if (is_array($menu_options) && count($menu_options) > 0) : ?>
    <form action="<?php echo site_url('variation/variant/create'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="menu_id" value="<?php echo sanitize($param2); ?>">
        
        <div class="form-group">
            <label for="variant_price"><?php echo get_phrase("variant_price"); ?><span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="variant_price" name="variant_price" placeholder="<?php echo get_phrase('enter_variant_price'); ?>" step=".01">
        </div>

        <div class="form-group">
                    <label for="menu_variation_options">
                       Options <span class="text-danger">*</span>
                    </label> 
                
                 <select class="custom-select" id="menu_variation_options" name="menu_variation_options[]">
                 <?php foreach ($menu_options as $key => $menu_option) : ?>  
                            <?php
                            $exploded_variant_options = explode(',', $menu_option['options']);
                            foreach ($exploded_variant_options as $exploded_variant_option) : ?>
                                <option value="<?php echo sanitize($menu_option['id']); ?>-<?php echo sanitize($exploded_variant_option); ?>">
                                <?php echo ucfirst(sanitize($menu_option['name'])); ?> -- <?php echo ucfirst(sanitize($exploded_variant_option)); ?>
                                </option>
                            <?php endforeach; ?>
                <?php endforeach; ?>
                </select>

        </div>

        <button type="submit" class="btn btn-primary mt-4"><?php echo get_phrase('add_variant'); ?></button>
    </form>
<?php else : ?>
    <div class="alert alert-info lighten-info text-center">
        <i class="icon fas fa-exclamation-triangle"></i> <strong><?php echo get_phrase('heads_up'); ?></strong>!
        <?php echo get_phrase('add_variant_option_first_to_add_menu_variants'); ?>.
    </div>
<?php endif; ?>