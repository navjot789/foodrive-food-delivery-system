<?php
$menu_id = $param2;
$menu_addon_id = $param3;
$menu_addon = $this->addons_model->get_addon_by_id($menu_addon_id);
?>
<form action="<?php echo site_url('addons/addon/edit'); ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="menu_id" value="<?php echo sanitize($menu_id); ?>">
    <input type="hidden" name="addon_id" value="<?php echo sanitize($menu_addon_id); ?>">
    <div class="form-group">
        <label for="addon_name"><?php echo get_phrase("addon_name"); ?><span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="addon_name" name="addon_name" placeholder="<?php echo "E.g : " . get_phrase("extra_cheese"); ?>" value="<?php echo sanitize($menu_addon[0]['addon_name']); ?>">
    </div>
    <div class="form-group">
        <label for="addon_price"><?php echo get_phrase("addon_price"); ?><span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="addon_price" name="addon_price" placeholder="<?php echo get_phrase('enter_addon_price'); ?>" step=".01" value="<?php echo sanitize(format($menu_addon[0]['addon_price'])); ?>">
    </div>

      <div class="form-group">
        <label for="addon_price"><?php echo get_phrase("type"); ?><span class="text-danger">*</span></label>   
        <select class="form-control" id="addon_type" name="addon_type"> 
          <option value="0" <?php echo ($menu_addon[0]['status']) ? 'selected="selected"' : ''; ?>>Basic</option>
          <option value="1" <?php echo ($menu_addon[0]['status']) ? 'selected="selected"' : ''; ?>>Static</option>
        </select>
    </div>
   
    <button type="submit" class="btn btn-primary mt-4"><?php echo get_phrase('update_addon'); ?></button>
</form>