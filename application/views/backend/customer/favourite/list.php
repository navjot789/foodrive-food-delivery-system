<?php if (count($favourites)) : ?>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <?php echo get_phrase("list_of_favourites", true); ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="favourites" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase("menu_name"); ?></th>
                                <th><?php echo get_phrase("restaurant_name"); ?></th>
                                <th><?php echo get_phrase("price"); ?></th>
                                <th><?php echo get_phrase("availability"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($favourites as $favourite) : ?>
                                <tr>
                                    <td>
                                        <?php echo sanitize($favourite['menu_name']); ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('site/restaurant/' . sanitize(rawurlencode($favourite['restaurant_slug'])) . '/' . sanitize($favourite['restaurant_id'])); ?>"><?php echo sanitize($favourite['restaurant_name']); ?></a>
                                    </td>
                                    <td>
                                        <?php if ($favourite['menu_servings'] == 'menu') : ?>
                                            <?php echo currency(get_menu_price(sanitize($favourite['menu_id']))); ?>
                                        <?php elseif ($favourite['menu_servings'] == 'plate') : ?>
                                            <?php echo get_phrase('full_plate') . ": " . currency(get_menu_price(sanitize($favourite['menu_id']), 'full_plate')); ?><br>
                                            <?php echo get_phrase('half_plate') . ": " . currency(get_menu_price(sanitize($favourite['menu_id']), 'half_plate')); ?>
                                        <?php endif; ?>

                                    </td>
                                    <td class="text-center">
                                        <?php if (sanitize($favourite['menu_availability'])) : ?>
                                            <span class="badge badge-success lighten-success"><?php echo get_phrase('available'); ?></span>
                                        <?php else : ?>
                                            <span class="badge badge-danger lighten-danger"><?php echo get_phrase('unavailable'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn action-dropdown" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                        <ul class="dropdown-menu">
                                            <?php if (sanitize($favourite['menu_availability'])) : ?>
                                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="showCartModal('<?php echo site_url('modal/popup/favourite/cart/' . sanitize($favourite['menu_id'])); ?>', '<?php echo get_phrase('add_to_cart'); ?>')"><?php echo get_phrase("add_to_cart"); ?></a></li>
                                            <?php endif; ?>
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('favourite/update/' . sanitize($favourite['menu_id'])); ?>')"><?php echo get_phrase("remove_from_favourite"); ?></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo get_phrase("restaurant_name"); ?></th>
                                <th><?php echo get_phrase("menu_name"); ?></th>
                                <th><?php echo get_phrase("price"); ?></th>
                                <th><?php echo get_phrase("availability"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (!count($favourites)) : ?>
    <?php isEmpty(); ?>
<?php endif; ?>