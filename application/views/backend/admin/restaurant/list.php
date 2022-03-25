<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span class="mt-5"><?php echo sanitize($restaurant_status) ? get_phrase('list_of_registered_restaurants', true) : get_phrase('list_of_requested_restaurants', true); ?></span>
                    <?php if ($restaurant_status) : ?>
                        <a href="<?php echo site_url('restaurant/pending'); ?>" class="btn btn-secondary btn-rounded float-right"><?php echo get_phrase("show_requested_restaurants", true); ?></a>
                    <?php else : ?>
                        <a href="<?php echo site_url('restaurant'); ?>" class="btn btn-success btn-rounded float-right"><?php echo get_phrase("show_approved_restaurants", true); ?></a>
                    <?php endif; ?>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php if (count($restaurants)) : ?>
                    <table id="restaurants" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase("restaurant_name"); ?></th>
                                <th><?php echo get_phrase("owner"); ?></th>
                                <th><?php echo get_phrase("address"); ?></th>
                                <th><?php echo get_phrase("phone_number"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($restaurants as $restaurant) : ?>
                                <tr>
                                    <td><a href="<?php echo site_url('restaurant/edit/' . sanitize($restaurant['id']) . '/basic'); ?>"><?php echo sanitize($restaurant['name']); ?></a></td>
                                    <td>
                                        <small class="text-muted">
                                            <?php echo get_phrase("name"); ?>
                                            <?php if ($restaurant['owner_id'] && get_user_role('user_role', $restaurant['owner_id']) != 'admin') : ?>
                                                <strong><a href="<?php echo site_url('owner/profile/' . sanitize($restaurant['owner_id'])); ?>"><?php echo getter(sanitize($restaurant['owner_name'])); ?></a></strong>
                                            <?php else : ?>
                                                <strong><?php echo getter(sanitize($restaurant['owner_name'])); ?></strong>
                                            <?php endif; ?>
                                        </small>
                                        <br>
                                        <small class="text-muted"><?php echo get_phrase("email") . ": <strong>" . getter(sanitize($restaurant['owner_email'])) . "</strong>"; ?></small><br>
                                        <small class="text-muted"><?php echo get_phrase("phone") . ": <strong>" . getter(sanitize($restaurant['owner_phone'])) . "</strong>"; ?></small><br>
                                    </td>
                                    <td><small><i class="fas fa-map-marker-alt" ></i> <?php echo sanitize($restaurant['address']); ?></small></td>
                                    <td>
                                        <?php if(!empty($restaurant['phone'])) : ?> 
                                            <i class="fas fa-phone-square-alt" ></i> <?php echo sanitize($restaurant['phone']); ?>
                                        <?php else :?>
                                           <span class="text-muted">Not Found</span>
                                        <?php endif;?>
                                     </td>
                                    <td class="text-center">
                                        <button class="btn action-dropdown" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></button>
                                        <ul class="dropdown-menu">
                                           
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('restaurant/update_status/' . sanitize($restaurant['id'])); ?>')"><?php echo sanitize($restaurant['status']) ? '<i class="fas fa-clock" ></i> '.get_phrase("Mark_as_pending") : '<i class="fas fa-check" ></i> '.get_phrase("Mark_as_approved"); ?></a></li>
                                            <?php if(!empty($restaurant['visibility'])) : ?> 
                                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('restaurant/visible/0/' . sanitize($restaurant['id'])); ?>')"><i class="fas fa-eye-slash" ></i> <?php echo get_phrase("hide"); ?></a></li>
                                            <?php else :?>
                                                <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('restaurant/visible/1/' . sanitize($restaurant['id'])); ?>')"><i class="fas fa-eye" ></i> <?php echo get_phrase("Show"); ?></a></li>
                                            <?php endif;?>
                                           
                                            <li><a class="dropdown-item" href="<?php echo site_url('restaurant/edit/' . sanitize($restaurant['id']) . '/basic'); ?>"><i class="fas fa-edit" ></i>  <?php echo get_phrase("edit"); ?></a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)" onclick="confirm_modal('<?php echo site_url('restaurant/delete/' . sanitize($restaurant['id'])); ?>')"><i class="fas fa-trash-alt" ></i>  <?php echo get_phrase("delete"); ?></a></li>
                                          
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo get_phrase("restaurant_name"); ?></th>
                                <th><?php echo get_phrase("owner"); ?></th>
                                <th><?php echo get_phrase("address"); ?></th>
                                <th><?php echo get_phrase("phone_number"); ?></th>
                                <th><?php echo get_phrase("action"); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                <?php endif; ?>

                <!-- IF LIST IS EMPTY -->
                <?php if (!count($restaurants)) : ?>
                    <?php isEmpty(); ?>
                <?php endif; ?>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>