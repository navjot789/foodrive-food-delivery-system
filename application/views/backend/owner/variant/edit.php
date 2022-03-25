<?php
$menu_id = $param2;
$menu_variant_id = $param3;
$menu_variant = $this->variation_model->get_variant_by_id($menu_variant_id);
?>
<form action="<?php echo site_url('variation/variant/edit'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="menu_id" value="<?php echo sanitize($param2); ?>">
    <input type="hidden" name="menu_variant_id" value="<?php echo sanitize($menu_variant_id); ?>">
    <div class="form-group">
        <label for="variant_price"><?php echo get_phrase("variant_price"); ?><span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="variant_price" name="variant_price" placeholder="<?php echo get_phrase('enter_variant_price'); ?>" step=".01" value="<?php echo sanitize($menu_variant['price']); ?>">
    </div>
    <?php $menu_options = $this->variation_model->get_options(sanitize($param2)); ?>
    <?php if (is_array($menu_options) && count($menu_options) > 0) : ?>
     
        <div class="form-group">
            <label for="variant_price"><?php echo get_phrase("Option"); ?><span class="text-danger">*</span></label>
            <input type="text" class="form-control"  placeholder="<?php echo get_phrase('enter_variant_price'); ?>" step=".01" value="<?php echo sanitize($menu_variant['variant']); ?>" disabled>
        </div>
    <?php endif; ?>
    <button type="submit" class="btn btn-primary mt-4"><?php echo get_phrase('update_variant'); ?></button>
</form>