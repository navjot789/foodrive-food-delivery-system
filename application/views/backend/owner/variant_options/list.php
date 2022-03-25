<table class="table">
    <thead>
        <tr>
            <th><?php echo get_phrase("name"); ?></th>
            <th><?php echo get_phrase("options"); ?></th>
            <th><?php echo get_phrase('actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $menu_options = $this->variation_model->get_options(sanitize($menu_data['id'])); ?>
        <?php if (is_array($menu_options) && count($menu_options) > 0) : ?>
            <?php foreach ($menu_options as $key => $menu_option) : ?>
                <tr>
                    <td><?php echo sanitize($menu_option['name']); ?></td>
                    <td>
                        <?php echo sanitize($menu_option['options']); ?>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-xs action-dropdown" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/variant_options/edit/' . sanitize($menu_data['id']) . '/' . sanitize($menu_option['id'])); ?>', '<?php echo get_phrase('edit_variant_options'); ?>')">
                                    <?php echo get_phrase("edit"); ?>
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('variation/option/delete/' . sanitize($menu_option['id'])); ?>')"><?php echo get_phrase("delete"); ?></a></li>
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