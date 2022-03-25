<aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('dashboard'); ?>" class="brand-link">
        <img src="<?php echo base_url('uploads/system/' . get_website_settings('backend_logo')); ?>" alt="" class="brand-image ">
        <span class="brand-text font-weight-light"><?php echo get_system_settings('system_name'); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('uploads/user/' . sanitize($current_user['thumbnail'])); ?>" class="img-circle" alt="User Image">
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
                            <a href="<?php echo site_url('orders/today'); ?>" class="nav-link <?php if ($order_type == "today") echo 'active'; ?>">
                                <i class="fas fa-calendar-day nav-icon"></i>
                                <p>
                                    <?php echo get_phrase('todays_orders', true); ?>
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
                    <a href="<?php echo site_url('review'); ?>" class="nav-link <?php if ($page_name == "review/index" || $page_name == "review/create" || $page_name == "review/edit") echo 'active'; ?>">
                        <i class="fas fa-star-half-alt nav-icon"></i>
                        <p>
                            <?php echo get_phrase('reviews'); ?>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo site_url('favourite'); ?>" class="nav-link <?php if ($page_name == "favourite/index" || $page_name == "favourite/create" || $page_name == "favourite/edit") echo 'active'; ?>">
                        <i class="far fa-heart nav-icon"></i>
                        <p><?php echo get_phrase("favourites"); ?></p>
                    </a>
                </li>

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
