<table class="table">
    <thead>
        <tr>
            <th><?php echo get_phrase("addons"); ?></th>
            <th><?php echo get_phrase("price"); ?></th>
            <th><?php echo get_phrase("type"); ?></th>
            <th><?php echo get_phrase('actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $addon_data = $this->addons_model->get_addon_by_menu_id($id); ?>
        <?php if (is_array($addon_data) && count($addon_data) > 0) : ?>
              <?php foreach (array_reverse($addon_data) as $value) :?>
                <tr>
                    <td><?php echo sanitize($value['addon_name']); ?></td>
                    <td>
                        <?php echo currency(sanitize(format($value['addon_price']))); ?>
                    </td>
                     <td>
                       <?php if ($value['status']==1) :?>
                            <span class="badge badge-success">Static</span>        
                        <?php else :?>     
                            <span class="badge badge-secondary">Basic</span>              
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-xs action-dropdown" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="showAjaxModal('<?php echo site_url('modal/popup/addons/edit/' . sanitize($id) . '/' . sanitize($value['aid'])); ?>', '<?php echo get_phrase('edit_addon_menu'); ?>')">
                                    <?php echo get_phrase("edit"); ?>
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('addons/addon/delete/' . sanitize($value['aid'])); ?>')"><?php echo get_phrase("delete"); ?></a></li>
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