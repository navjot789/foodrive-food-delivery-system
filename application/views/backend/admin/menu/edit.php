<!-- Content Header (Page header) -->
<?php include  'header.php'; ?>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <!-- Custom Tabs -->
        <div class="card">
            <div class="card-header d-flex p-0">
                <ul class="nav nav-pills p-2">
                    <li class="nav-item"><a href="#basic" class="nav-link <?php if ($active_tab == "basic") echo 'active'; ?>" data-toggle="tab"><?php echo get_phrase('basic_data') ?></a></li>
                    <li class="nav-item"><a href="#details" class="nav-link  <?php if ($active_tab == "details") echo 'active'; ?>" data-toggle="tab"><?php echo get_phrase('details') ?></a></li>
                    <li class="nav-item"><a href="#servings-price" class="nav-link  <?php if ($active_tab == "price") echo 'active'; ?>" data-toggle="tab"><?php echo get_phrase('price_details', true) ?></a></li>
                    <li class="nav-item"><a href="#gallery" class="nav-link <?php if ($active_tab == "gallery") echo 'active'; ?>" data-toggle="tab"><?php echo get_phrase('gallery') ?></a></li>
                    <li class="nav-item"><a href="#variation" class="nav-link <?php if ($active_tab == "variation") echo 'active'; ?>" data-toggle="tab"><?php echo get_phrase('menu_variation') ?></a></li>
                    <li class="nav-item"><a href="#addons" class="nav-link <?php if ($active_tab == "addons") echo 'active'; ?>" data-toggle="tab"><?php echo get_phrase('addons') ?></a></li>
                    <li class="nav-item"><a href="javascript:void(0);" class="nav-link text-white btn btn-danger ml-2" onclick="confirm_modal('<?php echo site_url('menu/delete/' . sanitize($id)); ?>')"><?php echo get_phrase('delete_this_menu') ?></a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane  <?php if ($active_tab == "basic") echo 'active'; ?>" id="basic">
                        <div class="row">
                            <div class="col-xl-6">
                                <form action="<?php echo site_url('menu/update'); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo sanitize($id); ?>">
                                    <input type="hidden" name="type" value="basic">
                                    <div class="form-group">
                                        <label for="name"><?php echo get_phrase("menu_name"); ?> <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo "E.g : " . get_phrase("Chicken_Steak_Grilled_Burger"); ?>" value="<?php echo sanitize($menu_data['name']); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label id="category_id"><?php echo get_phrase("menu_category"); ?> <span class="text-danger">*</span></label> <small class="float-right"><a href="<?php echo site_url('category/create'); ?>"><?php echo get_phrase("create_new_category"); ?></a></small>
                                        <select class="form-control select2 w-100" id="category_id" name="category_id">
                                            <?php foreach ($categories as $category) : ?>
                                                <option value="<?php echo sanitize($category['id']); ?>" <?php if ($menu_data['category_id'] == $category['id']) echo "selected"; ?>><?php echo sanitize($category['name']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="restaurant_id"><?php echo get_phrase("restaurant"); ?> <span class="text-danger">*</span></label> <small class="float-right"><a href="<?php echo site_url('restaurant/create'); ?>"><?php echo get_phrase("create_new_restaurant"); ?></a></small>
                                        <select class="form-control select2 w-100" id="restaurant_id" name="restaurant_id">
                                            <?php foreach ($restaurants as $key => $restaurant) : ?>
                                                <option value="<?php echo sanitize($restaurant['id']); ?>" <?php if ($menu_data['restaurant_id'] == $restaurant['id']) echo "selected"; ?>><?php echo sanitize($restaurant['name']); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" name="availability" type="checkbox" id="availability" <?php if ($menu_data['availability']) echo "checked"; ?>>
                                        <label for="availability" class="custom-control-label"><?php echo get_phrase("it_is_available"); ?> <small>( <?php echo get_phrase('uncheck') . ', ' . get_phrase('if_it_is_out_of_stock'); ?> )</small></label>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4"><?php echo get_phrase('update_basic'); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane  <?php if ($active_tab == "details") echo 'active'; ?>" id="details">
                        <div class="row">
                            <div class="col-xl-6">
                                <form action="<?php echo site_url('menu/update'); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo sanitize($id); ?>">
                                    <input type="hidden" name="type" value="details">
                                    <div class="form-group">
                                        <label for="items"><?php echo get_phrase("items"); ?></label>
                                        <input type="text" id="tags" class="tagged form-control" data-removeBtn="true" name="items" placeholder="<?php echo get_phrase("insert_an_item_and_press_enter"); ?> ( burger, pizza, cold drinks)" value="<?php echo sanitize($menu_data['items']); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="details"><?php echo get_phrase("menu_details"); ?></label>
                                        <textarea name="details" class="form-control" id="details" rows="5" placeholder="E.g : <?php echo get_phrase('Consists_of_fried_rice_chicken_curry_and_coleslaw_salad'); ?>."><?php echo sanitize($menu_data['details']); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="nutrition_face"><?php echo get_phrase("nutrition_fact"); ?></label>
                                        <table id="tabular-input" class="data-table data-table-horizontal data-table-highlight">
                                            <tbody>
                                                <?php $nutrition_facts = json_decode($menu_data['nutrition_fact'], true);
                                                if (is_array($nutrition_facts) && count($nutrition_facts) > 0) :
                                                    foreach ($nutrition_facts as $key => $nutrition_fact) : ?>
                                                        <tr>
                                                            <td><input type="text" class="form-control" name="nutrition_key[]" placeholder="<?php echo "E.g : " . get_phrase("protien"); ?>" value="<?php echo sanitize($key); ?>"></td>
                                                            <td><input type="text" class="form-control" name="nutrition_value[]" placeholder="13 gm" value="<?php echo sanitize($nutrition_fact); ?>"></td>
                                                            <td><a type="button" class="btn btn-default" value="Delete" onclick="deleteRow(this)"><i class="fas fa-trash"></i></a></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <tr>
                                                        <td><input type="text" class="form-control" name="nutrition_key[]" placeholder="<?php echo "E.g : " . get_phrase("protien"); ?>" value=""></td>
                                                        <td><input type="text" class="form-control" name="nutrition_value[]" placeholder="13 gm" value=""></td>
                                                        <td><a type="button" class="btn btn-default" value="Delete" onclick="deleteRow(this)"><i class="fas fa-trash"></i></a></td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-primary  float-left">Update menu details</button>
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-info float-right" onclick="addRow('tabular-input')"><?php echo get_phrase('add_new_row'); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane  <?php if ($active_tab == "price") echo 'active'; ?>" id="servings-price">
                        <div class="row">
                            <div class="col-xl-6">

                                <?php
                                $discount_flag_decodable = json_decode($menu_data['has_discount'], true);
                                $actual_price_decodable = json_decode($menu_data['price'], true);
                                $discounted_price_decodable = json_decode($menu_data['discounted_price'], true);
                                ?>
                                <form action="<?php echo site_url('menu/update'); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo sanitize($id); ?>">
                                    <input type="hidden" name="type" value="price">
                                    <!-- PER MENU PRICE AREA -->
                                    <div class="form-group">
                                        <label for="per_menu_price"><?php echo get_phrase("menu_price") . ' (' . currency_code_and_symbol('code') . ')'; ?> <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="per_menu_price" name="per_menu_price" onkeyup="calculateDiscountPercentage('per_menu')" placeholder="<?php echo get_phrase('enter_menu_price'); ?>" step=".01" value="<?php echo sanitize($menu_data['servings']) == "menu" ? sanitize($actual_price_decodable['menu']) : 0;  ?>">
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="per_menu_discount_flag" id="per_menu_discount_flag" value="1" <?php echo ($menu_data['servings'] == "menu" && $discount_flag_decodable['menu']) ? "checked" : "";  ?>>
                                        <label class="custom-control-label" for="per_menu_discount_flag"><?php echo get_phrase('check_if_this_menu_has_discount'); ?></label>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="per_menu_discounted_price"><?php echo get_phrase("discounted_price") . ' (' . currency_code_and_symbol('code') . ')'; ?></label>
                                        <input type="number" class="form-control" name="per_menu_discounted_price" id="per_menu_discounted_price" onkeyup="calculateDiscountPercentage('per_menu')" step=".01" value="<?php echo sanitize($menu_data['servings']) == "menu" ? sanitize($discounted_price_decodable['menu']) : 0;  ?>">
                                        <small class="text-muted"><?php echo get_phrase('this_menu_has'); ?>
                                            <span id="per_menu_discounted_percentage" class="text-danger">
                                                <?php
                                                if ($menu_data['servings'] == "menu") {
                                                    echo discount_percentage($actual_price_decodable['menu'], $discounted_price_decodable['menu']);
                                                } else {
                                                    echo 0;
                                                }
                                                ?>%
                                            </span> <?php echo get_phrase('discount'); ?></small>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-left"><?php echo get_phrase('update_price'); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane  <?php if ($active_tab == "gallery") echo 'active'; ?>" id="gallery">
                    <div class="custom-control custom-checkbox mb-2">
                                <input class="custom-control-input" name="has_thumb" type="checkbox" id="has_thumb" <?php if ($menu_data['thumb_status']) echo "checked"; ?> onchange="toggleThumbnail(this, '<?php echo sanitize($id); ?>')">
                                <label for="has_thumb" class="custom-control-label"><?php echo get_phrase("Thumbnail"); ?> <small>( <?php echo get_phrase('check') . ', ' . get_phrase('if_this_menu_has_thumbnail'); ?> )</small></label>
                        </div>
                     <div class="row <?php if (!$menu_data['thumb_status']) echo 'd-none'; ?>" id="thumb-area">
                            <form action="<?php echo site_url('menu/update'); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo sanitize($id); ?>">
                                <input type="hidden" name="type" value="gallery">
                                <!-- RESTAURANT THUMBNAIL -->
                                <div class="form-group">
                                    <label for="food_menu_thumbnail"><?php echo get_phrase("food_menu_thumbnail"); ?> <span class="badge badge-default">(235 X 171)</span></label>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' class="imageUploadPreview" id="food_menu_thumbnail" name="food_menu_thumbnail" accept=".png, .jpg, .jpeg" />
                                            <label for="food_menu_thumbnail"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="food_menu_thumbnail_preview" thumbnail="<?php echo base_url('uploads/menu/' . sanitize($menu_data['thumbnail'])); ?>"></div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 float-left"><?php echo get_phrase('update_gallery'); ?></button>
                            </form>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane <?php if ($active_tab == "variation") echo 'active'; ?>" id="variation">
                        <div class="custom-control custom-checkbox mb-2">
                            <input class="custom-control-input" name="has_variant" type="checkbox" id="has_variant" <?php if ($menu_data['has_variant']) echo "checked"; ?> onchange="toggleHasVariant(this, '<?php echo sanitize($id); ?>')">
                            <label for="has_variant" class="custom-control-label"><?php echo get_phrase("has_variant"); ?> <small>( <?php echo get_phrase('check') . ', ' . get_phrase('if_this_menu_has_variant'); ?> )</small></label>
                        </div>
                        <div class="row <?php if (!$menu_data['has_variant']) echo 'd-none'; ?>" id="variant-area">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col text-left">
                                                <h3 class="card-title mt-2"><?php echo get_phrase('variants'); ?></h3>
                                            </div>
                                            <div class="col text-right">
                                                <div class="card-tools">
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="showAjaxModal('<?php echo site_url('modal/popup/variant/create/' . sanitize($menu_data['id'])); ?>', '<?php echo get_phrase('add_new_variant'); ?>')">
                                                        <?php echo get_phrase("add_new_variants"); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <?php include APPPATH . "views/backend/" . $this->session->userdata('user_role') . "/variant/list.php"; ?>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col text-left">
                                                <h3 class="card-title mt-2"><?php echo get_phrase('variant_options'); ?></h3>
                                            </div>
                                            <div class="col text-right">
                                                <div class="card-tools">
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="showAjaxModal('<?php echo site_url('modal/popup/variant_options/create/' . sanitize($menu_data['id'])); ?>', '<?php echo get_phrase('add_variant_options'); ?>')">
                                                        <?php echo get_phrase("add_variant_options"); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <?php include APPPATH . "views/backend/" . $this->session->userdata('user_role') . "/variant_options/list.php"; ?>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane  <?php if ($active_tab == "addons") echo 'active'; ?>" id="addons">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col text-left">
                                                <h3 class="card-title mt-2"><?php echo get_phrase('addon_menu'); ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <?php include APPPATH . "views/backend/" . $this->session->userdata('user_role') . "/addons/list.php"; ?>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col text-left">
                                                <h3 class="card-title mt-2"><?php echo get_phrase('create_new_addon'); ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <?php include APPPATH . "views/backend/" . $this->session->userdata('user_role') . "/addons/create.php"; ?>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- ./card -->
    </div>
    <!--/. container-fluid -->
</section>