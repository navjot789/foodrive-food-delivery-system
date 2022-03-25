<div class="card">
    <div class="card-body">
        <form action="<?php echo site_url('menu/index'); ?>" action="get">
            <div class="row justify-content-sm-center">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label><?php echo get_phrase('restaurant'); ?></label>
                        <select class="form-control select2 w-100" name="restaurant_id">
                            <option value="all" <?php if ($restaurant_id == "all") echo "selected"; ?>><?php echo get_phrase('all'); ?></option>
                            <?php foreach ($restaurants as $key => $restaurant) : ?>
                                <option value="<?php echo sanitize($restaurant['id']); ?>" <?php if ($restaurant_id == $restaurant['id']) echo "selected"; ?>><?php echo sanitize($restaurant['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label><?php echo get_phrase('category'); ?></label>
                        <select class="form-control select2 w-100" name="category_id">
                            <option value="all" <?php if ($category_id == "all") echo "selected"; ?>><?php echo get_phrase('all'); ?></option>
                            <?php foreach ($categories as $key => $category) : ?>
                                <option value="<?php echo sanitize($category['id']); ?>" <?php if ($category_id == $category['id']) echo "selected"; ?>><?php echo sanitize($category['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group mt-30">
                        <button type="submit" class="btn btn-primary"><?php echo get_phrase('filter'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php if (count($menus) > 0) : ?>
    <div class="row justify-content-center">
        <?php foreach ($menus as $key => $menu) : ?>
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card <?php  echo ($menu['availability'])? 'card-primary':'card-danger'; ?> card-outline " id="card-container-<?php  echo ($menu['id']); ?>">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        <?php if($menu['thumb_status']) :?>
                            <img class="profile-user-img img-fluid img-circle light-thumb-circle square-100" src="<?php echo base_url('uploads/menu/' . sanitize($menu['thumbnail'])); ?>" alt="<?php echo get_phrase('menu_thumbnail'); ?>">
                        <?php else :?>
                            <img class="profile-user-img img-fluid img-circle light-thumb-circle square-100" src="<?php echo base_url('uploads/menu/placeholder.png'); ?>" alt="<?php echo get_phrase('menu_thumbnail'); ?>">
                        <?php endif;?>
                        </div>
                        <h3 class="profile-username text-center">
                            <?php echo sanitize($menu['name']); ?>
                        </h3>
                        <div class="text-center mb-2">
                            <small><?php echo get_phrase('restaurant'); ?> : <strong><?php echo sanitize($menu['restaurant_name']); ?></strong></small>
                            <?php if ($menu['availability']) : ?>
                                <span class="badge badge-success text-xs" id="stock-<?php echo sanitize($menu['id']); ?>"><?php echo get_phrase('available'); ?></span>
                            <?php else : ?>
                                <span class="badge badge-danger text-xs"  id="stock-<?php echo sanitize($menu['id']); ?>"><?php echo get_phrase('not_available'); ?></span>
                            <?php endif; ?>
                        </div>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b><?php echo get_phrase('category'); ?></b>
                                <a class="float-right"><?php echo sanitize($menu['category_name']); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b><?php echo get_phrase('price'); ?></b>
                                <a class="float-right text-success">
                                    <?php
                                    if ($menu['servings'] == "menu") {
                                        echo currency(get_menu_price($menu['id']));
                                    }  ?>

                                </a>
                            </li>
                            <li class="list-group-item">
                                <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input"  type="checkbox" id="availability-<?php echo sanitize($menu['id']); ?>"  <?php if ($menu['availability']) echo "checked"; ?>>
                                        <label for="availability-<?php echo sanitize($menu['id']);?>" class="custom-control-label">Stock <small>( Uncheck, If it is out of stock )</small></label>
                                    </div>
                            </li>
                          
                        </ul>
                        <a href="<?php echo site_url('menu/edit/' . sanitize($menu['id'])); ?>" class="btn btn-primary btn-block" id="menu-btn-<?php  echo ($menu['id']); ?>"><b><i class="fas fa-info-circle"></i> <?php echo get_phrase('details'); ?></b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        <?php endforeach; ?>
    </div>

    <nav aria-label="Page Navigation">
        <?php echo $this->pagination->create_links(); ?>
    </nav>
<?php endif; ?>

<?php if (count($menus) == 0) : ?>
    <?php isEmpty(); ?>
<?php endif; ?>
