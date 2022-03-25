<!-- Info boxes -->
<div class="row">
    <!-- TILE 1 STARTS -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-lightblue"><i class="fas fa-hamburger"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('total'); ?> <small>(<?php echo get_phrase('by_now'); ?>)</small></small></span>
                <span class="progress-description">
                    <?php echo get_phrase('order_placed', true); ?>
                </span>
                <span class="info-box-number">
                    <?php echo sanitize($this->order_model->get_number_of_orders()); ?>
                </span>
            </div>
        </div>
    </div>
    <!-- TILE 1 ENDS -->

  

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <!-- TILE 3 STARTS -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-truck-loading"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('total'); ?> <small>(<?php echo get_phrase('by_now'); ?>)</small></small></span>
                <span class="progress-description">
                    <?php echo get_phrase('order_delivered', true); ?>
                </span>
                <span class="info-box-number">
                    <?php echo sanitize($this->order_model->get_number_of_orders('delivered')); ?>
                 
                </span>
            </div>
        </div>
    </div>
    <!-- TILE 3 ENDS -->

    <!-- TILE 4 STARTS -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-gradient-warning"><i class="fas fa-exclamation-triangle"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"><small class="text-muted"><?php echo get_phrase('total'); ?> <small>(<?php echo get_phrase('by_now'); ?>)</small></small></span>
                <span class="progress-description">
                    <?php echo get_phrase('order_canceled', true); ?>
                </span>
                <span class="info-box-number">
                    <?php echo sanitize($this->order_model->get_number_of_orders('canceled')); ?>
                </span>
            </div>
        </div>
    </div>
    <!-- TILE 4 ENDS -->
</div>

