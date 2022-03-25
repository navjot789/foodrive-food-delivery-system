<?php
$menu_id = $param2;
$menu_option_id = $param3;
$menu_options = $this->variation_model->get_options_by_id($menu_option_id);
?>
<form action="<?php echo site_url('variation/option/edit'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="menu_id" value="<?php echo sanitize($menu_id); ?>">
    <input type="hidden" name="menu_option_id" value="<?php echo sanitize($menu_option_id); ?>">
    <div class="form-group">
        <label for="name"><?php echo get_phrase("name"); ?><span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo "E.g : " . get_phrase("size"); ?>" value="<?php echo sanitize($menu_options['name']); ?>">
    </div>
    <div class="form-group">
        <label for="options">
            <?php echo get_phrase("options"); ?><span class="text-danger">*</span>
            <small>( <?php echo get_phrase('you_can_add_multiple_using_comma'); ?> )</small>
        </label>
        <input type="text" class="form-control" id="options" name="options" placeholder="<?php echo "E.g : " . get_phrase("small") . ',' . get_phrase("medium") . ',' . get_phrase("large"); ?>" value="<?php echo sanitize($menu_options['options']); ?>">
    </div>
    <button type="submit" class="btn btn-primary mt-4"><?php echo get_phrase('update_variant_option'); ?></button>
</form>