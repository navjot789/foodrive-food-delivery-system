<!-- Content Header (Page header) -->
<?php include  'header.php'; ?>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <form action="<?php echo site_url('menu/store'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="availability" value="1">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="alert alert-info lighten-info alert-dismissible">
                        <i class="icon fas fa-exclamation-triangle"></i> <strong><?php echo get_phrase('note'); ?></strong>:
                        <?php echo get_phrase('this_is_a_quick_form_for_adding_menus'); ?>. <?php echo get_phrase('for_adding_more_information_like'); ?> <strong>"<?php echo get_phrase('menu_variation'); ?>"</strong>, <strong>"<?php echo get_phrase('addon_items'); ?>"</strong>, <strong>"<?php echo get_phrase('menu_details_with_nutrition'); ?>"</strong> <?php echo strtolower(get_phrase('can_be_added_from_menu_edit_view')); ?>.
                    </div>
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo get_phrase('basic_information'); ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name"><?php echo get_phrase("menu_name"); ?> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo "E.g : " . get_phrase("Chicken_Steak_Grilled_Burger"); ?>">
                            </div>
                            <div class="form-group">
                                <label id="category_id"><?php echo get_phrase("menu_category"); ?> <span class="text-danger">*</span></label> <small class="float-right"><a href="<?php echo site_url('category/create'); ?>"><?php echo get_phrase("create_new_category"); ?></a></small>
                                <select class="form-control select2 w-100" id="category_id" name="category_id">
                                    <option value=""><?php echo get_phrase("choose_one"); ?></option>
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?php echo sanitize($category['id']); ?>"><?php echo sanitize($category['name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="restaurant_id"><?php echo get_phrase("restaurant"); ?> <span class="text-danger">*</span> <small>( <?php echo get_phrase("you_can_choose_multiple_restaurants"); ?> )</small> </label> <small class="float-right"><a href="<?php echo site_url('restaurant/create'); ?>"><?php echo get_phrase("create_new_restaurant"); ?></a></small>
                                <select class="form-control select2" name="restaurant_id[]" multiple="multiple" data-placeholder="<?php echo get_phrase("choose_restaurant"); ?>">
                                    <?php foreach ($restaurants as $key => $restaurant) : ?>
                                        <option value="<?php echo sanitize($restaurant['id']); ?>"><?php echo sanitize($restaurant['name']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="per_menu_price"><?php echo get_phrase("price") . ' (' . currency_code_and_symbol('code') . ')'; ?> <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="per_menu_price" name="per_menu_price" placeholder="<?php echo get_phrase('enter_menu_price'); ?>" step=".01">
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="per_menu_discount_flag" id="per_menu_discount_flag" value="1">
                                <label class="custom-control-label" for="per_menu_discount_flag"><?php echo get_phrase('check_if_this_menu_has_discount'); ?></label>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="per_menu_discounted_price"><?php echo get_phrase("discounted_price") . ' (' . currency_code_and_symbol('code') . ')'; ?></label>
                                <input type="number" class="form-control" name="per_menu_discounted_price" id="per_menu_discounted_price" onkeyup="calculateDiscountPercentage('per_menu', this.value)" step=".01">
                                <small class="text-muted"><?php echo get_phrase('this_menu_has'); ?> <span id="per_menu_discounted_percentage" class="text-danger">0%</span> <?php echo get_phrase('discount'); ?></small>
                            </div>

                            <!-- MENU THUMBNAIL -->
                            <div class="form-group">
                                <label for="food_menu_thumbnail"><?php echo get_phrase("menu_thumbnail"); ?> <span class="badge badge-default">(235 X 171)</span></label>
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' class="imageUploadPreview" id="food_menu_thumbnail" name="food_menu_thumbnail" accept=".png, .jpg, .jpeg" />
                                        <label for="food_menu_thumbnail"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="food_menu_thumbnail_preview" thumbnail="<?php echo base_url('uploads/menu/placeholder.png'); ?>"></div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary"><?php echo get_phrase('submit'); ?></button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--/. container-fluid -->
</section>