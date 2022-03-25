<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

    <?php if ($this->session->userdata('user_role') == "admin") : ?>
      <!--admin -->
      <li class="nav-item mt-1 d-sm-inline-block">
        <a href="<?php echo site_url(); ?>" class="btn btn-sm btn-primary" role="button"><i class="fas fa-home"></i> <?php echo get_phrase('home'); ?></a>
        <a href="<?php echo site_url('orders/live'); ?>" class="btn btn-sm btn-danger" role="button"><i class="fas fa-wave-square nav-icon "></i> <?php echo get_phrase('Live'); ?></a>
      </li>
  <?php endif; ?>

  <?php if ($this->session->userdata('user_role') == "owner") : ?>
    <!--owner -->
      <li class="nav-item mt-1 d-sm-inline-block">
      <a href="<?php echo site_url('orders/live'); ?>" class="btn btn-sm btn-danger" role="button"><i class="fas fa-wave-square nav-icon "></i> <?php echo get_phrase('Live'); ?></a>
    </li>
  <?php endif; ?>

  
   <?php if ($this->session->userdata('user_role') == "customer") : ?>
    <!--customer -->
      <li class="nav-item mt-1 d-sm-inline-block ml-1">
       <a href="<?php echo site_url(); ?>" class="btn btn-sm btn-primary" role="button"><i class="fas fa-home"></i> <?php echo get_phrase('home'); ?></a>
        <a href="<?php echo site_url('cart'); ?>" class="btn btn-sm btn-secondary" role="button"><i class="fas fa-shopping-cart"></i> <?php echo get_phrase('view_cart'); ?></a>
      </li>
     <?php endif; ?>
  </ul>
  
  <?php if ($this->session->userdata('user_role') == "driver") : ?>
     <!--driver -->
  <?php endif; ?>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
 
    <?php if ($this->session->userdata('user_role') == 'admin' || $this->session->userdata('user_role') == "owner") : ?>
      <?php
      $pending_orders = $this->order_model->get_number_of_orders('pending');
      $pending_restaurants = count($this->restaurant_model->get_all_pending());
      $pending_drivers = count($this->driver_model->get_pending_drivers());
      if($this->session->userdata('user_role') == 'admin'){
        $pending_staff = $pending_orders + $pending_restaurants + $pending_drivers;
      }elseif($this->session->userdata('user_role') == 'owner'){
        $pending_staff = $pending_orders;
      }
      ?>
      <li class="nav-item dropdown mr-3">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?php echo sanitize($pending_staff); ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo get_phrase('pending_notification') ?></span>
          <div class="dropdown-divider"></div>
          <a href="<?php echo site_url('orders/today'); ?>" class="dropdown-item">
            <i class="fas fa-pizza-slice mr-2"></i> <?php echo sanitize($pending_orders) . ' ' . get_phrase('pending_orders'); ?>
          </a>
          <?php if ($this->session->userdata('user_role') == 'admin') : ?>
            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url('restaurant/pending'); ?>" class="dropdown-item">
              <i class="fas fa-utensils mr-2"></i> <?php echo sanitize($pending_restaurants) . ' ' . get_phrase('pending_restaurants'); ?>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url('driver?status=pending'); ?>" class="dropdown-item">
              <i class="fas fa-biking mr-2"></i> <?php echo sanitize($pending_drivers) . ' ' . get_phrase('pending_drivers'); ?>
            </a>
          <?php endif; ?>
        </div>
      </li>
    <?php endif; ?>

    <li class="nav-item dropdown">
      <a href="javascript:void(0)" class="btn btn-default" data-toggle="dropdown">
        <i class="fas fa-lg fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu dropdown-menu-right">
        <span class="dropdown-item dropdown-header"><?php echo get_phrase('welcome'); ?>, <?php echo ucwords($this->session->userdata('user_role')); ?></span>
        <a href="<?php echo site_url('settings/profile'); ?>" class="dropdown-item">
          <?php echo get_phrase('manage_profile'); ?>
        </a>
        <?php if ($this->session->userdata('user_role') == "admin") : ?>
          <a href="<?php echo site_url('settings/system'); ?>" class="dropdown-item">
            <?php echo get_phrase('system_settings'); ?>
          </a>
          <a href="<?php echo site_url('settings/website'); ?>" class="dropdown-item">
            <?php echo get_phrase('website_settings'); ?>
          </a>
        <?php endif; ?>
        <div class="dropdown-divider"></div>
        <a href="<?php echo site_url('logout'); ?>" class="dropdown-item">
          <i class="fas fa-sign-out-alt"></i> <?php echo get_phrase('logout'); ?>
        </a>
      </div>
    </li>
  </ul>
</nav>
