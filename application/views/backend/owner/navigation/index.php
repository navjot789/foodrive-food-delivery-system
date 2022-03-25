<aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('dashboard'); ?>" class="brand-link">
        <img src="<?php echo base_url('uploads/system/' . get_website_settings('backend_logo')); ?>" alt="" class="brand-image">
        <span class="brand-text font-weight-light"><?php echo get_system_settings('system_name'); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('uploads/user/' . $current_user['thumbnail']); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <a href="<?php echo site_url('settings/profile'); ?>" class="d-block"><?php echo sanitize($current_user['name']); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header"><?php echo get_phrase("navigation_section", true); ?></li>
                <li class="nav-item">
                    <a href="<?php echo site_url('dashboard'); ?>" class="nav-link <?php if ($page_name == "dashboard/index") echo 'active'; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            <?php echo get_phrase('dashboard'); ?>
                        </p>
                    </a>
                </li>
                <?php $order_type = isset($order_type) ? $order_type : ""; ?>
                <li class="nav-item has-treeview <?php if ($page_name == "orders/index" && $order_type == "all"  || $order_type == "today" || $page_name == "orders/details") echo 'menu-open'; ?>">
                    <a href="#" class="nav-link <?php if ($page_name == "orders/index" && $order_type == "all"  || $order_type == "today" || $page_name == "orders/details") echo 'active'; ?>">
                        <i class="nav-icon fas fa-hamburger"></i>
                        <p>
                            <?php echo get_phrase('orders'); ?>
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                         <li class="nav-item">
                            <a href="<?php echo site_url('orders/live'); ?>" class="nav-link <?php if ($order_type == "live") echo 'active'; ?>">
                                <i class="fas fa-wave-square nav-icon"></i>
                                <p>
                                    <?php echo get_phrase('live_orders', true); ?>
                                    <div class="pulse right pulse-small"></div>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('orders/today'); ?>" class="nav-link <?php if ($order_type == "today") echo 'active'; ?>">
                                <i class="fas fa-calendar-day nav-icon"></i>
                                <p>
                                    <?php echo get_phrase('todays_orders', true); ?>
                                    <span class="badge badge-warning right">
                                        <?php
                                        $number_of_todays_pending_orders = $this->order_model->get_number_of_todays_pending_orders();
                                        echo sanitize($number_of_todays_pending_orders);
                                        ?>
                                    </span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('orders'); ?>" class="nav-link <?php if ($order_type == "all" || $page_name == "orders/details") echo 'active'; ?>">
                                <i class="fas fa-calendar-alt nav-icon"></i>
                                <p><?php echo get_phrase('all_orders', true); ?></p>
                            </a>
                        </li>
                    </ul>
                </li>

           

                <li class="nav-item">
                    <a href="<?php echo site_url('restaurant'); ?>" class="nav-link <?php if ($page_name == "restaurant/index" || $page_name == "restaurant/create" || $page_name == "restaurant/edit") echo 'active'; ?>">
                        <i class="fas fa-stroopwafel nav-icon"></i>
                        <p><?php echo get_phrase("restaurants"); ?><span class="badge badge-warning right"><?php echo count($this->restaurant_model->get_all_pending()); ?></span></p>
                    </a>
                </li>

              
                <li class="nav-item has-treeview <?php if ($page_name == "category/index" || $page_name == "category/create" || $page_name == "category/edit" || $page_name == "menu/index" || $page_name == "menu/create" || $page_name == "menu/edit") echo 'menu-open'; ?>">
                    <a href="#" class="nav-link <?php if ($page_name == "category/index" || $page_name == "category/create" || $page_name == "category/edit" || $page_name == "menu/index" || $page_name == "menu/create" || $page_name == "menu/edit") echo 'active'; ?>">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>
                            <?php echo get_phrase("food_menu"); ?>
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!--<li class="nav-item">
                            <a href="<?php echo site_url('category'); ?>" class="nav-link <?php if ($page_name == "category/index" || $page_name == "category/create" || $page_name == "category/edit") echo 'active'; ?>">
                                <i class="fas fa-drumstick-bite nav-icon"></i>
                                <p><?php echo get_phrase("menu_category", true); ?></p>
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a href="<?php echo site_url('menu'); ?>" class="nav-link <?php if ($page_name == "menu/index" || $page_name == "menu/create" || $page_name == "menu/edit") echo 'active'; ?>">
                                <i class="fas fa-bread-slice nav-icon"></i>
                                <p><?php echo get_phrase("food_menu", true); ?></p>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php $report_type = isset($report_type) ? $report_type : ""; ?>
                <li class="nav-item">
                    <a href="<?php echo site_url('report'); ?>" class="nav-link <?php if ($page_name == "report/index" && $report_type == "owner" || $report_type == "details") echo 'active'; ?>">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p><?php echo get_phrase("report"); ?></p>
                    </a>
                </li>

                <li class="nav-header"><?php echo get_phrase("settings_section", true); ?></li>

                <li class="nav-item">
                    <a href="<?php echo site_url('settings/profile'); ?>" class="nav-link <?php if ($page_name == "settings/profile") echo 'active'; ?>">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            <?php echo get_phrase("manage_profile"); ?>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
