<table class="table">
    <thead>
        <tr>
            <th><?php echo get_phrase("variant"); ?></th>
            <th><?php echo get_phrase("price"); ?></th>
            <th><?php echo get_phrase('Out_of_stock'); ?></th> 
            <th><?php echo get_phrase('actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $menu_variants = $this->variation_model->get_variants(sanitize($menu_data['id'])); ?>
        <?php if (is_array($menu_variants) && count($menu_variants) > 0) : ?>
           
            <?php foreach ($menu_variants as $key => $menu_variant) : ?>
                <?php  $menu_options = $this->variation_model->get_options_by_id(sanitize($menu_variant['option_id'])); ?>
                <tr>
                    <td>
                        <strong><?php echo sanitize($menu_options['name']); ?></strong> : <?php echo sanitize($menu_variant['variant']); ?>
                    </td>
                    <td>
                        <?php echo currency(sanitize($menu_variant['price'])); ?>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox mb-2">
                            <input class="custom-control-input" name="out_stock" type="checkbox" id="out_stock-<?php echo sanitize($menu_variant['id']); ?>" <?php if ($menu_variant['avail']) echo "checked"; ?> onchange="toggleVariant(this, '<?php echo sanitize($menu_variant['id']); ?>','<?php echo sanitize($menu_variant['option_id']); ?>')">
                            <label for="out_stock-<?php echo sanitize($menu_variant['id']); ?>" class="custom-control-label"><?php echo get_phrase("Out_of_stock"); ?> <small>( <?php echo get_phrase('check') . ', ' . get_phrase('if_this_out_of_stock'); ?>  )</small></label>
                        </div>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-xs action-dropdown" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/variant/edit/' . sanitize($menu_data['id']) . '/' . sanitize($menu_variant['id'])); ?>', '<?php echo get_phrase('edit_menu_variant'); ?>')">
                                    <?php echo get_phrase("edit"); ?>
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('variation/variant/delete/' . sanitize($menu_variant['id'])); ?>')"><?php echo get_phrase("delete"); ?></a></li>
                        </ul>
                    </td>
                   
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="3"><?php echo get_phrase('no_data_found'); ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>