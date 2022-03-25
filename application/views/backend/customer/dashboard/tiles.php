<?php //echo $this->input->cookie('login_session_data');  ?>
<div class="row justify-content-center">
     <!-- TILE 7 STARTS -->
     <div class="col-md-3 col-sm-6 col-12">
        <a href="<?php echo site_url('transactions'); ?>" class="text-dark">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-success"><i class="fas fa-wallet"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('total Balance'); ?></small></span>
                    <span class="progress-description">
                      FDrive wallet
                    </span>
                    <span class="info-box-number text-success">
                        <?php $balance = $this->transaction_model->wallet_balance();
                              echo currency(format(sanitize($balance))); ?></span>
                </div>
            </div>
        </a>
    </div>
    <!-- TILE 7 ENDS -->
  <!-- TILE 2 STARTS -->
  <div class="col-md-3 col-sm-6 col-12">
        <a href="<?php echo site_url('orders'); ?>" class="text-dark">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-truck-loading"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('till_today'); ?></small></span>
                    <span class="progress-description">
                        <?php echo get_phrase('order_delivered', true); ?>
                    </span>
                    <span class="info-box-number"><?php echo sanitize($this->order_model->get_number_of_orders('delivered')); ?></span>
                </div>
            </div>
        </a>
    </div>
    <!-- TILE 2 ENDS -->

<!-- TILE 4 STARTS -->
    <div class="col-md-3 col-sm-6 col-12">
        <a href="<?php echo site_url('cart'); ?>" class="text-dark">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-olive"><i class="fas fa-cart-plus"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('currently'); ?></small></span>
                    <span class="progress-description">
                        <?php echo get_phrase('items_in_the_cart', true); ?>
                    </span>
                    <span class="info-box-number"><?php echo sanitize($this->cart_model->get_number_of_cart_items()); ?></span>
                </div>
            </div>
        </a>
    </div>
    <!-- TILE 4 ENDS -->

    <!-- TILE 7 STARTS -->
    <div class="col-md-3 col-sm-6 col-12">
        <a href="<?php echo site_url('favourite'); ?>" class="text-dark">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-maroon"><i class="fas fa-heart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('total'); ?></small></span>
                    <span class="progress-description">
                        <?php echo get_phrase('favourite_items', true); ?>
                    </span>
                    <span class="info-box-number"><?php echo sanitize($this->favourite_model->get_number_of_favourite_items()); ?></span>
                </div>
            </div>
        </a>
    </div>
    <!-- TILE 7 ENDS -->
    
</div>
<!-- /.row -->
